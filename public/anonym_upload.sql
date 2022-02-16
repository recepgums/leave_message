-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Şub 2022, 22:32:44
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `anonym_upload`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `global`
--

CREATE TABLE `global` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `global`
--

INSERT INTO `global` (`id`, `title`, `file_name`, `created_at`, `updated_at`, `password`, `user_id`, `link`) VALUES
(20, 'Notum', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, '4', 'http://127.0.0.1:8000/f/WzYKFykLd4WzrJrcc0l2'),
(21, 'https://www.youtube.com/watch?v=bV5QooeqITo', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, '4', 'http://127.0.0.1:8000/f/c8suvdxznnYlpa1uuya9'),
(22, 'BUTUNLEME', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/35OqBiMBMUhuIqt1Tjxxji1ffc1xlneoMvLeTXwL.zip', '2022-02-15 20:56:49', '2022-02-15 20:56:49', '$2y$10$zkuvCkvQryAiOi0RfAXcNOO12JEwztj8G0YSiBMv2KSDPkkAyWCXy', '', 'http://127.0.0.1:8000/f/UzzVm3642M28tRsD551u'),
(23, 'Yaz okulu', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 20:56:49', '2022-02-15 20:56:49', '$2y$10$GR1TxhV2UfVbiiYlciFziOm9Zyo432b4jbU/rOAsXjW0nhqQ.CYgS', '4', 'http://127.0.0.1:8000/f/LLx8W69HoUfMHeyr9FJ3'),
(24, 'https://www.youtube.com/watch?v=pHKZw5EyTi4', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, NULL, 'http://127.0.0.1:8000/f/yY0DHQFqmucVwRbn2Zsk'),
(26, 'VIDEO LINK', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 20:56:49', '2022-02-15 20:56:49', '$2y$10$cDKsUKCoDrAUVOuGWKRdce6U3QLeBvAOZVlmr/uaIS9EOU8wcNq3q', '4', 'http://127.0.0.1:8000/f/ho1pPFsDxUVYUHDIbZKj'),
(27, 'Test 863', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png', '2022-02-15 20:56:49', '2022-02-15 20:56:49', '$2y$10$grI3CvKdTm4/INAOvtraMOBK4AVR/HHOpEu4frzttwD.d1HiaOpzS', '4', 'http://127.0.0.1:8000/f/nPiGZjo5jvloy4N0rBjo'),
(28, 'https://www.youtube.com/watch?v=s40aApemdWY', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, '4', 'http://127.0.0.1:8000/f/eiN2rCSkhZVyRKa1LByl'),
(29, 'Test 808', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, NULL, 'http://127.0.0.1:8000/f/wBbmquSAcwm8XXqwOG1q'),
(30, 'Test 569', NULL, '2022-02-15 20:56:49', '2022-02-15 20:56:49', NULL, NULL, 'http://127.0.0.1:8000/f/HFzTMpqaBxPYkTGXuaBs'),
(31, 'https://www.youtube.com/watch?v=Cgm3lkN-azA', NULL, '2022-02-15 20:57:56', '2022-02-15 20:57:56', NULL, '4', 'http://127.0.0.1:8000/f/UTgAQiKiWOMwjIG6PPe4'),
(32, 'Test 795', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/tltUFJx4915wdCaG1D9J1O1bjJMml13XRpF0nUiD.jpg', '2022-02-15 20:57:56', '2022-02-15 20:57:56', '$2y$10$6/V/g68N8JtqJ1W0gNHUkO2ksGSocnP.u/40YsgXqCWGpILSwCLjO', '1', 'http://127.0.0.1:8000/f/IRPgPZZYgafgWc2q1Bhi'),
(33, 'Test 130', NULL, '2022-02-15 20:57:56', '2022-02-15 20:57:56', NULL, NULL, 'http://127.0.0.1:8000/f/1rDRQSnr4hTGEYe2HT3U'),
(34, 'https://www.youtube.com/watch?v=VjOkDO17hso', NULL, '2022-02-15 20:57:56', '2022-02-15 20:57:56', NULL, NULL, 'http://127.0.0.1:8000/f/R7Q8TOcihtYDNeU4GFqp'),
(35, 'FOTO1', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png', '2022-02-15 20:57:56', '2022-02-15 20:57:56', '$2y$10$LXplJYaQRI88qH8YsADHZuAGOva/SgA4j.qM6AtgeEBt.9jpOIpCi', NULL, 'http://127.0.0.1:8000/f/NSsscsBjVBeZxqhOSkdn'),
(36, 'Test 359', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/tltUFJx4915wdCaG1D9J1O1bjJMml13XRpF0nUiD.jpg', '2022-02-15 20:57:56', '2022-02-15 20:57:56', '$2y$10$VTZ8Wwi2khcjrSkiC/Xu8uSW906DoJtVAWFs7LmkxRHJVPLrH4ata', NULL, 'http://127.0.0.1:8000/f/Xka4zJr91MJRwxRxxja8'),
(37, 'https://www.youtube.com/watch?v=s40aApemdWY', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png', '2022-02-15 20:57:56', '2022-02-15 20:57:56', '$2y$10$HHSTsOohVGNrOb85Ox7lEecoqXijf5lZa8uJ1QT46FDm6FeGgE81C', '4', 'http://127.0.0.1:8000/f/tZW5ow60Te4d6s5tMmAK'),
(38, 'https://www.youtube.com/watch?v=s40aApemdWY', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png', '2022-02-15 20:57:57', '2022-02-15 20:57:57', '$2y$10$w1gaHJFX3pxUHW6lKMgRweYt6HmroPTN83JofrbMLcM0S71DmraaS', '4', 'http://127.0.0.1:8000/f/9hKA4dw2RouWvrczp59y'),
(39, 'Test 526', NULL, '2022-02-15 20:57:57', '2022-02-15 20:57:57', NULL, NULL, 'http://127.0.0.1:8000/f/YwWAcWv0zBPdqiyDD8Ws'),
(40, 'Test 476', NULL, '2022-02-15 20:57:57', '2022-02-15 20:57:57', NULL, NULL, 'http://127.0.0.1:8000/f/Xp03c4pQ3VQbAXskKTQR'),
(41, 'Test 356', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/XpVeohUVa1PkSHBbcRkgI214XJI8c49mNldTnThK.txt', '2022-02-15 20:57:57', '2022-02-15 20:57:57', '$2y$10$.kAlei5kvLdM/wx1Xs9PcOZMi9xLZkcazUwihk8oUYHzR6H5vX3nC', '1', 'http://127.0.0.1:8000/f/U0VQHWTLiPNIHskvvon4'),
(42, 'Test 569', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/8zpONJKc1OvjmEpQBntE'),
(43, 'image', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/35OqBiMBMUhuIqt1Tjxxji1ffc1xlneoMvLeTXwL.zip', '2022-02-15 20:57:58', '2022-02-15 20:57:58', '$2y$10$O9/AO3/n2G1y7NxpqvJuF.pDfmvbnsU9sNyqFceUWeCXyVklSEPRG', '4', 'http://127.0.0.1:8000/f/kA88F4ChoFByvLZ6KxaW'),
(44, 'Test 410', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 20:57:58', '2022-02-15 20:57:58', '$2y$10$PZxD/g2mx2psN228/EymIOaWVPeJcJsclA7ZUBx7OBUGEd3jtGq9G', '4', 'http://127.0.0.1:8000/f/faJS7vY6TxrKpJWbmF9r'),
(45, 'Test 706', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/GxlAFLvyvZYI3pNTGGvD'),
(46, 'Test 619', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/35OqBiMBMUhuIqt1Tjxxji1ffc1xlneoMvLeTXwL.zip', '2022-02-15 20:57:58', '2022-02-15 20:57:58', '$2y$10$FKpKxKSYajtdE2yMBRGiTO1T1oVql4oFo6/OsOjI4vYHsl1pmR1.G', '1', 'http://127.0.0.1:8000/f/a22d3WAVNj5x7nGfugwM'),
(47, 'Test 282', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/64sbBCcCPN3eVtkQy4Ot'),
(48, 'Test 640', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/dIkWO3029NtKKmEpQtum'),
(49, 'Test 600', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/Y3Y9Z1rtav9vmzrQRFdV'),
(50, 'Test 747', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/qM1OpI6SN8nK8IFB6X4M'),
(51, 'Test 637', NULL, '2022-02-15 20:57:58', '2022-02-15 20:57:58', NULL, NULL, 'http://127.0.0.1:8000/f/DGf6kGKOtW9cT78DkO2a'),
(52, 'Test 923', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 20:57:58', '2022-02-15 20:57:58', '$2y$10$cDOVpXi1ZG/zrRCt6N5S/.sTSArfTfYCKtVDdPG4m7XRhE94ddNve', '1', 'http://127.0.0.1:8000/f/4WKMjDLmrtO2RZfjup6u'),
(53, 'asd', NULL, '2022-02-15 21:01:37', '2022-02-15 21:01:37', NULL, NULL, NULL),
(54, 'dosya', NULL, '2022-02-15 21:01:57', '2022-02-15 21:01:57', '$2y$10$xhulZrlknFUYxtUjVhqqCu6OIXelF0j8u2/P0ynHSeuGFCKnJES.i', NULL, NULL),
(55, 'dosya', NULL, '2022-02-15 21:02:05', '2022-02-15 21:02:05', NULL, NULL, NULL),
(56, 'AAAA', NULL, '2022-02-15 21:24:11', '2022-02-15 21:24:11', '$2y$10$OVnKgebfor4O6mdyQ1wSxulJ5DpgdO1V0x/CuSx78wzdPiGlrUgZm', NULL, NULL),
(57, 'Test 642', NULL, '2022-02-15 21:27:24', '2022-02-15 21:27:24', NULL, NULL, 'http://192.168.1.11:8000/f/n2sKERuZoBKBs7Fq5ZH1'),
(58, 'Test 630', NULL, '2022-02-15 21:27:24', '2022-02-15 21:27:24', NULL, NULL, 'http://192.168.1.11:8000/f/Q6XeKb83tizvhrySa2VN'),
(59, 'Test 759', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/XpVeohUVa1PkSHBbcRkgI214XJI8c49mNldTnThK.txt', '2022-02-15 21:27:24', '2022-02-15 21:27:24', '$2y$10$8ubhtlGqcHVZ1pCUf5Wfe.qD0E5IZGZ2XGvUhxVT3QyG97Lqy32vi', '1', 'http://192.168.1.11:8000/f/iFtcW7JHU9ZHuhgkij1I'),
(60, 'Test 342', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png', '2022-02-15 21:27:24', '2022-02-15 21:27:24', '$2y$10$FLbShrF0nrnhkDsN1Aj79eYTqkWkWIH/8gxuuluL6YtN1dGRwCkB.', '1', 'http://192.168.1.11:8000/f/ukYS6Znr84jas4CsrBGl'),
(61, 'Test 427', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 21:27:24', '2022-02-15 21:27:24', '$2y$10$W6PyqW/I4sGZJTZSxhsn3uua7fYWdil/OKFnL3f6DwzjBNnIhty7C', '1', 'http://192.168.1.11:8000/f/LkIBxqP22ibXknrAxX31'),
(62, 'Test 998', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 21:27:25', '2022-02-15 21:27:25', '$2y$10$g.kYdd9/v2CkbBmiydZ0k./TWM88qk52qY/4vZBP7XSIPMgPVmW.K', '1', 'http://192.168.1.11:8000/f/bVmfGp1ubDrCjWLQugR9'),
(63, 'Test 167', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/tltUFJx4915wdCaG1D9J1O1bjJMml13XRpF0nUiD.jpg', '2022-02-15 21:27:25', '2022-02-15 21:27:25', '$2y$10$iYaXHrqxll1OogJsVggyxeFsNtQF1RoRzhdgQ0CKlUfZKsCQVmv.W', '1', 'http://192.168.1.11:8000/f/nTJ6aPWswKox5YXOC5UM'),
(64, 'Copy me!', 'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt', '2022-02-15 21:27:25', '2022-02-15 21:27:25', '$2y$10$QYUgqsgIuakwugfcmMcmc.nKlht/lBSO.Oj9P4MIQ0uqQDPXMM1uG', '4', 'http://192.168.1.11:8000/f/glhVK49Uz5MnchT0aUQK'),
(65, 'Test 843', NULL, '2022-02-15 21:27:25', '2022-02-15 21:27:25', NULL, NULL, 'http://192.168.1.11:8000/f/5YdsvZsjVSTUmQUCoUfn'),
(66, 'Test 167', NULL, '2022-02-15 21:27:25', '2022-02-15 21:27:25', NULL, NULL, 'http://192.168.1.11:8000/f/LpxQKxCxJsPLEH21Olje'),
(67, 'Test 666', NULL, '2022-02-15 21:27:25', '2022-02-15 21:27:25', NULL, NULL, 'http://192.168.1.11:8000/f/P11sxpfMTJMtA3ulmtBJ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `global_answers`
--

CREATE TABLE `global_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `the_answer` smallint(6) NOT NULL,
  `responder_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `global_questions`
--

CREATE TABLE `global_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creater_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guest_room_messages`
--

CREATE TABLE `guest_room_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_number` smallint(6) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `link`
--

CREATE TABLE `link` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_12_14_210840_create_paylasimlars_table', 1),
(9, '2018_12_14_211644_create_yorumlars_table', 1),
(10, '2018_12_18_175229_create_puanlars_table', 1),
(11, '2020_03_29_122352_create_global_table', 1),
(12, '2020_03_29_130821_create_room_settings', 1),
(13, '2020_03_29_131318_create_guest_room_messages', 1),
(14, '2020_04_01_151443_add_password_to_global', 1),
(15, '2020_04_09_125545_add_column_to_guest_room_messages', 1),
(16, '2020_04_09_212129_create_global_questions', 1),
(17, '2020_04_09_212217_create_global_answers', 1),
(18, '2020_06_21_130550_update_title_in_global_table', 1),
(19, '2020_06_23_111725_link', 1),
(20, '2021_11_15_230319_create_notifications_table', 1),
(21, '2021_11_15_232345_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('06c0ea3c37dc3a96b08a401adf62b681b948567fd5c06832059f02e5cb504d776e01fc29920ee1dd', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:19:28', '2022-02-15 21:19:28', '2023-02-16 00:19:28'),
('0db80c06adc2787616d45262c6507449e962650a78495375ece8743898543ecb76fada1c3900dae5', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:26:52', '2022-02-15 21:26:52', '2023-02-16 00:26:52'),
('410a1236348655b88b9d1092e1389184889b94c3b80dfff22bc50a648cccb111c3f90313b48b64e2', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:28:43', '2022-02-15 21:28:43', '2023-02-16 00:28:43'),
('554228b83bd2d90d68876907da88e60feaa408ae84ee63aca665bb67f422c605e87541d6599e7210', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:03:40', '2022-02-15 21:03:40', '2023-02-16 00:03:40'),
('612c0f3f1f888919404c778bef8cf56a6af51df1f653b2a6686ec9b266c2d5d88b2d12e26df253ee', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:06:04', '2022-02-15 21:06:04', '2023-02-16 00:06:04'),
('7f37c0864fa07f0c562b1031a8e5ee8d71a4ff969857cb72fb11f51edc0006385d0f555e691a9749', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:12:47', '2022-02-15 21:12:47', '2023-02-16 00:12:47'),
('8aa315d366a63611971d740f57e8b482d69a60b0fd817e399a05507d29b5db1340cb9adf188b9bd3', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:11:07', '2022-02-15 21:11:07', '2023-02-16 00:11:07'),
('a517841697192225603ab5e990ca62b28cfb5182f7afdbf1a750fd85ea52dac9e184f3eded383aa5', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:15:14', '2022-02-15 21:15:14', '2023-02-16 00:15:14'),
('bd96e84c7cca63931625f68cf055d851782406e10c6e75eadc0d2ffcebaf1a4ba6f664c6b36b93ac', 1, 1, 'authToken', '[]', 0, '2022-02-15 20:07:40', '2022-02-15 20:07:40', '2023-02-15 23:07:40'),
('c2fa8ac13f7ef3aaed525f054c9fcc7af44c74f010e117c98862031c113c50cd22316c707f4e1c2b', 2, 1, 'authToken', '[]', 0, '2022-02-15 20:15:39', '2022-02-15 20:15:39', '2023-02-15 23:15:39'),
('c674ad6bad171e46eae74135cf93cdd5dfcd5a78bfcb7de9fc724a1bd8542058892e3b79f20c4278', 1, 1, 'authToken', '[]', 0, '2022-02-15 20:15:54', '2022-02-15 20:15:54', '2023-02-15 23:15:54'),
('e48bdab1f7ed1f5b91558e85780fd25e7bad425d1363c132612a2dc4c8963c478b58b0231ba5ef57', 4, 1, 'authToken', '[]', 0, '2022-02-15 21:03:52', '2022-02-15 21:03:52', '2023-02-16 00:03:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Anonym Upload Personal Access Client', 'sFa231uxfIBrO6PfJQGDv4d3DQR1NlJ7alOjP5Rm', NULL, 'http://localhost', 1, 0, 0, '2022-02-15 10:12:14', '2022-02-15 10:12:14'),
(2, NULL, 'Anonym Upload Password Grant Client', 'W4OHobYPKuT7AcuMWJBfykvxllEXg5AvFeHqgHSz', 'users', 'http://localhost', 0, 1, 0, '2022-02-15 10:12:14', '2022-02-15 10:12:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-15 10:12:14', '2022-02-15 10:12:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paylasimlars`
--

CREATE TABLE `paylasimlars` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `baslik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paylasim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `puanlars`
--

CREATE TABLE `puanlars` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `paylasimlars_id` int(11) NOT NULL,
  `verilen_oy` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room_settings`
--

CREATE TABLE `room_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_setting` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fcgf', 'bozkurt@gmail.com', NULL, '$2y$10$QksRpxk3w7XFhD2aK0INtuNF8NShuON9dLpQBQmEuTS/wXOuNAIO6', NULL, '2022-02-15 20:07:39', '2022-02-15 20:07:39'),
(2, 'bozkurt', 'bozkurt23@gmail.com', NULL, '$2y$10$S74l5YL1W19e1KNF/MrWX.nnWLtXeSVJWO5tsZfmorpqjWfVDyFRy', NULL, '2022-02-15 20:15:38', '2022-02-15 20:15:38'),
(4, 'bozkurt', 'bozkurt1@gmail.com', NULL, '$2y$10$JjX4Ezfu7uLiwyjENdCPpeksTRzVqyNs3eufb/LudIk7LypbVwpxi', NULL, '2022-02-15 21:03:39', '2022-02-15 21:03:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlars`
--

CREATE TABLE `yorumlars` (
  `id` int(10) UNSIGNED NOT NULL,
  `yorum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `global`
--
ALTER TABLE `global`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `global_answers`
--
ALTER TABLE `global_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `global_answers_question_id_foreign` (`question_id`);

--
-- Tablo için indeksler `global_questions`
--
ALTER TABLE `global_questions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `guest_room_messages`
--
ALTER TABLE `guest_room_messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Tablo için indeksler `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Tablo için indeksler `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Tablo için indeksler `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Tablo için indeksler `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `paylasimlars`
--
ALTER TABLE `paylasimlars`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `puanlars`
--
ALTER TABLE `puanlars`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `room_settings`
--
ALTER TABLE `room_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `yorumlars`
--
ALTER TABLE `yorumlars`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `global`
--
ALTER TABLE `global`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Tablo için AUTO_INCREMENT değeri `global_answers`
--
ALTER TABLE `global_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `global_questions`
--
ALTER TABLE `global_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `guest_room_messages`
--
ALTER TABLE `guest_room_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `link`
--
ALTER TABLE `link`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `paylasimlars`
--
ALTER TABLE `paylasimlars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `puanlars`
--
ALTER TABLE `puanlars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `room_settings`
--
ALTER TABLE `room_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlars`
--
ALTER TABLE `yorumlars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `global_answers`
--
ALTER TABLE `global_answers`
  ADD CONSTRAINT `global_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `global_questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
