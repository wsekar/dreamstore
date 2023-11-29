-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_dreamstore
CREATE DATABASE IF NOT EXISTS `db_dreamstore` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_dreamstore`;

-- Dumping structure for table db_dreamstore.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `kode_admin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_admin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username_admin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_kelamin_admin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Dumping data for table db_dreamstore.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id_admin`, `kode_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`, `jenis_kelamin_admin`) VALUES
	(1, 'ADMIN-01', 'Gaby', 'admin', 'admin111', 'gaby@gmail.com', 'Perempuan');

-- Dumping structure for table db_dreamstore.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `kode_barang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stok` int NOT NULL,
  `id_satuan` int NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE,
  KEY `id_kategori` (`id_kategori`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `FK_barang_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_barang_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Dumping data for table db_dreamstore.barang: ~2 rows (approximately)
INSERT INTO `barang` (`id_barang`, `id_kategori`, `kode_barang`, `nama_barang`, `harga_barang`, `stok`, `id_satuan`, `foto_barang`, `deskripsi`) VALUES
	(1, 1, 'BR000001', 'SEVENTEEN 2023 SEASON’S GREETINGS', '1650000', 19, 1, 'SEVENTEEN_2023_SEASON’S_GREETINGS.jpg', '<p>Product description</p>\r\n\r\n<ul>\r\n	<li>OUT BOX : 220*286.5*50.5mm</li>\r\n	<li>DESK CALENDER (WORLD Ver./13months) : 252*272mm</li>\r\n	<li>DIARY : 160*220mm (96P)</li>\r\n	<li>PHOTOBOOK : 160*220mm (60P)</li>\r\n	<li>DIGITAL CODE CARD : 54*86mm (About 52mins)</li>\r\n	<li>PHOTOCARD SET : 65*105mm (13ea, 1set)</li>\r\n	<li>FORTUNE CARD SET : 102*152mm (12ea, 1set)</li>\r\n	<li>PAPER HOLDER : 180*245mm (13ea, 1set)</li>\r\n	<li>MINI POSTER SET : 35*45mm (12ea 1set)</li>\r\n	<li>PHOTO FRAME STICKER : 150*210mm</li>\r\n	<li>PAPER DOOR HANGER : 80*187.5mm</li>\r\n	<li>HEART MESSAGE CARD : 150*182mm (RANDOM 1ea of 13ea)</li>\r\n</ul>\r\n'),
	(2, 2, 'BR000002', 'Lightstick NCT', '670000', 14, 1, 'Lightstick_NCT.jpeg', '<ul>\r\n	<li>1 Light stick</li>\r\n	<li>1 Strap</li>\r\n	<li>1 User Manual and Warranty</li>\r\n</ul>\r\n'),
	(3, 3, 'BR000003', 'NCT DREAM Album GLITCH MODE Glitch Ver', '367500', 118, 1, 'NCT_DREAM_Album_GLITCH_MODE_Glitch_Ver1.jpeg', '<ul>\r\n <li>Photobook 88p</li>\r\n <li>CD - Photocard Set</li>\r\n <li>Folded Poster</li>\r\n <li>Sticker</li>\r\n <li>Lenticular Card (random 1ea)</li>\r\n <li>Photocard (Random 1ea)</li>\r\n <li>Roll Poster</li>\r\n <li>Special Tiket</li>\r\n</ul>\r\n');

-- Dumping structure for table db_dreamstore.detail_penjualan
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `no_penjualan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_barang` int NOT NULL,
  `harga_barang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah_barang` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sub_total` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  KEY `FK_detail_penjualan_barang` (`id_barang`),
  CONSTRAINT `FK_detail_penjualan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_dreamstore.detail_penjualan: ~10 rows (approximately)
INSERT INTO `detail_penjualan` (`no_penjualan`, `id_barang`, `harga_barang`, `jumlah_barang`, `satuan`, `sub_total`) VALUES
	('PJ000001', 1, '1650000', 1, 'PCS', '1650000'),
	('PJ000001', 3, '367500', 2, 'PCS', '735000'),
	('PJ000001', 2, '670000', 1, 'PCS', '670000'),
	('PJ000002', 1, '1650000', 5, 'PCS', '8250000');

-- Dumping structure for table db_dreamstore.kasir
CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int NOT NULL AUTO_INCREMENT,
  `kode_kasir` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kasir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username_kasir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password_kasir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_kasir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_kelamin_kasir` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kasir`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Dumping data for table db_dreamstore.kasir: ~2 rows (approximately)
INSERT INTO `kasir` (`id_kasir`, `kode_kasir`, `nama_kasir`, `username_kasir`, `password_kasir`, `email_kasir`, `jenis_kelamin_kasir`) VALUES
	(1, 'KASIR-01', 'Rena', 'kasir1', 'kasir111', 'rena@gmail.com', 'Perempuan'),
	(2, 'KASIR-02', 'Kevin', 'kasir2', 'kasir222', 'kevin@gmail.com', 'Laki-Laki');

-- Dumping structure for table db_dreamstore.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_dreamstore.kategori: ~5 rows (approximately)
INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
	(1, 'KG000001', 'Seasons Greeting'),
	(2, 'KG000002', 'Lightstick'),
	(3, 'KG000003', 'Album'),
	(4, 'KG000004', 'Photocard'),
	(5, 'KG000005', 'Digipack Album'),
	(6, 'KG000006', 'Magazine'),
	(7, 'KG000007', 'Polaroid'),
	(8, 'KG000008', 'Jewel Case Album'),
	(9, 'KG000009', 'Hoodie'),
	(10, 'KG000010', 'Notebook'),
	(11, 'KG000011', 'Jacket'),
	(12, 'KG000012', 'T-Shirt'),
	(13, 'KG000013', 'Totebag'),
	(14, 'KG000014', 'Bagpack'),
	(15, 'KG000015', 'Pouch');

-- Dumping structure for table db_dreamstore.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `no_penjualan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kasir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_penjualan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jam_penjualan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Dumping data for table db_dreamstore.penjualan: ~0 rows (approximately)
INSERT INTO `penjualan` (`id_penjualan`, `no_penjualan`, `nama_kasir`, `tgl_penjualan`, `jam_penjualan`, `total`) VALUES
	(13, 'PJ000001', 'Gaby', '11/29/2023', '11:21:11', 3055000),
	(14, 'PJ000002', 'Rena', '11/29/2023', '11:22:31', 8250000);

-- Dumping structure for table db_dreamstore.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_dreamstore.satuan: ~2 rows (approximately)
INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
	(1, 'PCS'),
	(2, 'SET');

-- Dumping structure for table db_dreamstore.toko
CREATE TABLE IF NOT EXISTS `toko` (
  `id_toko` int NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_pemilik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tlp_toko` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat_toko` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_toko`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_dreamstore.toko: ~0 rows (approximately)
INSERT INTO `toko` (`id_toko`, `nama_toko`, `nama_pemilik`, `tlp_toko`, `alamat_toko`) VALUES
	(1, 'DREAM STORE', 'Gaby', '08123456789', 'Madiun');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
