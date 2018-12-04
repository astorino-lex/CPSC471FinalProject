# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: cpsc471project
# Generation Time: 2018-12-04 05:10:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`user_email`)
VALUES
	('admin1@gmail.com'),
	('admin2@gmail.com');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `notification_id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;

INSERT INTO `admin_notifications` (`notification_id`, `email`)
VALUES
	(1,'admin1@gmail.com'),
	(2,'admin1@gmail.com'),
	(3,'admin2@gmail.com');

/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table answer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `q_id` int(11) NOT NULL,
  `stud_name` varchar(45) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `minutes` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(2) DEFAULT NULL,
  PRIMARY KEY (`a_id`,`course_id`,`course_name`,`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;

INSERT INTO `answer` (`a_id`, `course_id`, `course_name`, `q_id`, `stud_name`, `content`, `hours`, `minutes`, `day`, `month`, `year`)
VALUES
	(1,471,'CPSC',2,'Amazing','There is no final exam in this class...',5,54,8,'October',2018);

/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table assign_help
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assign_help`;

CREATE TABLE `assign_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `assign_num` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`assign_num`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;



# Dump of table bans
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bans`;

CREATE TABLE `bans` (
  `admin_email` varchar(45) NOT NULL,
  `stud_email` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_email`,`stud_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `course_name` varchar(45) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `forum_id` int(11) NOT NULL,
  `num_questions` int(11) DEFAULT '0',
  `num_answers` int(11) DEFAULT '0',
  PRIMARY KEY (`course_name`,`id`),
  UNIQUE KEY `forum_id_UNIQUE` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='merged with forum';

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;

INSERT INTO `course` (`course_name`, `id`, `title`, `semester`, `user_email`, `forum_id`, `num_questions`, `num_answers`)
VALUES
	('CPSC',471,'Database Management Systems','Fall 2018','admin1@gmail.com',1,2,1),
	('ENSF',480,'Software Development','Fall 2018','admin2@gmail.com',2,1,0);

/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_content`;

CREATE TABLE `course_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `format` varchar(45) DEFAULT NULL,
  `report_status` tinyint(4) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `approval_status` tinyint(4) DEFAULT '0',
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;



# Dump of table end_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `end_user`;

CREATE TABLE `end_user` (
  `user_email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `end_user` WRITE;
/*!40000 ALTER TABLE `end_user` DISABLE KEYS */;

INSERT INTO `end_user` (`user_email`, `password`, `first_name`, `last_name`)
VALUES
	('admin1@gmail.com','admin1','Cool','Admin'),
	('admin2@gmail.com','admin2','Nice','Admin'),
	('student1@gmail.com','student1','Amazing','Student'),
	('student2@gmail.com','student2','Tired','Student');

/*!40000 ALTER TABLE `end_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table favourites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favourites`;

CREATE TABLE `favourites` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`course_name`,`course_id`,`user_email`),
  CONSTRAINT `course_name` FOREIGN KEY (`course_name`, `course_id`) REFERENCES `course` (`course_name`, `id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `favourites` WRITE;
/*!40000 ALTER TABLE `favourites` DISABLE KEYS */;

INSERT INTO `favourites` (`course_id`, `course_name`, `user_email`)
VALUES
	(471,'CPSC','student1@gmail.com'),
	(471,'CPSC','student2@gmail.com'),
	(480,'ENSF','student2@gmail.com');

/*!40000 ALTER TABLE `favourites` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lab_help
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lab_help`;

CREATE TABLE `lab_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `lab_num` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lab_num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



# Dump of table lecture_help
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lecture_help`;

CREATE TABLE `lecture_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `lecture_num` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lecture_num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



# Dump of table notification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(100) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `minute` int(2) DEFAULT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `course_name_idx` (`course_name`),
  KEY `course_id_idx` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;

INSERT INTO `notification` (`id`, `message`, `subject`, `month`, `day`, `year`, `hours`, `minute`, `course_name`, `course_id`)
VALUES
	(1,'approve content upload','approval pending','November',14,2018,4,26,'CPSC',471),
	(2,'approve content upload','approval pending','November',11,2018,1,30,'ENSF',480),
	(3,'approve content upload','approval pending','November',11,2018,5,43,'ENSF',480),
	(4,'new content uploaded','recent upload','November',1,2018,3,12,'CPSC',471),
	(5,'new forum post','forum activity','November',12,2018,12,11,'ENSF',480),
	(6,'new forum post','forum activity','November',9,2018,4,20,'CPSC',471);

/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts_on
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts_on`;

CREATE TABLE `posts_on` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`course_id`,`course_name`,`user_email`),
  KEY `user_email_idx` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `posts_on` WRITE;
/*!40000 ALTER TABLE `posts_on` DISABLE KEYS */;

