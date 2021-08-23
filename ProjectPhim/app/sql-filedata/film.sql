-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2021 lúc 01:14 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `name_film` varchar(100) NOT NULL,
  `date_film` date NOT NULL,
  `des_film` varchar(500) NOT NULL,
  `linkimg_film` text NOT NULL,
  `id_cate` int(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id_film`, `name_film`, `date_film`, `des_film`, `linkimg_film`, `id_cate`, `created_at`, `updated_at`) VALUES
(1, 'ngày mới', '2021-08-11', 'phim mới hot nhất 2020', 'uploadfile\\203338211_1938449036324700_5162083315500689123_n.jpg', 25, '2021-08-23', '2021-08-23'),
(3, 'ngày mới', '2021-07-27', 'phim mới hot nhất 2020', 'uploadfile\\165272649_927787684700686_2947848632970947992_n.jpg', 26, '2021-08-23', '2021-08-23'),
(4, 'andecode3', '2021-08-14', 'phim mới hot nhất 20203', 'uploadfile\\162696200_3498349963756447_740364999117444370_o.jpg', 27, '2021-08-23', '2021-08-23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
