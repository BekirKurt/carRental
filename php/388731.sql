-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Haz 2022, 13:40:00
-- Sunucu sürümü: 10.3.22-MariaDB-log
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `388731`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cars`
--

CREATE TABLE `cars` (
  `carId` int(11) NOT NULL,
  `marka` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `yakit` varchar(255) NOT NULL,
  `kalanAdet` int(11) NOT NULL,
  `gunlukfiyat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cars`
--

INSERT INTO `cars` (`carId`, `marka`, `model`, `yakit`, `kalanAdet`, `gunlukfiyat`) VALUES
(1, 'BMW', '3.18i', 'Benzin', 3, 1500),
(2, 'Dacia', 'Duster', 'Benzin', 4, 700),
(3, 'Scoda', 'Fabia', 'Benzin', 4, 600),
(4, 'Peugeot', '208', 'Dizel', 5, 750),
(5, 'Kia', 'Sportage', 'Benzin', 1, 700),
(6, 'Volkswagen', 'Polo', 'Benzin', 5, 500),
(7, 'Mercedes', 'Cla', 'Dizel', 3, 900),
(8, 'Renault', 'Clio', 'Dizel', 4, 400),
(9, 'Peugeot', '301', 'Dizel', 8, 800),
(10, 'Dacia', 'Sandero', 'Benzin', 3, 500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullaniciadi`, `sifre`, `eposta`) VALUES
(1, 'bekiribra', '123456', 'becker@gmail.com'),
(2, 'arelafavela', '123456', 'arelafavela11@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezarvasyon`
--

CREATE TABLE `rezarvasyon` (
  `rezId` int(11) NOT NULL,
  `rezMarka` varchar(255) NOT NULL,
  `rezModel` varchar(255) NOT NULL,
  `rezTeslimAlmaNoktasi` varchar(255) NOT NULL,
  `rezTeslimAlmaTarihi` date NOT NULL,
  `rezKacgun` int(11) NOT NULL,
  `rezYapan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rezarvasyon`
--

INSERT INTO `rezarvasyon` (`rezId`, `rezMarka`, `rezModel`, `rezTeslimAlmaNoktasi`, `rezTeslimAlmaTarihi`, `rezKacgun`, `rezYapan`) VALUES
(1, 'Dacia', 'Duster', 'İzmir', '2022-08-05', 3, 2),
(2, 'Peugeot', '301', 'Kahramanmaraş', '2022-08-09', 3, 1),
(3, 'Volkswagen', 'Polo', 'İzmir', '2022-09-08', 3, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carId`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezarvasyon`
--
ALTER TABLE `rezarvasyon`
  ADD PRIMARY KEY (`rezId`),
  ADD KEY `rezYapan` (`rezYapan`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cars`
--
ALTER TABLE `cars`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `rezarvasyon`
--
ALTER TABLE `rezarvasyon`
  MODIFY `rezId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