INSERT INTO `posts_on` (`course_id`, `course_name`, `user_email`, `id`)
VALUES
	(480,'ENSF','student1@gmail.com',1),
	(480,'ENSF','student1@gmail.com',2),
	(471,'CPSC','student1@gmail.com',4),
	(480,'ENSF','student2@gmail.com',3);

/*!40000 ALTER TABLE `posts_on` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table practice_problems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `practice_problems`;

CREATE TABLE `practice_problems` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `practice_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`practice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `stud_name` varchar(45) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `minutes` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(2) DEFAULT NULL,
  PRIMARY KEY (`q_id`,`course_id`,`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;

INSERT INTO `question` (`q_id`, `course_id`, `course_name`, `content`, `stud_name`, `hours`, `minutes`, `day`, `month`, `year`)
VALUES
	(1,480,'ENSF','When is the final exam?','Amazing',4,24,14,'October',2018),
	(2,471,'CPSC','When is the final exam?','Tired',2,15,30,'September',2018),
	(3,471,'CPSC','What does ERD stand for?','Amazing',12,20,10,'November',2018);

/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rating_feedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rating_feedback`;

CREATE TABLE `rating_feedback` (
  `user_email` varchar(45) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `rating_out_of_5` int(1) NOT NULL,
  PRIMARY KEY (`user_email`,`content_id`,`content_title`,`rating_out_of_5`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table recieves
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recieves`;

CREATE TABLE `recieves` (
  `notification_id` int(11) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`notification_id`,`user_email`),
  KEY `user_email_idx` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `recieves` WRITE;
/*!40000 ALTER TABLE `recieves` DISABLE KEYS */;

INSERT INTO `recieves` (`notification_id`, `user_email`)
VALUES
	(1,'admin1@gmail.com'),
	(2,'admin1@gmail.com'),
	(3,'admin2@gmail.com'),
	(4,'student1@gmail.com'),
	(6,'student1@gmail.com'),
	(4,'student2@gmail.com'),
	(5,'student2@gmail.com'),
	(6,'student2@gmail.com');

/*!40000 ALTER TABLE `recieves` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `user_email` varchar(45) NOT NULL,
  `year_of_study` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;

INSERT INTO `student` (`user_email`, `year_of_study`)
VALUES
	('student1@gmail.com',3),
	('student2@gmail.com',3);

/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_degree_programs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_degree_programs`;

CREATE TABLE `student_degree_programs` (
  `user_email` varchar(45) NOT NULL,
  `degree_program` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`,`degree_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `student_degree_programs` WRITE;
/*!40000 ALTER TABLE `student_degree_programs` DISABLE KEYS */;

INSERT INTO `student_degree_programs` (`user_email`, `degree_program`)
VALUES
	('student1@gmail.com','Bachelor of Science'),
	('student2@gmail.com','Bachelor of Science');

/*!40000 ALTER TABLE `student_degree_programs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_facultys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_facultys`;

CREATE TABLE `student_facultys` (
  `user_email` varchar(45) NOT NULL,
  `faculty` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`,`faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `student_facultys` WRITE;
/*!40000 ALTER TABLE `student_facultys` DISABLE KEYS */;

INSERT INTO `student_facultys` (`user_email`, `faculty`)
VALUES
	('student1@gmail.com','Computer Science'),
	('student2@gmail.com','Computer Science'),
	('student2@gmail.com','Engineering');

/*!40000 ALTER TABLE `student_facultys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_notifications`;

CREATE TABLE `student_notifications` (
  `notification_id` int(11) NOT NULL,
  `email_list` varchar(500) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `student_notifications` WRITE;
/*!40000 ALTER TABLE `student_notifications` DISABLE KEYS */;

INSERT INTO `student_notifications` (`notification_id`, `email_list`)
VALUES
	(4,'student1@gmail.com;student2@gmail.com'),
	(5,'student2@gmail.com'),
	(6,'student1@gmail.com;student2@gmail.com');

/*!40000 ALTER TABLE `student_notifications` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
