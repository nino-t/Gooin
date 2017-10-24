-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2015 at 06:26 
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lomba`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `category_desc` varchar(45) DEFAULT NULL,
  `category_sts` int(11) DEFAULT '1',
  `category_slug` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_sts`, `category_slug`) VALUES
(2, 'Android', 'Kategori Untuk Aplikasi Android', 0, 'android'),
(3, 'Hardware', 'Ayo tunjukan kalau Indonesia bisa membuat Har', 1, 'hardware'),
(4, 'Software', 'Software - software inovatif', 1, 'software'),
(5, 'Android Apps', 'android', 1, 'android-apps'),
(6, 'Internet', 'Deskripsi inovasi-inovasi di bidang internet', 1, 'internet'),
(7, 'Sistem Operasi', 'Kategori inovasi sistem operasi di indonesia', 1, 'sistem-operasi');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quote_id` int(11) DEFAULT '0',
  `comment_content` text,
  `comment_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `comment_type` int(11) DEFAULT '1',
  `anonymos` varchar(45) DEFAULT NULL,
  `comment_sts` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `quote_id`, `comment_content`, `comment_time`, `comment_type`, `anonymos`, `comment_sts`) VALUES
(1, 14, 3, 0, 'Keren semoga indonesia bisa lebih maju', '2015-10-02 21:45:53', 1, NULL, 1),
(2, 14, 3, 0, 'Halloo', '2015-10-02 22:14:57', 1, NULL, 1),
(3, 14, 3, 1, 'Makasih gan :D', '2015-10-03 12:22:31', 1, NULL, 1),
(4, 14, 3, 2, 'Haii', '2015-10-03 12:43:01', 1, NULL, 1),
(7, 14, NULL, 0, 'Test', '2015-10-05 14:02:46', 1, 'Ala Rai', 1),
(8, 14, 3, 0, 'Test', '2015-10-05 14:03:54', 1, NULL, 1),
(9, 14, 3, 0, 'kda;dka;wk', '2015-10-05 14:05:02', 1, NULL, 1),
(10, 28, 12, 0, 'bagus', '2015-10-10 21:48:17', 1, NULL, 1),
(11, 28, NULL, 0, 'mantap', '2015-10-10 21:50:03', 1, 'trisno', 1),
(12, 28, NULL, 10, 'bagus lagi', '2015-10-10 21:50:48', 1, 'trisno', 1),
(13, 29, 13, 0, 'kkkk', '2015-10-10 22:04:01', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `youtube_id` varchar(255) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `post_content` text,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `link_website` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT NULL,
  `post_like` int(11) DEFAULT '0',
  `post_sts` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `category_id`, `user_id`, `youtube_id`, `post_title`, `title`, `post_content`, `post_slug`, `post_image`, `link_website`, `date_create`, `date_update`, `post_like`, `post_sts`) VALUES
