-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24 Jun 2016 pada 14.09
-- Versi Server: 5.5.44-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doaIbuProject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensorDataExt`
--

CREATE TABLE IF NOT EXISTS `sensorDataExt` (
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `gas1` float NOT NULL,
  `gas2` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sensorDataExt`
--

INSERT INTO `sensorDataExt` (`temperature`, `humidity`, `gas1`, `gas2`, `time`) VALUES
(26.2, 1, 663, 400, '2016-06-24 05:38:32'),
(26.2, 1, 664, 400, '2016-06-24 05:38:39'),
(26.2, 1, 663, 400, '2016-06-24 05:38:47'),
(26.2, 1, 663, 399, '2016-06-24 05:38:55'),
(26.2, 1, 664, 399, '2016-06-24 05:39:03'),
(26.2, 1, 663, 400, '2016-06-24 05:39:13'),
(26.2, 1, 663, 400, '2016-06-24 05:39:21'),
(26.3, 1, 663, 400, '2016-06-24 05:39:29'),
(26.2, 1, 663, 400, '2016-06-24 05:39:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
