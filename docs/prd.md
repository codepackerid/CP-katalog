# Product Requirements Document (PRD)

## Project Title: Codepacker.net – Frontend

---

1. Overview

Codepacker.net adalah platform portfolio dan social networking untuk siswa/i jurusan RPL SMKN 4 Malang. Versi awal (MVP) berfokus pada tampilan frontend tanpa database maupun fitur login. Website akan dibangun menggunakan Laravel (Blade) dan Tailwind CSS + ShadCN-UI.


---

2. Goals

Menampilkan project hasil karya siswa.

Menampilkan daftar anggota jurusan RPL.

Menyediakan informasi tentang Codepacker.

Menyediakan forum tampilan statis untuk diskusi (versi dummy).

Tampilan modern, bersih, dan user-friendly.



---

3. Target User

Siswa/i RPL SMKN 4 Malang

Guru RPL

Publik/industri yang ingin melihat karya siswa



---

4. Scope

In Scope

Halaman statis: Home, Projects, Anggota, Tentang, Forum

Komponen frontend dengan ShadCN

Routing dengan Laravel

Layouting responsive


Out of Scope (MVP)

Autentikasi pengguna

Database / backend logic

Upload/CRUD project

Komentar forum

API integrasi



---

5. Pages & Features

1. Home (Beranda)

Hero Section (judul, tagline)

Highlight project

Showcase anggota unggulan

CTA: "Lihat Project", "Gabung Forum"


2. Projects

Grid of project cards (dummy data)

Setiap card berisi:

Judul project

Gambar/preview

Stack/teknologi

Nama pembuat



3. Anggota

Grid/list anggota (nama, angkatan, foto profil, role)

Card anggota bisa diklik untuk lihat detail (opsional)


4. Tentang

Deskripsi singkat Codepacker

Visi & Misi

Struktur tim/organisasi (jika ada)


5. Forum

Tampilan thread statis

Simulasi diskusi (thread + komentar dummy)



---

6. Design & Style Guide

Framework: Laravel Blade

Styling: Tailwind CSS

Komponen UI: ShadCN (HTML versi Blade)

Typography:

Heading: Space Grotesk

Body: Inter


Color Palette:

Primary: biru

Background: putih


Tampilan: Clean, minimal, modern,



---

7. Navigation (Navbar)

[Logo] | Beranda | Projects | Anggota | Tentang | Forum

Sticky top

Responsive (mobile dropdown)



---

8. Technical Notes

Dummy data untuk project dan anggota bisa disimpan dalam array di Blade atau file JSON.

Semua halaman akan extend dari layout app.blade.php.

Gunakan Tailwind utility class untuk animasi dan interaksi.



---

9. Deliverables

Full static frontend Laravel project

Folder terstruktur (layouts, components, pages)

Komponen reusable (Navbar, Footer, Card, Button, Section)

Dummy data (untuk projects dan anggota)