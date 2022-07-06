<?php
	require_once("./../app/CourseController.php");
	header('Content-Type: application/json'); 
	header("Access-Control-Allow-Origin: *");

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		$courseController = new CourseController;
		$result = $courseController->index();
			
		$courses = [];

		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) 
				array_push($courses, $row);
		}

		//Return results as JSON data
		echo json_encode($courses);

	}else
		die("403 Forbidden!");
	