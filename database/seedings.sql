
INSERT INTO `schools` (`id`, `name`) VALUES
(1, 'Science and Technology'),
(2, 'Medicine'),
(3, 'Pharmacy'),
(4, 'Health Care Sciences'),
(5, 'Oral Health Sciences');



INSERT INTO `courses` (`id`, `name`, `code`, `duration`, `school_id`) VALUES
(1, 'Mathematical Science', 'BSCH01', 3, 1),
(2, 'Physical Sciences', 'BSCI01', 3, 1),
(3, 'Life Sciences', 'BSCG01', 3, 1),
(4, 'Occupational & Enviromental Therapy', 'BSCJ01', 3, 1),

(5, 'Bachelor of Diagnostic Radiology', 'BRAD01', 4, 2),
(6, 'Bachelor of Medicine & Bachelor of Surgery', 'MBCHB01', 6, 2),

(7, 'Bachelor of Pharmacy', 'BPRA01', 4, 3),

(8, 'Bachelor of Occupational Therapy', 'HCSB3', 4, 4),
(9, 'Bachelor of Science (Dietetics)', 'HCSB4', 4, 4),
(10, 'Bachelor of Science (Physiotherapy)', 'HCSB5', 4, 4),

(11, 'Bachelor of Dental Surgery', 'BDS01', 4, 5),
(12, 'Bachelor of Dental Therapy', 'BDS02', 3, 5);