<?php
	require_once("Course.php");


	class CourseController{
		/**
		* Get a specific resource 
		*
		* @param array $request
		* @return $result
		*/
		public function show(array $request)
		{
			$course = new Course;
			$res = $course->get($request['id']);
			
			return $res;
		}

		/**
		* Get a specific resource 
		*
		* @return $result
		*/
		public function index()
		{
			$course = new Course;
			$res = $course->all();
			
			return $res;
		}

		/**
		* Get all the schools of this course
		*
		* @param array $request
		* @return $result
		*/
		public function schoolCourses(array $request)
		{
			$course = new Course;
			$res = $course->getSchoolCourses($request['id']);
			
			return $res;
		}
	}