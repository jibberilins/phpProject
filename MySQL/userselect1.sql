DELIMITER $$

DROP PROCEDURE IF EXISTS `userselect1` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userselect1`(IN $usercheck Varchar(45))
BEGIN
SELECT * FROM users WHERE username = `$usercheck`;
END $$

DELIMITER ;