(14, 4, 3, '6qAWAuINO0E', 'Find Kontrakan', 'Find Kontrakan', 'Aplikasi pencari kontrakan', 'find-kontrakan', 'cf8ce66953fb30a69e27c8677516f7a0.png', 'www.4rayz.blogspot.com', '2015-10-02 19:05:53', NULL, 1, 0),
(16, 3, NULL, '6qAWAuINO0E', 'dadasd', 'dadasd', 'dasdawdada', 'dadasd', '081525c0696d589cf6f93b3b26eb94ad.png', 'http://4rayz.blogspot.co.id/', '2015-10-03 21:54:48', NULL, 0, 0),
(17, 2, 3, '6qAWAuINO0E', 'dadaw', 'dadaw', 'dasddwa', 'dadaw', '4883cc78356ddef58b7562eeca8a0c09.png', 'www.4rayz.blogspot.com', '2015-10-03 21:59:11', NULL, 0, 0),
(19, 2, 3, '', 'Gooin', 'Gooin', '<h1>Tujuan Kita</h1>\r\n\r\n<ol>\r\n	<li>Untuk menginspirasi orang lain untuk berinovasi</li>\r\n	<li>Menshare inovasi terbaru</li>\r\n</ol>\r\n', 'gooin', '7b0284180982e0442bece25a4a546bd1.png', '', '2015-10-04 19:23:37', NULL, 0, 0),
(20, 0, 3, '', 'test', 'test', '<p><img alt="" src="http://localhost/gooin//uploads/post_content/user_icon.png" style="height:270px; width:270px" /></p>\r\n', 'test', NULL, '', '2015-10-04 20:32:43', NULL, 0, 0),
(21, 2, 3, '', 'das', 'das', '<p><img alt="" src="http://localhost/gooin//uploads/post_content/PHP_Logo.png" style="height:325px; width:520px" /></p>\r\n', 'das', NULL, '', '2015-10-04 20:33:15', NULL, 0, 0),
(22, 0, 3, '', 'ada', 'ada', '', 'ada', NULL, '', '2015-10-04 20:43:40', NULL, 0, 0),
(23, 3, 3, '6qAWAuINO0E', 'Da Da Da', 'Da Da Da', '<p>dadamd;aw;doko;aksd;</p>\r\n', 'da-da-da', '77264300100fbaf69356d4f6b033cf95.png', 'http://4rayz.blogspot.co.id/', '2015-10-05 08:32:42', NULL, 0, 0),
(24, 2, 3, '', '4G LTE', '4G LTE', '<p>ggkgkgkgkggkgkugkgku</p>\r\n', '4g-lte', 'e32016387062dadd8784c627e1994236.png', '', '2015-10-10 06:49:01', NULL, 0, 0),
(25, 5, 3, '5m5aydSO6oY', 'Kamus Bergambar', 'Kamus Bergambar', '<p>Aplikasi Kamus Bergambar ini merupakan salah satu alat pembelajaran semua umur yang dapat mempercepat pemahaman terhadapat arti kata.</p>\r\n\r\n<p>Kamus dilengkapi dengan database gambar serta kata-kata yang menjelaskan mengenai gambar tersebut.&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Kamus bergambar dapat membatu dalam memahami anatomi sesuatu karena memvisualisasikan bentuk aslinya sehingga mudah dipahami oleh otak.</p>\r\n\r\n<p>Aplikasi yang dapat diakses online ini sangat baik digunakan untuk berbagi pengetahuan di segala bidang, seperti kedokteran, sains, teknik, maupun ilmu sosial ekonomi.<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n', 'kamus-bergambar', 'bc2fe21d44b068eabecb3e1c8d0f3bdb.jpg', 'http://kamusbergambar.stis.web.id/', '2015-10-10 08:27:51', NULL, 0, 1),
(27, 2, 3, 'lOl39lDHgSY', 'Gojek', 'Gojek', '<h2>Apa itu <strong>GoJek</strong>?</h2>\r\n\r\n<p>Sebuah layanan booking ojek melalui aplikasi GoJek yang bisa didownload di Smartphone android &amp; iPhone.</p>\r\n\r\n<p>GoJek menawarkan 4 (empat) jasa layanan yang bisa dimanfaatkan oleh para pelanggannya: <strong><em>Instant Courier</em></strong> (Pengantaran Barang), <strong><em>Transport</em></strong> (Jasa Angkutan), <strong><em>Shopping</em></strong> (Belanja) dan <strong><em>Corporate</em></strong> (Kerjasama dengan perusahaan untuk jasa kurir) yang menekankan keunggulan dalam Kecepatan, Inovasi dan Interaksi Sosial.</p>\r\n\r\n<p>Btw, masker dan penutup kepala itu fasilitas gratis dari <strong>GoJek</strong>. Semua pengendaranya juga pakai seragam dan helm hijau berlogo <strong>GoJek</strong>. Nah ini beberapa kelebih Gojek dibanding ojek pangkalan :</p>\r\n\r\n<p><em>1. Nggak perlu nyari ojek di pinggir jalan. Nunggu dalem kantor, ojek dateng baru deh turun.</em></p>\r\n\r\n<p><em>2. Nggak perlu tawar menawar harga. Semua udah langsung terkalkulasi saat order.</em></p>\r\n\r\n<p><em>3. Tukang ojek rapi dengan jaket dan helm seragam.</em></p>\r\n\r\n<p><em>4. Free masker dan free penutup kepala. Say no to penularan kutu rambut lewat helm. YAIKS!</em></p>\r\n\r\n<p><em>5. Bisa kirim barang, minta tolong beli tiket bioskop, minta tolong beli apapun bebas! Jadi nggak perlu kitanya ikutan pergi. Dibeliin dulu sama mamang ojeknya.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Siapa Pendirinya?</strong></h2>\r\n\r\n<p><img alt="" src="http://localhost/gooin//uploads/post_content/0232c491552ff5e0a4e200628f56c3ee.jpg" style="height:357px; width:764px" /></p>\r\n\r\n<p>Pria muda kelahiran 4 Juli 1984 ini mendirikan GO-JEK di Jakarta. Selain bersifat bisnis, ada misi sosial yang diemban, meningkatkan pendapatan para tukang ojek di Jakarta. Meski sempat tidak bisa melihat kemajuan GO-JEK karena harus sekolah di Amerika, bungsu dari 3 bersaudara ini berhasrat untuk terus mengembangkan GO-JEK, salah satunya dengan menggandeng berbagai perusahaan.</p>\r\n\r\n<h2><strong>Ide awal pendirian GO-JEK darimana?</strong></h2>\r\n\r\n<p>Idenya muncul saat ngobrol dengan tukang ojek langganan saya. Ternyata lebih dari 70% waktu kerjanya hanya menunggu pelanggan. Saya pun langsung wawancara tukang ojek lainnya, ternyata semuanya mengeluh susah cari pelanggan. Apalagi di Jakarta kemacetan makin memburuk. Jika ada layanan transport dan delivery yang cepat dan praktis, pasti akan sangat membantu warga Jakarta.</p>\r\n\r\n<h2><strong>Kapan berdirinya?</strong></h2>\r\n\r\n<p>Tahun lalu (2010) GO-JEK mulai beroperasi. GO mencerminkan layanan kami yang serba cepat dan proaktif. Kami ingin menciptakan suatu brand dimana nilai-nilai tambah utama GO-JEK akan langsung dimengerti pelanggan kami, yaitu kemudahan dan kecepatan.</p>\r\n', 'gojek', 'f8e3bf94a98210db761bce50d8d269a6.jpg', 'http://www.go-jek.com/', '2015-10-10 13:39:19', NULL, 0, 0),
(28, 5, 10, 'lOl39lDHgSY', 'Go-jek', 'Go-jek', '<h2>Apa itu <strong>GoJek</strong>?</h2>\r\n\r\n<p>Sebuah layanan booking ojek melalui aplikasi GoJek yang bisa didownload di Smartphone android &amp; iPhone.</p>\r\n\r\n<p>GoJek menawarkan 4 (empat) jasa layanan yang bisa dimanfaatkan oleh para pelanggannya: <strong><em>Instant Courier</em></strong> (Pengantaran Barang), <strong><em>Transport</em></strong> (Jasa Angkutan), <strong><em>Shopping</em></strong> (Belanja) dan <strong><em>Corporate</em></strong> (Kerjasama dengan perusahaan untuk jasa kurir) yang menekankan keunggulan dalam Kecepatan, Inovasi dan Interaksi Sosial.</p>\r\n\r\n<p>Btw, masker dan penutup kepala itu fasilitas gratis dari <strong>GoJek</strong>. Semua pengendaranya juga pakai seragam dan helm hijau berlogo <strong>GoJek</strong>. Nah ini beberapa kelebih Gojek dibanding ojek pangkalan :</p>\r\n\r\n<p><em>1. Nggak perlu nyari ojek di pinggir jalan. Nunggu dalem kantor, ojek dateng baru deh turun.</em></p>\r\n\r\n<p><em>2. Nggak perlu tawar menawar harga. Semua udah langsung terkalkulasi saat order.</em></p>\r\n\r\n<p><em>3. Tukang ojek rapi dengan jaket dan helm seragam.</em></p>\r\n\r\n<p><em>4. Free masker dan free penutup kepala. Say no to penularan kutu rambut lewat helm. YAIKS!</em></p>\r\n\r\n<p><em>5. Bisa kirim barang, minta tolong beli tiket bioskop, minta tolong beli apapun bebas! Jadi nggak perlu kitanya ikutan pergi. Dibeliin dulu sama mamang ojeknya.</em></p>\r\n\r\n<p><strong>Ide awal pendirian GO-JEK darimana?</strong></p>\r\n\r\n<p>Idenya muncul saat ngobrol dengan tukang ojek langganan saya. Ternyata lebih dari 70% waktu kerjanya hanya menunggu pelanggan. Saya pun langsung wawancara tukang ojek lainnya, ternyata semuanya mengeluh susah cari pelanggan. Apalagi di Jakarta kemacetan makin memburuk. Jika ada layanan transport dan delivery yang cepat dan praktis, pasti akan sangat membantu warga Jakarta.</p>\r\n\r\n<p><strong>Kapan berdirinya?</strong></p>\r\n\r\n<p>Tahun lalu (2010) GO-JEK mulai beroperasi. GO mencerminkan layanan kami yang serba cepat dan proaktif. Kami ingin menciptakan suatu brand dimana nilai-nilai tambah utama GO-JEK akan langsung dimengerti pelanggan kami, yaitu kemudahan dan kecepatan.</p>\r\n', 'go-jek', '3fb8e26feb3f1ff6e5f6cb02563617a9.jpg', 'http://www.go-jek.com/', '2015-10-10 17:18:36', NULL, 0, 1),
(29, 6, 11, '', '4G LTE', '4G LTE', '<p>OFDM (Orthogonal Frequency Division Multiplexing) merupakan teknik modulasi untuk komunikasi wireless broadband yang tahan melawan frekuensi selective fading dan interferensi narrowband dan efisien menghadapi multi-path delay spread. Untuk mencapai hal tersebut, OFDM membagi aliran data high-rate mejadi aliran rate yang lebih rendah, yang kemudian dikirimkan secara bersama pada beberapa sub-carrier. OFDM biasanya memerlukan cyclic prefix (CP) sehingga efek channel circulant bisa diperoleh. Circulant pada channel ini sangat memudahkan perhitungan karena keberadaan FFT/IFFT pada OFDM. OFDM hanya menggunakan satu (I)FFT para transmitter dan satu FFT para receiver. Hanya saja penggunaan CP ini justru membuat transmisi data tidak efisien, karena CP sebenarnya symbol yang di-copy kemudian dikirimkan (tidak mengandung informasi).</p>\r\n\r\n<p>Namun dengan konsep yang diusulkan oleh Khoirul bersama kolega, yaitu dengan equalization berantai, disebut chained turbo equalization (CHATUE), CP (juga guard interval) mampu dihilangkan sama sekali namun tidak mengurangi performance dari system. CP ini bisa dihilangkan dengan memanfaatkan dan mengumpulkan energi yang tersebar di awal dan di belakang blok data yang sedang diproses. Ini mirip dengan proses pengumpulan energi genki dama pada serial animasi Dragon Ball. Temuan Khoirul Anwar ini kemudian mendapatkan penghargaan Young Scientist Encouragement award pada Institute of Electrical and Electronics Engineers Vehicular Technology Conference (IEEE VTC) 2010-Spring yang digelar 16-19 Mei 2010, di Taiwan. Kini hasil temuan yang telah dipatenkan itu digunakan oleh sebuah perusahaan elektronik besar asal Jepang. Asisten Profesor berusia 31 tahun itu dapat mematahkan anggapan yang awalnya &lsquo;tak mungkin&rsquo; di dunia telekomunikasi. Kini sebuah sinyal yang dikirimkan secara nirkabel, tak perlu lagi diperisai oleh guard interval (GI) untuk menjaganya kebal terhadap delay, pantulan, dan interferensi. Turbo equalizer akan membatalkan interferensi sehingga sinyal bisa diterima.</p>\r\n\r\n<p>Dengan mengenyahkan CP atau GI, dan memanfaatkan dekoder turbo, secara teoritis malah bisa menghilangkan rugi daya transmisi karena tak perlu mengirimkan daya untuk GI. Hilangnya GI juga bisa diisi oleh parity bits yang bisa digunakan untuk memperbaiki kesalahan akibat distorsi (error correction coding). Gagasan ini sendiri, dikerjakan Khoirul bersama Tadashi Matsumoto, profesor utama di laboratorium tempat Khoirul bekerja. Saat itu ia dan Tadashi hendak mengajukan proyek ke Kinki Mobile Wireless Center. Setelah menurunkan formula matematikanya secara konkrit, Khoirul meminta rekannya Hui Zhou, untuk membuat programnya. Metode ini mampu memecahkan problem transmisi nirkabel. Apalagi bisa diterapkan pada hampir semua sistem telekomunikasi, termasuk GSM (2G), CDMA (3G), dan cocok untuk diterapkan pada sistem 4G yang membutuhkan kinerja tinggi dengan tingkat kompleksitas rendah.</p>\r\n\r\n<p>OFDM juga bisa diterapkan Indonesia, terlebih di kota besar yang punya banyak gedung pencakar langit dan daerah pegunungan. Sebab di daerah tersebut biasanya gelombang yang ditransmisikan mengalami pantulan dan delay lebih panjang. Temuan ini mendapat penghargaan Best Paper untuk kategori Young Scientist pada Institute of Electrical and Electronics Engineers Vehicular Technology Conference (IEEE VTC) 2010-Spring yang digelar 16-19 Mei 2010, di Taiwan. Temuan ini telah dipatenkan tahun 2010 dan kemungkinan besar dipakai untuk teknologi masa depan yang harus tetap optimal karena tantangan sinkronisasi (karena banyaknya device yang saling terhubung).</p>\r\n', '4g-lte', 'a40c5a845e4e45cdb52b6bd517aed0e3.jpg', '', '2015-10-10 17:29:43', NULL, 0, 1),
(30, 4, 3, '', 'E-Penalty', 'E-Penalty', '<p>E-Penalty merupakan aplikasi berbasis web yang digunakan untuk pencatatan point pelanggaran siswa di sekolah.<br />\r\nAplikasi ini berguna untuk memonitoring pelanggaran siswa. Menggunakan Codeigniter sebagai framework pengembangan nya, dan menggunakan template Admin-LTE</p>\r\n', 'e-penalty', '3652a51ad172a85c81e02127b3c5f135.png', 'http://4rayz.blogspot.co.id/', '2015-10-10 17:45:57', NULL, 0, 1),
(31, 3, 12, '', 'Sepeda Kreasi Mahasiswa ITS Ini Bisa Jadi Charger HP ', 'Sepeda Kreasi Mahasiswa ITS Ini Bisa Jadi Charger HP ', '<p>&quot;E2-Bike itu <em>charger</em> HP yang ramah lingkungan, karena daya baterai HP-nya didapat dengan bantuan sepeda, sehingga mengurangi konsumsi listrik,&quot; kata ketua tim mahasiswa ITS, Dennys Al Fath.<br />\r\n<br />\r\nDidampingi empat rekannya, ia mengatakan, karya yang diikutsertakan Program Kreativitas Mahasiswa Karsa Cipta (PKM-KC) pada Pimnas ke-28 di Kendari pada 5 hingga 9 Oktober itu membuat tegangan dan arus yang diterima HP akan lebih stabil dan sesuai dengan spesifikasinya.<br />\r\n<br />\r\nPKM berjudul &quot;Generator Listrik Tenaga Rotasi Magnet Pada Electric Eco Bike Untuk Charge Handphone&quot; itu dilatarbelakangi kebutuhan energi listrik yang terus meningkat di Indonesia.<br />\r\n<br />\r\n&quot;Utamanya dalam rumah tangga, konsumsi listrik terbesar adalah proses pengisian baterai <em>handphone</em>,&quot;.<br />\r\n<br />\r\nPenjelasan Dennys itu merujuk data Badan Pusat Statistik (BPS) 2015 bahwa jumlah penggunaan handphone di Indonesia pada tahun 2014 mencapai 308,2 juta unit. Jumlah tersebut melebihi jumlah penduduk Indonesia pada tahun 2014 sebesar 255,5 juta jiwa.<br />\r\n<br />\r\n&quot;Tentunya data BPS itu memberikan bukti yang cukup kuat jika dikonversikan dalam penggunaan daya listrik dalam <em>charging handphone</em>,&quot; kata mahasiswa Teknik Fisika ITS itu.<br />\r\n<br />\r\nOleh karena itu, Dennys bersama I Made Agus Adi Wirawan, Ivan Taufik Akbar Pradhana, Naufal Nugrahandhita, dan Ni Putu Rika Puspita pun memutuskan untuk menginovasikan sebuah alat yang lebih sesuai dengan mobilitas masyarakat Indonesia yang tinggi.<br />\r\n<br />\r\nAkhirnya, mereka merancang sebuah sepeda yang dapat menghasilkan energi listrik yang bernama Electric Eco Bike (E2-Bike).</p>\r\n', 'sepeda-kreasi-mahasiswa-its-ini-bisa-jadi-charger-hp', '202ec95d7c3f5575e7bc655ccbc36edb.jpg', '', '2015-10-10 21:36:26', NULL, 0, 1),
(32, 4, 13, '', 'Telkom edukasi penggunaan aplikasi UN CBT', 'Telkom edukasi penggunaan aplikasi UN CBT', '<p>UN CBT merupakan sistem yang digunakan dalam ujian nasional menggunakan sistem komputer. Selama pameran berlangsung petugas Teknisi dari Telkom bertugas melayani permintaan pengunjung apabila menginginkan pembelian paket UN CBT .<br />\r\nAplikasi UN CBT, lanjut Imam, di event festival kewirausahaan itu dengan konsep small classroom memakai server 1 PC koneksi internet HSI 50 Mbps. Aplikasi ini menggunakan 1 Access point untuk men-support Wifi.id.</p>\r\n\r\n<p>&ldquo;Telkom bekerjasama dengan lembaga bimbingan belajar Prima Gama siap menyelenggarakan try out online. Jadi bagi sekolah yang berminat dapat mendaftarkan diri untuk ikut serta dalam try out ini &rdquo; pungkas Imam.<strong>@Eld</strong></p>\r\n', 'telkom-edukasi-penggunaan-aplikasi-un-cbt', '92168933c76403a5e35bd2a29d5c75df.jpg', '', '2015-10-10 22:25:13', NULL, 0, 1),
(33, 3, 13, '', ' Orang Indonesia Bikin "Printer" 3D ', ' Orang Indonesia Bikin "Printer" 3D ', '<p>Berawal dari kegemarannya pada dunia desain grafis, Johanes Djauhari kini merakit mesin pencetak <em>(printer)</em> 3D. Dengan memanfaatkan teknologi <em>open source,</em> <em>printer</em> 3D yang dirakit Johanes dapat mencetak dokumen digital menjadi benda tiga dimensi.<br />\r\n<br />\r\nJohanes bekerja sebagai desainer produk. Beberapa klien yang hendak membuat produk kadang tak puas jika hanya melihat desain tersebut dalam bentuk dokumen digital. Mereka ingin bentuk fisik meski berukuran kecil.<br />\r\n<br />\r\n&quot;Nah, dari situlah, kenapa tidak saya buat <em>printer</em> 3D sendiri,&quot; katanya saat ditemui <em>KompasTekno</em> di acara Popcon Asia 2013 di Jakarta Convention Center, awal Juli lalu.<br />\r\n<br />\r\nJohanes juga gemar pada mainan <em>(toys).</em> Banyak rekannya yang mendesain karakter <em>toys</em> dan hendak merealisasikan idenya menjadi bentuk nyata. Beberapa dari mereka memakai jasa Johanes untuk cetak 3D.</p>\r\n\r\n<p><img alt="" src="http://assets.kompas.com/data/photo/2013/07/08/1401307IMG-4293780x390.JPG" style="height:320px; width:640px" /></p>\r\n\r\n<p>3D <em>printing</em> merupakan proses cetak berlapis untuk membentuk benda padat dengan perspektif 3D yang dapat dipegang dan memiliki volume.<br />\r\n&nbsp;</p>\r\n', 'orang-indonesia-bikin-printer-3d', 'b1851a42044788e7ee0e32ebf3e5b5b7.JPG', '', '2015-10-10 22:35:33', NULL, 0, 1),
(34, 4, 12, '', 'IndiHome Fiber, Inovasi cerdas untuk keluarga cerdas', 'IndiHome Fiber untuk keluarga cerdas', '<p>Akhir-akhir ini saya merasa lebih percaya diri menggunakan internet dirumah. Mau ngapain aja selama modem dirumah keadaan ON saya manfaatin untuk segalanya. Mulai dari update blog sambil streaming-an radio, nonton video atau buka-buka youtube! Gak ada lagi perasaan berhemat-hemat agar kuota awet atau takut kejeblos tiba-tiba kuotanya limit. Malas pakai laptop, wifi-an dari smartphone, jadilah hehe..</p>\r\n\r\n<p><a href="http://yuniarinukti.com/wp-content/uploads/2015/06/IndiTV.jpg"><img alt="Modeeem yang baik-baik ya kalau ngasih koneksi.. :D" src="http://yuniarinukti.com/wp-content/uploads/2015/06/IndiTV.jpg" style="height:375px; width:500px" /></a></p>\r\n\r\n<p>Sahabat internetan di rumah</p>\r\n\r\n<p>Di era teknologi dan informasi yang kian gencar ini sulit untuk tidak memanfaatkan internet. Apalagi segala sumber informasi di dunia ini (termasuk infotainment yang lagi ngehits :D) terkumpul semua disana. Silaturrahmi dengan puluhan bahkan ratusan teman lama dan rekan baru juga membutuhkan koneksi internet. Namun yang lebih penting dari semua itu adalah pemanfaatan internet sendiri untuk hal-hal yang lebih berguna terutama dalam rangka mencerdaskan pribadi keluarga. Lebih dari itu demi kelangsungan hidup dapur saya juga hihi..</p>\r\n', 'indihome-fiber-inovasi-cerdas-untuk-keluarga-cerdas', '7b20dadae1eb566055c7b07228206066.jpg', '', '2015-10-10 22:58:05', NULL, 0, 0),
(35, 5, 12, '', 'Taxi Mobile Reservation Untuk Pengguna Android', 'Taxi Mobile Reservation Untuk Pengguna Android', '<p>Sebagai kelanjutan dari program taxi mobile reservation, Blue Bird Grup meluncurkan aplikasi untuk iPhone dan Android, sebagai bagian dari inovasi bisnis yang dilakukannya. Sebelumnya, bulan Agustus 2011 lalu, Blue Bird Group telah meluncurkan aplikasi taxi mobie reservation untuk Blackberry.</p>\r\n\r\n<p>&ldquo;Sampai saat ini platform gadget ketiganya (Android, Iphone, dan Blackberry) merupakan yang paling banyak digunakan masyarakat di Indonesia, sehingga pelanggan makin leluasa menentukan pilihan dalam menggunakan taxi mobile reservation,&rdquo; jelas Sigit Priawan Djokosoetono, Vice President Central Operation Blue Bird Group pada acara launching Blue Bird Groupb taxi mobile reservation.</p>\r\n\r\n<p>&ldquo;Melalui inovasi aplikasi reservasi untuk smartphone Blue Bird Group sudah menciptakan nilai lebih dari sebuah layanan. Sebab pelanggan bisa mengetahui secara pasti (jika memang sudah mendapatkan taksi) keberadaan taksi yang dipesan tanpa harus telepon, konfirmasi ke call center, sehingga dia bisa lebih mudah mengatur waktu. Praktis, cepat, mudah dan akurat,&rdquo; ujar Sigit menambahkan.</p>\r\n\r\n<p>Diharapkan dengan peluncuran dua aplikasi baru ini akan memberikan kemudahan dalam pemesanan taxi bagi pelanggannya, khususnya pengguna piranti seluler iPhone dan Android. Dengan motto layanan ANDAL, yang artinya Aman, Nyaman, Mudah dan Personalise, menjadikan Blue Bird Group partner terpercaya dalam transportasi. Pemesanan taxi melalui telepon genggam atau mobile phone tentunya tak lama lagi akan menjadi lifestyle, atau gaya hidup sebagian besar masyarakat Jakarta.</p>\r\n', 'taxi-mobile-reservation-untuk-pengguna-android', 'b8aa7b92f4a41e8291d6d42d376c89cc.jpg', '', '2015-10-10 23:03:51', NULL, 0, 1),
(36, 6, 12, '', 'IndiHome Fiber, Inovasi cerdas untuk keluarga cerdas', 'IndiHome Fiber, Inovasi cerdas untuk keluarga cerdas', '<p>Akhir-akhir ini saya merasa lebih percaya diri menggunakan internet dirumah. Mau ngapain aja selama modem dirumah keadaan ON saya manfaatin untuk segalanya. Mulai dari update blog sambil streaming-an radio, nonton video atau buka-buka youtube! Gak ada lagi perasaan berhemat-hemat agar kuota awet atau takut kejeblos tiba-tiba kuotanya limit. Malas pakai laptop, wifi-an dari smartphone, jadilah hehe..</p>\r\n\r\n<p><a href="http://yuniarinukti.com/wp-content/uploads/2015/06/IndiTV.jpg"><img alt="Modeeem yang baik-baik ya kalau ngasih koneksi.. :D" src="http://yuniarinukti.com/wp-content/uploads/2015/06/IndiTV.jpg" style="height:375px; width:500px" /></a></p>\r\n\r\n<p>Sahabat internetan di rumah</p>\r\n\r\n<p>Di era teknologi dan informasi yang kian gencar ini sulit untuk tidak memanfaatkan internet. Apalagi segala sumber informasi di dunia ini (termasuk infotainment yang lagi ngehits :D) terkumpul semua disana. Silaturrahmi dengan puluhan bahkan ratusan teman lama dan rekan baru juga membutuhkan koneksi internet. Namun yang lebih penting dari semua itu adalah pemanfaatan internet sendiri untuk hal-hal yang lebih berguna terutama dalam rangka mencerdaskan pribadi keluarga. Lebih dari itu demi kelangsungan hidup dapur saya juga hihi..</p>\r\n', 'indihome-fiber-inovasi-cerdas-untuk-keluarga-cerdas', 'cef7b914752cb1a3784f185fc8b7ac2e.jpg', '', '2015-10-10 23:23:19', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_view_count`
--

CREATE TABLE IF NOT EXISTS `post_view_count` (
  `post_view_count_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip_addr` varchar(45) DEFAULT NULL,
  `time_visit` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_view_count`
--

INSERT INTO `post_view_count` (`post_view_count_id`, `post_id`, `ip_addr`, `time_visit`) VALUES
(1, 25, '127.0.0.1', '2015-10-10 21:18:49'),
(2, 29, '192.168.2.137', '2015-10-10 21:38:06'),
(3, 25, '192.168.2.137', '2015-10-10 21:44:37'),
(4, 28, '192.168.2.137', '2015-10-10 21:47:53'),
(5, 35, '192.168.2.137', '2015-10-10 23:05:21'),
(6, 35, '127.0.0.1', '2015-10-10 23:21:23'),
(7, 33, '127.0.0.1', '2015-10-10 23:23:42'),
(8, 36, '127.0.0.1', '2015-10-10 23:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `phone` varchar(13) NOT NULL,
  `user_desc` varchar(160) DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `user_lvl` int(11) DEFAULT '2',
  `user_sts` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `email`, `gender`, `phone`, `user_desc`, `date_registered`, `date_update`, `user_photo`, `user_lvl`, `user_sts`) VALUES
(3, 'Ala Rai AbdiAllah', 'abdillah98', '086c282bbbb00035e507c235ad2a2ad8', 'spensa2010alarai@gmail.com', 'Laki-laki', '089605439130', 'Seorang programmer yang tamfan & berani', '2015-10-01 21:41:04', '2015-10-10 12:53:31', 'b000db6c57c3ca0146cb9b3424101245.jpg', 2, 1),
(4, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', '', NULL, '2015-10-01 23:28:55', '0000-00-00 00:00:00', '', 1, 1),
(5, 'zingga', 'zingga', '36a302757418a76b09f55ac0e3c77812', 'zingga@gmail.com', 'Laki-laki', '082541354134', 'hebat', '2015-10-03 20:30:21', '2015-10-03 05:47:56', '7ce76248e93fe684cc1a249d64faae92.png', 2, 0),
(6, 'Aditya', 'aditya2000', '086c282bbbb00035e507c235ad2a2ad8', 'aditya@gmail.com', 'Laki-laki', '', NULL, '2015-10-05 18:59:27', '0000-00-00 00:00:00', '', 2, 1),
(7, 'Idun', 'idun123', '97399118cc9ec55d38f7bc4164945188', 'idun123@gmail.com', 'Laki-laki', '', NULL, '2015-10-09 06:02:24', '0000-00-00 00:00:00', '', 2, 1),
(8, 'Anditya', 'anditya123', 'ceec2c0da1751be1619bc06815145671', 'anditya123@gmail.com', 'Laki-laki', '089999999999', 'dawadasdw', '2015-10-10 05:05:49', '2015-10-10 12:16:09', 'd1dd283e1843a96499fa39064b85d3b7.png', 2, 1),
(9, 'azzario razy', 'azzario', '3e3691762f38d3de2004b3780a7c271c', 'azzariorazy17@gmail.com', 'Laki-laki', '', NULL, '2015-10-10 12:12:50', '0000-00-00 00:00:00', '', 2, 1),
(10, 'Nadiem Makarim', 'nadiem123', 'd89c2a7f4eb31dd291bbb30fd3d5f617', 'nadiem123@gmail.com', 'Laki-laki', '089999999999', 'CEO Gojek', '2015-10-10 17:12:01', '2015-10-10 12:16:35', 'ba0fe675b6a26dbda86ea37fdedf153c.jpg', 2, 1),
(11, 'Khoirul Anwar', 'khoirul123', 'b2489a97b0bd48806db2d64a473aad7d', 'khoirul123@gmail.com', 'Laki-laki', '082222222222', 'Penemu 4G', '2015-10-10 17:20:38', '2015-10-10 12:22:17', '1558f20b6248b78ed0a2a860c8324cc9.jpg', 2, 1),
(12, 'zingga', 'zingga', '36a302757418a76b09f55ac0e3c77812', 'zingga@yahoo.com', 'Laki-laki', '082316339402', 'hallo', '2015-10-10 21:23:22', '2015-10-10 04:26:12', '5286b375f3afb2f9bea3306bc1baad05.jpg', 2, 1),
(13, 'nino', 'nino', '36a302757418a76b09f55ac0e3c77812', 'nino@gam.com', '', '', '', '2015-10-10 22:00:46', '2015-10-10 05:04:35', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE IF NOT EXISTS `visitor_counter` (
  `visitor_counter_id` int(11) NOT NULL,
  `ip_addr` varchar(45) DEFAULT NULL,
  `time_visit` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_counter`
--

INSERT INTO `visitor_counter` (`visitor_counter_id`, `ip_addr`, `time_visit`) VALUES
(1, '127.0.0.1', '2015-10-09 21:18:49'),
(2, '192.168.2.137', '2015-10-10 21:20:37'),
(3, '127.0.0.1', '2015-10-11 21:20:37'),
(4, '127.0.0.1', '2015-10-11 21:20:40'),
(5, '127.0.0.1', '2015-10-10 22:34:30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_comment`
--
CREATE TABLE IF NOT EXISTS `v_comment` (
`comment_id` int(11)
,`post_id` int(11)
,`user_id` int(11)
,`quote_id` int(11)
,`comment_content` text
,`comment_time` datetime
,`comment_type` int(11)
,`comment_sts` int(11)
,`username` varchar(20)
,`user_photo` varchar(255)
,`title` varchar(255)
,`post_slug` varchar(255)
,`anonymos` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_post`
--
CREATE TABLE IF NOT EXISTS `v_post` (
`post_id` int(11)
,`category_id` int(11)
,`user_id` int(11)
,`youtube_id` varchar(255)
,`post_title` varchar(255)
,`title` varchar(255)
,`post_content` text
,`post_slug` varchar(255)
,`post_image` varchar(255)
,`link_website` varchar(255)
,`date_create` datetime
,`date_update` datetime
,`post_like` int(11)
,`post_sts` int(11)
,`username` varchar(20)
,`name` varchar(100)
,`user_photo` varchar(255)
,`user_desc` varchar(160)
,`category_name` varchar(45)
,`category_slug` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `v_comment`
--
DROP TABLE IF EXISTS `v_comment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_comment` AS select `a`.`comment_id` AS `comment_id`,`a`.`post_id` AS `post_id`,`a`.`user_id` AS `user_id`,`a`.`quote_id` AS `quote_id`,`a`.`comment_content` AS `comment_content`,`a`.`comment_time` AS `comment_time`,`a`.`comment_type` AS `comment_type`,`a`.`comment_sts` AS `comment_sts`,`b`.`username` AS `username`,`b`.`user_photo` AS `user_photo`,`c`.`title` AS `title`,`c`.`post_slug` AS `post_slug`,`a`.`anonymos` AS `anonymos` from ((`comment` `a` left join `user` `b` on((`a`.`user_id` = `b`.`user_id`))) left join `post` `c` on((`a`.`post_id` = `c`.`post_id`)));

-- --------------------------------------------------------

--
-- Structure for view `v_post`
--
DROP TABLE IF EXISTS `v_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_post` AS select `a`.`post_id` AS `post_id`,`a`.`category_id` AS `category_id`,`a`.`user_id` AS `user_id`,`a`.`youtube_id` AS `youtube_id`,`a`.`post_title` AS `post_title`,`a`.`title` AS `title`,`a`.`post_content` AS `post_content`,`a`.`post_slug` AS `post_slug`,`a`.`post_image` AS `post_image`,`a`.`link_website` AS `link_website`,`a`.`date_create` AS `date_create`,`a`.`date_update` AS `date_update`,`a`.`post_like` AS `post_like`,`a`.`post_sts` AS `post_sts`,`b`.`username` AS `username`,`b`.`name` AS `name`,`b`.`user_photo` AS `user_photo`,`b`.`user_desc` AS `user_desc`,`c`.`category_name` AS `category_name`,`c`.`category_slug` AS `category_slug` from ((`post` `a` left join `user` `b` on((`a`.`user_id` = `b`.`user_id`))) left join `category` `c` on((`a`.`category_id` = `c`.`category_id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_view_count`
--
ALTER TABLE `post_view_count`
  ADD PRIMARY KEY (`post_view_count_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  ADD PRIMARY KEY (`visitor_counter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `post_view_count`
--
ALTER TABLE `post_view_count`
  MODIFY `post_view_count_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  MODIFY `visitor_counter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
