-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2017 at 04:52 PM
-- Server version: 10.0.31-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tswebtr_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `token` text NOT NULL,
  `port` int(11) NOT NULL,
  `credits` float NOT NULL,
  `iplog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`, `port`, `credits`, `iplog`) VALUES
(3317, 'baba@gmail.com', '$$2y$10$FA1bKiSurlopq2uuOsaGY.20471gyw.wzJFndlmTuW..119Z9wCUs', 'Q110guZNN6RhUTEo4iKaNyNPvY2KE18hWiMZq5J1', 9987, 0, '149.140.91.227'),
(3343, 'Vatan_Milletindir@hotmail.com', '$2y$10$FA1bKiSurlopq2uuOsaGY.20471gyw.wzJFndlmTuW..119Z9wCUu', 'ixvCXZb1HgOCsLQMYjpHZEgFKImRXTcsZ2jyP7aZ', 70, 0, '149.140.91.227'),
(3658, 'jokergaming@outlook.com', '$2y$10$6Yn6URdrCoOfJUw6EBSl4uNuAW7dOZtumghKZg/KEanjt3EPBdkUK', '70H4rlHvdZQbYZiM2H68ekrnYZshFzJL0AO4T2sD', 306, 0, '212.133.195.89'),
(4194, 'shophanay_06@hotmail.com', '$2y$10$q3u6ceF754WKwmrZIxEQheE5zO.pP18JUQgqD/L8uHvPqUOBqM13e', 'iaQiXynN+MoOuPR+RwRDhKYkKPt8E5rQ1c6zQ0Vg', 135, 0, '185.182.81.24');

-- --------------------------------------------------------

--
-- Table structure for table `yedekler`
--

