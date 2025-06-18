-- Fix Projects Table

-- 1. Pastikan kolom technologies bisa menyimpan data JSON
ALTER TABLE projects MODIFY COLUMN technologies JSON NULL;

-- 2. Hapus constraint CHECK yang mungkin menyebabkan error
ALTER TABLE projects DROP CONSTRAINT IF EXISTS projects_chk_1;

-- 3. Pastikan kolom user_id memiliki foreign key yang benar
ALTER TABLE projects DROP FOREIGN KEY IF EXISTS projects_user_id_foreign;
ALTER TABLE projects ADD CONSTRAINT projects_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;

-- 4. Pastikan kolom status memiliki nilai default yang benar
ALTER TABLE projects MODIFY COLUMN status ENUM('draft', 'published') NOT NULL DEFAULT 'published'; 