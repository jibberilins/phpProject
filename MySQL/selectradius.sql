DELIMITER $$

DROP PROCEDURE IF EXISTS `selectradius` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectradius`(IN CheckR VARCHAR(45))
BEGIN
select Radius as radius, Average_Efficiency as AvEff, Cost as cost  FROM turbines
WHERE Turbine_Name = `CheckR`;

END $$

DELIMITER ;