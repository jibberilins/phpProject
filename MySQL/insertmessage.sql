DELIMITER $$

DROP PROCEDURE IF EXISTS `renewable_login`.`insertmessage` $$
CREATE PROCEDURE `renewable_login`.`insertmessage` (IN $message VARCHAR(45), IN $sender VARCHAR(45))
BEGIN
INSERT INTO messages (Message,Sender) VALUES (`$message`,`$sender`);

END $$

DELIMITER ;