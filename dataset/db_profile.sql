-- Database: db_profile
CREATE DATABASE IF NOT EXISTS db_profile;
USE db_profile;

-- 1. Tabel Profil (About Me)
-- Menyimpan data diri utama
CREATE TABLE profil (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT, /* About Me content */
    foto VARCHAR(100) DEFAULT 'avatar.png', /* Foto profil */
    email VARCHAR(100),
    linkedin VARCHAR(255),
    instagram VARCHAR(255)
);

INSERT INTO profil (id, nama, deskripsi, foto) VALUES 
(1, 'Freeze AD Kaban', 'Saya adalah seorang profesional yang memiliki semangat tinggi dalam belajar dan berkembang. Ini adalah website profil pribadi saya.', 'avatar.png');

-- 2. Tabel Pendidikan
CREATE TABLE pendidikan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    jenjang VARCHAR(50), /* Contoh: SMP, SMA */
    nama_sekolah VARCHAR(100),
    tahun_lulus VARCHAR(20),
    deskripsi TEXT
);

-- Data Pendidikan Anda
INSERT INTO pendidikan (jenjang, nama_sekolah, tahun_lulus, deskripsi) VALUES 
('SMP', 'SMP Negeri 20 Jakarta Timur', '2019', 'Menyelesaikan pendidikan menengah pertama dengan hasil yang memuaskan.'),
('SMA', 'SMA Negeri 6 Padang Sidimpuan', '2022', 'Lulus dengan nilai baik dan aktif dalam kegiatan ekstrakurikuler.');

-- 3. Tabel Organisasi
CREATE TABLE organisasi (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_organisasi VARCHAR(100),
    jabatan VARCHAR(100), /* Contoh: Pradana, Sekretaris */
    periode VARCHAR(50),
    deskripsi TEXT,
    foto VARCHAR(100) DEFAULT 'org_default.jpg'
);

-- Data Organisasi Anda
INSERT INTO organisasi (nama_organisasi, jabatan, periode, deskripsi, foto) VALUES 
('Pramuka', 'Pradana', '2018-2019', 'Menjabat sebagai pemimpin regu dan aktif dalam kegiatan perkemahan.', 'pramuka.jpg'),
('OSIS', 'Sekretaris', '2020-2021', 'Bertanggung jawab atas administrasi dan dokumentasi kegiatan OSIS.', 'osis.jpg');

-- 4. Tabel Skill
CREATE TABLE skill (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_skill VARCHAR(100),
    kategori VARCHAR(50), /* Contoh: IT, Leadership */
    level VARCHAR(20) /* Beginner, Intermediate, Expert */
);

INSERT INTO skill (nama_skill, kategori, level) VALUES 
('Public Speaking', 'Soft Skill', 'Intermediate'),
('Web Programming', 'IT', 'Beginner');