DROP VIEW IF EXISTS `people`;
CREATE VIEW `people` AS
SELECT
  `auth`.`id` AS `auth_id`,
  `auth`.`username` AS `username`,
  `auth`.`email` AS `email`,
  `auth`.`status` AS `auth_status`,
  `auth`.`created_at` AS `created_at`,
  `auth`.`updated_at` AS `updated_at`,
  `user`.`id` AS `user_id`,
  `user`.`firstname` AS `firstname`,
  `user`.`surname` AS `surname`,
  `user`.`sex` AS `sex`,
  `user`.`mobile_no` AS `mobile_no`,
  `user`.`avatar` AS `avatar`,
  `user`.`status` AS `user_status`,
  `user`.`comments` AS `comments`
FROM
  (
    `auth`
    LEFT JOIN `user` ON(
      (
        convert(`user`.`id` USING utf8) = convert(`auth`.`id` USING utf8)
      )
    )
  )