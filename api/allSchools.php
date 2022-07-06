<?php
	require_once("./../app/SchoolController.php");
	header('Content-Type: application/json'); 
	header("Access-Control-Allow-Origin: *");

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		$schoolController = new SchoolController;
		$result = $schoolController->index();
			
		$schools = [];

		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) 
				array_push($schools, $row);
		}

		//Return results as JSON data
		echo json_encode($schools);

	}else
		die("403 Forbidden!");
	