DELIMITER $$

DROP PROCEDURE IF EXISTS `Adminjob` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Adminjob`()
BEGIN
select username from users;
END $$

DELIMITER ;