-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2022 lúc 03:28 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `about_id` varchar(50) NOT NULL,
  `about_us` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`about_id`, `about_us`) VALUES
('TẦM NHÌN', 'Chúng tôi cũng có tầm nhìn rằng, trong tương lai, mỗi người có thể sở hữu cho riêng mình rất nhiều đồng hồ khác nhau, và chúng tôi muốn cửa hàng chúng tôi có tên trong danh sách những địa chỉ mua đồng hồ tin cậy của bạn!'),
('TRIẾT LÝ KINH DOANH', 'Chúng tôi luôn đào tạo nhân viên bán hàng rằng khách hàng như là anh, chị em, bạn bè trong cuộc sống và không ai lại đi bán một chiếc đồng hồ lỗi cho người thân và bạn bè của mình cả! Và hậu mãi bán hàng cũng phải chu đáo như chăm sóc người thân của mình vậy.\r\n Và bên cạnh đó chúng tôi cũng rất tự tin và tôn trọng chính bản thân kinh doanh của mình, chúng tôi hoàn toàn không hợp tác với những khách hàng không có hiểu biết hay sự thiếu tôn trọng đối với công việc kinh doanh của chúng tôi. Mối quan hệ với khách hàng dựa trên sự tôn trọng lẫn nhau chính là nền tảng để chúng tôi phát triển kinh doanh này.'),
('ĐỘI NGŨ NHÂN SỰ', 'Vì mỗi khách hàng sẽ là một mối duyên với chúng tôi nên Quý khách cần và nên được biết về những con người mà Quý khách sẽ nói chuyện hay gặp gỡ trên chặng đường trải nghiệm trở thành khách hàng của chúng tôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_address`, `admin_phone`) VALUES
(1, 'hoainam', 'hoainam1211@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 123),
(2, 'nam', 'kh@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 0),
(3, 'nam', 'hoainam0607@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 0),
(4, 'nam', 'ngan@gmail.com', '202cb962ac59075b964b07152d234b70', '0856485987', 123);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oadmin`
--

CREATE TABLE `oadmin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa giao',
  `amount` int(9) NOT NULL,
  `order_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_address` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `quaility` float NOT NULL,
  `price_sale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `avtar` varchar(40) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `quantily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `avtar`, `type_id`, `status`, `quantily`) VALUES
('1', 'Đồng hồ Nam MVW ML061-01', 1100000, 'dong-ho-nam-mvw-ml061-01-1.-600x600.jpg', 2, 'Còn Hàng', 7),
('10', 'Đồng hồ Nam MVW MS075-01 ', 1600000, 'dong-ho-nam-mvw-ms075-01-1.-600x600.jpg', 2, 'Còn Hàng', 8),
('110', 'Đồng hồ Nam Citizen NP1010-51E', 8100000, 'citizen-np1010-51e-nam-1-1-600x600.jpg', 3, 'Còn Hàng', 13),
('1111', 'Đồng hồ Nữ Citizen EM0643-84X ', 7500000, 'citizen-em0643-84x-10-600x600.jpg', 3, 'Còn Hàng', 15),
('1112', 'Đồng hồ Nữ Citizen EM0726-89Y ', 7500000, 'citizen-em0726-89y-2-600x600.jpg', 3, 'Còn Hàng', 15),
('112', 'Đồng hồ Nam Citizen NK0008-85L', 8500000, 'citizen-nk0008-85l-nam-1-1-600x600.jpg', 3, 'Còn Hàng', 13),
('115', 'Đồng hồ Nam Citizen NP1010-01A', 8000000, 'citizen-np1010-01a-trang-1-1-600x600.jpg', 3, 'Còn Hàng', 12),
('121', 'Đồng hồ đôi Elio EL072-01/EL07', 1300000, 'elio-el072-01-.jpg', 1, 'Còn Hàng', 8),
('1211', 'Đồng hồ đôi Elio EL050-01/EL05', 1100000, 'elio-el050-01-.jpg', 1, 'Còn Hàng', 8),
('1212', 'Đồng hồ Nữ Citizen Citizen EW5', 7300000, 'citizen-ew5500-57a-600x600.jpg', 3, 'Còn Hàng', 12),
('14', 'Đồng hồ đôi Elio EL073-01/EL07', 1500000, 'elio-el073-01.jpg', 1, 'Còn Hàng', 8),
('2', 'Đồng hồ Nam MVW ML063-01', 1100000, 'dong-ho-nam-mvw-ml063-01-1.-600x600.jpg', 2, 'Còn Hàng', 7),
('212', 'Đồng hồ đôi Elio EL076-01/EL07', 1300000, 'elio-el076-01.jpg', 1, 'Còn Hàng', 8),
('2121', 'Đồng hồ Nam Citizen CA0710-82L', 9000000, 'citizen-ca0710-82l-nam-1-600x600.jpg', 3, 'Còn Hàng', 15),
('2122', 'Đồng hồ Nữ Citizen EM0720-85N ', 7700000, 'citizen-em0640-82d-600x600.jpg', 3, 'Còn Hàng', 13),
('3', 'Đồng hồ Nam MVW ML064-01', 1200000, 'dong-ho-nam-mvw-ml065-01-1.-600x600.jpg', 2, 'Còn Hàng', 7),
('32', 'Đồng hồ đôi Elio EL057-01/EL05', 1300000, 'elio-el057-01.jpg', 1, 'Còn Hàng', 8),
('321', 'Đồng hồ đôi Elio EL069-01/EL06', 1500000, 'elio-el069-01.jpg', 1, 'Còn Hàng', 8),
('4', 'Đồng hồ Nam MVW ML065-01 ', 1100000, 'dong-ho-nam-mvw-ml065-01-1.-600x600.jpg', 2, 'Còn Hàng', 8),
('412', 'Đồng hồ đôi Elio EL078-01/EL07', 1800000, 'elio-el078-01.jpg', 1, 'Còn Hàng', 8),
('415', 'Đồng hồ đôi Elio EL075-01/EL07', 1500000, 'elio-el075-01.jpg', 1, 'Còn Hàng', 8),
('5', 'Đồng hồ Nam MVW MS071-01 ', 1300000, 'dong-ho-nam-mvw-ms071-01-1.-600x600.jpg', 2, 'Còn Hàng', 7),
('6', 'Đồng hồ Nam MVW MS072-01 ', 1300000, 'dong-ho-nam-mvw-ms072-01-1.-600x600.jpg', 2, 'Còn Hàng', 8),
('8', 'Đồng hồ Nam MVW MS071-02', 1300000, 'dong-ho-nam-mvw-ms072-02-1.-600x600.jpg', 2, 'Còn Hàng', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'ELIO'),
(2, 'MVW'),
(3, 'CITIZEN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_address`) VALUES
(7, 'hoainam', 'hoainam1211@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 456, '123'),
(12112, 'hoainam', 'hoainam@gmail.com', '202cb962ac59075b964b07152d234b70', 123, '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `oadmin`
--
ALTER TABLE `oadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `oadmin`
--
ALTER TABLE `oadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12113;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oadmin`
--
ALTER TABLE `oadmin`
  ADD CONSTRAINT `oadmin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `oadmin_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
