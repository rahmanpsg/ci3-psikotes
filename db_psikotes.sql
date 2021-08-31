-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 05:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psikotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `email`) VALUES
('admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aspek`
--

CREATE TABLE `tbl_aspek` (
  `id` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`id`, `keterangan`) VALUES
(1, 'Work Direction (Kecenderungan Dalam Bekerja)'),
(2, 'Leadership (Kepemimpinan)'),
(3, 'Activity (Aktivitas)'),
(4, 'Social Nature (Kecenderungan Dalam Bersosialisasi)'),
(5, 'Work Style (Cara Kerja)'),
(6, 'Temperament (Tempramen)'),
(7, 'Followership (Keikutsertaan)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id`, `nama`, `role`) VALUES
(1, 'Supervisor', '[\"I\",\"V\",\"S\",\"O\"]'),
(2, 'Sekretaris / Admin', '[\"B\",\"D\",\"C\",\"W\"]'),
(3, 'Manajer', '[\"G\",\"L\",\"D\",\"C\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `kode` varchar(1) NOT NULL,
  `id_aspek` int(3) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`kode`, `id_aspek`, `keterangan`) VALUES
('A', 1, 'Need to achieve (Hasrat berprestasi)'),
('B', 4, 'Need to belong to groups (Kebutuhan untuk diterima dan terlibat dalam kelompok)'),
('C', 5, 'Organized type (Tipe terorganisir)'),
('D', 5, 'Interest in working with details (Tertarik untuk bekerja dengan detail)'),
('E', 6, 'Emotional resistant (Stabilitas Emosi)'),
('F', 7, 'Need to support authority (Keinginan untuk mendukung pihak lain)'),
('G', 1, 'Role of hard intense worked (Peran sebagai pekerjaan keras dan tekun)'),
('I', 2, 'Ease In Decision Making (Pragmatis dalam pengambilan keputusan)'),
('K', 6, 'Need to be forceful (Keinginan untuk mendominasi pihak lain)'),
('L', 2, 'Leadership Role (Mengambil peran sebagai seorang pemimpin)'),
('N', 1, 'Need to finish task (Keinginan untuk selalu selesaikan pekerjaan)'),
('O', 4, 'Need for closeness and affection (Kebutuhan akan kedekatan dan keakraban)'),
('P', 2, 'Need to Control Others (Keinginan untuk mengontrol orang lain)'),
('R', 5, 'Theoretical type (Tipe Teoritis)'),
('S', 4, 'Social extension (Keinginan untuk memperluas lingkup sosial)'),
('T', 3, 'Peace (Tempo Kerja)'),
('V', 3, 'Vigorous Type (Tipe Bersemangat)'),
('W', 7, 'Need for rules and supervision (Butuh adanya peraturan baku dan pengawasan)'),
('X', 4, 'Need to be noticed (Kebutuhan untuk selalu diperingatkan)'),
('Z', 6, 'Need for change (Keinginan untuk selalu ada perubahan)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id` int(3) NOT NULL,
  `kode_role` varchar(1) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`id`, `kode_role`, `nilai`, `keterangan`) VALUES
(1, 'L', '[0,4]', 'Cenderung tidak secara aktif menggunakan orang lain dalam bekerja'),
(2, 'L', '[5,9]', 'Tingkatan dimana seseorang memproyeksikan dirinya sebagai pemimpin suatu tingkat dimana ia mencoba menggunakan orang lain untuk mencapai tujuannya'),
(3, 'P', '[0,4]', 'Menurunnya tingkat keinginan bertanggung jawab pada pekerjaan dan tindakan orang lain'),
(4, 'P', '[5,9]', 'Tingkat kebutuhan untuk menerima tanggung jawab orang lain, menjadi orang yang bertanggung jawab'),
(5, 'I', '[0,2]', 'Ragu - menolah mengambil keputusan'),
(6, 'I', '[3,4]', 'Berhati-hati membuat keputusan'),
(7, 'I', '[5,7]', 'Berhati hati - lancar dan mudah mengambil keputusan'),
(8, 'I', '[8,9]', 'Tidak ragu dalam mengambil keputusan'),
(9, 'F', '[0,1]', 'Cenderung egois, kemungkinan bisa memberontak'),
(10, 'F', '[2,3]', 'Mengurus kepentingan sendiri'),
(11, 'F', '[4,5]', 'Setia terhadap perusahaan'),
(12, 'F', '[6,9]', 'Bersikap setia dan membantu, kemungkinan bantunannya bersifat politis'),
(13, 'W', '[0,3]', 'Berorientasi pada tujuan, mandiri'),
(14, 'W', '[4,5]', 'Kebutuhan akan pengarahan dan harapan yang dirumuskan untuknya'),
(15, 'W', '[6,9]', 'Meningkatnya orientasi terhadap tugas dan membutuhkan instruksi yang jelas'),
(16, 'T', '[0,3]', 'Melakukan segala sesuatu menurut kemauannya sendiri'),
(17, 'T', '[4,6]', 'Tergolong aktif secara interval dan mental'),
(18, 'V', '[0,4]', 'Cenderung pasif'),
(19, 'V', '[5,7]', 'Aktif secara fisik, cenderung sportif'),
(20, 'V', '[8,9]', 'Semangat tinggi dan positif thingking'),
(21, 'R', '[0,3]', 'Kurang perhatian, bersifat praktis'),
(22, 'R', '[5,9]', 'Nilai-nilai penalaran terbilang tinggi'),
(23, 'D', '[0,3]', 'Menyadari kebutuhan akan kecermatan, tetapi tidak berminat bekerja detail'),
(24, 'D', '[4,9]', 'Minat tinggi untuk bekerja secara detail'),
(25, 'C', '[0,2]', 'Fleksibel (tidak teratur)'),
(26, 'C', '[3,5]', 'Teratur tetapi tidak tergolong fleksibel'),
(27, 'C', '[6,9]', 'Keteraturan tinggi cenderung kaku'),
(28, 'X', '[0,1]', 'Cenderung pemalu'),
(29, 'X', '[2,3]', 'Rendah hati, tulus'),
(30, 'X', '[4,5]', 'Memiliki pola perilaku yang unik'),
(31, 'X', '[6,9]', 'Membutuhkan perhatian nyata'),
(32, 'B', '[0,3]', 'Selektif'),
(33, 'B', '[4,5]', 'Butuh diterima, tapi tidak bisa dipengaruhi oleh kelompok'),
(34, 'B', '[6,9]', 'Butuh disukai dan diakui, mudah dipengaruhi'),
(35, 'O', '[0,2]', 'Tidak suka hubungan perorangan'),
(36, 'O', '[3,4]', 'Sadar akan hubungan perorangan, tapi tidak terlalu tergantung'),
(37, 'O', '[5,9]', 'Sangat tergantung, butuh penerimaan diri'),
(38, 'S', '[0,5]', 'Perhatian rendah terhadap social, kurang percaya pada orang lain'),
(39, 'S', '[6,9]', 'Kepercayaan tinggi dalam hubungan social, suka interaksi sosial'),
(40, 'N', '[0,2]', 'Menunda atau menghindari pekerjaan'),
(41, 'N', '[3,4]', 'Berhati-hati atau ragu dalam pekerjaan'),
(42, 'N', '[5,6]', 'Cukup bertanggung jawal pada pekerjaan'),
(43, 'N', '[6,9]', 'Tekun, tanggung jawab tinggi'),
(44, 'A', '[0,5]', 'Ketidak pastian tujuan, kepuasan dalam suatu kepastian, tidak ada usaha lebih'),
(45, 'A', '[6,9]', 'Tujuan jelas, kebutuhan sukses dan ambisi tinggi'),
(46, 'G', '[0,2]', 'Keinginan bekerja keras kurang maksimal'),
(47, 'G', '[3,4]', 'Bekerja untuk kesenangan saja, bukan untuk hasil optimal'),
(48, 'G', '[5,7]', 'Kemauan bekerja keras yang tinggi'),
(49, 'G', '[8,9]', 'Sangat suka bekerja keras'),
(50, 'Z', '[0,2]', 'Tidak suka berubah'),
(51, 'Z', '[3,4]', 'Tidak suka perubahan jika dipaksakan'),
(52, 'Z', '[5,5]', 'Mudah menyesuaikan diri'),
(53, 'Z', '[6,7]', 'Membuat perubahan yang selektif, berpikir jauh kedepan'),
(54, 'Z', '[8,9', 'Membuat perubahan yang selektif, berpikir jauh kedepan'),
(55, 'K', '[0,2]', 'Menghindari masalah, menolak untuk mengenali situasi sebagai masalah'),
(56, 'K', '[3,4]', 'Suka lingkungan tenang, menghindari konflik'),
(57, 'K', '[5,5]', 'Keras kepala'),
(58, 'K', '[6,7]', 'Agresif berhubungan dengan kerja, dorongan semangat bersaing'),
(59, 'K', '[8,9]', 'Agresif, cendering defensive'),
(60, 'E', '[0,1]', 'Terbuka, cepat bereaksi, tidak normative'),
(61, 'E', '[2,3]', 'Terbuka'),
(62, 'E', '[4,6]', 'Punya pendekatan emosional seimbang ,mampu mengendalikan'),
(63, 'E', '[7,9]', 'Sangat normative, kebutuhan pengendalian diri yang berlebihan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(3) NOT NULL,
  `pernyataan` longtext NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `pernyataan`, `value`) VALUES
(1, '{\"a\":\"Saya adalah pekerja keras\",\"b\":\"Saya tidak mudah murung\"}', '{\"a\":\"G\",\"b\":\"E\"}'),
(2, '{\"a\":\"Saya ingin bekerja lebih baik dari pada orang-orang lain\",\"b\":\"Saya ingin melaksanakan apa yang saya kerjakan sampai selesai\"}', '{\"a\":\"A\",\"b\":\"N\"}'),
(3, '{\"a\":\"Saya suka menunjukkan pada orang lain bagaimana cara mengerjakan sesuatu \",\"b\":\"Saya ingin berusaha sebaik mungkin \"}', '{\"a\":\"P\",\"b\":\"A\"}'),
(4, '{\"a\":\"Saya suka melakukan hal-hal lucu\",\"b\":\"Saya suka mengatakan kepada orang lain apa yang harus dikerjakan \"}', '{\"a\":\"X\",\"b\":\"P\"}'),
(5, '{\"a\":\"Saya suka bergabung dalam kelompok\",\"b\":\"Saya ingin diperhatikan dalam kelompok\"}', '{\"a\":\"B\",\"b\":\"X\"}'),
(6, '{\"a\":\"Saya suka membuat persahabatan yang akrab\",\"b\":\"Saya suka berteman dalam satu kelompok\"}', '{\"a\":\"O\",\"b\":\"B\"}'),
(7, '{\"a\":\"Saya cepat merubah pikiran saya jika memang perlu\",\"b\":\"Saya berusaha membuat persahabatan yang akrab \"}', '{\"a\":\"Z\",\"b\":\"O\"}'),
(8, '{\"a\":\"Saya suka membalas jika benar-benar disakiti \",\"b\":\"Saya suka mengerjakan sesuatu hal yang baru dan berbeda\"}', '{\"a\":\"K\",\"b\":\"Z\"}'),
(9, '{\"a\":\"Saya ingin disukai atasan saya\",\"b\":\"Saya suka memberitahu orang lain jika mereka berbuat salah\"}', '{\"a\":\"F\",\"b\":\"K\"}'),
(10, '{\"a\":\"Saya senang mengikuti petunjuk-petunjuk yang diberikan kepada saya \",\"b\":\"Saya ingin menyenangkan atasan-atasan saya \"}', '{\"a\":\"W\",\"b\":\"F\"}'),
(11, '{\"a\":\"Saya berusaha keras \",\"b\":\"Saya adalah orang yang rapi. Saya menempatkan segala sesuatu ditempatnya \"}', '{\"a\":\"G\",\"b\":\"C\"}'),
(12, '{\"a\":\"Saya mampu mempengaruhi orang lain untuk melakukan apa yang saya kehendaki \",\"b\":\"Saya tidak mudah marah\"}', '{\"a\":\"L\",\"b\":\"E\"}'),
(13, '{\"a\":\"Saya suka memberitahu apa yang harus dikerjakan oleh kelompok \",\"b\":\"Saya selalu mengerjakan tugas sampai selesai\"}', '{\"a\":\"P\",\"b\":\"N\"}'),
(14, '{\"a\":\"Saya ingin kelihatan gembira dan menarik \",\"b\":\"Saya ingin betul-betul berhasil \"}', '{\"a\":\"X\",\"b\":\"A\"}'),
(15, '{\"a\":\"Saya suka menyesuaikan diri dalam kelompok\",\"b\":\"Saya suka membantu orang dalam memutuskan sesuatu \"}', '{\"a\":\"B\",\"b\":\"P\"}'),
(16, '{\"a\":\"Saya cemas bila ada yang tidak menyukai saya\",\"b\":\"Saya senang bila diperhatikan orang \"}', '{\"a\":\"O\",\"b\":\"X\"}'),
(17, '{\"a\":\"Saya senang mencoba hal-hal baru \",\"b\":\"Saya lebih suka bekerja dengan orang lain dari pada sendirian \"}', '{\"a\":\"Z\",\"b\":\"B\"}'),
(18, '{\"a\":\"Saya kadang-kadang menyalahkan orang lain bila ada sesuatu yang tidak beres \",\"b\":\"Saya merasa terganggu bila ada yang tidak menyukai saya\"}', '{\"a\":\"K\",\"b\":\"O\"}'),
(19, '{\"a\":\"Saya ingin menyenangkan atasan-atasan saya\",\"b\":\"Saya suka mencoba suatu pekerjaan yang baru dan berbeda \"}', '{\"a\":\"F\",\"b\":\"Z\"}'),
(20, '{\"a\":\"Saya suka penjelasan-penjelasan terperinci dalam bekerja \",\"b\":\"Saya suka berterus terang bila ada orang yang menjengkelkan saya \"}', '{\"a\":\"W\",\"b\":\"K\"}'),
(21, '{\"a\":\"Saya selalu berusaha keras \",\"b\":\"Saya suka mengerjakan setiap langkah pekerjaan dengan hati-hati \"}', '{\"a\":\"G\",\"b\":\"D\"}'),
(22, '{\"a\":\"Saya memimpin dengan baik \",\"b\":\"Saya mengatur pekerjaan dengan baik \"}', '{\"a\":\"L\",\"b\":\"C\"}'),
(23, '{\"a\":\"Saya mudah marah \",\"b\":\"Saya lamban dalam membuat keputusan-keputusan \"}', '{\"a\":\"I\",\"b\":\"E\"}'),
(24, '{\"a\":\"Saya senang mengerjakan beberapa tugas pada saat yang sama \",\"b\":\"Dalam kelompok saya lebih suka diam \"}', '{\"a\":\"X\",\"b\":\"N\"}'),
(25, '{\"a\":\"Saya senang diundang \",\"b\":\"Saya ingin mengerjakan segala sesuatunya lebih baik dari orang lain \"}', '{\"a\":\"B\",\"b\":\"A\"}'),
(26, '{\"a\":\"Saya suka membuat persahabatan yang akrab \",\"b\":\"Saya suka memberi nasehat kepada orang lain \"}', '{\"a\":\"O\",\"b\":\"P\"}'),
(27, '{\"a\":\"Saya suka mengerjakan sesuatu hal yang baru dan berbeda \",\"b\":\"Saya senang menceritakan keberhasilan saya \"}', '{\"a\":\"Z\",\"b\":\"X\"}'),
(28, '{\"a\":\"Jika memang benar, saya akan mempertahankannya \",\"b\":\"Saya suka menjadi anggota kelompok \"}', '{\"a\":\"K\",\"b\":\"B\"}'),
(29, '{\"a\":\"Saya menghindari suatu perbedaan pendapat \",\"b\":\"Saya berusaha untuk lebih akrab dengan orang-orang\"}', '{\"a\":\"F\",\"b\":\"O\"}'),
(30, '{\"a\":\"Saya suka diberitahukan bagaimana melaksanakan tugas\",\"b\":\"Saya mudah merasa bosan\"}', '{\"a\":\"W\",\"b\":\"Z\"}'),
(31, '{\"a\":\"Saya bekerja keras \",\"b\":\"Saya banyak berfikir dan merencana\"}', '{\"a\":\"G\",\"b\":\"R\"}'),
(32, '{\"a\":\"Saya memimpin suatu kelompok \",\"b\":\"Hal-hal yang detail menarik minat saya \"}', '{\"a\":\"L\",\"b\":\"D\"}'),
(33, '{\"a\":\"Saya membuat suatu keputusan dengan mudah dan cepat \",\"b\":\"Saya merawat barang-barang saya dengan rapi dan teratur \"}', '{\"a\":\"I\",\"b\":\"C\"}'),
(34, '{\"a\":\"Saya mengerjakan sesuatu dengan cepat \",\"b\":\"Saya jarang marah atau sedih \"}', '{\"a\":\"T\",\"b\":\"E\"}'),
(35, '{\"a\":\"Saya ingin menjadi bagian dari suatu kelompok \",\"b\":\"Saya hanya ingin mengerjakan satu pekerjaan dalam satu saat \"}', '{\"a\":\"B\",\"b\":\"N\"}'),
(36, '{\"a\":\"Saya berusaha membuat teman akrab \",\"b\":\"Saya berusaha keras untuk menjadi yang paling baik \"}', '{\"a\":\"O\",\"b\":\"A\"}'),
(37, '{\"a\":\"Saya suka baju-baju dan mobil-mobil model mutakhir\",\"b\":\"Saya senang bertanggung jawab atas orang lain\"}', '{\"a\":\"Z\",\"b\":\"P\"}'),
(38, '{\"a\":\"Saya senang berdebat \",\"b\":\"Saya senang mendapat perhatian\"}', '{\"a\":\"K\",\"b\":\"X\"}'),
(39, '{\"a\":\"Saya suka menyenangkan atasan-atasan saya \",\"b\":\"Saya tertarik untukmenjadi bagian dari suatu kelompok \"}', '{\"a\":\"F\",\"b\":\"B\"}'),
(40, '{\"a\":\"Saya suka mematuhi peraturan denagn sungguh-sungguh\",\"b\":\"Saya ingin agar orang-orang benar-benar mengenal saya \"}', '{\"a\":\"W\",\"b\":\"O\"}'),
(41, '{\"a\":\"Saya berusaha keras\",\"b\":\"Saya sangat ramah \"}', '{\"a\":\"G\",\"b\":\"S\"}'),
(42, '{\"a\":\"Orang-orang menganggap saya adalah pemimpin yang baik \",\"b\":\"Saya berpikir panjang dan hati-hati\"}', '{\"a\":\"L\",\"b\":\"R\"}'),
(43, '{\"a\":\"Saya sering mengambil kesempatan-kesempatan kecil \",\"b\":\"Saya senang mengurusi hal-hal kecil\"}', '{\"a\":\"I\",\"b\":\"D\"}'),
(44, '{\"a\":\"Orang-orang menganggap saya bekerja dengan cepat \",\"b\":\"Orang-orang menganggap saya merawat sesuatu dengan rapi dan teratur \"}', '{\"a\":\"T\",\"b\":\"C\"}'),
(45, '{\"a\":\"Saya suka berolah raga \",\"b\":\"Saya sangat menyenangkan \"}', '{\"a\":\"V\",\"b\":\"E\"}'),
(46, '{\"a\":\"Saya senang jika orang-orang akrab dan ramah \",\"b\":\"Saya selalu berusaha menyelesaikan apa yang saya kerjakan \"}', '{\"a\":\"O\",\"b\":\"N\"}'),
(47, '{\"a\":\"Saya suka bereksperimen dan mencoba hal-hal yang baru \",\"b\":\"Saya senang menyelesaikan dengan baik pekerjaan yang sulit \"}', '{\"a\":\"Z\",\"b\":\"A\"}'),
(48, '{\"a\":\"Saya senang diperlakukan secara adil\",\"b\":\"Saya suka memberitahu orang bagaimana mengerjakan sesuatu \"}', '{\"a\":\"K\",\"b\":\"P\"}'),
(49, '{\"a\":\"Saya suka melakukan apa yang diharapkan dari saya \",\"b\":\"Saya senang mendapatkan perhatian \"}', '{\"a\":\"F\",\"b\":\"X\"}'),
(50, '{\"a\":\"Saya suka penjelasan-penjelasan yang terperinci dalam bekerja \",\"b\":\"Saya senang berada diantara orang-orang\"}', '{\"a\":\"W\",\"b\":\"B\"}'),
(51, '{\"a\":\"Saya selalu berusaha menyelesaikan tugas-tugas secara sempuma \",\"b\":\"Saya adalah orang yang tak mengenal lelah\"}', '{\"a\":\"G\",\"b\":\"V\"}'),
(52, '{\"a\":\"Saya adalah tipe pemimpin \",\"b\":\"Saya mudah berteman \"}', '{\"a\":\"L\",\"b\":\"S\"}'),
(53, '{\"a\":\"Saya suka mengambil kesempatan-kesempatan yang ada \",\"b\":\"Saya banyak berfikir \"}', '{\"a\":\"I\",\"b\":\"R\"}'),
(54, '{\"a\":\"Saya bekerja dengan cepat dan mantap\",\"b\":\"Saya senang bekerja sampai pada hal yang sekecil-kecilnya \"}', '{\"a\":\"T\",\"b\":\"D\"}'),
(55, '{\"a\":\"Saya mempunyai banyak tenaga untuk berolahraga dan bermain \",\"b\":\"Saya merawat barang-barang saya dengan rapi dan teratur \"}', '{\"a\":\"V\",\"b\":\"C\"}'),
(56, '{\"a\":\"Saya berhubungan baik dengan semua orang\",\"b\":\"Saya bertabiat mantap dan tenang\"}', '{\"a\":\"S\",\"b\":\"E\"}'),
(57, '{\"a\":\"Saya suka bertemu dengan orang-orang baru dan mengerjakan sesuatu yang baru \",\"b\":\"Saya selalu ingin menyelesaikan pekerjaan yang saya mulai \"}', '{\"a\":\"Z\",\"b\":\"N\"}'),
(58, '{\"a\":\"Saya biasanya mempertahankan apa yang saya yakini \",\"b\":\"Saya biasanya suka bekerja keras \"}', '{\"a\":\"K\",\"b\":\"A\"}'),
(59, '{\"a\":\"Saya senang saran-saran dari orang yang saya hormati \",\"b\":\"Saya senang bertanggung-jawab atas orang lain \"}', '{\"a\":\"F\",\"b\":\"P\"}'),
(60, '{\"a\":\"Saya membiarkan orang lain mempengaruhi saya \",\"b\":\"Saya senang mendapatkan banyak perhatian \"}', '{\"a\":\"W\",\"b\":\"X\"}'),
(61, '{\"a\":\"Saya biasanya bekerja keras \",\"b\":\"Saya biasanya bekerja cepat \"}', '{\"a\":\"G\",\"b\":\"T\"}'),
(62, '{\"a\":\"Bila saya berbicara orang-orang mendengarkan \",\"b\":\"Saya sangat mahir menggunakan peralatan \"}', '{\"a\":\"L\",\"b\":\"V\"}'),
(63, '{\"a\":\"Saya lamban dalam membuat persahabatan\",\"b\":\"Saya lamban dalam memutuskan sesuatu \"}', '{\"a\":\"I\",\"b\":\"S\"}'),
(64, '{\"a\":\"Saya biasanya makan dengan cepat \",\"b\":\"Saya senang membaca \"}', '{\"a\":\"T\",\"b\":\"R\"}'),
(65, '{\"a\":\"Saya menyukai pekerjaan dimana saya dapat berkeliling \",\"b\":\"Saya senang pada pekerjaan yang membutuhkan ketelitian \"}', '{\"a\":\"V\",\"b\":\"D\"}'),
(66, '{\"a\":\"Saya mencari teman sebanyak mungkin \",\"b\":\"Saya tahu hal-hal apa yang tidak perlu \"}', '{\"a\":\"S\",\"b\":\"C\"}'),
(67, '{\"a\":\"Saya merencanakan sesuatu jauh-jauh sebelumnya \",\"b\":\"Saya selalu menyenangkan \"}', '{\"a\":\"R\",\"b\":\"E\"}'),
(68, '{\"a\":\"Saya bangga atas ketenaran saya \",\"b\":\"Saya memusatkan perhatian pada satu persoalan sampai hal tersebut terpecahkan \"}', '{\"a\":\"K\",\"b\":\"N\"}'),
(69, '{\"a\":\"Saya suka menyenangkan orang-orang yang saya hormati \",\"b\":\"Saya ingin berhasil \"}', '{\"a\":\"F\",\"b\":\"A\"}'),
(70, '{\"a\":\"Saya senang orang lain yang membuat keputusan untuk kelompok \",\"b\":\"Saya suka membuat keputusan-keputusan untuk kelompok \"}', '{\"a\":\"W\",\"b\":\"P\"}'),
(71, '{\"a\":\"Saya selalu berusaha keras \",\"b\":\"Saya memutuskan sesuatu dengan mudah dan cepat \"}', '{\"a\":\"G\",\"b\":\"I\"}'),
(72, '{\"a\":\"Kelompok biasanya menjalankan apa yang saya inginkan \",\"b\":\"Saya terlalu tergesa-gesa \"}', '{\"a\":\"L\",\"b\":\"T\"}'),
(73, '{\"a\":\"Saya sering merasa lelah\",\"b\":\"Saya lamban dalam memutuskan sesuatu\"}', '{\"a\":\"I\",\"b\":\"V\"}'),
(74, '{\"a\":\"Saya bekerja dengan cepat \",\"b\":\"Saya mudah berteman \"}', '{\"a\":\"T\",\"b\":\"S\"}'),
(75, '{\"a\":\"Saya biasanya bersemangat dan bergairah \",\"b\":\"Saya memerlukan banyak waktu untuk berpikir \"}', '{\"a\":\"V\",\"b\":\"R\"}'),
(76, '{\"a\":\"Saya sangat ramah kepada orang \",\"b\":\"Saya senang pada pekerjaan yang membutuhkan ketepatan \"}', '{\"a\":\"S\",\"b\":\"D\"}'),
(77, '{\"a\":\"Saya banyak sekali berfikir dan berencana \",\"b\":\"Saya meletakkan segalanya pada tempatnya \"}', '{\"a\":\"R\",\"b\":\"C\"}'),
(78, '{\"a\":\"Saya senang pada pekerjaan yang membutuhkan ketelitian \",\"b\":\"Saya tidak mudah marah \"}', '{\"a\":\"D\",\"b\":\"E\"}'),
(79, '{\"a\":\"Saya suka menurut pada orang-orang yang saya kagumi \",\"b\":\"Saya selalu menyelesaikan pekerjaan yang saya mulai \"}', '{\"a\":\"F\",\"b\":\"N\"}'),
(80, '{\"a\":\"Saya senang mengikuti petunjuk-petunjuk yang jelas \",\"b\":\"Saya senang bekerja keras\"}', '{\"a\":\"W\",\"b\":\"A\"}'),
(81, '{\"a\":\"Saya berusaha mendapatkan apa yang saya inginkan \",\"b\":\"Saya seorang pemimpin yang baik\"}', '{\"a\":\"G\",\"b\":\"L\"}'),
(82, '{\"a\":\"Saya menyuruh orang untuk bekerja keras \",\"b\":\"Saya adalah orang yang kurang berfikir panjang \"}', '{\"a\":\"L\",\"b\":\"I\"}'),
(83, '{\"a\":\"Saya memutuskan sesuatu dengan cepat \",\"b\":\"Saya berbicara dengan cepat \"}', '{\"a\":\"I\",\"b\":\"T\"}'),
(84, '{\"a\":\"Saya biasa bekerja tergesa-gesa \",\"b\":\"Saya berlatih/berolahraga dengan teratur \"}', '{\"a\":\"T\",\"b\":\"V\"}'),
(85, '{\"a\":\"Saya tidak suka menjumpai orang\",\"b\":\"Saya cepat merasa salah \"}', '{\"a\":\"V\",\"b\":\"S\"}'),
(86, '{\"a\":\"Saya banyak membuat persahabatan \",\"b\":\"Saya memerlukan banyak waktu untuk berpikir \"}', '{\"a\":\"S\",\"b\":\"R\"}'),
(87, '{\"a\":\"Saya suka menerapkan teori-teori dalam bekerja \",\"b\":\"Saya suka mengerjakan sesuatu sampai pada hal sekecilkecilnya \"}', '{\"a\":\"R\",\"b\":\"D\"}'),
(88, '{\"a\":\"Saya suka mengerjakan sesuatu sampai pada hal sekecil-kecilnya\",\"b\":\"Saya suka mengatur pekerjaan saya\"}', '{\"a\":\"D\",\"b\":\"C\"}'),
(89, '{\"a\":\"Saya meletakkan segalanya pada tempatnya\",\"b\":\"Saya selalu menyenangkan \"}', '{\"a\":\"C\",\"b\":\"E\"}'),
(90, '{\"a\":\"Saya senang diberi petunjuk apa yang harus dikerjakan \",\"b\":\"Saya harus menyelesaikan apa yang saya mulai\"}', '{\"a\":\"W\",\"b\":\"N\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uji`
--

CREATE TABLE `tbl_uji` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `jawaban` longtext NOT NULL,
  `hasil` longtext NOT NULL,
  `waktu` longtext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_uji`
--

INSERT INTO `tbl_uji` (`id`, `username`, `jawaban`, `hasil`, `waktu`, `status`) VALUES
(11, 'yuriska', '{\"1\":\"a\",\"2\":\"a\",\"3\":\"a\",\"4\":\"a\",\"5\":\"a\",\"6\":\"a\",\"7\":\"b\",\"8\":\"b\",\"9\":\"a\",\"10\":\"a\",\"11\":\"a\",\"12\":\"a\",\"13\":\"a\",\"14\":\"a\",\"15\":\"a\",\"16\":\"a\",\"17\":\"a\",\"18\":\"a\",\"19\":\"b\",\"20\":\"a\",\"21\":\"a\",\"22\":\"b\",\"23\":\"b\",\"24\":\"a\",\"25\":\"b\",\"26\":\"a\",\"27\":\"a\",\"28\":\"a\",\"29\":\"b\",\"30\":\"a\",\"31\":\"a\",\"32\":\"a\",\"33\":\"a\",\"34\":\"a\",\"35\":\"a\",\"36\":\"a\",\"37\":\"a\",\"38\":\"a\",\"39\":\"b\",\"40\":\"a\",\"41\":\"b\",\"42\":\"b\",\"43\":\"b\",\"44\":\"a\",\"45\":\"b\",\"46\":\"a\",\"47\":\"a\",\"48\":\"a\",\"49\":\"a\",\"50\":\"a\",\"51\":\"a\",\"52\":\"b\",\"53\":\"b\",\"54\":\"b\",\"55\":\"a\",\"56\":\"a\",\"57\":\"a\",\"58\":\"a\",\"59\":\"a\",\"60\":\"b\",\"61\":\"b\",\"62\":\"a\",\"63\":\"b\",\"64\":\"a\",\"65\":\"a\",\"66\":\"a\",\"67\":\"a\",\"68\":\"a\",\"69\":\"a\",\"70\":\"b\",\"71\":\"b\",\"72\":\"a\",\"73\":\"a\",\"74\":\"b\",\"75\":\"b\",\"76\":\"a\",\"77\":\"a\",\"78\":\"a\",\"79\":\"b\",\"80\":\"a\",\"81\":\"a\",\"82\":\"b\",\"83\":\"a\",\"84\":\"b\",\"85\":\"b\",\"86\":\"a\",\"87\":\"b\",\"88\":\"b\",\"89\":\"b\",\"90\":\"b\"}', '{\"A\":2,\"B\":4,\"C\":2,\"D\":4,\"E\":3,\"F\":4,\"G\":6,\"I\":5,\"K\":6,\"L\":4,\"N\":2,\"O\":7,\"P\":3,\"R\":5,\"S\":9,\"T\":4,\"V\":3,\"W\":6,\"X\":4,\"Z\":7}', '[\"Jun 26, 2020 11:18:07\",\"Jun 26, 2020 11:28:15\"]', 'Berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_pekerjaan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `nama`, `nik`, `id_pekerjaan`) VALUES
(5, 'yuriska', 'yuriska@gmail.com', 'qwerty', 'yuriska febriana', '1122123781234501', 1),
(6, 'Alfianti19', 'alfiantics36@gmail.com', '123456', 'Alfianti', '7372025909970002', 3),
(7, 'ADLYAS', 'adlyasultani@gmail.com', '123456', 'ADLYA S', '7372000000000000', 2),
(9, 'asfargaffar', 'asfar@gmail.com', 'qwerty', 'Muh. Asfar', '1271174312300001', 1),
(10, 'anning', 'anning@gmail.com', 'qwerty', 'nurmiati roba', '1271654129870001', 2),
(11, 'RatihPs', 'ratihps527@gmail.com', '262728', 'Ratih Puspitasari', '7372046705970001', 3),
(12, 'nanda1', 'nanda@gmail.com', 'qwerty', 'yuwinanda', '1201120363810001', 3),
(13, 'Menyot', 'adriyanigustamipa1@gmail.com', '3421601196', 'Adriyani', '7372044911960002', 2),
(14, 'nurlisa', 'lisaalam@gmail.com', 'qwerty', 'Nurlisa Hamka', '1241123876120001', 1),
(15, 'kaderuddin.z', 'kaderuddinjaka@gmail.com', 'suka010327', 'Kaderuddin', '2177782749445028', 2),
(16, 'Piaaa199', 'alfiantics@gmail.com', '123456', 'Piaaa', '7273997678470003', 2),
(17, 'Dianwulan', 'dwulandarii96@gmail.com', '085299421407', 'Dian ', '8865539902625282', 1),
(18, 'Ayu dwita', 'ayudwita133@yahoo.com', 'ayudwita96', 'Sri ayu', '9955662233554488', 2),
(19, 'Deedee', 'hitamputih@gmail.com', '123456', 'Deedee', '7372000000000000', 3),
(20, 'Hatija', 'ijhahatija@gmail.com', '123456', 'Hatija', '7372000000000000', 3),
(21, 'alwannsyahh', 'alwannsyahh123@gmail.com', 'blackie123', 'Muh Alwan Syahrony', '7301010611960002', 2),
(22, 'mysagena', 'mysagena@gmail.com', 'mysagena1234', 'Muhammad Yunus Sagena', '7310123006980002', 3),
(23, 'dianandi', 'dian@gmail.com', 'qwerty', 'hardianty andi munawarah', '7372010215423100', 2),
(24, 'Miftahul Jannah', 'miftahuljn.mj@gmail.com', 'parepare050497', 'Miftahul Jannah', '7372014504970006', 3),
(25, 'aryanuel', 'aryanuel@gmail.com', 'qwerty', 'arya apriansah', '7372010203041000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`kode_role`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uji`
--
ALTER TABLE `tbl_uji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`username`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_pekerjaan_2` (`id_pekerjaan`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_uji`
--
ALTER TABLE `tbl_uji`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD CONSTRAINT `tbl_roles_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `tbl_aspek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD CONSTRAINT `tbl_rules_ibfk_1` FOREIGN KEY (`kode_role`) REFERENCES `tbl_roles` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_uji`
--
ALTER TABLE `tbl_uji`
  ADD CONSTRAINT `tbl_uji_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `tbl_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
