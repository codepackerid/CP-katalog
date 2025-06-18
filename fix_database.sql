-- Fix Projects Table Structure

-- 1. Make sure the projects table exists
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `repository_url` varchar(255) DEFAULT NULL,
  `demo_url` varchar(255) DEFAULT NULL,
  `technologies` json DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Modify technologies column to json type to store arrays properly
ALTER TABLE `projects` MODIFY COLUMN `technologies` json DEFAULT NULL;

-- 3. Make sure the projects table has a foreign key to users table
ALTER TABLE `projects` ADD CONSTRAINT `projects_user_id_foreign` 
FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) 
ON DELETE CASCADE ON UPDATE CASCADE; 