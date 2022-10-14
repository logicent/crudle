DROP VIEW IF EXISTS `crdl_People`;
CREATE VIEW `crdl_People` AS
SELECT
  `crdl_Auth`.`id` AS `auth_id`,
  `crdl_Auth`.`username` AS `username`,
  `crdl_Auth`.`email` AS `email`,
  `crdl_Auth`.`status` AS `auth_status`,
  `crdl_Auth`.`created_at` AS `created_at`,
  `crdl_Auth`.`updated_at` AS `updated_at`,
  `crdl_User`.`id` AS `user_id`,
  `crdl_User`.`firstname` AS `firstname`,
  `crdl_User`.`surname` AS `surname`,
  `crdl_User`.`sex` AS `sex`,
  `crdl_User`.`mobile_no` AS `mobile_no`,
  `crdl_User`.`avatar` AS `avatar`,
  `crdl_User`.`status` AS `user_status`,
  `crdl_User`.`comments` AS `comments`
FROM
  (
    `crdl_Auth`
    LEFT JOIN `crdl_User` ON(
      (
        convert(`crdl_User`.`id` USING utf8mb4) = convert(`crdl_Auth`.`id` USING utf8mb4)
      )
    )
  )