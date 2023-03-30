-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2023 lúc 06:12 AM
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
-- Cấu trúc bảng cho bảng `dkchaythu`
--

CREATE TABLE `dkchaythu` (
  `madk` int(11) NOT NULL,
  `hotendk` varchar(50) NOT NULL,
  `thoigiandk` date NOT NULL,
  `maXe` varchar(10) NOT NULL,
  `makh` int(11) NOT NULL,
  `sdt` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dkchaythu`
--

INSERT INTO `dkchaythu` (`madk`, `hotendk`, `thoigiandk`, `maXe`, `makh`, `sdt`, `userName`) VALUES
(5, 'Tran Trung Tinh', '2023-03-22', 'aclass', 3, 854172887, ''),
(15, 'Tran Thanh Moi', '2023-03-23', 'aclass', 4, 2147483647, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongxe`
--

CREATE TABLE `dongxe` (
  `madongXe` varchar(10) NOT NULL,
  `tendongXe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dongxe`
--

INSERT INTO `dongxe` (`madongXe`, `tendongXe`) VALUES
('', ''),
('467', '6655'),
('c400', 'c400 amg'),
('mamg', 'Mercedes-AMG'),
('meq', 'Mercedes-EQ'),
('mmb', 'Mercedes-Maybach');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `gioiTinh` enum('Nam','Nu') NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matKhau` varchar(10) NOT NULL,
  `phanquyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `userName`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `sdt`, `email`, `matKhau`, `phanquyen`) VALUES
(3, 'trantinh', 'Tran Trung Tinh', 'Nam', '2023-03-01', 'Cần Thơ', 854172887, 'tinhb2014709@student.ctu.edu.vn', 'tinh123', 0),
(4, 'tranmoi', 'Tran Thanh Moi', 'Nam', '2023-03-02', 'Cần Thơ', 2147483647, 'moib2014760@student.ctu.edu.vn', 'moi123', 0),
(13, 'B2014760', 'Tran Thanh Moi', 'Nam', '2000-01-07', 'Ninh kieu', 854172898, 'thanhmoivip123456@gmail.com', 'moi123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `maXe` varchar(10) NOT NULL,
  `hinhXe` varchar(255) NOT NULL,
  `tenXe` varchar(50) NOT NULL,
  `giaXe` varchar(100) NOT NULL,
  `thongtinXe` text NOT NULL,
  `madongXe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`maXe`, `hinhXe`, `tenXe`, `giaXe`, `thongtinXe`, `madongXe`) VALUES
('aclass', 'https://carsguide-res.cloudinary.com/image/upload/f_auto,fl_lossy,q_auto,t_cg_hero_low/v1/editorial/A-Class-index-my19-%281%29.png', 'A-Class', '2.742.817.000', '<b>D x R x C:</b> 4299 mm x 1780 mm x 1433 mm</br>\r\n<b>Chiều dài cơ sở:</b> 2699 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 1605/640 (kg)</br>\r\n<b>Động cơ:</b> I4</br>\r\n<b>Dung tích công tác:</b> 1991 (cc)</br>\r\n<b>Công suất cực đại:</b> 155 kW [211 hp] tại 5500 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 350 Nm tại 1.200 – 4.000 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 7 cấp ly hợp kép 7G-DCT</br>\r\n<b>Dẫn động:</b> Cầu trước</br>\r\n<b>Tăng tốc:</b> 6,4s (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 240 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 6.4 (l/100 km)</br>\r\n', 'mamg'),
('amggt4door', 'https://imgd.aeplcdn.com/0x0/n/cw/ec/45126/mercedesbenz-amg-gt-4-door-coupe-right-side0.jpeg', 'Mercedes-AMG GT 4-door Coupé', '7.547.617.000', '<b>D x R x C:</b> 5051 x 1953 x 1451 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 2951 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 2045/470 (kg)</br>\r\n<b>Động cơ:</b> I6</br>\r\n<b>Dung tích công tác:</b> 2999 (cc)</br>\r\n<b>Công suất cực đại:</b> 320 kW [435 hp] tại 6100 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 520 Nm tại 1800 - 5800 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 9 cấp AMG SPEEDSHIFT TCT 9G</br>\r\n<b>Dẫn động:</b> 4 bánh toàn thời gian 4MATIC+</br>\r\n<b>Tăng tốc:</b> 4,5 (0-100km/h)</br>\r\n<b>Vận tốc tối đa:</b> 285 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 11,4 (l/100km)</br>\r\n', 'mamg'),
('c300amg', 'https://mercedes-amgvietnam.vn/wp-content/uploads/2021/07/C-300-AMG-do-4.png', 'Mercedes C 300 AMG', '2.199.000.000', '<b>D x R x C:</b> 4686 x 1810 x 1442 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 2840 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 1580/555 (kg)</br>\r\n<b>Động cơ:</b> I4</br>\r\n<b>Dung tích công tác:</b> 1999 (cc)</br>\r\n<b>Công suất cực đại:</b> 190 kW [258 hp] tại 5800-6100 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 400 Nm tại 1800 – 4000 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 9 cấp 9G-TRONIC</br>\r\n<b>Dẫn động:</b> Cầu sau</br>\r\n<b>Tăng tốc:</b> 5,9s (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 250 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 7,71 (l/100km)</br>\r\n', 'mamg'),
('eqs', 'https://imgd-ct.aeplcdn.com/1280x720/n/cw/ec/131257/eqs-580-4matic-right-front-three-quarter-2.jpeg?isig=0&q=75', 'EQS', '5.959.000.000', '<b>D x R x C:</b> 5222 x 1926 x 1515 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 3210 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 2590/545 (kg)</br>\r\n<b>Động cơ:</b> 2 động cơ điện – phía trước & sau</br>\r\n<b>Công suất cực đại(Động cơ điện):</b> 385 kW</br>\r\n<b>Mô-men xoắn cực đại(Động cơ điện):</b> 858 Nm</br>\r\n<b>Hộp số:</b> Tự động 9 cấp AMG SPEEDSHIFT TCT 9G</br>\r\n<b>Dẫn động:</b> 4 bánh toàn thời gian 4MATIC</br>\r\n<b>Tăng tốc:</b> 4,3 (0-100km/h)</br>\r\n<b>Vận tốc tối đa:</b> 210 (km/h)</br>\r\n<b>Hệ thống pin:</b> Lithium-ion, 400V, 108,4 kWh</br>\r\n<b>Điện năng tiêu thụ trung bình (1):</b> 177 – 213 (Wh/km)</br>\r\n<b>Quãng đường di chuyển (1):</b> 581 – 692 (km)</br>\r\n<b>Công suất sạc AC tiêu chuẩn (2):</b> 11 kW (điện 3 pha) (3)</br>\r\n<b>Thời gian sạc từ 0%-100% AC (11 kW) (2):</b> 11,25 giờ</br>\r\n<b>Công suất sạc DC tối đa (4):</b> 200 kW</br>\r\n<b>Thời gian sạc từ 10%-80% DC (4):</b> 31 phút\r\n', 'meq'),
('gclass', 'https://rightrent24.ru/upload/iblock/b94/mercedes-g63-amg-black-l.png', 'G-Class', '10.950.000.000', '<b>D x R x C:</b> 4873 x 1984 x 1966 (mm)</br><b>Chiều dài cơ sở:</b> 2890 (mm)</br><b>Động cơ:</b> V8</br><b>Dung tích công tác:</b> 3982 cc</br><b>Công suất cực đại:</b> 430 kW [585 hp] tại 6000 vòng/phút</br><b>Mô-men xoắn cực đại:</b> 850 Nm tại 2500 – 3500 vòng/phút</br><b>Hộp số:</b> AMG tự động 9 cấp</br><b>Dẫn động:</b> 4 bánh toàn thời gian 4MATIC+</br><b>Tăng tốc:</b> 4,5 (0-100km/h)</br><b>Vận tốc tối đa:</b> 220 (km/h)</br><b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br><b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 13,1 (l/100km)</br>', 'mamg'),
('glasuv', 'https://images.dealer.com/autodata/us/640/color/2023/USD30MBS711A0/667.jpg', 'GLA SUV', '3.430.000.000', '<b>D x R x C:</b> 4424 x 1804 x 1494 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 2699 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 1395/545 (kg)</br>\r\n<b>Động cơ:</b> I4</br>\r\n<b>Dung tích công tác:</b> 1595 (cc)</br>\r\n<b>Công suất cực đại:</b> 115 kW [156 hp] tại 5300 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 250 Nm tại 1250 – 4000 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 7 cấp ly hợp kép 7G-DCT</br>\r\n<b>Dẫn động:</b> Cầu trước</br>\r\n<b>Tăng tốc:</b> 8,4s (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 215 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 8,76 (l/100km)</br>\r\n', 'mamg'),
('glb', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/366/403/products/ngoai-that-mercedes-glb-250-49785.png?v=1671416806517', 'GLB', '2.362.374.000', '<b>D x R x C:</b> 4655 x 1840 x 1680 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 2829 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 1681/604 (kg)</br>\r\n<b>Động cơ:</b> I4</br>\r\n<b>Dung tích công tác:</b> 1332 (cc)</br>\r\n<b>Công suất cực đại:</b> 120 kW [163 hp] tại 5500 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 250 Nm tại 1620 – 4000 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 7 cấp 7G-DCT</br>\r\n<b>Dẫn động:</b> Cầu trước</br>\r\n<b>Tăng tốc:</b> 9,1s (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 207 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 11,4 (l/100km)</br>\r\n', 'mamg'),
('glecoupe', 'https://heyoto.vn/wp-content/uploads/2023/02/mercedes-benz-gle-450-4matic-coupe.jpg', 'GLE Coupé', '5.679.000.000', '<b>D x R x C:</b> 4961 x 1999 x 1720 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 2935 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 2325/725 (kg)</br>\r\n<b>Động cơ:</b> I6</br>\r\n<b>Dung tích công tác:</b> 2999 (cc)</br>\r\n<b>Công suất cực đại:</b> 320 kW [435 hp] tại 6100 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 520 Nm tại 1800 – 4500 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 9 cấp AMG TCT</br>\r\n<b>Dẫn động:</b> 4 bánh toàn thời gian 4MATIC+</br>\r\n<b>Tăng tốc:</b> 5,3 giây (0 – 100 km / h)</br>\r\n<b>Vận tốc tối đa:</b> 250 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 11,4 (l/100km)</br>\r\n', 'mamg'),
('maybachgls', 'https://s3.us-east-2.amazonaws.com/dealer-inspire-vps-vehicle-images/stock-images/chrome/933647f5a63d4cfe5419f6962d4b5717.png', 'Mercedes-Maybach GLS', '11.999.000.000', '<b>D x R x C:</b> 5.204 x 2.029 x 1.839 mm</br>\r\n<b>Chiều dài cơ sở:</b> 3.134 mm</br>\r\n<b>Động cơ:</b> Tăng áp kép V8 4.0L</br>\r\n<b>Dung tích công tác:</b> 1332 (cc)</br>\r\n<b>Công suất cực đại:</b> 558 mã lực tại 6000-6500 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 730 Nm tại vòng tua 2500-5000 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 9 cấp 9G-TRONIC</br>\r\n<b>Dẫn động:</b> 4 bánh toàn thời gian 4MATIC</br>\r\n<b>Tăng tốc:</b> 4,9 giây (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 250 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> 11,7 (l/100km)</br>\r\n', 'mmb'),
('mbsclass', 'https://images.hgmsites.net/hug/2020-mercedes-maybach-s650-night-edition_100748922_h.jpg', 'Mercedes-Maybach S-Class', '8.000.000.000', '<b>D x R x C:</b> 5300 x 1937 x 1503 (mm)</br>\r\n<b>Chiều dài cơ sở:</b> 3216 (mm)</br>\r\n<b>Tự trọng/Tải trọng:</b> 2130/630 (kg)</br>\r\n<b>Động cơ:</b> I6</br>\r\n<b>Dung tích công tác:</b> 2999 (cc)</br>\r\n<b>Công suất cực đại:</b> 270 kW [367 hp] tại 5500 – 6000 vòng/phút</br>\r\n<b>Mô-men xoắn cực đại:</b> 500 Nm tại 1600 – 4500 vòng/phút</br>\r\n<b>Hộp số:</b> Tự động 9 cấp 9G-TRONIC</br>\r\n<b>Dẫn động:</b> Cầu sau</br>\r\n<b>Tăng tốc:</b> 5.3s (0 – 100 km/h)</br>\r\n<b>Vận tốc tối đa:</b> 250 (km/h)</br>\r\n<b>Loại nhiên liệu:</b> Xăng không chì có trị số octan 95 hoặc cao hơn</br>\r\n<b>Mức tiêu thụ nhiên liệu, kết hợp:</b> – (l/100km)</br>\r\n', 'mmb');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dkchaythu`
--
ALTER TABLE `dkchaythu`
  ADD PRIMARY KEY (`madk`),
  ADD KEY `maXe` (`maXe`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `dongxe`
--
ALTER TABLE `dongxe`
  ADD PRIMARY KEY (`madongXe`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`maXe`),
  ADD KEY `madongXe` (`madongXe`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dkchaythu`
--
ALTER TABLE `dkchaythu`
  MODIFY `madk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dkchaythu`
--
ALTER TABLE `dkchaythu`
  ADD CONSTRAINT `dkchaythu_ibfk_1` FOREIGN KEY (`maXe`) REFERENCES `xe` (`maXe`),
  ADD CONSTRAINT `dkchaythu_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`maKH`);

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`madongXe`) REFERENCES `dongxe` (`madongXe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
