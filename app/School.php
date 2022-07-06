<?php
	require_once("Model.php");
	
	class School extends Model
	{
		public $id;
		public $name;

		/**
		 * Name of the database table for this model
		 *
		 * @var string
		 */
		private const TABLE = "schools";
		

		/**
		* Get all instances of this model
		*
		* @return array $courses
		*/
		public function all()
		{
			if($res = $this->conn->query( "SELECT * FROM " . self::TABLE ))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		
		}

		/**
		* Get the specified instance of this model in the database
		*
		* @return Course $course
		*/
		public function get($id)
		{
			if($res = $this->conn->query("SELECT * FROM " . self::TABLE . " WHERE id = ". $id))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}
	}