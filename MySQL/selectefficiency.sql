DELIMITER $$

DROP PROCEDURE IF EXISTS `selectefficiency` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectefficiency`(IN $CheckCp VARCHAR(45))
BEGIN
select Average_Efficiency as AvEff  FROM turbines
WHERE Turbine_Name = `$CheckCp`;

END $$

DELIMITER ;