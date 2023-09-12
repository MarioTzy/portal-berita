-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 11:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'PENAMARA MEDIA GROUP', 'admin', '21232f297a57a5a743894a0e4a801fc3', '+6282217604816', 'penamaramedia@gmail.com', 'Jl. Petojo VIJ VI, Cideng, Gambir, Jakarta Pusat 10150.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `berita_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `berita_konten` text NOT NULL,
  `berita_img` varchar(255) NOT NULL,
  `berita_status` tinyint(1) NOT NULL,
  `penulis_berita` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`berita_id`, `category_id`, `judul_berita`, `berita_konten`, `berita_img`, `berita_status`, `penulis_berita`, `tanggal_upload`, `created_at`, `view_count`) VALUES
(27, 31, 'sayur kol enak', '', 'berita_1694073476.png', 0, 'Surya', '2023-08-31', '2023-08-30 09:42:08', 0),
(28, 31, 'Sayur Bayem uyee', '', 'berita_1693389904.jpg', 1, 'Mario Ahmad', '2023-08-11', '2023-08-30 10:05:04', 0),
(29, 31, 'Jokowi Buka Suara soal Anggota Paspampres Aniaya Warga hingga Tewas  ', '<p>Karangan ini berisi gambaran mengenai suatu hal/keadaan sehingga pembaca seolah-olah melihat, mendengar, atau merasakan hal tersebut.</p>\r\n\r\n<p>Contoh deskripsi berisi fakta:</p>\r\n\r\n<blockquote>\r\n<p>Hampir semua pelosok Mentawai indah. Di empat kecamatan masih terdapat hutan yang masih perawan. Hutan ini menyimpan ratusan jenis flora dan fauna. Hutan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mentawai\">Mentawai</a>&nbsp;juga menyimpan anggrek aneka jenis dan fauna yang hanya terdapat di Mentawai. Siamang kerdil, lutung Mentawai dan beruk Simakobu adalah contoh&nbsp;<a href=\"https://id.wikipedia.org/wiki/Primata\">primata</a>&nbsp;yang menarik untuk bahan penelitian dan objek wisata.</p>\r\n</blockquote>\r\n\r\n<p>Contoh deskripsi berupa fiksi:</p>\r\n\r\n<blockquote>\r\n<p>Salju tipis melapis rumput, putih berkilau diseling warna jingga; bayang matahari senja yang memantul. Angin awal musim dingin bertiup menggigilkan, mempermainkan daun-daun sisa musim gugur dan menderaikan bulu-bulu burung berwarna kuning kecoklatan yang sedang meloncat-loncat dari satu ranting ke ranting yang lain.</p>\r\n</blockquote>\r\n\r\n<p>Topik yang tepat untuk deskripsi misalnya:</p>\r\n\r\n<ul>\r\n	<li>Keindahan Bukit Kintamani;</li>\r\n	<li>Suasana pelaksanaan;</li>\r\n	<li>Promosi;</li>\r\n	<li>Kompetensi Siswa SMK Tingkat Nasional;</li>\r\n	<li>Keadaan ruang praktik;</li>\r\n	<li>Keadaan daerah yang dilanda bencana.</li>\r\n</ul>\r\n\r\n<p>Langkah menyusun deskripsi:</p>\r\n\r\n<ul>\r\n	<li>Tentukan objek atau tema yang akan dideskripsikan;</li>\r\n	<li>Tentukan tujuan;</li>\r\n	<li>Tentukan aspek-aspek yang akan dideskripsikan dengan melakukan pengamatan;</li>\r\n	<li>Susunlah aspek-aspek tersebut ke dalam urutan yang baik, apakah urutan lokasi, urutan waktu, atau urutan menurut kepentingan;</li>\r\n	<li>Kembangkan kerangka menjadi deskripsi.</li>\r\n</ul>\r\n\r\n<h3>Narasi</h3>\r\n\r\n<p>Secara sederhana, narasi dikenal sebagai cerita. Pada narasi terdapat peristiwa atau kejadian dalam satu urutan waktu. Di dalam kejadian itu ada pula tokoh yang menghadapi suatu konflik. Narasi dapat berisi fakta atau fiksi.</p>\r\n\r\n<p>Contoh narasi yang berisi fakta:&nbsp;<a href=\"https://id.wikipedia.org/wiki/Biografi\">biografi</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Autobiografi\">autobiografi</a>, atau kisah pengalaman.</p>\r\n\r\n<p>Contoh narasi yang berupa&nbsp;<a href=\"https://id.wikipedia.org/wiki/Fiksi\">fiksi</a>:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Novel\">novel</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerpen\">cerpen</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerbung\">cerbung</a>, ataupun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cergam\">cergam</a>.</li>\r\n</ul>\r\n\r\n<p><strong>Pola narasi secara sederhana:</strong></p>\r\n\r\n<ul>\r\n	<li>awal;</li>\r\n	<li>tengah;</li>\r\n	<li>akhir.</li>\r\n</ul>\r\n\r\n<p>Awal narasi biasanya berisi pengantar yaitu memperkenalkan suasana dan tokoh. Bagian awal harus dibuat menarik agar dapat mengikat pembaca. Bagian tengah merupakan bagian yang memunculkan suatu konflik.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Konflik\">Konflik</a>&nbsp;lalu diarahkan menuju klimaks cerita. Setelah konfik timbul dan mencapai klimaks, secara berangsur-angsur cerita akan mereda. Akhir cerita yang mereda ini memiliki cara pengungkapan bermacam-macam. Ada yang menceritakannya dengan panjang, ada yang singkat, ada pula yang berusaha menggantungkan akhir cerita dengan mempersilakan pembaca untuk menebaknya sendiri.</p>\r\n\r\n<p>Contoh narasi berisi fakta:</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://id.wikipedia.org/wiki/Ir._Soekarno\">Ir. Soekarno</a><br />\r\nIr. Soekarno, Presiden Republik Indonesia pertama adalah seorang nasionalis. Ia memimpin PNI pada tahun 1928. Soekarno menghabiskan waktunya di penjara dan di tempat pengasingan karena keberaniannya menentang penjajah.<br />\r\nSoekarno bersama Mohammad Hatta sebagai wakil bangsa Indonesia memproklamasikan kemerdekaan Indonesia pada tanggal 17 Agustus 1945. Ia ditangkap Belanda dan diasingkan ke Bengkulu pada tahun 1948. Soekarno dikembalikan ke Yogya dan dipulihkan kedudukannya sebagai Presiden RI pada tahun 1949.</p>\r\n</blockquote>\r\n\r\n<p>Contoh narasi fiksi:</p>\r\n\r\n<blockquote>\r\n<p>Aku tersenyum sambil mengayunkan langkah. Angin dingin yang menerpa, membuat tulang-tulang di sekujur tubuhku bergemeretak. Kumasukkan kedua telapak tangan ke dalam saku jaket, mencoba memerangi rasa dingin yang terasa begitu menyiksa.</p>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p>Wangi kayu cadar yang terbakar di perapian menyambutku ketika Eriza membukakan pintu. Wangi yang kelak akan kurindui ketika aku telah kembali ke tanah air. Tapi wajah ayu di hadapanku, akankah kurindui juga?</p>\r\n</blockquote>\r\n\r\n<p>Langkah menyusun narasi (fiksi) melalui proses kreatif, dimulai dengan mencari, menemukan, dan menggali ide. Cerita dirangkai dengan menggunakan &ldquo;rumus&rdquo; 5 W + 1 H. Di mana seting/lokasi ceritanya, siapa pelaku ceritanya, apa yang akan diceritakan, kapan peristiwa-peristiwa berlangsung, mengapa peristiwa-peristiwa itu terjadi, dan bagaimana cerita itu dipaparkan.</p>\r\n\r\n<h3>Eksposisi</h3>\r\n\r\n<p>Karangan ini berisi uraian atau penjelasan tentang suatu topik dengan tujuan memberi informasi atau pengetahuan tambahan bagi pembaca. Untuk memperjelas uraian, dapat dilengkapi dengan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Grafik\">grafik</a>, gambar atau statistik.</p>\r\n\r\n<p>Contoh:</p>\r\n\r\n<blockquote>\r\n<p>Pada dasarnya pekerjaan akuntan mencakup dua bidang pokok, yaitu akuntansi dan auditing. Dalam bidang akuntasi, pekerjaan akuntan berupa pengolahan data untuk menghasilkan informasi keuangan, juga perencanaan sistem informasi akuntansi yang digunakan untuk menghasilkan informasi keuangan.</p>\r\n</blockquote>\r\n\r\n<p>Dalam bidang auditing pekerjaan akuntan berupa pemeriksaan laporan keuangan secara objektif untuk menilai kewajaran informasi yang tercantum dalam laporan tersebut.</p>\r\n\r\n<p>Topik yang tepat untuk eksposisi, antara lain:</p>\r\n\r\n<ul>\r\n	<li>Manfaat kegiatan ekstrakurikuler</li>\r\n	<li>Peranan majalah dinding di sekolah</li>\r\n	<li>Sekolah kejuruan sebagai penghasil tenaga terampil.</li>\r\n	<li>Tidak jarang eksposisi berisi uraian tentang langkah/cara/ proses kerja.</li>\r\n</ul>\r\n\r\n<p>Eksposisi demikian lazim disebut paparan proses.</p>\r\n\r\n<p><strong>Contoh paparan proses:</strong></p>\r\n\r\n<p>Cara mencangkok tanaman</p>\r\n\r\n<ol>\r\n	<li>Siapkan pisau, tali rafia, tanah yang subur, dan sabut secukupnya.</li>\r\n	<li>Pilihlah ranting yang tegak, kekar, dan sehat dengan diameter kira-kira 1,5 sampai 2 cm.</li>\r\n	<li>Kulit ranting yang akan dicangkok dikerat dan dikelupas sampai bersih kira-kira sepanjang 10 cm.</li>\r\n</ol>\r\n\r\n<p><strong>Langkah menyusun eksposisi:</strong></p>\r\n\r\n<ul>\r\n	<li>Menentukan topik/tema;</li>\r\n	<li>Menetapkan tujuan;</li>\r\n	<li>Mengumpulkan data dari berbagai sumber;</li>\r\n	<li>Menyusun kerangka karangan sesuai dengan topik yang dipilih;</li>\r\n	<li>Mengembangkan kerangka menjadi karangan eksposisi.</li>\r\n</ul>\r\n\r\n<h3>Argumentasi</h3>\r\n\r\n<p>Karangan ini bertujuan membuktikan kebenaran suatu pendapat atau kesimpulan dengan data atau fakta sebagai alasan atau bukti. Dalam argumentasi pengarang mengharapkan pembenaran pendapatnya dari pembaca. Adanya unsur opini dan data, juga fakta atau alasan sebagai penyokong opini tersebut.</p>\r\n\r\n<p>Contoh:</p>\r\n\r\n<blockquote>\r\n<p>Jiwa kepahlawanan harus senantiasa dipupuk dan dikembangkan karena dengan jiwa kepahlawanan. Pembangunan di negara kita dapat berjalan dengan sukses. Jiwa kepahlawanan akan berkembang menjadi nilai-nilai dan sifat kepribadian yang luhur, berjiwa besar, bertanggung jawab, berdedikasi, loyal, tangguh, dan cinta terhadap sesama. Semua sifat ini sangat dibutuhkan untuk mendukung pembangunan di berbagai bidang.</p>\r\n</blockquote>\r\n\r\n<p>Tema/topik yang tepat untuk argumentasi, misalnya:</p>\r\n\r\n<ul>\r\n	<li>Disiplin kunci sukses berwirausaha</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Teknologi\">Teknologi</a>&nbsp;komunikasi harus segera dikuasai</li>\r\n	<li>Sekolah Menengah Kejuruan sebagai aset bangsa yang potensial</li>\r\n</ul>\r\n\r\n<p><strong>Langkah menyusun argumentasi:</strong></p>\r\n\r\n<ul>\r\n	<li>Menentukan topik/tema;</li>\r\n	<li>Menetapkan tujuan;</li>\r\n	<li>Mengumpulkan data dari berbagai sumber;</li>\r\n	<li>Menyusun kerangka karangan sesuai dengan topik yang dipilih;</li>\r\n	<li>Mengembangkan kerangka menjadi karangan argumentasi.</li>\r\n</ul>\r\n\r\n<h3>Persuasi</h3>\r\n\r\n<p><a href=\"https://id.wikipedia.org/wiki/Karangan\">Karangan</a>&nbsp;ini bertujuan mempengaruhi pembaca untuk berbuat sesuatu. Dalam persuasi pengarang mengharapkan adanya sikap motorik berupa motorik berupa perbuatan yang dilakukan oleh pembaca sesuai dengan yang dianjurkan penulis dalam karangannya.</p>\r\n\r\n<p>Topik/tema yang tepat untuk persuasi, misalnya:</p>\r\n\r\n<ul>\r\n	<li>Katakan tidak pada NARKOBA</li>\r\n	<li>Hemat energi demi generasi mendatang</li>\r\n	<li>Hutan sahabat kita</li>\r\n	<li>Hidup sehat tanpa rokok</li>\r\n	<li>Membaca memperluas cakrawala</li>\r\n</ul>\r\n\r\n<p><strong>Langkah menyusun persuasi:</strong></p>\r\n\r\n<ul>\r\n	<li>Menentukan topik/tema;</li>\r\n	<li>Merumuskan tujuan;</li>\r\n	<li>Mengumpulkan data dari berbagai sumber;</li>\r\n	<li>Menyusun kerangka karangan;</li>\r\n	<li>Mengembangkan kerangka karangan menjadi karangan persuasi.</li>\r\n</ul>\r\n', 'berita_1693477506.png', 1, 'Surya', '2023-08-31', '2023-08-31 10:25:06', 0),
(30, 31, 'ANALISIS PEMANFAATAN LAHAN PADA KAWASAN PEMBANGUNA', '<p>Penelitian ini bertujuan untuk mengetahui kesesuaian lahan untuk berbagai peruntukan pada kawasan pembangunan pelabuhan niaga di wilayah pantai Kaliwungu waktu sekarang dan perubahan pola pemanfaatan lahan akibat pembangunan pelabuhan niaga di pantai Kaliwungu Kabupaten Kendal. Untuk mendapatkan sampel yang mewakili populasi dilakukan dengan metode purposive sampling dengan jumlah responden sebanyak 160 orang. Pengumpulan data primer didapatkan dengan cara observasi, tanya jawab dengan instansi terkait dan pengisian kuesener yang dilakukan oleh masyarakat sebagai &lsquo;stakeholder&rsquo;. Data sekunder didapatkan dari instansi yang berkaitan dengan topik tulisan. Data dianalisis dengan dibagi menjadi analisis keruangan dan kesesuaian lahan, analisis perubahan parameter lingkungan, analisis sosial. Hasil penelitian menunjukkan bahwa dari segi kesesuaian lahan pada kawasan pembangunan pelabuhan niaga termasuk kategori sesuai untuk peruntukan pembangunan pelabuhan, budidaya tambak, industri, wisata dan kategori agak sesuai untuk peruntukan pertanian, pemukiman. Perubahan pola pemanfaatan berupa perubahan tata ruang yang telah ada menjadi tata ruang baru, sehingga terjadi perubahan pemanfaatan lahan berupa sawah dan tambak untuk pembangunan lokasi pelabuhan dan sarana pendukung pelabuhan seluas 32 ha dan sarana penunjang pengairan untuk kegiatan tambak. Kata-kata kunci: analisis pemanfaatan lahan, kawasan pembangunan pelabuhan niaga, pantai Kaliwungu.</p>\r\n', 'berita_1693478564.PNG', 1, 'Andin Irsadi , Sutrisno Anggoro  , Agus Hartoko', '2023-08-09', '2023-08-31 10:42:44', 0),
(34, 31, 'Artikel Adalah: Ciri, Tujuan, Struktur, Jenis, dan Contohnya  ', '<p>Karangan ini berisi gambaran mengenai suatu hal/keadaan sehingga pembaca seolah-olah melihat, mendengar, atau merasakan hal tersebut.</p>\r\n\r\n<p>Contoh deskripsi berisi fakta:</p>\r\n\r\n<blockquote>\r\n<p>Hampir semua pelosok Mentawai indah. Di empat kecamatan masih terdapat hutan yang masih perawan. Hutan ini menyimpan ratusan jenis flora dan fauna. Hutan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mentawai\">Mentawai</a>&nbsp;juga menyimpan anggrek aneka jenis dan fauna yang hanya terdapat di Mentawai. Siamang kerdil, lutung Mentawai dan beruk Simakobu adalah contoh&nbsp;<a href=\"https://id.wikipedia.org/wiki/Primata\">primata</a>&nbsp;yang menarik untuk bahan penelitian dan objek wisata.</p>\r\n</blockquote>\r\n\r\n<p>Contoh deskripsi berupa fiksi:</p>\r\n\r\n<blockquote>\r\n<p>Salju tipis melapis rumput, putih berkilau diseling warna jingga; bayang matahari senja yang memantul. Angin awal musim dingin bertiup menggigilkan, mempermainkan daun-daun sisa musim gugur dan menderaikan bulu-bulu burung berwarna kuning kecoklatan yang sedang meloncat-loncat dari satu ranting ke ranting yang lain.</p>\r\n</blockquote>\r\n\r\n<p>Topik yang tepat untuk deskripsi misalnya:</p>\r\n\r\n<ul>\r\n	<li>Keindahan Bukit Kintamani;</li>\r\n	<li>Suasana pelaksanaan;</li>\r\n	<li>Promosi;</li>\r\n	<li>Kompetensi Siswa SMK Tingkat Nasional;</li>\r\n	<li>Keadaan ruang praktik;</li>\r\n	<li>Keadaan daerah yang dilanda bencana.</li>\r\n</ul>\r\n\r\n<p>Langkah menyusun deskripsi:</p>\r\n\r\n<ul>\r\n	<li>Tentukan objek atau tema yang akan dideskripsikan;</li>\r\n	<li>Tentukan tujuan;</li>\r\n	<li>Tentukan aspek-aspek yang akan dideskripsikan dengan melakukan pengamatan;</li>\r\n	<li>Susunlah aspek-aspek tersebut ke dalam urutan yang baik, apakah urutan lokasi, urutan waktu, atau urutan menurut kepentingan;</li>\r\n	<li>Kembangkan kerangka menjadi deskripsi.</li>\r\n</ul>\r\n\r\n<h3>Narasi</h3>\r\n\r\n<p>Secara sederhana, narasi dikenal sebagai cerita. Pada narasi terdapat peristiwa atau kejadian dalam satu urutan waktu. Di dalam kejadian itu ada pula tokoh yang menghadapi suatu konflik. Narasi dapat berisi fakta atau fiksi.</p>\r\n\r\n<p>Contoh narasi yang berisi fakta:&nbsp;<a href=\"https://id.wikipedia.org/wiki/Biografi\">biografi</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Autobiografi\">autobiografi</a>, atau kisah pengalaman.</p>\r\n\r\n<p>Contoh narasi yang berupa&nbsp;<a href=\"https://id.wikipedia.org/wiki/Fiksi\">fiksi</a>:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Novel\">novel</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerpen\">cerpen</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerbung\">cerbung</a>, ataupun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cergam\">cergam</a>.</li>\r\n</ul>\r\n\r\n<p><strong>Pola narasi secara sederhana:</strong></p>\r\n\r\n<ul>\r\n	<li>awal;</li>\r\n	<li>tengah;</li>\r\n	<li>akhir.</li>\r\n</ul>\r\n\r\n<p>Awal narasi biasanya berisi pengantar yaitu memperkenalkan suasana dan tokoh. Bagian awal harus dibuat menarik agar dapat mengikat pembaca. Bagian tengah merupakan bagian yang memunculkan suatu konflik.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Konflik\">Konflik</a>&nbsp;lalu diarahkan menuju klimaks cerita. Setelah konfik timbul dan mencapai klimaks, secara berangsur-angsur cerita akan mereda. Akhir cerita yang mereda ini memiliki cara pengungkapan bermacam-macam. Ada yang menceritakannya dengan panjang, ada yang singkat, ada pula yang berusaha menggantungkan akhir cerita dengan mempersilakan pembaca untuk menebaknya sendiri.</p>\r\n\r\n<p>Contoh narasi berisi fakta:</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://id.wikipedia.org/wiki/Ir._Soekarno\">Ir. Soekarno</a><br />\r\nIr. Soekarno, Presiden Republik Indonesia pertama adalah seorang nasionalis. Ia memimpin PNI pada tahun 1928. Soekarno menghabiskan waktunya di penjara dan di tempat pengasingan karena keberaniannya menentang penjajah.<br />\r\nSoekarno bersama Mohammad Hatta sebagai wakil bangsa Indonesia memproklamasikan kemerdekaan Indonesia pada tanggal 17 Agustus 1945. Ia ditangkap Belanda dan diasingkan ke Bengkulu pada tahun 1948. Soekarno dikembalikan ke Yogya dan dipulihkan kedudukannya sebagai Presiden RI pada tahun 1949.</p>\r\n</blockquote>\r\n\r\n<p>Contoh narasi fiksi:</p>\r\n\r\n<blockquote>\r\n<p>Aku tersenyum sambil mengayunkan langkah. Angin dingin yang menerpa, membuat tulang-tulang di sekujur tubuhku bergemeretak. Kumasukkan kedua telapak tangan ke dalam saku jaket, mencoba memerangi rasa dingin yang terasa begitu menyiksa.</p>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p>Wangi kayu cadar yang terbakar di perapian menyambutku ketika Eriza membukakan pintu. Wangi yang kelak akan kurindui ketika aku telah kembali ke tanah air. Tapi wajah ayu di hadapanku, akankah kurindui juga?</p>\r\n</blockquote>\r\n\r\n<p>Langkah menyusun narasi (fiksi) melalui proses kreatif, dimulai dengan mencari, menemukan, dan menggali ide. Cerita dirangkai dengan menggunakan &ldquo;rumus&rdquo; 5 W + 1 H. Di mana seting/lokasi ceritanya, siapa pelaku ceritanya, apa yang akan diceritakan, kapan peristiwa-peristiwa berlangsung, mengapa peristiwa-peristiwa itu terjadi, dan bagaimana cerita itu dipaparkan.</p>\r\n\r\n<h3>Eksposisi</h3>\r\n\r\n<p>Karangan ini berisi uraian atau penjelasan tentang suatu topik dengan tujuan memberi informasi atau pengetahuan tambahan bagi pembaca. Untuk memperjelas uraian, dapat dilengkapi dengan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Grafik\">grafik</a>, gambar atau statistik.</p>\r\n\r\n<p>Contoh:</p>\r\n\r\n<blockquote>\r\n<p>Pada dasarnya pekerjaan akuntan mencakup dua bidang pokok, yaitu akuntansi dan auditing. Dalam bidang akuntasi, pekerjaan akuntan berupa pengolahan data untuk menghasilkan informasi keuangan, juga perencanaan sistem informasi akuntansi yang digunakan untuk menghasilkan informasi keuangan.</p>\r\n</blockquote>\r\n\r\n<p>Dalam bidang auditing pekerjaan akuntan berupa pemeriksaan laporan keuangan secara objektif untuk menilai kewajaran informasi yang tercantum dalam laporan tersebut.</p>\r\n\r\n<p>Topik yang tepat untuk eksposisi, antara lain:</p>\r\n\r\n<ul>\r\n	<li>Manfaat kegiatan ekstrakurikuler</li>\r\n	<li>Peranan majalah dinding di sekolah</li>\r\n	<li>Sekolah kejuruan sebagai penghasil tenaga terampil.</li>\r\n	<li>Tidak jarang eksposisi berisi uraian tentang langkah/cara/ proses kerja.</li>\r\n</ul>\r\n\r\n<p>Eksposisi demikian lazim disebut paparan proses.</p>\r\n\r\n<p><strong>Contoh paparan proses:</strong></p>\r\n\r\n<p>Cara mencangkok tanaman</p>\r\n\r\n<ol>\r\n	<li>Siapkan pisau, tali rafia, tanah yang subur, dan sabut secukupnya.</li>\r\n	<li>Pilihlah ranting yang tegak, kekar, dan sehat dengan diameter kira-kira 1,5 sampai 2 cm.</li>\r\n	<li>Kulit ranting yang akan dicangkok dikerat dan dikelupas sampai bersih kira-kira sepanjang 10 cm.</li>\r\n</ol>\r\n\r\n<p><strong>Langkah menyusun eksposisi:</strong></p>\r\n\r\n<ul>\r\n	<li>Menentukan topik/tema;</li>\r\n	<li>Menetapkan tujuan;</li>\r\n	<li>Mengumpulkan data dari berbagai sumber;</li>\r\n	<li>Menyusun kerangka karangan sesuai dengan topik yang dipilih;</li>\r\n	<li>Mengembangkan kerangka menjadi karangan eksposisi.</li>\r\n</ul>\r\n\r\n<h3>Argumentasi</h3>\r\n\r\n<p>Karangan ini bertujuan membuktikan kebenaran suatu pendapat atau kesimpulan dengan data atau fakta sebagai alasan atau bukti. Dalam argumentasi pengarang mengharapkan pembenaran pendapatnya dari pembaca. Adanya unsur opini dan data, juga fakta atau alasan sebagai penyokong opini tersebut.</p>\r\n\r\n<p>Contoh:</p>\r\n\r\n<blockquote>\r\n<p>Jiwa kepahlawanan harus senantiasa dipupuk dan dikembangkan karena dengan jiwa kepahlawanan. Pembangunan di negara kita dapat berjalan dengan sukses. Jiwa kepahlawanan akan berkembang menjadi nilai-nilai dan sifat kepribadian yang luhur, berjiwa besar, bertanggung jawab, berdedikasi, loyal, tangguh, dan cinta terhadap sesama. Semua sifat ini sangat dibutuhkan untuk mendukung pembangunan di berbagai bidang.</p>\r\n</blockquote>\r\n\r\n<p>Tema/topik yang tepat untuk argumentasi, misalnya:</p>\r\n\r\n<ul>\r\n	<li>Disiplin kunci sukses berwirausaha</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Teknologi\">Teknologi</a>&nbsp;komunikasi harus segera dikuasai</li>\r\n	<li>Sekolah Menengah Kejuruan sebagai aset bangsa yang potensial</li>\r\n</ul>\r\n\r\n<p><strong>Langkah menyusun argumentasi:</strong></p>\r\n\r\n<ul>\r\n	<li>Menentukan topik/tema;</li>\r\n	<li>Menetapkan tujuan;</li>\r\n	<li>Mengumpulkan data dari berbagai sumber;</li>\r\n	<li>Menyusun kerangka karangan sesuai dengan topik yang dipilih;</li>\r\n	<li>Mengembangkan kerangka menjadi karangan argumentasi.</li>\r\n</ul>\r\n', 'berita_1693826984.png', 1, 'Surya', '2023-09-04', '2023-09-04 11:29:44', 0),
(35, 31, 'Narasi', '<p>Secara sederhana, narasi dikenal sebagai cerita. Pada narasi terdapat peristiwa atau kejadian dalam satu urutan waktu. Di dalam kejadian itu ada pula tokoh yang menghadapi suatu konflik. Narasi dapat berisi fakta atau fiksi.</p>\r\n\r\n<p>Contoh narasi yang berisi fakta:&nbsp;<a href=\"https://id.wikipedia.org/wiki/Biografi\">biografi</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Autobiografi\">autobiografi</a>, atau kisah pengalaman.</p>\r\n\r\n<p>Contoh narasi yang berupa&nbsp;<a href=\"https://id.wikipedia.org/wiki/Fiksi\">fiksi</a>:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Novel\">novel</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerpen\">cerpen</a>;</li>\r\n	<li><a href=\"https://id.wikipedia.org/wiki/Cerbung\">cerbung</a>, ataupun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cergam\">cergam</a>.</li>\r\n</ul>\r\n\r\n<p><strong>Pola narasi secara sederhana:</strong></p>\r\n\r\n<ul>\r\n	<li>awal;</li>\r\n	<li>tengah;</li>\r\n	<li>akhir.</li>\r\n</ul>\r\n\r\n<p>Awal narasi biasanya berisi pengantar yaitu memperkenalkan suasana dan tokoh. Bagian awal harus dibuat menarik agar dapat mengikat pembaca. Bagian tengah merupakan bagian yang memunculkan suatu konflik.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Konflik\">Konflik</a>&nbsp;lalu diarahkan menuju klimaks cerita. Setelah konfik timbul dan mencapai klimaks, secara berangsur-angsur cerita akan mereda. Akhir cerita yang mereda ini memiliki cara pengungkapan bermacam-macam. Ada yang menceritakannya dengan panjang, ada yang singkat, ada pula yang berusaha menggantungkan akhir cerita dengan mempersilakan pembaca untuk menebaknya sendiri.</p>\r\n\r\n<p>Contoh narasi berisi fakta:</p>\r\n', 'berita_1693827055.jpg', 1, 'Surya', '2023-09-16', '2023-09-04 11:30:55', 0),
(36, 33, 'Sayur Bayem', '', 'berita_1693827276.PNG', 1, 'Surya', '2023-09-05', '2023-09-04 11:34:36', 0),
(37, 32, 'ANALISIS PEMANFAATAN LAHAN PADA KAWASAN PEMBANGUNAN PELABUHAN NIAGA', '<p>Penelitian ini bertujuan untuk mengetahui kesesuaian lahan untuk berbagai peruntukan pada kawasan pembangunan pelabuhan niaga di wilayah pantai Kaliwungu waktu sekarang dan perubahan pola pemanfaatan lahan akibat pembangunan pelabuhan niaga di pantai Kaliwungu Kabupaten Kendal. Untuk mendapatkan sampel yang mewakili populasi dilakukan dengan metode purposive sampling dengan jumlah responden sebanyak 160 orang. Pengumpulan data primer didapatkan dengan cara observasi, tanya jawab dengan instansi terkait dan pengisian kuesener yang dilakukan oleh masyarakat sebagai &lsquo;stakeholder&rsquo;. Data sekunder didapatkan dari instansi yang berkaitan dengan topik tulisan. Data dianalisis dengan dibagi menjadi analisis keruangan dan kesesuaian lahan, analisis perubahan parameter lingkungan, analisis sosial. Hasil penelitian menunjukkan bahwa dari segi kesesuaian lahan pada kawasan pembangunan pelabuhan niaga termasuk kategori sesuai untuk peruntukan pembangunan pelabuhan, budidaya tambak, industri, wisata dan kategori agak sesuai untuk peruntukan pertanian, pemukiman. Perubahan pola pemanfaatan berupa perubahan tata ruang yang telah ada menjadi tata ruang baru, sehingga terjadi perubahan pemanfaatan lahan berupa sawah dan tambak untuk pembangunan lokasi pelabuhan dan sarana pendukung pelabuhan seluas 32 ha dan sarana penunjang pengairan untuk kegiatan tambak. Kata-kata kunci: analisis pemanfaatan lahan, kawasan pembangunan pelabuhan niaga, pantai Kaliwungu.</p>\r\n', 'berita_1693830224.png', 1, 'Surya', '2023-09-23', '2023-09-04 12:23:44', 0),
(38, 35, 'asikk', '', 'berita_1693860078.JPG', 1, 'Surya', '2023-09-05', '2023-09-04 20:41:18', 0),
(39, 32, 'Sayur Bayem', '', 'berita_1693860110.PNG', 1, 'Surya', '2023-09-05', '2023-09-04 20:41:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `created_at`) VALUES
(31, 'Literature/Sastra', '0000-00-00 00:00:00'),
(32, 'Ragam', '0000-00-00 00:00:00'),
(33, 'Opini', '0000-00-00 00:00:00'),
(34, 'Daerah', '0000-00-00 00:00:00'),
(35, 'Nasional', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_footer`
--

CREATE TABLE `tb_footer` (
  `footer_id` int(11) NOT NULL,
  `footer_title` varchar(255) NOT NULL,
  `footer_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_footer`
--

INSERT INTO `tb_footer` (`footer_id`, `footer_title`, `footer_content`) VALUES
(1, 'Redaksi', '<p><strong>Pemimpin Redaksi</strong></p>\r\n\r\n<p>Mauladi Fachrian</p>\r\n\r\n<p><strong>Redaktur Peliputan</strong></p>\r\n\r\n<p>Cesare Hermanchez</p>\r\n\r\n<p><strong>Redaktur Cesare</strong></p>\r\n\r\n<p>Hermanchez, Kamal Fajrin, Mauladi Fachrian, Simon Julius Reporter A. Rosyid Warisman</p>\r\n\r\n<p>, Ari Sujatmiko, Noperman Pangean, Mas Ramandha FK, Fiqri</p>\r\n\r\n<p><strong>Media Sosial</strong></p>\r\n\r\n<p>M. Zeiny Iksan Amaliansyah</p>\r\n'),
(3, 'Tentang Kami', '<p>Infomassa.com merupakan portal berita berbasis daring yang diterbitkan oleh PT. Media Rakyat Semesta pada tahun 2021.</p>\r\n\r\n<p>Memasang tagline &lsquo;informasi pilihan rakyat&rsquo;, infomassa.com siap menyajikan berita menarik dan aktual dari berbagai kanal seperti Nasional, Daerah, Banten, Tangerang Raya, Ragam Massa, Opini dan Profil.</p>\r\n\r\n<p>Dalam penulisan berita, tentunya infomassa.com akan memperhatikan dan mematuhi kode etik jurnalistik sebagai acuan kerja tim redaksi.</p>\r\n\r\n<p>Setiap tim redaksi infomassa.com juga dibekali ID card sebagai legitimasi perusahaan yang bisa digunakan dalam setiap peliputan.</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_footer`
--
ALTER TABLE `tb_footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_footer`
--
ALTER TABLE `tb_footer`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
