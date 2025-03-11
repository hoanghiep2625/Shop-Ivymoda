-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:8889
-- Thời gian đã tạo: Th3 11, 2025 lúc 02:04 AM
-- Phiên bản máy phục vụ: 8.0.35
-- Phiên bản PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopivymoda`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `size` varchar(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nam,Nữ,Trẻ em ...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Nữ'),
(2, 'Nam'),
(3, 'Trẻ em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_history`
--

CREATE TABLE `login_history` (
  `id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `device` varchar(100) NOT NULL,
  `status` enum('Success','Failure') NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `ip_address`, `user_agent`, `device`, `status`, `login_time`) VALUES
(6, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-28 12:44:16'),
(7, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-28 12:47:04'),
(8, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-28 13:35:31'),
(9, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-30 12:06:27'),
(10, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-30 13:41:02'),
(11, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-30 13:49:04'),
(12, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-11-30 14:00:28'),
(13, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-02 17:33:03'),
(14, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-05 07:46:24'),
(15, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-05 10:34:00'),
(16, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-09 15:46:59'),
(17, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-09 15:48:42'),
(18, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15', 'Mac OS', 'Success', '2024-12-10 07:34:46'),
(19, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15', 'Mac OS', 'Success', '2024-12-10 08:00:21'),
(20, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-10 08:01:40'),
(21, '1', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'Mac OS', 'Success', '2024-12-12 12:35:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','processing','completed','cancelled') DEFAULT 'pending',
  `shipping_address` text NOT NULL,
  `total_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_date`, `status`, `shipping_address`, `total_product`) VALUES
(4, 1, '5061000', '2024-11-30 10:46:41', 'completed', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 7),
(5, 1, '1386000', '2024-11-30 11:42:17', 'cancelled', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 2),
(6, 1, '4298000', '2024-12-04 09:39:24', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 6),
(10, 1, '1386000', '2024-12-06 06:07:48', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 2),
(11, 1, '693000', '2024-12-06 06:08:57', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 1),
(12, 1, '693000', '2024-12-06 06:11:09', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 1),
(13, 1, '833000', '2024-12-06 06:12:49', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 1),
(14, 1, '2499000', '2024-12-08 06:27:07', 'completed', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 3),
(15, 1, '693000', '2024-12-09 06:27:37', 'completed', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 1),
(16, 1, '3979000', '2024-12-10 08:03:10', 'completed', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 5),
(17, 1, '763000', '2024-12-12 12:36:00', 'pending', 'Lạc vượng, Thị trấn Hàng Trạm, Huyện Yên Thủy, Tỉnh Hoà Bình', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_id`, `size`, `quantity`, `price`) VALUES
(1, 4, 69, 'XXL', 2, 763000.00),
(2, 4, 69, 'S', 1, 763000.00),
(3, 4, 71, 'XXL', 4, 693000.00),
(4, 5, 73, 'M', 1, 693000.00),
(5, 5, 73, 'XL', 1, 693000.00),
(6, 6, 71, 'L', 1, 693000.00),
(7, 6, 72, 'M', 1, 833000.00),
(8, 6, 71, 'M', 4, 693000.00),
(9, 10, 71, 'M', 2, 693000.00),
(10, 11, 71, 'S', 1, 693000.00),
(11, 12, 71, 'M', 1, 693000.00),
(12, 13, 72, 'M', 1, 833000.00),
(13, 14, 72, 'M', 3, 833000.00),
(14, 15, 71, 'M', 1, 693000.00),
(15, 16, 63, 'M', 2, 950000.00),
(16, 16, 71, 'M', 3, 693000.00),
(17, 17, 70, 'L', 1, 763000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Tên sp',
  `price` varchar(10) NOT NULL COMMENT 'Giá',
  `sku_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Mã sản phẩm',
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Giới thiệu',
  `full_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Chi tiết sản phẩm',
  `sub_subcategory_id` int DEFAULT NULL COMMENT 'Liên kết phân loại con cấp 2',
  `color` varchar(30) DEFAULT NULL,
  `hex_color` varchar(7) DEFAULT NULL,
  `name_color` varchar(99) NOT NULL,
  `time_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sku_code`, `short_description`, `full_description`, `sub_subcategory_id`, `color`, `hex_color`, `name_color`, `time_add`) VALUES
