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
			!empty($request->firstname) && 
			!empty($request->lastname) && 
			!empty($request->gender) && 
            !empty($request->birthdate) &&
            !empty($request->idnumber) &&
            !empty($request->citizenship) &&
            !empty($request->email) &&
            !empty($request->cellphone) &&
            !empty($request->address)
		){
			
            $application = new ApplicationController;
            $arr = $application->create($request);

            //If the application was saved successfully
            if ( $arr['result'] ){             

                //Return results as JSON data        
		        echo json_encode(['response' => "success", 'message' => "Application successfully saved! ", 'passcode' => $arr['passcode']]);
            }else
                echo json_encode(['response' => "error", 'message' => "Something went wrong, please try again later! "]);				

        }else
            echo json_encode(['response' => "error", 'message' => "Please fill in all required fields!"]);

	}else
		die("403 Forbidden!");
	