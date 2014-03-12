DELIMITER $$

DROP PROCEDURE IF EXISTS `selectmessages` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectmessages`()
BEGIN
SELECT * FROM messages;
END $$

DELIMITER ;