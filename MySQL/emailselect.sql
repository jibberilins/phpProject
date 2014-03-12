DELIMITER $$

DROP PROCEDURE IF EXISTS `renewable_login`.`emailselect` $$
CREATE PROCEDURE `renewable_login`.`emailselect` (IN $emailcheck Varchar(60))
BEGIN
SELECT * FROM users WHERE email = `$emailcheck`;
END $$

DELIMITER ;