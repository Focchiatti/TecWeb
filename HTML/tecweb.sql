-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 03, 2017 alle 21:12
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `notizie`
--

CREATE TABLE `notizie` (
  `Titolo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Data` date DEFAULT NULL,
  `Contenuto` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `SerieTv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `serietv`
--

CREATE TABLE `serietv` (
  `Titolo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Genere` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date DEFAULT NULL,
  `Stagioni` smallint(6) NOT NULL DEFAULT '1',
  `Trama` text COLLATE utf8_unicode_ci,
  `Valutazione` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `NickName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`NickName`, `Password`, `Admin`) VALUES
('admin', 'admin', 1),
('Pippo', 'pippo', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `Titoloserie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Voto` smallint(6) DEFAULT NULL,
  `NickName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `notizie`
--
ALTER TABLE `notizie`
  ADD PRIMARY KEY (`Titolo`),
  ADD KEY `SerieTv` (`SerieTv`);

--
-- Indici per le tabelle `serietv`
--
ALTER TABLE `serietv`
  ADD PRIMARY KEY (`Titolo`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`NickName`);

--
-- Indici per le tabelle `valutazione`
--
ALTER TABLE `valutazione`
  ADD PRIMARY KEY (`Titoloserie`,`NickName`),
  ADD KEY `NickName` (`NickName`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `notizie`
--
ALTER TABLE `notizie`
  ADD CONSTRAINT `notizie_ibfk_1` FOREIGN KEY (`SerieTv`) REFERENCES `serietv` (`Titolo`);

--
-- Limiti per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`Titoloserie`) REFERENCES `serietv` (`Titolo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valutazione_ibfk_2` FOREIGN KEY (`NickName`) REFERENCES `utente` (`NickName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
