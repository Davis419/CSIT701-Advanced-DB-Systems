<?php
    require_once("Application.php");
    require_once("CourseController.php");


    class ApplicationController
    {
        
        /**
        * Get a specific application
        *
        * @param array $request
        * @return $result
        */
        public function show(array $request)
        {
            $application = new Application;
            $res = $application->get($request['id']);
            
            return $res;
        }

        /**
        * Get all applications
        *
        * @return $result
        */
        public function index()
        {
            $application = new Application;
            $res = $application->all();
            
            return $res;
        }


        /**
         * Create an application
         * 
         * @param array $request
         * @return bool $result
         */
        public function create($request)
        {
            $application = new Application;

			$application->firstname = $request->firstname;
            $application->lastname = $request->lastname;
            $application->gender = $request->gender;
            $application->birthdate = $request->birthdate;
            $application->idnumber = $request->idnumber;
            $application->citizenship = $request->citizenship;
            $application->email = $request->email;
            $application->cellphone = $request->cellphone;
            $application->address = $request->address;
            $application->course_id_first = $request->course_id_first;
            $application->course_id_second = $request->course_id_second;
            $application->passcode = rand(100000,999999);

            $result = $application->save();

            return ['result' => $result, 'passcode' => $application->passcode];
        }

        /**
         * login the user
         * 
         * @param array $request
         * @return bool loggedIn
         */
        public function login(array $request)
        {
            $loggedIn = false;
            $id = null;

            $application = new Application;

           $result = $application->getByEmail($request['email']);

           if( $result->num_rows > 0 ){
                $userApplication = $result->fetch_assoc();

                if ( $userApplication['passcode'] == $request['passcode'] ){
                    $loggedIn = true;
                    $id = $userApplication['id'];
                }
           }
            
            return ['result' => $loggedIn, 'application_id' => $id];
        }

        /**
		 * Update the status of the application
		 * 
		 * @param array $request
         * @return bool
		 */
		public function updateStatus(array $request)
		{
            $application = new Application;
            $res = $application->updateStatus($request['id'], $request['status']);

            return $res;
		}


        /**
         * Get the courses for this application
         * 
         * @param array $request
         * @return array $courses
         */
        public function courses(array $request)
        {
            //Get the application 
            $application = $this->show($request)->fetch_assoc();

            $courses = [];

            $course = new Course;

            //Get the application first & second choice courses and add them to courses array
            array_push($courses, $course->get($application['course_id_first'])->fetch_assoc());
            array_push($courses, $course->get($application['course_id_second'])->fetch_assoc());

            return $courses;
        }
    }