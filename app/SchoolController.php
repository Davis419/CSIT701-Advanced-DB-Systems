<?php
	require_once("School.php");


	class SchoolController{
		/**
		* Get a specific resource 
		*
		* @param array $request
		* @return $result
		*/
		public function show(array $request)
		{
			$school = new School;
			$res = $school->get($request['id']);
			
			return $res;
		}

		/**
		* Get a specific resource 
		*
		* @return $result
		*/
		public function index()
		{
			$school = new School;
			$res = $school->all();
			
			return $res;
		}
	}