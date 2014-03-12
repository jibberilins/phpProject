DELIMITER $$

DROP PROCEDURE IF EXISTS `userselect2` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userselect2`(IN $username Varchar(45))
BEGIN
SELECT * FROM users WHERE username = `$username`;
END $$

DELIMITER ;