-- File SQL untuk membuat tabel projects dari awal

-- Hapus tabel lama jika ada
DROP TABLE IF EXISTS projects;

-- Buat tabel projects baru
CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `repository_url` varchar(255) DEFAULT NULL,
  `demo_url` varchar(255) DEFAULT NULL,
  `technologies` json DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Periksa apakah tabel berhasil dibuat
SHOW TABLES LIKE 'projects';

-- Periksa struktur tabel
DESCRIBE projects; 