<?php
	require_once("./../app/CourseController.php");
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json'); 

	//Accept only GET requests for this route, if not terminate script
	if( $_SERVER['REQUEST_METHOD'] == "GET" ){
		if( !empty($_GET['id']) ){
			$courseController = new CourseController;
			$result = $courseController->schoolCourses($_GET);
			
			$courses = [];

			if ( $result->num_rows > 0 ) {
				while( $row = $result->fetch_assoc() ) 
					array_push($courses, $row);
			}

			//Return results as JSON data
			echo json_encode($courses);					
		}else
			echo json_encode(["message" => "Please fill in all required fields!"]);	
	}else
		die("403 Forbidden!");
	