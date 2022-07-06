CREATE TABLE `schools` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `courses` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `duration` int(10) NOT NULL,
  `school_id` int(11) NOT NULL,
   FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `modules` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `academic_period` int(2) NOT NULL,
  `prerequisite` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `course_modules` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
   FOREIGN KEY (`module_id`) REFERENCES `modules`(`id`),
   FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `applications`(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `gender` VARCHAR(20) NOT NULL, 
    `birthdate` VARCHAR(255) NOT NULL, 
    `idnumber` VARCHAR(255) NOT NULL, 
    `citizenship`  VARCHAR(255) NOT NULL, 
    `email`  VARCHAR(255) NOT NULL, 
    `cellphone`  VARCHAR(255) NOT NULL, 
    `admitted` TINYINT(1) NULL DEFAULT NULL,
    `created_at` VARCHAR(255) NOT NULL,
    `course_id_first` INT(11) NOT NULL, 
    `course_id_second` INT(11) NOT NULL,
    FOREIGN KEY (`course_id_first`) REFERENCES `courses`(`id`),
    FOREIGN KEY (`course_id_second`) REFERENCES `courses`(`id`)
);