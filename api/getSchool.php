<?php
	require_once("./../app/SchoolController.php");
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *"); 

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		if( !empty($_GET['id']) ){
			$schoolController = new SchoolController;
			$result = $schoolController->show($_GET);
			
			//Return results as JSON data
			echo json_encode($result->fetch_assoc());
		}else
			echo json_encode(["message" => "Please fill in all required fields!"]);
	}else
		die("403 Forbidden!");
	