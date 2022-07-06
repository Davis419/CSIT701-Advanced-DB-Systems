<?php
		
	class Database
	{
		private const HOST = 'localhost';
		private const USERNAME = 'root';
		private const PASSWORD = '';
		private const DBNAME = 'student-registration';
		private $conn;
		
		/**
		* Initialise database connection
		*
		* @return void
		*/
		public function __construct()
		{
			$this->conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
		}
		
		/**
		* Connect to database
		*
		* @return $conn
		*/
		public function connect()
		{
			if ($this->conn->connect_error)
			  die("Connection failed: " . $this->conn->connect_error);
			else
				return $this->conn;
		}
	}
?>