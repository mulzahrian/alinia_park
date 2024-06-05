-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jun 2024 pada 04.20
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alinia`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRC_GET_PACKAGE` ()  BEGIN
SELECT
  a.Id_package,
  a.package_name,
  b.name
FROM
  tbl_package a,
  USER b
WHERE
  a.create_by = b.id ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(12) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_no` int(50) NOT NULL,
  `create_by` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `bank_name`, `account_no`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 'Bank Bca', 976213123, '14', '2024-05-18 00:07:26', '', '2024-05-18 00:07:26', 1),
(2, 'Bank Mandiri', 821989089, '14', '2024-05-18 00:09:20', '', '2024-05-18 00:09:20', 1),
(3, 'Bank Bri', 776572319, '14', '2024-05-18 00:10:44', '', '2024-05-18 00:10:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fav`
--

CREATE TABLE `tbl_fav` (
  `id_fav` int(12) NOT NULL,
  `id_package` int(50) NOT NULL,
  `create_by` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `Id_hotel` int(20) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `ukuran` varchar(12) NOT NULL,
  `ac` varchar(20) NOT NULL,
  `service` varchar(50) NOT NULL,
  `image_hotel` varchar(250) NOT NULL,
  `type_hotel` int(12) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(120) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`Id_hotel`, `hotel_name`, `price`, `ukuran`, `ac`, `service`, `image_hotel`, `type_hotel`, `create_date`, `create_by`, `update_date`, `update_by`, `status`) VALUES
