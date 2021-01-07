-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Agu 2020 pada 04.36
-- Versi server: 5.6.38
-- Versi PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nabillah_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `img` text NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tlp` varchar(60) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `poin` bigint(60) NOT NULL,
  `role` enum('admin','reseller','dropshiper') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `email`, `img`, `username`, `password`, `kelamin`, `tlp`, `kota`, `poin`, `role`) VALUES
(1, 'Administrator', '', '', 'admin', 'admin', 'laki-laki', '', '222', 0, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `img` text NOT NULL,
  `tgl` date NOT NULL,
  `sk` text NOT NULL,
  `minimal` varchar(60) NOT NULL,
  `poin` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `give_reward`
--

CREATE TABLE `give_reward` (
  `id_give_reward` int(16) NOT NULL,
  `id_reward` varchar(60) NOT NULL,
  `id_akun` varchar(60) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Trigger `give_reward`
--
DELIMITER $$
CREATE TRIGGER `actReward` AFTER INSERT ON `give_reward` FOR EACH ROW BEGIN
UPDATE akun SET poin=poin-(SELECT poin FROM reward WHERE id_reward=New.id_reward) WHERE id_akun=New.id_akun;
UPDATE reward SET stok=stok-1 WHERE id_reward=New.id_reward;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(16) NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transaksi`
--

CREATE TABLE `item_transaksi` (
  `id_item_transaksi` int(16) NOT NULL,
  `id_transaksi` varchar(60) NOT NULL,
  `id_produk` varchar(60) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `total` varchar(60) NOT NULL,
  `rate` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Trigger `item_transaksi`
--
DELIMITER $$
CREATE TRIGGER `upStok` AFTER INSERT ON `item_transaksi` FOR EACH ROW BEGIN
UPDATE produk SET stok=stok-New.qty WHERE id_produk=New.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `img` text NOT NULL,
  `poin` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(16) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `code`) VALUES
