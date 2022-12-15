SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_accounts`
--

CREATE TABLE `xucp_police_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT 'N/A',
  `charname` varchar(64) NOT NULL,  
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_faction_rank` int(11) NOT NULL DEFAULT 0,
  `language` varchar(50) DEFAULT 'en',
  `user_avatar` varchar(256) DEFAULT '/themes/default/assets/images/logo-bg.png',
  `user_sig` varchar(256) DEFAULT 'No signature available!',
  `user_hp` varchar(64) DEFAULT NULL,
  `user_dctag` varchar(32) NOT NULL DEFAULT 'no dctag'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_act`
--

CREATE TABLE `xucp_police_act` (
  `id` int(11) NOT NULL,
  `act_file_number` varchar(64) NOT NULL,
  `person_job` varchar(32) NOT NULL,
  `act_msg` varchar(2048) NOT NULL,
  `person_name` varchar(128) NOT NULL,
  `person_phonenumber` varchar(64) NOT NULL,
  `person_gender` varchar(128) NOT NULL,
  `person_birthday` varchar(128) NOT NULL,
  `person_size` varchar(128) NOT NULL,
  `person_eye_color` varchar(128) NOT NULL,
  `person_hair_color` varchar(128) NOT NULL,
  `person_motorcycle_license` varchar(128) NOT NULL,
  `person_car_license` varchar(128) NOT NULL,
  `person_truck_license` varchar(128) NOT NULL,
  `person_gun_license` varchar(128) NOT NULL,
  `veh_plate` varchar(32) NOT NULL,
  `veh_name` varchar(64) NOT NULL,
  `veh_all_vehicles` varchar(256) NOT NULL,
  `act_testify` varchar(512) NOT NULL,
  `act_is_finished` varchar(32) NOT NULL DEFAULT 'no',
  `act_others` varchar(2048) NOT NULL,
  `act_from_created` varchar(128) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_act`
--

INSERT INTO `xucp_police_act` (`id`, `act_file_number`, `person_job`, `act_msg`, `person_name`, `person_phonenumber`, `person_gender`, `person_birthday`, `person_size`, `person_eye_color`, `person_hair_color`, `person_motorcycle_license`, `person_car_license`, `person_truck_license`, `person_gun_license`, `veh_plate`, `veh_name`, `veh_all_vehicles`, `act_testify`, `act_is_finished`, `act_others`, `act_from_created`, `date_time`) VALUES
(1, 'LS0001', 'Rente', 'John Connor', '23323434', 'Lollipop^^', '23.01.1900', 'Blau', 'Blond', 'ja', 'Ja', 'Ja', 'Ja', 'LSh33uz7', 'Drafter', 'keine ahnung', 'Der Baum xd', 'Hat scheiße gebaut xd', 'no', 'Keine ahnung', '2m', 'Michael Connor', '2022-12-12 11:08:13'),
(2, 'Test Akte', 'Rente', 'John Connor', '23323434', 'Lollipop^^', '23.01.1900', 'Blau', 'Blond', 'ja', 'Ja', 'Ja', 'Ja', 'LSh33uz7', 'Drafter', 'keine ahnung', 'Der Baum xd', '2te test', 'no', 'Keine ahnung', '2m', 'Michael Connor', '2022-12-15 10:07:25');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_config`
--

CREATE TABLE `xucp_police_config` (
  `id` int(11) NOT NULL,
  `site_online` int(11) NOT NULL,
  `site_name` varchar(32) NOT NULL,
  `site_themes` varchar(32) NOT NULL DEFAULT 'dark',
  `site_lang` varchar(6) NOT NULL DEFAULT 'en',
  `site_upgrade_note` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_config`
--

INSERT INTO `xucp_police_config` (`id`, `site_online`, `site_name`, `site_themes`, `site_lang`, `site_upgrade_note`) VALUES
(1, 1, 'xUCP Police Center', 'dark', 'de', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_dbsync`
--

CREATE TABLE `xucp_police_dbsync` (
  `id` int(11) NOT NULL,
  `dbsync_hostname` varchar(32) NOT NULL COMMENT 'Hostname',
  `dbsync_port` varchar(32) NOT NULL COMMENT 'Port',
  `dbsync_dbname` varchar(32) NOT NULL COMMENT 'Database Name',
  `dbsync_username` varchar(32) NOT NULL COMMENT 'Username',
  `dbsync_password` varchar(32) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_dbsync`
--

INSERT INTO `xucp_police_dbsync` (`id`, `dbsync_hostname`, `dbsync_port`, `dbsync_dbname`, `dbsync_username`, `dbsync_password`) VALUES
(1, 'hostname', '3306', 'dbuser', 'dbuser', 'dbuser');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_news`
--

CREATE TABLE `xucp_police_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_news`
--

INSERT INTO `xucp_police_news` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Demopage', 'Demopage', '#Developing Status:\r\n\r\nDeveloping is done!', '#Developing Status:\r\n\r\nDeveloping is done!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_paragraph`
--

CREATE TABLE `xucp_police_paragraph` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `category` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_paragraph`
--

INSERT INTO `xucp_police_paragraph` (`id`, `title`, `description`, `category`, `created_at`) VALUES
(1, '§ 1', 'Abs.1. Die Würde des Menschen ist unantastbar. Sie zu achten und zu schützen ist Verpflichtung aller staatlichen Gewalt.', 'Grundrechte', '2022-12-14 10:51:51'),
(2, '§ 2', 'Abs.1. Jeder hat das Recht auf die freie Entfaltung seiner Persönlichkeit, soweit er nicht die Rechte anderer verletzt und nicht gegen die verfassungsmäßige Ordnung oder das Sittengesetz verstößt.\r\n\r\nAbs.2. Jeder hat das Recht auf Leben und körperliche Unversehrtheit. Die Freiheit der Person ist unverletzlich. In diese Rechte darf nur auf Grund eines Gesetzes eingegriffen werden.', '', '2022-12-14 10:54:07');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_police_wanted`
--

CREATE TABLE `xucp_police_wanted` (
  `id` int(11) NOT NULL,
  `file_number` varchar(64) NOT NULL,
  `job` varchar(32) NOT NULL,
  `msg` varchar(2048) NOT NULL,
  `person` varchar(128) NOT NULL,
  `phonenumber` varchar(64) NOT NULL,
  `is_wanted` varchar(32) NOT NULL DEFAULT 'no',
  `from_created` varchar(128) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `xucp_police_wanted`
--

INSERT INTO `xucp_police_wanted` (`id`, `file_number`, `job`, `msg`, `person`, `phonenumber`, `is_wanted`, `from_created`, `date_time`) VALUES
(1, 'LS0001', 'Rente', 'Test', 'John Connor', '2587474', 'no', 'John Connor', '2022-12-11 10:56:56'),
(2, 'LS0002', 'Rente', 'Ist ein test', 'Michael Connor', '2545858', 'yes', 'John Connor', '2022-12-11 11:44:13');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `xucp_police_accounts`
--
ALTER TABLE `xucp_police_accounts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indizes für die Tabelle `xucp_police_act`
--
ALTER TABLE `xucp_police_act`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_police_config`
--
ALTER TABLE `xucp_police_config`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_police_dbsync`
--
ALTER TABLE `xucp_police_dbsync`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_police_news`
--
ALTER TABLE `xucp_police_news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_police_paragraph`
--
ALTER TABLE `xucp_police_paragraph`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_police_wanted`
--
ALTER TABLE `xucp_police_wanted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `xucp_police_accounts`
--
ALTER TABLE `xucp_police_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_act`
--
ALTER TABLE `xucp_police_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_config`
--
ALTER TABLE `xucp_police_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_dbsync`
--
ALTER TABLE `xucp_police_dbsync`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_news`
--
ALTER TABLE `xucp_police_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_paragraph`
--
ALTER TABLE `xucp_police_paragraph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `xucp_police_wanted`
--
ALTER TABLE `xucp_police_wanted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
