-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2023, 20:23:55
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
-- Tablo için tablo yapısı `aircondition`
--

CREATE TABLE `aircondition` (
  `airID` int(2) NOT NULL,
  `airValue` int(3) DEFAULT NULL,
  `airRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `aircondition`
--

INSERT INTO `aircondition` (`airID`, `airValue`, `airRoomID`) VALUES
(1, 27, 1),
(2, 0, 2),
(3, 0, 3),
(4, 26, 4);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `airview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `airview` (
`airID` int(2)
,`airValue` int(3)
,`roomName` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `heat`
--

CREATE TABLE `heat` (
  `heatID` int(2) NOT NULL,
  `heatValue` int(3) DEFAULT NULL,
  `heatRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `heat`
--

INSERT INTO `heat` (`heatID`, `heatValue`, `heatRoomID`) VALUES
(1, 25, 1),
(2, 27, 2),
(3, 26, 3),
(4, 25, 4);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `heatview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `heatview` (
`heatID` int(2)
,`heatValue` int(3)
,`roomName` varchar(255)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `home`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `home` (
`roomID` int(2)
,`roomName` varchar(255)
,`airID` int(2)
,`airValue` int(3)
,`lightID` int(2)
,`lightValue` varchar(10)
,`heatID` int(2)
,`heatValue` int(3)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `light`
--

CREATE TABLE `light` (
  `lightID` int(2) NOT NULL,
  `lightValue` varchar(10) DEFAULT NULL,
  `lightRoomID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `light`
--

INSERT INTO `light` (`lightID`, `lightValue`, `lightRoomID`) VALUES
(1, 'ON', 1),
(2, 'OFF', 2),
(3, 'ON', 3),
(4, 'OFF', 4);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `lightview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `lightview` (
`lightID` int(2)
,`lightValue` varchar(10)
,`roomName` varchar(255)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `myview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `myview` (
`heatID` int(2)
,`heatValue` int(3)
,`roomName` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room`
--

CREATE TABLE `room` (
  `roomID` int(2) NOT NULL,
  `roomName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `room`
--

INSERT INTO `room` (`roomID`, `roomName`) VALUES
(1, 'Living'),
(2, 'Kitchen'),
(3, 'Children Room'),
(4, 'Bedroom');

-- --------------------------------------------------------

--
-- Görünüm yapısı `airview`
--
DROP TABLE IF EXISTS `airview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `airview`  AS SELECT `a`.`airID` AS `airID`, `a`.`airValue` AS `airValue`, `r`.`roomName` AS `roomName` FROM (`aircondition` `a` join `room` `r` on(`a`.`airRoomID` = `r`.`roomID`))  ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `heatview`
--
DROP TABLE IF EXISTS `heatview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `heatview`  AS SELECT `h`.`heatID` AS `heatID`, `h`.`heatValue` AS `heatValue`, `r`.`roomName` AS `roomName` FROM (`heat` `h` join `room` `r` on(`h`.`heatRoomID` = `r`.`roomID`))  ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `home`
--
DROP TABLE IF EXISTS `home`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `home`  AS SELECT `r`.`roomID` AS `roomID`, `r`.`roomName` AS `roomName`, `a`.`airID` AS `airID`, `a`.`airValue` AS `airValue`, `l`.`lightID` AS `lightID`, `l`.`lightValue` AS `lightValue`, `h`.`heatID` AS `heatID`, `h`.`heatValue` AS `heatValue` FROM (((`room` `r` left join `aircondition` `a` on(`r`.`roomID` = `a`.`airRoomID`)) left join `light` `l` on(`r`.`roomID` = `l`.`lightRoomID`)) left join `heat` `h` on(`r`.`roomID` = `h`.`heatRoomID`))  ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `lightview`
--
DROP TABLE IF EXISTS `lightview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lightview`  AS SELECT `l`.`lightID` AS `lightID`, `l`.`lightValue` AS `lightValue`, `r`.`roomName` AS `roomName` FROM (`light` `l` join `room` `r` on(`l`.`lightRoomID` = `r`.`roomID`))  ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `myview`
--
DROP TABLE IF EXISTS `myview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `myview`  AS SELECT `t1`.`heatID` AS `heatID`, `t1`.`heatValue` AS `heatValue`, `t2`.`roomName` AS `roomName` FROM (`heat` `t1` join `room` `t2` on(`t1`.`heatRoomID` = `t2`.`roomID`))  ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aircondition`
--
ALTER TABLE `aircondition`
  ADD PRIMARY KEY (`airID`),
  ADD KEY `airRoomID` (`airRoomID`);

--
-- Tablo için indeksler `heat`
--
ALTER TABLE `heat`
  ADD PRIMARY KEY (`heatID`),
  ADD KEY `heatRoomID` (`heatRoomID`);

--
-- Tablo için indeksler `light`
--
ALTER TABLE `light`
  ADD PRIMARY KEY (`lightID`),
  ADD KEY `lightRoomID` (`lightRoomID`);

--
-- Tablo için indeksler `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `aircondition`
--
ALTER TABLE `aircondition`
  ADD CONSTRAINT `aircondition_ibfk_1` FOREIGN KEY (`airRoomID`) REFERENCES `room` (`roomID`);

--
-- Tablo kısıtlamaları `heat`
--
ALTER TABLE `heat`
  ADD CONSTRAINT `heat_ibfk_1` FOREIGN KEY (`heatRoomID`) REFERENCES `room` (`roomID`);

--
-- Tablo kısıtlamaları `light`
--
ALTER TABLE `light`
  ADD CONSTRAINT `light_ibfk_1` FOREIGN KEY (`lightRoomID`) REFERENCES `room` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
