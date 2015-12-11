-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 12 月 11 日 12:08
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tsu`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `client`
--

INSERT INTO `client` (`id`, `name`) VALUES
(3, 'グラグラ'),
(5, 'わーい！'),
(6, '株式会社社会式株'),
(7, 'サンプルコープ'),
(8, 'ボンバーマン'),
(16, 'Help'),
(18, 'ABCDEFG'),
(19, 'おーい！お茶'),
(20, 'A'),
(23, '0120'),
(49, 'Aカンパニー'),
(50, 'B会社'),
(51, 'C社'),
(52, 'すごい会社'),
(53, 'ホントにすごい会社'),
(54, 'Happy'),
(56, 'グラフィック'),
(57, 'あの会社'),
(58, 'Hello World'),
(60, '大川株式会社　創立50周年バージョン'),
(61, 'ヒロキ株式会社'),
(75, 'すごい会社'),
(76, 'ものすごい会社'),
(77, 'パン工場'),
(78, 'aaaaaaa'),
(79, '名古屋'),
(80, '012012012'),
(81, 'わーい'),
(82, 'APPLEEEEE'),
(83, '新規さん'),
(84, 'わーるどわいどうぇぶ'),
(85, '毛利探偵事務所'),
(86, 'NASA'),
(87, '中京大学'),
(88, 'コーヒー同好会'),
(89, '会社です。'),
(90, 'ショッカー'),
(91, 'わー'),
(92, 'わーる'),
(93, 'JAXA'),
(94, '777');

-- --------------------------------------------------------

--
-- テーブルの構造 `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `code` varchar(30) NOT NULL,
  `content` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `profitability` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) NOT NULL,
  `works_id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `total` varchar(100) NOT NULL,
  `regist_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recent_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `team`
--

INSERT INTO `team` (`id`, `name`) VALUES
(1, 'Web'),
(2, 'Design'),
(3, 'Edit'),
(4, 'DTP');

-- --------------------------------------------------------

--
-- テーブルの構造 `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `content` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `unit`
--

INSERT INTO `unit` (`id`, `code`, `content`, `cost`, `sales`) VALUES
(1, 'C-A', 'コーディングLV.A', 22500, 30000),
(2, 'D-A', 'デザインA', 22500, 30000),
(3, '3-PC-B', 'ページ制作（固定ページ）', 22500, 30000);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `id_name` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `thumb` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `id_name`, `pass`, `name`, `mail`, `thumb`) VALUES
(66, 'doko', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'Doko', 'doko@grahic.co.jp', 'ika.jpg'),
(98, 'okawa', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'okawa-h', 'okawa-h@graphic.co.jp', 'yellow.png'),
(99, 'Mas', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'mas', 'doko@graphic.co.jp', 'icon_red.jpg'),
(100, 'a', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', '0000', 'doko@graphic.co.jp', 'mario.png'),
(101, '1111', '8c520ced222553c25f3c42ede72ecba8b107a25976046f68793c82fdc01b34ca', '1234', 'doko@graphic.co.jp', 'img_noimg.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` bigint(20) NOT NULL,
  `client` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `staff` varchar(50) NOT NULL,
  `regist` datetime NOT NULL,
  `updates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `works`
--

INSERT INTO `works` (`id`, `client`, `title`, `staff`, `regist`, `updates`) VALUES
(1, '82', '避けるべき案件', 'あの人', '2015-09-29 12:06:21', '2015-09-29 03:06:21'),
(2, '81', 'テストアップ', 'スズキ', '2015-09-30 08:15:56', '2015-09-29 23:15:56'),
(3, '84', 'そんなーー', 'スズキ', '2015-09-30 15:28:39', '2015-09-30 06:28:39'),
(4, '84', 'デリート！', 'スズキ', '2015-09-30 15:50:51', '2015-09-30 06:50:51'),
(5, '79', 'リニューアル', 'あの人', '2015-09-30 15:51:45', '2015-09-30 06:51:45'),
(6, '83', 'あんなこといいな、できたらいいな！', 'あの人', '2015-09-30 17:30:23', '2015-09-30 08:30:23'),
(7, '85', '犯人探し', 'コゴロー', '2015-09-30 18:38:22', '2015-09-30 09:38:22'),
(8, '86', '火星探査機の開発と現地同行', 'ジョージ', '2015-09-30 19:45:34', '2015-09-30 10:45:34'),
(9, '86', '太陽系からの脱出', '山田', '2015-09-30 19:49:20', '2015-09-30 10:49:20'),
(10, '86', '隕石を撃ち落とす', 'スズキ', '2015-09-30 19:51:04', '2015-09-30 10:51:04'),
(11, '86', '隕石を撃ち落とす　その2', 'スズキ', '2015-09-30 19:51:44', '2015-09-30 10:51:44'),
(12, '53', '隕石を撃ち落とす　その3', 'あの人', '2015-09-30 19:52:35', '2015-09-30 10:52:35'),
(13, '85', '黒の組織壊滅', 'あの人', '2015-10-01 09:24:18', '2015-10-01 00:24:18'),
(14, '88', 'スタバを超えるコーヒーの提案', '1000代', '2015-10-03 10:01:33', '2015-10-03 01:01:33'),
(15, '86', 'テストアップ', 'あの人', '2015-10-03 15:47:49', '2015-10-03 06:47:49'),
(16, '52', 'すごい案件', 'あの人', '2015-10-03 17:15:55', '2015-10-03 08:15:55'),
(17, '88', '豆選定', '山田', '2015-10-03 17:17:21', '2015-10-03 08:17:21'),
(18, '61', '修正対応', 'あの人', '2015-10-06 17:08:48', '2015-10-06 08:08:48'),
(19, '89', 'まじかよ！？', 'スズキ', '2015-11-17 16:35:48', '2015-11-17 07:35:48'),
(20, '88', '豆選定', '123', '2015-12-08 17:25:29', '2015-12-08 08:25:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
