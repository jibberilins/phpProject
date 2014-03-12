DELIMITER $$

DROP PROCEDURE IF EXISTS `cal_insert` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cal_insert`(IN $adminnew varchar(45),
IN $CheckR varchar(45), IN $AEO2 Varchar(45), IN $MEO Varchar(45), IN $DEO Varchar(45),
IN $PaybackC Varchar(45), IN $PaybackT Varchar(45), IN $s1 varchar(45), IN $s2 varchar(45),
IN $ec varchar(45), IN $supplier varchar(45))
BEGIN
INSERT INTO outputs (Output_Name, Turbine_Name, AEO, MEO, DEO, PayC, PayT, Wind_Ratio1,
Wind_Ratio2, Electricity_Cost, Supplier )
VALUES ($adminnew, $CheckR, format($AEO2,2), format($MEO,2), format($DEO,2),
format($PaybackC,2), CEIL($PaybackT), $s1, $s2, $ec, $supplier);
END $$

DELIMITER ;