(1, 'LUXURY VILLA', 1200000, '30.0', 'AC', 'Tidak bisa Refund', 'luxury_villa.png', 1, '2024-04-29 19:00:19', '14', '2024-04-29 19:00:19', '', 1),
(5, 'LUXURY COTTAGE', 800000, '20.80', 'AC', 'Pembatalan dikenai biaya', 'luxury_cottage.png', 2, '2024-05-03 04:05:18', '14', '2024-05-03 04:05:18', '', 1),
(6, 'DULUXE HOMESTAY', 600000, '15', 'AC', 'Pembatalan dikenai biaya', 'duluxe_homestay.png', 3, '2024-05-03 04:17:44', '12', '2024-05-03 04:17:44', '', 1),
(7, 'STANDART HOMESTAY', 500000, '12', 'NON AC', 'Pembatalan dikenai biaya', 'standart_homestay.png', 3, '2024-05-03 04:26:07', '12', '2024-05-03 04:26:07', '', 1),
(8, 'GLAMPING RAFLESIA', 500000, '18.0', 'AC', 'Baca Kebijakan Pembatalan', 'glamping_raf.png', 4, '2024-05-03 04:31:59', '12', '2024-05-03 04:31:59', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel_detail`
--

CREATE TABLE `tbl_hotel_detail` (
  `id_hotel_detail` int(12) NOT NULL,
  `id_hotel` int(12) NOT NULL,
  `hotel_detail` varchar(120) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(50) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hotel_detail`
--

INSERT INTO `tbl_hotel_detail` (`id_hotel_detail`, `id_hotel`, `hotel_detail`, `create_date`, `create_by`, `update_date`, `update_by`, `status`) VALUES
(1, 1, 'Breakfast(2 Pax)', '2024-05-02 20:40:52', '12', '2024-05-02 20:40:52', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel_manage`
--

CREATE TABLE `tbl_hotel_manage` (
  `id_hotel_manage` int(12) NOT NULL,
  `id_hotel` int(12) NOT NULL,
  `room_avail` int(12) NOT NULL,
  `people` int(12) NOT NULL,
  `jumlah_bed` int(12) NOT NULL,
  `type_bed` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(12) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hotel_manage`
--

INSERT INTO `tbl_hotel_manage` (`id_hotel_manage`, `id_hotel`, `room_avail`, `people`, `jumlah_bed`, `type_bed`, `create_date`, `create_by`, `update_date`, `update_by`, `status`) VALUES
(1, 1, 6, 2, 1, 'King Bed', '2024-05-02 21:06:52', '12', '2024-05-02 21:06:52', '', 1),
(2, 5, 2, 2, 1, 'King Bad', '2024-05-03 04:07:17', '12', '2024-05-03 04:07:17', '', 1),
(3, 6, 9, 2, 1, 'King Bed', '2024-05-03 04:18:18', '12', '2024-05-03 04:18:18', '', 1),
(4, 7, 12, 2, 2, 'Normal Bed', '2024-05-03 04:27:15', '12', '2024-05-03 04:27:15', '', 1),
(5, 8, 3, 2, 1, 'Twin Bed', '2024-05-03 04:33:04', '12', '2024-05-03 04:33:04', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel_type`
--

CREATE TABLE `tbl_hotel_type` (
  `Id_hotel_type` int(12) NOT NULL,
  `hotel_type` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(12) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hotel_type`
--

INSERT INTO `tbl_hotel_type` (`Id_hotel_type`, `hotel_type`, `create_date`, `create_by`, `update_date`, `update_by`, `status`) VALUES
(1, 'VILLA', '2024-05-02 21:49:07', '12', '2024-05-02 21:49:07', '', 1),
(2, 'COTTAGE', '2024-05-02 21:49:42', '12', '2024-05-02 21:49:42', '', 1),
(3, 'HOMESTAY', '2024-05-02 21:50:00', '12', '2024-05-02 21:50:00', '', 1),
(4, 'GLAMPING', '2024-05-02 21:50:21', '12', '2024-05-02 21:50:21', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(12) NOT NULL,
  `type` varchar(250) NOT NULL,
  `order_type` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image_order` text NOT NULL,
  `bank_code` int(20) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `create_by` varchar(12) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `type`, `order_type`, `start_date`, `end_date`, `image_order`, `bank_code`, `orderId`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(20, 'Paket', '1', '0000-00-00', '2024-05-25', 'GojekDatabase.PNG', 976213123, 'NjIzcj0hO20240524191337', '22', '2024-05-24 19:13:37', '', '0000-00-00 00:00:00', 6),
(21, 'Paket', '1', '0000-00-00', '2024-06-06', 'IMG-20230225-WA0002.jpg', 976213123, 'CUAU2Ebqz20240601173411', '22', '2024-06-01 17:34:12', '', '0000-00-00 00:00:00', 6),
(22, 'Hotel', '1', '2024-06-01', '2024-06-04', 'IMG-20230225-WA0002.jpg', 976213123, 'ewRAtNsF020240601182732', '13', '2024-06-01 18:27:32', '', '0000-00-00 00:00:00', 4),
(23, 'Paket', '1', '0000-00-00', '2024-06-03', 'save1.png', 976213123, 'ecJ2iC4qb20240602142323', '22', '2024-06-02 14:23:23', '', '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int(12) NOT NULL,
  `id_order` int(12) NOT NULL,
  `id_hotel` int(12) NOT NULL,
  `id_package_mas` int(12) NOT NULL,
  `order_price` int(12) NOT NULL,
  `total_price` int(12) NOT NULL,
  `order_number` int(12) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(250) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id_order_detail`, `id_order`, `id_hotel`, `id_package_mas`, `order_price`, `total_price`, `order_number`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(51, 20, 0, 1, 30000, 30000, 1, '22', '2024-05-24 19:13:40', '', '2024-05-24 19:13:40', 1),
(52, 20, 0, 5, 25000, 25000, 1, '22', '2024-05-24 19:13:52', '', '2024-05-24 19:13:52', 1),
(53, 21, 0, 1, 30000, 30000, 1, '22', '2024-06-01 17:34:15', '', '2024-06-01 17:34:15', 1),
(54, 22, 1, 0, 1200000, 1200000, 1, '13', '2024-06-01 18:27:33', '', '2024-06-01 18:27:33', 1),
(55, 23, 0, 1, 30000, 30000, 1, '22', '2024-06-02 14:23:25', '', '2024-06-02 14:23:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_package`
--

CREATE TABLE `tbl_package` (
  `Id_package` int(20) NOT NULL,
  `package_name` varchar(250) NOT NULL,
  `create_by` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_package`
--

INSERT INTO `tbl_package` (`Id_package`, `package_name`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 'Tiket Masuk', '14', '2024-03-27 10:20:58', '', '2024-03-27 10:20:58', 1),
(2, 'Ruang Meeting & Hiburan', '12', '2024-05-03 10:45:20', '', '2024-05-03 10:45:20', 1),
(3, 'Paket Meeting', '12', '2024-05-03 15:10:04', '', '2024-05-03 15:10:04', 1),
(4, 'Tambahan Makanan/Meal', '12', '2024-05-03 15:10:34', '', '2024-05-03 15:10:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_package_detail`
--

CREATE TABLE `tbl_package_detail` (
  `id_package_detail` int(20) NOT NULL,
  `id_package_master` int(20) NOT NULL,
  `name_detail_pack` varchar(250) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_package_detail`
--

INSERT INTO `tbl_package_detail` (`id_package_detail`, `id_package_master`, `name_detail_pack`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 1, 'Waterpark', '14', '2024-03-27 10:24:47', '', '2024-03-27 10:24:47', 1),
(8, 1, 'FlayingFox', '12', '2024-05-03 11:20:11', '', '2024-05-03 11:20:11', 1),
(9, 1, 'Panahan', '12', '2024-05-03 11:20:49', '', '2024-05-03 11:20:49', 1),
(10, 1, 'Free Parking', '12', '2024-05-03 11:21:10', '', '2024-05-03 11:21:10', 1),
(11, 2, 'Seluruh Wahana', '12', '2024-05-03 11:21:50', '', '2024-05-03 11:21:50', 1),
(12, 2, 'Free Parking', '12', '2024-05-03 11:22:15', '', '2024-05-03 11:22:15', 1),
(13, 3, 'Kapasitas Max 50 - 100 Orang', '12', '2024-05-03 15:07:22', '', '2024-05-03 15:07:22', 1),
(14, 4, 'Kapasitas Max 25 Orang', '12', '2024-05-03 15:07:22', '', '2024-05-03 15:07:22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_package_master`
--

CREATE TABLE `tbl_package_master` (
  `Id_package_master` int(20) NOT NULL,
  `id_package` int(50) NOT NULL,
  `master_package_name` varchar(250) NOT NULL,
  `package_price` int(250) NOT NULL,
  `id_type_package` varchar(250) NOT NULL,
  `type_status` tinyint(1) NOT NULL,
  `package_image` varchar(250) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_package_master`
--

INSERT INTO `tbl_package_master` (`Id_package_master`, `id_package`, `master_package_name`, `package_price`, `id_type_package`, `type_status`, `package_image`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 1, 'Tiket Biasa', 30000, '1', 0, 'tiket_1.png', 'System', '2024-03-27 10:22:06', '', '2024-03-27 10:22:06', 1),
(2, 1, 'Tiket Terusan', 50000, '1', 0, 'water_park.png', 'System', '2024-04-24 10:53:09', '', '2024-04-24 10:53:09', 1),
(3, 2, 'Meeting Room 1', 2000000, '0', 0, 'meeting_1.png', '12', '2024-05-03 15:05:08', '', '2024-05-03 15:05:08', 1),
(4, 2, 'Meeting Room 2', 500000, '0', 0, 'meeting_2.png', '12', '2024-05-03 15:05:08', '', '2024-05-03 15:05:08', 1),
(5, 4, 'Nasi Box (1 Protein)', 25000, '0', 0, 'nasi_box1.png', '12', '2024-05-03 15:13:07', '', '2024-05-03 15:13:07', 1),
(6, 4, 'Nasi Box (2 Protein)', 35000, '0', 0, 'no_image.png', '12', '2024-05-03 15:13:07', '', '2024-05-03 15:13:07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_package_type`
--

CREATE TABLE `tbl_package_type` (
  `Id_type_package` int(12) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(250) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_package_type`
--

INSERT INTO `tbl_package_type` (`Id_type_package`, `type_name`, `create_date`, `create_by`, `update_date`, `update_by`, `status`) VALUES
(1, 'per trip', '2024-04-04 08:58:33', '14', '0000-00-00 00:00:00', '', 1),
(2, 'per orang', '2024-05-08 13:04:17', '14', '0000-00-00 00:00:00', '', 1),
(3, 'per tenda', '2024-05-08 13:04:35', '14', '0000-00-00 00:00:00', '', 1),
(4, 'per peieces', '2024-05-08 13:05:41', '14', '2024-05-08 13:05:41', '', 1),
(5, 'per kilogram', '2024-05-08 13:05:52', '14', '2024-05-08 13:05:52', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rate`
--

CREATE TABLE `tbl_rate` (
  `id_rate` int(12) NOT NULL,
  `comment` text NOT NULL,
  `start` int(11) NOT NULL,
  `created_by` varchar(12) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rate`
--

INSERT INTO `tbl_rate` (`id_rate`, `comment`, `start`, `created_by`, `create_date`, `status`) VALUES
(4, 'Sangat sangat bagus dan sangat fast response untuk pemesanannya', 4, '13', '2024-05-24 02:22:12', 1),
(5, 'Pelayanan bagus sekali dan cepat', 5, '22', '2024-05-24 19:14:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `id_room_type` int(12) NOT NULL,
  `room_type` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `phone` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `phone`) VALUES
(5, 'Sandhika Galih', 'sandhikagalih@unpas.ac.id', 'profile1.jpg', '$2y$10$nXnrqGQTjpvg58OtOB/N.evYQjVlz7KIW37oUSQSQ2EgNMD0Dgrzq', 1, 1, 1552120289, NULL),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263, NULL),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354, NULL),
(12, 'admin2', 'admin@gmail.com', 'teast123.png', '$2y$10$BX3s2MURD07J22g/YodhRefKb345dZsgr83mV0.XU5287P.agtEDK', 1, 1, 1707125369, NULL),
(13, 'user', 'user@gmail.com', 'save1.png', '$2y$10$INXn0FCDUQpNNIuK1kxL.On.Vl.jVIq.cHcRAOg.r9WsX.PAK//d.', 2, 1, 1707719652, '085265711546'),
(14, 'manajemen', 'manajemen@gmail.com', 'default.jpg', '$2y$10$yQsYFhHgy718PY8p.cF2LeIFQqHRXmVQAU32WcebhH.lJbMHGxRkm', 3, 1, 1711522122, '085265711544'),
(22, 'indo pop culture', 'cultureindopop@gmail.com', 'default.jpg', '$2y$10$Dka4HhyfHSQPMDeNu3meweXf5eQcJAJw7wNF70UfehOumUhCqG/vm', 2, 1, 1716551188, '085265711545'),
(23, 'admin2', 'admin1@gmail.com', 'default.jpg', '$2y$10$X.Ue/.7ktTp8lmoay/3LmeeSeWx/3jdBcfOWNVXXqLKo7pltW5uCy', 2, 0, 1717237859, '085265711542');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(10, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `id_sidebar` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `id_sidebar`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 'ADM', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 'USR', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 'EPR', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 'MNG', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 'SNG', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 'ROL', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 'CPS', 1),
(9, 4, 'Package Management', 'management', 'fas fa-fw fa-cube', 'RMG', 1),
(10, 4, 'Type Management', 'management/type_package', 'fas fa-fw fa-list', 'TYP', 1),
(11, 4, 'Hotel Management', 'management/hotel', 'fas fa-fw fa-hotel', 'HTL', 1),
(12, 4, 'Hotel Type', 'management/type_hotel', 'fas fa-fw fa-building', 'HTY', 1),
(13, 4, 'Room Type', 'management/room_type', 'fas fa-fw fa-home', 'RTP', 1),
(14, 4, 'Bank', 'management/bank', 'fas fa-fw fa-donate', 'BNK', 1),
(15, 1, 'User management', 'admin/user_management', 'fas fa-fw fa-users', 'UMG', 1),
(16, 4, 'Approval Payment', 'management/approval', 'fas fa-fw fa-check-circle', 'APY', 1),
(17, 4, 'Reporting', 'management/reporting', 'fas fa-fw fa-book', 'RPT', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'admin1@gmail.com', 'QRSTUVWXYZabcdefghijklmnopqrst', 1717237859);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_fav`
--
ALTER TABLE `tbl_fav`
  ADD PRIMARY KEY (`id_fav`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`Id_hotel`);

--
-- Indexes for table `tbl_hotel_detail`
--
ALTER TABLE `tbl_hotel_detail`
  ADD PRIMARY KEY (`id_hotel_detail`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `tbl_hotel_manage`
--
ALTER TABLE `tbl_hotel_manage`
  ADD PRIMARY KEY (`id_hotel_manage`);

--
-- Indexes for table `tbl_hotel_type`
--
ALTER TABLE `tbl_hotel_type`
  ADD PRIMARY KEY (`Id_hotel_type`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`Id_package`);

--
-- Indexes for table `tbl_package_detail`
--
ALTER TABLE `tbl_package_detail`
  ADD PRIMARY KEY (`id_package_detail`);

--
-- Indexes for table `tbl_package_master`
--
ALTER TABLE `tbl_package_master`
  ADD PRIMARY KEY (`Id_package_master`);

--
-- Indexes for table `tbl_package_type`
--
ALTER TABLE `tbl_package_type`
  ADD PRIMARY KEY (`Id_type_package`);

--
-- Indexes for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  ADD PRIMARY KEY (`id_rate`);

--
-- Indexes for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  ADD PRIMARY KEY (`id_room_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fav`
--
ALTER TABLE `tbl_fav`
  MODIFY `id_fav` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `Id_hotel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_hotel_detail`
--
ALTER TABLE `tbl_hotel_detail`
  MODIFY `id_hotel_detail` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_hotel_manage`
--
ALTER TABLE `tbl_hotel_manage`
  MODIFY `id_hotel_manage` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_hotel_type`
--
ALTER TABLE `tbl_hotel_type`
  MODIFY `Id_hotel_type` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id_order_detail` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `Id_package` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_package_detail`
--
ALTER TABLE `tbl_package_detail`
  MODIFY `id_package_detail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_package_master`
--
ALTER TABLE `tbl_package_master`
  MODIFY `Id_package_master` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_package_type`
--
ALTER TABLE `tbl_package_type`
  MODIFY `Id_type_package` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  MODIFY `id_rate` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  MODIFY `id_room_type` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
