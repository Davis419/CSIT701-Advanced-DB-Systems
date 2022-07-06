<?php
	require_once("./../app/ApplicationController.php");
	header('Content-Type: application/json'); 
	header("Access-Control-Allow-Origin: *");

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		$applicationController = new ApplicationController;
		$result = $applicationController->index();
			
		$applications = [];

		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) 
				array_push($applications, $row);
		}

		//Return results as JSON data
		echo json_encode($applications);

	}else
		die("403 Forbidden!");
	