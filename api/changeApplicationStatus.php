<?php
    require_once('./../app/ApplicationController.php');

	session_start();
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json'); 
	header('Accept: application/json'); 
    
    //Capture JSON input from user and decode it into PHP object
    $request = json_decode(file_get_contents('php://input'));

    //Accept only POST requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "POST" ){
        //Check if none of the inputs are empty
		if(
			!empty($request->application_id)
		){
			
            $application = new ApplicationController;
            $result = $application->updateStatus(['id' => $request->application_id, 'status' => $request->application_status]);

            //If the application was saved successfully
            if ( $result ){             
                $response = "success";
                $message = "Application Status successfully updated! ";
            }else{
                $response = "error";
			    $message = "Something went wrong, please try again later!";
            }					

        }else{
			$response = "error";
			$message = "Please fill in all required fields!";
		}

        //Return results as JSON data        
		echo json_encode(['response' => $response, 'message' => $message]);
	}else
		die("403 Forbidden!");
	