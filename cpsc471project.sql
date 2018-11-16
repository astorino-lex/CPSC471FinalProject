-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: cpsc471project
-- ------------------------------------------------------
-- Server version	5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin1@gmail.com'),('admin2@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_notifications` (
  `notification_id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_notifications`
--

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
INSERT INTO `admin_notifications` VALUES (1,'admin1@gmail.com'),(2,'admin1@gmail.com'),(3,'admin2@gmail.com');
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `q_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_name` varchar(45) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `minutes` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(2) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`course_name`,`q_id`,`a_id`),
  UNIQUE KEY `a_id_UNIQUE` (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (471,'CPSC',2,1,'Amazing','There is no final exam in this class...',5,54,8,'10',2018);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_help`
--

DROP TABLE IF EXISTS `assign_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `assign_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_id`,`content_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_help`
--

LOCK TABLES `assign_help` WRITE;
/*!40000 ALTER TABLE `assign_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `assign_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bans`
--

DROP TABLE IF EXISTS `bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bans` (
  `admin_email` varchar(45) NOT NULL,
  `stud_email` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_email`,`stud_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bans`
--

LOCK TABLES `bans` WRITE;
/*!40000 ALTER TABLE `bans` DISABLE KEYS */;
/*!40000 ALTER TABLE `bans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('CPSC',471,'Database Management Systems','Fall 2018','admin1@gmail.com',1,2,1),('ENSF',480,'Software Development','Fall 2018','admin2@gmail.com',2,1,0);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_content`
--

DROP TABLE IF EXISTS `course_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_content` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `format` varchar(45) DEFAULT NULL,
  `report_status` tinyint(4) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `approval_status` tinyint(4) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_content`
--

LOCK TABLES `course_content` WRITE;
/*!40000 ALTER TABLE `course_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_profs`
--

DROP TABLE IF EXISTS `course_profs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_profs` (
  `course_name` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  `prof` varchar(45) NOT NULL,
  PRIMARY KEY (`course_name`,`course_id`,`prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_profs`
--

LOCK TABLES `course_profs` WRITE;
/*!40000 ALTER TABLE `course_profs` DISABLE KEYS */;
INSERT INTO `course_profs` VALUES ('CPSC',471,'Dr.Kawash'),('ENSF',480,'Dr.Moussavi');
/*!40000 ALTER TABLE `course_profs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `user_email` varchar(45) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`,`content_id`,`content_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `end_user`
--

DROP TABLE IF EXISTS `end_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `end_user` (
  `user_email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `end_user`
--

LOCK TABLES `end_user` WRITE;
/*!40000 ALTER TABLE `end_user` DISABLE KEYS */;
INSERT INTO `end_user` VALUES ('admin1@gmail.com','admin1','Cool','Admin'),('admin2@gmail.com','admin2','Nice','Admin'),('student1@gmail.com','student1','Amazing','Student'),('student2@gmail.com','student2','Tired','Student');
/*!40000 ALTER TABLE `end_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favourites` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`course_name`,`course_id`,`user_email`),
  CONSTRAINT `course_name` FOREIGN KEY (`course_name`, `course_id`) REFERENCES `course` (`course_name`, `id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favourites`
--

LOCK TABLES `favourites` WRITE;
/*!40000 ALTER TABLE `favourites` DISABLE KEYS */;
INSERT INTO `favourites` VALUES (471,'CPSC','student1@gmail.com'),(471,'CPSC','student2@gmail.com'),(480,'ENSF','student2@gmail.com');
/*!40000 ALTER TABLE `favourites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_help`
--

DROP TABLE IF EXISTS `lab_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `lab_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_id`,`content_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_help`
--

LOCK TABLES `lab_help` WRITE;
/*!40000 ALTER TABLE `lab_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_help`
--

DROP TABLE IF EXISTS `lecture_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_help` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `lecture_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_title`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_help`
--

LOCK TABLES `lecture_help` WRITE;
/*!40000 ALTER TABLE `lecture_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  KEY `course_name_idx` (`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'approve content upload','approval pending','November',14,2018,4,26,'CPSC',471),(2,'approve content upload','approval pending','November',11,2018,1,30,'ENSF',480),(3,'approve content upload','approval pending','November',11,2018,5,43,'ENSF',480),(4,'new content uploaded','recent upload','November',1,2018,3,12,'CPSC',471),(5,'new question on forum posted','forum activity','November',12,2018,12,11,'ENSF',480),(6,'new question on forum posted','forum activity','November',9,2018,4,20,'CPSC',471);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_on`
--

DROP TABLE IF EXISTS `posts_on`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_on` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`course_id`,`course_name`,`user_email`),
  KEY `user_email_idx` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_on`
--

LOCK TABLES `posts_on` WRITE;
/*!40000 ALTER TABLE `posts_on` DISABLE KEYS */;
INSERT INTO `posts_on` VALUES (480,'ENSF','student1@gmail.com',1),(480,'ENSF','student1@gmail.com',2),(471,'CPSC','student1@gmail.com',4),(480,'ENSF','student2@gmail.com',3);
/*!40000 ALTER TABLE `posts_on` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practice_problems`
--

DROP TABLE IF EXISTS `practice_problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practice_problems` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `tyoe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`content_title`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practice_problems`
--

LOCK TABLES `practice_problems` WRITE;
/*!40000 ALTER TABLE `practice_problems` DISABLE KEYS */;
/*!40000 ALTER TABLE `practice_problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `q_id` int(11) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `stud_name` varchar(45) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `minutes` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(2) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`course_name`,`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (471,'CPSC',3,'That does ERD stand for?','Amazing',12,2,10,'28',2018),(480,'CPSC',2,'When is the final exam?','Tired',2,15,30,'9',2018),(480,'ENSF',1,'When is the final exam?','Amazing',4,24,14,'11',2018);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating_feedback`
--

DROP TABLE IF EXISTS `rating_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating_feedback` (
  `user_email` varchar(45) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `rating_out_of_5` int(1) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_email`,`content_id`,`content_title`,`rating_out_of_5`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating_feedback`
--

LOCK TABLES `rating_feedback` WRITE;
/*!40000 ALTER TABLE `rating_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recieves`
--

DROP TABLE IF EXISTS `recieves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recieves` (
  `notification_id` int(11) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`notification_id`,`user_email`),
  KEY `user_email_idx` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recieves`
--

LOCK TABLES `recieves` WRITE;
/*!40000 ALTER TABLE `recieves` DISABLE KEYS */;
INSERT INTO `recieves` VALUES (1,'admin1@gmail.com'),(2,'admin1@gmail.com'),(3,'admin2@gmail.com'),(4,'student1@gmail.com'),(6,'student1@gmail.com'),(4,'student2@gmail.com'),(5,'student2@gmail.com'),(6,'student2@gmail.com');
/*!40000 ALTER TABLE `recieves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `user_email` varchar(45) NOT NULL,
  `year_of_study` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('student1@gmail.com',3),('student2@gmail.com',3);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_degree_programs`
--

DROP TABLE IF EXISTS `student_degree_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_degree_programs` (
  `user_email` varchar(45) NOT NULL,
  `degree_program` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`,`degree_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_degree_programs`
--

LOCK TABLES `student_degree_programs` WRITE;
/*!40000 ALTER TABLE `student_degree_programs` DISABLE KEYS */;
INSERT INTO `student_degree_programs` VALUES ('student1@gmail.com','Bachelor of Science'),('student2@gmail.com','Bachelor of Science');
/*!40000 ALTER TABLE `student_degree_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_facultys`
--

DROP TABLE IF EXISTS `student_facultys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_facultys` (
  `user_email` varchar(45) NOT NULL,
  `faculty` varchar(45) NOT NULL,
  PRIMARY KEY (`user_email`,`faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_facultys`
--

LOCK TABLES `student_facultys` WRITE;
/*!40000 ALTER TABLE `student_facultys` DISABLE KEYS */;
INSERT INTO `student_facultys` VALUES ('student1@gmail.com','Computer Science'),('student2@gmail.com','Computer Science'),('student2@gmail.com','Engineering');
/*!40000 ALTER TABLE `student_facultys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_notifications`
--

DROP TABLE IF EXISTS `student_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_notifications` (
  `notification_id` int(11) NOT NULL,
  `email_list` varchar(500) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_notifications`
--

LOCK TABLES `student_notifications` WRITE;
/*!40000 ALTER TABLE `student_notifications` DISABLE KEYS */;
INSERT INTO `student_notifications` VALUES (4,'student1@gmail.com;student2@gmail.com'),(5,'student2@gmail.com'),(6,'student1@gmail.com;student2@gmail.com');
/*!40000 ALTER TABLE `student_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `user_email` varchar(45) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_title` varchar(45) NOT NULL,
  `hours` int(2) DEFAULT NULL,
  `minutes` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`user_email`,`content_id`,`content_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-15 18:20:34
