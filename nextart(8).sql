-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2023 at 08:11 AM
-- Server version: 5.7.40-0ubuntu0.18.04.1
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextart`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `activityable_id` int(11) DEFAULT NULL,
  `activityable_type` varchar(50) DEFAULT NULL,
  `events` varchar(200) NOT NULL,
  `action` varchar(20) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activityable_id`, `activityable_type`, `events`, `action`, `allow_comments`, `comment_count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'App\\Models\\Artist', '4,3,2,1', 'addSong', 1, 0, '2022-07-17 17:09:52', '2022-07-17 17:10:02'),
(5, 1, 1, 'App\\Models\\Artist', '21', 'addSong', 1, 0, '2022-07-18 01:55:27', NULL),
(3, 1, 1, 'App\\Models\\Artist', '20,12', 'addSong', 1, 0, '2022-07-17 21:37:57', '2022-07-17 22:00:27'),
(29, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-07-24 11:20:51', NULL),
(8, 1, 1, 'App\\Models\\Artist', '22', 'addSong', 1, 0, '2022-07-18 12:54:32', NULL),
(19, 1, 1, 'App\\Models\\Artist', '34', 'addSong', 1, 0, '2022-07-21 04:10:14', NULL),
(11, 1, 1, 'App\\Models\\Artist', '23', 'addSong', 1, 0, '2022-07-19 07:58:43', NULL),
(16, 1, 1, 'App\\Models\\Artist', '32,31,30,29,28,27,26,25', 'addSong', 1, 0, '2022-07-20 19:14:26', '2022-07-20 19:24:41'),
(13, 1, 1, 'App\\Models\\Artist', '24', 'addSong', 1, 0, '2022-07-19 14:21:17', NULL),
(21, 1, 1, 'App\\Models\\Artist', '36,35', 'addSong', 1, 0, '2022-07-21 07:22:28', '2022-07-21 07:22:31'),
(28, 1, 1, 'App\\Models\\Artist', '40,38,39', 'addSong', 1, 0, '2022-07-24 11:20:23', '2022-07-24 11:20:28'),
(24, 1, 1, 'App\\Models\\Artist', '37', 'addSong', 1, 0, '2022-07-24 06:53:18', NULL),
(32, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-08-03 08:00:37', NULL),
(31, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-07-25 15:42:09', NULL),
(30, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-07-24 14:48:17', NULL),
(33, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-08-09 15:15:41', '2022-08-09 15:18:27'),
(34, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-08-31 05:31:15', NULL),
(35, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-08-31 17:26:34', NULL),
(36, 1, 38, 'App\\Models\\Song', '38', 'playSong', 1, 0, '2022-09-01 16:11:29', NULL),
(37, 14, 2, 'App\\Models\\Artist', '43', 'addSong', 1, 0, '2022-11-24 13:40:33', NULL),
(38, 14, 43, 'App\\Models\\Song', '43', 'playSong', 1, 0, '2022-11-24 13:40:58', '2022-11-24 14:19:44'),
(39, 14, 2, 'App\\Models\\Artist', '44', 'addSong', 1, 0, '2022-11-24 23:33:37', NULL),
(40, 14, 43, 'App\\Models\\Song', '43', 'playSong', 1, 0, '2022-11-30 16:37:16', NULL),
(41, 14, 2, 'App\\Models\\Artist', '55,52', 'addSong', 1, 0, '2022-12-10 11:53:45', '2022-12-10 12:03:47'),
(42, 14, 2, 'App\\Models\\Artist', '56', 'addSong', 1, 0, '2022-12-11 14:22:44', NULL),
(43, 14, 2, 'App\\Models\\Artist', '59', 'addSong', 1, 0, '2022-12-11 16:54:59', NULL),
(44, 14, 2, 'App\\Models\\Artist', '60', 'addSong', 1, 0, '2022-12-12 14:11:27', NULL),
(45, 14, 2, 'App\\Models\\Artist', '61', 'addSong', 1, 0, '2022-12-13 15:31:30', NULL),
(46, 14, 2, 'App\\Models\\Artist', '69,68,66,65,64', 'addSong', 1, 0, '2022-12-24 14:32:49', '2022-12-24 16:13:31'),
(47, 14, 2, 'App\\Models\\Artist', '70', 'addSong', 1, 0, '2022-12-28 15:01:38', NULL),
(48, 14, 2, 'App\\Models\\Artist', '1', 'addSong', 1, 0, '2022-12-31 16:19:23', NULL),
(49, 14, 2, 'App\\Models\\Artist', '4', 'addSong', 1, 0, '2023-01-02 17:39:08', NULL),
(51, 14, 2, 'App\\Models\\Artist', '12,11', 'addSong', 1, 0, '2023-01-06 00:02:01', '2023-01-06 01:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `selling` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `title` varchar(255) NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `label` text,
  `language` int(11) DEFAULT NULL,
  `remix_version` varchar(50) DEFAULT NULL,
  `display_artist` int(11) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `second_genre` varchar(50) DEFAULT NULL,
  `group_genre` varchar(50) DEFAULT NULL,
  `patner` text,
  `mood` varchar(50) DEFAULT NULL,
  `artistIds` varchar(50) NOT NULL,
  `primary_artist` text,
  `composer` text,
  `arranger` text,
  `lyricist` text,
  `upc` text,
  `ref` text,
  `grid` text,
  `description` text,
  `price_category` int(11) DEFAULT NULL,
  `access` varchar(191) DEFAULT NULL,
  `released_at` timestamp NULL DEFAULT NULL,
  `copyright` varchar(50) DEFAULT '',
  `license_year` int(11) DEFAULT NULL,
  `license_name` text,
  `recording_year` int(11) DEFAULT NULL,
  `recording_name` text,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `user_id`, `selling`, `price`, `title`, `type`, `label`, `language`, `remix_version`, `display_artist`, `genre`, `second_genre`, `group_genre`, `patner`, `mood`, `artistIds`, `primary_artist`, `composer`, `arranger`, `lyricist`, `upc`, `ref`, `grid`, `description`, `price_category`, `access`, `released_at`, `copyright`, `license_year`, `license_name`, `recording_year`, `recording_name`, `allow_comments`, `comment_count`, `visibility`, `approved`, `paid`, `created_at`, `updated_at`, `inserted_at`) VALUES
(2, 14, 0, '0.00', 'YT Music', 1, 'Aksara', 1, 'Remix', 1, '4', '0', '5', '2,3,4', NULL, '2', 'Anu Band', 'afa', 'h', 'hk', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-31 00:00:00', 'Copyright', 2022, 'jkds', 2022, 'kjns', 1, 0, 1, 1, 1, '2023-01-08 00:00:00', '2022-12-31 16:35:28', '2022-12-31 16:17:49'),
(3, 14, 0, '0.00', 'YT', 1, 'FDA', 1, NULL, 1, '5', '3', '5', NULL, NULL, '2', 'Anu Band', 'FAJK', 'JNKN', 'KJB', NULL, NULL, NULL, NULL, 0, NULL, '2022-12-31 00:00:00', 'Copyright', 2022, 'KN', 2022, 'JKN', 1, 0, 1, 1, 0, '2023-01-08 00:00:00', '2022-12-31 16:24:55', '2022-12-31 16:24:55'),
(16, 14, 0, '0.00', 'fdjl', 1, 'llfjljfl', 1, 'sjfn', 1, '3', '5', '5', '2,3,4', NULL, '2', 'Anu Band', 'sds', 'fdafa', 'fafas', NULL, '424242', NULL, NULL, 3, NULL, '2022-12-10 00:00:00', NULL, 2022, 'copy', 2022, 'jda', 1, 0, 1, 1, 1, '2023-01-14 00:00:00', '2023-01-06 01:09:55', '2023-01-03 16:35:53'),
(17, 14, 0, '0.00', 'csdsd', 1, 'llfjljfl', 1, 'sjfn', 1, '3', '5', NULL, NULL, NULL, '2', 'Anu Band', 'sds', 'fdafa', 'fafas', NULL, 'NEX1671981170', NULL, NULL, 3, NULL, '2022-12-10 00:00:00', '', 2022, 'copy', 2022, 'jda', 1, 0, 1, 1, 0, '2022-12-18 00:00:00', '2023-01-03 16:37:28', '2023-01-03 16:37:28'),
(12, 14, 0, '0.00', 'sdjkdsk', 1, 'llfjljfl', 1, 'sjfn', 1, '3', '5', '5', '2,3,4', NULL, '2', 'Anu Band', 'sds', 'fdafa', 'fafas', NULL, 'NEX1671981170', NULL, NULL, 3, NULL, '2022-12-10 00:00:00', NULL, 2022, 'copy', 2022, 'jda', 1, 0, 1, 1, 1, '2023-01-14 00:00:00', '2023-01-06 01:04:40', '2023-01-02 15:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `album_artist`
--

CREATE TABLE `album_artist` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL,
  `artist_role` varchar(50) NOT NULL,
  `artist_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_artist`
--

INSERT INTO `album_artist` (`id`, `album_id`, `song_id`, `artist_role`, `artist_name`) VALUES
(13, 9, NULL, '3', 'ddd'),
(14, 9, NULL, '1', 'ddda'),
(15, 9, NULL, '1', 'fsfsf'),
(16, 10, NULL, '3', 'ddd'),
(17, 10, NULL, '1', 'ddda'),
(18, 10, NULL, '1', 'fsfsf'),
(19, 11, NULL, '3', 'ddd'),
(20, 11, NULL, '1', 'ddda'),
(21, 11, NULL, '1', 'fsfsf'),
(25, 13, NULL, '3', 'ddd'),
(26, 13, NULL, '1', 'ddda'),
(27, 13, NULL, '1', 'fsfsf'),
(28, 14, NULL, '3', 'ddd'),
(29, 14, NULL, '1', 'ddda'),
(30, 14, NULL, '1', 'fsfsf'),
(31, 15, NULL, '3', 'ddd'),
(32, 15, NULL, '1', 'ddda'),
(33, 15, NULL, '1', 'fsfsf'),
(37, 17, NULL, '3', 'ddd'),
(38, 17, NULL, '1', 'ddda'),
(39, 17, NULL, '1', 'fsfsf'),
(40, 0, 11, '3', 'ddd'),
(41, 0, 11, '1', 'ddda'),
(42, 0, 11, '1', 'fsfsf'),
(43, 12, NULL, '3', 'ddd'),
(44, 12, NULL, '1', 'ddda'),
(45, 12, NULL, '1', 'fsfsf'),
(46, 0, 12, '3', 'ddd'),
(47, 0, 12, '1', 'ddda'),
(48, 0, 12, '1', 'fsfsf'),
(49, 16, NULL, '3', 'ddd'),
(50, 16, NULL, '1', 'ddda'),
(51, 16, NULL, '1', 'fsfsf');

-- --------------------------------------------------------

--
-- Table structure for table `album_songs`
--

CREATE TABLE `album_songs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `priority` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_songs`
--

INSERT INTO `album_songs` (`id`, `song_id`, `album_id`, `priority`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 32767, NULL, NULL),
(12, 12, 16, 32767, NULL, NULL),
(11, 11, 12, 32767, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `album_spotify_logs`
--

CREATE TABLE `album_spotify_logs` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `spotify_id` varchar(30) DEFAULT NULL,
  `artwork_url` varchar(255) DEFAULT NULL,
  `fetched` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_types`
--

