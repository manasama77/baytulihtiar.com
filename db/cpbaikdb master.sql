/*
 Navicat Premium Data Transfer

 Source Server         : mysql php 5.4.16
 Source Server Type    : MySQL
 Source Server Version : 50539
 Source Host           : localhost:3306
 Source Schema         : cpbaikdb

 Target Server Type    : MySQL
 Target Server Version : 50539
 File Encoding         : 65001

 Date: 28/02/2020 14:39:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_aktif` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'a2bd164b1dab1d817bacc5793197f9b3a275e1bb', 'Master Admin', 'aktif', 0, '2020-02-18 11:58:31', '2020-02-28 10:16:18');
INSERT INTO `admin` VALUES (2, 'adam', '452cca1473e9f817c787aaafb693afa6d97c68cb', 'Adam PM', 'tidak aktif', 1, '2020-02-25 00:39:31', NULL);

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cif_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `majlis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_aktif` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_aktif` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  `nama_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_admin` datetime NULL DEFAULT NULL,
  `nik_karyawan` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_karyawan` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (1, 'KARPET UNTUK ANGGOTA', 'Diantara hasil Rapat Anggota Tahunan KSPPS BAIK Th Buku 2018 adalah pencatatan SHU sebesar 1,2 M.   Rapat memutuskan 30% dari SHU tersebut dibagikan kepada anggota dalam bentuk Karpet untuk anggota yang akan digunakan untuk pertemuam majlis. 1200 karpet pun disiapkan untuk didistribusikan kepada seluruh majlis melalui cabang-cabang KSPPS BAIK.', '65def3b62f231433a5593c1e0e9bf0c8.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:52:10', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (2, 'QURBAN BAIK DITEBAR DI JABAR', 'Tahun ini 20 ekor sapi dan 80 ekor kambing dibagikan oleh KSPPS BAIK untuk anggota-anggota BAIK yg tersebar di beberapa kota di propinsi Jawa Barat', '58346f41c2591cf5725a73eeb3016526.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:53:19', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (3, 'LINTAS MAJELIS', 'Untuk meningkatkan kekompakan dan mempererat tali silaturrahmi antar anggota, KSPPS BAIK kembali mengadakan Pertemuan Lintas Majlis se Bogor Raya.&nbsp;<br>Pertemuan Lintas Majlis kali ini terasa istimewa karena dihadiri oleh Menteri Keuangan Ibu Sri Mulyani yang kebetulan sedang melakukan kunjungan kerja ke KSPPS Baytul Ikhtiar Bogor', '4e015935a44b74c09ec7ceb7e450d3c7.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:54:14', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (4, 'RAPAT ANGGOTA TAHUNAN ( RAT ) TH BUKU 2018', 'RAT Th Buku 2018 mengambil lokasi di', '9470dd6e81da465a18d09e35ee93a762.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:55:12', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (5, 'GATHERING KSPPS BAIK', 'Menambah Kekompakan dan mempererat rasa persaudaraan, KSPPS BAIK mengadakan Gatehering Karyawan yang kali ini memilih Pulai Karimun Jawa sebagai Lokasi Gathering.', 'e517b99366f12e357d82b8d5fc395fde.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:55:59', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (6, 'PELATIHAN DASAR AKAD-AKAD SYARIAH', 'Untuk meningkatkan dan menguatkan pemahaman akan akad-akad syariah dalam praktek transaksi lembaga keuangan syariah, KSPPS mengadakan Pelatihan dasar Akad Syariah bagi seluruh karyawan baru terutama', '4cbcaf74b2cdb222fce146f989511ff9.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:56:42', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (7, 'BAIK BERBAGI', 'Berbagi Bersama Masjid Jami Nurul Amal Ciaruteun Ilir', 'd20d621ea5e86e2a09b465a444eb1a2a.png', 'aktif', 1, 'Master Admin', '2020-02-27 14:57:26', NULL, NULL, NULL);
INSERT INTO `berita` VALUES (8, 'BAIK, Penyalur Kredit UMI Jabar Terbaik', '<p>Koperasi Baytul Ikhtiar menerima penghargaan dari Kementrian Koperasi Indonesia sebagai salah satu penyalur program krdeit UMI untuk masyarakat usaha kecil dan menengah<br></p>', '5f76170fa2f1059d23a8b0b1cc7399b3.jpeg', 'aktif', 1, 'Master Admin', '2020-02-27 14:58:04', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for bukutamu
-- ----------------------------
DROP TABLE IF EXISTS `bukutamu`;
CREATE TABLE `bukutamu`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pesan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bukutamu
-- ----------------------------
INSERT INTO `bukutamu` VALUES (1, 'test', 'test@gmail.com', 'test pertanyaan', '2020-02-26 10:56:24');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `nik` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_aktif` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('518.2019.0410', '452cca1473e9f817c787aaafb693afa6d97c68cb', 'Adam Prasetya Malik', 'aktif', '518.2019.0410', '2020-02-27 14:34:09', '2020-02-28 09:55:37');

-- ----------------------------
-- Table structure for kisah
-- ----------------------------
DROP TABLE IF EXISTS `kisah`;
CREATE TABLE `kisah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_aktif` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  `nama_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_admin` datetime NULL DEFAULT NULL,
  `nik_karyawan` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_karyawan` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kisah
-- ----------------------------
INSERT INTO `kisah` VALUES (1, 'Bersih dan Sehat itu BAIK', 'mpw59SJd_aE', 'aktif', 1, 'Master Admin', '2020-02-27 15:05:11', NULL, NULL, NULL);
INSERT INTO `kisah` VALUES (2, 'Semangat bersama BAIK', 'n_8wyWKA9KI', 'aktif', 1, 'Master Admin', '2020-02-27 15:05:26', NULL, NULL, NULL);
INSERT INTO `kisah` VALUES (3, 'Pelayanan BAIK', 'ewJoZEeveVM', 'aktif', 1, 'Master Admin', '2020-02-27 15:05:42', NULL, NULL, NULL);
INSERT INTO `kisah` VALUES (4, 'BAIK goes to Karimun Jawa', '2fU-G0O3CXY', 'aktif', 1, 'Master Admin', '2020-02-27 15:05:58', NULL, NULL, NULL);
INSERT INTO `kisah` VALUES (5, 'Terima Kasih BAIK', 'QOwvCSct4LE', 'aktif', 1, 'Master Admin', '2020-02-27 15:06:11', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  `nama_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_admin` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'PRODUK DAN LAYANAN', 'Sesuai nama dan badan hukum nya sebagai KSPPS ( Koperasi Simpan Pinjam Pembiayaan), Produk utama KSPPS BAIK adalah SImpanan dan Pembiayaan  Produk Simpanan di KSPPS BAIK meliputi : Simpanan Pokok, Simpanan Wajib, Simpanan Sukarela dan Simpanan Berjangka / Simpanan Berencana  ', '2399c4989c98da8e0107fb7a1468342e.png', 1, 'Master Admin', '2020-02-24 16:08:47');
INSERT INTO `profile` VALUES (2, 'BAIK GRAFIS STORY', 'Berawal pada semangat perjuangan untuk melakukan perbaikan kondisi masyarakat yang semakin mengalami kesulitan ekonomi di wilayah kabupaten bogor pd tahun 1990,  Tokoh masyarakat jawabarat sekaligus ulama dan pahlawan nasional KH Sholeh Iskandar berinisiatif untuk melakukan sebuah gerakan pemberdayaan .... ', '9d1e6e4d0df688f98f9d483c311200de.jpg', 1, 'Master Admin', '2020-02-24 16:08:47');
INSERT INTO `profile` VALUES (3, 'PEREMPUAN DAN KOMITMEN KELOMPOK	', 'Koperasi Simpan Pinjam Pembiayaan Baytul Ikhtiar ( KSPPS BAIK) adalah lembaga keuangan mikro syariah berbasis komunitas perempuan dengan pola layanan kelompok Grameen Bank.  Resmi berbadan hukum koperasi pada tahun 2008, KSPPS BAIK terus memperluas jangkauan wilayah layanan ', '2ba22d5fd48f4790a080db7d72caf25b.png', 1, 'Master Admin', '2020-02-24 16:08:47');

-- ----------------------------
-- Table structure for tentang
-- ----------------------------
DROP TABLE IF EXISTS `tentang`;
CREATE TABLE `tentang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isi1` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `isi2` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tentang
-- ----------------------------
INSERT INTO `tentang` VALUES (1, '9bb142eac9ad11baf713fa598f859897.png', 'Tentang Koperasi Baytul Ikhtiar', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');

SET FOREIGN_KEY_CHECKS = 1;
