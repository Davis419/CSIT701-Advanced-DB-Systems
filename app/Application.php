<?php
	require_once("Model.php");
	
	class Application extends Model
	{
		public $id;
		public $firstname;
		public $lastname;
		public $gender;
		public $birthdate;
		public $idnumber;
		public $citizenship;
		public $email;
		public $cellphone;
		public $course_id_first;
		public $course_id_second;
		public $passcode;
		public $created_at;
		
		/**
		 * Name of the database table for this model
		 *
		 * @var string
		 */
		private const TABLE = "applications";

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
		* @return Application $application
		*/
		public function get($id)
		{
			if($res = $this->conn->query("SELECT * FROM " . self::TABLE . " WHERE id = ". $id))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}

		/**
		* Get the specified instance of this model in the database
		*
		* @param string $email
		* @return Application $application
		*/
		public function getByEmail(string $email)
		{
			if($res = $this->conn->query("SELECT * FROM " . self::TABLE . " WHERE email = '" . $email . "';"))		
				return $res;
			else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}


		/**
		* Update the instance in the database
		*
		* @return void
		*/
		public function updateStatus($id, $status)
		{ 
			if($res = $this->conn->query("UPDATE ".self::TABLE." SET admitted = " . $status . " WHERE id = ". $id )) {			
				return $res;
			}else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}

		/**
		* Save the instance in the database
		*
		* @return void
		*/
		public function save()
		{

			if($stmt = $this->conn->prepare("INSERT INTO ".self::TABLE." (firstname, lastname, gender, birthdate, idnumber, citizenship, email, cellphone, course_id_first, course_id_second, created_at, passcode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")) {			
				$this->created_at = date("Y-m-d");
				$stmt->bind_param("ssssssssiiss", $this->firstname, $this->lastname, $this->gender, $this->birthdate, $this->idnumber, $this->citizenship, $this->email, $this->cellphone, $this->course_id_first, $this->course_id_second, $this->created_at, $this->passcode);
				
				return $stmt->execute();
			}else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}
	}
	
?>