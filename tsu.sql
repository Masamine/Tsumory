-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 1 月 15 日 12:01
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
  `team` varchar(200) NOT NULL,
  `total` int(100) NOT NULL,
  `regist_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `author` int(100) NOT NULL,
  `modified` int(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `works_id`, `post_name`, `team`, `total`, `regist_date`, `recent_date`, `status`, `author`, `modified`, `details`) VALUES
(101, 13, '伸縮サスペンダー', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', 410000, '2016-01-14 08:04:30', '2016-01-14 08:04:30', '', 66, 66, 'a:12:{i:0;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:1;a:8:{i:0;N;i:1;s:6:"3-PC-B";i:2;s:36:"ページ制作（固定ページ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:2;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:3;a:8:{i:0;N;i:1;s:6:"3-PC-B";i:2;s:36:"ページ制作（固定ページ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:4;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:5;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:6;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:7;a:8:{i:0;N;i:1;s:6:"3-PC-B";i:2;s:36:"ページ制作（固定ページ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:8;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:9;a:8:{i:0;N;i:1;s:3:"4-S";i:2;s:21:"スクリプト制作";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:10;a:8:{i:0;N;i:1;s:3:"4-O";i:2;s:24:"画像・パーツ制作";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:11;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}}'),
(102, 7, '追跡メガネ製作', 'a:1:{i:0;s:1:"2";}', 100000, '2016-01-15 09:29:22', '2016-01-15 09:29:22', '', 66, 66, 'a:4:{i:0;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:1;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:2;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:3;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}}'),
(103, 8, 'あああああああああ', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', 150000, '2016-01-15 09:30:11', '2016-01-15 09:30:11', '', 66, 66, 'a:5:{i:0;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:1;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:2;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:3;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:4;a:8:{i:0;N;i:1;s:3:"4-S";i:2;s:21:"スクリプト制作";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}}'),
(104, 7, 'aaaaa', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}', 4070000, '2016-01-15 09:36:17', '2016-01-15 09:36:17', '', 66, 66, 'a:4:{i:0;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:1;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:2;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:3;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:3:"100";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:7:"4000000";}}'),
(105, 20, '0120', 'a:1:{i:0;s:1:"1";}', 270000, '2016-01-15 09:37:21', '2016-01-15 09:37:21', '', 66, 66, 'a:12:{i:0;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:1;a:8:{i:0;N;i:1;s:6:"3-PC-B";i:2;s:36:"ページ制作（固定ページ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:2;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:3;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:4;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:5;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:6;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:7;a:8:{i:0;N;i:1;s:6:"3-PC-B";i:2;s:36:"ページ制作（固定ページ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:8;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:9;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:10;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:11;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}}'),
(106, 20, '00000', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', 150000, '2016-01-15 09:38:54', '2016-01-15 09:38:54', '', 66, 66, 'a:5:{i:0;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:1;a:8:{i:0;N;i:1;s:5:"1-M-B";i:2;s:80:"プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:2;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:3;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:4;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}}'),
(107, 8, 'あああああああああ', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', 40190000, '2016-01-15 09:56:06', '2016-01-15 09:56:06', '', 66, 66, 'a:6:{i:0;a:8:{i:0;N;i:1;s:5:"0-ttl";i:2;s:9:"見出し";i:3;s:1:"0";i:4;s:0:"";i:5;s:1:"0";i:6;s:1:"0";i:7;s:1:"0";}i:1;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:2;a:8:{i:0;N;i:1;s:6:"3-PC-A";i:2;s:39:"ページ制作（レスポンシブ）";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}i:3;a:8:{i:0;N;i:1;s:3:"4-C";i:2;s:36:"テンプレートコーディング";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"22500";i:6;s:5:"30000";i:7;s:5:"30000";}i:4;a:8:{i:0;N;i:1;s:3:"4-S";i:2;s:21:"スクリプト制作";i:3;s:4:"1001";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:8:"40040000";}i:5;a:8:{i:0;N;i:1;s:3:"4-S";i:2;s:21:"スクリプト制作";i:3;s:1:"1";i:4;s:6:"人日";i:5;s:5:"27500";i:6;s:5:"40000";i:7;s:5:"40000";}}');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `unit`
--

INSERT INTO `unit` (`id`, `code`, `content`, `cost`, `sales`) VALUES
(3, '3-PC-B', 'ページ制作（固定ページ）', 22500, 30000),
(4, '1-M-A', 'プロジェクト進行管理（￥1,000,000〜）制作費の12%以上', 32500, 50000),
(5, '1-M-B', 'プロジェクト進行管理（￥100,000〜￥999,000）制作費の10%以上', 27500, 40000),
(6, '2-DB', 'データベース設計', 27500, 40000),
(7, '2-PP-A', 'ページ設計（レスポンシブ）', 32500, 50000),
(8, '3-PC-A', 'ページ制作（レスポンシブ）', 27500, 40000),
(9, '4-C', 'テンプレートコーディング', 22500, 30000),
(10, '2-P', '要件定義、企画・提案', 27500, 40000),
(11, '4-S', 'スクリプト制作', 27500, 40000),
(12, '4-O', '画像・パーツ制作', 22500, 30000),
(13, '4-MF', 'メールフォーム設置', 22500, 30000);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `id_name`, `pass`, `name`, `mail`, `thumb`) VALUES
(66, 'doko', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'どこー', 'doko@grahic.co.jp', '20160109151251201512251857002015122518555220151225185525ika.jpg'),
(99, 'Mas', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', 'MS', 'doko@graphic.co.jp', 'img_noimg.jpg'),
(100, 'a', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', '0000', 'doko@graphic.co.jp', 'mario.png'),
(101, '1111', '8c520ced222553c25f3c42ede72ecba8b107a25976046f68793c82fdc01b34ca', '1234', 'doko@graphic.co.jp', 'img_noimg.jpg'),
(102, '333', 'f06b05ae55956ec11115ef940c9618a5bb5f38a6e13bdf29b0361d713f629cc4', '333', 'doko@graphic.co.jp', 'icon_red.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `works`
--

INSERT INTO `works` (`id`, `client`, `title`, `staff`, `regist`, `updates`) VALUES
(7, '85', '犯人探し', 'コゴロー', '2015-09-30 18:38:22', '2016-01-15 09:36:17'),
(8, '86', '火星探査機の開発と現地同行', 'ジョージ', '2015-09-30 19:45:34', '2016-01-15 09:56:06'),
(9, '86', '太陽系からの脱出', '山田', '2015-09-30 19:49:20', '2015-12-28 08:08:36'),
(10, '86', '隕石を撃ち落とす', 'スズキ', '2015-09-30 19:51:04', '2015-12-25 07:14:17'),
(13, '85', '黒の組織壊滅', 'あの人', '2015-10-01 09:24:18', '2016-01-14 08:04:30'),
(14, '88', 'スタバを超えるコーヒーの提案', '1000代', '2015-10-03 10:01:33', '2015-12-25 09:36:04'),
(16, '52', 'すごい案件', 'あの人', '2015-10-03 17:15:55', '2016-01-09 04:48:19'),
(17, '88', '豆選定', '山田', '2015-10-03 17:17:21', '2016-01-09 08:05:28'),
(18, '93', 'ハッカソン', '先生', '2015-12-25 14:24:11', '2016-01-06 09:44:58'),
(19, '93', 'あ', '太陽系', '2016-01-15 18:28:19', '2016-01-15 09:28:19'),
(20, '52', 'まじかよ！？', 'スズキ', '2016-01-15 18:36:53', '2016-01-15 09:38:54'),
(21, '7', 'まじかよ！？', '123', '2016-01-15 18:44:03', '2016-01-15 09:44:03');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
