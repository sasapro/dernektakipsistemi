-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eyl 2018, 22:50:11
-- Sunucu sürümü: 10.1.33-MariaDB
-- PHP Sürümü: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dernektakipsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_log_session`
--

CREATE TABLE `dts_log_session` (
  `uid` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_log_session`
--

INSERT INTO `dts_log_session` (`uid`, `date`, `ip_address`) VALUES
(1, '2018-08-29 10:20:24', '::1'),
(1, '2018-08-29 11:22:43', '::1'),
(1, '2018-08-30 11:32:40', '::1'),
(1, '2018-08-30 12:27:15', '::1'),
(1, '2018-08-30 12:28:47', '::1'),
(1, '2018-08-30 12:30:48', '::1'),
(1, '2018-09-05 20:00:43', '::1'),
(1, '2018-09-08 15:44:09', '::1'),
(1, '2018-09-08 22:35:24', '::1'),
(1, '2018-09-16 17:55:46', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_log_session_error`
--

CREATE TABLE `dts_log_session_error` (
  `username` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `password` text COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_log_session_error`
--

INSERT INTO `dts_log_session_error` (`username`, `password`, `date`, `ip_address`) VALUES
('aaa', '', '2018-08-29 11:26:34', '::1'),
('aaa', '111', '2018-08-29 11:28:23', '::1'),
('lecordonbleupr', 'duygu@LCB', '2018-08-30 11:32:32', '::1'),
('lecordonbleupr', 'duygu@LCB', '2018-08-30 12:28:39', '::1'),
('lecordonbleupr', 'duygu@LCB', '2018-09-05 20:00:35', '::1'),
('lecordonbleupr', 'duygu@LCB', '2018-09-08 15:44:01', '::1'),
('lecordonbleupr', 'duygu@LCB', '2018-09-16 17:55:40', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_person`
--

CREATE TABLE `dts_person` (
  `pid` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `birthdate` date NOT NULL,
  `association_number` int(20) NOT NULL,
  `nationality` varchar(2) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `passport_number` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `job` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `education` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `uid` int(30) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_person`
--

INSERT INTO `dts_person` (`pid`, `name`, `surname`, `birthdate`, `association_number`, `nationality`, `tc`, `passport_number`, `job`, `education`, `uid`, `insert_date`) VALUES
(1, 'Samed', 'SARIAYDIN', '1988-09-19', 1, 'TC', '345345345', '34535', '', '', 1, '2018-09-08 00:00:00'),
(2, '', '', '0000-00-00', 0, '', '0', '0', '', '', 0, '0000-00-00 00:00:00'),
(3, 'Deneme', 'Deneme', '2014-10-21', 444, 'TC', '0', '3333', '', '', 0, '0000-00-00 00:00:00'),
(4, 'DENEME', 'deneme', '1991-11-11', 44444, 'TC', '', '44444', 'memur', '', 0, '2018-09-16 18:34:59'),
(5, 'DENEME', 'deneme', '1991-11-11', 44444, 'TC', '', '44444', 'memur', '', 0, '2018-09-16 18:35:22'),
(6, 'DENEME', 'deneme', '1991-11-11', 44444, 'TC', '', '44444', 'memur', '', 0, '2018-09-16 18:36:44'),
(7, 'deneme2', 'deneme2', '1991-11-11', 44444, 'TC', '', '444', 'memur', '', 0, '2018-09-16 18:40:49'),
(8, 'deneme2', 'deneme2', '1991-11-11', 44444, 'TC', '', '444', 'memur', '', 0, '2018-09-16 18:41:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_person_address`
--

CREATE TABLE `dts_person_address` (
  `id` int(30) NOT NULL,
  `pid` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `address` text COLLATE utf8_turkish_ci NOT NULL,
  `uid` int(30) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_person_address`
--

INSERT INTO `dts_person_address` (`id`, `pid`, `name`, `address`, `uid`, `insert_date`) VALUES
(1, 4, '', '', 0, '2018-09-16 18:34:59'),
(2, 5, '', '', 0, '2018-09-16 18:35:22'),
(3, 6, '', '', 0, '2018-09-16 18:36:44'),
(4, 7, '', '5555555555', 0, '2018-09-16 18:40:49'),
(5, 8, '', 'deneme adres bu', 0, '2018-09-16 18:41:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_person_measures`
--

CREATE TABLE `dts_person_measures` (
  `id` int(30) NOT NULL,
  `pid` int(30) NOT NULL,
  `shoe_size` varchar(2) COLLATE utf8_turkish_ci NOT NULL,
  `body_size` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `height` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `weight` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `uid` int(30) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_person_measures`
--

INSERT INTO `dts_person_measures` (`id`, `pid`, `shoe_size`, `body_size`, `height`, `weight`, `uid`, `insert_date`) VALUES
(1, 7, 'de', '43', '36', '123', 0, '2018-09-16 18:40:49'),
(2, 8, '43', '36', '123', '34', 0, '2018-09-16 18:41:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_person_phone`
--

CREATE TABLE `dts_person_phone` (
  `id` int(30) NOT NULL,
  `pid` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `uid` int(30) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_person_phone`
--

INSERT INTO `dts_person_phone` (`id`, `pid`, `name`, `phone`, `uid`, `insert_date`) VALUES
(1, 4, '', '', 0, '2018-09-16 18:34:59'),
(2, 5, '', '', 0, '2018-09-16 18:35:22'),
(3, 6, '', '', 0, '2018-09-16 18:36:44'),
(4, 7, '', '', 0, '2018-09-16 18:40:49'),
(5, 8, '', '5555555555', 0, '2018-09-16 18:41:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dts_user`
--

CREATE TABLE `dts_user` (
  `uid` int(10) NOT NULL,
  `username` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` text COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dts_user`
--

INSERT INTO `dts_user` (`uid`, `username`, `mail`, `password`, `name`, `surname`, `status`) VALUES
(1, 'admin', 'samedsariaydin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Samed', 'SARIAYDIN', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dts_person`
--
ALTER TABLE `dts_person`
  ADD PRIMARY KEY (`pid`);

--
-- Tablo için indeksler `dts_person_address`
--
ALTER TABLE `dts_person_address`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dts_person_measures`
--
ALTER TABLE `dts_person_measures`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dts_person_phone`
--
ALTER TABLE `dts_person_phone`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dts_user`
--
ALTER TABLE `dts_user`
  ADD PRIMARY KEY (`uid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dts_person`
--
ALTER TABLE `dts_person`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `dts_person_address`
--
ALTER TABLE `dts_person_address`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `dts_person_measures`
--
ALTER TABLE `dts_person_measures`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `dts_person_phone`
--
ALTER TABLE `dts_person_phone`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `dts_user`
--
ALTER TABLE `dts_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
