CREATE DATABASE  IF NOT EXISTS `jejak_hijau` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jejak_hijau`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: jejak_hijau
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Administrator','admin','$2y$10$Rc8cXt8YK6Lvl82bfYh/2ejzkU0lV7qjA795X2iTbZuqVsv.61rOu',NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artikel` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `kategori_id` int unsigned NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_publikasi` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_artikel_kategori` (`kategori_id`),
  CONSTRAINT `fk_artikel_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel`
--

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
INSERT INTO `artikel` VALUES (1,'Pesona dan Panduan Pendakian Gunung Rinjani: Atap Pulau Lombok','pesona-dan-panduan-pendakian-gunung-rinjani-atap-pulau-lombok',1,'Dian Pratama','<p>Gunung Rinjani, dengan ketinggian 3.726 mdpl, merupakan gunung berapi tertinggi kedua di Indonesia yang menjadi impian banyak pendaki domestik maupun mancanegara. Terkenal dengan pemandangan Danau Segara Anak yang memukau di puncaknya, Rinjani menawarkan pengalaman petualangan alam yang lengkap dan menantang.</p><p><br></p><h3><strong>1. Daya Tarik Utama Gunung Rinjani</strong></h3><ul><li><strong>Danau Segara Anak &amp; Gunung Barujari:</strong> Danau kawah berwarna biru kehijauan ini terletak di ketinggian sekitar 2.000 mdpl. Di tengah danau tumbuh Gunung Barujari yang merupakan anak Gunung Rinjani yang masih aktif.</li><li><strong>Keindahan Sabana Sembalun:</strong> Jalur pendakian Sembalun menyuguhkan hamparan padang rumput sabana yang luas dengan pemandangan perbukitan yang megah.</li><li><strong>Pemandangan dari Puncak (3.726 mdpl):</strong> Saat berdiri di puncak Rinjani, Anda dapat menikmati pemandangan spektakuler Gunung Agung di Bali dan Gunung Tambora di Sumbawa di antara lautan awan.</li></ul><p><br></p><h3><strong>2. Jalur Pendakian Populer</strong></h3><ul><li><strong>Jalur Sembalun:</strong> Jalur favorit untuk naik karena lanskapnya yang terbuka. Jalur ini memiliki trek yang relatif landai di awal, lalu menanjak terjal di area Bukit Penyesalan sebelum mencapai Plawangan Sembalun.</li><li><strong>Jalur Senaru:</strong> Jalur yang dikelilingi hutan hujan tropis yang lebat. Jalur ini sangat cocok bagi pendaki yang menyukai suasana rindang dan sejuk, serta sering digunakan sebagai jalur turun menuju desa Senaru.</li></ul><p><br></p><h3><strong>3. Persiapan dan Etika Pendakian</strong> </h3><p>Pendakian Rinjani membutuhkan fisik yang prima dan perencanaan yang matang. Pastikan Anda menyiapkan fisik beberapa minggu sebelum keberangkatan, serta membawa perlengkapan yang memadai. Untuk menjaga keselamatan dan kenyamanan selama di gunung, selalu terapkan <a href=\"https://youtu.be/Kqht8M6xxD0?si=FJ4O-C50eK8wBMVN\" rel=\"noopener noreferrer\" target=\"_blank\"><u>prinsip pertolongan pertama dan perlengkapan wajib pendaki.</u></a></p><p>Selain keselamatan, menjaga kelestarian kawasan Taman Nasional Gunung Rinjani adalah kewajiban setiap pengunjung. Selalu bawa kembali semua sampah logistik Anda ke bawah dengan menerapkan panduan pendakian bebas sampah <a href=\"https://youtu.be/m4T6AMF7wLI?si=AA0fL4C7w8qz0nU1\" rel=\"noopener noreferrer\" target=\"_blank\"><u>(zero waste)</u></a>.</p>','uploads/artikel/1786866396_21dc2eb26be13b9d1f6a.jpg','2026-07-01','2026-08-15 22:29:07','2026-08-16 07:51:47'),(2,'Surga Tersembunyi: 5 Pantai Hidden Gem di Indonesia yang Masih Asri','surga-tersembunyi-5-pantai-hidden-gem-di-indonesia-yang-masih-asri',2,'Rani Kusuma','<p>Indonesia terkenal dengan garis pantainya yang membentang luas dari ujung barat hingga timur. Bagi Anda yang ingin menikmati keindahan pesisir tanpa hiruk-piruk keramaian, mendatangi pantai <em>hidden gem</em> yang masih alami adalah pilihan sempurna. Berikut 5 rekomendasi pantai tersembunyi di Indonesia yang menawarkan suasana tenang dan panorama menakjubkan:</p><ol><li><strong>Pantai Tangsi (Pantai Pink), Lombok</strong> Terletak di Desa Sekaroh, Lombok Timur, pantai ini menawarkan keunikan pasir berwarna kemerahan hasil percampuran pasir putih dengan serpihan karang merah yang hancur. Suasananya jauh lebih tenang dibanding pantai-pantai utama di Lombok, menjadikannya tempat yang ideal untuk bersantai dan berfoto.</li><li><strong> Pantai Mbawana, Sumba Barat Daya</strong> Pantai Mbawana terkenal dengan tebing batu karang tinggi dan lubang alami berukuran besar yang menjadi ikonnya. Hamparan pasir putih yang luas dipadu dengan ombak khas Samudra Hindia memberikan lanskap yang sangat dramatis, terutama saat matahari terbenam.</li><li><strong>Pantai Kelingking, Nusa Penida</strong> Berada di pulau Nusa Penida, Bali, pantai ini menawarkan tebing karang unik yang menyerupai bentuk T-Rex. Untuk mencapai pesisir pasir putihnya di bawah tebing, pengunjung harus menuruni jalur yang cukup terjal, sehingga keasrian dan kebersihan areanya masih sangat terjaga.</li><li><strong>Pantai Oyama, Luwuk (Sulawesi Tengah)</strong> Berlokasi di Kabupaten Banggai, Pantai Oyama menyajikan perpaduan pasir putih halus dengan air laut jernih berwarna gradasi biru kehijauan. Dikelilingi pepohonan rindang dan nuansa yang masih sepi, pantai ini menjadi tempat sempurna untuk relaksasi.</li><li><strong>Pantai Mandorak, Sumba Barat</strong> Terapit di antara dua tebing karang terjal yang saling berhadapan, Pantai Mandorak bagaikan kolam renang alami di tepi laut. Airnya yang jernih dan suasana pesisir yang relatif sepi menjadikan destinasi ini pas bagi pencari ketenangan dan keindahan alam autentik.</li></ol><p><br></p><h3><strong>Tips Mengunjungi Pantai <em>Hidden Gem</em>:</strong></h3><p><br></p><ul><li><strong>Jaga Keasrian:</strong> Selalu bawa kembali sampah Anda dan hindari merusak ekosistem karang maupun biota laut.</li><li><strong>Persiapkan Fisik dan Logistik:</strong> Beberapa pantai tersembunyi membutuhkan akses jalan kaki yang menantang dan minim penjual makanan/minuman, jadi siapkan perbekalan secukupnya dari rumah.</li></ul>','uploads/artikel/1786866193_893de0a689439d2d0738.jpg','2026-07-03','2026-08-15 22:29:07','2026-08-16 07:43:13'),(3,'Segarnya Air Terjun Tumpak Sewu','segarnya-air-terjun-tumpak-sewu',3,'Fajar Nugroho','<p>Dijuluki \"Niagara van Java\", Air Terjun Tumpak Sewu memiliki debit air yang sangat besar dan tebing yang menjulang di sekelilingnya.</p>','uploads/artikel/1786865756_239d163f7ad0f56f86f4.jpg','2026-07-05','2026-08-15 22:29:07','2026-08-16 07:35:56'),(4,'Menjelajahi Hutan Mangrove Karimunjawa','menjelajahi-hutan-mangrove-karimunjawa',4,'Dian Pratama','<p>Kawasan konservasi mangrove di Karimunjawa menjadi rumah bagi berbagai satwa dan berperan penting menjaga garis pantai.</p>','uploads/artikel/1786865812_2d570bfd0366752867ef.jpeg','2026-07-08','2026-08-15 22:29:07','2026-08-16 07:36:52'),(5,'Pesona Danau Kelimutu Tiga Warna','pesona-danau-kelimutu-tiga-warna',5,'Rani Kusuma','<p>Danau Kelimutu terkenal dengan tiga warna air yang berbeda dan dapat berubah seiring waktu karena kandungan mineral vulkanik.</p>','uploads/artikel/1786865932_d6f955abe2945606ad0a.jpg','2026-07-10','2026-08-15 22:29:07','2026-08-16 07:38:52'),(6,'Trekking Sunrise di Gunung Bromo','trekking-sunrise-di-gunung-bromo',1,'Fajar Nugroho','<p>Menyaksikan matahari terbit dari Penanjakan adalah pengalaman yang wajib dicoba saat mengunjungi Gunung Bromo.</p>','uploads/artikel/1786865681_b3717e5c566a111d2ccd.jpeg','2026-07-12','2026-08-15 22:29:07','2026-08-16 07:34:42'),(7,'Misteri dan Keindahan Danau Situ Gunung: Meniti Jembatan Gantung Terpanjang di Asia Tenggara','misteri-dan-keindahan-danau-situ-gunung-meniti-jembatan-gantung-terpanjang-di-asia-tenggara',5,'Sherly Eka','<p>Terletak di kawasan Taman Nasional Gunung Gede Pangrango, Sukabumi, Situ Gunung menawarkan paket wisata alam lengkap mulai dari danau asri hingga petualangan memacu adrenalin.</p><h2>Apa yang Bisa Anda Temukan di Situ Gunung:</h2><ol><li><strong>Suspension Bridge:</strong> Jembatan gantung ikonik sepanjang ratusan meter yang memberikan sensasi melayang di atas kanopi pohon damar.</li><li><strong>Ketenangan Danau:</strong> Menikmati suasana danau yang tenang dan udara pegunungan yang sangat segar jauh dari hiruk-pikuk kota.</li><li><strong>Trekking ke Air Terjun Sawer:</strong> Jalur perjalanan kaki yang menantang namun menyegarkan menuju air terjun di tengah hutan yang lebat.</li></ol><h2>Menuju Air Terjun Sawer</h2><p>Setelah puas menyeberangi jembatan gantung dan menikmati ketenangan air Danau Situ Gunung, perjalanan dapat dilanjutkan dengan trekking ringan menuju Air Terjun Sawer yang berada di sekitar kawasan tersebut untuk menikmati kesegaran air pegunungan secara langsung.</p>','uploads/artikel/1786865572_243bbbe6fd7c2cba09b7.jpg','2026-08-15','2026-08-15 17:43:59','2026-08-16 07:32:52'),(10,'Menikmati Eksotisme Sunset di Pantai Klayar dengan Karang Uniknya','menikmati-eksotisme-sunset-di-pantai-klayar-dengan-karang-uniknya',2,'Sherly Eka','<p>Terletak di pesisir selatan Kabupaten Pacitan, Pantai Klayar menyuguhkan panorama pantai berpasir putih yang dipadukan dengan jajaran tebing karang kars yang megah dan eksotis.</p><h2>Fenomena Alam yang Menarik</h2><p>Daya tarik utama Pantai Klayar bukan hanya hamparan pasirnya, melainkan suara deburan ombak yang menerobos celah karang sempit dan menciptakan bunyi mirip tiupan suling, yang sering disebut sebagai <strong>Seruling Samudra</strong>. Selain itu, terdapat pula air mancur alami yang menyembur tinggi akibat desakan ombak besar di balik karang.</p><h2>Waktu Terbaik untuk Berkunjung</h2><p>Menjelang sore hari adalah saat paling ideal untuk menikmati suasana pantai ini. Langit senja yang perlahan berubah warna berpadu dengan siluet tebing karang memberikan pengalaman visual yang luar biasa bagi para pengunjung maupun fotografer alam.</p>','uploads/artikel/1786865084_2e539a7656a8f0821f47.jpeg','2026-08-15','2026-08-15 20:35:54','2026-08-16 07:26:19'),(11,'Menembus Kabut Pagi: Panduan Jalur Pendakian Gunung Semeru untuk Pemula','menembus-kabut-pagi-panduan-jalur-pendakian-gunung-semeru-untuk-pemula',1,'Sherly Eka','<p>Gunung Semeru selalu memiliki daya pikat tersendiri bagi para pencinta alam. Dengan puncaknya yang Mahameru, gunung tertinggi di Pulau Jawa ini menawarkan lanskap sabana yang luas serta danau vulkanik yang memesona.</p><h2>Persiapan Fisik dan Mental Sebelum Mendaki</h2><p>Sebelum memulai perjalanan, latihan kardio seperti <em>jogging</em> atau berenang sangat dianjurkan minimal satu bulan sebelumnya. Selain fisik, mental untuk menghadapi cuaca dingin ekstrem dan jalur menanjak juga perlu dipersiapkan secara matang.</p><h2>Menikmati Keindahan Ranu Kumbolo</h2><p>Perjalanan biasanya dimulai dari pos pendaftaran Ranu Pane. Dari sana, pendaki akan melewati jalur setapak yang dikelilingi bukit hijau sebelum akhirnya tiba di Ranu Kumbolo. Danau ini menjadi lokasi favorit untuk mendirikan tenda, menikmati matahari terbit, dan beristirahat sejenak sebelum melanjutkan perjalanan ke area yang lebih tinggi.</p>','uploads/artikel/1786865004_1056cc95e365c3cccae4.jpeg','2026-08-16','2026-08-15 20:36:15','2026-08-16 07:25:59'),(12,'Ekspedisi Saba Budaya Baduy: Pesona Alam dan Tradisi Desa Kanekes','ekspedisi-saba-budaya-baduy-pesona-alam-dan-tradisi-desa-kanekes',7,'Sherly Eka','<h2>Menjelajahi kawasan adat Suku Baduy di Kabupaten Lebak, Banten, menawarkan petualangan alam yang sarat akan kearifan lokal.</h2><p><br></p><ol><li>Mengenal Kawasan Adat Baduy</li></ol><ul><li>Baduy Luar: Terbuka bagi wisatawan, masyarakat mengenakan pakaian serba hitam/biru tua, dan penggunaan teknologi modern masih diperbolehkan.</li><li>Baduy Dalam: Menjaga keasrian tradisi secara ketat dengan pakaian serba putih, tanpa alas kaki, serta membatasi penggunaan barang elektronik dan fotografi.</li></ul><p><br></p><p>EDITT</p>','uploads/artikel/1786870493_489718b93d4ddc276703.jpeg','2026-08-16','2026-08-16 08:54:53','2026-08-16 08:55:11'),(13,'Pesona dan Panduan Pendakian Gunung Rinjani: Atap Pulau Lombok','pesona-dan-panduan-pendakian-gunung-rinjani-atap-pulau-lombok',1,'Sherly Eka','<p>Ini adalah isi artikel</p>','uploads/artikel/1786874884_717e61dd8307ef1d000d.jpeg','2026-08-16','2026-08-16 10:08:04','2026-08-16 10:08:04');
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Gunung & Pendakian','2026-08-15 22:29:07','2026-08-15 22:29:07'),(2,'Pantai & Bahari','2026-08-15 22:29:07','2026-08-15 22:29:07'),(3,'Air Terjun','2026-08-15 22:29:07','2026-08-15 22:29:07'),(4,'Hutan & Konservasi','2026-08-15 22:29:07','2026-08-15 22:29:07'),(5,'Danau','2026-08-15 22:29:07','2026-08-15 22:29:07'),(7,'Budaya','2026-08-16 08:51:16','2026-08-16 08:51:45');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-16 17:44:36
