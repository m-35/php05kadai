-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-25 14:40:35
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `video_app2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト２一般', 'test2', 'test2', 0, 0),
(3, 'テスト3', 'test3', 'test3', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `capital` int(20) NOT NULL,
  `industry` varchar(64) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `company_name`, `capital`, `industry`, `uploader`, `email`, `password`, `created_at`) VALUES
(19, '株式会社サンプルA', 2000, '製造業', '', 'example@samplea.co.jp', '$2y$10$EEBh3mhvbN2.T.os4LqUwO/FXM/fo34yt.5Swv/mUZ3OTglu40cMu', '2024-07-25 11:54:15'),
(20, '株式会社サンプルB', 1900, '飲食業', '', 'example@sampleb.co.jp', '$2y$10$8pZarBjK31egc21D1ZY8m.s.xsQhDldSkAv6tbboDLU2MjZ3rdcpW', '2024-07-25 11:58:35'),
(21, '株式会社サンプルC', 1900, '通信・サービス', '', 'example@samplec.co.jp', '$2y$10$9pwIM9yqyS2gGvYtzaBuW.w.RT7hOTrrd2D9..yab3YmezrI8fy1y', '2024-07-25 12:04:32'),
(22, 'サンプルD株式会社', 1000, '運送業', '', 'example@sampled.co.jp', '$2y$10$iM4k9R499PozRngAlOLloOTSKI7qbmSBy6O0HPfB1T0JnbL1jIhB6', '2024-07-25 12:10:42'),
(23, 'サンプルE株式会社', 2000, '警備サービス', '', 'example@samplee.co.jp', '$2y$10$d5aASP/fzOGk88vgsx6aa.Bd4yqpdoTvhBBrTVW/YWGcIORglbH.G', '2024-07-25 12:20:47'),
(24, '株式会社サンプルF', 2000, '歯科医院', '', 'example@samplef.co.jp', '$2y$10$Z59OgXk5zU0mWAY7sY.4zOMuFyu.ZAVlJCl0e8vYnQLzeNCt97rvW', '2024-07-25 12:34:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `capital` int(20) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `uploader_name` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `videos`
--

INSERT INTO `videos` (`id`, `company_name`, `capital`, `video_path`, `uploader`, `uploader_name`, `comments`, `created_at`) VALUES
(52, '株式会社サンプルA', 0, 'sample (3).mp4', '19', '桃山さん（仮名）', 'わが社を紹介します！みんな和気あいあいのアットホームな会社です！', '2024-07-25 11:55:31'),
(53, '株式会社サンプルB', 0, 'Download.mp4', '20', '牛田モー（仮名）', '肉の握りずし専門店です。生肉大好き人間集まれ！\r\n営業日　平日○○:○○～○○:○○\r\nランチは●●●●円から！！\r\nみんなおいで！モ～～っ！', '2024-07-25 12:02:37'),
(54, '株式会社サンプルC', 0, 'sample (9).mp4', '21', '優しいエンジニアさん（仮名）', '平均年齢26歳！未経験からでもOK！クリエイティブで自由な職場です！あなたも一緒に働こう！', '2024-07-25 12:07:50'),
(55, 'サンプルD株式会社', 0, 'sample2 (3).mp4', '22', 'シカノコノコノコ。（仮名）', '我が社のイメージを徹底調査中です！　　　　　　　　　　　　　　　　　　　　これから毎日投稿するので、お気軽に感想を寄せてください！', '2024-07-25 12:17:17'),
(56, 'サンプルE株式会社', 0, 'sample (13).mp4', '23', 'キュートンさん（仮名）', '我が社は信頼ナンバーワン警備会社を目指して、日々精進しています！\r\n御覧の通り、チームワーク抜群です！！', '2024-07-25 12:22:51'),
(57, '株式会社サンプルF', 0, 'sample4 (3).mp4', '24', 'セラミックさん（仮名）', '出来立てほやほやです。皆さん是非来てください！', '2024-07-25 12:35:41'),
(59, '株式会社サンプルF', 0, 'sample4 (2).mp4', '24', 'ギシさん（仮名）', 'チョコレート好き', '2024-07-25 12:38:30');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- テーブルのインデックス `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- テーブルの AUTO_INCREMENT `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
