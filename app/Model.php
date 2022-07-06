<?php

	require_once("Database.php");

    class Model
	{

		/**
		 * Connection variable for all database connections
		 *
		 * @var string
		 */
        protected $conn;
		
		/**
		* Get the database connection to use in this model (DI)
		*
		* @return void
		*/
		public function __construct()
		{
            $database = new Database;
			$this->conn = $database->connect();
		}
    }