CREATE TABLE `yedekler` (
  `id` int(11) NOT NULL,
  `yedekadi` text NOT NULL,
  `yedekaciklama` text NOT NULL,
  `port` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yedekler`
--

INSERT INTO `yedekler` (`id`, `yedekadi`, `yedekaciklama`, `port`) VALUES
(3322, 'yedekler/yedek_127001_179_1497357103.snapshot', 'YEDEK (13.06.2017 - 15:31:43) ALINDI', '179'),
(3323, 'yedekler/yedek_127001_293_1497572392.snapshot', 'YEDEK (16.06.2017 - 03:19:52) ALINDI', '293'),
(3326, 'yedekler/yedek_127001_128_1497274608.snapshot', 'YEDEK (12.06.2017 - 16:36:48) ALINDI', '128'),
(3334, 'yedekler/yedek_127001_212_1497529173.snapshot', 'YEDEK (15.06.2017 - 15:19:33) ALINDI', '212'),
(3343, 'yedekler/yedek_127001_70_1497277935.snapshot', 'YEDEK (12.06.2017 - 17:32:15) ALINDI', '70'),
(3344, 'yedekler/yedek_127001_321_1497275401.snapshot', 'YEDEK (12.06.2017 - 16:50:01) ALINDI', '321'),
(3347, 'yedekler/yedek_127001_331_1497279117.snapshot', 'YEDEK (12.06.2017 - 17:51:57) ALINDI', '331'),
(3352, 'yedekler/yedek_127001_197_1497438062.snapshot', 'YEDEK (14.06.2017 - 14:01:02) ALINDI', '197'),
(3354, 'yedekler/yedek_127001_215_1497277659.snapshot', 'YEDEK (12.06.2017 - 17:27:39) ALINDI', '215'),
(3356, 'yedekler/yedek_127001_291_1497512591.snapshot', 'YEDEK (15.06.2017 - 10:43:11) ALINDI', '291'),
(3358, 'yedekler/yedek_127001_161_1497524285.snapshot', 'YEDEK (15.06.2017 - 13:58:05) ALINDI', '161'),
(3363, 'yedekler/yedek_127001_91_1497279094.snapshot', 'YEDEK (12.06.2017 - 17:51:34) ALINDI', '91'),
(3368, 'yedekler/yedek_127001_115_1497538711.snapshot', 'YEDEK (15.06.2017 - 17:58:31) ALINDI', '115'),
(3373, 'yedekler/yedek_127001_101_1497301229.snapshot', 'YEDEK (13.06.2017 - 00:00:29) ALINDI', '101'),
(3376, 'yedekler/yedek_127001_86_1497282951.snapshot', 'YEDEK (12.06.2017 - 18:55:51) ALINDI', '86'),
(3381, 'yedekler/yedek_127001_193_1497352578.snapshot', 'YEDEK (13.06.2017 - 14:16:18) ALINDI', '193'),
(3384, 'yedekler/yedek_127001_287_1497298017.snapshot', 'YEDEK (12.06.2017 - 23:06:57) ALINDI', '287'),
(3385, 'yedekler/yedek_127001_257_1497286327.snapshot', 'YEDEK (12.06.2017 - 19:52:07) ALINDI', '257'),
(3389, 'yedekler/yedek_127001_216_1497358891.snapshot', 'YEDEK (13.06.2017 - 16:01:31) ALINDI', '216'),
(3397, 'yedekler/yedek_127001_191_1497289486.snapshot', 'YEDEK (12.06.2017 - 20:44:46) ALINDI', '191'),
(3403, 'yedekler/yedek_127001_195_1497545191.snapshot', 'YEDEK (15.06.2017 - 19:46:31) ALINDI', '195'),
(3405, 'yedekler/yedek_127001_311_1497298666.snapshot', 'YEDEK (12.06.2017 - 23:17:46) ALINDI', '311'),
(3407, 'yedekler/yedek_127001_285_1497382867.snapshot', 'YEDEK (13.06.2017 - 22:41:07) ALINDI', '285'),
(3409, 'yedekler/yedek_127001_58_1497646038.snapshot', 'YEDEK (16.06.2017 - 23:47:18) ALINDI', '58'),
(3420, 'yedekler/yedek_127001_24_1497297823.snapshot', 'YEDEK (12.06.2017 - 23:03:43) ALINDI', '24'),
(3430, 'yedekler/yedek_127001_33_1497301170.snapshot', 'YEDEK (12.06.2017 - 23:59:30) ALINDI', '33'),
(3434, 'yedekler/yedek_127001_98_1497670172.snapshot', 'YEDEK (17.06.2017 - 06:29:32) ALINDI', '98'),
(3438, 'yedekler/yedek_127001_259_1497380648.snapshot', 'YEDEK (13.06.2017 - 22:04:08) ALINDI', '259'),
(3441, 'yedekler/yedek_127001_247_1497482214.snapshot', 'YEDEK (15.06.2017 - 02:16:54) ALINDI', '247'),
(3455, 'yedekler/yedek_127001_141_1497440678.snapshot', 'YEDEK (14.06.2017 - 14:44:38) ALINDI', '141'),
(3458, 'yedekler/yedek_127001_2_1497312684.snapshot', 'YEDEK (13.06.2017 - 03:11:24) ALINDI', '2'),
(3464, 'yedekler/yedek_127001_344_1497401468.snapshot', 'YEDEK (14.06.2017 - 03:51:08) ALINDI', '344'),
(3466, 'yedekler/yedek_127001_233_1497321936.snapshot', 'YEDEK (13.06.2017 - 05:45:36) ALINDI', '233'),
(3470, 'yedekler/yedek_127001_165_1497329303.snapshot', 'YEDEK (13.06.2017 - 07:48:23) ALINDI', '165'),
(3472, 'yedekler/yedek_127001_90_1497464772.snapshot', 'YEDEK (14.06.2017 - 21:26:12) ALINDI', '90'),
(3474, 'yedekler/yedek_127001_65_1497335872.snapshot', 'YEDEK (13.06.2017 - 09:37:52) ALINDI', '65'),
(3475, 'yedekler/yedek_127001_83_1497342852.snapshot', 'YEDEK (13.06.2017 - 11:34:12) ALINDI', '83'),
(3477, 'yedekler/yedek_127001_173_1497337780.snapshot', 'YEDEK (13.06.2017 - 10:09:40) ALINDI', '173'),
(3482, 'yedekler/yedek_127001_160_1497632383.snapshot', 'YEDEK (16.06.2017 - 19:59:43) ALINDI', '160'),
(3483, 'yedekler/yedek_127001_27_1497341846.snapshot', 'YEDEK (13.06.2017 - 11:17:26) ALINDI', '27'),
(3488, 'yedekler/yedek_127001_32_1497635045.snapshot', 'YEDEK (16.06.2017 - 20:44:05) ALINDI', '32'),
(3489, 'yedekler/yedek_127001_15_1497451329.snapshot', 'YEDEK (14.06.2017 - 17:42:09) ALINDI', '15'),
(3492, 'yedekler/yedek_127001_205_1497345325.snapshot', 'YEDEK (13.06.2017 - 12:15:25) ALINDI', '205'),
(3494, 'yedekler/yedek_127001_283_1497616362.snapshot', 'YEDEK (16.06.2017 - 15:32:42) ALINDI', '283'),
(3495, 'yedekler/yedek_127001_296_1497349471.snapshot', 'YEDEK (13.06.2017 - 13:24:31) ALINDI', '296'),
(3500, 'yedekler/yedek_127001_310_1497363242.snapshot', 'YEDEK (13.06.2017 - 17:14:02) ALINDI', '310'),
(3515, 'yedekler/yedek_127001_305_1497620114.snapshot', 'YEDEK (16.06.2017 - 16:35:14) ALINDI', '305'),
(3516, 'yedekler/yedek_127001_77_1497473507.snapshot', 'YEDEK (14.06.2017 - 23:51:47) ALINDI', '77'),
(3522, 'yedekler/yedek_127001_202_1497365687.snapshot', 'YEDEK (13.06.2017 - 17:54:47) ALINDI', '202'),
(3538, 'yedekler/yedek_127001_73_1497379723.snapshot', 'YEDEK (13.06.2017 - 21:48:43) ALINDI', '73'),
(3539, 'yedekler/yedek_127001_69_1497693293.snapshot', 'YEDEK (17.06.2017 - 12:54:53) ALINDI', '69'),
(3540, 'yedekler/yedek_127001_332_1497360790.snapshot', 'YEDEK (13.06.2017 - 16:33:10) ALINDI', '332'),
(3543, 'yedekler/yedek_127001_190_1497362675.snapshot', 'YEDEK (13.06.2017 - 17:04:35) ALINDI', '190'),
(3548, 'yedekler/yedek_127001_60_1497461326.snapshot', 'YEDEK (14.06.2017 - 20:28:46) ALINDI', '60'),
(3564, 'yedekler/yedek_127001_267_1497368522.snapshot', 'YEDEK (13.06.2017 - 18:42:02) ALINDI', '267'),
(3568, 'yedekler/yedek_127001_159_1497368677.snapshot', 'YEDEK (13.06.2017 - 18:44:37) ALINDI', '159'),
(3576, 'yedekler/yedek_127001_338_1497550854.snapshot', 'YEDEK (15.06.2017 - 21:20:54) ALINDI', '338'),
(3577, 'yedekler/yedek_127001_265_1497484413.snapshot', 'YEDEK (15.06.2017 - 02:53:33) ALINDI', '265'),
(3587, 'yedekler/yedek_127001_266_1497375026.snapshot', 'YEDEK (13.06.2017 - 20:30:26) ALINDI', '266'),
(3592, 'yedekler/yedek_127001_201_1497635517.snapshot', 'YEDEK (16.06.2017 - 20:51:57) ALINDI', '201'),
(3594, 'yedekler/yedek_127001_61_1497374902.snapshot', 'YEDEK (13.06.2017 - 20:28:22) ALINDI', '61'),
(3596, 'yedekler/yedek_127001_167_1497375725.snapshot', 'YEDEK (13.06.2017 - 20:42:05) ALINDI', '167'),
(3597, 'yedekler/yedek_127001_106_1497380991.snapshot', 'YEDEK (13.06.2017 - 22:09:51) ALINDI', '106'),
(3609, 'yedekler/yedek_127001_19_1497382301.snapshot', 'YEDEK (13.06.2017 - 22:31:41) ALINDI', '19'),
(3620, 'yedekler/yedek_127001_112_1497398589.snapshot', 'YEDEK (14.06.2017 - 03:03:09) ALINDI', '112'),
(3627, 'yedekler/yedek_127001_105_1497394295.snapshot', 'YEDEK (14.06.2017 - 01:51:35) ALINDI', '105'),
(3628, 'yedekler/yedek_127001_186_1497392425.snapshot', 'YEDEK (14.06.2017 - 01:20:25) ALINDI', '186'),
(3632, 'yedekler/yedek_127001_204_1497391738.snapshot', 'YEDEK (14.06.2017 - 01:08:58) ALINDI', '204'),
(3639, 'yedekler/yedek_127001_126_1497456317.snapshot', 'YEDEK (14.06.2017 - 19:05:17) ALINDI', '126'),
(3645, 'yedekler/yedek_127001_298_1497399434.snapshot', 'YEDEK (14.06.2017 - 03:17:14) ALINDI', '298'),
(3658, 'yedekler/yedek_127001_306_1497451986.snapshot', 'YEDEK (14.06.2017 - 17:53:06) ALINDI', '306'),
(3659, 'yedekler/yedek_127001_42_1497465069.snapshot', 'YEDEK (14.06.2017 - 21:31:09) ALINDI', '42'),
(3669, 'yedekler/yedek_127001_280_1497425582.snapshot', 'YEDEK (14.06.2017 - 10:33:02) ALINDI', '280'),
(3686, 'yedekler/yedek_127001_104_1497432162.snapshot', 'YEDEK (14.06.2017 - 12:22:42) ALINDI', '104'),
(3699, 'yedekler/yedek_127001_30_1497439123.snapshot', 'YEDEK (14.06.2017 - 14:18:43) ALINDI', '30'),
(3700, 'yedekler/yedek_127001_242_1497436908.snapshot', 'YEDEK (14.06.2017 - 13:41:48) ALINDI', '242'),
(3701, 'yedekler/yedek_127001_261_1497620942.snapshot', 'YEDEK (16.06.2017 - 16:49:02) ALINDI', '261'),
(3713, 'yedekler/yedek_127001_246_1497447226.snapshot', 'YEDEK (14.06.2017 - 16:33:46) ALINDI', '246'),
(3719, 'yedekler/yedek_127001_262_1497512315.snapshot', 'YEDEK (15.06.2017 - 10:38:35) ALINDI', '262'),
(3720, 'yedekler/yedek_127001_28_1497444527.snapshot', 'YEDEK (14.06.2017 - 15:48:47) ALINDI', '28'),
(3722, 'yedekler/yedek_127001_189_1497444742.snapshot', 'YEDEK (14.06.2017 - 15:52:22) ALINDI', '189'),
(3723, 'yedekler/yedek_127001_312_1497596089.snapshot', 'YEDEK (16.06.2017 - 09:54:49) ALINDI', '312'),
(3734, 'yedekler/yedek_127001_345_1497449919.snapshot', 'YEDEK (14.06.2017 - 17:18:39) ALINDI', '345'),
(3748, 'yedekler/yedek_127001_40_1497622321.snapshot', 'YEDEK (16.06.2017 - 17:12:01) ALINDI', '40'),
(3751, 'yedekler/yedek_127001_135_1497454012.snapshot', 'YEDEK (14.06.2017 - 18:26:52) ALINDI', '135'),
(3756, 'yedekler/yedek_127001_308_1497456377.snapshot', 'YEDEK (14.06.2017 - 19:06:17) ALINDI', '308'),
(3760, 'yedekler/yedek_127001_12_1497685131.snapshot', 'YEDEK (17.06.2017 - 10:38:51) ALINDI', '12'),
(3763, 'yedekler/yedek_127001_108_1497457589.snapshot', 'YEDEK (14.06.2017 - 19:26:29) ALINDI', '108'),
(3765, 'yedekler/yedek_127001_252_1497622732.snapshot', 'YEDEK (16.06.2017 - 17:18:52) ALINDI', '252'),
(3775, 'yedekler/yedek_127001_168_1497463939.snapshot', 'YEDEK (14.06.2017 - 21:12:19) ALINDI', '168'),
(3779, 'yedekler/yedek_127001_101_1497467563.snapshot', 'YEDEK (14.06.2017 - 22:12:43) ALINDI', '101'),
(3781, 'yedekler/yedek_127001_251_1497533512.snapshot', 'YEDEK (15.06.2017 - 16:31:52) ALINDI', '251'),
(3786, 'yedekler/yedek_127001_328_1497472448.snapshot', 'YEDEK (14.06.2017 - 23:34:08) ALINDI', '328'),
(3789, 'yedekler/yedek_127001_280_1497472508.snapshot', 'YEDEK (14.06.2017 - 23:35:08) ALINDI', '280'),
(3791, 'yedekler/yedek_127001_22_1497473034.snapshot', 'YEDEK (14.06.2017 - 23:43:54) ALINDI', '22'),
(3792, 'yedekler/yedek_127001_275_1497536361.snapshot', 'YEDEK (15.06.2017 - 17:19:21) ALINDI', '275'),
(3800, 'yedekler/yedek_127001_109_1497480807.snapshot', 'YEDEK (15.06.2017 - 01:53:27) ALINDI', '109'),
(3810, 'yedekler/yedek_127001_156_1497484413.snapshot', 'YEDEK (15.06.2017 - 02:53:33) ALINDI', '156'),
(3815, 'yedekler/yedek_127001_48_1497493564.snapshot', 'YEDEK (15.06.2017 - 05:26:04) ALINDI', '48'),
(3820, 'yedekler/yedek_127001_71_1497490709.snapshot', 'YEDEK (15.06.2017 - 04:38:29) ALINDI', '71'),
(3824, 'yedekler/yedek_127001_132_1497591031.snapshot', 'YEDEK (16.06.2017 - 08:30:31) ALINDI', '132'),
(3827, 'yedekler/yedek_127001_100_1497670315.snapshot', 'YEDEK (17.06.2017 - 06:31:55) ALINDI', '100'),
(3833, 'yedekler/yedek_127001_219_1497681933.snapshot', 'YEDEK (17.06.2017 - 09:45:33) ALINDI', '219'),
(3845, 'yedekler/yedek_127001_336_1497520251.snapshot', 'YEDEK (15.06.2017 - 12:50:51) ALINDI', '336'),
(3847, 'yedekler/yedek_127001_176_1497518916.snapshot', 'YEDEK (15.06.2017 - 12:28:36) ALINDI', '176'),
(3862, 'yedekler/yedek_127001_47_1497523201.snapshot', 'YEDEK (15.06.2017 - 13:40:01) ALINDI', '47'),
(3882, 'yedekler/yedek_127001_82_1497527575.snapshot', 'YEDEK (15.06.2017 - 14:52:55) ALINDI', '82'),
(3898, 'yedekler/yedek_127001_224_1497591613.snapshot', 'YEDEK (16.06.2017 - 08:40:13) ALINDI', '224'),
(3905, 'yedekler/yedek_127001_151_1497533404.snapshot', 'YEDEK (15.06.2017 - 16:30:04) ALINDI', '151'),
(3909, 'yedekler/yedek_127001_116_1497535377.snapshot', 'YEDEK (15.06.2017 - 17:02:57) ALINDI', '116'),
(3911, 'yedekler/yedek_127001_169_1497653101.snapshot', 'YEDEK (17.06.2017 - 01:45:01) ALINDI', '169'),
(3918, 'yedekler/yedek_127001_10_1497542977.snapshot', 'YEDEK (15.06.2017 - 19:09:37) ALINDI', '10'),
(3929, 'yedekler/yedek_127001_260_1497552011.snapshot', 'YEDEK (15.06.2017 - 21:40:11) ALINDI', '260'),
(3930, 'yedekler/yedek_127001_2_1497701605.snapshot', 'YEDEK (17.06.2017 - 15:13:25) ALINDI', '2'),
(3933, 'yedekler/yedek_127001_13_1497545684.snapshot', 'YEDEK (15.06.2017 - 19:54:44) ALINDI', '13'),
(3938, 'yedekler/yedek_127001_41_1497599909.snapshot', 'YEDEK (16.06.2017 - 10:58:29) ALINDI', '41'),
(3941, 'yedekler/yedek_127001_243_1497549550.snapshot', 'YEDEK (15.06.2017 - 20:59:10) ALINDI', '243'),
(3944, 'yedekler/yedek_127001_93_1497587728.snapshot', 'YEDEK (16.06.2017 - 07:35:28) ALINDI', '93'),
(3959, 'yedekler/yedek_127001_249_1497561641.snapshot', 'YEDEK (16.06.2017 - 00:20:41) ALINDI', '249'),
(3970, 'yedekler/yedek_127001_158_1497607818.snapshot', 'YEDEK (16.06.2017 - 13:10:18) ALINDI', '158'),
(3977, 'yedekler/yedek_127001_103_1497561881.snapshot', 'YEDEK (16.06.2017 - 00:24:41) ALINDI', '103'),
(3983, 'yedekler/yedek_127001_183_1497566416.snapshot', 'YEDEK (16.06.2017 - 01:40:16) ALINDI', '183'),
(3986, 'yedekler/yedek_127001_199_1497634647.snapshot', 'YEDEK (16.06.2017 - 20:37:27) ALINDI', '199'),
(3996, 'yedekler/yedek_127001_185_1497640737.snapshot', 'YEDEK (16.06.2017 - 22:18:57) ALINDI', '185'),
(4001, 'yedekler/yedek_127001_53_1497591379.snapshot', 'YEDEK (16.06.2017 - 08:36:19) ALINDI', '53'),
(4046, 'yedekler/yedek_127001_151_1497620141.snapshot', 'YEDEK (16.06.2017 - 16:35:41) ALINDI', '151'),
(4049, 'yedekler/yedek_127001_245_1497639440.snapshot', 'YEDEK (16.06.2017 - 21:57:20) ALINDI', '245'),
(4050, 'yedekler/yedek_127001_274_1497620546.snapshot', 'YEDEK (16.06.2017 - 16:42:26) ALINDI', '274'),
(4052, 'yedekler/yedek_127001_71_1497621131.snapshot', 'YEDEK (16.06.2017 - 16:52:11) ALINDI', '71'),
(4054, 'yedekler/yedek_127001_219_1497622529.snapshot', 'YEDEK (16.06.2017 - 17:15:29) ALINDI', '219'),
(4056, 'yedekler/yedek_127001_345_1497628532.snapshot', 'YEDEK (16.06.2017 - 18:55:32) ALINDI', '345'),
(4060, 'yedekler/yedek_127001_185_1497626172.snapshot', 'YEDEK (16.06.2017 - 18:16:12) ALINDI', '185'),
(4061, 'yedekler/yedek_127001_260_1497624310.snapshot', 'YEDEK (16.06.2017 - 17:45:10) ALINDI', '260'),
(4062, 'yedekler/yedek_127001_111_1497629159.snapshot', 'YEDEK (16.06.2017 - 19:05:59) ALINDI', '111'),
(4064, 'yedekler/yedek_127001_124_1497630679.snapshot', 'YEDEK (16.06.2017 - 19:31:19) ALINDI', '124'),
(4075, 'yedekler/yedek_127001_182_1497626863.snapshot', 'YEDEK (16.06.2017 - 18:27:43) ALINDI', '182'),
(4082, 'yedekler/yedek_127001_125_1497636717.snapshot', 'YEDEK (16.06.2017 - 21:11:57) ALINDI', '125'),
(4096, 'yedekler/yedek_127001_34_1497641619.snapshot', 'YEDEK (16.06.2017 - 22:33:39) ALINDI', '34'),
(4104, 'yedekler/yedek_127001_105_1497642466.snapshot', 'YEDEK (16.06.2017 - 22:47:46) ALINDI', '105'),
(4107, 'yedekler/yedek_127001_133_1497645983.snapshot', 'YEDEK (16.06.2017 - 23:46:23) ALINDI', '133'),
(4116, 'yedekler/yedek_127001_78_1497645178.snapshot', 'YEDEK (16.06.2017 - 23:32:58) ALINDI', '78'),
(4132, 'yedekler/yedek_127001_27_1497648953.snapshot', 'YEDEK (17.06.2017 - 00:35:53) ALINDI', '27'),
(4133, 'yedekler/yedek_127001_332_1497649665.snapshot', 'YEDEK (17.06.2017 - 00:47:45) ALINDI', '332'),
(4139, 'yedekler/yedek_127001_37_1497659168.snapshot', 'YEDEK (17.06.2017 - 03:26:08) ALINDI', '37'),
(4141, 'yedekler/yedek_127001_116_1497653946.snapshot', 'YEDEK (17.06.2017 - 01:59:06) ALINDI', '116'),
(4143, 'yedekler/yedek_127001_290_1497655475.snapshot', 'YEDEK (17.06.2017 - 02:24:35) ALINDI', '290'),
(4144, 'yedekler/yedek_127001_264_1497665673.snapshot', 'YEDEK (17.06.2017 - 05:14:33) ALINDI', '264'),
(4159, 'yedekler/yedek_127001_208_1497678122.snapshot', 'YEDEK (17.06.2017 - 08:42:02) ALINDI', '208'),
(4161, 'yedekler/yedek_127001_18_1497701304.snapshot', 'YEDEK (17.06.2017 - 15:08:24) ALINDI', '18'),
(4163, 'yedekler/yedek_127001_4_1497696869.snapshot', 'YEDEK (17.06.2017 - 13:54:29) ALINDI', '4'),
(4174, 'yedekler/yedek_127001_93_1497700440.snapshot', 'YEDEK (17.06.2017 - 14:54:00) ALINDI', '93'),
(4182, 'yedekler/yedek_127001_258_1497695750.snapshot', 'YEDEK (17.06.2017 - 13:35:50) ALINDI', '258'),
(4184, 'yedekler/yedek_127001_135_1497699234.snapshot', 'YEDEK (17.06.2017 - 14:33:54) ALINDI', '135');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yedekler`
--
ALTER TABLE `yedekler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4195;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
