-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Ara 2020, 15:29:02
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `itp_vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_385179`
--

CREATE TABLE `tbl_385179` (
  `id` int(11) NOT NULL,
  `tamir_kodu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seri_no` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `islem` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_385179`
--

INSERT INTO `tbl_385179` (`id`, `tamir_kodu`, `seri_no`, `model`, `islem`) VALUES
(1, '4', '123456789', 'Model A', 'Ekran değişimi'),
(2, '1', '987654321', 'Model B', 'Batarya değişimi'),
(3, '3', '385179253', 'Model C', 'Aksesuar değişimi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_385179`
--
ALTER TABLE `tbl_385179`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_385179`
--
ALTER TABLE `tbl_385179`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
