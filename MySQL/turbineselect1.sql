DELIMITER $$

DROP PROCEDURE IF EXISTS `renewable_login`.`turbineselect1` $$
CREATE PROCEDURE `renewable_login`.`turbineselect1` (In $Check Varchar(45))
BEGIN
SELECT * FROM turbines WHERE Turbine_Name =  `$Check`;
END $$

DELIMITER ;