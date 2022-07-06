<?php
    require_once('./../app/ApplicationController.php');

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json'); 
	header('Accept: application/json'); 
    
    //Capture JSON input from user and decode it into PHP object
    $request = json_decode(file_get_contents('php://input'));

    //Accept only POST requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "POST" ){

        //Check if none of the inputs are empty
		if( !empty($request->email) && !empty($request->passcode) ){
			
            $application = new ApplicationController;
            $arr = $application->login(['email' => $request->email, 'passcode' => $request->passcode]);

            //If the application was saved successfully
            if ( $arr['result']){             
                $response = "success";
                $message = "Authentication successful! ";
            }else{
                $response = "error";
			    $message = "Authentication failed! ";
            }					

        }else{
			$response = "error";
			$message = "Please fill in all required fields!";
		}

        //Return results as JSON data        
		echo json_encode(['response' => $response, 'message' => $message, 'id' => $arr['application_id']]);
	}else
		die("403 Forbidden!");
	