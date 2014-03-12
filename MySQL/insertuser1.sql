DELIMITER $$

DROP PROCEDURE IF EXISTS `insertuser1` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertuser1`(IN username Varchar(45), IN pass Varchar(45), IN email Varchar(60))
BEGIN
INSERT INTO users (username, password, email) VALUES (username, pass, email);
END $$

DELIMITER ;