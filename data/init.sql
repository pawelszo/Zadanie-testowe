CREATE DATABASE my_db;
USE my_db

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `firmy` (
  `id` int(15) NOT NULL,
  `nazwa` text NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_modyfikacji` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `firmy` (`id`, `nazwa`, `data_dodania`, `data_modyfikacji`, `logo`) VALUES
(1, 'FIRMA TEST', '2021-01-26 23:00:00', '2021-01-26 23:00:00', 'http://test.pl'),
(2, 'FIRMA TEST', '2021-01-26 23:00:00', '2021-01-26 23:00:00', 'http://test.pl'),
(3, 'Nowa firma', '2021-01-27 11:07:34', '2021-01-27 11:07:34', 'testowelogo.png');

CREATE TABLE `pracownicy` (
  `id` int(15) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_modyfikacji` timestamp NOT NULL DEFAULT current_timestamp(),
  `firma` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pracownicy` (`id`, `imie`, `nazwisko`, `data_dodania`, `data_modyfikacji`, `firma`) VALUES
(1, 'Pawel', 'test', '2021-01-25 23:00:00', '2021-01-25 23:00:00', 0),
(2, 'Pawel', 'test', '2021-01-25 23:00:00', '2021-01-25 23:00:00', 0),
(3, 'adam3', 'adamski332', '2021-01-25 23:00:00', '2021-01-26 23:00:00', 0),
(4, 'adam', 'adam', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

ALTER TABLE `firmy`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `firmy`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `pracownicy`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
