-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Haz 2023, 15:44:54
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `home_automation_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home`
--

CREATE TABLE `home` (
  `homeID` int(4) NOT NULL,
  `homeName` varchar(255) NOT NULL,
  `homePhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `home`
--

INSERT INTO `home` (`homeID`, `homeName`, `homePhoto`) VALUES
(1, 'Mustafa\'s Home', './assets/images/house.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `photos`
--

CREATE TABLE `photos` (
  `photoID` int(4) NOT NULL,
  `photoName` varchar(255) NOT NULL,
  `photoUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `photos`
--

INSERT INTO `photos` (`photoID`, `photoName`, `photoUrl`) VALUES
(1, 'Living Room', './assets/images/living.jpg'),
(2, 'Bathroom', './assets/images/bathroom.jpg'),
(3, 'Bedroom', './assets/images/bedroom.jpg'),
(4, 'Children Room', './assets/images/children.jpg'),
(5, 'Kitchen', './assets/images/kitchen.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `register`
--

CREATE TABLE `register` (
  `regID` int(5) NOT NULL,
  `regFirstName` varchar(255) NOT NULL,
  `regLastName` varchar(255) NOT NULL,
  `regMail` varchar(255) NOT NULL,
  `regPassword` varchar(255) NOT NULL,
  `regType` varchar(20) NOT NULL,
  `regHomeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room`
--

CREATE TABLE `room` (
  `roomID` int(2) NOT NULL,
  `roomName` varchar(255) DEFAULT NULL,
  `roomPhoto` varchar(255) NOT NULL,
  `homeID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `room`
--

INSERT INTO `room` (`roomID`, `roomName`, `roomPhoto`, `homeID`) VALUES
(0, 'Bathroom', './assets/images/bathroom.jpg', 1),
(1, 'Living', './assets/images/living.jpg', 1),
(2, 'Kitchen', './assets/images/kitchen.jpg', 1),
(3, 'Children Room', './assets/images/children.jpg', 1),
(4, 'Bedroom', './assets/images/bedroom.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sensor`
--

CREATE TABLE `sensor` (
  `sensorID` int(5) NOT NULL,
  `sensorType` varchar(255) NOT NULL,
  `sensorValue` int(5) NOT NULL,
  `sensorTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sensorKwh` float NOT NULL,
  `sensorMoney` float NOT NULL,
  `sensorRoomID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sensor`
--

INSERT INTO `sensor` (`sensorID`, `sensorType`, `sensorValue`, `sensorTime`, `sensorKwh`, `sensorMoney`, `sensorRoomID`) VALUES
(1, 'heat', 25, '2023-06-17 15:44:58', 0, 0, 1),
(2, 'heat', 41, '2023-06-17 15:44:58', 0, 0, 2),
(3, 'heat', 41, '2023-06-17 15:44:58', 0, 0, 3),
(4, 'heat', 29, '2023-06-17 15:44:58', 0, 0, 4),
(5, 'air condition', 25, '2023-06-20 10:15:46', 519.6, 103.92, 1),
(6, 'air condition', 40, '2023-06-20 10:15:49', 593.8, 118.76, 2),
(7, 'air condition', 40, '2023-06-20 10:15:54', 591.4, 118.28, 3),
(8, 'air condition', 28, '2023-06-20 10:15:57', 595.8, 119.16, 4),
(9, 'light', 0, '2023-06-20 10:16:00', 5.3, 1.06, 1),
(10, 'light', 0, '2023-06-20 10:16:03', 48, 9.6, 2),
(11, 'light', 0, '2023-06-20 10:16:07', 298, 59.6, 3),
(12, 'light', 0, '2023-06-20 10:16:10', 310.3, 62.06, 4),
(13, 'humidity', 68, '2023-06-20 10:16:14', 148.6, 29.72, 1),
(14, 'humidity', 50, '2023-06-20 10:16:18', 147.85, 29.57, 2),
(15, 'humidity', 76, '2023-06-20 10:16:22', 147.5, 29.5, 3),
(16, 'humidity', 45, '2023-06-20 10:16:27', 155.2, 31.04, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userMail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `userHomeID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `userFirstName`, `userLastName`, `userMail`, `userPassword`, `userType`, `userHomeID`) VALUES
(1, 'Mustafa ', 'ESEN', 'admin', '12345', 'Producer', 1),
(2, 'Mazlum', 'ARCANLI', 'admin', '12345', 'Consumer', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`homeID`);

--
-- Tablo için indeksler `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoID`);

--
-- Tablo için indeksler `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regID`);

--
-- Tablo için indeksler `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `homeID` (`homeID`);

--
-- Tablo için indeksler `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sensorID`),
  ADD KEY `sensorRoomID` (`sensorRoomID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `homeID` (`userHomeID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `photos`
--
ALTER TABLE `photos`
  MODIFY `photoID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `register`
--
ALTER TABLE `register`
  MODIFY `regID` int(5) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sensorID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`homeID`) REFERENCES `home` (`homeID`);

--
-- Tablo kısıtlamaları `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`sensorRoomID`) REFERENCES `room` (`roomID`);

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userHomeID`) REFERENCES `home` (`homeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
