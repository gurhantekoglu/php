-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Tem 2020, 19:58:42
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
-- Veritabanı: `postane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alici_bilgi`
--

CREATE TABLE `alici_bilgi` (
  `alici_id` int(11) NOT NULL,
  `alici_ad` varchar(25) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `alici_soyad` varchar(25) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `alici_il` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `alici_adres` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `alici_tel` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `alici_tc` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `alici_bilgi`
--

INSERT INTO `alici_bilgi` (`alici_id`, `alici_ad`, `alici_soyad`, `alici_il`, `alici_adres`, `alici_tel`, `alici_tc`) VALUES
(5, 'Berkan', 'ÇELİK', '34', 'SANCAKTEPE', '5437654321', '200');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gonderici_bilgileri`
--

CREATE TABLE `gonderici_bilgileri` (
  `gonderici_id` int(11) NOT NULL,
  `gonderici_ad` varchar(25) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gonderici_soyad` varchar(25) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gonderici_il` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gonderici_adres` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gonderici_tel` varchar(25) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gonderici_tc` varchar(11) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `gonderici_bilgileri`
--

INSERT INTO `gonderici_bilgileri` (`gonderici_id`, `gonderici_ad`, `gonderici_soyad`, `gonderici_il`, `gonderici_adres`, `gonderici_tel`, `gonderici_tc`) VALUES
(17, 'Gürhan', 'TEKOĞLU', '28', 'MERKEZ', '5421234567', '100');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gonderi_bilgileri`
--

CREATE TABLE `gonderi_bilgileri` (
  `gonderi_id` int(11) NOT NULL,
  `gonderi_barkod` int(11) DEFAULT NULL,
  `gonderi_agirlik_kg` int(11) DEFAULT NULL,
  `gonderi_en_cm` int(11) DEFAULT NULL,
  `gonderi_boy_cm` int(11) DEFAULT NULL,
  `gonderi_tipi` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gonderi_ek_hizmet` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gonderi_bedeli` int(11) DEFAULT NULL,
  `gonderi_tarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `gonderi_bilgileri`
--

INSERT INTO `gonderi_bilgileri` (`gonderi_id`, `gonderi_barkod`, `gonderi_agirlik_kg`, `gonderi_en_cm`, `gonderi_boy_cm`, `gonderi_tipi`, `gonderi_ek_hizmet`, `gonderi_bedeli`, `gonderi_tarihi`) VALUES
(15, 123456789, 3, 25, 20, 'Evrak', 'Kontrollü Teslim', 16, '2020-07-04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_sicilNo` varchar(9) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_sicilNo`, `kullanici_sifre`) VALUES
(2, '123456789', '1234567890');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj_bilgi`
--

CREATE TABLE `mesaj_bilgi` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_metin` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesaj_bilgi`
--

INSERT INTO `mesaj_bilgi` (`mesaj_id`, `mesaj_metin`) VALUES
(23, 'Sistem gayet başarılı. Tebrikler!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sevk_bilgi`
--

CREATE TABLE `sevk_bilgi` (
  `sevk_id` int(11) NOT NULL,
  `sevk_gonderiBarkod` int(11) DEFAULT NULL,
  `sevk_il` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sevk_sube` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sevk_bilgi`
--

INSERT INTO `sevk_bilgi` (`sevk_id`, `sevk_gonderiBarkod`, `sevk_il`, `sevk_sube`) VALUES
(5, 123456789, '34', 'SANCAKTEPE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teslim_bilgi`
--

CREATE TABLE `teslim_bilgi` (
  `teslim_id` int(11) NOT NULL,
  `teslim_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_soyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_tel` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_gonderi_barkod` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_teslim_alan` varchar(15) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teslim_bilgi`
--

INSERT INTO `teslim_bilgi` (`teslim_id`, `teslim_ad`, `teslim_soyad`, `teslim_tel`, `teslim_tc`, `teslim_gonderi_barkod`, `teslim_teslim_alan`) VALUES
(2, 'Berkan', 'ÇELİK', '5437654321', '200', '123456789', 'Kendisi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alici_bilgi`
--
ALTER TABLE `alici_bilgi`
  ADD PRIMARY KEY (`alici_id`);

--
-- Tablo için indeksler `gonderici_bilgileri`
--
ALTER TABLE `gonderici_bilgileri`
  ADD PRIMARY KEY (`gonderici_id`);

--
-- Tablo için indeksler `gonderi_bilgileri`
--
ALTER TABLE `gonderi_bilgileri`
  ADD PRIMARY KEY (`gonderi_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `mesaj_bilgi`
--
ALTER TABLE `mesaj_bilgi`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `sevk_bilgi`
--
ALTER TABLE `sevk_bilgi`
  ADD PRIMARY KEY (`sevk_id`);

--
-- Tablo için indeksler `teslim_bilgi`
--
ALTER TABLE `teslim_bilgi`
  ADD PRIMARY KEY (`teslim_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alici_bilgi`
--
ALTER TABLE `alici_bilgi`
  MODIFY `alici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `gonderici_bilgileri`
--
ALTER TABLE `gonderici_bilgileri`
  MODIFY `gonderici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `gonderi_bilgileri`
--
ALTER TABLE `gonderi_bilgileri`
  MODIFY `gonderi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj_bilgi`
--
ALTER TABLE `mesaj_bilgi`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `sevk_bilgi`
--
ALTER TABLE `sevk_bilgi`
  MODIFY `sevk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `teslim_bilgi`
--
ALTER TABLE `teslim_bilgi`
  MODIFY `teslim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
