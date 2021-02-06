-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Şub 2021, 18:58:59
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
-- Veritabanı: `php_final`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `385179_tbl_kullanicilar`
--

CREATE TABLE `385179_tbl_kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `fotograf` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktifMi` tinyint(1) DEFAULT 0,
  `aktivasyonKodu` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `385179_tbl_kullanicilar`
--

INSERT INTO `385179_tbl_kullanicilar` (`id`, `ad`, `soyad`, `eposta`, `sifre`, `fotograf`, `aktifMi`, `aktivasyonKodu`) VALUES
(1, 'Gürhan', 'TEKOĞLU', 'gurhan_tekoglu@hotmail.com', 'gurhan00', 'fotograflar/profilephoto.jpg', 1, '58c8ac2632a30515efbb6aed51a24aa7a7a4ed14c88a88baafe4e883a86ff565'),
(2, 'Cat', 'CAT', 'enis7740101@gmail.com', 'cat00', 'fotograflar/cat.png', 1, '717f4a1d1a4dc5e144772111b7f577cefaaf07f14a6632062cde1ebb52e2c143'),
(5, 'User', 'User2', 'gurhantekoglu@gmail.com', 'user00', 'fotograflar/1.png', 1, '8a21e388ebfc5f7c3393aaf270c266f117cea2396822c3a5ceaede94ae6208f2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `385179_tbl_ticket`
--

CREATE TABLE `385179_tbl_ticket` (
  `id` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `konu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `385179_tbl_ticket`
--

INSERT INTO `385179_tbl_ticket` (`id`, `kullaniciID`, `konu`, `mesaj`) VALUES
(1, 1, 'Hata Bildirimi', 'Hata.'),
(2, 1, 'Teşekkür', 'Teşekkürler.'),
(3, 2, 'Teşekkür', 'Teşekkür ederim.'),
(4, 2, 'Diğer', 'Diğer.'),
(5, 5, 'Hata Bildirimi', 'Hata.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `385179_tbl_urunbilgileri`
--

CREATE TABLE `385179_tbl_urunbilgileri` (
  `id` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `tamirKodu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seriNo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `385179_tbl_urunbilgileri`
--

INSERT INTO `385179_tbl_urunbilgileri` (`id`, `kullaniciID`, `tamirKodu`, `seriNo`, `model`, `aciklama`) VALUES
(1, 1, '4 - Ekran hasarı', '123456789', 'Model A', 'Ekran kırıldı.'),
(2, 1, '3 - Aksesuar hasarı', '987654321', 'Model B', 'Kulaklık bozuldu.'),
(3, 2, '1 - Batarya hasarı', '147852369', 'Model C', 'Batarya çok ısınıyor.'),
(4, 2, '2 - Kasa hasarı', '369852147', 'Model D', 'Kasa hasarı.'),
(8, 5, '3 - Aksesuar hasarı', '965238741', 'Model B', 'Aksesuar hasarı.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `385179_tbl_kullanicilar`
--
ALTER TABLE `385179_tbl_kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `385179_tbl_ticket`
--
ALTER TABLE `385179_tbl_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullaniciID` (`kullaniciID`);

--
-- Tablo için indeksler `385179_tbl_urunbilgileri`
--
ALTER TABLE `385179_tbl_urunbilgileri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullaniciID` (`kullaniciID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `385179_tbl_kullanicilar`
--
ALTER TABLE `385179_tbl_kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `385179_tbl_ticket`
--
ALTER TABLE `385179_tbl_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `385179_tbl_urunbilgileri`
--
ALTER TABLE `385179_tbl_urunbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `385179_tbl_ticket`
--
ALTER TABLE `385179_tbl_ticket`
  ADD CONSTRAINT `385179_tbl_ticket_ibfk_1` FOREIGN KEY (`kullaniciID`) REFERENCES `385179_tbl_kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `385179_tbl_urunbilgileri`
--
ALTER TABLE `385179_tbl_urunbilgileri`
  ADD CONSTRAINT `385179_tbl_urunbilgileri_ibfk_1` FOREIGN KEY (`kullaniciID`) REFERENCES `385179_tbl_kullanicilar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