(59, 'Áo sơ mi lụa cổ đổ Lucille', '950000', '22H2592', 'Công sở hiện đại không còn chỉ gói gọn trong những bộ trang phục nghiêm túc có đôi phần cứng nhắc, bởi giờ đây, phái đẹp không chỉ đẹp trong những dịp đặc biệt mà còn chỉn chu và tinh tế mỗi ngày khi đến văn phòng!', '<div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ đổ</p></div>', 1, 'black', '#000000', 'Họa tiết Đen', '2024-11-26 22:38:21'),
(60, 'Áo sơ mi Tuysi Drop Waist', '1290000', '78H2766', 'Chiếc áo sơ mi kết hợp hoàn hảo giữa phong cách thanh lịch và tinh tế, phù hợp cho nàng tại môi trường công sở hay những buổi gặp gỡ trang trọng.\r\n\r\nChất liệu Tuysi cao cấp mang đến cảm giác mềm mại, co giãn nhẹ, giúp áo vừa vặn, thoải mái khi mặc. Thiết kế ôm cơ thể bên cạnh chi tiết chiết eo đã tôn lên đường cong, tạo cảm giác gọn gàng, thanh mảnh.\r\n\r\nCổ đức chỉn chu, sang trọng. Tay áo dài lịch sự. Chiếc áo sơ mi này dễ dàng kết hợp với quần tây, chân váy bút chì hoặc các kiểu váy công sở khác để người mặc luôn tỏa sáng trong mọi dịp.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>You</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ đức</p><p><span style=\"font-weight: bold;\">Tay áo: </span>Tay dài</p><p><span style=\"font-weight: bold;\">Kiểu dáng</span><span><span style=\"font-weight: bold;\">: </span></span>Ôm</p><p><span style=\"font-weight: bold;\">Độ dài</span><span><span style=\"font-weight: bold;\">: </span></span>Dài thường</p><p><span style=\"font-weight: bold;\">Họa tiết</span><span><span style=\"font-weight: bold;\">: </span></span>Trơn</p><p><span style=\"font-weight: bold;\">Chất liệu</span><span><span style=\"font-weight: bold;\">: </span></span>Tuysi</p></div>', 1, 'pink', '#ffcccc', 'Hồng san hô', '2024-11-26 22:38:28'),
(63, 'Áo sơ mi lụa cổ đổ Lucille', '950000', '22H2592', 'Công sở hiện đại không còn chỉ gói gọn trong những bộ trang phục nghiêm túc có đôi phần cứng nhắc, bởi giờ đây, phái đẹp không chỉ đẹp trong những dịp đặc biệt mà còn chỉn chu và tinh tế mỗi ngày khi đến văn phòng!\r\n\r\nChiếc áo sơ mi được làm từ chất liệu lụa cao cấp, mềm mại, bóng nhẹ, tạo cảm giác êm dịu cho làn da. Họa tiết chấm bi cổ điển mang lại vẻ trẻ trung, thời thượng, giúp bạn nổi bật trong mọi tình huống.\r\n\r\nThiết kế cổ đổ quyến rũ, kết hợp những gợn sóng ôm nhẹ, giúp áo tăng phần duyên dáng cho người mặc. Áo có phom dáng suông nhẹ, dễ phối với nhiều trang phục như quần tây, chân váy hoặc jeans, mang lại vẻ ngoài tinh tế và cuốn hút.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '<div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ đổ</p></div>', 1, 'white', '#fff5f5', 'Họa tiết Trắng ngà', '2024-11-26 22:38:38'),
(64, 'Áo sơ mi SAPPHIRE Cotton', '1150000', '67I2394', 'Thiết kế nằm trong BST SAPPHIRE CHIC, lấy cảm hứng từ sắc xanh quý phái của đá Sapphire với những thiết kế công sở hiện đại, ghi dấu ấn với tính thẩm mỹ cao và sự tinh tế qua các chi tiết tạo điểm nhấn mà không mất đi nét sang trọng vốn có.\r\n\r\nÁo sơ mi kết hợp hoàn hảo giữa phong cách cổ điển và hiện đại. Được làm từ chất liệu Cotton cao cấp, áo không chỉ mềm mại và thoáng mát, mà còn đảm bảo sự thoải mái, dễ chịu trong suốt cả ngày. Đặc biệt, chất liệu có độ bền cao và thấm hút tốt, rất thích hợp cho những ngày làm việc bận rộn hoặc những buổi hẹn gặp quan trọng.\r\n\r\nThiết kế cổ đức chỉn chu, phù hợp cho các dịp công sở, hội họp. Tay áo dài với những đường cắt may tỉ mỉ, cho thấy sự gọn gàng của quý cô thanh lịch. Áo dễ dàng phối hợp với quần tây, quần jeans hoặc chân váy, giúp bạn tạo nên những bộ trang phục linh hoạt và đa dạng.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>You</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm</span><span><span style=\"font-weight: bold;\">: </span></span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo</span><span><span style=\"font-weight: bold;\">: </span></span>Cổ đức</p><p><span style=\"font-weight: bold;\">Tay áo</span><span><span style=\"font-weight: bold;\">: </span></span>Tay dài</p><p><span style=\"font-weight: bold;\">Kiểu dáng</span><span><span style=\"font-weight: bold;\">: </span></span>Xuông</p><p><span style=\"font-weight: bold;\">Độ dài</span><span><span style=\"font-weight: bold;\">: </span></span>Dài thường</p><p><span style=\"font-weight: bold;\">Họa tiết</span><span><span style=\"font-weight: bold;\">: </span></span>Trơn</p><p><span style=\"font-weight: bold;\">Chất liệu</span><span><span style=\"font-weight: bold;\">: </span></span>Thô</p></div>', 1, 'blue', '#a3d0ff', 'Xanh ghi đá', '2024-11-26 22:38:42'),
(65, 'Áo sơ mi lụa cổ kiểu', '890000', '41K3594', 'Thiết kế nằm trong BST Dreamy Bloom, người bạn đồng hành hoàn hảo của phái đẹp, giúp nàng luôn tự tin, sang trọng và phong cách trong mọi khoảnh khắc.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm</span><span><span style=\"font-weight: bold;\">: </span></span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo</span><span><span style=\"font-weight: bold;\">: </span></span>Cổ khác</p><p><span style=\"font-weight: bold;\">Tay áo</span><span><span style=\"font-weight: bold;\">: </span></span>Tay ngắn</p><p><span style=\"font-weight: bold;\">Kiểu dáng</span><span><span style=\"font-weight: bold;\">: </span></span>Xuông</p><p><span style=\"font-weight: bold;\">Độ dài</span><span><span style=\"font-weight: bold;\">: </span></span>Dài thường</p><p><span style=\"font-weight: bold;\">Họa tiết</span><span><span style=\"font-weight: bold;\">: </span></span>Họa tiết khác,Trơn</p><p><span style=\"font-weight: bold;\">Chất liệu</span><span><span style=\"font-weight: bold;\">: </span></span>Lụa</p></div>', 1, 'beige', '#ffe7cc', 'Be phong cách', '2024-11-26 22:38:47'),
(66, 'Áo sơ mi lụa cổ kiểu', '890000', '41K3594', 'Thiết kế nằm trong BST Dreamy Bloom, người bạn đồng hành hoàn hảo của phái đẹp, giúp nàng luôn tự tin, sang trọng và phong cách trong mọi khoảnh khắc.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Cổ khác</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Tay ngắn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Xuông</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Dài thường</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Họa tiết khác,Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Lụa</span></p></div>', 1, 'pink', '#ff3396', 'Họa tiết Hồng kẹo', '2024-11-26 22:44:25'),
(68, 'Áo sơ mi Croptop Office', '833000', '83C9000', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi Croptop Office là sự kết hợp hoàn hảo giữa phong cách trẻ trung, hiện đại bên cạnh nét thanh lịch chuyên nghiệp.\r\n\r\n- Chất liệu lụa gân cao cấp, mềm mại, thoáng mát, giữ phom dáng\r\n\r\n- Thiết kế croptop hiện đại, trẻ trung, dễ phối với quần hoặc chân váy cạp cao\r\n\r\n- Cổ tròn xếp ly tinh tế, tạo điểm nhấn thanh lịch và nữ tính\r\n\r\n- Tay dài bo gấu gọn gàng, mang lại vẻ chỉn chu và thoải mái\r\n\r\n- Phù hợp cho nhiều dịp như đi làm, gặp gỡ bạn bè, hoặc sự kiện\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</p><p><span style=\"font-weight: bold;\">Nhóm sản phẩm</span><span><span style=\"font-weight: bold;\">: </span></span>Áo</p><p><span style=\"font-weight: bold;\">Cổ áo</span><span><span style=\"font-weight: bold;\">: </span></span>Cổ tròn</p><p><span style=\"font-weight: bold;\">Tay áo</span><span><span style=\"font-weight: bold;\">: </span></span>Tay dài</p><p><span style=\"font-weight: bold;\">Kiểu dáng</span><span><span style=\"font-weight: bold;\">: </span></span>Bo gấu</p><p><span style=\"font-weight: bold;\">Độ dài</span><span><span style=\"font-weight: bold;\">: </span></span>Croptop</p><p><span style=\"font-weight: bold;\">Họa tiết</span><span><span style=\"font-weight: bold;\">: </span></span>Trơn</p><p><span style=\"font-weight: bold;\">Chất liệu</span><span><span style=\"font-weight: bold;\">: </span></span>Lụa</p></div>', 1, 'pink', '#fbd0e5', 'Hồng nhạt', '2024-11-26 22:52:48'),
(69, 'Áo lụa Tencel thân bèo cách điệu', '763000', '86Y8707', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi Croptop Office là sự kết hợp hoàn hảo giữa phong cách trẻ trung, hiện đại bên cạnh nét thanh lịch chuyên nghiệp.\r\n\r\n- Chất liệu lụa gân cao cấp, mềm mại, thoáng mát, giữ phom dáng\r\n\r\n- Thiết kế croptop hiện đại, trẻ trung, dễ phối với quần hoặc chân váy cạp cao\r\n\r\n- Cổ tròn xếp ly tinh tế, tạo điểm nhấn thanh lịch và nữ tính\r\n\r\n- Tay dài bo gấu gọn gàng, mang lại vẻ chỉn chu và thoải mái\r\n\r\n- Phù hợp cho nhiều dịp như đi làm, gặp gỡ bạn bè, hoặc sự kiện\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>Ladies</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Cổ tròn</span></p><p class=\"\"><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Tay dài</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Bo gấu</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Croptop</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Lụa</span></p></div>', 1, 'pink', '#f9a4cd', 'Hồng san hô', '2024-11-26 22:55:54'),
(70, 'Áo lụa Tencel thân bèo cách điệu', '763000', '86Y8707', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi lụa Tencel với phần thân được nhấn nhá bằng chi tiết bèo cách điệu, tạo nên vẻ độc đáo và tinh tế, giúp tôn lên phong cách riêng của người mặc.\r\n\r\n- Chất liệu lụa Tencel cao cấp, mềm mại, thoáng mát và bền đẹp\r\n\r\n- Thiết kế thân bèo cách điệu tạo điểm nhấn độc đáo, nữ tính\r\n\r\n- Tay dài thanh lịch, phù hợp với nhiều hoàn cảnh và thời tiết\r\n\r\n- Phom dáng hiện đại, dễ dàng phối với chân váy, quần âu hoặc jeans\r\n\r\n- Hoàn hảo cho các dịp như đi làm, dự tiệc hoặc gặp gỡ bạn bè\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span>You</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Cổ khác</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Tay dài</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Xuông</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Dài thường</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu</span></span><span><span style=\"font-weight: bold;\">: </span></span><span style=\"font-size: 14px\">Lụa</span></p></div>', 1, 'beige', '#fdf3dd', 'Trắng ngà', '2024-11-26 22:59:03'),
(71, 'Áo sơ mi Tencel Divas', '693000', '21W6370', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi Divas nổi bật với phần cổ tròn được tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính, tinh tế mà không kém phần thanh lịch.\r\n\r\nThiết kế tay dài xếp ly thời thượng không chỉ tăng thêm sự duyên dáng mà còn thể hiện gu thời trang hiện đại, phù hợp cho cả công sở và các dịp trang trọng.\r\n\r\n- Chất liệu Tencel cao cấp, mềm mại, thoáng mát và bền đẹp\r\n\r\n- Cổ tròn tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính và sang trọng\r\n\r\n- Tay dài xếp ly thời thượng, tạo điểm nhấn phong cách\r\n\r\n- Phom dáng thanh lịch, dễ dàng phối với chân váy, quần âu hoặc quần jeans\r\n\r\n- Phù hợp cho nhiều dịp như công sở, sự kiện, hoặc dạo phố\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span></span><span style=\"font-size: 14px\">You</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ khác</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo: </span>Tay dài</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng: </span>Xuông</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài: </span>Dài thường</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết: </span>Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu: </span>Lụa</span></p></div>', 1, 'beige', '#ffef9e', 'Be', '2024-11-26 23:14:28'),
(72, 'Áo sơ mi Tuysi Peplum', '833000', '25H9875', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi Divas nổi bật với phần cổ tròn được tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính, tinh tế mà không kém phần thanh lịch.\r\n\r\nThiết kế tay dài xếp ly thời thượng không chỉ tăng thêm sự duyên dáng mà còn thể hiện gu thời trang hiện đại, phù hợp cho cả công sở và các dịp trang trọng.\r\n\r\n- Chất liệu Tencel cao cấp, mềm mại, thoáng mát và bền đẹp\r\n\r\n- Cổ tròn tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính và sang trọng\r\n\r\n- Tay dài xếp ly thời thượng, tạo điểm nhấn phong cách\r\n\r\n- Phom dáng thanh lịch, dễ dàng phối với chân váy, quần âu hoặc quần jeans\r\n\r\n- Phù hợp cho nhiều dịp như công sở, sự kiện, hoặc dạo phố\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span></span><span style=\"font-size: 14px\">You</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ khác</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo: </span>Tay dài</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng: </span>Xuông</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài: </span>Dài thường</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết: </span>Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu: </span>Lụa</span></p></div>', 1, 'beige', '#fdf4c9', 'Be sáng', '2024-11-26 23:17:13'),
(73, 'Áo sơ mi Tencel Divas', '693000', '21W6370', 'Thiết kế được lựa chọn trong BST Office Divas, mang đậm dấu ấn phong cách hiện đại dành riêng cho phái đẹp. Ngôn ngữ thiết kế tối giản được điểm xuyết khéo léo bằng các chi tiết cách điệu mềm mại không chỉ nâng tầm vẻ đẹp thanh lịch mà còn thể hiện cá tính độc lập và gu thời trang đẳng cấp.\r\n\r\nÁo sơ mi Divas nổi bật với phần cổ tròn được tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính, tinh tế mà không kém phần thanh lịch.\r\n\r\nThiết kế tay dài xếp ly thời thượng không chỉ tăng thêm sự duyên dáng mà còn thể hiện gu thời trang hiện đại, phù hợp cho cả công sở và các dịp trang trọng.\r\n\r\n- Chất liệu Tencel cao cấp, mềm mại, thoáng mát và bền đẹp\r\n\r\n- Cổ tròn tạo tầng bèo nhẹ nhàng, mang lại vẻ nữ tính và sang trọng\r\n\r\n- Tay dài xếp ly thời thượng, tạo điểm nhấn phong cách\r\n\r\n- Phom dáng thanh lịch, dễ dàng phối với chân váy, quần âu hoặc quần jeans\r\n\r\n- Phù hợp cho nhiều dịp như công sở, sự kiện, hoặc dạo phố\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '\r\n                                        <div contenteditable=\"true\" translate=\"no\" class=\"tiptap ProseMirror format lg:format-sm dark:format-invert focus:outline-none format-blue max-w-none\" tabindex=\"0\"><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Dòng sản phẩm: </span></span><span style=\"font-size: 14px\">You</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Nhóm sản phẩm: </span>Áo</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Cổ áo: </span>Cổ khác</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Tay áo: </span>Tay dài</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Kiểu dáng: </span>Xuông</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Độ dài: </span>Dài thường</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Họa tiết: </span>Trơn</span></p><p><span style=\"font-size: 14px\"><span style=\"font-weight: bold;\">Chất liệu: </span>Lụa</span></p></div>', 1, 'black', '#000000', 'Đen', '2024-11-26 23:20:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int NOT NULL COMMENT 'id sản phẩm',
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'link ảnh',
  `is_main` tinyint(1) DEFAULT '0' COMMENT 'Có phải ảnh chính hay không\r\n(True or False)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `is_main`) VALUES
(71, 59, './public/imageSp/0ca7457fdf40af5cc0d703daa4e98d46.webp', 0),
(72, 59, './public/imageSp/00d292728edb33ea7fcda4cf870b5b0b.webp', 0),
(73, 59, './public/imageSp/aabb6e56029b1ef5986e5f51170c5499.webp', 0),
(74, 59, './public/imageSp/ac0dcce982d1af0d8096c834ecb6cb5c.webp', 0),
(75, 59, './public/imageSp/86d1e5878800a539b66f24628504a130.webp', 0),
(76, 59, './public/imageSp/31facc281f4a1a9923aff829093e3d1a.webp', 0),
(77, 59, './public/imageSp/86143d6994f5d2ebe92c246ac9e737ae.webp', 0),
(78, 59, './public/imageSp/73f8f843e7d4ed785e8a27724f8b0ebf.webp', 0),
(79, 59, './public/imageSp/01e96e7dc85d09b063da44b703bc4d87.webp', 0),
(80, 59, './public/imageSp/483e59808a81a9466c62ba36e8d9fc3e.webp', 0),
(81, 59, './public/imageSp/bc3a584bc9d1b9a7524aa5c08421f2bf.webp', 0),
(82, 59, './public/imageSp/e97033a904bb829c6d5df1b4d4b1e9af.webp', 2),
(83, 59, './public/imageSp/a9d992905aa523d5ffcd9646752e38c1.webp', 1),
(84, 60, './public/imageSp/c147faf146069d95af13e7922040d891.webp', 0),
(85, 60, './public/imageSp/074a7fa75706c2abb56fda4a856958e4.webp', 0),
(86, 60, './public/imageSp/de83c148c73de42dafbec273a69a25f3.webp', 0),
(87, 60, './public/imageSp/9cf0ac4b993e363897130405a00999ec.webp', 0),
(88, 60, './public/imageSp/5a9b7267f01f8d466b5865f0838c7375.webp', 0),
(89, 60, './public/imageSp/a5458b641e567023cdd3c32c71965390.webp', 0),
(90, 60, './public/imageSp/d911aead4bae730a67099974d272c4aa.webp', 0),
(91, 60, './public/imageSp/22a7170979d5cc27bb21918903d3cb09.webp', 0),
(92, 60, './public/imageSp/cc76b01ee9ea0d738054e7d774d93538.webp', 0),
(93, 60, './public/imageSp/d1ba28331abb44d6c6d2da95961caf70.webp', 0),
(94, 60, './public/imageSp/1ca91c2f90f48a839b6f077aa7ee26b3.webp', 2),
(95, 60, './public/imageSp/ff090784e459d86acf70ef4151a85e1f.webp', 1),
(96, 63, './public/imageSp/328d98e9224a9f15075ecb13bc563514.webp', 1),
(97, 63, './public/imageSp/bca8b48c107e2152f7d5eba42253c5cf.webp', 2),
(98, 63, './public/imageSp/b52caa62cd0b0df0684eb590c9531325.webp', 0),
(99, 63, './public/imageSp/8c34833b69619165ee72bcb26ff57c08.webp', 0),
(100, 63, './public/imageSp/8f54643e282969ac6280122088c80355.webp', 0),
(101, 63, './public/imageSp/1c6a9729c7e718fc7cdd9a2ee3278c16.webp', 0),
(102, 63, './public/imageSp/15c28c9ecdea9030e44919b428fe9ccf.webp', 0),
(103, 63, './public/imageSp/6dae999cbf2d67eb5152901ef39000cf.webp', 0),
(104, 63, './public/imageSp/0bc5ca29b66478f96818637400ccf30a.webp', 0),
(105, 63, './public/imageSp/c846e207a6a96fdf0e1cd94e939c50c7.webp', 0),
(106, 63, './public/imageSp/0a874357655afb814fb9a4c7eb6cbe12.webp', 0),
(107, 63, './public/imageSp/d2f60bea55fab9817112bbdf92a22b9f.webp', 0),
(108, 63, './public/imageSp/c5905adaf5384d542e081738934f6d30.webp', 0),
(109, 64, './public/imageSp/a76ab614813d670df69c68520ba6fd94 (1).webp', 0),
(110, 64, './public/imageSp/83c2015356eb093f721300702bebe3e1 (1).webp', 1),
(111, 64, './public/imageSp/6de89db1b6c81c3f6be3bf298a2a030f (1).webp', 2),
(112, 64, './public/imageSp/d12cc0dad659c5e4b8e8e219a745de34 (1).webp', 0),
(113, 64, './public/imageSp/cd3284bd739e47588d78ebf19d40d2ad (1).webp', 0),
(114, 64, './public/imageSp/72e41a54099a285b7bde471fef85c138 (1).webp', 0),
(115, 64, './public/imageSp/c9b540317c2b65d41d438a6dc026ce5e (1).webp', 0),
(116, 64, './public/imageSp/96692d66b589f9ac39eea3eb69aaf808 (1).webp', 0),
(117, 64, './public/imageSp/97e841f49f8bd066a356af4f4d429166 (1).webp', 0),
(118, 64, './public/imageSp/11021c9b737ef38a8c5c7b9eeba5a0bc (1).webp', 0),
(119, 64, './public/imageSp/d107594416b842b75125770b17061710 (1).webp', 0),
(120, 64, './public/imageSp/ab3e9b7ff38317325894bff8f4f0b027 (1).webp', 0),
(121, 64, './public/imageSp/5e36a9f551fcb31ba0ec575f4fab3efa (1).webp', 0),
(122, 65, './public/imageSp/áo sơ mi cổ kiểu04.webp', 0),
(123, 65, './public/imageSp/áo sơ mi cổ kiểu01.webp', 1),
(124, 65, './public/imageSp/áo sơ mi cổ kiểu02.webp', 2),
(125, 65, './public/imageSp/áo sơ mi cổ kiểu03.webp', 0),
(126, 65, './public/imageSp/áo sơ mi cổ kiểu05.webp', 0),
(127, 65, './public/imageSp/áo sơ mi cổ kiểu06.webp', 0),
(128, 65, './public/imageSp/áo sơ mi cổ kiểu07.webp', 0),
(129, 65, './public/imageSp/áo sơ mi cổ kiểu08.webp', 0),
(130, 65, './public/imageSp/áo sơ mi cổ kiểu09.webp', 0),
(131, 65, './public/imageSp/áo sơ mi cổ kiểu10.webp', 0),
(132, 65, './public/imageSp/áo sơ mi cổ kiểu11.webp', 0),
(133, 65, './public/imageSp/áo sơ mi cổ kiểu12.webp', 0),
(134, 65, './public/imageSp/áo sơ mi cổ kiểu13.webp', 0),
(135, 65, './public/imageSp/áo sơ mi cổ kiểu14.webp', 0),
(136, 65, './public/imageSp/áo sơ mi cổ kiểu15.webp', 0),
(137, 65, './public/imageSp/áo sơ mi cổ kiểu16.webp', 0),
(138, 65, './public/imageSp/áo sơ mi cổ kiểu17.webp', 0),
(139, 65, './public/imageSp/áo sơ mi cổ kiểu18.webp', 0),
(140, 65, './public/imageSp/áo sơ mi cổ kiểu19.webp', 0),
(141, 65, './public/imageSp/áo sơ mi cổ kiểu20.webp', 0),
(142, 66, './public/imageSp/57ba5e36c1e4ea3cd88a0991bf9cb5e5.webp', 0),
(143, 66, './public/imageSp/b74f22f0ff1611942575dd96db3132a3.webp', 1),
(144, 66, './public/imageSp/b669119fd50b17d40a6af276130574e4.webp', 2),
(145, 66, './public/imageSp/d9af4e23dadecbcebbed067a69c2a8f1.webp', 0),
(146, 66, './public/imageSp/e3b5def64d57eabac5a08f91f61be6d0.webp', 0),
(147, 66, './public/imageSp/4dc0c9c5e1d7076a71fd5f257966703a.webp', 0),
(148, 66, './public/imageSp/61843118f1268ab4f21cb498951b0dec.webp', 0),
(149, 66, './public/imageSp/596708ef775e9ecd643e4696e3e97518.webp', 0),
(150, 66, './public/imageSp/1b44193a14ab17b2616c2c39dd624186.webp', 0),
(151, 66, './public/imageSp/756de3a148fd8fa892f5f149cbaf13ad.webp', 0),
(152, 68, './public/imageSp/cbedcdf9df43acf0eee541c144cefa61.webp', 1),
(153, 68, './public/imageSp/4bdddd348f47574a635b891243789511.webp', 2),
(154, 68, './public/imageSp/78a2aa392a18142e599728f845cc05d5.webp', 0),
(155, 68, './public/imageSp/3b0efe52c22e271b14943618d12e45e0.webp', 0),
(156, 68, './public/imageSp/006b1b252a9644797241057bbdc61af2.webp', 0),
(157, 69, './public/imageSp/93169464161dec0c447131df16d77c94.webp', 1),
(158, 69, './public/imageSp/1983533b4c326467f45e1b58627f8b48.webp', 2),
(159, 69, './public/imageSp/ce734e8ca3fcb9e56681326bb6f4531c.webp', 0),
(160, 69, './public/imageSp/03d674eb1cfb92ac448ab4ed96b7688e.webp', 0),
(161, 70, './public/imageSp/689a314bc7a551ab8df7c96105afc8bd.webp', 1),
(162, 70, './public/imageSp/42dab09042260077cbcb1f2abd3ebf46.webp', 2),
(163, 70, './public/imageSp/34321d43f649d1aa924694ccf718357e.webp', 0),
(164, 71, './public/imageSp/302dd27417291ff90e3dfd9ee665fa93.webp', 1),
(165, 71, './public/imageSp/be69288e1e14328bab09599c3300c9d4.webp', 2),
(166, 71, './public/imageSp/fac3be4ad37a5f948d4b0ca93898a978.webp', 0),
(167, 72, './public/imageSp/ad7a78606aab086ee9789ed2af8ab32d.webp', 0),
(168, 72, './public/imageSp/13d07eb88ee25b8ac0f8cbc360f12eca.webp', 1),
(169, 72, './public/imageSp/5e97ecccde75ab142236db22c0a7d6c7.webp', 2),
(170, 72, './public/imageSp/7539794689a6451e68455a0f2e47a06f.webp', 0),
(171, 72, './public/imageSp/a4598d0c6eea56f5a4eb50e0ffb9675f.webp', 0),
(172, 72, './public/imageSp/d84dbd507e95f16293e28793e86322e8.webp', 0),
(173, 72, './public/imageSp/9769693273954987ecba8cc04d916484.webp', 0),
(174, 72, './public/imageSp/fa7cc199bc40ae324b3fcc451a1ecb6c.webp', 0),
(175, 72, './public/imageSp/c3b8da9e5b4e5b0e427443d1374ca6df.webp', 0),
(176, 73, './public/imageSp/c5f945c60a56edf4afb7926f3a70d771.webp', 0),
(177, 73, './public/imageSp/3afb790e6756e8c3b978ba6c9fdf3897.webp', 0),
(178, 73, './public/imageSp/d9f4055c30f54814c9bb5dba93cbc1f2.webp', 0),
(179, 73, './public/imageSp/326ea47c1388808b8cfd3342d09fff28.webp', 1),
(180, 73, './public/imageSp/1e077139ad14a2bee00fd0d3b6620940.webp', 2),
(181, 73, './public/imageSp/25e223be713d491ccdcd77e9a7aca1f6.webp', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int NOT NULL,
  `product_id` int NOT NULL COMMENT 'id sản phẩm',
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Kích thước sản phẩm',
  `stock` int NOT NULL DEFAULT '0' COMMENT 'Số lượng tồn kho'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size`, `stock`) VALUES
(251, 59, 'S', 0),
(252, 59, 'M', 5),
(253, 59, 'L', 0),
(254, 59, 'XL', 5),
(255, 59, 'XXL', 1),
(256, 60, 'S', 5),
(257, 60, 'M', 0),
(258, 60, 'L', 5),
(259, 60, 'XL', 1),
(260, 60, 'XXL', 1),
(261, 63, 'S', 5),
(262, 63, 'M', 4),
(263, 63, 'L', 3),
(264, 63, 'XL', 1),
(265, 63, 'XXL', 0),
(266, 64, 'S', 5),
(267, 64, 'M', 4),
(268, 64, 'L', 1),
(269, 64, 'XL', 0),
(270, 64, 'XXL', 0),
(271, 65, 'S', 6),
(272, 65, 'M', 6),
(273, 65, 'L', 0),
(274, 65, 'XL', 0),
(275, 65, 'XXL', 0),
(276, 66, 'S', 5),
(277, 66, 'M', 4),
(278, 66, 'L', 3),
(279, 66, 'XL', 0),
(280, 66, 'XXL', 0),
(286, 68, 'S', 1),
(287, 68, 'M', 2),
(288, 68, 'L', 3),
(289, 68, 'XL', 0),
(290, 68, 'XXL', 0),
(291, 69, 'S', 1),
(292, 69, 'M', 0),
(293, 69, 'L', 3),
(294, 69, 'XL', 0),
(295, 69, 'XXL', 0),
(296, 70, 'S', 0),
(297, 70, 'M', 1),
(298, 70, 'L', 2),
(299, 70, 'XL', 0),
(300, 70, 'XXL', 0),
(301, 71, 'S', 5),
(302, 71, 'M', 5),
(303, 71, 'L', 5),
(304, 71, 'XL', 0),
(305, 71, 'XXL', 0),
(306, 72, 'S', 5),
(307, 72, 'M', 5),
(308, 72, 'L', 5),
(309, 72, 'XL', 0),
(310, 72, 'XXL', 0),
(311, 73, 'S', 5),
(312, 73, 'M', 6),
(313, 73, 'L', 7),
(314, 73, 'XL', 0),
(315, 73, 'XXL', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Áo,quần,chân váy...',
  `parent_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `parent_category_id`) VALUES
(1, 'Áo', 1),
(2, 'Áo khoác', 1),
(3, 'Set Bộ', 1),
(4, 'Quần & Jumsuit', 1),
(5, 'Chân váy', 1),
(6, 'Đầm/ áo dài', 1),
(7, 'Áo', 2),
(8, 'Quần nam', 2),
(9, 'Bé gái', 3),
(10, 'Bé trai', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_subcategories`
--

CREATE TABLE `sub_subcategories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Áo polo, quần jean...',
  `parent_subcategory_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `name`, `parent_subcategory_id`) VALUES
(1, 'Áo sơ mi', 1),
(2, 'Áo thun', 1),
(3, 'Áo croptop', 1),
(4, 'Áo peplum', 1),
(5, 'Áo len', 1),
(6, 'Áo vest/ blazer', 2),
(7, 'Áo dạ/ măng tô', 2),
(8, 'Áo phao', 2),
(9, 'Set bộ công sở', 3),
(10, 'Set bộ co-ords', 3),
(11, 'Set bộ thun/ len', 3),
(12, 'Quần dài', 4),
(13, 'Quần jeans', 4),
(14, 'Quần lửng/ short', 4),
(15, 'Jumsuit', 4),
(16, 'Chân váy bút chì', 5),
(17, 'Chân váy chữ A', 5),
(18, 'Chân váy jeans', 5),
(19, 'Váy đầm nữ', 6),
(20, 'Đầm công sở', 6),
(21, 'Đầm voan hoa/ maxi', 6),
(22, 'Đầm thun', 6),
(23, 'Áo dài', 6),
(24, 'Áo thun', 7),
(25, 'Áo polo', 7),
(26, 'Áo sơ mi', 7),
(27, 'Áo len', 7),
(28, 'Áo khoác', 7),
(29, 'Áo Sweater/ Hoodie', 7),
(30, 'Quần dài', 8),
(31, 'Quần khaki', 8),
(32, 'Quần jeans', 8),
(33, 'Quần lửng/ short', 8),
(34, 'Áo bé gái', 9),
(35, 'Quần bé gái', 9),
(36, 'Váy bé gái', 9),
(37, 'Chân váy bé gái', 9),
(38, 'Phụ kiện bé gái', 9),
(39, 'Áo bé trai', 10),
(40, 'Quần bé trai', 10),
(41, 'Phụ kiện bé trai', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Họ',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Tên',
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL COMMENT 'Số điện thoại',
  `date` varchar(30) NOT NULL COMMENT 'Ngày sinh',
  `sex` varchar(1) NOT NULL COMMENT 'Giới tính',
  `city` varchar(30) NOT NULL COMMENT 'Thành phố',
  `district` varchar(30) NOT NULL COMMENT 'Huyện',
  `commune` varchar(30) NOT NULL COMMENT 'Xẫ',
  `address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Địa chỉ',
  `password` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Mật khẩu',
  `role` varchar(1) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verify` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `name`, `email`, `phone`, `date`, `sex`, `city`, `district`, `commune`, `address`, `password`, `role`, `join_date`, `verify`) VALUES
(1, 'Tạ Hoàng', 'Hiệp', 'hoanghiep262005@gmail.com', '0353608533', '2005-06-02', '1', '17', '158', '05353', 'Lạc vượng', '$2y$10$HqQQl9GV39SPt3utSG/nv.JlTZQBhVHefbxcyO8cx1vMRIQ69O7.G', '3', '2024-11-17 01:58:55', '0'),
(13, 'test', 'test', 'testtest@gmail.com', '0353608553', '2005-06-02', '1', '02', '026', '00715', 'test', '$2y$10$aQEDlONth8s38TmA9gfHcu02CT0TLTXs/y5FwybE1GCjgdTVc0mkC', '1', '2024-11-17 01:59:07', '0'),
(14, 'Aloalo', 'alo', 'aloalo@gmail.com', '0353608277', '2005-06-02', '1', '01', '001', '00004', 'Huhu', '$2y$10$SDpdhabQeVKbmsAf9pJkKuDxkwajRvtBKUAD.VRpA3/4BQZlwzGPS', '1', '2024-11-17 02:00:53', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `viewed_products`
--

CREATE TABLE `viewed_products` (
  `viewed_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `viewed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `viewed_products`
--

INSERT INTO `viewed_products` (`viewed_id`, `user_id`, `product_id`, `viewed_at`) VALUES
(8, NULL, 72, '2024-11-28 13:34:08'),
(9, NULL, 60, '2024-11-28 13:34:32'),
(10, NULL, 60, '2024-11-28 13:35:15'),
(11, NULL, 69, '2024-11-28 13:35:17'),
(12, NULL, 70, '2024-11-28 13:35:19'),
(13, NULL, 69, '2024-11-28 13:35:20'),
(14, NULL, 70, '2024-11-28 13:35:20'),
(19, NULL, 73, '2024-11-30 11:47:45'),
(20, NULL, 71, '2024-11-30 11:48:09'),
(21, NULL, 73, '2024-11-30 11:51:17'),
(22, NULL, 71, '2024-11-30 11:51:19'),
(23, NULL, 73, '2024-11-30 11:51:20'),
(24, NULL, 71, '2024-11-30 12:08:05'),
(25, NULL, 72, '2024-11-30 12:08:09'),
(32, 1, 63, '2024-12-02 17:41:13'),
(33, 1, 60, '2024-12-02 17:41:32'),
(34, 1, 59, '2024-12-02 18:04:28'),
(35, 1, 73, '2024-12-04 08:58:39'),
(36, 1, 70, '2024-12-12 12:35:24'),
(37, 1, 71, '2024-12-12 12:35:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`, `created_at`) VALUES
(14, 1, 69, '2024-11-30 11:45:57'),
(15, NULL, 72, '2024-11-30 12:06:00'),
(16, NULL, 73, '2024-11-30 12:06:17'),
(18, NULL, 60, '2024-11-30 12:07:24'),
(19, NULL, 71, '2024-11-30 12:21:01'),
(20, NULL, 71, '2024-11-30 12:21:18'),
(21, NULL, 59, '2024-11-30 12:22:56'),
(22, NULL, 73, '2024-11-30 13:30:39'),
(23, NULL, 73, '2024-11-30 13:39:19'),
(24, NULL, 60, '2024-11-30 13:39:22'),
(26, NULL, 72, '2024-11-30 13:42:28'),
(28, NULL, 72, '2024-11-30 16:45:35'),
(29, 1, 72, '2024-12-02 17:33:23'),
(30, 1, 73, '2024-12-02 17:33:24'),
(34, 1, 64, '2024-12-02 17:39:04'),
(36, 1, 60, '2024-12-10 08:02:35'),
(38, 1, 71, '2024-12-12 12:35:18'),
(39, 1, 70, '2024-12-12 12:35:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`,`login_time`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_subcategory_id` (`sub_subcategory_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_images_product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Chỉ mục cho bảng `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_subcategory_id` (`parent_subcategory_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `viewed_products`
--
ALTER TABLE `viewed_products`
  ADD PRIMARY KEY (`viewed_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `viewed_products`
--
ALTER TABLE `viewed_products`
  MODIFY `viewed_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_subcategory_id`) REFERENCES `sub_subcategories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  ADD CONSTRAINT `sub_subcategories_ibfk_1` FOREIGN KEY (`parent_subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `viewed_products`
--
ALTER TABLE `viewed_products`
  ADD CONSTRAINT `viewed_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `viewed_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
