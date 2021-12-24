-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2021 lúc 06:53 PM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(9) NOT NULL,
  `order_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_address` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_date`, `order_status`, `amount`, `order_name`, `order_address`, `order_phone`, `order_email`, `order_note`) VALUES
(48, 7, '2021-12-25 00:37:12', '', 9800000, 'hoainnam', '9B Nguyễn Bính', '0856485987', 'hoainam121120@gmail.com', ''),
(49, 7, '2021-12-25 00:51:03', '', 9800000, 'nam', '9B Nguyễn Bính', '0856485987', '0966485277', '');

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

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quaility`, `price_sale`) VALUES
(8, 48, 'FS5121', 2, 4000000),
(9, 48, 'FS5305', 1, 2200000),
(10, 48, 'ME3201', 2, 3600000),
(11, 49, 'FS5305', 2, 4400000),
(12, 49, 'ME3201', 3, 5400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `avtar` varchar(40) DEFAULT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `avtar`, `type_id`) VALUES
('ES4535', 'FOSSIL 36 mm Nam ES4535', 1200000, 'popular1.png', 3),
('FS5121', 'FOSSIL 36 mm Nam FS5121', 2000000, 'popular5.png', 1),
('FS5305', 'FOSSIL 44 mm Nam FS5305', 2200000, 'popular2.png', 3),
('FS5437', 'FOSSIL 44 mm Nam FS5437', 2000000, 'popular3.png', 3),
('ME3201', 'FOSSIL 42 mm Nam ME3201', 1800000, 'popular5.png', 3),
('ML065-01', 'MVW ML065-01 ', 1400000, 'popular6.png', 2),
('S580AT', 'EDIFICE EFS-S580AT-1A', 2200000, 'popular4.png', 1);

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
(1, 'CASIO'),
(2, 'MVW'),
(3, 'POSSIL');

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
(2, 'hoainamn', 'hoainamn@gmail.com', '123n', 1231, 'ádm'),
(7, 'hoainam', 'hoainam1211@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 123, '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
