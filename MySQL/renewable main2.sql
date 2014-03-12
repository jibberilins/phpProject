-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25a


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema renewable_login
--

CREATE DATABASE IF NOT EXISTS renewable_login;
USE renewable_login;

--
-- Definition of table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `Admin_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dob_day` tinyint(3) unsigned NOT NULL,
  `dob_month` tinyint(3) unsigned NOT NULL,
  `dob_year` smallint(5) unsigned NOT NULL,
  `Phone_No` int(10) unsigned NOT NULL,
  `Profile_info` varchar(255) NOT NULL,
  PRIMARY KEY (`Admin_ID`,`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` (`Admin_ID`,`username`,`password`,`email`,`firstname`,`lastname`,`dob_day`,`dob_month`,`dob_year`,`Phone_No`,`Profile_info`) VALUES 
 (1,'Admin','912ad684b8c80f35710ac97cbca5b9ff','admin.king@hotmail.com','','',0,0,0,0,'');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;


--
-- Definition of table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `ID_msg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Message` text NOT NULL,
  `Sender` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_msg`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`ID_msg`,`Message`,`Sender`) VALUES 
 (83,'sdsfdf','shane'),
 (84,'dsadAD','shane'),
 (85,'sdfsa','shane'),
 (86,'asadcsa','shane'),
 (87,'ytrytry','shane'),
 (88,'hello','shane'),
 (89,'thfgdss','shane'),
 (90,'sewrew','shane'),
 (91,'drrergf','shane'),
 (92,'adsfdsfd','shane'),
 (93,'cvxc','shane'),
 (94,'dsfd','shane'),
 (95,'hello','shane'),
 (96,'hello','shane'),
 (103,'goofd','shane'),
 (104,'goofd','shane'),
 (105,'goofd','shane'),
 (106,'goofd','shane'),
 (107,'hs','shane'),
 (108,'hs','shane'),
 (109,'hs','shane'),
 (110,'hs','shane'),
 (111,'hs','shane'),
 (112,'dsd','shane'),
 (113,'dsd','shane'),
 (125,'hello again','shane'),
 (126,'bcbjskd','shane'),
 (127,'jghj','Shane'),
 (128,'tgghfhf','Shane'),
 (129,'tgghfhf','Shane'),
 (130,'',''),
 (131,'f',''),
 (132,'f',''),
 (133,'gfff','Shane'),
 (134,'hello','Shane'),
 (135,'hello','Shane'),
 (137,'hello','Shane'),
 (138,'hello','Shane');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


--
-- Definition of table `outputs`
--

DROP TABLE IF EXISTS `outputs`;
CREATE TABLE `outputs` (
  `Output_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Output_Name` varchar(45) NOT NULL,
  `Turbine_Name` varchar(45) NOT NULL,
  `AEO` varchar(45) NOT NULL,
  `MEO` varchar(45) NOT NULL,
  `DEO` varchar(45) NOT NULL,
  `PayC` varchar(45) NOT NULL,
  `PayT` varchar(45) NOT NULL,
  `Wind_Ratio1` varchar(45) NOT NULL,
  `Wind_Ratio2` varchar(45) NOT NULL,
  `Electricity_Cost` varchar(45) NOT NULL,
  `Supplier` varchar(45) NOT NULL,
  PRIMARY KEY (`Output_ID`,`Output_Name`,`Turbine_Name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outputs`
--

/*!40000 ALTER TABLE `outputs` DISABLE KEYS */;
INSERT INTO `outputs` (`Output_ID`,`Output_Name`,`Turbine_Name`,`AEO`,`MEO`,`DEO`,`PayC`,`PayT`,`Wind_Ratio1`,`Wind_Ratio2`,`Electricity_Cost`,`Supplier`) VALUES 
 (20,'robT','Unitron 5.1kW','7,869.20','655.77','21.56','3,934.60','8','5','9','0.50','airtricity'),
 (21,'robT','Unitron 5.1kW','13,597.98','1,133.17','37.25','6,798.99','5','5','9','0.50','airtricity'),
 (22,'robT','Unitron 5.1kW','21,593.09','1,799.42','59.16','10,796.54','3','5','9','0.50','airtricity'),
 (23,'robT','Unitron 5.1kW','32,232.25','2,686.02','88.31','16,116.12','2','5','9','0.50','airtricity'),
 (24,'robT','Unitron 5.1kW','45,893.18','3,824.43','125.73','22,946.59','2','5','9','0.50','airtricity'),
 (25,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (26,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (27,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (28,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (29,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (30,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (31,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (32,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (33,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (34,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (35,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (36,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (37,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (38,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (39,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (40,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (41,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (42,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (43,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (44,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (45,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (46,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (47,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (48,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (49,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (50,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (51,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (52,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (53,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (54,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (55,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (56,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (57,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (58,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (59,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity'),
 (60,'Admin','Bergey Excel 10kW','14,043.14','1,170.26','38.47','7,021.57','6','5','9','0.50','airtricity'),
 (61,'Admin','Bergey Excel 10kW','24,266.54','2,022.21','66.48','12,133.27','4','5','9','0.50','airtricity'),
 (62,'Admin','Bergey Excel 10kW','38,534.37','3,211.20','105.57','19,267.19','2','5','9','0.50','airtricity'),
 (63,'Admin','Bergey Excel 10kW','57,520.69','4,793.39','157.59','28,760.35','2','5','9','0.50','airtricity'),
 (64,'Admin','Bergey Excel 10kW','81,899.58','6,824.97','224.38','40,949.79','1','5','9','0.50','airtricity');
/*!40000 ALTER TABLE `outputs` ENABLE KEYS */;


--
-- Definition of table `turbines`
--

DROP TABLE IF EXISTS `turbines`;
CREATE TABLE `turbines` (
  `Turbine_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Turbine_Name` varchar(45) NOT NULL,
  `Cost` float NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Radius` float NOT NULL,
  `Air_Density` float NOT NULL,
  `Average_Efficiency` float NOT NULL,
  PRIMARY KEY (`Turbine_ID`,`Turbine_Name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turbines`
--

/*!40000 ALTER TABLE `turbines` DISABLE KEYS */;
INSERT INTO `turbines` (`Turbine_ID`,`Turbine_Name`,`Cost`,`Size`,`Radius`,`Air_Density`,`Average_Efficiency`) VALUES 
 (1,'Bergey Excel 10kW',38000,'10kW',3.5,1.225,0.3),
 (2,'Bergey Excel 5kW',26000,'5kW',3.1,1.225,0.2),
 (3,'Unitron 650W',15000,'650W',1.1,1.225,0.2),
 (4,'Unitron 3.3kW',25000,'3.3kW',2.325,1.225,0.2),
 (5,'Unitron 5.1kW',30000,'5.1kW',2.62,1.225,0.3),
 (6,'Skystream 3.7',13000,'2.1kW',1.86,1.225,0.2),
 (7,'AC Green Energy PowerMax 20',43000,'20kW',2,1.225,0.3),
 (8,'KingSpan KW3 ',22000,'2.5kW',1.9,1.225,0.2),
 (9,'KingSpan KW6 ',32000,'5.2kW',2.8,1.225,0.3),
 (10,'Evance R9000 5KW',37000,'5kW',2.75,1.225,0.2);
/*!40000 ALTER TABLE `turbines` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dob_day` tinyint(3) unsigned NOT NULL,
  `dob_month` tinyint(3) unsigned NOT NULL,
  `dob_year` smallint(5) unsigned NOT NULL,
  `Phone_No` int(10) unsigned NOT NULL,
  `Profile_info` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`,`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`,`username`,`password`,`email`,`firstname`,`lastname`,`dob_day`,`dob_month`,`dob_year`,`Phone_No`,`Profile_info`) VALUES 
 (12,'robT','0ebacc7798678400120130e48ea2653b','rob.t@gmail.com','','',0,0,0,0,''),
 (14,'mikey','0bf44a9634896de88678e56222c1b012','mike.m@gmail.com','','',0,0,0,0,''),
 (16,'Tommy','34b7da764b21d298ef307d04d8152dc5','tommy.mc@hotmail.com','','',0,0,0,0,''),
 (17,'Benny','7454fe05798da30701141b849ce69eef','benny456@gmail.com','','',0,0,0,0,''),
 (18,'Damien','7bb2272933ade24d9a53b253a7347e43','damien.g@hotmail.com','','',0,0,0,0,''),
 (19,'TaraH','e271bbd761e4d01d0c30dc92604346b3','tara123@hotmail.com','','',0,0,0,0,''),
 (20,'SaraJ234','f4233e7b6c0884de787ae8101dbd8aa9','saraj234@yahoo.com','','',0,0,0,0,''),
 (21,'Megan3434','954e6b29d892a0baf92afce49ce8c98b','megan3434@hotmail.com','','',0,0,0,0,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of procedure `Adminjob`
--

DROP PROCEDURE IF EXISTS `Adminjob`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Adminjob`()
BEGIN
select username from users;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Adminselect`
--

DROP PROCEDURE IF EXISTS `Adminselect`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Adminselect`(IN $adminname Varchar(45))
BEGIN
SELECT * FROM administrators WHERE username = `$adminname`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `adminupdate`
--

DROP PROCEDURE IF EXISTS `adminupdate`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `adminupdate`(IN $adminnew varchar(45), IN $email varchar(60),
IN $pass varchar(45), IN $firstname varchar(45), IN $lastname varchar(45), IN $dobD tinyint(3),
IN $dobM tinyint(3), IN dobY smallint(5), IN $phoneNo INT(10), IN $descrip varchar(255))
BEGIN
UPDATE administrators SET email = `$email`, password = md5(`$pass`), firstname = `$firstname`,
lastname = `$lastname`, dob_day = `$dobD`, dob_month = `$dobM`, dob_year = `dobY`, Phone_No = `$phoneNo`, Profile_info = `$descrip`
WHERE username = `$usernew`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `cal_insert`
--

DROP PROCEDURE IF EXISTS `cal_insert`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cal_insert`(IN $adminnew varchar(45), IN $CheckR varchar(45), IN $AEO2 Varchar(45),
IN $MEO Varchar(45), IN $DEO Varchar(45), IN $PaybackC Varchar(45), IN $PaybackT Varchar(45), IN $s1 varchar(45), IN $s2 varchar(45),
IN $ec varchar(45), IN $supplier varchar(45))
BEGIN
INSERT INTO outputs (Output_Name, Turbine_Name, AEO, MEO, DEO, PayC, PayT, Wind_Ratio1, Wind_Ratio2, Electricity_Cost, Supplier )
VALUES ($adminnew, $CheckR, format($AEO2,2), format($MEO,2), format($DEO,2), format($PaybackC,2), CEIL($PaybackT), $s1, $s2, $ec, $supplier);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `delete_user`
--

DROP PROCEDURE IF EXISTS `delete_user`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user`(IN $userdelete INT(10))
BEGIN
DELETE FROM users
WHERE ID = $userdelete LIMIT 1;
select username from users;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `emailselect`
--

DROP PROCEDURE IF EXISTS `emailselect`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `emailselect`(IN $emailcheck Varchar(60))
BEGIN
SELECT * FROM users WHERE email = `$emailcheck`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `insertmessage`
--

DROP PROCEDURE IF EXISTS `insertmessage`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertmessage`(IN $message VARCHAR(45), IN $sender VARCHAR(45))
BEGIN
INSERT INTO messages (Message,Sender) VALUES (`$message`,`$sender`);

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `insertuser1`
--

DROP PROCEDURE IF EXISTS `insertuser1`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertuser1`(IN username Varchar(45), IN pass Varchar(45), IN email Varchar(60))
BEGIN
INSERT INTO users (username, password, email) VALUES (username, pass, email);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `outputCall`
--

DROP PROCEDURE IF EXISTS `outputCall`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `outputCall`(IN $adminname varchar(45))
BEGIN
SELECT * FROM outputs WHERE Output_Name = `$adminname`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `selectcost`
--

DROP PROCEDURE IF EXISTS `selectcost`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectcost`(IN CheckC VARCHAR(45))
BEGIN
select Cost as cost  FROM turbines
WHERE Turbine_Name = `CheckC`;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `selectefficiency`
--

DROP PROCEDURE IF EXISTS `selectefficiency`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectefficiency`(IN $CheckCp VARCHAR(45))
BEGIN
select Average_Efficiency as AvEff  FROM turbines
WHERE Turbine_Name = `$CheckCp`;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `selectmessages`
--

DROP PROCEDURE IF EXISTS `selectmessages`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectmessages`()
BEGIN
SELECT * FROM messages;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `selectradius`
--

DROP PROCEDURE IF EXISTS `selectradius`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectradius`(IN CheckR VARCHAR(45))
BEGIN
select Radius as radius, Average_Efficiency as AvEff, Cost as cost  FROM turbines
WHERE Turbine_Name = `CheckR`;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `turbineselect1`
--

DROP PROCEDURE IF EXISTS `turbineselect1`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `turbineselect1`(In $Check Varchar(45))
BEGIN
SELECT * FROM turbines WHERE Turbine_Name =  `$Check`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `userselect1`
--

DROP PROCEDURE IF EXISTS `userselect1`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userselect1`(IN $usercheck Varchar(45))
BEGIN
SELECT * FROM users WHERE username = `$usercheck`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `userselect2`
--

DROP PROCEDURE IF EXISTS `userselect2`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userselect2`(IN $username Varchar(45))
BEGIN
SELECT * FROM users WHERE username = `$username`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `userupdate`
--

DROP PROCEDURE IF EXISTS `userupdate`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userupdate`(IN $usernew varchar(45), IN $email varchar(60),
IN $pass varchar(45), IN $firstname varchar(45), IN $lastname varchar(45), IN $dobD tinyint(3),
IN $dobM tinyint(3), IN dobY smallint(5), IN $phoneNo INT(10), IN $descrip varchar(255))
BEGIN
UPDATE users SET email = `$email`, password = md5(`$pass`), firstname = `$firstname`,
lastname = `$lastname`, dob_day = `$dobD`, dob_month = `$dobM`, dob_year = `dobY`, Phone_No = `$phoneNo`, Profile_info = `$descrip`
WHERE username = `$usernew`;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
