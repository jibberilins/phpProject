DELIMITER $$

DROP PROCEDURE IF EXISTS `renewable_login`.`userupdate` $$
CREATE PROCEDURE `renewable_login`.`userupdate` (IN $usernew varchar(45), IN $email varchar(60),
IN $pass varchar(45), IN $firstname varchar(45), IN $lastname varchar(45), IN $dobD tinyint(3),
IN $dobM tinyint(3), IN dobY smallint(5), IN $phoneNo INT(10), IN $descrip varchar(255))

BEGIN
UPDATE users SET email = `$email`, password = md5(`$pass`), firstname = `$firstname`,
lastname = `$lastname`, dob_day = `$dobD`, dob_month = `$dobM`, dob_year = `dobY`, Phone_No = `$phoneNo`, Profile_info = `$descrip`
WHERE username = `$usernew`;
END $$

DELIMITER ;