-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Client: db455820356.db.1and1.com
-- Généré le: Ven 14 Novembre 2014 à 01:19
-- Version du serveur: 5.1.73-log
-- Version de PHP: 5.5.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db455820356`
--

-- --------------------------------------------------------

--
-- Structure de la table `Contest`
--

CREATE TABLE IF NOT EXISTS `Contest` (
  `referrerId` bigint(20) NOT NULL,
  `referredIp` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `referralType` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Contesters`
--

CREATE TABLE IF NOT EXISTS `Contesters` (
  `referrerId` bigint(20) NOT NULL,
  `referrerMail` varchar(64) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `FullKeys`
--

CREATE TABLE IF NOT EXISTS `FullKeys` (
  `keyid` int(11) NOT NULL AUTO_INCREMENT,
  `seed` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `hash` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `hashFullKey` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `playerid` int(11) DEFAULT NULL,
  `comment` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`keyid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=68 ;

--
-- Contenu de la table `FullKeys`
--

INSERT INTO `FullKeys` (`keyid`, `seed`, `hash`, `hashFullKey`, `playerid`, `comment`) VALUES
(1, '9223142655976724805', 'bc05139ba3a62947eef72bfa9a44adbd', '7b8126288e502abd6222b9ba7ab158df', 19, 'me'),
(8, '9223142653835451272', 'f3f5f4cc32aa9b319a667fc2a949bef9', 'ce9a57241a3f171c9ff733827a1c665e', NULL, 'press-lefebvre'),
(9, '9223142653768724317', 'fee1532efd63837a960a56849b78c30d', '8cdfb310dcd405f836653363b928e223', NULL, 'press-rose'),
(10, '9223142653731197144', '7fbb9e490f4f1d8b19ea33687f51c7bd', '847bddb5e7820f8a5e36b3b7a129fda0', NULL, 'press-luciu'),
(11, '9223142653681061496', '94675d7f01bb8cb04d4d4a0e13661e11', '4f3e5834cc21a4141f05b86f4c733e86', NULL, 'press-soumois'),
(12, '9223142653644976194', 'd4b826e5c5c65e5bf31a9be62039c714', '2a00726fc0951fc69e6e5e3a84580165', NULL, 'press-fawcett'),
(13, '9223136734266248240', '7ca1fc05a5a95134a7ab0571fed3dd55', '23e28114293223399e629352d76a68af', NULL, 'press-goyon'),
(14, '9223135450329987426', '87cd722cce11eafcf980cee1aba34083', '64877e358a182e37a753a2fc972836c3', NULL, 'press-jackson'),
(15, '9223135450139472542', '54c58a288165f4d9a0f5782048a416db', '5ce137bbafa9ca0d3531b35966190e8e', NULL, 'ru_RU-Akopyan Oganes'),
(16, '9223135450002996663', '800aec35d04356d0f8795d2dab74b465', '0064256bfb6d59092e60ca239c7a0f53', NULL, 'Harley-narbonnet'),
(17, '9223135449969082382', '887f9a92b73bf593c2317e95bc762a97', '92119509e0a3409f5cfd2a9bca76f3d1', NULL, 'Harley-richaud'),
(18, '9223135449923650877', '22685261d6fdc2cb381908645b303411', '5f604a114f87c09bd29b9dabe377e0d7', NULL, 'press-gonsok'),
(19, '9223135449900914302', '729675bc285419cc8191fe3839b8cabe', 'b3191b69661883f40e9b028895161a67', NULL, 'ru_RU-Platon'),
(20, '9223124684244067925', '0199f9f9203f4fb3e5d0f27d9b1c7b2f', '91d1b95506bc33b165c1be81f19c6104', NULL, 'ru_RU-pardo'),
(21, '9223124684097331363', 'e18252cce603a782f419ca9b8d174bb6', '1512f492ade006d27fee04ac3bbbdc06', NULL, 'elianegiannecchini@hotmail.com'),
(22, '9223098185390962583', '532e1c7245331666666d9286d8edf59a', '811d2abe7cc9e85eccfc9a7720ff66a6', NULL, 'pyroudy@gmail.com'),
(23, '9223098183671144649', 'cc8156a69a19ec0ca2e2badfebf4d280', '742bb4d8b49cd88f780f4351fb168536', NULL, 'jagged_jimmy_j@hotmail.com'),
(24, '9223098170710682902', '307a108eb8bbcbfe2919434f9f6d7b07', 'ff885d520dddb974a057c724a29cb8f8', NULL, 'indiegogo@cauwelier.net'),
(25, '9223098170676218582', 'e4ac4f4501303826ee1e98614ba0ced5', '1f1bf25bf611e0a9986328b1ceca21aa', NULL, 'lucie.combrisson@gmail.com'),
(26, '9223098170664520417', 'ea87e0a35837030b2c05443bb10f38f1', '37355e51f91397a080abe100259f5cef', NULL, 'gislenegiannecchini@hotmail.com'),
(27, '9223098170401113071', 'cd2f9885c1200bea021cf69c979e015e', '2bfbb4422a5f8755a9967181fd9db841', NULL, 'manukineko@gmail.com'),
(28, '9223098170388624267', 'a0e9a525bdfd264d22d9a495bf7ce6c3', 'cde76be680ae9006716a06d736153568', NULL, 'prunette73@hotmail.fr'),
(29, '9223098170378857347', '392c18319ab0688cab2524a763584a1c', 'db2695fdf6d6efc59c7afd9b8bdd2e1e', NULL, 'fpedro@polmstudio.com'),
(30, '9223098170369094935', 'feefe4dbdaecffe83aed5a249c2a8373', 'ca532fd31f3891b2bf2645d5d6c24133', NULL, 'eltricos@gmail.com'),
(31, '9223098170359798469', '32cdb6547b0c78ef151ef91d9ef26af6', 'e99e0d2c7da3beb337f5287ce3493239', NULL, 'dgfchaves@gmail.com'),
(32, '9223098170350601416', '644531c1126591b4ba82f22d3403bb00', '3e45d6c17830772e59d154c967f9449c', NULL, 'formoa@yahoo.fr'),
(33, '9223098170341905237', 'bae1f3c174d50ed18eccb2cde5cabf81', '9c136bfc7c9cb67be0474e0f0c5f013c', NULL, 'benoit.ren@orange.fr'),
(34, '9223098170333489620', '74b1b5eba7eb046e5e961365fe93ec2f', '57b8cc0f9ef4a618a18b87ff96011784', NULL, 'yoyoshiloh@hotmail.fr'),
(35, '9223098170325243748', '21d2a96450c3bce9ebd76d05787e07a4', '6da32eaefca2aad2b27c147299ec21d2', NULL, 'bzibzi@yahoo.fr'),
(36, '9223098170316447120', 'ffd42c162d8e2d1c099d664e4b117348', 'b4c605f792b41ef9304d7d3eddc1a45c', NULL, 'delphinegarcin@hotmail.com'),
(37, '9223098170216706715', 'f5b94c4343844335a6add3cb24ef5db6', '39fa0ced82443556bdf35c6968fa90f7', NULL, 'hilde_rousselot@yahoo.fr'),
(38, '9223098170206699082', '1adb05c0eddda8eea2d75a9483940d45', '3ccc404132da942343f719e58e964615', NULL, 'bengrunler@gmail.com'),
(39, '9223098170197012548', 'd878818c1d85323a48b1619702d0b52b', '5c6de830e6fbc427e94b9992997627d6', NULL, 'jeanne-marie.levy@orange.fr'),
(40, '9223098170188686606', '8daccb3e7e00169c9a873546c2885ea7', '4ff9991f133365646e0986a12a9a07a1', NULL, 'garcin.elise@yahoo.fr'),
(41, '9223098170180290678', '554ff6468438182a11f02c2938e83de1', '56e0bd61b59d8f88c11e35bbfacba9cb', NULL, 'gil.rabier@gmail.com'),
(42, '9223098170172445082', 'be12c2631cc9533623e33cd6b8543e79', 'ab6e78736a3192ffa4b6178f3e004fec', NULL, 'patrick.capella@laposte.net'),
(43, '9223098170164039117', '66fe1d641263f0e1d58ba06b036d6814', 'b4647c00012d91c3fbed56c711d0be42', NULL, 'levy.manu@free.fr'),
(44, '9223098170156473383', '47f2aa1907236a1ef5ddc16a5fda9f9d', '83ca3dd845ebed2cc5bd8df0f814ffc4', NULL, 'myriam.sorro@aliceadsl.fr'),
(45, '9223098170147657049', 'a99e4fea48efd888bb10db8d6eb58c10', '4fb89415bf9cc7576830e12d6a2598e0', NULL, 'remi.choisnet@gmail.com'),
(46, '9223098170140201795', '9b0ddbd291fbf0e60b6eadfc2cba6856', '8e14a496e7ccda904b922949d3c9fdcd', NULL, 'elia.france@orange.fr'),
(47, '9223098170132556880', '9f888f09a447bc18137931159235e906', '1105a5ae4f48651878dbaff759b0aac8', NULL, 'jametyvesmonique@gmail.com'),
(48, '9223098170123499914', '18ab370fbc4d4c184ae940f23ea4a614', '21ecd52f6f4e88a79d050d616c0b8e8c', NULL, 'julien.gannevat@att.net'),
(49, '9223098170115574295', 'bbd6204bc145c33109c697f771f2a52d', '44ebee48407cd0029ebc2ec5a70696ef', NULL, 'ursulabounat@hotmail.com'),
(50, '9223098170107408475', '4c341cce2e6967c97a460f3a12d7e520', 'f242a2dc67cd84cfc5eaf1fe9a8a2245', NULL, 'dariodomic@hotmail.fr'),
(51, '9223098170099803443', 'df94f28931f4eae0b0c43a96b712e68d', '911e4902060087f2efe4359300976e6e', NULL, 'bojanad@hotmail.fr'),
(52, '9223098170091998029', '95a10138c39ecf19a9415f20fb5f616e', '596239fdb170370c7350f24c16aa04cb', NULL, 'valdo128@laposte.net'),
(53, '9223098170084692728', 'ac20f8cf3b4f6bf09eabe3f1cd94fc43', '24b24037f5b819a73d2be524de6d25a6', NULL, 'ttrampont@eventsforgames.com'),
(54, '9223098170077177336', '909339870d68876f7ded2658d976fc69', '60f6ded1cb54838e724b24debd7e7115', NULL, 'e.riffard@voila.fr'),
(55, '9223098170069171665', '871a3a849219eeef930b3d7fe7e1f7c7', 'ff22c8040ad1976f91a55e448f4b1ad4', NULL, 'drsergearbaud@gmail.com'),
(56, '9223098170062036736', '92cb27bb617f69ee46501d4d2d4b8e37', '5b43cd407990b82a3ebd1c60c3d6a5c0', NULL, 's.eph@laposte.net'),
(57, '9223098170054841470', 'ae3b09b30603d5487f83180e9e4ad408', '52487449467f47b4ed2b9161f48c9d31', NULL, 'samuel.tomasi@gmail.com'),
(58, '9223098170045744993', '4a0aca17e53efce5d1d2f81ee0b387f5', 'ccc779b704c5be4396452dd6edfa8d0c', NULL, 'julien@julienadam.net'),
(59, '9223098170038860080', 'ed2ee44fa60a8b0bec2cbdcc75b65722', '1ff3021b298cc3443793e9492aad47e2', NULL, NULL),
(60, '9223098170032135324', '3aa1069abc1a7481fb6b1d559b9c02bf', 'b27141af5ca8a2bcaecef7f01ae41b3f', NULL, NULL),
(61, '9223098170025570296', '3679dc53c4591f70fd4284773d5b2b5a', 'd42a5d83f2a75bef3e55491e87699773', NULL, NULL),
(62, '9223098170016924498', '4ecd92927962be885775beab44cfa340', '1fc82203ff5b1918ccec844e8b734ebd', NULL, NULL),
(63, '9223098169979247334', 'fcc870ee36b58dc1f2d297ce990b9995', 'd849146a86a5ebb43f2b18c77d54576a', NULL, NULL),
(64, '9223098169969961235', '744aa19c849a68f9a4b289c4ed63cff5', '2d8006c67ab55f49148af2513529a961', NULL, NULL),
(65, '9223098169960454333', 'cf5e7199c0de03d1d1a356f3562787c3', '9db1eb36ebdb1733a7f8722188bc0a8d', NULL, NULL),
(66, '9223098169952448649', '15dc4f7537e7b88802e57a62b189023e', '508c15282c351bd2729da2d1e9e74073', NULL, NULL),
(67, '9223098169941240679', '32af17ce300d39cdac7b380767f28371', 'bf4936659cb55c788221c0b84b9ac1fe', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `MasterServer`
--

CREATE TABLE IF NOT EXISTS `MasterServer` (
  `externalIp` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `externalPort` int(11) NOT NULL,
  `internalIp` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `internalPort` int(11) NOT NULL,
  `useNat` int(11) NOT NULL,
  `guid` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `gameType` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `gameName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `connectedPlayers` int(11) NOT NULL,
  `playerLimit` int(11) NOT NULL,
  `passwordProtected` int(11) NOT NULL,
  `comment` varchar(1024) COLLATE latin1_general_ci NOT NULL,
  `updated` datetime NOT NULL,
  `lanOnly` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Players`
--

CREATE TABLE IF NOT EXISTS `Players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `lastvote` int(11) NOT NULL,
  PRIMARY KEY (`id`,`alias`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Contenu de la table `Players`
--

INSERT INTO `Players` (`id`, `alias`, `password`, `lastvote`) VALUES
(5, 'anonymous', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(19, 'farf', '8c86a13ee308cfc9cef151e33a54aaed', 1),
(20, 'Henel', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(21, 'KillerBitsRick', 'd7fe3e6e84df43f2b0ca503e501f1a77', 0),
(22, 'Jimentoon', '9db26e1b626e2dca29715b8687ef60f1', 0),
(23, 'Kolobok163rus', 'e239429f16ccef2f212860276e19cc56', 0),
(24, 'Rysky', '9713e8c1d82db4dc148f69d5e53a5499', 0),
(25, 'Fir3fly03', '9463c01e538c2e75f4fa75566b0dc23a', 0),
(26, 'pracan', '6f0ac5ffdd69ab082020c9094a7b4378', 0),
(27, 'pracanel', '6f0ac5ffdd69ab082020c9094a7b4378', 0),
(28, '', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(29, 'oursique', '9957e290522d99690d3701ad8193b120', 0),
(30, 'farfadet', '8c86a13ee308cfc9cef151e33a54aaed', 0),
(31, 'toto', '9d49ae845f2465d1abbe753fb489b270', 0),
(32, 'Djo', '80c0344a120e8d5bea9eafad4744847f', 0),
(33, 'anony3mous', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(34, 'anony3mous23', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(35, '13231', 'c256c4828b123bb625be19eb4f759c7b', 0),
(36, 'anonymous322', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(37, 'ArcanMedia', 'd9f8d6efd98cfb123776aefb2908c1f8', 0),
(38, 'Tyrnn', 'not', 0),
(39, 'Cerberus', 'f5545fcc7c1db5e7cabf481a0cff3f48', 0);

-- --------------------------------------------------------

--
-- Structure de la table `TimeTrial`
--

CREATE TABLE IF NOT EXISTS `TimeTrial` (
  `playerid` int(11) NOT NULL,
  `raceid` bigint(20) NOT NULL,
  `lapTime` int(11) NOT NULL,
  `raceTime` int(11) NOT NULL,
  KEY `playerid` (`playerid`,`raceid`,`lapTime`,`raceTime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `TimeTrial`
--

INSERT INTO `TimeTrial` (`playerid`, `raceid`, `lapTime`, `raceTime`) VALUES
(-2, 1, 52257, 160090),
(-2, 2, 56375, 189049),
(-2, 3, 51318, 158452),
(-2, 4, 50260, 160091),
(-2, 8, 56805, 248865),
(-2, 9, 65328, 313386),
(-2, 10, 48496, 162098),
(-1, 1, 69431, 208452),
(-1, 3, 53028, 168710),
(-1, 4, 45867, 153478),
(-1, 5, 49298, 151397),
(-1, 6, 82924, 254473),
(-1, 7, 49877, 153758),
(-1, 8, 2147483647, 698721),
(-1, 9, 44403, 137770),
(-1, 10, 44538, 137859),
(19, 1, 60204, 201733),
(19, 3, 69702, 209106),
(19, 10, 83306, 249918);

-- --------------------------------------------------------

--
-- Structure de la table `Tracks`
--

CREATE TABLE IF NOT EXISTS `Tracks` (
  `raceid` bigint(20) NOT NULL,
  `nbvotes` int(11) NOT NULL,
  `votessum` int(11) NOT NULL,
  `nbraces` int(11) NOT NULL,
  PRIMARY KEY (`raceid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `Tracks`
--

INSERT INTO `Tracks` (`raceid`, `nbvotes`, `votessum`, `nbraces`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0),
(6, 0, 0, 0),
(7, 0, 0, 0),
(8, 0, 0, 0),
(9, 0, 0, 0),
(10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Votes`
--

CREATE TABLE IF NOT EXISTS `Votes` (
  `voteid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `answer1` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `answer2` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `answer3` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `answer4` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `count1` int(11) DEFAULT NULL,
  `count2` int(11) DEFAULT NULL,
  `count3` int(11) DEFAULT NULL,
  `count4` int(11) DEFAULT NULL,
  `votestotal` int(11) DEFAULT NULL,
  `ended` tinyint(1) NOT NULL,
  PRIMARY KEY (`voteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Votes`
--

INSERT INTO `Votes` (`voteid`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `count1`, `count2`, `count3`, `count4`, `votestotal`, `ended`) VALUES
(1, 'How would you like to name this game ?', 'Wild Steel', 'Speed Carnage', 'Pipes and Punches', 'Biker Bedlam', 1, 0, 0, 0, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<br />
<b>Fatal error</b>:  Out of memory (allocated 31981568) (tried to allocate 45 bytes) in <b>Unknown</b> on line <b>0</b><br />
