-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Mai 2026 um 08:39
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `verwaltung`
--
CREATE DATABASE IF NOT EXISTS `verwaltung` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `verwaltung`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `Groesse` float NOT NULL,
  `Gewicht` float NOT NULL,
  `Geburtsdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `person`
--

INSERT INTO `person` (`ID`, `Name`, `Vorname`, `Groesse`, `Gewicht`, `Geburtsdatum`) VALUES
(2, 'Mustermann', 'Gisela', 1.8, 80, '2020-03-23');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
