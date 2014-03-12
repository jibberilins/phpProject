DELIMITER $$

DROP PROCEDURE IF EXISTS `outputCall` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `outputCall`(IN $adminname varchar(45))
BEGIN
SELECT * FROM outputs WHERE Output_Name = `$adminname`;
END $$

DELIMITER ;