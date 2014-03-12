DELIMITER $$

DROP PROCEDURE IF EXISTS `selectcost` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectcost`(IN CheckC VARCHAR(45))
BEGIN
select Cost as cost  FROM turbines
WHERE Turbine_Name = `CheckC`;

END $$

DELIMITER ;