(1, 'Aceh Barat', '23681'),
(2, 'Aceh Barat Daya', '23764'),
(3, 'Aceh Besar', '23951'),
(4, 'Aceh Jaya', '23654'),
(5, 'Aceh Selatan', '23719'),
(6, 'Aceh Singkil', '24785'),
(7, 'Aceh Tamiang', '24476'),
(8, 'Aceh Tengah', '24511'),
(9, 'Aceh Tenggara', '24611'),
(10, 'Aceh Timur', '24454'),
(11, 'Aceh Utara', '24382'),
(12, 'Agam', '26411'),
(13, 'Alor', '85811'),
(14, 'Ambon', '97222'),
(15, 'Asahan', '21214'),
(16, 'Asmat', '99777'),
(17, 'Badung', '80351'),
(18, 'Balangan', '71611'),
(19, 'Balikpapan', '76111'),
(20, 'Banda Aceh', '23238'),
(21, 'Bandar Lampung', '35139'),
(22, 'Bandung', '40311'),
(23, 'Bandung', '40111'),
(24, 'Bandung Barat', '40721'),
(25, 'Banggai', '94711'),
(26, 'Banggai Kepulauan', '94881'),
(27, 'Bangka', '33212'),
(28, 'Bangka Barat', '33315'),
(29, 'Bangka Selatan', '33719'),
(30, 'Bangka Tengah', '33613'),
(31, 'Bangkalan', '69118'),
(32, 'Bangli', '80619'),
(33, 'Banjar', '70619'),
(34, 'Banjar', '46311'),
(35, 'Banjarbaru', '70712'),
(36, 'Banjarmasin', '70117'),
(37, 'Banjarnegara', '53419'),
(38, 'Bantaeng', '92411'),
(39, 'Bantul', '55715'),
(40, 'Banyuasin', '30911'),
(41, 'Banyumas', '53114'),
(42, 'Banyuwangi', '68416'),
(43, 'Barito Kuala', '70511'),
(44, 'Barito Selatan', '73711'),
(45, 'Barito Timur', '73671'),
(46, 'Barito Utara', '73881'),
(47, 'Barru', '90719'),
(48, 'Batam', '29413'),
(49, 'Batang', '51211'),
(50, 'Batang Hari', '36613'),
(51, 'Batu', '65311'),
(52, 'Batu Bara', '21655'),
(53, 'Bau-Bau', '93719'),
(54, 'Bekasi', '17837'),
(55, 'Bekasi', '17121'),
(56, 'Belitung', '33419'),
(57, 'Belitung Timur', '33519'),
(58, 'Belu', '85711'),
(59, 'Bener Meriah', '24581'),
(60, 'Bengkalis', '28719'),
(61, 'Bengkayang', '79213'),
(62, 'Bengkulu', '38229'),
(63, 'Bengkulu Selatan', '38519'),
(64, 'Bengkulu Tengah', '38319'),
(65, 'Bengkulu Utara', '38619'),
(66, 'Berau', '77311'),
(67, 'Biak Numfor', '98119'),
(68, 'Bima', '84171'),
(69, 'Bima', '84139'),
(70, 'Binjai', '20712'),
(71, 'Bintan', '29135'),
(72, 'Bireuen', '24219'),
(73, 'Bitung', '95512'),
(74, 'Blitar', '66171'),
(75, 'Blitar', '66124'),
(76, 'Blora', '58219'),
(77, 'Boalemo', '96319'),
(78, 'Bogor', '16911'),
(79, 'Bogor', '16119'),
(80, 'Bojonegoro', '62119'),
(81, 'Bolaang Mongondow (Bolmong)', '95755'),
(82, 'Bolaang Mongondow Selatan', '95774'),
(83, 'Bolaang Mongondow Timur', '95783'),
(84, 'Bolaang Mongondow Utara', '95765'),
(85, 'Bombana', '93771'),
(86, 'Bondowoso', '68219'),
(87, 'Bone', '92713'),
(88, 'Bone Bolango', '96511'),
(89, 'Bontang', '75313'),
(90, 'Boven Digoel', '99662'),
(91, 'Boyolali', '57312'),
(92, 'Brebes', '52212'),
(93, 'Bukittinggi', '26115'),
(94, 'Buleleng', '81111'),
(95, 'Bulukumba', '92511'),
(96, 'Bulungan (Bulongan)', '77211'),
(97, 'Bungo', '37216'),
(98, 'Buol', '94564'),
(99, 'Buru', '97371'),
(100, 'Buru Selatan', '97351'),
(101, 'Buton', '93754'),
(102, 'Buton Utara', '93745'),
(103, 'Ciamis', '46211'),
(104, 'Cianjur', '43217'),
(105, 'Cilacap', '53211'),
(106, 'Cilegon', '42417'),
(107, 'Cimahi', '40512'),
(108, 'Cirebon', '45611'),
(109, 'Cirebon', '45116'),
(110, 'Dairi', '22211'),
(111, 'Deiyai (Deliyai)', '98784'),
(112, 'Deli Serdang', '20511'),
(113, 'Demak', '59519'),
(114, 'Denpasar', '80227'),
(115, 'Depok', '16416'),
(116, 'Dharmasraya', '27612'),
(117, 'Dogiyai', '98866'),
(118, 'Dompu', '84217'),
(119, 'Donggala', '94341'),
(120, 'Dumai', '28811'),
(121, 'Empat Lawang', '31811'),
(122, 'Ende', '86351'),
(123, 'Enrekang', '91719'),
(124, 'Fakfak', '98651'),
(125, 'Flores Timur', '86213'),
(126, 'Garut', '44126'),
(127, 'Gayo Lues', '24653'),
(128, 'Gianyar', '80519'),
(129, 'Gorontalo', '96218'),
(130, 'Gorontalo', '96115'),
(131, 'Gorontalo Utara', '96611'),
(132, 'Gowa', '92111'),
(133, 'Gresik', '61115'),
(134, 'Grobogan', '58111'),
(135, 'Gunung Kidul', '55812'),
(136, 'Gunung Mas', '74511'),
(137, 'Gunungsitoli', '22813'),
(138, 'Halmahera Barat', '97757'),
(139, 'Halmahera Selatan', '97911'),
(140, 'Halmahera Tengah', '97853'),
(141, 'Halmahera Timur', '97862'),
(142, 'Halmahera Utara', '97762'),
(143, 'Hulu Sungai Selatan', '71212'),
(144, 'Hulu Sungai Tengah', '71313'),
(145, 'Hulu Sungai Utara', '71419'),
(146, 'Humbang Hasundutan', '22457'),
(147, 'Indragiri Hilir', '29212'),
(148, 'Indragiri Hulu', '29319'),
(149, 'Indramayu', '45214'),
(150, 'Intan Jaya', '98771'),
(151, 'Jakarta Barat', '11220'),
(152, 'Jakarta Pusat', '10540'),
(153, 'Jakarta Selatan', '12230'),
(154, 'Jakarta Timur', '13330'),
(155, 'Jakarta Utara', '14140'),
(156, 'Jambi', '36111'),
(157, 'Jayapura', '99352'),
(158, 'Jayapura', '99114'),
(159, 'Jayawijaya', '99511'),
(160, 'Jember', '68113'),
(161, 'Jembrana', '82251'),
(162, 'Jeneponto', '92319'),
(163, 'Jepara', '59419'),
(164, 'Jombang', '61415'),
(165, 'Kaimana', '98671'),
(166, 'Kampar', '28411'),
(167, 'Kapuas', '73583'),
(168, 'Kapuas Hulu', '78719'),
(169, 'Karanganyar', '57718'),
(170, 'Karangasem', '80819'),
(171, 'Karawang', '41311'),
(172, 'Karimun', '29611'),
(173, 'Karo', '22119'),
(174, 'Katingan', '74411'),
(175, 'Kaur', '38911'),
(176, 'Kayong Utara', '78852'),
(177, 'Kebumen', '54319'),
(178, 'Kediri', '64184'),
(179, 'Kediri', '64125'),
(180, 'Keerom', '99461'),
(181, 'Kendal', '51314'),
(182, 'Kendari', '93126'),
(183, 'Kepahiang', '39319'),
(184, 'Kepulauan Anambas', '29991'),
(185, 'Kepulauan Aru', '97681'),
(186, 'Kepulauan Mentawai', '25771'),
(187, 'Kepulauan Meranti', '28791'),
(188, 'Kepulauan Sangihe', '95819'),
(189, 'Kepulauan Seribu', '14550'),
(190, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862'),
(191, 'Kepulauan Sula', '97995'),
(192, 'Kepulauan Talaud', '95885'),
(193, 'Kepulauan Yapen (Yapen Waropen)', '98211'),
(194, 'Kerinci', '37167'),
(195, 'Ketapang', '78874'),
(196, 'Klaten', '57411'),
(197, 'Klungkung', '80719'),
(198, 'Kolaka', '93511'),
(199, 'Kolaka Utara', '93911'),
(200, 'Konawe', '93411'),
(201, 'Konawe Selatan', '93811'),
(202, 'Konawe Utara', '93311'),
(203, 'Kotabaru', '72119'),
(204, 'Kotamobagu', '95711'),
(205, 'Kotawaringin Barat', '74119'),
(206, 'Kotawaringin Timur', '74364'),
(207, 'Kuantan Singingi', '29519'),
(208, 'Kubu Raya', '78311'),
(209, 'Kudus', '59311'),
(210, 'Kulon Progo', '55611'),
(211, 'Kuningan', '45511'),
(212, 'Kupang', '85362'),
(213, 'Kupang', '85119'),
(214, 'Kutai Barat', '75711'),
(215, 'Kutai Kartanegara', '75511'),
(216, 'Kutai Timur', '75611'),
(217, 'Labuhan Batu', '21412'),
(218, 'Labuhan Batu Selatan', '21511'),
(219, 'Labuhan Batu Utara', '21711'),
(220, 'Lahat', '31419'),
(221, 'Lamandau', '74611'),
(222, 'Lamongan', '64125'),
(223, 'Lampung Barat', '34814'),
(224, 'Lampung Selatan', '35511'),
(225, 'Lampung Tengah', '34212'),
(226, 'Lampung Timur', '34319'),
(227, 'Lampung Utara', '34516'),
(228, 'Landak', '78319'),
(229, 'Langkat', '20811'),
(230, 'Langsa', '24412'),
(231, 'Lanny Jaya', '99531'),
(232, 'Lebak', '42319'),
(233, 'Lebong', '39264'),
(234, 'Lembata', '86611'),
(235, 'Lhokseumawe', '24352'),
(236, 'Lima Puluh Koto/Kota', '26671'),
(237, 'Lingga', '29811'),
(238, 'Lombok Barat', '83311'),
(239, 'Lombok Tengah', '83511'),
(240, 'Lombok Timur', '83612'),
(241, 'Lombok Utara', '83711'),
(242, 'Lubuk Linggau', '31614'),
(243, 'Lumajang', '67319'),
(244, 'Luwu', '91994'),
(245, 'Luwu Timur', '92981'),
(246, 'Luwu Utara', '92911'),
(247, 'Madiun', '63153'),
(248, 'Madiun', '63122'),
(249, 'Magelang', '56519'),
(250, 'Magelang', '56133'),
(251, 'Magetan', '63314'),
(252, 'Majalengka', '45412'),
(253, 'Majene', '91411'),
(254, 'Makassar', '90111'),
(255, 'Malang', '65163'),
(256, 'Malang', '65112'),
(257, 'Malinau', '77511'),
(258, 'Maluku Barat Daya', '97451'),
(259, 'Maluku Tengah', '97513'),
(260, 'Maluku Tenggara', '97651'),
(261, 'Maluku Tenggara Barat', '97465'),
(262, 'Mamasa', '91362'),
(263, 'Mamberamo Raya', '99381'),
(264, 'Mamberamo Tengah', '99553'),
(265, 'Mamuju', '91519'),
(266, 'Mamuju Utara', '91571'),
(267, 'Manado', '95247'),
(268, 'Mandailing Natal', '22916'),
(269, 'Manggarai', '86551'),
(270, 'Manggarai Barat', '86711'),
(271, 'Manggarai Timur', '86811'),
(272, 'Manokwari', '98311'),
(273, 'Manokwari Selatan', '98355'),
(274, 'Mappi', '99853'),
(275, 'Maros', '90511'),
(276, 'Mataram', '83131'),
(277, 'Maybrat', '98051'),
(278, 'Medan', '20228'),
(279, 'Melawi', '78619'),
(280, 'Merangin', '37319'),
(281, 'Merauke', '99613'),
(282, 'Mesuji', '34911'),
(283, 'Metro', '34111'),
(284, 'Mimika', '99962'),
(285, 'Minahasa', '95614'),
(286, 'Minahasa Selatan', '95914'),
(287, 'Minahasa Tenggara', '95995'),
(288, 'Minahasa Utara', '95316'),
(289, 'Mojokerto', '61382'),
(290, 'Mojokerto', '61316'),
(291, 'Morowali', '94911'),
(292, 'Muara Enim', '31315'),
(293, 'Muaro Jambi', '36311'),
(294, 'Muko Muko', '38715'),
(295, 'Muna', '93611'),
(296, 'Murung Raya', '73911'),
(297, 'Musi Banyuasin', '30719'),
(298, 'Musi Rawas', '31661'),
(299, 'Nabire', '98816'),
(300, 'Nagan Raya', '23674'),
(301, 'Nagekeo', '86911'),
(302, 'Natuna', '29711'),
(303, 'Nduga', '99541'),
(304, 'Ngada', '86413'),
(305, 'Nganjuk', '64414'),
(306, 'Ngawi', '63219'),
(307, 'Nias', '22876'),
(308, 'Nias Barat', '22895'),
(309, 'Nias Selatan', '22865'),
(310, 'Nias Utara', '22856'),
(311, 'Nunukan', '77421'),
(312, 'Ogan Ilir', '30811'),
(313, 'Ogan Komering Ilir', '30618'),
(314, 'Ogan Komering Ulu', '32112'),
(315, 'Ogan Komering Ulu Selatan', '32211'),
(316, 'Ogan Komering Ulu Timur', '32312'),
(317, 'Pacitan', '63512'),
(318, 'Padang', '25112'),
(319, 'Padang Lawas', '22763'),
(320, 'Padang Lawas Utara', '22753'),
(321, 'Padang Panjang', '27122'),
(322, 'Padang Pariaman', '25583'),
(323, 'Padang Sidempuan', '22727'),
(324, 'Pagar Alam', '31512'),
(325, 'Pakpak Bharat', '22272'),
(326, 'Palangka Raya', '73112'),
(327, 'Palembang', '30111'),
(328, 'Palopo', '91911'),
(329, 'Palu', '94111'),
(330, 'Pamekasan', '69319'),
(331, 'Pandeglang', '42212'),
(332, 'Pangandaran', '46511'),
(333, 'Pangkajene Kepulauan', '90611'),
(334, 'Pangkal Pinang', '33115'),
(335, 'Paniai', '98765'),
(336, 'Parepare', '91123'),
(337, 'Pariaman', '25511'),
(338, 'Parigi Moutong', '94411'),
(339, 'Pasaman', '26318'),
(340, 'Pasaman Barat', '26511'),
(341, 'Paser', '76211'),
(342, 'Pasuruan', '67153'),
(343, 'Pasuruan', '67118'),
(344, 'Pati', '59114'),
(345, 'Payakumbuh', '26213'),
(346, 'Pegunungan Arfak', '98354'),
(347, 'Pegunungan Bintang', '99573'),
(348, 'Pekalongan', '51161'),
(349, 'Pekalongan', '51122'),
(350, 'Pekanbaru', '28112'),
(351, 'Pelalawan', '28311'),
(352, 'Pemalang', '52319'),
(353, 'Pematang Siantar', '21126'),
(354, 'Penajam Paser Utara', '76311'),
(355, 'Pesawaran', '35312'),
(356, 'Pesisir Barat', '35974'),
(357, 'Pesisir Selatan', '25611'),
(358, 'Pidie', '24116'),
(359, 'Pidie Jaya', '24186'),
(360, 'Pinrang', '91251'),
(361, 'Pohuwato', '96419'),
(362, 'Polewali Mandar', '91311'),
(363, 'Ponorogo', '63411'),
(364, 'Pontianak', '78971'),
(365, 'Pontianak', '78112'),
(366, 'Poso', '94615'),
(367, 'Prabumulih', '31121'),
(368, 'Pringsewu', '35719'),
(369, 'Probolinggo', '67282'),
(370, 'Probolinggo', '67215'),
(371, 'Pulang Pisau', '74811'),
(372, 'Pulau Morotai', '97771'),
(373, 'Puncak', '98981'),
(374, 'Puncak Jaya', '98979'),
(375, 'Purbalingga', '53312'),
(376, 'Purwakarta', '41119'),
(377, 'Purworejo', '54111'),
(378, 'Raja Ampat', '98489'),
(379, 'Rejang Lebong', '39112'),
(380, 'Rembang', '59219'),
(381, 'Rokan Hilir', '28992'),
(382, 'Rokan Hulu', '28511'),
(383, 'Rote Ndao', '85982'),
(384, 'Sabang', '23512'),
(385, 'Sabu Raijua', '85391'),
(386, 'Salatiga', '50711'),
(387, 'Samarinda', '75133'),
(388, 'Sambas', '79453'),
(389, 'Samosir', '22392'),
(390, 'Sampang', '69219'),
(391, 'Sanggau', '78557'),
(392, 'Sarmi', '99373'),
(393, 'Sarolangun', '37419'),
(394, 'Sawah Lunto', '27416'),
(395, 'Sekadau', '79583'),
(396, 'Selayar (Kepulauan Selayar)', '92812'),
(397, 'Seluma', '38811'),
(398, 'Semarang', '50511'),
(399, 'Semarang', '50135'),
(400, 'Seram Bagian Barat', '97561'),
(401, 'Seram Bagian Timur', '97581'),
(402, 'Serang', '42182'),
(403, 'Serang', '42111'),
(404, 'Serdang Bedagai', '20915'),
(405, 'Seruyan', '74211'),
(406, 'Siak', '28623'),
(407, 'Sibolga', '22522'),
(408, 'Sidenreng Rappang/Rapang', '91613'),
(409, 'Sidoarjo', '61219'),
(410, 'Sigi', '94364'),
(411, 'Sijunjung (Sawah Lunto Sijunjung)', '27511'),
(412, 'Sikka', '86121'),
(413, 'Simalungun', '21162'),
(414, 'Simeulue', '23891'),
(415, 'Singkawang', '79117'),
(416, 'Sinjai', '92615'),
(417, 'Sintang', '78619'),
(418, 'Situbondo', '68316'),
(419, 'Sleman', '55513'),
(420, 'Solok', '27365'),
(421, 'Solok', '27315'),
(422, 'Solok Selatan', '27779'),
(423, 'Soppeng', '90812'),
(424, 'Sorong', '98431'),
(425, 'Sorong', '98411'),
(426, 'Sorong Selatan', '98454'),
(427, 'Sragen', '57211'),
(428, 'Subang', '41215'),
(429, 'Subulussalam', '24882'),
(430, 'Sukabumi', '43311'),
(431, 'Sukabumi', '43114'),
(432, 'Sukamara', '74712'),
(433, 'Sukoharjo', '57514'),
(434, 'Sumba Barat', '87219'),
(435, 'Sumba Barat Daya', '87453'),
(436, 'Sumba Tengah', '87358'),
(437, 'Sumba Timur', '87112'),
(438, 'Sumbawa', '84315'),
(439, 'Sumbawa Barat', '84419'),
(440, 'Sumedang', '45326'),
(441, 'Sumenep', '69413'),
(442, 'Sungaipenuh', '37113'),
(443, 'Supiori', '98164'),
(444, 'Surabaya', '60119'),
(445, 'Surakarta (Solo)', '57113'),
(446, 'Tabalong', '71513'),
(447, 'Tabanan', '82119'),
(448, 'Takalar', '92212'),
(449, 'Tambrauw', '98475'),
(450, 'Tana Tidung', '77611'),
(451, 'Tana Toraja', '91819'),
(452, 'Tanah Bumbu', '72211'),
(453, 'Tanah Datar', '27211'),
(454, 'Tanah Laut', '70811'),
(455, 'Tangerang', '15914'),
(456, 'Tangerang', '15111'),
(457, 'Tangerang Selatan', '15332'),
(458, 'Tanggamus', '35619'),
(459, 'Tanjung Balai', '21321'),
(460, 'Tanjung Jabung Barat', '36513'),
(461, 'Tanjung Jabung Timur', '36719'),
(462, 'Tanjung Pinang', '29111'),
(463, 'Tapanuli Selatan', '22742'),
(464, 'Tapanuli Tengah', '22611'),
(465, 'Tapanuli Utara', '22414'),
(466, 'Tapin', '71119'),
(467, 'Tarakan', '77114'),
(468, 'Tasikmalaya', '46411'),
(469, 'Tasikmalaya', '46116'),
(470, 'Tebing Tinggi', '20632'),
(471, 'Tebo', '37519'),
(472, 'Tegal', '52419'),
(473, 'Tegal', '52114'),
(474, 'Teluk Bintuni', '98551'),
(475, 'Teluk Wondama', '98591'),
(476, 'Temanggung', '56212'),
(477, 'Ternate', '97714'),
(478, 'Tidore Kepulauan', '97815'),
(479, 'Timor Tengah Selatan', '85562'),
(480, 'Timor Tengah Utara', '85612'),
(481, 'Toba Samosir', '22316'),
(482, 'Tojo Una-Una', '94683'),
(483, 'Toli-Toli', '94542'),
(484, 'Tolikara', '99411'),
(485, 'Tomohon', '95416'),
(486, 'Toraja Utara', '91831'),
(487, 'Trenggalek', '66312'),
(488, 'Tual', '97612'),
(489, 'Tuban', '62319'),
(490, 'Tulang Bawang', '34613'),
(491, 'Tulang Bawang Barat', '34419'),
(492, 'Tulungagung', '66212'),
(493, 'Wajo', '90911'),
(494, 'Wakatobi', '93791'),
(495, 'Waropen', '98269'),
(496, 'Way Kanan', '34711'),
(497, 'Wonogiri', '57619'),
(498, 'Wonosobo', '56311'),
(499, 'Yahukimo', '99041'),
(500, 'Yalimo', '99481'),
(501, 'Yogyakarta', '55111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(16) NOT NULL,
  `id_kategori` varchar(60) NOT NULL,
  `nama` varchar(69) NOT NULL,
  `img` text NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` varchar(60) NOT NULL,
  `harga` varchar(60) NOT NULL,
  `diskon` varchar(60) NOT NULL,
  `bobot` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rek`
--

CREATE TABLE `rek` (
  `id_rek` int(16) NOT NULL,
  `nama` text NOT NULL,
  `type` varchar(60) NOT NULL,
  `rek` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reward`
--

CREATE TABLE `reward` (
  `id_reward` int(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `stok` varchar(60) NOT NULL,
  `poin` varchar(60) NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(16) NOT NULL,
  `nota` varchar(60) NOT NULL,
  `id_akun` varchar(60) NOT NULL,
  `total` varchar(60) NOT NULL,
  `bukti` text NOT NULL,
  `resi` text NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `create_at` date NOT NULL,
  `bobot` varchar(60) NOT NULL,
  `tujuan` varchar(60) NOT NULL,
  `kurir` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `harga` varchar(60) NOT NULL,
  `etd` varchar(60) NOT NULL,
  `status_event` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `give_reward`
--
ALTER TABLE `give_reward`
  ADD PRIMARY KEY (`id_give_reward`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `item_transaksi`
--
ALTER TABLE `item_transaksi`
  ADD PRIMARY KEY (`id_item_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rek`
--
ALTER TABLE `rek`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indeks untuk tabel `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `give_reward`
--
ALTER TABLE `give_reward`
  MODIFY `id_give_reward` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item_transaksi`
--
ALTER TABLE `item_transaksi`
  MODIFY `id_item_transaksi` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rek`
--
ALTER TABLE `rek`
  MODIFY `id_rek` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reward`
--
ALTER TABLE `reward`
  MODIFY `id_reward` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(16) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
