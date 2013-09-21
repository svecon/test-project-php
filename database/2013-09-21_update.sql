-- 2013-09-21_update.sql

ALTER TABLE `users`
ADD `phone` varchar(255) COLLATE 'utf8_general_ci' NOT NULL AFTER `city`,
COMMENT=''; -- 0.013 s