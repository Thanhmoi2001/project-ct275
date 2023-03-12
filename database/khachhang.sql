-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 12, 2023 lúc 09:54 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct275_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkh` int(11) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `gioitinh` enum('Nam','Nu') NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `phanquyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkh`, `tendangnhap`, `hoten`, `gioitinh`, `ngaysinh`, `email`, `diachi`, `sodienthoai`, `matkhau`, `phanquyen`) VALUES
(1, 'B2014760', 'Tran Thanh Moi', 'Nam', '2002-09-11', 'moib2014760@student.ctu.edu.vn', 'Ninh kieu', 854172887, 'moi123456', 0),
(2, 'B2014709', 'Tran Trung Tinh', 'Nam', '2002-07-15', 'tinhb2014709@student.ctu.edu.vn', 'Ninh kieu', 918411912, 'tinh123456', 0),
(14, 'Bangngaodet', 'Duong hai bang', 'Nam', '2023-03-30', 'bang123@gmail.com', 'ninh kieu', 854172898, 'bang123456', 1),
(15, 'vinhngu', 'Tran Vinh', 'Nam', '2023-03-17', 'vinh123@gmail.com', 'Ninh Kieu', 912456789, 'vinh123456', 1),
(16, 'moicute123', 'Duong hai bang', 'Nam', '2023-03-15', 'moib2014760@student.edu.ctu.vn', 'ninh kieu', 327573916, 'moi123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
