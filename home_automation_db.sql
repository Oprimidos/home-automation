-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Tem 2023, 14:26:15
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
(1, 'Mustafa\'s Home', './assets/images/home/house.jpg'),
(2, 'Mazlum\'s Home', './assets/images/home/house.jpg');

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
  `regHomeName` varchar(255) NOT NULL,
  `regHomePhoto` varchar(255) NOT NULL,
  `regHomeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `register`
--

INSERT INTO `register` (`regID`, `regFirstName`, `regLastName`, `regMail`, `regPassword`, `regType`, `regHomeName`, `regHomePhoto`, `regHomeID`) VALUES
(1, 'a', 'a', 'a', 'aaa', 'Consumer', '../assets/images//3.jpg', 'a', 3),
(2, 'a', 'a', 'a', 'aaa', 'Consumer', '../assets/images/3.jpg', 'a', 3),
(3, '1', '1', '1', 'fcsdaffsf', 'Producer', '', '', 3),
(4, '1', '1', '1', 'ssss', 'Producer', '', '', 11),
(5, 'aa', 'a2', 'a@gamil.com', 'aa', 'Producer', '', '', 2),
(6, 'aa', 'a2', 'a@gamil.com', 'aa', 'Producer', '', '', 2),
(7, '<', '<', 'a@gamil.com', 'aaa', 'Producer', '', '', 11),
(8, 's', 's', 'a@gamil.com', 'sasa', 'Producer', '', '', 12),
(9, 's', 's', 'a@gamil.com', 'www', 'Producer', '', '', 12),
(1001, 'Mustafa', 'Esen', 'mesen@gmail.com', '1234567', 'Consumer', '', '', 1),
(1002, 'Mazlum', 'Arcanlı', 'mazlum@gmail.com', '46756416546', 'Consumer', '', '', 1);

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
(0, 'Bathroom', './assets/images/room/bathroom.jpg', 1),
(1, 'Living', './assets/images/room/living.jpg', 1),
(2, 'Kitchen', './assets/images/room/kitchen.jpg', 1),
(3, 'Children Room', './assets/images/room/children.jpg', 1),
(4, 'Bedroom', './assets/images/room/bedroom.jpg', 1);

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
(1, 'Temperature', 25, '2023-06-23 11:41:55', 0, 0, 1),
(2, 'Temperature', 41, '2023-06-23 11:41:59', 0, 0, 2),
(3, 'Temperature', 41, '2023-06-23 11:42:03', 0, 0, 3),
(4, 'Temperature', 29, '2023-06-23 11:42:06', 0, 0, 4),
(5, 'Air Condition', 14, '2023-07-04 11:56:23', 0, 103.96, 1),
(6, 'Air Condition', 40, '2023-07-02 20:38:43', 594.2, 118.84, 2),
(7, 'Air Condition', 40, '2023-07-02 20:38:43', 591.8, 118.36, 3),
(8, 'Air Condition', 28, '2023-07-02 20:38:43', 596.2, 119.24, 4),
(9, 'Light', 0, '2023-07-05 07:25:54', 5.4, 1.08, 1),
(10, 'Light', 0, '2023-06-23 11:43:01', 48, 9.6, 2),
(11, 'Light', 0, '2023-06-23 11:43:04', 298, 59.6, 3),
(12, 'Light', 0, '2023-06-23 11:43:08', 310.3, 62.06, 4),
(13, 'Humidity', 68, '2023-06-23 11:43:12', 148.6, 29.72, 1),
(14, 'Humidity', 50, '2023-06-23 11:43:26', 147.85, 29.57, 2),
(15, 'Humidity', 76, '2023-06-23 11:43:30', 147.5, 29.5, 3),
(16, 'Humidity', 45, '2023-06-23 11:43:34', 155.2, 31.04, 4),
(29, 'Temperature', 25, '2023-06-23 11:44:08', 0, 0, 0),
(30, 'Air Condition', 25, '2023-07-02 20:38:43', 0.4, 0.08, 1),
(33, 'Air Condition', 0, '2023-07-06 12:13:37', 0, 0, 0);

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
(1, 'Mustafa ', 'ESEN', 'admin@gmail.com', '12345', 'Producer', 1),
(2, 'Mazlum', 'ARCANLI', 'admin@gmail.com', '12345', 'Consumer', 1),
(5, '1', '1', '1', '1', '1', 1);

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
  MODIFY `regID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Tablo için AUTO_INCREMENT değeri `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sensorID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
