<?php

    require_once("./../app/ApplicationController.php");
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json'); 

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		if( !empty($_GET['id']) ){
			$applicationController = new ApplicationController;
			$courses = $applicationController->courses($_GET);
			

			//Return results as JSON data
			echo json_encode($courses);					
		}else
			echo json_encode(["message" => "Please fill in all required fields!"]);	
	}else
		die("403 Forbidden!");
	