CREATE TABLE `album_types` (
  `id` int(255) NOT NULL,
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discover` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_types`
--

INSERT INTO `album_types` (`id`, `priority`, `name`, `min`, `max`, `created_at`, `updated_at`, `discover`) VALUES
(1, 1, 'Single', 1, 1, '2022-12-24 14:05:43', '2022-12-24 14:05:43', 1),
(2, 1, 'LP', 8, 12, '2022-12-24 14:06:42', '2022-12-24 14:06:42', 1),
(3, 1, 'EP', 3, 7, '2022-12-24 14:06:31', '2022-12-24 14:06:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `impression` decimal(10,6) DEFAULT '0.000000',
  `user_id` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `bio` text,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `soundcloud` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `loves` smallint(6) NOT NULL DEFAULT '0',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` smallint(6) DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `impression`, `user_id`, `genre`, `mood`, `bio`, `name`, `location`, `website`, `facebook`, `twitter`, `soundcloud`, `instagram`, `youtube`, `loves`, `allow_comments`, `comment_count`, `visibility`, `verified`, `created_at`, `updated_at`) VALUES
(1, '0.062640', 14, NULL, NULL, NULL, 'Anu Band', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-07-17 17:05:50', '2022-07-20 19:22:51'),
(2, '0.000000', 14, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-10-29 08:02:52', '2022-10-29 08:02:52'),
(3, '0.000000', 15, NULL, NULL, NULL, 'ysgugds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 13:00:29', '2022-12-14 13:00:29'),
(4, '0.000000', 16, NULL, NULL, NULL, 'testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 13:01:47', '2022-12-14 13:01:47'),
(5, '0.000000', 17, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 13:08:17', '2022-12-14 13:08:17'),
(6, '0.000000', 18, NULL, NULL, NULL, 'hahaha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 13:09:26', '2022-12-14 13:09:26'),
(7, '0.000000', 19, NULL, NULL, NULL, 'haha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 13:10:37', '2022-12-14 13:10:37'),
(8, '0.000000', 20, NULL, NULL, NULL, 'haha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 14:20:39', '2022-12-14 14:20:39'),
(9, '0.000000', 21, NULL, NULL, NULL, 'hahaaha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, '2022-12-14 14:22:28', '2022-12-14 14:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `artist_requests`
--

CREATE TABLE `artist_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `artist_name` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `affiliation` varchar(255) DEFAULT NULL,
  `message` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist_requests`
--

INSERT INTO `artist_requests` (`id`, `user_id`, `artist_id`, `artist_name`, `phone`, `ext`, `affiliation`, `message`, `facebook`, `twitter`, `approved`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anu Band', '+1234', NULL, 'Manager', NULL, NULL, NULL, 1, '2022-07-17 17:02:08', '2022-07-17 17:05:50'),
(2, 14, 2, 'test', '089674655', NULL, 'Manager', NULL, NULL, NULL, 0, '2022-10-29 08:02:52', '2022-10-29 08:02:52'),
(3, 15, 3, 'ysgugds', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 13:00:29', '2022-12-14 13:00:29'),
(4, 16, 4, 'testr', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 13:01:47', '2022-12-14 13:01:47'),
(5, 17, 5, 'test', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 13:08:17', '2022-12-14 13:08:17'),
(6, 18, 6, 'hahaha', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 13:09:26', '2022-12-14 13:09:26'),
(7, 19, 7, 'haha', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 13:10:37', '2022-12-14 13:10:37'),
(8, 20, 8, 'haha', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 14:20:39', '2022-12-14 14:20:39'),
(9, 21, 9, 'hahaaha', NULL, NULL, 'Artist/Band Member', NULL, NULL, NULL, 0, '2022-12-14 14:22:28', '2022-12-14 14:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `artist_spotify_logs`
--

CREATE TABLE `artist_spotify_logs` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `spotify_id` varchar(30) DEFAULT NULL,
  `artwork_url` varchar(255) DEFAULT NULL,
  `fetched` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis` text NOT NULL,
  `value` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = success, 1 =pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `user_id`, `jenis`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 'Royalti Spotify', 0.000520486, 0, '2023-01-05 15:47:33', '2023-01-05 15:47:33'),
(2, 14, 'Royalti Spotify', 0.000058812, 0, '2023-01-05 15:47:33', '2023-01-05 15:47:33'),
(6, 14, 'Withdraw royalti', -0.001, 1, '2023-01-05 16:02:18', '2023-01-05 16:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason` text,
  `ip` varchar(46) DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` smallint(6) NOT NULL,
  `banner_tag` varchar(255) NOT NULL,
  `skippable` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `code` text,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `short_place` tinyint(1) NOT NULL DEFAULT '0',
  `bstick` tinyint(1) NOT NULL DEFAULT '0',
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `category` varchar(255) DEFAULT NULL,
  `group_level` varchar(100) NOT NULL DEFAULT 'all',
  `started_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `fpage` tinyint(1) NOT NULL DEFAULT '0',
  `innews` tinyint(1) NOT NULL DEFAULT '0',
  `device_level` varchar(10) NOT NULL DEFAULT '',
  `allow_views` tinyint(1) NOT NULL DEFAULT '0',
  `max_views` int(11) NOT NULL DEFAULT '0',
  `allow_counts` tinyint(1) NOT NULL DEFAULT '0',
  `max_counts` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `rubric` mediumint(9) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_tag`, `skippable`, `description`, `code`, `approved`, `short_place`, `bstick`, `main`, `category`, `group_level`, `started_at`, `ended_at`, `fpage`, `innews`, `device_level`, `allow_views`, `max_views`, `allow_counts`, `max_counts`, `views`, `clicks`, `rubric`, `created_at`, `updated_at`, `type`) VALUES
(2, 'header', 1, 'Top banner', '<div class=\"header-ad\">\n<a href=\"http://NextArt.id\" target=\"_blank\"><img src=\"https://user-images.githubusercontent.com/63708869/97975081-20d8ad80-1dfb-11eb-8ffe-ba78c4fa9000.png\" alt=\"\"></a>\n</div>', 1, 0, 0, 0, '', 'all', '2020-09-08 13:48:00', '2020-12-31 13:46:00', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '2020-09-07 13:48:00', '2020-11-03 10:36:54', 0),
(3, 'footer', 1, 'Footer ad', '<div class=\"footer-ad\">\n<a href=\"http://NextArt.id\" target=\"_blank\"><img src=\"https://user-images.githubusercontent.com/63708869/93670112-d5747500-fac2-11ea-8bdf-56427ed7d2a2.jpg\" alt=\"\"></a>\n</div>', 1, 0, 0, 0, NULL, 'all', '2020-11-01 16:58:00', '2026-11-26 16:59:00', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '2020-11-03 09:59:26', '2020-11-03 10:18:16', 0),
(4, 'sidebar', 1, 'Sidebar ad', '<div class=\"sidebar-ad\">\n<a href=\"http://NextArt.id\" target=\"_blank\"><img src=\"https://user-images.githubusercontent.com/63708869/97974829-bf184380-1dfa-11eb-9ad5-8849be2e2d9d.jpeg\" alt=\"\"></a>\n</div>', 1, 0, 0, 0, NULL, 'all', '2020-11-01 17:03:00', '2025-11-01 17:03:00', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '2020-11-03 10:04:00', '2020-11-03 10:34:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_tracks`
--

CREATE TABLE `banner_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country_code` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_storage`
--

CREATE TABLE `cart_storage` (
  `id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` mediumint(9) NOT NULL,
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `posi` mediumint(9) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `news_sort` varchar(10) DEFAULT NULL,
  `news_msort` varchar(4) DEFAULT NULL,
  `news_number` smallint(6) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `show_sub` tinyint(1) NOT NULL DEFAULT '0',
  `allow_rss` tinyint(1) NOT NULL DEFAULT '1',
  `disable_search` tinyint(1) NOT NULL DEFAULT '0',
  `disable_main` tinyint(1) NOT NULL DEFAULT '0',
  `disable_comments` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `priority` smallint(6) NOT NULL DEFAULT '0',
  `attraction` varchar(191) NOT NULL DEFAULT 'latest',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alt_name` varchar(255) NOT NULL,
  `object_ids` varchar(255) DEFAULT NULL,
  `object_type` varchar(20) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `allow_home` tinyint(1) NOT NULL DEFAULT '0',
  `allow_discover` tinyint(1) NOT NULL DEFAULT '0',
  `allow_radio` tinyint(1) NOT NULL DEFAULT '0',
  `allow_community` tinyint(1) NOT NULL DEFAULT '0',
  `allow_podcasts` tinyint(1) NOT NULL DEFAULT '0',
  `allow_trending` tinyint(1) NOT NULL DEFAULT '0',
  `genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `radio` varchar(50) DEFAULT NULL,
  `podcast` varchar(50) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `allow_videos` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` char(35) NOT NULL,
  `country_code` char(3) NOT NULL,
  `district` char(20) DEFAULT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `collectionable_id` int(11) NOT NULL,
  `collectionable_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` smallint(5) UNSIGNED DEFAULT NULL,
  `reply_count` mediumint(9) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `edited` tinyint(4) NOT NULL DEFAULT '0',
  `ip` varchar(46) DEFAULT NULL,
  `reaction_count` mediumint(9) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` char(3) NOT NULL DEFAULT '',
  `name` char(52) NOT NULL DEFAULT '',
  `continent` varchar(50) DEFAULT NULL,
  `region_id` mediumint(9) DEFAULT NULL,
  `local_name` char(45) NOT NULL DEFAULT '',
  `government_form` char(45) NOT NULL DEFAULT '',
  `code2` char(2) NOT NULL DEFAULT '',
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countrylanguage`
--

CREATE TABLE `countrylanguage` (
  `id` int(11) NOT NULL,
  `country_code` char(3) NOT NULL DEFAULT '',
  `name` char(30) NOT NULL DEFAULT '',
  `is_official` enum('T','F') NOT NULL DEFAULT 'F',
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `use_count` int(11) NOT NULL DEFAULT '0',
  `usage_limit` int(11) DEFAULT NULL,
  `minimum_spend` int(11) DEFAULT NULL,
  `maximum_spend` int(11) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `description`, `amount`, `use_count`, `usage_limit`, `minimum_spend`, `maximum_spend`, `access`, `approved`, `created_at`, `updated_at`, `expired_at`) VALUES
(1, 'potongan', 'fixed', 'Diskon potongan 10.000 setiap upload lagu', NULL, 0, 100, 10000, NULL, NULL, 1, '2022-07-23 09:06:10', '2022-12-11 17:14:50', '2022-12-31 16:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `type`, `description`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'resetPassword', 'Configure e-mail message that is sent to recover the forgotten password', 'Reset your password', '<p>Dear {{name}},</p>\r\n<p>Please <a href=\"{{resetLink}}\">click here</a> to reset your password.</p>\r\n<p>If you are not able to click on link please copy and paste: {{resetLink}} in your browser.</p>\r\n<p>Regards,</p>\r\n<p>NextArt Team.</p>', NULL, '2022-07-22 13:23:46'),
(2, 'verifyAccount', 'Configure e-mail message that is sent to activate your account', '{{name}}! Verify your account', '<div>Dear {{name}},</div>\r\n<div>&nbsp;</div>\r\n<div>You&rsquo;re almost there. Confirm your account below to finish creating your account.</div>\r\n<div>Please&nbsp;<a href=\"{{validationLink}}\" data-name=\"Apple Music Toolbox\" data-type=\"url\">click here</a>&nbsp;to confirm your account.</div>\r\n<div>&nbsp;</div>\r\n<div>If you are not able to click on link please copy and paste: {{validationLink}} in your browser.</div>\r\n<div>&nbsp;</div>\r\n<div>Regards,</div>\r\n<div>NextArt Team.</div>', NULL, '2022-07-22 13:24:01'),
(3, 'newUser', 'Configure e-mail message that is sent to welcome new user', 'Welcome, We\'re so Glad You\'re Here', '<p>{{name}}, Welcome to NiNa Sound</p>\r\n<p>Play and discover music you love on your phone for FREE.</p>\r\n<p>Regards,</p>\r\n<p>NextArt Team.</p>', NULL, '2022-07-22 13:24:10'),
(4, 'approvedArtist', 'Configure e-mail message that is sent to welcome new artist', 'Your claiming to access artist has been approved!', '<p>Your claiming to access artist has been approved!</p>\r\n<p>Hi {{name}},</p>\r\n<p>Congratulations! Your claming to access artist \"{{artist_name}}\" has been approved.</p>\r\n<p>To start uploading songs/albums, get logging in to your account you will see a new menu Aritst/Band Management right on your account profile.</p>\r\n<p>Regards,</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:24:20'),
(5, 'rejectedArtist', 'Configure e-mail message that is sent when an artist claim request has been rejected', 'You claiming request has been rejected', '<p>Hi, {{name}}</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you for your submission. We have completed our review of your claming for accessing the artist \"{{artist_name}}\".</p>\r\n<p>After carefully review we are deceived to not accept your request&nbsp; and you won\'t be able to re-claim this artist again.</p>\r\n<p>{{comment}}</p>\r\n<p>Thank for every!</p>\r\n<p>All the best!</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:24:33'),
(6, 'subscribePlaylist', 'Configure e-mail message that when some one subscribe a playlist', '{{friendName}} just subscribed your playlist', '<p>Hi {{name}}</p>\n<p>{{friendName}} just subscribed your playlist.</p>', NULL, '2020-09-07 07:24:23'),
(7, 'shareMedia', 'Configure e-mail message that when some one share media', '{{friendName}} just shared something with you.', '<p>H, {{name}}</p>\n<p>{{friendName}} just shared something with you.</p>', NULL, '2020-09-07 07:25:06'),
(8, 'followUser', 'Configure e-mail message that when people following each other', '{{friendName}} is now following you', '<p>Hi {{name}}</p>\n<p>{{friendName}} is now following you</p>', NULL, '2020-09-07 07:25:34'),
(9, 'newComment', 'Configure e-mail message that is sent when a new comment is posted on the site', 'New comment has been posted', '<p>Dear Admin,</p>\r\n<p>The comment for the article that you have subscribed to was added on your site</p>\r\n<p>------------------------------------------------</p>\r\n<p><strong>Summary of the comment</strong></p>\r\n<p>------------------------------------------------</p>\r\n<p>Author: {{name}}</p>\r\n<p>Author username: {{username}}</p>\r\n<p>Date: {{created_at}}</p>\r\n<p>Link to the object: <a href=\"{{url}}\" target=\"_blank\" rel=\"noopener\">{{url<span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">}}</span></a></p>\r\n<p>------------------------------------------------</p>\r\n<p><strong>Comment text</strong></p>\r\n<p>------------------------------------------------</p>\r\n<p>{{text}}</p>\r\n<p>------------------------------------------------</p>\r\n<p>&nbsp;</p>\r\n<p>NextArt Team</p>', '2019-08-20 17:00:00', '2022-07-22 13:37:45'),
(10, 'approvedSong', 'Configure e-mail message that is sent when a song has been approved', 'Your song, {{title}}, has been approved', '<p>Your song has been approved!</p>\r\n<p>Hi {{name}},</p>\r\n<p>Congratulations! Your song \"{{title}}\" has been approved. You can view it online here:</p>\r\n<p><a href=\"{{url}}\" target=\"_blank\" rel=\"noopener\">{{url}}</a></p>\r\n<p>Thanks for your high quality submission. Keep up the awesome work!</p>\r\n<p>Regards,</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:38:01'),
(11, 'approvedAlbum', 'Configure e-mail message that is sent when an album has been approved', 'Your album, {{title}}, has been approved!', '<p>Your album has been approved!</p>\r\n<p>Hi {{name}},</p>\r\n<p>Congratulations! Your album&nbsp;\"{{title}}\" has been approved. You can view it online here:</p>\r\n<p><a href=\"{{url}}\" target=\"_blank\" rel=\"noopener\">{{url}}</a></p>\r\n<p>Thanks for your high quality submission. Keep up the awesome work!</p>\r\n<p>Regards,</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:38:16'),
(12, 'rejectedSong', 'Configure e-mail message that is sent when a song has been rejected', 'Your song, {{title}}, has been rejected', '<p>Hi, {{name}}</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you for your submission. We have completed our review of \"{{title}},\" and unfortunately we found it isn\'t at the quality standard required to move forward, and you won\'t be able to re-submit this song again.</p>\r\n<p>{{comment}}</p>\r\n<p>We appreciate the effort and time you\'ve put into creating your song. And we\'d be happy to help make sure your next entry will meet our submission requirements. Here\'s our advice:</p>\r\n<p>Visit our forums and ask fellow authors for feedback. Our helpful community will be glad to lend a hand.</p>\r\n<p>Check out this Help Centre article to understand why and how items get rejected.</p>\r\n<p>We hope to see a new submission from you soon!</p>\r\n<p>All the best!</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:38:33'),
(13, 'rejectedAlbum', 'Configure e-mail message that is sent when an album has been rejected', 'Your album, {{title}}, has been rejected', '<p>Hi, {{name}}</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you for your submission. We have completed our review of \"{{title}},\" and unfortunately we found it isn\'t at the quality standard required to move forward, and you won\'t be able to re-submit this album again.</p>\r\n<p>{{comment}}</p>\r\n<p>We appreciate the effort and time you\'ve put into creating your song. And we\'d be happy to help make sure your next entry will meet our submission requirements. Here\'s our advice:</p>\r\n<p>Visit our forums and ask fellow authors for feedback. Our helpful community will be glad to lend a hand.</p>\r\n<p>Check out this Help Centre article to understand why and how items get rejected.</p>\r\n<p>We hope to see a new submission from you soon!</p>\r\n<p>All the best!</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:38:50'),
(14, 'subscriptionReceipt', 'Configure e-mail message that is sent when a subscription has been placed.', 'Your receipt from ?? #{{receipt_id}}', '<div style=\"margin: 0; padding: 0; border: 0; background-color: #f1f5f9; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; min-width: 100%!important; width: 100%!important;\">\r\n<div style=\"display: none!important; max-height: 0; max-width: 0; overflow: hidden; color: #ffffff; font-size: 1px; line-height: 1px; opacity: 0;\">&nbsp;</div>\r\n<div style=\"min-width: 100%; width: 100%; background-color: #f1f5f9;\">\r\n<table class=\"m_-8504956366380948631Wrapper\" style=\"border: 0; border-collapse: collapse; margin: 0 auto!important; padding: 0; max-width: 600px; min-width: 600px; width: 600px;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\">\r\n<table class=\"m_-8504956366380948631Divider--kill\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<div style=\"border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\">\r\n<table class=\"m_-8504956366380948631Section m_-8504956366380948631Header\" dir=\"ltr\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; width: 100%;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Header-left m_-8504956366380948631Target\" style=\"background-color: #e23136; border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-size: 30px; line-height: 156px; background-size: 100% 100%; border-top-left-radius: 5px; color: white; text-align: center;\" align=\"right\" valign=\"bottom\" width=\"100%\" height=\"156\">NEXTART.ID</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; height: 59px; width: 100%;\" width=\"100%\">\r\n<tbody>\r\n<tr style=\"height: 59px;\">\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 59px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 472px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #32325d; font-size: 24px; line-height: 32px; height: 59px;\" align=\"center\">Receipt from</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 59px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; width: 472px; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #8898aa; font-size: 15px; line-height: 18px;\" align=\"center\"><span class=\"il\">Invoice</span> #{{invoice_id}}</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; height: 18px; width: 100%;\" width=\"100%\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 18px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 472px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #8898aa; font-size: 15px; line-height: 18px; height: 18px;\" align=\"center\">Receipt #{{receipt_id}}</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 18px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"24\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff; width: 100%;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; width: 472px;\">\r\n<table style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; width: 100%;\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631DataBlocks-item\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\" valign=\"top\">\r\n<table style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; white-space: nowrap; font-weight: bold; text-transform: uppercase;\">Amount paid</td>\r\n</tr>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; white-space: nowrap;\">{{currency}}{{amount}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"m_-8504956366380948631DataBlocks-spacer\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631DataBlocks-item\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\" valign=\"top\">\r\n<table style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 94px;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; white-space: nowrap; font-weight: bold; text-transform: uppercase; width: 94px;\">Date paid</td>\r\n</tr>\r\n<tr>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; white-space: nowrap; width: 94px;\">{{issued_date}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"m_-8504956366380948631DataBlocks-spacer\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631DataBlocks-item\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\" valign=\"top\">\r\n<table style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; white-space: nowrap; font-weight: bold; text-transform: uppercase;\">Payment method</td>\r\n</tr>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; white-space: nowrap;\">{{payment_gate}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"32\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; height: 28px;\">\r\n<tbody>\r\n<tr style=\"height: 16px;\">\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 64px;\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 472px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; font-weight: bold; text-transform: uppercase; height: 16px;\">Summary</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 64px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 12px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 12px; width: 600px;\" colspan=\"3\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Spacer--kill\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; width: 472px;\">\r\n<table style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 100%; background-color: #f6f9fc; border-radius: 4px; height: 345px;\">\r\n<tbody>\r\n<tr style=\"height: 4px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 4px;\" colspan=\"3\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 331px;\">\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 331px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Table-content\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 432px; height: 331px;\">\r\n<table class=\"m_-8504956366380948631Table-rows\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; height: 339px;\" width=\"432\">\r\n<tbody>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 16px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; font-weight: bold; text-transform: uppercase; height: 16px; width: 367px;\">{{issued_date}} &ndash; {{next_billing}}</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 8px;\">&nbsp;</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 57px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 10px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 10px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; word-break: break-word; height: 24px; width: 367px;\">{{plan}} {{currency}}{{plan_price}} / {{plan_frequency}}&nbsp;<span class=\"m_-8504956366380948631Content\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; color: #8898aa; font-size: 14px; line-height: 14px;\"> &times; 1</span></td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 24px; width: 8px;\">&nbsp;</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; height: 24px; width: 57px;\" align=\"right\" valign=\"top\">{{currency}}{{amount}}</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 10px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 10px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 1px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 1px; width: 432px;\" colspan=\"3\" bgcolor=\"e6ebf1\" height=\"1\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; font-weight: 500; height: 24px; width: 367px;\">Subtotal</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 24px; width: 8px;\">&nbsp;</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; font-weight: 500; height: 24px; width: 57px;\" align=\"right\" valign=\"top\">{{currency}}{{amount}}</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; font-weight: bold; height: 24px; width: 367px;\">Amount paid</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 24px; width: 8px;\">&nbsp;</td>\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #525f7f; font-size: 15px; line-height: 24px; font-weight: bold; height: 24px; width: 57px;\" align=\"right\" valign=\"top\">{{currency}}{{amount}}</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 1px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 1px; width: 432px;\" colspan=\"3\" bgcolor=\"e6ebf1\" height=\"1\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 6px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 6px; width: 432px;\" colspan=\"3\" height=\"6\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 331px;\" width=\"20\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 10px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 10px;\" colspan=\"3\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"m_-8504956366380948631Spacer--kill\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"44\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" bgcolor=\"e6ebf1\" height=\"1\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; height: 32px; width: 100%;\" width=\"100%\">\r\n<tbody>\r\n<tr style=\"height: 32px;\">\r\n<td style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 32px;\" height=\"32\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #ffffff; height: 16px;\">\r\n<tbody>\r\n<tr style=\"height: 16px;\">\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 64px;\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; width: 472px; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Ubuntu, sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px; height: 16px;\">If you have any questions, please send an email to info@nextart.id. We\'ll get back to you as soon as we can.</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0px; border-collapse: collapse; margin: 0px; padding: 0px; color: #ffffff; font-size: 1px; line-height: 1px; height: 16px; width: 64px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff;\">\r\n<tbody>\r\n<tr>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n<td class=\"m_-8504956366380948631Content\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; width: 472px; font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Ubuntu,sans-serif; vertical-align: middle; color: #8898aa; font-size: 12px; line-height: 16px;\">You\'re receiving this email because you made a purchase for a subscription plan on Music Engine.</td>\r\n<td class=\"m_-8504956366380948631Spacer--gutter\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" width=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"m_-8504956366380948631Section m_-8504956366380948631Section--last\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; background-color: #ffffff; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"64\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<table class=\"m_-8504956366380948631Divider--kill\" style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0;\" width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: 0; border-collapse: collapse; margin: 0; padding: 0; color: #ffffff; font-size: 1px; line-height: 1px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<div class=\"yj6qo\">&nbsp;</div>\r\n<div class=\"adL\">&nbsp;</div>\r\n</div>', NULL, '2022-07-22 13:39:42'),
(15, 'feedback', 'Configure e-mail message that is sent via the feedback form', 'New feedback', '<p>Dear webmaster</p>\r\n<p>&nbsp;</p>\r\n<p>{{email}} has sent this letter.</p>\r\n<p>He is feeling: {{feeling}}</p>\r\n<p>Email is about: {{about}}</p>\r\n<p>------------------------------------------------</p>\r\n<p>Message text</p>\r\n<p>------------------------------------------------</p>\r\n<p>{{comment}}</p>\r\n<p>------------------------------------------------</p>\r\n<p>&nbsp;</p>\r\n<p>IP address of the sender: {{ip}}</p>\r\n<p>Email: {{email}}</p>\r\n<p>&nbsp;</p>\r\n<p>Sincerely,</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:39:56'),
(16, 'paymentHasBeenPaid', 'Configure e-mail message that is sent to an artist about their payment\'s request has been approved', 'We recently sent you a payment', '<h1>We sent you money!</h1>\r\n<p>Hi {{name}},</p>\r\n<p>We just processed your payout for {{amount}}.</p>\r\n<p>Happy Spending!.</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:40:11'),
(17, 'paymentHasBeenDeclined', 'Configure e-mail message that is sent to an artist about their payment has been rejected', 'Your payout was rejected', '<p>Your payout was rejected!</p>\r\n<p>Hi {{name}},</p>\r\n<p>Unfortunately your payout was rejected.</p>\r\n<p>If you have any questions, please contact support!</p>\r\n<p>NextArt Team</p>', NULL, '2022-07-22 13:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `season` mediumint(9) DEFAULT NULL,
  `number` mediumint(9) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `hls` tinyint(1) DEFAULT NULL,
  `mp3` tinyint(1) DEFAULT NULL,
  `podcast_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `access` varchar(255) DEFAULT NULL,
  `explicit` tinyint(1) NOT NULL DEFAULT '0',
  `stream_url` varchar(255) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `allow_download` tinyint(1) NOT NULL DEFAULT '0',
  `download_count` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  `play_count` int(11) NOT NULL DEFAULT '0',
  `failed_count` int(11) NOT NULL DEFAULT '0',
  `duration` mediumint(9) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `pending` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plays` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_royaltis`
--

CREATE TABLE `file_royaltis` (
  `id` bigint(20) NOT NULL,
  `nama_file` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_royaltis`
--

INSERT INTO `file_royaltis` (`id`, `nama_file`, `note`, `created_at`, `updated_at`) VALUES
(1, 'contoh file yang akan diimport.csv', '31-12-2022', '2022-12-31 16:41:14', '2022-12-31 16:41:14'),
(2, 'royalties.1672327287_Confirm.csv', '2023-01-05', '2023-01-05 15:47:28', '2023-01-05 15:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `free_songs`
--

CREATE TABLE `free_songs` (
  `id` int(255) NOT NULL,
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `min` int(11) NOT NULL,
  `free` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discover` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `free_songs`
--

INSERT INTO `free_songs` (`id`, `priority`, `name`, `min`, `free`, `created_at`, `updated_at`, `discover`) VALUES
(4, 1, 'Free 1 Song', 2, 1, '2022-12-27 17:00:40', '2022-12-28 14:49:39', 1),
(5, 1, 'Free 2 Song', 12, 2, '2022-12-27 17:00:57', '2022-12-27 17:02:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` mediumint(9) NOT NULL,
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discover` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `parent_id`, `priority`, `name`, `alt_name`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `discover`) VALUES
(3, 0, 1, 'Alternative/Experimental', 'alternative-experimental', NULL, NULL, NULL, '', '2022-07-21 00:18:27', '2022-07-21 00:18:27', 1),
(4, 0, 1, 'Alternative/Indie Pop', 'alternative-indie-pop', NULL, NULL, NULL, '', '2022-07-21 00:19:22', '2022-07-21 00:19:22', 1),
(5, 0, 1, 'Alternative/Gothic', 'alternative-gothic', NULL, NULL, NULL, '', '2022-07-21 00:23:37', '2022-07-21 00:23:37', 1),
(6, 0, 1, 'Alternative/Grunge', 'alternative-grunge', NULL, NULL, NULL, '', '2022-07-21 00:24:15', '2022-07-21 00:24:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_genres`
--

CREATE TABLE `group_genres` (
  `id` int(255) NOT NULL,
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discover` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_genres`
--

INSERT INTO `group_genres` (`id`, `priority`, `name`, `created_at`, `updated_at`, `discover`) VALUES
(5, 1, 'Dangdut', '2022-12-27 15:47:51', '2022-12-27 15:47:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hash_tags`
--

CREATE TABLE `hash_tags` (
  `id` int(11) NOT NULL,
  `hashable_id` int(11) NOT NULL DEFAULT '0',
  `hashable_type` varchar(50) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `historyable_id` int(11) NOT NULL,
  `historyable_type` varchar(50) NOT NULL,
  `ownerable_type` varchar(50) DEFAULT NULL,
  `ownerable_id` int(11) DEFAULT NULL,
  `interaction_count` mediumint(9) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `historyable_id`, `historyable_type`, `ownerable_type`, `ownerable_id`, `interaction_count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 3, '2022-07-17 17:10:31', '2022-07-17 17:25:28'),
(2, 1, 2, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 1, '2022-07-17 17:10:58', '2022-07-17 17:10:58'),
(3, 1, 3, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-17 17:14:40', '2022-07-17 17:28:12'),
(4, 1, 20, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 1, '2022-07-17 22:00:39', '2022-07-17 22:00:39'),
(5, 1, 21, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-18 01:55:36', '2022-07-18 12:54:11'),
(6, 1, 22, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-18 19:11:35', '2022-07-19 00:52:13'),
(7, 1, 23, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-19 12:17:59', '2022-07-19 14:14:29'),
(8, 1, 24, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 3, '2022-07-19 14:21:48', '2022-07-20 12:29:10'),
(9, 1, 31, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 1, '2022-07-20 19:22:51', '2022-07-20 19:22:51'),
(10, 1, 32, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 1, '2022-07-20 19:25:21', '2022-07-20 19:25:21'),
(11, 1, 34, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 3, '2022-07-21 04:10:37', '2022-07-24 09:55:52'),
(12, 2, 34, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-21 09:49:36', '2022-07-21 09:56:26'),
(13, 4, 37, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 1, '2022-07-24 07:01:11', '2022-07-24 07:01:11'),
(14, 1, 37, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 2, '2022-07-24 07:47:16', '2022-07-24 09:55:46'),
(15, 1, 35, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 4, '2022-07-24 09:55:00', '2022-07-24 11:08:31'),
(16, 1, 36, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 4, '2022-07-24 09:55:28', '2022-07-24 11:10:03'),
(17, 1, 38, 'App\\Models\\Song', 'App\\Models\\Artist', 1, 10, '2022-07-24 11:20:51', '2022-09-01 16:11:29'),
(18, 14, 43, 'App\\Models\\Song', 'App\\Models\\Artist', 2, 6, '2022-11-24 13:40:58', '2022-11-30 16:37:16'),
(19, 14, 10, 'App\\Models\\Song', 'App\\Models\\Artist', 2, 1, '2023-01-02 23:55:54', '2023-01-02 23:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language`, `created_at`, `updated_at`) VALUES
(1, NULL, 'en', '2021-06-22 22:29:27', '2021-06-22 22:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE `love` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loveable_id` int(11) NOT NULL,
  `loveable_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lyrics`
--

CREATE TABLE `lyrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `song_id` int(11) NOT NULL,
  `lyrics` text COLLATE utf8mb4_unicode_ci,
  `approved` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(90, 'App\\Models\\Album', 9, '9a521f4d-0a69-40ba-be6f-40a73dc02595', 'artwork', 'media-libraryCWzuSs', '1658762753.jpg', 'image/jpeg', 'public', 'public', 20449, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 17, '2022-07-25 15:25:53', '2022-07-25 15:25:53'),
(89, 'App\\Models\\Album', 8, '936a813b-b0e2-44cd-adf4-f89fba1977d3', 'artwork', 'media-libraryGmkqkY', '1658674309.jpg', 'image/jpeg', 'public', 'public', 60786, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 16, '2022-07-24 14:51:49', '2022-07-24 14:51:49'),
(88, 'App\\Models\\Song', 40, '0be4949b-cc5c-47d6-a6d2-03089e918bff', 'audio', 'phpa83wYX', '4zRE0kvxpO.mp3', 'audio/mpeg', 'public', 'public', 5260614, '[]', '{\"bitrate\":160}', '[]', 15, '2022-07-24 11:20:20', '2022-07-24 11:20:20'),
(87, 'App\\Models\\Song', 40, '594dfc7b-88e5-42b4-9f17-08c1b2f7814d', 'artwork', 'media-librarySGVZiI', 'VdhfnTMrax.jpg', 'image/jpeg', 'public', 'public', 38979, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 14, '2022-07-24 11:20:19', '2022-07-24 11:20:19'),
(82, 'App\\Models\\Album', 7, '0ccae62b-3519-499e-b5f6-14bc8d1fd39c', 'artwork', 'media-libraryE3etad', '1658661593.jpg', 'image/jpeg', 'public', 'public', 11107, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 9, '2022-07-24 11:19:53', '2022-07-24 11:19:53'),
(83, 'App\\Models\\Song', 38, '2a54f3cb-b080-4416-9e61-2c0177c88d79', 'artwork', 'media-librarynyONqr', 'Ythda7mro6.jpg', 'image/jpeg', 'public', 'public', 29068, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 10, '2022-07-24 11:20:13', '2022-07-24 11:20:13'),
(84, 'App\\Models\\Song', 39, '6410b7c8-edc5-4b7d-a6a9-e36405f25586', 'artwork', 'media-librarymWKTYG', 'vv3hGDMqEO.jpg', 'image/jpeg', 'public', 'public', 34505, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 11, '2022-07-24 11:20:13', '2022-07-24 11:20:13'),
(85, 'App\\Models\\Song', 38, 'b169ebb6-dd40-40f5-b8d5-621261b0bc62', 'audio', 'phpS2ZoJV', 'K7bKc2Qlnc.mp3', 'audio/mpeg', 'public', 'public', 4607879, '[]', '{\"bitrate\":128}', '[]', 12, '2022-07-24 11:20:15', '2022-07-24 11:20:15'),
(86, 'App\\Models\\Song', 39, '162d2cec-ca76-495d-b261-773b4d0b3652', 'audio', 'phpwVTIfb', 'ASgU2E1WDd.mp3', 'audio/mpeg', 'public', 'public', 4372697, '[]', '{\"bitrate\":160}', '[]', 13, '2022-07-24 11:20:15', '2022-07-24 11:20:15'),
(140, 'App\\Models\\Patner', 4, '14a5329e-100e-42f6-b004-a6c021a3c517', 'artwork', 'media-libraryZklyDM', '1670770715.jpg', 'image/jpeg', 'public', 'public', 412197, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 60, '2022-12-11 14:58:35', '2022-12-11 14:58:36'),
(69, 'App\\Models\\Genre', 3, '5809ce37-3c00-40bd-8894-3f02eae3440d', 'artwork', 'media-libraryWs4mCV', '1658362707.jpg', 'image/jpeg', 'public', 'public', 7500, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 5, '2022-07-21 00:18:27', '2022-07-21 00:18:27'),
(70, 'App\\Models\\Genre', 4, '5050f066-0fe3-43fd-9dc6-f164a53e07aa', 'artwork', 'media-library4nIzRa', '1658362762.jpg', 'image/jpeg', 'public', 'public', 7500, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 6, '2022-07-21 00:19:22', '2022-07-21 00:19:22'),
(71, 'App\\Models\\Genre', 5, 'efa2bc24-b429-48fd-9bbd-9c84fe5e52b1', 'artwork', 'media-libraryaWXlsU', '1658363017.jpg', 'image/jpeg', 'public', 'public', 7500, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 7, '2022-07-21 00:23:37', '2022-07-21 00:23:38'),
(43, 'App\\Models\\Genre', 1, '05f93e11-f050-4e88-ba3d-4ee181362a15', 'artwork', 'media-libraryWYiCjl', '1658149362.jpg', 'image/jpeg', 'public', 'public', 103369, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 3, '2022-07-18 13:02:42', '2022-07-18 13:02:42'),
(72, 'App\\Models\\Genre', 6, 'bcc58fd1-f49a-4d5e-ab2e-cd4e4b491b17', 'artwork', 'media-libraryUN9BPO', '1658363055.jpg', 'image/jpeg', 'public', 'public', 7500, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 8, '2022-07-21 00:24:15', '2022-07-21 00:24:15'),
(91, 'App\\Models\\Playlist', 2, 'fc00830e-dd75-405a-a0f5-71e6c249b12c', 'artwork', 'media-libraryglVjSn', '1661338294.jpg', 'image/jpeg', 'public', 'public', 71741, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 18, '2022-08-24 10:51:34', '2022-08-24 10:51:34'),
(92, 'App\\Models\\Playlist', 3, 'f4e2f0f1-b48b-4691-bf40-a5edd214c4ef', 'artwork', 'media-libraryo1Nddk', '1661338525.jpg', 'image/jpeg', 'public', 'public', 54762, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 19, '2022-08-24 10:55:25', '2022-08-24 10:55:26'),
(93, 'App\\Models\\Song', 41, 'c2ce370f-f1fa-4cb1-ac60-d61341a61f2d', 'artwork', 'media-libraryjIWNQf', 'EMtntnAlhG.jpg', 'image/jpeg', 'public', 'public', 49524, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 20, '2022-09-01 16:09:32', '2022-09-01 16:09:33'),
(94, 'App\\Models\\Song', 41, 'b7103937-7ce5-4c44-b43c-9de31bd54158', 'audio', 'php1UP6wa', 'OKOj4ZSVpk.mp3', 'audio/mpeg', 'public', 'public', 4273981, '[]', '{\"bitrate\":128}', '[]', 21, '2022-09-01 16:09:34', '2022-09-01 16:09:34'),
(95, 'App\\Models\\Song', 42, 'cf1c64e8-2f91-4f3d-9591-c10a27e21795', 'artwork', 'media-libraryXdQBZM', 'ohCeTjhYvY.jpg', 'image/jpeg', 'public', 'public', 49524, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 22, '2022-09-01 16:22:48', '2022-09-01 16:22:48'),
(96, 'App\\Models\\Song', 42, '5a906635-6fb9-46c9-95b3-d7dcf26ca34e', 'audio', 'phpLO8gjW', 'OogOKrP9EP.mp3', 'audio/mpeg', 'public', 'public', 4273981, '[]', '{\"bitrate\":128}', '[]', 23, '2022-09-01 16:22:49', '2022-09-01 16:22:49'),
(97, 'App\\Models\\Album', 10, '182f72b4-c010-4be6-a533-c5c58b9f99a8', 'artwork', 'media-library5vFmIk', '1664420371.jpg', 'image/jpeg', 'public', 'public', 35044, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 24, '2022-09-29 02:59:31', '2022-09-29 02:59:31'),
(98, 'App\\Models\\Album', 11, '1a0b585a-a5ae-4499-a6d2-0b5ae8722f18', 'artwork', 'media-librarytT9tIe', '1664889891.jpg', 'image/jpeg', 'public', 'public', 20449, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 25, '2022-10-04 13:24:51', '2022-10-04 13:24:51'),
(113, 'App\\Models\\Album', 12, '3b53d3d8-8672-4ae8-aa54-900f546809a9', 'artwork', 'media-libraryzPgpbg', '1669297941.jpg', 'image/jpeg', 'public', 'public', 683382, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 38, '2022-11-24 13:52:21', '2022-11-24 13:52:23'),
(199, 'App\\Models\\Song', 12, '3d53b902-7028-4a77-9444-ea80945ae6af', 'artwork', 'media-library2Ze4vS', '1672967316.jpg', 'image/jpeg', 'public', 'public', 971029, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 104, '2023-01-06 01:08:36', '2023-01-06 01:08:37'),
(198, 'App\\Models\\Song', 12, 'b9da3b59-20fc-40ee-8775-0cc3d108b4d8', 'audio', 'phpA7yOAr', 'cQpN2PqbMA.mp3', 'audio/x-wav', 'public', 'public', 44200014, '[]', '{\"bitrate\":1411}', '[]', 103, '2023-01-06 01:08:33', '2023-01-06 01:08:33'),
(195, 'App\\Models\\Album', 17, '4e53ce73-2a4d-4dab-8282-d1ca83511ee2', 'artwork', 'media-libraryU46EN8', '1672763848.jpg', 'image/jpeg', 'public', 'public', 827412, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 100, '2023-01-03 16:37:28', '2023-01-03 16:37:30'),
(166, 'App\\Models\\Album', 2, '11828860-42ee-492c-957f-469c7c2f3be2', 'artwork', 'media-libraryw4kUpJ', '1672503469.jpg', 'image/jpeg', 'public', 'public', 309044, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 78, '2022-12-31 16:17:49', '2022-12-31 16:17:51'),
(106, 'App\\Models\\Song', 43, '6342074a-5783-431d-b6a5-0fd97e3df3e7', 'audio', 'phpE4s7pY', 'Ziq2ioLLaG.mp3', 'audio/ogg', 'public', 'public', 3192346, '[]', '{\"bitrate\":101}', '[]', 32, '2022-11-24 13:40:15', '2022-11-24 13:40:15'),
(109, 'App\\Models\\Song', 43, '63c046d1-3777-47f8-90cc-a1d09927e917', 'artwork', 'media-libraryHjrO1V', '1669297383.jpg', 'image/jpeg', 'public', 'public', 1797995, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 35, '2022-11-24 13:43:03', '2022-11-24 13:43:05'),
(110, 'App\\Models\\Song', 43, 'd3f7ab12-b415-48ff-a727-591ec198bdfc', 'artwork', 'media-libraryEjsOYi', '1669297383.jpg', 'image/jpeg', 'public', 'public', 1797995, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 36, '2022-11-24 13:43:03', '2022-11-24 13:43:05'),
(114, 'App\\Models\\Song', 44, 'a6dcb97e-2a50-4d2c-b68a-ecf8506dc8b1', 'audio', 'phpfCIv1P', 'JCmGSAqShu.mp3', 'audio/ogg', 'public', 'public', 3192346, '[]', '{\"bitrate\":101}', '[]', 39, '2022-11-24 23:33:31', '2022-11-24 23:33:31'),
(115, 'App\\Models\\Song', 44, '6cc90578-f57f-4115-8dc5-bcc6d14983d6', 'artwork', 'media-libraryzGw0zt', '1669332816.jpg', 'image/jpeg', 'public', 'public', 725804, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 40, '2022-11-24 23:33:36', '2022-11-24 23:33:37'),
(116, 'App\\Models\\Song', 45, '2aae34d8-4f26-4a1e-ab43-40b31f176d0f', 'audio', 'phpZsoksk', '171H6TPjwL.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 41, '2022-12-10 11:42:39', '2022-12-10 11:42:39'),
(117, 'App\\Models\\Song', 46, '94b54317-65fd-4486-bec4-bed5c17ec6b7', 'audio', 'phphXuOly', '12cijuLsUP.mp3', 'audio/mpeg', 'public', 'public', 4899317, '[]', '{\"bitrate\":256}', '[]', 42, '2022-12-10 11:43:49', '2022-12-10 11:43:49'),
(118, 'App\\Models\\Song', 47, 'd8bfefd2-2d72-4765-9465-cff84af98c20', 'audio', 'phpqrxNe3', 'nA4FZXKHOL.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 43, '2022-12-10 11:45:08', '2022-12-10 11:45:08'),
(119, 'App\\Models\\Song', 48, 'f826c95f-0ebe-4c47-b95e-2b5bb4118cc0', 'audio', 'phpVEdKL4', 'nwwCl2yXOM.mp3', 'audio/mpeg', 'public', 'public', 4899317, '[]', '{\"bitrate\":256}', '[]', 44, '2022-12-10 11:46:12', '2022-12-10 11:46:12'),
(120, 'App\\Models\\Song', 49, '25dee4a4-b312-4bd8-ad01-ccb238286b4c', 'audio', 'phplg8GGm', 'J8V91SkJkc.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 45, '2022-12-10 11:49:00', '2022-12-10 11:49:00'),
(121, 'App\\Models\\Song', 50, '33d3667c-bca2-4efc-83e7-e75822388482', 'audio', 'phpFl87iE', 'HT43bJuxaM.mp3', 'audio/ogg', 'public', 'public', 3192346, '[]', '{\"bitrate\":101}', '[]', 46, '2022-12-10 11:50:44', '2022-12-10 11:50:44'),
(122, 'App\\Models\\Song', 51, 'cec0da87-6f3f-4e70-9320-f2e73510413a', 'audio', 'phpfXK0Ef', 'pPYHtPQrsX.mp3', 'audio/mpeg', 'public', 'public', 4899317, '[]', '{\"bitrate\":256}', '[]', 47, '2022-12-10 11:51:07', '2022-12-10 11:51:07'),
(123, 'App\\Models\\Song', 52, '7c6747bb-fb9a-44a6-8f87-e10e1f7e5c6f', 'audio', 'phpDcg8CK', 'x3W3BKLkLB.mp3', 'audio/mpeg', 'public', 'public', 3588316, '[]', '{\"bitrate\":128}', '[]', 48, '2022-12-10 11:53:25', '2022-12-10 11:53:25'),
(124, 'App\\Models\\Song', 52, 'cf13ccba-8b34-409f-9c79-b5230c6b3de7', 'artwork', 'media-librarylLVjl8', '1670673224.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 49, '2022-12-10 11:53:44', '2022-12-10 11:53:45'),
(125, 'App\\Models\\Song', 53, 'b2addd18-5780-4cc7-8adc-79b96d80526f', 'audio', 'phpxYixPO', '9Omspjpm2c.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 50, '2022-12-10 12:02:21', '2022-12-10 12:02:21'),
(126, 'App\\Models\\Song', 54, 'cc372011-d8a0-4b7a-aa53-8b18ca195750', 'audio', 'phpBFqne7', 'JhegSUnRGT.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 51, '2022-12-10 12:02:34', '2022-12-10 12:02:34'),
(127, 'App\\Models\\Song', 55, 'b114580a-4061-4fb2-a4e6-42eddc50cb13', 'audio', 'phpLZCyV4', 'mGXwi2iKHq.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 52, '2022-12-10 12:03:27', '2022-12-10 12:03:27'),
(128, 'App\\Models\\Song', 55, '32658f81-5ffb-49b4-b4c6-8ab34d101c1d', 'artwork', 'media-libraryZgsRML', '1670673825.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 53, '2022-12-10 12:03:45', '2022-12-10 12:03:47'),
(138, 'App\\Models\\Patner', 2, '571b9232-80af-4ba8-b1d3-be8852006af3', 'artwork', 'media-librarygY3JEW', '1670770642.jpg', 'image/jpeg', 'public', 'public', 579095, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 58, '2022-12-11 14:57:22', '2022-12-11 14:57:24'),
(139, 'App\\Models\\Patner', 3, '3ccf7f56-0ada-47a9-8b9b-2caeb4ddea66', 'artwork', 'media-librarypLBdGc', '1670770702.jpg', 'image/jpeg', 'public', 'public', 309044, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 59, '2022-12-11 14:58:22', '2022-12-11 14:58:24'),
(145, 'App\\Models\\Album', 20, 'f593fa57-f4ea-42de-b18d-4fbd7141e885', 'artwork', 'media-libraryADabho', '1670853233.jpg', 'image/jpeg', 'public', 'public', 953769, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 62, '2022-12-12 13:53:53', '2022-12-12 13:53:55'),
(144, 'App\\Models\\Album', 19, 'febd3184-18c4-4714-bd6c-b35a7413fed0', 'artwork', 'media-libraryckWRxL', '1670853129.jpg', 'image/jpeg', 'public', 'public', 1797995, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 61, '2022-12-12 13:52:09', '2022-12-12 13:52:10'),
(167, 'App\\Models\\Song', 1, '22f49cd3-d0bb-4b12-863e-cb4ad02409e4', 'audio', 'phpK9P5Or', '1qEyzfRKT3.mp3', 'audio/mpeg', 'public', 'public', 4899317, '[]', '{\"bitrate\":256}', '[]', 79, '2022-12-31 16:19:10', '2022-12-31 16:19:10'),
(168, 'App\\Models\\Song', 1, 'dd63692f-99f5-4b54-b82d-9a254cfefd30', 'artwork', 'media-libraryBuJuyp', '1672503561.jpg', 'image/jpeg', 'public', 'public', 347407, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 80, '2022-12-31 16:19:21', '2022-12-31 16:19:23'),
(147, 'App\\Models\\Song', 60, 'ed52fe1c-527e-4d7d-abb3-81377210b700', 'audio', 'phpwaGSrU', 'XvYFrUcnS0.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 64, '2022-12-12 14:11:25', '2022-12-12 14:11:25'),
(149, 'App\\Models\\Song', 61, '77b4d4a6-f558-4ea5-876a-e4a2f9cc3e43', 'audio', 'phpTNBHw5', 'LFDTOLYc6I.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 66, '2022-12-13 15:31:26', '2022-12-13 15:31:26'),
(156, 'App\\Models\\Song', 66, '68c93f9c-9eab-49ec-b3e5-4fc74c42311a', 'audio', 'phpKWpKto', 'ByE26T5Vcf.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 69, '2022-12-24 14:35:42', '2022-12-24 14:35:42'),
(154, 'App\\Models\\Song', 65, '8595896b-36ca-4160-9131-733d15e03b11', 'audio', 'php5nkKBP', 'CgjThZuUkT.mp3', 'audio/mpeg', 'public', 'public', 4010037, '[]', '{\"bitrate\":128}', '[]', 67, '2022-12-24 14:34:59', '2022-12-24 14:34:59'),
(155, 'App\\Models\\Song', 65, 'a8bf3283-0ecd-43f9-8393-95a1593fd3db', 'artwork', 'media-libraryv3RUqc', '1671892507.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 68, '2022-12-24 14:35:07', '2022-12-24 14:35:08'),
(157, 'App\\Models\\Song', 67, '72765118-471a-4187-bf24-453cee12ddd5', 'audio', 'phpTd9HWG', 'acrFndFVm0.mp3', 'audio/mpeg', 'public', 'public', 3588316, '[]', '{\"bitrate\":128}', '[]', 70, '2022-12-24 14:38:18', '2022-12-24 14:38:18'),
(158, 'App\\Models\\Song', 68, '0e0639be-a9a3-46ec-9fa7-38433d36b47e', 'audio', 'phpgmqdyT', 'f20chw0Uit.mp3', 'audio/mpeg', 'public', 'public', 3588316, '[]', '{\"bitrate\":128}', '[]', 71, '2022-12-24 15:21:38', '2022-12-24 15:21:38'),
(159, 'App\\Models\\Song', 68, 'e8ed60f9-cc29-45ec-9e39-17b0fa27dbd2', 'artwork', 'media-libraryh35PLP', '1671895301.jpg', 'image/jpeg', 'public', 'public', 725804, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 72, '2022-12-24 15:21:41', '2022-12-24 15:21:43'),
(160, 'App\\Models\\Song', 69, '8f2c5044-2231-46da-b7d4-c13009cef5c5', 'audio', 'phpcsZM8N', 'Cf2U8xs02h.mp3', 'audio/mpeg', 'public', 'public', 3588316, '[]', '{\"bitrate\":128}', '[]', 73, '2022-12-24 16:13:15', '2022-12-24 16:13:15'),
(161, 'App\\Models\\Song', 69, '9b067173-a29c-4bad-afd8-7a2258c85cca', 'artwork', 'media-library9VkA86', '1671898410.jpg', 'image/jpeg', 'public', 'public', 725804, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 74, '2022-12-24 16:13:30', '2022-12-24 16:13:31'),
(162, 'App\\Models\\GroupGenre', 2, '738dee36-9084-45bc-a618-4b650262b995', 'artwork', 'media-library5nvufc', '1672155984.jpg', 'image/jpeg', 'public', 'public', 579095, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 75, '2022-12-27 15:46:24', '2022-12-27 15:46:26'),
(163, 'App\\Models\\GroupGenre', 5, '4654d1d1-8334-4c1a-a771-36fbcd44c2c9', 'artwork', 'media-librarypoDfLL', '1672156072.jpg', 'image/jpeg', 'public', 'public', 1341899, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 76, '2022-12-27 15:47:52', '2022-12-27 15:47:54'),
(164, 'App\\Models\\Song', 70, '5d5696ea-bac2-48cb-b3a4-cca99d25559d', 'audio', 'phpOtpCI3', 'UCpx1n7dDp.mp3', 'audio/ogg', 'public', 'public', 3192346, '[]', '{\"bitrate\":101}', '[]', 77, '2022-12-28 15:01:36', '2022-12-28 15:01:36'),
(169, 'App\\Models\\Album', 3, 'c784b7fc-182b-4fe2-a4e3-c0039f51293d', 'artwork', 'media-library8wSrDh', '1672503895.jpg', 'image/jpeg', 'public', 'public', 1797995, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 81, '2022-12-31 16:24:55', '2022-12-31 16:24:57'),
(170, 'App\\Models\\Album', 4, '8573bac1-3dc9-4a93-aafe-32ff1245cf33', 'artwork', 'media-libraryj5NgPx', '1672592994.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 82, '2023-01-01 17:09:54', '2023-01-01 17:09:56'),
(171, 'App\\Models\\Album', 5, '7522534a-0f50-4790-b614-617818ab790e', 'artwork', 'media-library9T0SLn', '1672593150.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 83, '2023-01-01 17:12:30', '2023-01-01 17:12:32'),
(172, 'App\\Models\\Album', 6, '5acb348a-429b-41b5-99e3-cf827f2a335e', 'artwork', 'media-libraryDs8u0U', '1672593475.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 84, '2023-01-01 17:17:55', '2023-01-01 17:17:57'),
(173, 'App\\Models\\Album', 7, '80a9420e-8b45-47b4-88a2-57a27e94b3c4', 'artwork', 'media-libraryJn7Vr9', '1672593736.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 85, '2023-01-01 17:22:16', '2023-01-01 17:22:18'),
(174, 'App\\Models\\Album', 8, 'ec28c24f-557f-4b8a-a77a-ff0bd9a1766e', 'artwork', 'media-libraryzdFmso', '1672593957.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 86, '2023-01-01 17:25:57', '2023-01-01 17:25:59'),
(175, 'App\\Models\\Album', 9, 'bd850dd9-d935-4024-9bc0-3fef87e28af1', 'artwork', 'media-libraryDkCbCb', '1672594096.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 87, '2023-01-01 17:28:16', '2023-01-01 17:28:18'),
(176, 'App\\Models\\Album', 10, '554ddb87-e85b-4513-8556-eb5bd829b9d9', 'artwork', 'media-libraryshyE4F', '1672671862.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 88, '2023-01-02 15:04:22', '2023-01-02 15:04:24'),
(177, 'App\\Models\\Album', 11, 'd2448675-6489-47ba-adbd-ddb08f22e969', 'artwork', 'media-librarynLadFG', '1672672362.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 89, '2023-01-02 15:12:42', '2023-01-02 15:12:44'),
(178, 'App\\Models\\Album', 12, 'a1cf2051-ca69-4637-912f-cf8528199c00', 'artwork', 'media-libraryY6SKAK', '1672672526.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 90, '2023-01-02 15:15:26', '2023-01-02 15:15:28'),
(185, 'App\\Models\\Song', 7, '6ef7f646-e5cf-4dc4-a5eb-eddff49d3d30', 'audio', 'file', 'FRe9QzxMLI.mp3', 'audio/x-wav', 'public', 'public', 13408500, '[]', '{\"bitrate\":1411}', '[]', 93, '2023-01-02 23:44:35', '2023-01-02 23:44:35'),
(183, 'App\\Models\\Song', 5, '4441dd15-7695-42d6-bd69-af72282ac4b0', 'audio', 'file', 'vE1Tpszceb.mp3', 'audio/x-wav', 'public', 'public', 13408500, '[]', '{\"bitrate\":1411}', '[]', 91, '2023-01-02 23:16:20', '2023-01-02 23:16:20'),
(184, 'App\\Models\\Song', 6, 'efd653e3-4abd-4edc-bbab-15767fe557d2', 'audio', 'file_20230102173838', 'Bg9SOhb0Ef.mp3', 'audio/x-wav', 'public', 'public', 13408500, '[]', '{\"bitrate\":1411}', '[]', 92, '2023-01-02 23:17:52', '2023-01-02 23:17:52'),
(186, 'App\\Models\\Song', 8, '5e397020-b694-4902-a530-0b09ccd5a784', 'audio', 'file', 'NZn3xJlYOJ.mp3', 'audio/x-wav', 'public', 'public', 13408500, '[]', '{\"bitrate\":1411}', '[]', 94, '2023-01-02 23:53:24', '2023-01-02 23:53:24'),
(187, 'App\\Models\\Song', 9, 'fb43d40e-1c29-4ca5-be44-9e71d728cff2', 'audio', 'file', 'DhYqrzr6r4.mp3', 'audio/x-wav', 'public', 'public', 13408500, '[]', '{\"bitrate\":1411}', '[]', 95, '2023-01-02 23:54:36', '2023-01-02 23:54:36'),
(188, 'App\\Models\\Song', 9, 'ab1e87e8-f0ea-494b-bf26-a53a1165500b', 'artwork', 'media-libraryJlTohJ', '1672703677.jpg', 'image/jpeg', 'public', 'public', 1448287, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 96, '2023-01-02 23:54:37', '2023-01-02 23:54:39'),
(196, 'App\\Models\\Song', 11, 'c25ec688-4299-4636-9dfc-8c9bde5d13c1', 'audio', 'phpKZYD3i', 'ZwOdWeQb3X.mp3', 'audio/mpeg', 'public', 'public', 3588316, '[]', '{\"bitrate\":128}', '[]', 101, '2023-01-06 00:01:55', '2023-01-06 00:01:55'),
(197, 'App\\Models\\Song', 11, 'e66334fe-e633-4e00-a5b7-1ff01e4cbd72', 'artwork', 'media-libraryOEN410', '1672963319.jpg', 'image/jpeg', 'public', 'public', 725804, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 102, '2023-01-06 00:01:59', '2023-01-06 00:02:01'),
(194, 'App\\Models\\Album', 16, 'f4a8a01a-659a-470f-9d10-c9da455a34fb', 'artwork', 'media-librarymH67iV', '1672763753.jpg', 'image/jpeg', 'public', 'public', 827412, '[]', '{\"generated_conversions\":{\"sm\":true,\"md\":true,\"lg\":true}}', '[]', 99, '2023-01-03 16:35:53', '2023-01-03 16:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `metatags`
--

CREATE TABLE `metatags` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` smallint(6) DEFAULT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `info` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` text,
  `page_keywords` varchar(255) DEFAULT NULL,
  `auto_keyword` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metatags`
--

INSERT INTO `metatags` (`id`, `priority`, `url`, `info`, `page_title`, `page_description`, `page_keywords`, `auto_keyword`, `created_at`, `updated_at`) VALUES
(1, 22, '/*', 'User profile', '{{name}} music collection and more.', 'Check out {{name}} music collection and more.', NULL, 0, NULL, '2020-09-14 03:13:07'),
(2, 17, '/trending/month', 'title trending month', 'Top Songs This Month', 'Trending music chart ranks the most popular songs of the month based on streaming activity.', '', 0, NULL, '2020-09-14 03:23:12'),
(4, 20, '/*/playlists/subscribers', 'User subscribed page', '{{name}}\'s subscribed playlist', 'Check out all playlists subscribed by {{name}}', '', 0, NULL, '2020-09-14 03:13:07'),
(5, 19, '/discover', 'Discover page', 'Discover new music', 'Discover new bands and artists, find out all about the music and the people behind it.', '', 0, NULL, '2020-09-14 03:17:04'),
(6, 16, '/trending/week', 'Trending week page', 'Top Songs This Week', 'Trending music chart ranks the most popular songs of the week based on streaming activity.', '', 0, NULL, '2020-09-14 03:23:28'),
(7, 18, '/trending', 'Trending page', 'Top Songs Today', 'Trending music chart ranks the most popular songs of the day based on streaming activity.', '', 0, NULL, '2020-09-14 03:22:48'),
(8, 21, '/*/playlists', 'User playlists page', 'Check out the latest Playlists from {{name}}', 'Check out the latest Playlists from {{name}} and more...', '', 0, NULL, '2020-09-14 03:13:07'),
(10, 10, '/song/*', 'Song page', '{{title}} by {{artist}}', 'Listen to {{title}} by {{artist}} for free, and see the artwork, lyrics and similar artists.', '', 0, NULL, '2020-09-14 03:13:07'),
(11, 15, '/artist/*', 'Artist page', '{{name}} on MusicEngine', 'Listen to music from {{name}} & more. Find the latest tracks, albums, and images on MusicEngine', '', 0, NULL, '2020-09-14 03:13:07'),
(12, 9, '/search/song?q=*', 'Search song page', 'Search song for {{term}}', 'awagawgawgwg', NULL, 0, NULL, '2020-09-14 03:13:07'),
(13, 12, '/artist/*/similar-artists', 'Similar artists', 'Similar artists - {{name}}', 'Find similar artists to {{name}} and discover new music. Scrobble songs to get recommendations on tracks, albums, and artists you\'ll love.', NULL, 0, NULL, '2020-09-14 03:13:07'),
(14, 11, '/album/*', 'Album page', '{{title}} by {{artist}}', 'Listen free to {{title}} - {{artist}}. Discover more music, concerts, videos, and pictures with the largest catalogue online.', '', 0, NULL, '2020-09-14 03:13:07'),
(15, 13, '/artist/*/albums', 'Artist albums page', '{{name}} albums and discography', 'Listen to music from {{name}}. Find the latest tracks, albums, and images from {{name}}.', NULL, 0, NULL, '2020-09-14 03:13:07'),
(16, 14, '/artist/*/events', 'Artist events page', '{{name}} tours, tickets, shows', 'Find {{name}} tour dates, {{name}} tickets, concerts, and gigs, as well as other events you\'ll be interested in', NULL, 0, NULL, '2020-09-14 03:13:07'),
(17, 23, '/', 'Homepage', 'Music Social Network - Discover New Music', 'Music social network for music lovers, artists, bands, musicians and more! Connect with fans, discover new music, and share the music you love with your friends.', 'music,streaming,networking,social,share music', 0, '2020-07-06 00:23:17', '2020-09-14 03:13:07'),
(18, 8, '/playlist/*/*', 'Playlist page', '{{title}} playlist by {{user}} - Listen now on MusicEngine', '{{title}} playlist by {{user}} on MusicEngine', '', 0, '2020-09-14 02:30:42', '2020-09-14 03:13:07'),
(19, 7, '/radio', 'Radio page', 'Free Internet Radio | Live News, Sports, Music, and Podcasts', 'Listen to free internet radio, news, sports, music, and podcasts. Stream live CNN, FOX News Radio, and MSNBC.', '', 0, '2020-09-14 03:04:00', '2020-09-14 03:13:07'),
(20, 1, '/radio/regions', 'Radio By Location', 'Stream Radio By Location', 'Stream Radio By Location free online.', 'radio,online,talk,music', 0, '2020-09-14 03:06:13', '2020-09-14 03:13:07'),
(21, 2, '/radio/region/*', 'Radio by continent', 'Stream Radio from {{name}}', 'Stream Radio from {{name}} free online.', '', 0, '2020-09-14 03:07:32', '2020-09-14 03:13:07'),
(22, 3, '/radio/languages', 'Radio By Language', 'Stream Radio By Language', 'Stream Radio By Language free online.', '', 0, '2020-09-14 03:09:31', '2020-09-14 03:13:07'),
(23, 4, '/radio/language/*', 'Stream Radio in {{name}}', 'Stream Radio in {{name}} free online.', NULL, '', 0, '2020-09-14 03:10:51', '2020-09-14 03:13:07'),
(24, 5, '/radio/countries', 'By countries', 'By countries', NULL, '', 0, '2020-09-14 03:11:39', '2020-09-14 03:13:07'),
(25, 6, '/radio/country/*', 'By country', 'Stream Radio from {{name}}', 'Stream Radio from {{name}} free online.', '', 0, '2020-09-14 03:12:53', '2020-09-14 03:13:07'),
(26, NULL, '/station/*/*', 'Station page', 'Listen to {{title}} Radio on MusicEngine', 'Listen to {{title}} Radio on MusicEngine. Stream by location and language.', '', 0, '2020-09-14 03:15:18', '2020-09-14 03:15:18'),
(27, NULL, '/community', 'Community page', 'Community page', 'Community page', '', 0, '2020-09-14 03:16:39', '2020-09-14 03:16:39'),
(28, NULL, '/blog', 'Blog page', 'Music Blog - Music Discovery, Music Trends, and More!', 'Read our latest articles on music related topics such as the music industry, new trends, and music discovery.', '', 0, '2020-09-14 03:17:54', '2020-09-14 03:17:54'),
(29, NULL, '/podcast/*/*', 'Podcast show page', 'Listen to the show {{title}} by {{artist}}', 'Listen to the show {{title}} by {{artist}}', '', 0, '2020-09-14 03:17:54', '2020-09-14 03:17:54'),
(30, NULL, '/podcast/*/*/episode/*', 'Podcast\'s episode page', 'Listen to {{podcast}}\'s episode {{title}} by {{artist}}', 'Listen to {{podcast}}\'s episode {{title}} by {{artist}}', '', 0, '2020-09-14 03:17:54', '2020-09-14 03:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_29_200844_create_languages_table', 1),
(2, '2018_08_29_205156_create_translations_table', 1),
(3, '2020_09_14_055118_create_activities_table', 1),
(4, '2020_09_14_055118_create_album_songs_table', 1),
(5, '2020_09_14_055118_create_albums_table', 1),
(6, '2020_09_14_055118_create_artist_requests_table', 1),
(7, '2020_09_14_055118_create_artists_table', 1),
(8, '2020_09_14_055118_create_banned_table', 1),
(9, '2020_09_14_055118_create_categories_table', 1),
(10, '2020_09_14_055118_create_channels_table', 1),
(11, '2020_09_14_055118_create_city_table', 1),
(12, '2020_09_14_055118_create_collaborators_table', 1),
(13, '2020_09_14_055118_create_collections_table', 1),
(14, '2020_09_14_055118_create_comments_table', 1),
(15, '2020_09_14_055118_create_country_table', 1),
(16, '2020_09_14_055118_create_countrylanguage_table', 1),
(17, '2020_09_14_055118_create_emails_table', 1),
(18, '2020_09_14_055118_create_events_table', 1),
(19, '2020_09_14_055118_create_files_table', 1),
(20, '2020_09_14_055118_create_genres_table', 1),
(21, '2020_09_14_055118_create_hash_tags_table', 1),
(22, '2020_09_14_055118_create_histories_table', 1),
(23, '2020_09_14_055118_create_jobs_table', 1),
(24, '2020_09_14_055118_create_love_table', 1),
(25, '2020_09_14_055118_create_media_table', 1),
(26, '2020_09_14_055118_create_metatags_table', 1),
(27, '2020_09_14_055118_create_moods_table', 1),
(28, '2020_09_14_055118_create_notifications_table', 1),
(29, '2020_09_14_055118_create_oauth_access_tokens_table', 1),
(30, '2020_09_14_055118_create_oauth_auth_codes_table', 1),
(31, '2020_09_14_055118_create_oauth_clients_table', 1),
(32, '2020_09_14_055118_create_oauth_personal_access_clients_table', 1),
(33, '2020_09_14_055118_create_oauth_refresh_tokens_table', 1),
(34, '2020_09_14_055118_create_oauth_socialite_table', 1),
(35, '2020_09_14_055118_create_pages_table', 1),
(36, '2020_09_14_055118_create_password_resets_table', 1),
(37, '2020_09_14_055118_create_playlist_songs_table', 1),
(38, '2020_09_14_055118_create_playlists_table', 1),
(39, '2020_09_14_055118_create_poll_logs_table', 1),
(40, '2020_09_14_055118_create_polls_table', 1),
(41, '2020_09_14_055118_create_popular_table', 1),
(42, '2020_09_14_055118_create_post_logs_table', 1),
(43, '2020_09_14_055118_create_post_tags_table', 1),
(44, '2020_09_14_055118_create_posts_table', 1),
(45, '2020_09_14_055118_create_radio_table', 1),
(46, '2020_09_14_055118_create_reactions_table', 1),
(47, '2020_09_14_055118_create_regions_table', 1),
(48, '2020_09_14_055118_create_reports_table', 1),
(49, '2020_09_14_055118_create_role_users_table', 1),
(50, '2020_09_14_055118_create_roles_table', 1),
(51, '2020_09_14_055118_create_services_table', 1),
(52, '2020_09_14_055118_create_slides_table', 1),
(53, '2020_09_14_055118_create_songs_table', 1),
(54, '2020_09_14_055118_create_stations_table', 1),
(55, '2020_09_14_055118_create_subscriptions_table', 1),
(56, '2020_09_14_055118_create_users_table', 1),
(57, '2020_09_14_055119_add_foreign_keys_to_city_table', 1),
(58, '2020_09_14_055119_add_foreign_keys_to_countrylanguage_table', 1),
(59, '2020_09_19_150208_create_banners_table', 1),
(60, '2020_10_06_062206_add_allow_sell_to_songs_table', 1),
(61, '2020_10_06_062449_add_allow_podcasts_to_channels_table', 1),
(62, '2020_10_06_062513_add_allow_podcasts_to_slides_table', 1),
(63, '2020_10_07_062206_add_allow_sell_to_albums_table', 1),
(64, '2020_10_07_190145_create_podcast_categories_table', 1),
(65, '2020_10_07_190145_create_podcasts_table', 1),
(66, '2020_10_08_081821_create_episodes_table', 1),
(67, '2020_10_11_043902_add_balance_to_users', 1),
(68, '2020_10_11_072618_create_stream_stats_table', 1),
(69, '2020_10_12_053336_create_withdraws_table', 1),
(70, '2020_10_13_084724_create_orders_table', 1),
(71, '2020_10_13_152017_create_failed_jobs_table', 1),
(72, '2020_11_03_135748_add_time_to_album_songs', 1),
(73, '2020_11_03_135852_add_discover_to_genres', 1),
(74, '2020_11_03_140110_create_album_spotify_logs_table', 1),
(75, '2020_11_03_140137_create_artist_spotify_logs_table', 1),
(76, '2020_11_03_140210_create_song_spotify_logs_table', 1),
(77, '2020_11_30_105947_create_coupons_table', 1),
(78, '2020_12_04_035428_add_preview_to_songs_table', 2),
(79, '2020_12_14_142401_create_song_tags_table', 2),
(80, '2020_12_14_142500_add_waveform_to_songs_table', 2),
(81, '2020_12_21_132348_add_time_to_playlist_songs', 2),
(82, '2020_12_21_151001_create_playlist_spotify_logs_table', 2),
(83, '2020_12_28_051236_add_album_id_index_to_album_songs', 2),
(84, '2020_12_28_051536_add_artistids_index_to_songs', 2),
(85, '2020_12_28_071408_add_playlist_id_index_to_playlist_songs', 2),
(86, '2020_12_28_075343_add_title_index_to_albums', 2),
(87, '2020_12_28_075357_add_title_index_to_songs', 2),
(88, '2020_12_28_075414_add_name_index_to_artists', 2),
(89, '2020_12_28_075426_add_title_index_to_playlists', 2),
(90, '2020_12_30_162852_create_videos_table', 2),
(91, '2020_12_30_165322_add_allow_videos_to_channels', 2),
(92, '2020_12_30_165344_add_allow_videos_to_slides', 2),
(93, '2021_01_05_140722_add_plays_to_episodes', 2),
(94, '2021_01_06_125049_add_type_to_banners', 2),
(95, '2021_01_17_152350_create_cart_storage_table', 2),
(96, '2021_03_04_110547_set_provider_artwork_to_nullable', 2),
(97, '2021_03_11_140841_create_banner_tracks_table', 2),
(98, '2021_03_16_084457_add_socials_to_users', 2),
(99, '2021_03_16_094457_add_socials_to_artists', 2),
(100, '2021_04_09_343543_add_attraction_to_channels_table', 2),
(101, '2021_04_09_344457_add_more_analytic_to_popular', 2),
(102, '2021_04_13_065929_create_sessions_table', 2),
(103, '2021_04_14_074550_update_birth_column_user_table', 2),
(104, '2021_04_27_244457_add_skippable_to_banners', 2),
(105, '2021_04_28_334553_create_lyrics_table', 2),
(106, '2021_06_02_348322_add_user_id_to_artists', 2),
(107, '2021_06_03_354049_change_user_balance_type', 2),
(108, '2021_06_03_543344_add_impression_to_artists', 2),
(109, '2021_06_07_453232_add_access_to_albums', 2),
(110, '2021_06_10_334565_add_impression_to_songs', 2),
(111, '2022_04_06_222666_add_disable_main_to_podcast_categories', 2);

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `id` mediumint(9) NOT NULL,
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `notificationable_id` int(11) NOT NULL,
  `notificationable_type` varchar(50) DEFAULT NULL,
  `hostable_id` int(11) NOT NULL,
  `hostable_type` varchar(50) DEFAULT NULL,
  `action` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_socialite`
--

CREATE TABLE `oauth_socialite` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` varchar(50) DEFAULT NULL,
  `provider_name` varchar(255) DEFAULT NULL,
  `provider_email` varchar(255) DEFAULT NULL,
  `provider_artwork` varchar(191) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderable_id` int(11) NOT NULL,
  `orderable_type` varchar(50) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `amount` decimal(10,2) UNSIGNED DEFAULT NULL,
  `commission` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(50) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt_name` varchar(255) DEFAULT NULL,
  `content` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `title`, `alt_name`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 1, 'Term and Condition', 'term-and-condition', '<p>Escape Media Group, Inc. (\"EMG\") provides users (\"Users\") of the web pages located at lalaplus.com, twisten.fm, and tinysong.com, and their associated subdomains including but not limited to widgets.lalaplus.com, beluga.lalaplus.com and listen.lalaplus.com, (the \"Site\") with a free platform for the discovery and promotion of music, the sharing of information and comments about music, communication with other Users, the posting, syndication of, linking to or uploading of User Content (defined below), social networking, the Application Programming Interface (API) and other features, functions, or services on the Site (collectively, the \"Service\"). The Service will include the cataloging, indexing, sharing and streaming of User Content.</p>\n<p>This Agreement sets out the legally binding terms between you and EMG. This Agreement applies to all Users of the Service, including users who listen to or share audio content and or its associated metadata, information, and other materials or services on the Site. This Agreement applies to all Users regardless of if they are using the Service anonymously or as a registered user. If you choose to use the Service, you will be agreeing to abide by all of the terms and conditions of this Terms and Conditions of Use Agreement (the \"Agreement\"). EMG may, in its sole discretion, change, add or remove portions of this Agreement at any time, and by continuing to use the Service you agree to be bound by such revisions or modifications. If EMG does so, such changes will be posted on the Service, or sent to you via e-mail.</p>\n<p>IF ANY OF THESE RULES OR ANY FUTURE CHANGES ARE UNACCEPTABLE TO YOU, DO NOT USE THE SERVICE. YOUR CONTINUED USE OF THE SERVICE NOW, OR FOLLOWING THE POSTING OF NOTICE OF ANY CHANGES IN THESE OPERATING RULES, WILL INDICATE ACCEPTANCE AND AGREEMENT BY YOU OF SUCH RULES, CHANGES, OR MODIFICATIONS.</p>\n<p>EMG may change, suspend or discontinue any aspect of the Service at any time, including the availability of any Service feature, database, or content. EMG may also impose limits on certain features and services or restrict your access to parts or all of the Service without notice or liability.</p>\n<p>In addition, when using particular EMG services, you and EMG shall be subject to any additional terms, guidelines or rules applicable to such services, which may be posted from time to time. All such additional terms, guidelines and rules are hereby incorporated by reference into this Agreement. Also, EMG may offer other services from time to time that are governed by different terms of service.</p>\n<p>Unless explicitly stated otherwise, any new features that augment or enhance the current Service, including the release of new EMG properties, shall be subject to this Agreement.</p>\n<p>Privacy</p>\n<p>Your privacy is very important to EMG. Please review our&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_privacy\">Privacy Policy</a>, which also governs your use of the Service, to understand our practices.</p>\n<p>&nbsp;</p>\n<p>Intellectual Property</p>\n<p>EMG is the owner of all intellectual property rights, including all copyrights, patents, trademarks associated with the Service, including all associated software, logos, text, and graphics, but excluding User Content (defined below). You agree not to display or use any EMG intellectual property without EMG\'s prior permission.</p>\n<p>&nbsp;</p>\n<p>License and Site Access</p>\n<p>EMG grants you a limited license to access and make personal use of the Service. You agree not to download (other than page caching) or modify the Site, or any portion of it, except with express written consent of EMG. Any musical work made available via the Service is intended for Streaming only. Streaming meaning the transmission of an audiovisual work via the Internet from the Service to a user\'s device in such a manner that the data is intended for real-time listening and not intended to be copied, stored, permanently downloaded, or redistributed by the user. Accessing any musical work for any purpose or in any manner other than Streaming is expressly prohibited. This license does not include any resale or commercial use of the Site, the Service, or its contents; any downloading or copying of account information for the benefit of another merchant. The Service is for the personal use of Users only and may not be used in connection with any commercial endeavors except those may be specifically endorsed or approved by the management of EMG from time to time. Use of any automated script, program, and or mechanism to collect, scrape, retrieve, and or gather any information and or User Content from the Service is strictly prohibited without written consent for EMG.</p>\n<p>Illegal and/or unauthorized use of the Service, including collecting usernames, email addresses or User Content of other Users by electronic or other means for the purpose of sending unsolicited email, unauthorized framing of or linking to the Site or other illegal purposes will be investigated. Commercial advertisements, affiliate links, and other forms of solicitation may be removed from posts or accounts without notice and may result in termination of membership privileges. EMG will take appropriate legal action for any illegal or unauthorized use of the Service. The Site, Service, or any portion thereof may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of EMG. You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, content, music, text, page layout, or form) of EMG and our affiliates or other Users. You may not use any meta tags or any other \"hidden text\" utilizing EMG\'s name or trademarks without the express written consent of EMG. Any unauthorized use terminates the permission or license granted by EMG. You are granted a limited, revocable, and nonexclusive right to create a hyperlink to the Service so long as the link does not portray EMG, its affiliates, or their products or services in a false, misleading, derogatory, or otherwise offensive manner. You may not use any EMG logo or other proprietary graphic or trademark as part of the link without express written permission.</p>\n<p>&nbsp;</p>\n<p>Account, Password, Security</p>\n<ol>\n<li>You will receive a password and account designation upon completing the Service\'s registration process. You are responsible for maintaining the confidentiality of the password and account, and are fully responsible for all activities that occur under your password or account. You agree to (i) immediately notify EMG of any unauthorized use of your password or account or any other breach of security, and (ii) ensure that you exit from your account at the end of each session. EMG cannot and will not be liable for any loss or damage arising from your failure to comply with this Section.</li>\n<li>You agree to provide true, accurate, current and complete information about yourself as prompted by the Site\'s registration form (such information being the \"Membership Data\") and maintain and promptly update the Membership Data to keep it true, accurate, current and complete. If you do not, or EMG has reasonable grounds to suspect that you have not, EMG has the right to suspend or terminate your account and refuse any and all current or future us of the Service. Membership Data and certain other information about you are subject to our<a href=\"http://lalaplus.com/#!/about/legal_privacy\">Privacy Policy</a>.</li>\n</ol>\n<p>&nbsp;</p>\n<p>International</p>\n<p>You agree to not use the Service or export any portion of the Service, including the User Content (defined below) in violation of U.S. export regulations. You are responsible for adhering to all relevant local and national laws wherever you are.</p>\n<p>&nbsp;</p>\n<p>Uploaded Content, Reviews, Comments, Etc.</p>\n<p>Please choose carefully the words, information, content, messages, text, files, images, photos, videos, music, sounds, profiles, works of authorship or any other materials you post, upload, link to, publish, display or make available on the Site or through the Service and any such content that you provide or make available to other Users (collectively, \"User Content\"). You are responsible for all User Content, as set forth below.</p>\n<p>EMG reserves the right, in its sole discretion, to reject, refuse to post, link to, or remove any User Content, or to restrict, suspend, or terminate your access to all or any part of the Site and/or the Service at any time, for any or no reason, with or without prior notice, and without liability. EMG has the right but not the obligation to remove or edit User Content, but does not regularly review User Content. EMG takes no responsibility and assumes no liability for any User Content.</p>\n<p>By submitting User Content to the Service, you understand that it will be available to anyone in the world for streaming and viewing, that User Content submitted is being used for promotional and/or commercial purposes and that EMG will not be liable for any royalties to you or any other rights-holder of the Content. You understand that any uploaded material will stay up indefinitely on the Service; however, you may always reach back out and we will assist in its removal.</p>\n<p>For clarification purposes, you retain all of your ownership rights in your User Content. However, unless EMG indicates otherwise, by submitting User Content to the Service you grant EMG and its affiliates a nonexclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, display, perform, reproduce, publish, and distribute such User Content throughout the world via the Service. You also grant each user of the Service a non-exclusive license to access your User Content through the Service, and to use, reproduce, distribute, display and perform such User Content as permitted through the functionality of the Service and under this Agreement. You grant EMG and it affiliates the right to use the name that you submit in connection with such User Content.</p>\n<p>EMG may use your marks and name to promote (i) the User Content, the Site and the Services, and (ii) EMG\'s relationship with you and any associated labels and distributors. In addition, EMG may include your marks and names in EMG\'s advertising, publicity and promotion materials. EMG\'s use of your marks and names will not create any right, title or interest in or to your marks or names, and all such use and goodwill associated therewith will inure solely to your benefit, as the case may be. You are solely responsible for any necessary payments that may become due to any third parties as the result of your uploading, posting of or linking to the User Content and EMG\'s use thereof.</p>\n<p>You agree that User Content you submit to the Service will not be illegal, obscene, threatening, defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable. The following is a partial list of the kind of User Content that is illegal or prohibited on the Service. Prohibited User Content includes but is not limited to content that: (i) is obscene, patently offensive, or promotes racism, bigotry, hatred or physical harm of any kind against any group or individual; (ii) harasses or advocates harassment of another person; (iii) involves the transmission of \"junk mail\", \"chain letters,\" or unsolicited mass mailing or \"spamming\"; (iv) consists of information that you know is false or misleading or promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libelous; (v) consists of an illegal or unauthorized copy of a copyrighted work, such as sound recordings, musical compositions and videos in which you do not personally own the copyright (including CDs and tracks you may have purchased), unless you are otherwise legally entitled or have the necessary authority or permission from the copyright owner(s) to submit the material and to grant to EMG all of the license rights granted herein; (vi) computer programs or links to them or providing information to circumvent manufacturer-installed copy-protect devices; (vii) contains restricted or password-only access pages or hidden pages or images (those not linked to or from another accessible page); (viii) provides material that exploits people under the age of 18 in a sexual or violent manner, or solicits personal information from anyone under 18; (ix) provides instructional information about illegal activities such as making or buying illegal weapons, violating someone\'s privacy, or providing or creating computer viruses; (x) solicits passwords or personal identifying information for commercial or unlawful purposes from other users; (xi) involves commercial activities and/or sales without our prior written consent such as contests, sweepstakes, barter, advertising, or pyramid schemes; or (xii) uses sexually suggestive imagery or any other unfair, misleading or deceptive content intended to draw traffic to the profile. EMG reserves the right to investigate and take appropriate legal action in its sole discretion against anyone who violates this provision, including without limitation, removing the offending User Content from the Service and terminating the membership of such violators.</p>\n<p>Should EMG discover or be informed that you have posted User Content for which you do not personally own the copyright or otherwise do not have the necessary authority from the copyright owner, EMG may take all appropriate steps to rectify your noncompliance, including without limitation, disabling your ability to upload User Content to the Service, unless you provide EMG with a counter notification of your right to upload such User Content in compliance with our&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_dmca\">Copyright Policy</a>. Should EMG discover or be informed that you continue to upload User Content for which you do not personally own the copyright or otherwise do not have the necessary authority from the copyright owner after EMG has made reasonable efforts to disable your ability to do so, you will be considered a repeat infringer, and EMG will terminate your account and delete all data associated with your account; remove all of the User Content you have uploaded/submitted to the Site; and use its reasonable efforts to prohibit you from signing up for another User account in the future. If at any time you reasonably believe that you do not have, or no longer have the rights necessary to authorize EMG to make available certain User Content, then you shall notify EMG immediately so that EMG may make commercially reasonable efforts to remove the content from the Service.</p>\n<p>EMG shall take reasonable steps to promptly notify you via the email address submitted by you upon registration with the Site for the Services should your ability to upload User Content to the Service be disabled and/or your account for the Service be terminated. If you believe that you do have the appropriate rights to post User Content, you can contact us in accordance with our&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_dmca\">Copyright Policy</a>.</p>\n<p>When applicable, as between the parties, (i) you shall bear all responsibility for securing, administering and paying, on a timely basis, all publishing rights and royalties (including without limitation, synchronization fees owed to publishers or other applicable entities that own or control the copyrights to musical compositions), (ii) you shall bear all responsibility for paying all record royalties and license fees due to any artists, producers or other third-parties and all union, guild or other third party fees that may be required by contract or the Copyright Act by virtue of the use, copying and distribution of the User Content via the Service pursuant to this Agreement, and (iii) you shall bear all responsibility for paying all publishing rights due to any songwriters, composers, authors, publishers or third-parties that may be required by contract or the Copyright Act by virtue of the use, copying and distribution of the User Content via the Service pursuant to this Agreement. Furthermore, You shall bear sole responsibility for securing, administering and paying, on a timely basis, all public performance royalties for the User Content you submit.Unless specifically asked by EMG in the registration process, do not post the following items to the Service: telephone numbers or street addresses. You may not provide a false email address, impersonate any person or entity, or otherwise mislead as to the origin of any User Content.</p>\n<p>Any photographs posted by you may not contain nudity or obscene, lewd, excessively violent, harassing, sexually explicit or otherwise objectionable subject matter. Information or User Content provided by other Users may contain inaccurate, inappropriate or offensive material, products or services, and EMG assumes no responsibility or liability for this material.</p>\n<p>&nbsp;</p>\n<p>Conduct</p>\n<p>You agree to abide by the terms of this Agreement, and to not use the Service to: (i) interfere with, manipulate, or take any actions that may undermine the integrity of any rating system used on the Service; (ii) interfere with or disrupt the Service or servers or networks connected to the Service, or disobey any requirements, procedures, policies or regulations of networks connected to the Service; (iii) collect or store personal data about other Users; (iv) harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to any other User without their prior explicit consent; or (v) reverse engineer or decompile any elements of the Service except to the extent you may be expressly permitted to decompile under applicable law, it is essential to do so in order to achieve operability of the Service with another software program, and you have first requested EMG to provide the information necessary to achieve such operability and EMG has not made such information available.</p>\n<p>Without limiting other remedies, EMG and its affiliates may immediately warn Users of your actions, issue a warning, temporarily suspend, indefinitely suspend or terminate your membership and refuse to provide the Service to you if: (i) you breach this Agreement or the documents it incorporates by reference; (ii) we are unable to verify or authenticate any information you provide to us; or (iii) we believe that your actions may cause financial loss or legal liability for you, us or our Users. Your membership will be terminated and you will be denied access to the Service if you breach this Agreement or any other agreement between you and EMG in any way on more than one occasion.</p>\n<p>You are solely responsible for your interactions with other Users of the Service. EMG reserves the right, but has no obligation, to monitor disputes between you and other Users.</p>\n<p>&nbsp;</p>\n<p>Lala+ Rewards</p>\n<p>You may elect to participate in the Lala+ Rewards program (\"Lala+ Rewards\"). Lala+ Rewards is a service under which you can acquire points and redeem those points for certain online services and digital products. You can earn points by completing surveys provided by EMG and by various third-party companies.</p>\n<p>Points have no monetary value. You may not obtain any cash or money in exchange for points, regardless of how you acquired those points. Points are not your personal property. Your only recourse for using points is to redeem them through www.lalaplus.com. We encourage you to redeem your points. The existence of a particular offer available for points redemption is not a commitment by us to maintain or continue to make the offers in the future. The scope, variety and type of online services and digital products that you may obtain by redeeming points can change at any time and without notice to you. We have no obligation to continue making offers available for points redemption. You can see how many points you have accrued by checking your points balance on your User profile.</p>\n<p>Points may expire at any time. We may cancel, suspend or otherwise limit your access to your points balance if we suspect fraudulent, abusive or unlawful activity on your points balance. We retain the right to determine what conduct shall result in cancellation of your points balance. Once we delete points from a balance, we will not reinstate them, except at our discretion. When we cancel, suspend or otherwise limit access to your points balance, your right to use your points balance immediately ceases. We will use reasonable efforts to investigate points balances that are subject to access limitations and to reach a final decision on the limitations promptly. In addition, we may limit your use of the points service, including applying limits to: the number of points you may have credited to your points balance at one time, the number of points you may redeem within a given time period (for example, one day), and the number of promotion points you may obtain in a single event.</p>\n<p>If we post points to your balance for an activity that is subsequently voided, canceled or involves a returned item, then we will remove those points from your balance. You are responsible for any tax consequences that may result from your participation in Lala+ Rewards.</p>\n<p>EMG may discontinue the Lala+ Rewards program at any time. Upon the cancellation of the program, any points accrued and not redeemed by you will be deleted.</p>\n<p><br /><a name=\"giftCards\"></a></p>\n<p>Gift Cards &amp; Promotional Codes</p>\n<ol>\n<li>\n<ol>\n<li>Gift Subscriptions are pre-paid upgrades to the premium versions of the Lala+ service redeemable at www.lalaplus.com.</li>\n<li>There are no refunds, exchanges or other credit for Gift Subscriptions that are not redeemed.</li>\n<li>Gift Subscriptions do not expire.</li>\n<li>Gift Subscriptions are valid only for credit towards the premium versions of the Lala+ service and are not valid for any other products or services offered by Lala+.</li>\n<li>Lala+ is not responsible if the Gift Subscription is lost, stolen or used without permission.</li>\n<li>Gift Subscriptions are not redeemable or refundable for cash, subject to applicable law, and cannot be resold or combined with any other special or free offers, including other Gift Subscriptions and Gift Cards.</li>\n<li>Gift Subscriptions are issued by Escape Media Group, Inc., a Delaware corporation. Gift Subscriptions purchased at www.lalaplus.com are valid for redemption only at www.lalaplus.com.</li>\n</ol>\n</li>\n</ol>\n<p>Gift Subscriptions and their use are subject to these terms and the Lala+ Terms of Use. These Gift Subscription terms are governed by the laws of the State of New York, excluding its conflict of law principles, and are subject to change without notice.</p>\n<p>&nbsp;</p>\n<p>Use &amp; Storage</p>\n<p>You acknowledge that EMG may establish general practices and limits concerning use of the Service, including without limitation the maximum number of days that User Content will be retained by or made available through the Service, the maximum disk space that will be allotted on EMG\'s servers on your behalf, and the maximum number of times (and the maximum duration for which) you may access the Service in a given period of time. You agree that EMG has no responsibility or liability for the blocking, deletion or failure to store any User Content maintained or transmitted by the Service. You acknowledge that EMG reserves the right to cancel accounts that are inactive for an extended period of time. You further acknowledge that EMG reserves the right to change these general practices and limits at any time, in its sole discretion, with or without notice.</p>\n<p>&nbsp;</p>\n<p>Third-Party Content, Links and Syndication</p>\n<p>EMG is not responsible for any User Content, third-party content, syndicated content, applications, services, advertisements, and/or links that may be contained in the Service. The Service may contain links to third party websites that are not owned or controlled by EMG. EMG has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party websites. In addition, EMG will not and cannot censor or edit the content of any third-party site. By using the Service, you expressly relieve EMG from any and all liability arising from your use of any third-party website. Accordingly, we encourage you to be aware when you leave the Site and to read the terms and conditions and privacy policy of each other website that you visit. Any correspondence, business dealings with, syndication, linking or participation in promotions of third parties found on or through the Service, including payment or delivery of related goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between you and such third parties. EMG has no control over third-party websites or resources, and as such, you acknowledge and agree that EMG is not responsible for their availability, reliability, or functionality, and does not endorse and is not responsible or liable for any third-party content, applications, services, advertising, products, or other materials on or available from such websites or resources. EMG shall not be responsible or liable for any loss or damage of any sort incurred as the result of any dealings between you and any third parties, or as the result of the presence of such third-party content or User Content on the Service or as a result of the failure of such third-party services, applications, or content to function as intended.</p>\n<p>&nbsp;</p>\n<p>Termination</p>\n<p>You may terminate this Agreement at any time by permanently discontinuing your use of the Service and Service. EMG may terminate this Agreement at any time for any reason upon notice to you by email. Sections 3, 12, 13, 14, 15, 16, 17 and 18 shall continue in full force and effect upon any termination of this Agreement.</p>\n<p>&nbsp;</p>\n<p>Representations &amp; Warranties</p>\n<p>You represent and warrant that you have the full authority to act on your behalf and on behalf of any and all owners of any right, title and interest in and to any User Content you post, submit, transfer, make available, or link to. You represent and warrant that you are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations and warranties set forth in this Agreement, and to abide by and comply with this Agreement and have obtained all necessary third-party consents, approvals, authorizations, licenses and permissions necessary to enter into and fully perform your obligations herein. In any case, you affirm that you are over the age of 13, as the Service is not intended for children under 13. If you are under 13 years of age, then please do not use the Service. Your membership or access to the Service may be deleted or blocked without warning if it is found that you are misrepresenting your age. Your membership is solely for your personal use, and you shall not authorize others to use your account.</p>\n<p>You represent and warrant that you are solely responsible for all User Content posted, uploaded, published, made available or displayed through your User account, including any messages, and for your interactions with other Users. You shall be solely responsible for your own User Content and the consequences of posting or publishing it. In connection with User Content, you affirm, represent, and warrant that: (i) you own or have, and will own or have during the term the necessary licenses, rights, consents, and permissions to use and authorize EMG to use all patent, trademark, trade secret, copyright or other proprietary rights in and to any and all User Content to enable inclusion and use of the User Content in the manner contemplated by the Service and these Terms of Service; (ii) you have the written consent, release, and/or permission of each and every identifiable individual person in the User Content to use the name or likeness of each and every such identifiable individual person to enable inclusion and use of the User Content in the manner contemplated by the Service and these Terms of Service; (iii) you will be responsible for the payment of any and all royalties required by any composer, publisher or owner of the underlying musical composition(s) embodied in the User Content, all license fees, and record royalties to artists and all union, guild or other third-party fees that may be required by contract or the Copyright Act that may be due by virtue of the exploitation of the User Content through the Service as authorized hereunder. For clarity, you retain all of your ownership rights in your User Content.</p>\n<p>You represent and warrant that you shall not act in any manner that conflicts or interferes with any existing commitment or obligation of yours, and that no agreement previously entered into by you will interfere with your performance of your obligations under this Agreement.</p>\n<p>You represent and warrant that you shall perform in compliance with any applicable laws, rules and regulations of any governmental authority.</p>\n<p>You represent and warrant that you will not use the Service to upload, post, link to, email, transmit, or otherwise make available any material that contains software viruses or any other computer code, files or programs designed to interrupt, destroy, or limit the functionality of any computer software or hardware or any telecommunications equipment.</p>\n<p>&nbsp;</p>\n<p>Disclaimer</p>\n<p>YOUR USE OF THE SERVICE IS AT YOUR SOLE RISK. THE SERVICE IS PROVIDED ON AN \"AS IS\" AND \"AS AVAILABLE\" BASIS. EMG EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. EMG MAKES NO WARRANTY THAT (i) THE SERVICE WILL MEET YOUR REQUIREMENTS, (ii) THE SERVICE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (iii) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICE WILL BE ACCURATE OR RELIABLE, (iv) THE QUALITY OF ANY PRODUCTS, SERVICES, INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THE SERVICE WILL MEET YOUR EXPECTATIONS, AND (v) ANY ERRORS IN THE SOFTWARE WILL BE CORRECTED. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM EMG OR THROUGH OR FROM THE SERVICE SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THIS AGREEMENT.</p>\n<p>&nbsp;</p>\n<p>Indemnification, Limited Liability</p>\n<p>You hereby indemnify and hold harmless, and upon EMG\'s request, defend, EMG its affiliates (and their respective directors, officers and employees) from and against any and all losses, liabilities, damages, costs or expenses (including reasonable attorneys\' fees and costs) arising out of any claim, action, or proceeding brought by a third party based on: (i) a breach of any warranty, representation, covenant or obligation of yours under this Agreement; or (ii) any allegation that any User Content provided, uploaded, syndicated, linked to or authorized by or on behalf of you hereunder or EMG\'s or any User\'s use thereof violates or infringes the rights of another party. You will reimburse EMG and its affiliates on demand for any actual payments made in resolution of any liability or claim that is subject to indemnification under this Section 14, provided that EMG obtains your written consent prior to making such payments, such consent not to be unreasonably withheld, delayed or conditioned. EMG shall promptly notify you of any such claim, and you shall assume control of the defense of such claim upon EMG\'s request. EMG shall have the right, at its expense, to participate in the defense thereof under your direction.</p>\n<p>EXCEPT PURSUANT TO YOUR INDEMNITY OBLIGATION IN SECTION 14(a), AND EXCEPT FOR A BREACH OF YOUR REPRESENTATIONS AND WARRANTIES IN SECTION 12, IN NO EVENT SHALL EITHER PARTY BE LIABLE TO THE OTHER PARTY FOR INDIRECT, INCIDENTAL, CONSEQUENTIAL OR SPECIAL DAMAGES, INCLUDING LOSS OF PROFITS OR PUNITIVE DAMAGES, EVEN IF ADVISED OF THEIR POSSIBILITY. NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED HEREIN, EMG\'S LIABILITY TO YOU FOR ANY CAUSE WHATSOEVER AND REGARDLESS OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO AMOUNT PAID, IF ANY, BY YOU TO EMG FOR THE SERVICE DURING THE TERM OF MEMBERSHIP.</p>\n<p>&nbsp;</p>\n<p>Applicable Law</p>\n<p>This Agreement and the relationship between you and EMG shall be governed by the laws of the State of New York without regard to its conflict of law provisions. You and EMG agree to submit to the personal and exclusive jurisdiction of the courts located within the State and County of New York.</p>\n<p>&nbsp;</p>\n<p>Notice</p>\n<p>Except as explicitly stated otherwise, any notices to EMG shall be sent by certified mail, return receipt requested, to Escape Media Group, Inc., 201 SE 2nd Avenue, Suite 201, Gainesville, Florida 32601, Attn: Legal Department. Notice shall be deemed given three (3) days after the date of mailing.</p>\n<p>&nbsp;</p>\n<p>Copyright Infringement</p>\n<p>EMG respects the intellectual property of others, and we ask our Users to do the same. If you believe that your work has been copied or used in a way that constitutes copyright infringement, or your intellectual property rights have been otherwise violated, please provide EMG\'s copyright agent with the following information (\"Notice\"): (1) an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright or other intellectual property interest; (2) a description of the copyrighted work or other intellectual property that you claim has been infringed; (3) a hyperlink to the material that you claim is infringing on the Service. Please note, providing a song, artist, or album name is not sufficient, you must provide a unique hyperlink to each item of material that you claim is infringing on the Service ; (4) your address, telephone number, and email address; (5) a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and (6) a statement by you, made under penalty of perjury, that the above information in your Notice is accurate and that you are the copyright or intellectual property owner or authorized to act on the copyright or intellectual property owner\'s behalf. Any Notice of claims of copyright or other intellectual property infringement must be sent to EMG at:</p>\n<p>&nbsp;</p>\n<p>Colin Hostert</p>\n<p>Copyright Agent<br />EMG Legal Department</p>\n<p>Please note that this procedure is exclusively for notifying EMG and its affiliates that your copyrighted material has been infringed.</p>\n<p>&nbsp;</p>\n<p>General</p>\n<p>This Agreement along with the&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_privacy\">Privacy Policy</a>&nbsp;and any additional terms, rules or regulations posted on the Service constitute the entire agreement between you and EMG and govern your use of the Service, superseding any prior agreements between you and EMG. You also may be subject to additional terms and conditions that may apply when you use affiliate services, third-party content or third-party software.</p>\n<p>The failure of EMG to exercise or enforce any right or provision of this Agreement shall not constitute a waiver of such right or provision.</p>\n<p>If any provision of this Agreement is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties\' intentions as reflected in the provision, and the other provisions of this Agreement remain in full force and effect.</p>\n<p>You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Service or this Agreement must be filed within one (1) year after such claim or cause of action arose or be forever barred.</p>\n<p>The section titles in this Agreement are for convenience only and have no legal or contractual effect.</p>', 'Term and Condition', 'Term and Condition', 'term, condition', '2018-07-21 14:31:12', '2020-07-15 02:28:16'),
(3, 1, 'About Us', 'about-us', '<h3><strong>Our story</strong></h3>\n<p>It was 2007 when 23-year-old Ni Na began working on a project to simplify music access for her friends.</p>\n<p>Working initially from his Paris bedroom, Daniel soon recognised the potential of his idea and gathered a small team together. It didn\'t take long for investors and music labels to catch on. Today Deezer is available in more than 180 countries, partnering with thousands of independent and major labels, with one of the largest catalogues out there (53 million tracks and counting).</p>\n<p>We combine human recommendations from the Deezer Editors with smart technology to help people discover music they\'ll love. Everyone can enjoy unlimited music on mobile and web, while Deezer Premium subscribers benefit from music as well as entertainment and sports on demand on all devices, without ads, in enhanced audio quality.</p>\n<p>The adventure continues...</p>', NULL, NULL, NULL, '2019-07-21 14:31:12', NULL);
INSERT INTO `pages` (`id`, `user_id`, `title`, `alt_name`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(4, 1, 'Privacy Policy', 'privacy-policy', '<p>Lala+ has established a comprehensive Privacy Policy (\"the Policy\") which is designed to help protect your privacy rights. By using the Lala+ Service, you, the user, agree to the terms of the Policy. The following bullet points are an overview of our Policy and the significant control you have over how your data is shared:</p>\n<ul>\n<li>You may opt-out of the collection of information associated with you, or limit its use and disclosure, by going to&nbsp;<a href=\"http://www.networkadvertising.org/managing/opt_out.asp\" target=\"_blank\" rel=\"noopener\">http://www.networkadvertising.org/managing/opt_out.asp</a>.</li>\n<li>Your Personally Identifiable Data and Protected Private Information will never be sold to third parties.</li>\n<li>While no system can be perfect, we have secure systems in place to protect your sensitive Private Information.</li>\n<li>If you have any inquiries, complaints, or concerns about the collection, protection and dissemination of your data, please access the&nbsp;<a href=\"http://lalaplus.com/#!/about/contact\">Contact page</a>&nbsp;to find our contact information.</li>\n</ul>\n<p>Please read the Privacy Policy below for a full treatment.</p>\n<p>Privacy Policy</p>\n<p>Lala+ is provided by Escape Media Group Inc (\"EMG\"). EMG collects information about you when you use lalaplus.com, associated subdomains including but not limited to widgets.lalaplus.com, beluga.lalaplus.com and listen.lalaplus.com (the \"Site\"). Once collected, there are certain parties with whom EMG may selectively share this information. Collectively, the Site and the API (\"API\" is the Lala+ Application Programming Interface, accessible through http://developers.lalaplus.com) are hereby referred to as the \"Service.\"</p>\n<p>If you would like to opt-out of the collection of your Personally Identifiable Information, please email&nbsp;<a href=\"mailto:Support@lalaplus.com\">support@lalaplus.com</a>. If you find any part of the Policy unacceptable, please discontinue your use of the Site immediately, as this Policy is integrated into, and subject to the&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_terms\">Terms of Service</a>&nbsp;for the use of the Site and the&nbsp;<a href=\"http://lalaplus.com/#!/about/legal_terms\">Terms of Service</a>&nbsp;for the usage of the API. Your use of any or all components of the Service, including but not limited to the Site and the API, constitutes a knowing acceptance and agreement to the terms and provisions of the Policy.</p>\n<p>Lala+ has been awarded TRUSTe\'s Privacy Seal signifying that this privacy policy and the practices set forth herein have been reviewed by TRUSTe for compliance with&nbsp;<a href=\"http://www.truste.com/privacy_seals_and_services/consumer_privacy/privacy-programs-requirements.html\" target=\"_blank\" rel=\"noopener\">TRUSTe\'s program requirements</a>&nbsp;including transparency, accountability and choice regarding the collection and use of your personal information. The TRUSTe program does not cover information that may be collected through downloadable software or that you voluntarily provide to third-parties through lalaplus.com. TRUSTe\'s mission, as an independent third party, is to accelerate online trust among consumers and organizations globally through its leading privacy trustmark and innovative trust solutions. If you have questions or complaints regarding our privacy policy or practices, please contact us at&nbsp;<a href=\"mailto:Support@lalaplus.com\">support@lalaplus.com</a>. If you are not satisfied with our response you can contact TRUSTe&nbsp;<a href=\"http://watchdog.truste.com/pvr.php?page=complaint\" target=\"_blank\" rel=\"noopener\">here</a>.</p>\n<p>1. Definitions</p>\n<ul>\n<li>User: For the purposes of the Policy, a user shall be defined as someone who is either directly interacting with the service or someone who is interacting with the service via any third party who is using the API.</li>\n<li>Personally Identifiable Information: Unencrypted data that encompasses a user\'s email address, address of residence, or phone number.</li>\n<li>Public Information: Data which a user has submitted to the Service, or has been accumulated by the Service through its use, and is available to be viewed and/or consumed by any user of the Service or the general public. This may include, but is not necessarily limited to playlists, tags, comments made through your Facebook or Twitter login, listening history, a user\'s combined first and last name, and/or information accessible on a user\'s public profile.</li>\n<li>Anonymous Information: Data which a user has submitted to the Service, or has been accumulated by the Service, that is not reasonably able to be connected to or associated with any Personally Identifiable Information.</li>\n<li>Protected Private Information: Data which consists of Paypal username, Paypal password, credit card number, credit card expiration date, credit card CSC, credit card type, and password (plain text or encrypted)</li>\n</ul>\n<p>2. Information we collect and who can access it:</p>\n<ul>\n<li>Public Information: To provide the needed data to make the Service possible, EMG collects and stores information that includes, but is not necessarily limited to:\n<ul>\n<li>User information submitted to register for our Service;</li>\n<li>Information entered into user profiles;</li>\n<li>Music library information (as well as accompanying information such as tags, ratings, usage data, and comments);</li>\n<li>Information submitted to polls, contests, surveys, or other features of the Service, or information about when you respond to offers or advertisements on the Service;</li>\n</ul>\nIn addition, EMG stores and in some cases displays this information as necessary to fulfill our legal obligations, resolve disputes, and enforce our agreements. EMG may provide third parties with Public information about users as long as it is not Personally Identifiable Information or Protected Private Information.</li>\n<li>Public Information and the API: EMG may share Public Information (excluding any Personally Identifiable Information) via the API.</li>\n<li>Personally Identifiable Information: EMG collects, stores, and in some cases displays Personally Identifiable Information within the Service. This information is needed to enable certain features the Service provides, and is stored for as long as you have an account, and as necessary to fulfill our legal obligations, resolve disputes, or enforce our agreements. Personally Identifiable Information, such as a user\'s email address, address of residence, or phone number, will not be shared with any third party without consent from the user unless otherwise stated in this policy or the Terms of Service.</li>\n<li>You should also be aware that if you voluntarily disclose personally identifiable information on openly viewable parts of the service, that information can be viewed publicly and can be collected and used by third parties without our knowledge and may result in unsolicited messages from other individuals or third parties. Such activities are beyond the control of EMG and this Policy.</li>\n<li>Access to Personally Identifiable Information: If your personally identifiable information changes you may update it as necessary. If or you no longer desire our service, you may deactivate your account by making the change on our member information page, emailing us at&nbsp;<a href=\"mailto:support@lalaplus.com\">support@lalaplus.com</a>, or by contacting us by email or postal mail at the contact information listed below. We will respond to your request to access within 30 days.</li>\n<li>Data Retention: We will retain your information for as long as your account is active or as needed to provide you services. If you wish to cancel your account or request that we no longer use your information to provide you services contact us at&nbsp;<a href=\"mailto:support@groovehshark.com\">support@groovehshark.com</a>. We will retain and use your information as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</li>\n<li>Personally Identifiable Information and the API: Certain features in the Service may allow for or be introduced to allow for integration between the Service and other third party services. In order for some features to be provided, some Personally Identifiable Information may need to be transferred between EMG and the third party who is using the service.</li>\n<li>Should you utilize any feature or piece of functionality in the Service and (A) provide your username and/or password to a third party service, such as a credit card processor, or (B) authorize the exchange of data from the third party service to the Service via the third parties website, API, or product, you authorize EMG to share your Personally Identifiable Information with such a third party service with the exception of any Protected Private Information which will not be shared.</li>\n<li>Anonymous information: EMG records anonymous information about users of the service, which is stored as necessary to fulfill our legal obligations, resolve disputes, and enforce our agreements. This information does not link any statistic with any particular user. This data may include, but is not limited to, averages and or totals of browser and operating system types, entry and exit pages, user, artist, or album popularity, demographic information, and amount of data transferred. This information may be shared with any third party EMG chooses at any time and for any length of time (including making this data available via the API).</li>\n<li>IP Address Information: When you use the Site and/or Service, the IP Address of the computer or network device making the request is stored. IP address information is stored for no more than six months from the date the information is recorded. This data may be stored for longer, as necessary to fulfill our legal obligations, resolve disputes, and enforce our agreements, if EMG is so ordered to do so by a United States court of law with proper jurisdiction. This may be done without any notification to the user. This information may also be kept longer than six months by EMG if a user is found in EMG\'s judgment to be suspect of carrying out illegal, unlawful, or dangerous activity with or within the Site and/or the Service.</li>\n<li>Newsletters: If you wish to subscribe to our newsletter(s), we will use your name and email address to send the newsletter to you. Out of respect for your privacy, we provide you a way to unsubscribe. Please see the \"Choice and Opt-out\" section below.</li>\n<li>Choice/Opt-Out: You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or you can contact us at&nbsp;<a href=\"mailto:support@groovehshark.com\">support@lalaplus.com</a>&nbsp;or you may update your settings within your profile.</li>\n<li>Facebook Connect: You can log in to our site using sign-in services such as Facebook Connect provider. These services will authenticate your identity and provide you the option to share certain personal information with us such as your name and email address to pre-populate our sign up form. Services like Facebook Connect give you the option to post information about your activities on this Web site to your profile page to share with others within your network.</li>\n<li>Tell-A-Friend: If you choose to use our referral service to tell a friend about our site, we will ask you for your friend\'s name and email address. We will automatically send your friend a one-time email inviting him or her to visit the site. Escape Media Group stores this information for the sole purpose of sending this one-time email and tracking the success of our referral program. Your friend may contact us at&nbsp;<a href=\"mailto:support@groovehshark.com\">support@lalaplus.com</a>&nbsp;to request that we remove this information from our database.</li>\n<li>Legal Disclosure: We may also disclose your personal information:</li>\n<li>a) as required by law, such as to comply with a subpoena, or similar legal process</li>\n<li>b) when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request,</li>\n<li>c) to any other third party with your prior consent to do so.</li>\n<li>If you, the user, object to the above treatment of your information, then please follow this&nbsp;<a href=\"http://www.networkadvertising.org/managing/opt_out.asp\" target=\"_blank\" rel=\"noopener\">link</a>&nbsp;to opt-out of the collection of your information, which may result in limited access to the Site and/or the Service. If you are a user residing in the European Economic Area (\"EEA\") or Switzerland (\"CH\") (together \"EEA/CH\"), please see section 11 for additional information relating to the treatment of your information.</li>\n</ul>\n<p>3. Advertising</p>\n<ul>\n<li>Advertisers are not given special access to a user\'s Personally Identifiable Information unless otherwise stated in this Policy or the Terms of Service. If you choose to follow an advertisement link, you do so at your own risk. EMG does not guarantee the safety or accuracy of any third party site, advertisement, or product. Advertisers also have their own privacy policies and terms of service that must be carefully reviewed.</li>\n<li>The Service may use \"cookie\" technology to collect website usage data and make your advertising more relevant. You can remove or block cookies by altering your browser\'s cookie settings. The Service may also use \"flash cookie\" technology as part of the music player to store User preferences and session information.</li>\n<li>We may partner with third party advertisers who may (themselves or through their partners) place or recognize a unique cookie on your browser. These cookies enable more customized ads, content or services to be provided to you. No personally identifiable information is on, or is connected to, these cookies.</li>\n<li>We may use the non-Personally Identifiable Information that we collect to customize and personalize the advertising and the content you see.</li>\n<li>EMG may allow third parties to place cookies and/or other tracking technologies, such as web beacons, clear GIFs, and/or tracking pixels, on the Site for the purpose of allowing that third party to record that a user has visited the Site and/or used the Service, or to gather other information, provided that such a third party is doing so only to collect Anonymous Information that shall not include any Personally Identifiable Information. In some instances third-parties may request an encrypted or \"hashed\" (non-human readable) user identifier that may correspond to other information already obtained from another party on a particular user. To learn more about behavioral advertising or to opt-out of this type of advertising, you can also visit&nbsp;<a href=\"http://www.privacychoice.org/choose\" target=\"_blank\" rel=\"noopener\">http://www.privacychoice.org/choose</a>,&nbsp;<a href=\"http://www.networkadvertising.org/\" target=\"_blank\" rel=\"noopener\">http://www.networkadvertising.org</a>, and&nbsp;<a href=\"http://rt.displaymarketplace.com/optout.html\" target=\"_blank\" rel=\"noopener\">http://rt.displaymarketplace.com/optout.html</a>.</li>\n</ul>\n<p>4. Surveys</p>\n<ul>\n<li>You may choose to answer surveys posed through lalaplus.com by EMG and/or a third party. This policy does not cover survey responses you provide to any third party. Survey responses you provide to EMG may be published, transferred, sold or licensed to third parties; however, no Personally Identifiable Information will be included with the survey responses except for that Personally Identifiable Information you provide as a survey response.</li>\n</ul>\n<p>5. Data Security</p>\n<ul>\n<li>EMG takes reasonable steps to protect information from loss, misuse, and unauthorized access, disclosure, alteration, and destruction. EMG has in place appropriate physical, electronic, and managerial procedures to safeguard and secure the information from loss, misuse, unauthorized access or disclosure, alteration, or destruction.</li>\n<li>The security of your personal information is important to us. When you enter sensitive information (such as a credit card number) on our order forms, we encrypt the transmission of that information using secure socket layer technology (SSL).</li>\n</ul>\n<p>6. Enforcement</p>\n<ul>\n<li>EMG uses a self-assessment approach to ensure compliance with the Policy and Safe Harbor Principles. EMG periodically verifies that the Policy is accurate, accessible, and comprehensive as to issues regarding the user, prominently displayed, and completely implemented. We encourage users to address any inquiries, concerns, or complaints using the contact information listed on the Contact page. Upon such a request from an EEA/CH user, EMG will investigate and attempt to resolve any complaints and disputes regarding use and disclosure of information in accordance with the Principles of the Safe Harbor.</li>\n<li>Only for use relating to data that is received by EMG from users residing in the EEA/CH (\"EEA/CH data subjects\"), if a complaint cannot be resolved through our internal process, EMG agrees to dispute resolution through an independent recourse mechanism. Lala+ complies with the EU Safe Harbor framework as set forth by the Department of Commerce regarding the collection, use, and retention of data from the European Union.</li>\n</ul>\n<p>7. Minors</p>\n<ul>\n<li>EMG does not knowingly collect or solicit Personally Identifiable Information from or about children under age 13 except as permitted by law. If we discover we have received any information from a child under 13 in violation of this policy, we will delete that information immediately. If you believe EMG has any information from or about anyone under 13, please contact us at&nbsp;<a href=\"mailto:privacy@escapemg.com\">privacy@escapemg.com</a>.</li>\n</ul>\n<p>8. Forum Selection and Choice of Law</p>\n<ul>\n<li>This Policy, which is an agreement between you and EMG, shall be governed by the laws of the State of Colorado without regard to its conflict of law provisions. You and EMG agree to submit to the personal and exclusive jurisdiction of the courts located within the State and County of Colorado.</li>\n</ul>\n<p>9. Indemnification</p>\n<ul>\n<li>You, the user, hereby indemnify and hold harmless, and upon EMG\'s request, defend, EMG and its affiliates (and their respective directors, officers and employees) from and against any and all losses, liabilities, damages, costs or expenses (including reasonable attorneys\' fees and costs) arising out of any external party gaining access to and/or utilizing EMG\'s API in a way which violates EMG\'s API TOS.</li>\n</ul>\n<p>10. Privacy Policy Updates</p>\n<ul>\n<li>EMG is committed to protecting your privacy while providing you with a competitive and secure Service. As such, EMG will evaluate the terms of this Policy on a rolling basis and make necessary revisions to the Policy as new technology, law, and business concerns arise. Therefore, EMG may make periodic revisions or alterations to the Policy. EMG reserves the right to revise this agreement at any time, so please occasionally re-read this page; however, if material alterations occur, we will also provide Notice on our home page, by email, or by blog post. Nonetheless, any revisions will be posted to this page along with the most current date of revision.</li>\n</ul>\n<p>11. Contact</p>\n<ul>\n<li>If you have any inquiries, complaints, or concerns about the collection and dissemination of your data, please email us at&nbsp;<a href=\"mailto:support@lalaplus.com\">support@lalaplus.com</a>. Inquiries can also be sent to our mailing address at 201 SE 2nd Ave. Suite 209, Gainesville, FL 32601.</li>\n</ul>\n<p>12. Notice of Safe Harbor Compliance</p>\n<ul>\n<li>For the personally identifiable information of users received from the European Economic Area (\"EEA\"), EMG is committed to handling such personal information in accordance with the U.S. Department of Commerce\'s Safe Harbor Principles. EMG\'s Safe Harbor certification can be found at&nbsp;<a href=\"http://safeharbor.export.gov/list.aspx\" target=\"_blank\" rel=\"noopener\">http://safeharbor.export.gov/list.aspx</a>. For more information about the Safe Harbor Principles, please visit the U.S. Department of Commerce\'s Website at&nbsp;<a href=\"http://export.gov/safeharbor\" target=\"_blank\" rel=\"noopener\">http://export.gov/safeharbor</a>.</li>\n<li>EMG recognizes the European Union\'s comprehensive privacy and data protection legislation, the Directive on Data Protection 95/46/EC (\"the Directive\") which applies to the EEA. EMG also recognizes Switzerland\'s (\"CH\") Federal Act on Data Protection (\"FADP\"). Together, these data protection regimes (\"EEA/CH\") restrict companies and other organizations from transferring personal data from the EEA/CH to countries that do not meet mandated \"adequacy standards\" for when it is received in third party countries, such as the United States. Based on the commitments and assertions of the Policy, EMG hereby asserts compliance with the Principles of the Safe Harbor.</li>\n<li>This Notice applies to EEA/CH data subjects.</li>\n<li>EMG gives EEA/CH data subjects the option of being able to request access to your information profile so that you may correct, amend, or delete information.</li>\n</ul>', NULL, NULL, NULL, '2019-07-21 14:31:12', '2019-08-13 19:45:54'),
(5, 1, 'Legal information', 'legal-information', '<p>Music is a form of intellectual property protected and regulated by aspects of intellectual property law, including copyright laws and various licensing regulations. Together, these laws work to safeguard the rights of musicians, performers, producers, and others in the music industry as well as the music itself. A current issue in music law revolves around technological developments in online file-sharing systems that increase the prevalence of illegal distribution &ndash; that is, without the copyright owner&rsquo;s permission &ndash; of protected music. Music law attempts to address this and other issues related to the dissemination of music, and to reconcile the protection of the rights of artists with the rights of consumers. To learn more about the regulations governing the music industry and the field of music law, visit the links on this page.</p>', NULL, NULL, NULL, '2019-07-21 14:31:12', NULL),
(6, 1, 'Cookies and Personal data', 'cookies-and-personal-data', '<p>The EU law on the handling of personal data, The General Data Protection Regulation, is often referred to by its acronym GDPR.</p>\n<p>How does the GDPR affect your website&rsquo;s use of cookies and online tracking? How do you comply? And how does it affect the cookie policy and your cookie consent on your website?</p>\n<p>In this article, we give a comprehensive introduction to the GDPR and a hands-on guide as to what the rules mean for you and your website.</p>\n<p>GDPR and cookies | What do I need to know? | Is my use of cookies compliant?</p>\n<p><strong>GDPR and cookies</strong></p>\n<p>The GDPR is a EU regulation that represents the most significant initiative on data protection in 20 years.</p>\n<p>The purpose is to protect &ldquo;natural persons with regard to the processing of personal data and on the free movement of such data&rdquo;, e.g. the website user.</p>\n<p>Cookies are mentioned once in the 88 pages long regulation. However, those few lines have a significant impact on the compliance of cookies:</p>\n<p>(30): &ldquo;Natural persons may be associated with online identifiers [&hellip;] such as internet protocol addresses, cookie identifiers or other identifiers [&hellip;]. This may leave traces which, in particular when combined with unique identifiers and other information received by the servers, may be used to create profiles of the natural persons and identify them.&rdquo;</p>\n<p>In other words: when cookies can identify an individual, it is considered personal data.</p>\n<p><strong>What&rsquo;s the deal with cookies anyway?</strong></p>\n<p>Cookies are small files that are automatically dropped on your computer as you browse the web. In and of themselves they are harmless bits of text that are locally stored and can easily be viewed and deleted.</p>\n<p>But cookies can give a great deal of insight into your activity and preferences, and can be used to identify you without your explicit consent.</p>\n<p>This represents a major breach from a legal point of view, and as data technologies grow more and more sophisticated, your privacy as a user is increasingly compromised.</p>\n<p>Often, the cookies don&rsquo;t even originate from the website you are visiting, but from third parties that track you for marketing purposes. All of which is going on &ldquo;behind the scenes&rdquo;.</p>\n<p>While not all cookies are used in a way that could identify users, the majority (and the most useful ones to the website owners) are, and will therefore be subject to the GDPR.</p>\n<p>Cookies for analytics, advertising and functional services, such as survey and chat tools, are all examples of cookies that can identify users.</p>\n<p>The problem with cookies is both one of privacy - what is being registered? - and one of transparency - who is tracking you, for what purpose, where does the data go, and for how long does it stay?</p>', NULL, NULL, NULL, '2019-07-21 14:31:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('portalindo@gmail.com', 'VPuj89urdtOXUrH3kwccFyFZQoiAff8tUU5YvjVLAUaxeVHzI4hhkEjzTgko', '2022-07-22 13:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `patners`
--

CREATE TABLE `patners` (
  `id` int(255) NOT NULL,
  `priority` mediumint(9) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discover` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patners`
--

INSERT INTO `patners` (`id`, `priority`, `name`, `created_at`, `updated_at`, `discover`) VALUES
(2, 1, 'Spotify', '2022-11-24 13:38:18', '2022-11-24 13:38:18', 1),
(3, 2, 'Youtube', '2022-11-24 13:38:25', '2022-11-24 13:38:25', 1),
(4, 3, 'Tiktok', '2022-11-24 13:38:42', '2022-11-24 13:38:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(25) NOT NULL,
  `merchant_bill_ref` text NOT NULL,
  `minify_body` text NOT NULL,
  `signature` text NOT NULL,
  `open_bill_id` text NOT NULL,
  `amount` int(11) NOT NULL,
  `bill_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transaction_id`, `merchant_bill_ref`, `minify_body`, `signature`, `open_bill_id`, `amount`, `bill_status`, `created_at`, `updated_at`) VALUES
(1, '4367656851', '2022Dec311635284367656851', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"4367656851\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2022Dec311635284367656851\",\"amount\":\"0\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', '4IRf72uA8f8HqME+Bv12C1DC9czdZ1W82dUGFbnpyXM=', '', 0, 'Paid', '2022-12-31 16:35:28', '2022-12-31 16:35:28'),
(2, '334421750', '2023Jan06000239334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000239334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'WLcn6bUVfI2x8LQghzhMNIaYpIoDBRuqOATTkAEA32M=', '10105997', 85000, 'PENDING', '2023-01-06 00:02:40', '2023-01-06 00:02:40'),
(3, '334421750', '2023Jan06000330334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000330334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'eDtBMpI37xoGzFpIBlnYxcatEBFxCfFAdyZ/LgKSs74=', '10106004', 85000, 'PENDING', '2023-01-06 00:03:30', '2023-01-06 00:03:30'),
(4, '334421750', '2023Jan06000338334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000338334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'LYSJDkO+lc4DugXSdIXP/qHRfSStHmjmQccri/2i4SQ=', '10106005', 85000, 'PENDING', '2023-01-06 00:03:38', '2023-01-06 00:03:38'),
(5, '334421750', '2023Jan06000343334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000343334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', '3idcvyymUued9z5aeIy8yybTX+mNMthGEMbx4eL6PLE=', '10106006', 85000, 'PENDING', '2023-01-06 00:03:43', '2023-01-06 00:03:43'),
(6, '334421750', '2023Jan06000347334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000347334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'Hr5GgWTGgyi82ccFSkAkjTWJ7IA4a7I2mukah350aCQ=', '10106007', 85000, 'PENDING', '2023-01-06 00:03:48', '2023-01-06 00:03:48'),
(7, '334421750', '2023Jan06000349334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000349334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', '2Bvrh0NtOHarizAuBIoktaGH5ghoiQkLHCn9zh6iMuk=', '10106008', 85000, 'PENDING', '2023-01-06 00:03:49', '2023-01-06 00:03:49'),
(8, '334421750', '2023Jan06000410334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000410334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'p64S2STYCcc9ux54g9OBUhP0ZGQ0gQ3bqAk0YqG0COc=', '10106009', 85000, 'PENDING', '2023-01-06 00:04:10', '2023-01-06 00:04:10'),
(9, '334421750', '2023Jan06000422334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06000422334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', '2FydX/PoF258U1Pzrpss2891f+GlP0i7GpQd+1C96eg=', '10106010', 85000, 'PENDING', '2023-01-06 00:04:22', '2023-01-06 00:04:22'),
(10, '334421750', '2023Jan06001156334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001156334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'MQuQSz+azrUUpgQr/j4Nv07DhCgGIBx4ab57BXff81s=', '10106016', 85000, 'PENDING', '2023-01-06 00:11:56', '2023-01-06 00:11:56'),
(11, '334421750', '2023Jan06001227334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001227334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'mp2e6hvh6GV5b/Xsr1m3Evl6froLj+Fi0r9SREK/z3g=', '10106019', 85000, 'PENDING', '2023-01-06 00:12:27', '2023-01-06 00:12:27'),
(12, '334421750', '2023Jan06001243334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001243334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'pN95aJDEkffdgP96l0HgNz/1E9E4XZacNHFS6EXxScM=', '10106020', 85000, 'PENDING', '2023-01-06 00:12:44', '2023-01-06 00:12:44'),
(13, '334421750', '2023Jan06001435334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001435334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', '0K3MZri0g3YQJdkcr6arcZ90NJhQCHsLz4klkh4NbIM=', '10106025', 85000, 'PENDING', '2023-01-06 00:14:35', '2023-01-06 00:14:35'),
(14, '334421750', '2023Jan06001916334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001916334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'yaRIU7gxC1vD8t4smS02Kya7Neu17rxpnAg5VjfxX4k=', '10106035', 85000, 'PENDING', '2023-01-06 00:19:17', '2023-01-06 00:19:17'),
(15, '334421750', '2023Jan06001934334421750', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"334421750\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan06001934334421750\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'cy2kF5/Sa5hhKp8hpEfI++eK5F7+LO91BJTwO2i9sOA=', '10106036', 85000, 'Paid', '2023-01-06 00:19:34', '2023-01-06 01:04:40'),
(16, '6855270868', '2023Jan060109406855270868', '{\"merchant\":\"6281313135672\",\"terminal\":\"nextarttid000001\",\"trx_id\":\"6855270868\",\"trx_type\":\"026\",\"merchant_bill_ref\":\"2023Jan060109406855270868\",\"amount\":\"8500000\",\"currency_code\":\"IDR\",\"validity_period\":\"86400\"}', 'eeatYWCnOQtvCk/VFgRAl6f98Kv+uRcSXcw2TPZWWLk=', '10106193', 85000, 'Paid', '2023-01-06 01:09:41', '2023-01-06 01:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `collaboration` tinyint(1) NOT NULL DEFAULT '0',
  `genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `loves` mediumint(9) NOT NULL DEFAULT '0',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` smallint(6) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`, `collaboration`, `genre`, `mood`, `title`, `description`, `loves`, `allow_comments`, `comment_count`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2', NULL, 'Ini LAH', NULL, 0, 1, 0, 1, '2022-07-24 14:52:23', '2022-07-24 14:52:23'),
(2, 8, 0, '3', NULL, 'test Music', NULL, 0, 1, 0, 1, '2022-08-24 10:51:34', '2022-08-24 10:51:34'),
(3, 8, 0, '2', NULL, 'test', NULL, 0, 1, 0, 1, '2022-08-24 10:55:25', '2022-08-24 10:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `priority` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_spotify_logs`
--

CREATE TABLE `playlist_spotify_logs` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `spotify_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artwork_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fetched` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` tinyint(1) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `country_code` varchar(3) DEFAULT NULL,
  `language_id` mediumint(9) DEFAULT NULL,
  `rss_feed_url` varchar(255) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `allow_download` tinyint(1) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  `explicit` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `podcast_categories`
--

CREATE TABLE `podcast_categories` (
  `id` int(11) NOT NULL,
  `parent_id` smallint(6) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `disable_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(10) UNSIGNED NOT NULL,
  `object_type` varchar(50) DEFAULT NULL,
  `object_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `votes` mediumint(9) NOT NULL DEFAULT '0',
  `multiple` tinyint(1) DEFAULT '0',
  `answer` text NOT NULL,
  `visibility` tinyint(1) DEFAULT '1',
  `started_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_logs`
--

CREATE TABLE `poll_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT '0',
  `artist_id` int(11) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL,
  `podcast_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `plays` smallint(6) NOT NULL DEFAULT '0',
  `favorites` smallint(6) NOT NULL DEFAULT '0',
  `collections` smallint(6) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`id`, `song_id`, `artist_id`, `mood`, `genre`, `playlist_id`, `station_id`, `episode_id`, `podcast_id`, `album_id`, `plays`, `favorites`, `collections`, `created_at`) VALUES
(21, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, 0, 0, '2022-07-25'),
(22, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, 0, 0, '2022-08-03'),
(23, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 0, 0, '2022-08-09'),
(20, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 2, 0, 0, '2022-07-24'),
(24, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 0, 0, '2022-08-29'),
(25, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 0, 0, '2022-08-31'),
(26, 38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, 0, 0, '2022-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL DEFAULT '',
  `short_content` mediumtext,
  `full_content` mediumtext,
  `category` varchar(255) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `allow_main` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `disable_index` tinyint(1) DEFAULT '0',
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_logs`
--

CREATE TABLE `post_logs` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `expires` varchar(15) NOT NULL DEFAULT '',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  `move_category` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `parent_id` smallint(6) NOT NULL DEFAULT '0',
  `priority` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `alt_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reactionable_id` int(11) DEFAULT NULL,
  `reactionable_type` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` char(52) NOT NULL DEFAULT '',
  `alt_name` varchar(255) DEFAULT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reportable_id` int(11) NOT NULL,
  `reportable_type` varchar(50) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '{\"group_badge\":\"<svg xmlns=\\\"http:\\/\\/www.w3.org\\/2000\\/svg\\\" xmlns:xlink=\\\"http:\\/\\/www.w3.org\\/1999\\/xlink\\\" x=\\\"0px\\\" y=\\\"0px\\\" viewBox=\\\"0 0 42 42\\\" style=\\\"enable-background:new 0 0 42 42;\\\" xml:space=\\\"preserve\\\"><path style=\\\"fill:#E64C3C;\\\" d=\\\"M42,21c0,11.598-9.402,21-21,21S0,32.598,0,21C0,12.623,4.905,5.391,12,2.021C14.728,0.725,17.779,0,21,0C32.598,0,42,9.402,42,21z\\\"\\/><path style=\\\"fill:#556080;\\\" d=\\\"M29.988,2.042c-14.467,24.91,3.568,32.991,5.789,33.873C39.618,32.109,42,26.834,42,21C42,12.623,37.083,5.413,29.988,2.042z\\\"\\/><path style=\\\"fill:#556080;\\\" d=\\\"M0,21c0,5.815,2.365,11.076,6.184,14.879L7,36c0,0,20.416-7.458,5-33.979C4.905,5.391,0,12.623,0,21z\\\"\\/><ellipse transform=\\\"matrix(0.7825 0.6227 -0.6227 0.7825 14.4055 -1.237)\\\" style=\\\"fill:#FEFEFE;\\\" cx=\\\"8.973\\\" cy=\\\"20\\\" rx=\\\"5.5\\\" ry=\\\"4\\\"\\/><ellipse transform=\\\"matrix(-0.7825 0.6227 -0.6227 -0.7825 71.2276 15.1178)\\\" style=\\\"fill:#FEFEFE;\\\" cx=\\\"32.973\\\" cy=\\\"20\\\" rx=\\\"5.5\\\" ry=\\\"4\\\"\\/><\\/svg>\",\"allow_offline\":\"1\",\"option_feedback\":\"1\",\"option_avatar\":\"1\",\"option_max_info_chars\":\"300\",\"option_stream\":\"1\",\"option_hd_stream\":\"1\",\"option_download\":\"1\",\"option_download_speed\":\"100\",\"option_download_resume\":\"1\",\"option_track_skip_limit\":\"0\",\"option_concurent\":\"0\",\"user_max_playlists\":\"0\",\"user_max_playlist_songs\":\"0\",\"artist_allow_upload\":\"1\",\"artist_mod\":\"1\",\"artist_day_edit_limit\":\"100\",\"artist_files_upload_each_time\":\"10\",\"artist_files_each_album\":\"15\",\"artist_max_songs\":\"0\",\"artist_max_albums\":\"0\",\"artist_allow_podcast\":\"1\",\"artist_podcast_mod\":\"1\",\"artist_podcast_max_episodes\":\"5\",\"artist_podcast_day_edit_limit\":\"0\",\"artist_max_podcasts\":\"0\",\"monetization_sale\":\"1\",\"monetization_sale_cut\":\"60\",\"monetization_song_min_price\":\"0.99\",\"monetization_song_max_price\":\"9.99\",\"monetization_album_min_price\":\"0.99\",\"monetization_album_max_price\":\"9.99\",\"monetization_streaming\":\"1\",\"monetization_streaming_rate\":\"0.00783\",\"monetization_paypal_min_withdraw\":\"50\",\"monetization_bank_min_withdraw\":\"250\",\"blog_allow_public_directly\":\"1\",\"blog_allow_hide\":\"1\",\"blog_allow_vote\":\"1\",\"blog_allow_html\":\"1\",\"blog_allow_public_home\":\"1\",\"blog_allow_public_fixed\":\"1\",\"blog_allow_upload_images\":\"1\",\"blog_allow_upload_files\":\"1\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download_speed\":\"100\",\"blog_flood\":\"60\",\"blog_news_per_day\":\"5\",\"comment_allow\":\"1\",\"comment_url\":\"1\",\"comment_edit\":\"1\",\"option_comment_delete\":\"1\",\"comment_day_limit_edit\":\"0\",\"admin_access\":\"1\",\"admin_settings\":\"1\",\"admin_email\":\"1\",\"admin_metatags\":\"1\",\"admin_languages\":\"1\",\"admin_roles\":\"1\",\"admin_media_manager\":\"1\",\"admin_sitemap\":\"1\",\"admin_backup\":\"1\",\"admin_api_tester\":\"1\",\"admin_system_logs\":\"1\",\"admin_dictionary\":\"1\",\"admin_scheduled\":\"1\",\"admin_earnings\":\"1\",\"admin_transactions\":\"1\",\"admin_subscriptions\":\"1\",\"admin_pricing\":\"1\",\"admin_banners\":\"1\",\"admin_categories\":\"1\",\"admin_posts\":\"1\",\"admin_artist_claim\":\"1\",\"admin_patners\":\"1\",\"admin_genres\":\"1\",\"admin_group_genre\":\"1\",\"admin_moods\":\"1\",\"admin_radio\":\"1\",\"admin_channels\":\"1\",\"admin_slideshow\":\"1\",\"admin_playlists\":\"1\",\"admin_artists\":\"1\",\"admin_albums\":\"1\",\"admin_songs\":\"1\",\"admin_users\":\"1\",\"admin_pages\":\"1\",\"admin_comments\":\"1\",\"admin_terminal\":\"1\",\"group_name\":\"Administrator\"}', '2019-07-24 17:00:00', '2022-12-27 15:38:01'),
(2, 'Moderator', '{\"group_badge\":null,\"allow_offline\":\"1\",\"option_feedback\":\"1\",\"option_avatar\":\"1\",\"option_max_info_chars\":\"160\",\"option_stream\":\"1\",\"option_hd_stream\":\"1\",\"option_download\":\"1\",\"option_download_speed\":\"1000\",\"option_download_resume\":\"1\",\"artist_allow_upload\":\"1\",\"artist_allow_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_allow_mood\":[\"1\",\"2\",\"3\",\"4\",\"5\"],\"artist_mod\":\"1\",\"artist_trusted_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_num_files_allow\":\"100\",\"artist_day_edit_limit\":\"10\",\"artist_files_upload_each_time\":\"10\",\"artist_files_each_album\":\"15\",\"artist_max_songs\":\"0\",\"artist_max_albums\":\"0\",\"user_max_playlists\":\"0\",\"user_max_playlist_songs\":\"0\",\"artist_allow_podcast\":\"1\",\"artist_podcast_allow_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_mod\":\"1\",\"artist_podcast_trusted_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_max_episodes\":\"50\",\"artist_podcast_day_edit_limit\":\"0\",\"artist_max_podcasts\":\"0\",\"monetization_sale\":\"1\",\"monetization_sale_cut\":\"60\",\"monetization_song_min_price\":\"0.99\",\"monetization_song_max_price\":\"9.99\",\"monetization_album_min_price\":\"0.99\",\"monetization_album_max_price\":\"9.99\",\"monetization_streaming\":\"1\",\"monetization_streaming_rate\":\"0.00783\",\"monetization_paypal_min_withdraw\":\"50\",\"monetization_bank_min_withdraw\":\"250\",\"blog_allow_view_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_add_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_public_directly\":\"1\",\"blog_trust_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_hide\":\"1\",\"blog_allow_vote\":\"1\",\"blog_allow_html\":\"1\",\"blog_allow_public_home\":\"1\",\"blog_allow_public_fixed\":\"1\",\"blog_allow_upload_images\":\"1\",\"blog_allow_upload_files\":\"1\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download\":\"1\",\"blog_download_speed\":\"100\",\"blog_flood\":\"60\",\"blog_news_per_day\":\"5\",\"comment_allow\":\"1\",\"comment_url\":\"1\",\"comment_edit\":\"1\",\"option_comment_delete\":\"1\",\"comment_day_limit_edit\":\"0\",\"admin_access\":\"1\",\"admin_categories\":\"1\",\"admin_posts\":\"1\",\"admin_artist_claim\":\"1\",\"admin_patners\":\"1\",\"admin_genres\":\"1\",\"admin_moods\":\"1\",\"admin_radio\":\"1\",\"admin_channels\":\"1\",\"admin_slideshow\":\"1\",\"admin_playlists\":\"1\",\"admin_artists\":\"1\",\"admin_albums\":\"1\",\"admin_songs\":\"1\",\"admin_users\":\"1\",\"admin_pages\":\"1\",\"admin_comments\":\"1\",\"group_name\":\"Moderator\"}', NULL, '2020-10-13 08:17:21'),
(3, 'Anywhere Subscription', '{\"group_badge\":null,\"option_feedback\":\"1\",\"option_avatar\":\"1\",\"option_max_info_chars\":\"180\",\"option_stream\":\"1\",\"option_hd_stream\":\"1\",\"option_download\":\"1\",\"option_download_hd\":\"1\",\"option_download_speed\":\"0\",\"option_download_resume\":\"1\",\"artist_allow_upload\":\"1\",\"artist_allow_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_allow_mood\":[\"1\",\"2\",\"3\",\"4\",\"5\"],\"artist_mod\":\"1\",\"artist_trusted_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_num_files_allow\":\"100\",\"artist_day_edit_limit\":\"10\",\"artist_files_upload_each_time\":\"10\",\"artist_files_each_album\":\"15\",\"artist_max_songs\":\"0\",\"artist_max_albums\":\"0\",\"user_max_playlists\":\"0\",\"user_max_playlist_songs\":\"0\",\"artist_allow_podcast\":\"1\",\"artist_podcast_allow_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_mod\":\"1\",\"artist_podcast_trusted_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_max_episodes\":\"50\",\"artist_podcast_day_edit_limit\":\"0\",\"artist_max_podcasts\":\"0\",\"monetization_sale\":\"1\",\"monetization_sale_cut\":\"60\",\"monetization_song_min_price\":\"0.99\",\"monetization_song_max_price\":\"9.99\",\"monetization_album_min_price\":\"0.99\",\"monetization_album_max_price\":\"9.99\",\"monetization_streaming\":\"1\",\"monetization_streaming_rate\":\"0.00783\",\"monetization_paypal_min_withdraw\":\"50\",\"monetization_bank_min_withdraw\":\"250\",\"blog_allow_view_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_add_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_public_directly\":\"1\",\"blog_trust_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_hide\":\"1\",\"blog_allow_vote\":\"1\",\"blog_allow_html\":\"1\",\"blog_allow_public_home\":\"1\",\"blog_allow_public_fixed\":\"1\",\"blog_allow_upload_images\":\"1\",\"blog_allow_upload_files\":\"1\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download\":\"1\",\"blog_download_speed\":\"100\",\"blog_flood\":\"60\",\"blog_news_per_day\":\"5\",\"comment_allow\":\"1\",\"comment_url\":\"1\",\"comment_edit\":\"1\",\"option_comment_delete\":\"1\",\"comment_day_limit_edit\":\"0\",\"group_name\":\"Anywhere Subscription\"}', '2019-07-24 17:00:00', '2020-10-13 08:16:50'),
(4, 'Plus Subscription', '{\"group_badge\":null,\"option_feedback\":\"1\",\"option_avatar\":\"1\",\"option_max_info_chars\":\"180\",\"option_stream\":\"1\",\"option_hd_stream\":\"1\",\"option_download\":\"1\",\"option_download_hd\":\"1\",\"option_download_speed\":\"3000\",\"option_download_resume\":\"1\",\"artist_allow_upload\":\"1\",\"artist_allow_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_allow_mood\":[\"1\",\"2\",\"3\",\"4\",\"5\"],\"artist_mod\":\"1\",\"artist_trusted_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_num_files_allow\":\"100\",\"artist_day_edit_limit\":\"10\",\"artist_files_upload_each_time\":\"10\",\"artist_files_each_album\":\"15\",\"artist_max_songs\":\"0\",\"artist_max_albums\":\"0\",\"user_max_playlists\":\"0\",\"user_max_playlist_songs\":\"0\",\"artist_allow_podcast\":\"1\",\"artist_podcast_allow_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_mod\":\"1\",\"artist_podcast_trusted_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"artist_podcast_max_episodes\":\"50\",\"artist_podcast_day_edit_limit\":\"0\",\"artist_max_podcasts\":\"0\",\"monetization_sale\":\"1\",\"monetization_sale_cut\":\"60\",\"monetization_song_min_price\":\"0.99\",\"monetization_song_max_price\":\"9.99\",\"monetization_album_min_price\":\"0.99\",\"monetization_album_max_price\":\"9.99\",\"monetization_streaming\":\"1\",\"monetization_streaming_rate\":\"0.00783\",\"monetization_paypal_min_withdraw\":\"50\",\"monetization_bank_min_withdraw\":\"250\",\"blog_allow_view_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_add_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_public_directly\":\"1\",\"blog_trust_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_hide\":\"1\",\"blog_allow_vote\":\"1\",\"blog_allow_html\":\"1\",\"blog_allow_public_home\":\"1\",\"blog_allow_public_fixed\":\"1\",\"blog_allow_upload_images\":\"1\",\"blog_allow_upload_files\":\"1\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download\":\"1\",\"blog_download_speed\":\"100\",\"blog_flood\":\"60\",\"blog_news_per_day\":\"5\",\"comment_allow\":\"1\",\"comment_url\":\"1\",\"comment_edit\":\"1\",\"option_comment_delete\":\"1\",\"comment_day_limit_edit\":\"0\",\"group_name\":\"Plus Subscription\"}', '2019-07-24 17:00:00', '2020-10-13 08:16:13'),
(5, 'Member', '{\"group_badge\":null,\"ad_support\":\"1\",\"option_feedback\":\"1\",\"option_avatar\":\"1\",\"option_max_info_chars\":\"180\",\"option_stream\":\"1\",\"option_download_speed\":\"200\",\"artist_allow_upload\":\"1\",\"artist_allow_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_allow_mood\":[\"1\",\"2\",\"3\",\"4\",\"5\"],\"artist_mod\":\"1\",\"artist_trusted_genre\":[\"7\",\"6\",\"2\",\"4\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"16\",\"18\"],\"artist_num_files_allow\":\"100\",\"artist_day_edit_limit\":\"10\",\"artist_files_upload_each_time\":\"10\",\"artist_files_each_album\":\"15\",\"artist_max_songs\":\"0\",\"artist_max_albums\":\"0\",\"user_max_playlists\":\"0\",\"user_max_playlist_songs\":\"0\",\"artist_podcast_max_episodes\":null,\"artist_podcast_day_edit_limit\":null,\"artist_max_podcasts\":null,\"monetization_sale\":\"1\",\"monetization_sale_cut\":\"60\",\"monetization_song_min_price\":\"0.99\",\"monetization_song_max_price\":\"9.99\",\"monetization_album_min_price\":\"0.99\",\"monetization_album_max_price\":\"9.99\",\"monetization_streaming\":\"1\",\"monetization_streaming_rate\":\"0.00783\",\"monetization_paypal_min_withdraw\":\"50\",\"monetization_bank_min_withdraw\":\"250\",\"blog_allow_view_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_add_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_public_directly\":\"0\",\"blog_allow_hide\":\"1\",\"blog_allow_vote\":\"1\",\"blog_allow_html\":\"1\",\"blog_allow_public_home\":\"1\",\"blog_allow_public_fixed\":\"1\",\"blog_allow_upload_images\":\"1\",\"blog_allow_upload_files\":\"1\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download\":\"1\",\"blog_download_speed\":\"100\",\"blog_flood\":\"60\",\"blog_news_per_day\":\"5\",\"comment_allow\":\"1\",\"comment_url\":\"1\",\"comment_day_limit_edit\":\"5\",\"group_name\":\"Member\"}', '2019-07-24 17:00:00', '2020-10-13 08:15:22'),
(6, 'Guest', '{\"ad_support\":\"1\",\"option_stream\":\"1\",\"option_download_speed\":\"200\",\"artist_num_files_allow\":null,\"artist_day_edit_limit\":null,\"artist_files_upload_each_time\":null,\"artist_files_each_album\":null,\"artist_max_songs\":null,\"artist_max_albums\":null,\"user_max_playlists\":null,\"user_max_playlist_songs\":null,\"artist_podcast_max_episodes\":null,\"artist_podcast_day_edit_limit\":null,\"artist_max_podcasts\":null,\"monetization_sale_cut\":null,\"monetization_song_min_price\":null,\"monetization_song_max_price\":null,\"monetization_album_min_price\":null,\"monetization_album_max_price\":null,\"monetization_streaming_rate\":null,\"monetization_paypal_min_withdraw\":null,\"monetization_bank_min_withdraw\":null,\"blog_allow_view_categories\":[\"3\",\"5\"],\"blog_prohibited_view_categories\":[\"4\",\"5\"],\"blog_allow_add_categories\":[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"],\"blog_allow_public_directly\":\"1\",\"blog_trust_categories\":[\"4\"],\"blog_allow_vote\":\"0\",\"blog_allow_html\":\"0\",\"blog_allow_public_home\":\"0\",\"blog_allow_public_fixed\":\"0\",\"blog_allow_upload_images\":\"0\",\"blog_allow_upload_files\":\"0\",\"blog_num_files_allow\":\"5\",\"blog_day_edit_limit\":\"5\",\"blog_upload_extensions\":\"5\",\"blog_upload_size\":\"1024\",\"blog_download_speed\":\"100\",\"blog_flood\":\"300\",\"blog_news_per_day\":\"5\",\"comment_day_limit_edit\":\"0\",\"group_name\":\"Guest\"}', '2019-07-24 17:00:00', '2020-10-13 08:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2021-06-22 22:29:54', '2021-06-22 22:29:54'),
(2, 2, 5, NULL, '2022-07-21 09:49:09', '2022-07-21 09:49:09'),
(3, 3, 5, NULL, '2022-07-22 13:13:54', '2022-07-22 13:13:54'),
(4, 4, 5, NULL, '2022-07-23 16:58:12', '2022-07-23 16:58:12'),
(5, 5, 5, NULL, '2022-07-24 07:06:30', '2022-07-24 07:06:30'),
(6, 6, 5, NULL, '2022-07-24 07:25:00', '2022-07-24 07:25:00'),
(7, 7, 5, NULL, '2022-07-24 07:35:33', '2022-07-24 07:35:33'),
(8, 8, 5, NULL, '2022-07-24 07:38:40', '2022-07-24 07:38:40'),
(9, 9, 5, NULL, '2022-07-24 07:57:35', '2022-07-24 07:57:35'),
(10, 10, 4, NULL, '2022-08-30 13:04:06', '2022-08-30 13:04:06'),
(11, 11, 4, NULL, '2022-08-30 13:12:46', '2022-08-30 13:12:46'),
(12, 12, 4, NULL, '2022-09-03 13:03:08', '2022-09-03 13:03:08'),
(13, 13, 4, NULL, '2022-09-19 03:22:14', '2022-09-19 03:22:14'),
(14, 14, 1, NULL, '2022-10-29 08:02:52', '2022-10-29 08:02:52'),
(15, 15, 5, NULL, '2022-12-14 13:00:29', '2022-12-14 13:00:29'),
(16, 16, 5, NULL, '2022-12-14 13:01:47', '2022-12-14 13:01:47'),
(17, 17, 5, NULL, '2022-12-14 13:08:17', '2022-12-14 13:08:17'),
(18, 18, 5, NULL, '2022-12-14 13:09:26', '2022-12-14 13:09:26'),
(19, 19, 5, NULL, '2022-12-14 13:10:37', '2022-12-14 13:10:37'),
(20, 20, 5, NULL, '2022-12-14 14:20:39', '2022-12-14 14:20:39'),
(21, 21, 5, NULL, '2022-12-14 14:22:28', '2022-12-14 14:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `royaltis`
--

CREATE TABLE `royaltis` (
  `id` bigint(20) NOT NULL,
  `song_id` bigint(20) NOT NULL,
  `patner` text NOT NULL,
  `value` float NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `royaltis`
--

INSERT INTO `royaltis` (`id`, `song_id`, `patner`, `value`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Spotify', 0.000520486, '2022-09-01', '2022-09-30', '2023-01-05 15:47:33', '2023-01-05 15:47:33'),
(2, 1, 'Spotify', 0.000058812, '2022-09-01', '2022-09-30', '2023-01-05 15:47:33', '2023-01-05 15:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `description` varchar(255) NOT NULL,
  `role_id` smallint(6) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `trial` tinyint(1) NOT NULL DEFAULT '0',
  `trial_period` smallint(6) DEFAULT NULL,
  `trial_period_format` enum('D','W','M','Y') DEFAULT NULL,
  `plan_period` smallint(6) NOT NULL DEFAULT '0',
  `plan_period_format` enum('D','W','M','Y') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `price`, `description`, `role_id`, `active`, `trial`, `trial_period`, `trial_period_format`, `plan_period`, `plan_period_format`, `created_at`, `updated_at`) VALUES
(1, 'Seumur Hidup', '850.00', '- Hak Lagu 100% Milik kamu\n- Rilis 14 Hari\n- Transparency\n- Realtime Analytic\n- Share Royalty\n- Withdraw Langsung ke Rekeningmu\n- Kamu dapat takedown karya kamu kapan saja\n- Mendapatkan Kode ISRC dan UPC sebagai kode Internasional karya kamu\n- Kamu akan M', 4, 1, 0, NULL, NULL, 5, 'Y', '2022-07-17 14:14:25', '2022-07-17 14:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('08ix6YdNEBGhX99NGaGmLJAa7aVhJSwXNShvvvyu', 14, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUZLbGl0Um5zbFlRR3ZqcEJuUGc4b3dQZzRyc3NNbWx2QkM3NVRmSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xNiI7fXM6MTA6Im11c2ljdG9rZW4iO3M6MjQ3OiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpJVXpJMU5pSjkuZXlKbGVIQWlPakUyTnpRME5qY3pNREVzSW1saGRDSTZNVFkzTWprMk56STVOaXdpYW5ScElqb2lPR1F5TWpNMk0yTTROemsyWTJVNE1qQTRZVFU0WlRka04yWTFNV1kxT1RBaUxDSmxiV0ZwYkNJNkluUmxjM1JBYldGcGJDNWpiMjBpTENKbGVIUmxjbTVoYkVsa0lqb3hOamN5T1RZM01qazJmUS5PVHl5MnRzYldPRnpCQW9VTzRBcXlGVE4yM2d5VW1TZ2VTMWE4Tzk4UlNFIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDt9', 1672967462),
('3wpcmXHyRsLg4TTDIEct4KCvRbk6UFiKFlSOEgf8', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUdiNlRrQklmYmxwY3cwODNxNEdvZHNCemswMzRiMGxuVDBjbmwwNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1671892216),
('5eovRtm8YumJMgnrUR4VjIFSCplmg4tQanesvHpS', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWQ0N3NZNzR0RlV6WFdrTnVLeWRRZUdjMFdZbzBadWJ2RzNRaUtqdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL3NvbmdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672244123),
('9A2K8E43RLQdltZYuWgn066Jpi2cUVUggOKkgNyj', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTRzbW5STmNPd3VFS2lHa0lUQ0RtYVl6bVpyWWJ1WXNlU0x4c1E0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L3VwbG9hZGVkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672507567),
('ArsiBvs6g9VCw0NlA7bhpw6bs1GbjB367ReOpoZy', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:107.0) Gecko/20100101 Firefox/107.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHRGNDhyZ0d5UW9Ud3JhOXhtQXFRdWNVdndEd2FhU0FnZ25lOExWaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL3BhdG5lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1670770122),
('DLtJktq0NfnV6Z5K9iVBN9KiF3jctbThpHGx30T1', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmR5VzgyS0dkakwxcmdiU1ZvRDRZakRKRUNwdGRIbG5DczB0OVNBSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FydGlzdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1670509492),
('efKzDTUgvVAupkTVFuKpiUQ9DoaW3yjMQDD64x7W', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVlpNjNJeW5rZDdKVHB0UmE5ekNMVFNTYzd4Um9CY0lyaHNHbVhqUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L3VwbG9hZGVkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672934076),
('eXry9alFMzYHdpCn5QYq56HgsU70Xs5IN8tj9mst', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS05pS1AzazY4Zk9wS29ZV2ZWN3RTMmZxYndLUlZmcjN2NGpjckNkTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1672963426),
('FyFWYqrdIMSAU7wPp7QN1kjTZAST8glaiGUEfODT', 14, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:107.0) Gecko/20100101 Firefox/107.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibE15VXlMYmFFRWdreUREbENNOWc5RnlUc3FPR1VibURXMFQwNnF1USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ4OiJodHRwczovL25leHRhcnQudGVzdC9hZG1pbi9hbGJ1bXM/YXJ0aXN0SWRzJTVCMCU1RD0xJmNvbW1lbnRfY291bnRfZnJvbT0mY29tbWVudF9jb3VudF91bnRpbD0mY3JlYXRlZF9mcm9tPSZjcmVhdGVkX3VudGlsPSZyZXN1bHRzX3Blcl9wYWdlPTUwJnRlcm09Ijt9czoxMDoibXVzaWN0b2tlbiI7czoyNDc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSklVekkxTmlKOS5leUpsZUhBaU9qRTJOekkxTXpNNU1qQXNJbWxoZENJNk1UWTNNVEF6TXpreE5Td2lhblJwSWpvaU1UbGlOekZrTlRVeVlqQXpNelk1TkRJelkyRXlORFZtTXpNd01qUm1NRGdpTENKbGJXRnBiQ0k2SW5SbGMzUkFiV0ZwYkM1amIyMGlMQ0psZUhSbGNtNWhiRWxrSWpveE5qY3hNRE16T1RFMWZRLjRuOFZ6OGsyYXFNQVVkd1YzekRNMGdzNmNLTVRyMl9GaGJxYnNMY1psbE0iO3M6NToic3RhdGUiO3M6NDA6Iml6ZU0xNDRWZ1k5VnUyTkhHb2dmRmdwejFyWno2SUFNdG02OG9uWVMiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1671034997),
('GW8MsK9g5WAJqpUThsWUbIOgZ56kCEyHxP5dNCZ7', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkNiVmE1bW9UbEhlWHBBMFJsWlhsM2pFRTI5ZkhaYUNFeWVPMXZwNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL2FsYnVtLXJveWFsdGkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1672245513),
('HFNyxnDzxpoAUXXkS1BXHI1035afDadHpWy7913B', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1hWVUpZMXNFRFFZdDRUNGlSZGtXOGRRMzlsVU4yMk93MURmWGVZMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1671892012),
('lyHZB2aw55RWhvwpV4vcGf5l8QPXq22gf3ncBGf9', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzE1NzhPUFVmRDNOb3NzM1gzNTk3Y29HUVZXY09wVVA2Zmt6dnZFaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672503776),
('mR1KjZvZIn48SinVXQrSzcGNPMJGLJ5BBJawR3YF', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW9QSHJFZzlMTDR6UXF1UFVaeTlUSTdmVXNBN3Z0WjlmcEJTRUhOcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8yMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1671896049),
('PfooVIdy5yjZbJeTSCpyiy0ZxLCYUtIZEW5kcWxK', 14, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRlZNejZ6SGhJdzdxNHBmQk5JZU1TTVBkOFFPT0ZiOFc0THdoSHRXNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL3NvbmctbWlncmF0aW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMDoibXVzaWN0b2tlbiI7czoyNDc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSklVekkxTmlKOS5leUpsZUhBaU9qRTJOelF3T0RZeE1EY3NJbWxoZENJNk1UWTNNalU0TmpFd01pd2lhblJwSWpvaVlXWmhaalF5WVRFNFpESmlabVk1TkdJd056ZzNNRFU0TWpZeE5HVXdZVGdpTENKbGJXRnBiQ0k2SW5SbGMzUkFiV0ZwYkM1amIyMGlMQ0psZUhSbGNtNWhiRWxrSWpveE5qY3lOVGcyTVRBeWZRLm1UVi01MV9Sa19SV0ZRUU1OaXFNc0kzdUpLbmhkTjF4eUFqS1Utek9XYWciO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1672685248),
('qaEhgHk0V4PsdkzYzvvRbDfBZBgItGQV1L42W2Tm', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:107.0) Gecko/20100101 Firefox/107.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNks0SmtNT1cwR1hTRUJZVkF4UmduUEMxOG1TQ0VlZ3JVZ0tFN2tGNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1670770877),
('sA5nBRgHDGnkHBSnPzIE5T1W25vuYfB8aRZ8yKJe', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUZidE02emZ5T3ZRWVp3a0gzNXRqZk9nWXdKWmM1UGdEdUhhNHc1QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L3JveWFsdGktYXJ0aXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672525631),
('t3d7M8gUTR9TzlEbND7MqYvI48vgK9LjHHnoKKEI', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3dUQll5YkMwWjZOYnZoMmNOWEFuTExRc0NzZkRUdmVrMUl5cXhjWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L2FsYnVtcy8xMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1672240682),
('UMDD3bgVh9ELkbqSQP2zGPSiEyXr2ZfhwHBOb8Sb', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUtwTGZnR1Rvc3oyWUI2ZDY5QlZxUXl6akwwdG52TlY1cEJpOHREQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL29yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1670512093),
('vorSIfOSRyrEMEZH8XeoPvA36D29Jgxvy6htatBR', NULL, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXhhMDNSNGM4cGFGUDdWQVpqeTVxR0ZPR1lYOVFFN1VmczlpNTZETiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1670512093),
('wNcWzudtZcUVuMyGkRt21X4fRW3mNoq5DMmnTagZ', 14, '192.168.1.203', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiczNVNUVtZWg5VFBmdmsyaVZrQjVLYXFkaDZnNm4yN1plYlFWT0lDbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vbmV4dGFydC50ZXN0L2FydGlzdC1tYW5hZ2VtZW50L3VwbG9hZGVkIjt9czoxMDoibXVzaWN0b2tlbiI7czoyNDc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSklVekkxTmlKOS5leUpsZUhBaU9qRTJOelF3TWpRMU5qRXNJbWxoZENJNk1UWTNNalV5TkRVMU5pd2lhblJwSWpvaVpEQmhPVE0zTmpJd05UaGxNV0ZtT0dGbFptSmpNRGN6TmpVek1UY3hOellpTENKbGJXRnBiQ0k2SW5SbGMzUkFiV0ZwYkM1amIyMGlMQ0psZUhSbGNtNWhiRWxrSWpveE5qY3lOVEkwTlRVMmZRLm9VNDJOMHlUb3FUMDU3Qkp2S0dkZFNKNHNuS29QZjFZOVlPN2lCNGFGSVEiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1672582769),
('yF9kGj47ehunDdgf8RX0HP4Mrv1UCHvsBEeTTU90', NULL, '192.168.1.203', 'PostmanRuntime/7.29.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDg5MWJiWTR3MWVLNUV3dDZqaE1GNlRtMUxqdXpuZkJVVHJQcVVaNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vbmV4dGFydC50ZXN0Ijt9fQ==', 1672966125);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `priority` smallint(6) DEFAULT '0',
  `object_id` int(11) NOT NULL,
  `object_type` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) DEFAULT NULL,
  `title_link` varchar(255) DEFAULT NULL,
  `description` text,
  `allow_home` tinyint(1) NOT NULL DEFAULT '0',
  `allow_discover` tinyint(1) NOT NULL DEFAULT '0',
  `allow_radio` tinyint(1) NOT NULL DEFAULT '0',
  `allow_community` tinyint(1) NOT NULL DEFAULT '0',
  `allow_podcasts` tinyint(1) NOT NULL DEFAULT '0',
  `allow_trending` tinyint(1) NOT NULL DEFAULT '0',
  `genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `radio` varchar(50) DEFAULT NULL,
  `podcast` varchar(50) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `allow_videos` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) NOT NULL,
  `sale_impression` decimal(10,6) DEFAULT '0.000000',
  `stream_impression` decimal(10,6) DEFAULT '0.000000',
  `mp3` tinyint(1) NOT NULL DEFAULT '0',
  `waveform` tinyint(1) NOT NULL DEFAULT '0',
  `preview` tinyint(1) NOT NULL DEFAULT '0',
  `wav` tinyint(1) NOT NULL DEFAULT '0',
  `flac` tinyint(1) NOT NULL DEFAULT '0',
  `hd` tinyint(1) DEFAULT '0',
  `hls` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` smallint(6) DEFAULT NULL,
  `type_song` int(11) DEFAULT NULL,
  `explicit` tinyint(1) NOT NULL DEFAULT '0',
  `selling` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `display_artist` int(11) DEFAULT NULL,
  `primary_artist` text,
  `composer` text,
  `arranger` text,
  `lyricist` text,
  `remix_version` text,
  `language` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `label` text,
  `isrc` text,
  `iswc` text,
  `start_point` text,
  `publisher_year` int(11) DEFAULT NULL,
  `publisher_name` text,
  `lirik` text,
  `originalfile` text,
  `separately` int(11) NOT NULL DEFAULT '0',
  `second_genre` varchar(50) DEFAULT NULL,
  `group_genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `access` varchar(255) DEFAULT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `artistIds` varchar(50) DEFAULT NULL,
  `loves` int(11) NOT NULL DEFAULT '0',
  `collectors` int(11) NOT NULL DEFAULT '0',
  `plays` int(11) NOT NULL DEFAULT '0',
  `released_at` date DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `allow_download` tinyint(1) NOT NULL DEFAULT '1',
  `download_count` mediumint(9) NOT NULL DEFAULT '0',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `pending` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `sale_impression`, `stream_impression`, `mp3`, `waveform`, `preview`, `wav`, `flac`, `hd`, `hls`, `user_id`, `type_song`, `explicit`, `selling`, `price`, `display_artist`, `primary_artist`, `composer`, `arranger`, `lyricist`, `remix_version`, `language`, `genre`, `label`, `isrc`, `iswc`, `start_point`, `publisher_year`, `publisher_name`, `lirik`, `originalfile`, `separately`, `second_genre`, `group_genre`, `mood`, `title`, `description`, `access`, `duration`, `artistIds`, `loves`, `collectors`, `plays`, `released_at`, `copyright`, `allow_download`, `download_count`, `allow_comments`, `comment_count`, `visibility`, `approved`, `pending`, `created_at`, `updated_at`) VALUES
(1, '0.000000', '0.000000', 1, 0, 0, 0, 0, 0, 0, 14, 1, 0, 0, '0.00', 1, 'Anu Band', 'afa', 'h', 'hk', 'Remix', 1, '4', 'Aksara', 'ESA011564903', NULL, NULL, 2022, 'kjns', NULL, 'retro-city-14099_20221231161910.mp3', 0, '3', '5', NULL, 'YT Music', NULL, NULL, 153, '2', 0, 0, 0, NULL, NULL, 1, 0, 1, 0, 1, 1, 0, '2022-12-31 16:19:10', '2022-12-31 16:38:43'),
(11, '0.000000', '0.000000', 1, 0, 0, 0, 0, 0, 0, 14, 1, 0, 0, '0.00', 1, 'Anu Band', 'sds', 'fdafa', 'fafas', 'sjfn', 1, '3', 'llfjljfl', NULL, NULL, NULL, 2022, 'jda', NULL, 'y2mate.com - GEISHA Sementara Sendiri OST SINGLE Official Music Video_20230106000155.mp3', 0, '5', '5', NULL, 'sdjkdsk', NULL, NULL, 224, '2', 0, 0, 0, NULL, NULL, 1, 0, 1, 0, 1, 1, 0, '2023-01-06 00:01:55', '2023-01-06 00:02:01'),
(12, '0.000000', '0.000000', 1, 0, 0, 0, 0, 0, 0, 14, 1, 0, 0, '0.00', 1, 'Anu Band', 'sds', 'fdafa', 'fafas', 'sjfn', 1, '3', 'llfjljfl', NULL, NULL, NULL, 2022, 'jda', NULL, 'y2mate.com - Geisha Pergi Saja Official Music Video_20230106010833.wav', 0, '5', '5', NULL, 'fdjl', NULL, NULL, 250, '2', 0, 0, 0, NULL, NULL, 1, 0, 1, 0, 1, 1, 0, '2023-01-06 01:08:33', '2023-01-06 01:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `song_price`
--

CREATE TABLE `song_price` (
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `priority` mediumint(9) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song_price`
--

INSERT INTO `song_price` (`id`, `harga`, `harga_discount`, `created_at`, `updated_at`, `priority`) VALUES
(1, 100000, 85000, '2022-11-24 22:17:58', '2022-11-24 22:33:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `song_spotify_logs`
--

CREATE TABLE `song_spotify_logs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `spotify_id` varchar(30) DEFAULT NULL,
  `artwork_url` varchar(255) DEFAULT NULL,
  `preview_url` varchar(255) DEFAULT NULL,
  `youtube` varchar(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_tags`
--

CREATE TABLE `song_tags` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `country_code` varchar(3) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` mediumint(9) DEFAULT NULL,
  `stream_url` varchar(255) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `play_count` int(11) NOT NULL DEFAULT '0',
  `failed_count` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stream_stats`
--

CREATE TABLE `stream_stats` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `streamable_id` int(11) NOT NULL,
  `streamable_type` varchar(50) NOT NULL,
  `revenue` decimal(10,6) NOT NULL DEFAULT '0.000000',
  `ip` varchar(46) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream_stats`
--

INSERT INTO `stream_stats` (`id`, `user_id`, `streamable_id`, `streamable_type`, `revenue`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-17 17:10:31', '2022-07-17 17:10:31'),
(2, 1, 2, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-17 17:10:58', '2022-07-17 17:10:58'),
(3, 1, 3, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-17 17:14:40', '2022-07-17 17:14:40'),
(4, 1, 20, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-17 22:00:39', '2022-07-17 22:00:39'),
(5, 1, 21, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-18 01:55:36', '2022-07-18 01:55:36'),
(6, 1, 21, 'App\\Models\\Song', '0.007830', '36.69.228.210', '2022-07-18 12:54:11', '2022-07-18 12:54:11'),
(7, 1, 22, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-18 19:11:35', '2022-07-18 19:11:35'),
(8, 1, 31, 'App\\Models\\Song', '0.007830', '118.99.107.65', '2022-07-20 19:22:51', '2022-07-20 19:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `gate` varchar(50) DEFAULT NULL,
  `auto_billing` tinyint(1) NOT NULL DEFAULT '1',
  `cycles` smallint(6) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `last_payment_date` timestamp NULL DEFAULT NULL,
  `next_billing_date` timestamp NULL DEFAULT NULL,
  `amount` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `currency` varchar(50) DEFAULT NULL,
  `payment_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `trial_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(25) NOT NULL,
  `album_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `voucher_id` bigint(20) DEFAULT NULL,
  `nilai_voucher` int(11) NOT NULL DEFAULT '0',
  `free_song_id` int(11) DEFAULT NULL,
  `nilai_free_song` int(11) NOT NULL DEFAULT '0',
  `payment_type` varchar(50) NOT NULL DEFAULT 'QRIS',
  `yt_trx_id` text,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = unpaid, 1 = paid',
  `status_free` int(11) NOT NULL DEFAULT '0',
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `transaction_id`, `album_id`, `amount`, `voucher_id`, `nilai_voucher`, `free_song_id`, `nilai_free_song`, `payment_type`, `yt_trx_id`, `status`, `status_free`, `note`, `created_at`, `updated_at`) VALUES
(1, 14, '5719477202', 1, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2022-12-31 16:16:43', '2022-12-31 16:16:56'),
(2, 14, '4367656851', 2, 85000, 2, 85000, NULL, 0, 'QRIS', NULL, 1, 0, NULL, '2022-12-31 16:17:51', '2023-01-02 17:01:08'),
(3, 14, '436867950', 3, 170000, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2022-12-31 16:24:57', '2023-01-02 17:40:25'),
(4, 14, '1665983676', 8, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-01 17:25:59', '2023-01-01 17:26:09'),
(5, 14, '6226699608', 9, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-01 17:28:18', '2023-01-01 17:28:18'),
(6, 14, '8902568023', 10, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-02 15:04:24', '2023-01-02 15:04:30'),
(7, 14, '334421750', 12, 85000, NULL, 0, NULL, 0, 'QRIS', NULL, 1, 0, NULL, '2023-01-02 15:15:28', '2023-01-06 01:08:23'),
(8, 14, '6086046775', 13, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-03 16:32:58', '2023-01-03 16:33:30'),
(9, 14, '6535078665', 14, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-03 16:34:26', '2023-01-03 16:34:36'),
(10, 14, '3099578053', 15, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-03 16:35:15', '2023-01-03 16:35:23'),
(11, 14, '6855270868', 16, 85000, NULL, 0, NULL, 0, 'QRIS', NULL, 1, 0, NULL, '2023-01-03 16:35:54', '2023-01-06 01:09:59'),
(12, 14, '1857607356', 17, 0, NULL, 0, NULL, 0, 'QRIS', NULL, 0, 0, NULL, '2023-01-03 16:37:30', '2023-01-03 16:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `key` text NOT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `balance` decimal(10,6) DEFAULT '0.000000',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_code` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `soundcloud_url` varchar(191) DEFAULT NULL,
  `instagram_url` varchar(191) DEFAULT NULL,
  `youtube_url` varchar(191) DEFAULT NULL,
  `facebook_url` varchar(191) DEFAULT NULL,
  `twitter_url` varchar(191) DEFAULT NULL,
  `website_url` varchar(191) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `artist_id` int(11) NOT NULL DEFAULT '0',
  `playlist_count` int(11) NOT NULL DEFAULT '0',
  `collection_count` int(11) NOT NULL DEFAULT '0',
  `favorite_count` int(11) NOT NULL DEFAULT '0',
  `following_count` int(11) NOT NULL DEFAULT '0',
  `follower_count` mediumint(9) NOT NULL DEFAULT '0',
  `logged_ip` varchar(46) DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `last_seen_notif` timestamp NULL DEFAULT NULL,
  `notification` timestamp NULL DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `bio` mediumtext,
  `gender` varchar(50) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` smallint(6) NOT NULL DEFAULT '0',
  `restore_queue` tinyint(1) NOT NULL DEFAULT '0',
  `persist_shuffle` tinyint(1) NOT NULL DEFAULT '0',
  `play_pause_fade` tinyint(1) NOT NULL DEFAULT '0',
  `disablePlayerShortcuts` tinyint(1) NOT NULL DEFAULT '0',
  `crossfade_amount` tinyint(1) NOT NULL DEFAULT '5',
  `hd_streaming` tinyint(1) NOT NULL DEFAULT '1',
  `activity_privacy` tinyint(1) NOT NULL DEFAULT '0',
  `notif_follower` tinyint(1) NOT NULL DEFAULT '0',
  `notif_playlist` tinyint(1) NOT NULL DEFAULT '0',
  `notif_shares` tinyint(1) NOT NULL DEFAULT '0',
  `notif_features` tinyint(1) NOT NULL DEFAULT '0',
  `trialed` tinyint(1) DEFAULT '0',
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_paypal` varchar(255) DEFAULT NULL,
  `payment_bank` text,
  `charge_admin` int(11) NOT NULL DEFAULT '15',
  `charge_tax` int(11) NOT NULL DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `balance`, `name`, `username`, `phone`, `password`, `session_id`, `email`, `email_verified`, `email_verified_code`, `email_verified_at`, `remember_token`, `soundcloud_url`, `instagram_url`, `youtube_url`, `facebook_url`, `twitter_url`, `website_url`, `banned`, `artist_id`, `playlist_count`, `collection_count`, `favorite_count`, `following_count`, `follower_count`, `logged_ip`, `last_activity`, `last_seen_notif`, `notification`, `country`, `bio`, `gender`, `birth`, `allow_comments`, `comment_count`, `restore_queue`, `persist_shuffle`, `play_pause_fade`, `disablePlayerShortcuts`, `crossfade_amount`, `hd_streaming`, `activity_privacy`, `notif_follower`, `notif_playlist`, `notif_shares`, `notif_features`, `trialed`, `payment_method`, `payment_paypal`, `payment_bank`, `charge_admin`, `charge_tax`, `created_at`, `updated_at`) VALUES
(1, '0.062640', 'Portalindo', 'portalindo', NULL, '$2y$10$Mg1fU15Yt2a18a9N7SZdPuGUcDV5NZsL4aqxAxh9zMFtgBhdXh1L.', NULL, 'testkoding@testingaja.com', 0, NULL, NULL, '7XBCaNO5bYZthKitQgx4YeJ9Drk2IZdhEKakYzsUpm0iB6JaCYf6DF5vRuVM', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '112.78.161.132', '2022-10-05 03:16:19', '2022-07-23 09:36:21', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2021-06-22 22:29:54', '2022-10-05 03:15:19'),
(2, '0.000000', 'Hermansyah Ali', 'alsyah', NULL, '$2y$10$KLt4uvaFFtiRvroWWa9b2eNM9SvDhzYbQZHRj9ikI3sX75qFDeCKe', NULL, 'hermansyahali07@gmail.com', 0, 'uWKJexnAQFtMrfz5T9liX3TCiwxu32nV', NULL, 'C8OhUSyJV5yVybV611jeqWACO9pPl2AVfHS9ci4FYnImQXI22TIPrTlTZ19K', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-07-21 09:58:22', '2022-07-21 09:50:29', NULL, NULL, NULL, 'M', NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-21 09:49:09', '2022-07-21 09:57:22'),
(3, '0.000000', 'Yoga Pratama', 'ypratama', NULL, '$2y$10$fBxzkQEPstvUjj/ORKmVLuc8iREQdV9nLKMPAGse8gN2aytOCxzGe', NULL, 'sound.mixdream@gmail.com', 0, 'VVlRSd9uJZqAsLsTsAVDCS5Md1U6SaUG', NULL, 'Gm8Z5Xm7LRSzph1Fmi8eMw23kYwN83Q0OJtUK1P53Nu59GngSQLEgm3KyKhM', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '103.195.56.218', '2022-07-31 03:06:28', '2022-07-22 13:13:54', NULL, NULL, NULL, 'M', NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-22 13:13:54', '2022-07-31 03:05:28'),
(4, '0.000000', 'Test Fiverr', 'testfiverr', NULL, '$2y$10$oYJNaPfZwcFqVai/0iGGNOPX5X7YuEQF1T7//JWtLguxwhwEOIwGW', NULL, 'testfiverr@testingaja.com', 0, 'DASPUlSwTBXjyURYh2IGbxj6kG30Qtfw', NULL, 'ptqo5wCNwGv6taUXGorlt5ZzumqYCJdFYhDkCKSj3kCPTqvZE9Po0tbFcxsd', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '118.99.107.67', '2022-07-24 07:24:55', '2022-07-23 16:58:12', NULL, NULL, NULL, 'M', NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-23 16:58:12', '2022-07-24 07:23:55'),
(5, '0.000000', 'yoga', 'koncex', NULL, '$2y$10$I.wvvlnK/UkMexbHhqN9Vu9w8Gn5.Ny1Fywlp1BX0qlgTQfOFB.TS', NULL, 'ypratama83@gmail.com', 0, 'Jn4FdOtnOlP9OD6SaJDDAXQOpT4ndEOm', NULL, 'zCwcoo8L3RyTBRjZjMT9rhiMcXSCrLQSyAyiRFsp29Bfn71Elk1KB74SWKs3', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '118.99.107.67', '2022-07-24 07:34:34', '2022-07-24 07:06:30', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-24 07:06:30', '2022-07-24 07:33:34'),
(6, '0.000000', 'testsani', 'testuser', NULL, '$2y$10$yDZmr5wJWVmFqD9JD8q/zOPrywtrFZSj6qTaWODExhzNj20YWSNUG', NULL, 'test.user@gmail.com', 0, 'rvOej9JbqCcRbp5Tu0Pk54fcX8xuWJnK', NULL, 'CTXDleLmAGuWaGBVUebrk7uoJXV0fcFHuo2W5QaMknotDMO6oepWyjOglO6U', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '39.41.207.88', '2022-07-24 07:27:52', '2022-07-24 07:25:00', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-24 07:25:00', '2022-07-24 07:26:52'),
(7, '0.000000', 'yoga test', 'yptest', NULL, '$2y$10$Uz/qmPXDy9oGhlVIRon5ROXx8jeWNZ/4qlge4xzwAZLCBNKy8RHg.', NULL, 'yptes@gmail.com', 0, 'ySJYkLX4ssY8ELRWNixW0epSDlvXWCHh', NULL, 'RYfSRbIPGF6BLgyrbeQVD1RSKZ7MNk7ZSGlUeYQSEAEQnn3rig2h2RXymMuw', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '118.99.107.67', '2022-07-24 07:38:12', '2022-07-24 07:35:33', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-24 07:35:33', '2022-07-24 07:37:12'),
(8, '0.000000', 'yogalagitest', 'yogalagitest', NULL, '$2y$10$/XZiWJ9XR/BEjgEkjtigDu9jPw3U6wokC8xFb/JOij6f7lky5gNs.', NULL, 'yogalagitest@gmail.com', 0, 'oyHjFRZjzwR2O8bU4vLwpDYW0ydNsf4t', NULL, 'qyG4YqtsadA0R18IiOuSCmc2Kl91iH1P0tcLt60m6bm1AmdQEeezmxSqKLsw', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 0, 0, 0, 0, '118.99.107.67', '2022-08-24 13:09:39', '2022-07-24 07:38:40', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-24 07:38:40', '2022-08-24 13:08:39'),
(9, '0.000000', 'Test user1', 'testuser1', NULL, '$2y$10$DiYJRaJo0imDgj/SV.37SOAWqx5L8iFR5EYCu5h0.tWZgdJdqFDTe', NULL, 'testuser1@testingaja.com', 0, 'oL0MqivM4Ho2cLDDdG8PBw0O8VvJERFD', NULL, '3hMsAvzHXF0UDcvW2xXW8VZR9drmO7AIaSvVM5UrIQnyLi22ca5H4iyoEY1E', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '118.99.107.67', '2022-07-24 11:13:15', '2022-07-24 07:57:35', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-07-24 07:57:35', '2022-07-24 11:12:15'),
(10, '0.000000', 'oripota99', 'thoriq99', NULL, '$2y$10$d0ifQJg4ZVaM2sw/JbG5cONIEQmBc1WvJCT76JJN12ua32SFQP8SS', NULL, 'athoriqrama99@gmail.com', 0, 'BUaWVjeXXMmSQpoYTQdWKHuxbpu2l8qG', NULL, 'vHcXsIVeRPIqAdzc67FbSuJaVLJQ9j3d59OF43kt5ctbTzMd7ZWJUer9fife', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-08-30 13:13:04', '2022-08-30 13:04:06', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-08-30 13:04:06', '2022-08-30 13:12:04'),
(11, '0.000000', 'ikaw09', 'adotz1991', NULL, '$2y$10$DQsr6OxBtfxkxiH1ay1.W.Qwvo8jo5t7aFmxHuOEJkBhimgvnnwgm', NULL, 'dotadotz91@gmail.com', 0, '5KGfaMSBaYChkpipDk2f4oYGscbSOkAC', NULL, 'pUykpRcZzJhZrHb3oeK1AMLhD4lWq3ASrzTU0KbitGXSiSl8BlPb95parjSn', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-08-30 13:23:00', '2022-08-30 13:12:46', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-08-30 13:12:46', '2022-08-30 13:22:00'),
(12, '0.000000', 'Untuk Iklan', 'iklan', NULL, '$2y$10$2kFhCnpMNJmOQBoLNsC/9e88exSgFDGPhqVFAU5EFwrkF/atS9Qky', NULL, 'untukiklan88@gmail.com', 0, 'No098raKT44jjUSHtjr9l1zR1VJLlaaC', NULL, 'Wl5eokHBY99STugIXUNnx5dsPquPEOlFw7TMY2cM2JYYFAzobDhpdKtd6dH6', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2022-09-03 13:03:08', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-09-03 13:03:08', '2022-09-03 13:03:08'),
(13, '0.000000', 'TESTING', 'testjwt', NULL, '$2y$10$lIUp5FIf6b7G0hx2scuQveiOE2c5I9bXHB/gTpXkeCaUPUzQydPB6', NULL, 'testjwt@tesjwtaja.com', 0, 'g1PMbKMYodi6Wt4z9RDqxOQGypwrFTUR', NULL, 'TnSDhyx84xeyDmgUtax2nF3BArraJlWtL7Xnpc4ACAqbVVnaBh4JB7wjEZlf', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, '103.195.56.196', '2022-09-19 03:48:15', '2022-09-19 03:22:14', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-09-19 03:22:14', '2022-09-19 03:47:15'),
(14, '0.000000', 'testsd', 'test', NULL, '$2y$10$6vCVaAsCCdfhWs.1jbSthejq8vNB2uPfwpbKL7ZSGiv88m2z9SEG.', NULL, 'test@mail.com', 0, '6C8g4jLKqXaSbftYqAy3DHbomTy0n36Y', NULL, '3ZSVvBg2zzJlEQjTI5n9HFRPHLTjCX5oTyQNPTWpe95pltu5qbcyXXc77HsJ', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 0, 0, 0, 0, 0, '192.168.1.203', '2023-01-06 01:12:02', '2022-11-24 14:21:26', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-10-29 08:02:52', '2023-01-06 01:11:02'),
(15, '0.000000', 'tester', 'test123', NULL, '$2y$10$cp4KPKuz6X8840YiWeQKtebBj34TE90c7NYeGu3lGp2qqZ1ien8ae', NULL, 'tester12@mail.com', 0, 'EE1BYCl5OItnuo0gQBcDqkpqnoWMLfLu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 13:00:29', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 13:00:29', '2022-12-14 13:00:29'),
(16, '0.000000', 'testing', 'testing123', NULL, '$2y$10$0bhS8H3QR8jNJFHvmssbCuofBHuj8czKF/4gCyvU.yy2bxNhmpA5e', NULL, 'testing@mail.com', 0, 'BeJrhxi5nMh3DUf56fYEWKKOp52HYAzr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 13:01:47', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 13:01:47', '2022-12-14 13:01:47'),
(17, '0.000000', 'tester', 'test1234', NULL, '$2y$10$I5WJTYzhrGdcR//lUK.0Gejh3fip9THgrt/wK4YZ0c9oHGL2xq99q', NULL, 'tester123@mail.com', 0, 'm17YEnK5DUQAsbOBzS7HQX9MR7dtATYr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 13:08:17', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 13:08:17', '2022-12-14 13:08:17'),
(18, '0.000000', 'test', 'hahaha', NULL, '$2y$10$lHwZ7KScG7RKjuP4cTjRsek9yzElAScNqBGuoYGMg5kyWb2L9TKV6', NULL, 'test12412@mail.com', 0, 'EPvWk1tioQBByBfNQ4Jd5w5bJ5UoSqlT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 13:09:26', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 13:09:26', '2022-12-14 13:09:26'),
(19, '0.000000', 'hahah', 'haha', NULL, '$2y$10$o1iq2MfNqVuokjl4F3scc.ngJRx4XXCn53RwjEdazeR7PpsWrbvn6', NULL, 'hahah@mail.com', 0, 'ep3tp6LI19oUiRkTvy4l7r9A2RXq6kpu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 13:10:37', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 13:10:37', '2022-12-14 13:10:37'),
(20, '0.000000', 'hahaha', 'hahaah', NULL, '$2y$10$E/mJtpu.IYL.gWpg52B6a.KNnQTZYhug6hLETNYeXjj6pxPoxkjTy', NULL, 'hahahaha@mail.com', 0, 'njG2aXcOVc1hdZeW9JUPkwkYZApVf5V0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 14:20:39', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 14:20:39', '2022-12-14 14:20:39'),
(21, '0.000000', 'hahahaha', 'hahaha123', NULL, '$2y$10$Ey7xejVDuyvpijdsiyY0O.F8gNYEyZ5B3Pk/sBhRpiHP4t3AdXIli', NULL, 'hahahaha123@mail.com', 0, 'Q8TNOgLMXN9nRWoQ3MJbwftcYm2FCC60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 9, 0, 0, 0, 0, 0, NULL, NULL, '2022-12-14 14:22:28', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 15, 30, '2022-12-14 14:22:28', '2022-12-14 14:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL,
  `youtube_id` varchar(50) DEFAULT NULL,
  `stream_url` varchar(191) DEFAULT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `explicit` tinyint(1) NOT NULL DEFAULT '0',
  `selling` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `genre` varchar(50) DEFAULT NULL,
  `mood` varchar(50) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `description` text,
  `access` varchar(191) DEFAULT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `artistIds` varchar(50) DEFAULT NULL,
  `loves` int(11) NOT NULL DEFAULT '0',
  `collectors` int(11) NOT NULL DEFAULT '0',
  `plays` int(11) NOT NULL DEFAULT '0',
  `released_at` date DEFAULT NULL,
  `copyright` varchar(191) DEFAULT NULL,
  `allow_download` tinyint(1) NOT NULL DEFAULT '1',
  `download_count` mediumint(9) NOT NULL DEFAULT '0',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `comment_count` mediumint(9) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `use_count` int(11) NOT NULL DEFAULT '0',
  `usage_limit` int(11) DEFAULT NULL,
  `minimum_spend` int(11) DEFAULT NULL,
  `maximum_spend` int(11) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `type`, `description`, `amount`, `use_count`, `usage_limit`, `minimum_spend`, `maximum_spend`, `access`, `approved`, `created_at`, `updated_at`, `expired_at`) VALUES
(2, 'christmas', 'percentage', 'Free in Christmas', 100, 3, 100, 10000, NULL, NULL, 1, '2022-12-11 17:14:05', '2022-12-31 16:35:21', '2023-12-31 00:00:00'),
(3, 'test100', 'percentage', 'fddf', 30, 0, 100, NULL, NULL, NULL, 1, '2022-12-13 15:25:43', '2022-12-25 09:24:32', '2022-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_royaltis`
--

CREATE TABLE `withdraw_royaltis` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account_number` int(20) NOT NULL,
  `value` float NOT NULL,
  `value_idr` float NOT NULL,
  `value_tax` float NOT NULL,
  `value_admin` float NOT NULL,
  `value_total` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_royaltis`
--

INSERT INTO `withdraw_royaltis` (`id`, `user_id`, `bank`, `name`, `account_number`, `value`, `value_idr`, `value_tax`, `value_admin`, `value_total`, `status`, `created_at`, `updated_at`) VALUES
(4, 14, 'BCA', 'bhkfb', 84290427, 0.001, 15.603, 4.6809, 1.63831, 9.28378, 1, '2023-01-05 16:02:18', '2023-01-05 16:23:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COLLAPSE_QUERY_INDEX` (`user_id`,`activityable_type`,`action`),
  ADD KEY `INDEX_FOR_DELETE` (`activityable_id`,`activityable_type`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activityable_id` (`activityable_id`),
  ADD KEY `action` (`action`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`),
  ADD KEY `type` (`type`),
  ADD KEY `artistId` (`artistIds`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `approved` (`approved`),
  ADD KEY `selling` (`selling`),
  ADD KEY `albums_title_index` (`title`),
  ADD KEY `display_artist` (`display_artist`);

--
-- Indexes for table `album_artist`
--
ALTER TABLE `album_artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_songs`
--
ALTER TABLE `album_songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AlbumSong` (`song_id`,`album_id`),
  ADD KEY `album_songs_album_id_index` (`album_id`);

--
-- Indexes for table `album_spotify_logs`
--
ALTER TABLE `album_spotify_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_spotify_logs_spotify_id_unique` (`spotify_id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `fetched` (`fetched`);

--
-- Indexes for table `album_types`
--
ALTER TABLE `album_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `verified` (`verified`),
  ADD KEY `artists_name_index` (`name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `artist_requests`
--
ALTER TABLE `artist_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `approved` (`approved`);

--
-- Indexes for table `artist_spotify_logs`
--
ALTER TABLE `artist_spotify_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artist_spotify_logs_spotify_id_unique` (`spotify_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `fetched` (`fetched`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_type_index` (`type`);

--
-- Indexes for table `banner_tracks`
--
ALTER TABLE `banner_tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age` (`age`),
  ADD KEY `gender` (`gender`);

--
-- Indexes for table `cart_storage`
--
ALTER TABLE `cart_storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_storage_id_index` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `alt_name` (`alt_name`),
  ADD KEY `allow_home` (`allow_home`),
  ADD KEY `allow_discover` (`allow_discover`),
  ADD KEY `allow_radio` (`allow_radio`),
  ADD KEY `allow_community` (`allow_community`),
  ADD KEY `allow_trending` (`allow_trending`),
  ADD KEY `mood` (`mood`),
  ADD KEY `radio` (`radio`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `allow_podcasts` (`allow_podcasts`),
  ADD KEY `podcast` (`podcast`),
  ADD KEY `allow_videos` (`allow_videos`),
  ADD KEY `attraction` (`attraction`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CountryCode` (`country_code`),
  ADD KEY `fixed` (`fixed`),
  ADD KEY `visibility` (`visibility`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`user_id`,`playlist_id`,`friend_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_FOR_USER_LOVE` (`user_id`,`collectionable_id`,`collectionable_type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `object_id` (`commentable_id`),
  ADD KEY `object_type` (`commentable_type`),
  ADD KEY `approve` (`approved`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `continent` (`continent`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `government_form` (`government_form`),
  ADD KEY `fixed` (`fixed`),
  ADD KEY `visibility` (`visibility`);

--
-- Indexes for table `countrylanguage`
--
ALTER TABLE `countrylanguage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_code` (`country_code`,`name`),
  ADD KEY `CountryCode` (`country_code`),
  ADD KEY `fixed` (`fixed`),
  ADD KEY `visibility` (`visibility`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season` (`season`),
  ADD KEY `number` (`number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `podcast_id` (`podcast_id`),
  ADD KEY `allow_comments` (`allow_comments`),
  ADD KEY `play_count` (`play_count`),
  ADD KEY `failed_count` (`failed_count`),
  ADD KEY `approved` (`approved`),
  ADD KEY `pending` (`pending`);
ALTER TABLE `episodes` ADD FULLTEXT KEY `searchcontent` (`title`,`description`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `visibility` (`visibility`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_royaltis`
--
ALTER TABLE `file_royaltis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_songs`
--
ALTER TABLE `free_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alt_name` (`alt_name`),
  ADD KEY `genres_discover_index` (`discover`);

--
-- Indexes for table `group_genres`
--
ALTER TABLE `group_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hash_tags`
--
ALTER TABLE `hash_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_FOR_USER_LOVE` (`user_id`,`historyable_id`,`historyable_type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_FOR_USER_LOVE` (`user_id`,`loveable_id`,`loveable_type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lyrics`
--
ALTER TABLE `lyrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `approved` (`approved`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `metatags`
--
ALTER TABLE `metatags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alt_name` (`alt_name`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX_FOR_DELETE` (`notificationable_id`,`notificationable_type`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `object_id` (`object_id`),
  ADD KEY `action` (`action`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `oauth_socialite`
--
ALTER TABLE `oauth_socialite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_SERVICE` (`user_id`,`provider_id`,`service`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency` (`currency`),
  ADD KEY `payment_status` (`payment_status`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patners`
--
ALTER TABLE `patners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborate` (`collaboration`),
  ADD KEY `mood` (`mood`),
  ADD KEY `playlists_title_index` (`title`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PlaylistSong` (`song_id`,`playlist_id`),
  ADD KEY `playlist_songs_playlist_id_index` (`playlist_id`);

--
-- Indexes for table `playlist_spotify_logs`
--
ALTER TABLE `playlist_spotify_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `fetched` (`fetched`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `category` (`category`),
  ADD KEY `country_code` (`country_code`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `allow_comments` (`allow_comments`),
  ADD KEY `allow_download` (`allow_download`),
  ADD KEY `explicit` (`explicit`),
  ADD KEY `approved` (`approved`);
ALTER TABLE `podcasts` ADD FULLTEXT KEY `searchcontent` (`title`,`description`);

--
-- Indexes for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `podcast_categories_disable_main_index` (`disable_main`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_type` (`object_type`),
  ADD KEY `object_id` (`object_id`),
  ADD KEY `started_at` (`started_at`),
  ADD KEY `ended_at` (`ended_at`);

--
-- Indexes for table `poll_logs`
--
ALTER TABLE `poll_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`poll_id`),
  ADD KEY `member` (`user_id`);

--
-- Indexes for table `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `podcastId` (`podcast_id`,`created_at`),
  ADD KEY `episodeId` (`episode_id`,`created_at`),
  ADD KEY `stationId` (`station_id`,`created_at`),
  ADD KEY `albumId` (`album_id`,`created_at`),
  ADD KEY `playlistId` (`playlist_id`,`created_at`),
  ADD KEY `trackId` (`song_id`,`created_at`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `podcast_id` (`podcast_id`),
  ADD KEY `episode_id` (`episode_id`),
  ADD KEY `station_id` (`station_id`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`user_id`),
  ADD KEY `alt_name` (`alt_name`),
  ADD KEY `category` (`category`),
  ADD KEY `comm_num` (`comment_count`),
  ADD KEY `allow_main` (`allow_main`),
  ADD KEY `fixed` (`fixed`),
  ADD KEY `tags` (`tags`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `approve` (`approved`);
ALTER TABLE `posts` ADD FULLTEXT KEY `article` (`short_content`,`full_content`,`title`);

--
-- Indexes for table `post_logs`
--
ALTER TABLE `post_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`post_id`),
  ADD KEY `expires` (`expires`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `REACTION_UNIQUE` (`user_id`,`reactionable_id`,`reactionable_type`),
  ADD KEY `reaction_type` (`type`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alt_name` (`alt_name`),
  ADD KEY `fixed` (`fixed`),
  ADD KEY `visibility` (`visibility`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_FOR_USER_LOVE` (`user_id`,`reportable_id`,`reportable_type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `royaltis`
--
ALTER TABLE `royaltis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `allow_home` (`allow_home`),
  ADD KEY `allow_discover` (`allow_discover`),
  ADD KEY `allow_community` (`allow_community`),
  ADD KEY `allow_trending` (`allow_trending`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`),
  ADD KEY `radio` (`radio`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `allow_podcasts` (`allow_podcasts`),
  ADD KEY `podcast` (`podcast`),
  ADD KEY `allow_videos` (`allow_videos`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mp3` (`mp3`),
  ADD KEY `hd` (`hd`),
  ADD KEY `hls` (`hls`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`),
  ADD KEY `collectors` (`collectors`),
  ADD KEY `allow_download` (`allow_download`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `approve` (`approved`),
  ADD KEY `flac` (`flac`),
  ADD KEY `wav` (`wav`),
  ADD KEY `selling` (`selling`),
  ADD KEY `pending` (`pending`),
  ADD KEY `explicit` (`explicit`),
  ADD KEY `preview` (`preview`),
  ADD KEY `waveform` (`waveform`),
  ADD KEY `songs_artistids_index` (`artistIds`),
  ADD KEY `songs_title_index` (`title`),
  ADD KEY `display_artist` (`display_artist`);

--
-- Indexes for table `song_price`
--
ALTER TABLE `song_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song_spotify_logs`
--
ALTER TABLE `song_spotify_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `song_spotify_logs_spotify_id_unique` (`spotify_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `song_tags`
--
ALTER TABLE `song_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `country_code` (`country_code`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `allow_comments` (`allow_comments`),
  ADD KEY `play_count` (`play_count`),
  ADD KEY `failed_count` (`failed_count`);
ALTER TABLE `stations` ADD FULLTEXT KEY `searchcontent` (`title`,`description`);

--
-- Indexes for table `stream_stats`
--
ALTER TABLE `stream_stats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_STREAM` (`streamable_id`,`streamable_type`,`ip`),
  ADD KEY `USER_STREAM_TYPE` (`user_id`,`streamable_type`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `payment` (`gate`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `free_song_id` (`free_song_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_verified` (`email_verified`),
  ADD KEY `email_verified_code` (`email_verified_code`),
  ADD KEY `banned` (`banned`),
  ADD KEY `artistId` (`artist_id`),
  ADD KEY `last_activity` (`last_activity`),
  ADD KEY `last_seen_notif` (`last_seen_notif`),
  ADD KEY `users_stripe_id_index` (`trialed`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `explicit` (`explicit`),
  ADD KEY `selling` (`selling`),
  ADD KEY `genre` (`genre`),
  ADD KEY `mood` (`mood`),
  ADD KEY `collectors` (`collectors`),
  ADD KEY `allow_download` (`allow_download`),
  ADD KEY `visibility` (`visibility`),
  ADD KEY `approve` (`approved`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `paid` (`paid`);

--
-- Indexes for table `withdraw_royaltis`
--
ALTER TABLE `withdraw_royaltis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `album_artist`
--
ALTER TABLE `album_artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `album_songs`
--
ALTER TABLE `album_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `album_spotify_logs`
--
ALTER TABLE `album_spotify_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_types`
--
ALTER TABLE `album_types`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `artist_requests`
--
ALTER TABLE `artist_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `artist_spotify_logs`
--
ALTER TABLE `artist_spotify_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banner_tracks`
--
ALTER TABLE `banner_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countrylanguage`
--
ALTER TABLE `countrylanguage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_royaltis`
--
ALTER TABLE `file_royaltis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `free_songs`
--
ALTER TABLE `free_songs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `group_genres`
--
ALTER TABLE `group_genres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hash_tags`
--
ALTER TABLE `hash_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lyrics`
--
ALTER TABLE `lyrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `metatags`
--
ALTER TABLE `metatags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_socialite`
--
ALTER TABLE `oauth_socialite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `patners`
--
ALTER TABLE `patners`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playlist_spotify_logs`
--
ALTER TABLE `playlist_spotify_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_logs`
--
ALTER TABLE `poll_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `popular`
--
ALTER TABLE `popular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_logs`
--
ALTER TABLE `post_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `royaltis`
--
ALTER TABLE `royaltis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `song_price`
--
ALTER TABLE `song_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `song_spotify_logs`
--
ALTER TABLE `song_spotify_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_tags`
--
ALTER TABLE `song_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stream_stats`
--
ALTER TABLE `stream_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdraw_royaltis`
--
ALTER TABLE `withdraw_royaltis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
