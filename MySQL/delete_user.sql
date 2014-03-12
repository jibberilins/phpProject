DELIMITER $$

DROP PROCEDURE IF EXISTS `delete_user` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user`(IN $userdelete INT(10))
BEGIN
DELETE FROM users
WHERE ID = $userdelete LIMIT 1;
select username from users;
END $$

DELIMITER ;