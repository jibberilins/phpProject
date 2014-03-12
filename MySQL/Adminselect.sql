DELIMITER $$

DROP PROCEDURE IF EXISTS `Adminselect` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Adminselect`(IN $adminname Varchar(45))
BEGIN
SELECT * FROM administrators WHERE username = `$adminname`;
END $$

DELIMITER ;