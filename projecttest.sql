-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 06:10 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projecttest`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `img` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `price`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại Xiao#mi 13 P.r.o - Dung lượng Room 256gb Tiếng Việt Pin 4820 mAh Đẹp Keng F8W2', 'vn-11134207-7r98o-lokjt12yuygjab.jpg', 21421, 'MÔ TẢ SẢN PHẨM\n+ Ram: 8gb\n+ Dung lượng lưu trữ: 256gb\n+ Pin: 4820mAh\n+ Chip snap 8 Gen 2\n+ Hoạt động hoàn hảo không lỗi lầm gì \n+ Màn hình 120HZ , AMOLED 6.73\"Quad HD+ (2K+) \n_____________________________________________\nSHOP CHUYÊN CUNG CẤP CÁC SẢN PHẨM CHÍNH HÃNG. CAM KẾT\n+ Phiếu bảo hành 12 - 24 tháng đi kèm sản phẩm\n+ 1 đổi 1 với bất kỳ lỗi gì. Dùng thử miễn phí 7 - 15 ngày\n+ Giao Hàng Nhanh Toàn Quốc\nIB SHOP ĐỂ ĐƯỢC HỖ TRỢ', '2023-12-08 10:19:14.000000', '2023-12-08 12:03:36.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'haikeotv123', '$2y$10$3S0TvIyEMiUzEvLk0ZmwkueqdDhWk3xPzf1MpUAsbKV72qCjOHlUK', '0000-00-00 00:00:00.000000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
