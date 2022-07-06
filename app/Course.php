<?php
	require_once("Model.php");
	
	class Course extends Model
	{
		public $id;
		public $name;
		public $code;
		public $duration;
		public $school_id;

		/**
		 * Name of the database table for this model
		 *
		 * @var string
		 */
		private const TABLE = "courses";

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


		/**
		* Save the instance in the database
		*
		* @return void
		*/
		public function save()
		{
			if($stmt = $this->conn->prepare("INSERT INTO ".self::TABLE." (full_name, email, mobile_numbers, message) VALUES (?,?,?,?)")) {			
				$stmt->bind_param("ssss", $this->fullName, $this->email, $this->mobileNumbers, $this->message);
				
				return $stmt->execute();
			}else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}

		/**
		* Get the specified instance of this model in the database
		*
		* @return array $courses
		*/
		public function getSchoolCourses($id)
		{
			if($res = $this->conn->query("SELECT * FROM " . self::TABLE . " WHERE school_id = ". $id))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}

		
		/**
		* Get the specified instance of this model in the database
		*
		* @return array $courses
		*/
		public function getApplicationCourses($id)
		{
			if($res = $this->conn->query("SELECT * FROM " . self::TABLE . " WHERE course_id = ". $id))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}
	}
	
?>