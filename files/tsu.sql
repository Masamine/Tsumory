-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 9 月 18 日 12:29
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
-- テーブルの構造 `tsury_client`
--

CREATE TABLE IF NOT EXISTS `tsury_client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tsury_client`
--

INSERT INTO `tsury_client` (`id`, `name`) VALUES
(3, 'グラグラ'),
(5, 'わーい！'),
(6, '株式会社社会式株'),
(7, 'サンプルコープ'),
(8, 'ボンバーマン'),
(14, 'aaaa'),
(15, '78945613'),
(16, 'Help'),
(17, 'あｓどあｈｓだそでゃそだそｄじゃそｄじゃそｄじゃそｄじゃそｄじゃｓｄじゃおｓｄじゃおｓｄじょあｓｊだおｓｄじゃおｓｄじゃおｓｄじゃ'),
(18, 'ABCDEFG'),
(19, 'おーい！お茶'),
(20, 'A'),
(23, '0120'),
(24, '123456'),
(38, 'asdasdadsa'),
(39, '98465145asda'),
(40, '1234'),
(41, '000000'),
(42, '111111'),
(43, '7777'),
(44, '999999999'),
(45, 'Fire'),
(46, 'Fire02'),
(47, 'Fire03'),
(48, '120120120'),
(49, 'Aカンパニー'),
(50, 'B会社'),
(51, 'C社'),
(52, 'すごい会社'),
(53, 'ホントにすごい会社'),
(54, 'Happy'),
(55, '999'),
(56, 'グラフィック'),
(57, 'あの会社'),
(58, 'Hello World'),
(59, '会社名'),
(60, '大川株式会社　創立50周年バージョン'),
(61, 'ヒロキ株式会社');

-- --------------------------------------------------------

--
-- テーブルの構造 `tsury_detail`
--

CREATE TABLE IF NOT EXISTS `tsury_detail` (
  `detail_id` bigint(20) NOT NULL,
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
-- テーブルの構造 `tsury_memo`
--

CREATE TABLE IF NOT EXISTS `tsury_memo` (
  `memo_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tsury_posts`
--

CREATE TABLE IF NOT EXISTS `tsury_posts` (
  `post_id` bigint(20) NOT NULL,
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
-- テーブルの構造 `tsury_unit`
--

CREATE TABLE IF NOT EXISTS `tsury_unit` (
  `code` varchar(10) NOT NULL,
  `content` varchar(100) NOT NULL,
  `category` text NOT NULL,
  `unit` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `profitability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tsury_user`
--

CREATE TABLE IF NOT EXISTS `tsury_user` (
  `user_id` int(11) NOT NULL,
  `user_user` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_thumb` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- テーブルのデータのダンプ `tsury_user`
--

INSERT INTO `tsury_user` (`user_id`, `user_user`, `user_pass`, `user_name`, `user_mail`, `user_thumb`) VALUES
(66, 'doko', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'Doko', 'doko@grahic.co.jp', 'icon.jpg'),
(98, 'okawa', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'okawa-h', 'okawa-h@graphic.co.jp', 'yellow.png'),
(99, 'Mas', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'mas', 'doko@graphic.co.jp', 'icon_red.jpg'),
(100, 'a', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', '0000', 'doko@graphic.co.jp', 'mario.png'),
(101, '1111', '8c520ced222553c25f3c42ede72ecba8b107a25976046f68793c82fdc01b34ca', '1234', 'doko@graphic.co.jp', 'img_noimg.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `tsury_works`
--

CREATE TABLE IF NOT EXISTS `tsury_works` (
  `id` bigint(20) NOT NULL,
  `client` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `client_staff` varchar(50) NOT NULL,
  `regist_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recent_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tsury_works`
--

INSERT INTO `tsury_works` (`id`, `client`, `title`, `client_staff`, `regist_date`, `recent_date`) VALUES
(14, '52', 'まじかよ！？', 'すごい人', '2015-09-15 08:11:23', '2015-09-15 08:11:23'),
(15, '53', 'みんなが避ける案件', 'こんな人がいるのか！', '2015-09-15 08:12:58', '2015-09-15 08:12:58'),
(16, '53', 'まじかよ！？', 'Bさん', '2015-09-15 09:44:06', '2015-09-15 09:44:06'),
(17, '56', '冊子500000000000部印刷', 'D', '2015-09-15 09:44:44', '2015-09-15 09:44:44'),
(18, '57', 'あの案件', 'あの人', '2015-09-15 09:48:47', '2015-09-15 09:48:47'),
(19, '56', 'デリート！', 'すごい人', '2015-09-15 09:49:57', '2015-09-15 09:49:57'),
(20, '56', '焼肉定食', '大川', '2015-09-15 10:26:40', '2015-09-15 10:26:40'),
(21, '8', '爆破', '白', '2015-09-15 10:28:01', '2015-09-15 10:28:01'),
(22, '54', 'Year', 'New', '2015-09-15 10:28:53', '2015-09-15 10:28:53'),
(23, '58', '【コンペ】勝ったら1,000万案件', 'はろーわーるど', '2015-09-15 10:30:13', '2015-09-15 10:30:13'),
(26, '57', '削除', 'Bさん', '2015-09-15 11:06:37', '2015-09-15 11:06:37'),
(27, '45', 'テストアップ', 'すごい人', '2015-09-15 11:47:21', '2015-09-15 11:47:21'),
(28, '56', '削除', 'すごい人', '2015-09-15 11:48:07', '2015-09-15 11:48:07'),
(29, '53', 'テストアップ', 'Aさん', '2015-09-15 11:49:58', '2015-09-15 11:49:58'),
(30, '61', 'スター表示機能', 'おれ', '2015-09-15 11:54:07', '2015-09-15 11:54:07'),
(31, '60', 'バンザーーーーイ！', '大川', '2015-09-15 19:10:47', '2015-09-15 19:10:47'),
(32, '52', 'リニューアルしますよ！', 'あの人', '2015-09-15 19:12:20', '2015-09-15 19:12:20'),
(33, '3', '流星群機能追加', 'すごい人', '2015-09-15 19:12:49', '2015-09-15 19:12:49'),
(34, '3', 'プロフィールページ：ソート機能バージョンアップ', '大川', '2015-09-16 11:23:17', '2015-09-16 11:23:17'),
(35, '60', 'クレーム報告書のクレーム対応に対してのクレーム対応', 'あの人', '2015-09-16 11:35:35', '2015-09-16 11:35:35'),
(36, '61', 'プロフィールページで一斉置換に成功！', 'Aさん', '2015-09-16 18:09:45', '2015-09-16 18:09:45'),
(37, '57', 'みんなが避ける案件その2', 'あの人', '2015-09-16 18:14:24', '2015-09-16 18:14:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsury_client`
--
ALTER TABLE `tsury_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`id`);

--
-- Indexes for table `tsury_detail`
--
ALTER TABLE `tsury_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tsury_memo`
--
ALTER TABLE `tsury_memo`
  ADD PRIMARY KEY (`memo_id`);

--
-- Indexes for table `tsury_posts`
--
ALTER TABLE `tsury_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tsury_user`
--
ALTER TABLE `tsury_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tsury_works`
--
ALTER TABLE `tsury_works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tsury_client`
--
ALTER TABLE `tsury_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tsury_memo`
--
ALTER TABLE `tsury_memo`
  MODIFY `memo_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tsury_posts`
--
ALTER TABLE `tsury_posts`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tsury_user`
--
ALTER TABLE `tsury_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `tsury_works`
--
ALTER TABLE `tsury_works`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
