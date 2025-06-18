-- Script untuk memperbaiki kolom technologies pada tabel projects

-- 1. Ubah kolom technologies menjadi tipe JSON
ALTER TABLE projects MODIFY COLUMN technologies JSON NULL;

-- 2. Reset nilai NULL pada kolom technologies untuk row yang bermasalah
UPDATE projects SET technologies = NULL WHERE technologies = '';

-- 3. Update nilai array kosong menjadi array JSON yang valid
UPDATE projects SET technologies = '[]' WHERE technologies IS NOT NULL AND JSON_VALID(technologies) = 0;

-- 4. Tampilkan semua project untuk verifikasi
SELECT id, title, user_id, technologies, created_at FROM projects ORDER BY id DESC; 