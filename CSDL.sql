-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2024 lúc 06:46 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'Phụ kiện '),
(6, 'Chó cảnh'),
(7, 'Mèo cảnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `totals` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `user_id`, `totals`, `status`) VALUES
(0, '2024-01-05', 18, 0, 1),
(1, '2024-01-05', 22, 0, 3),
(2, '2024-01-05', 22, 0, 3),
(3, '2024-01-05', 22, 0, 0),
(4, '2024-01-05', 22, 0, 0),
(5, '2024-01-05', 22, 0, 0),
(6, '2024-01-05', 22, 0, 0),
(7, '2024-01-05', 22, 0, 0),
(8, '2024-01-05', 22, 0, 0),
(9, '2024-01-05', 22, 0, 0),
(10, '2024-01-05', 22, 0, 0),
(11, '2024-01-05', 22, 0, 0),
(12, '2024-01-06', 22, 478000, 0),
(13, '2024-01-06', 22, 106000, 0),
(14, '2024-01-06', 22, 10100000, 0),
(15, '2024-01-10', 22, 6944000, 0),
(16, '2024-01-11', 24, 4614000, 1),
(17, '2024-01-11', 24, 6080000, 3),
(18, '2024-01-12', 24, 3028000, 3),
(19, '2024-01-12', 24, 2790000, 3),
(20, '2024-01-12', 24, 4500000, 3),
(21, '2024-01-12', 22, 7400000, 0),
(22, '2024-01-12', 24, 9100000, 3),
(23, '2024-01-15', 24, 11100000, 3),
(24, '2024-01-16', 22, 2834000, 0),
(25, '2024-01-17', 22, 7255000, 0),
(26, '2024-01-17', 24, 5757000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `total`, `status`) VALUES
(225, 50, 7, 1, 196000, 0),
(226, 42, 7, 1, 40000, 0),
(227, 44, 7, 1, 186000, 0),
(228, 50, 9, 1, 196000, 0),
(229, 43, 9, 1, 59000, 0),
(230, 42, 9, 2, 80000, 0),
(231, 42, 10, 2, 80000, 0),
(232, 50, 11, 1, 196000, 0),
(233, 41, 11, 1, 16000, 0),
(234, 37, 12, 4, 144000, 0),
(235, 38, 12, 1, 49000, 0),
(236, 36, 12, 5, 285000, 0),
(237, 36, 13, 1, 57000, 0),
(238, 38, 13, 1, 49000, 0),
(239, 6, 14, 1, 4500000, 0),
(240, 18, 14, 2, 5600000, 0),
(241, 34, 15, 1, 80000, 0),
(242, 12, 15, 2, 314000, 0),
(243, 13, 15, 1, 6550000, 0),
(244, 2, 16, 1, 4500000, 0),
(245, 11, 16, 1, 79000, 0),
(246, 32, 16, 1, 35000, 0),
(253, 1, 17, 1, 2755000, 0),
(255, 11, 17, 2, 158000, 0),
(256, 4, 17, 1, 2755000, 0),
(257, 12, 17, 1, 157000, 0),
(258, 4, 18, 1, 2755000, 0),
(259, 34, 18, 1, 80000, 0),
(260, 12, 18, 1, 157000, 0),
(261, 37, 18, 1, 36000, 0),
(262, 32, 19, 1, 35000, 0),
(263, 1, 19, 1, 2755000, 0),
(264, 6, 20, 1, 4500000, 0),
(273, 9, 21, 1, 7400000, 0),
(274, 16, 22, 1, 3500000, 0),
(275, 18, 22, 2, 5600000, 0),
(276, 3, 23, 2, 7600000, 0),
(277, 5, 23, 1, 3500000, 0),
(278, 4, 24, 1, 2755000, 0),
(280, 11, 24, 1, 79000, 0),
(281, 2, 25, 1, 4500000, 0),
(282, 4, 25, 1, 2755000, 0),
(283, 18, 26, 2, 5600000, 0),
(288, 12, 26, 1, 157000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(12) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `describe` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `product_image`, `describe`, `product_quantity`, `cate_id`, `sup_id`, `status`) VALUES
(1, 'TT27CCX', 'Chó Phốc Sóc màu trắng ', 2755000, 'images/1.jpg', '<p></p>\r\n<table border=\"1\" style=\"border-collapse: collapse; width: 80.9874%; height: 111.953px; border-width: 1px; border-color: rgb(224, 62, 45);\"><colgroup><col style=\"width: 50.0647%;\"><col style=\"width: 49.9353%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Th&aacute;ng tuổi: 2 th&aacute;ng tuổi</span></td>\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Bố: Ted</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Giới t&iacute;nh: Đực</span></td>\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Mẹ: Bella</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>M&agrave;u: Trắng</span></td>\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Sức khỏe: Nhanh nhẹn, ăn uống tốt</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Tẩy giun: 1 lần</span></td>\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Vận chuyển: Miễn ph&iacute;</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\"><span>Nguồn gốc: Thuần chủng, sinh sản tại Trại PetStation</span></td>\r\n<td style=\"height: 22.3906px; border-color: rgb(224, 62, 45);\">\r\n<p><span>Ti&ecirc;m ph&ograve;ng: 1 mũi vacxin</span></p>\r\n<p><span></span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p></p>\r\n<p><video width=\"300\" height=\"150\" controls=\"controls\">\r\n <source src=\"images/1.mp4\" type=\"video/mp4\"></video></p>\r\n<p></p>', 4, 6, 4, 1),
(2, 'BULLTX2C', 'Chó Bull Pháp bò sữa siêu siêu cute', 4500000, 'images/2.jpg', '<p></p>\r\n<table border=\"1\" style=\"border-collapse: collapse; width: 84.0336%; border-width: 1px; border-color: rgb(224, 62, 45); height: 111.953px;\"><colgroup><col style=\"width: 50.0568%;\"><col style=\"width: 49.9432%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Th&aacute;ng tuổi: 4 th&aacute;ng tuổi</span></td>\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Bố :Bae</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Giới t&iacute;nh: Đực</span></td>\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Mẹ: Ape</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>M&agrave;u l&ocirc;ng: B&ograve; sữa</span></td>\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Sức khỏe: Nhanh nhẹn, ăn uống tốt</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Tẩy giun: 2 lần</span></td>\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Vận chuyển: Miễn ph&iacute;</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Nguồn gốc: Thuần chủng, sinh sản tại Trại PetStation</span></td>\r\n<td style=\"border-color: rgb(224, 62, 45); height: 22.3906px;\"><span>Ti&ecirc;m ph&ograve;ng: 2 mũi vacxin</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p></p>\r\n<p><video width=\"300\" height=\"150\" controls=\"controls\" poster=\"\">\r\n<source src=\"images/2.mp4\" type=\"video/mp4\"></video></p>', 2, 6, 0, 1),
(3, 'DATCMM1', 'Mèo Anh Bicinamon Solak ', 3800000, 'images/M1.jpg', '<p><strong>M&egrave;o Anh l&ocirc;ng ngắn Bicinamon m&atilde; ALN1569&nbsp;</strong>c&oacute; một ngoại h&igrave;nh kh&aacute; duy&ecirc;n khi c&oacute; một mảng l&ocirc;ng m&agrave;u n&acirc;u nhỏ bằng hạt đỗ nằm ngay ngắn dưới chiếc miệng xinh của ch&uacute; m&egrave;o n&agrave;y. Vậy n&ecirc;n sen n&agrave;o muốn sở hữu cho m&igrave;nh một b&eacute; m&egrave;o xinh h&atilde;y qua ngay Pet House nh&aacute;.</p>\r\n<p>M&egrave;o Anh l&ocirc;ng ngắn lu&ocirc;n được c&aacute;c bạn trẻ y&ecirc;u th&iacute;ch bởi ch&uacute;ng l&agrave; giống m&egrave;o rất thiện thiện v&agrave; năng động. Để tham khảo th&ecirc;m về c&aacute;c b&eacute; m&egrave;o tại Pet House, qu&yacute; kh&aacute;ch vui l&ograve;ng kết bạn Zalo hoặc gọi Hotline: 0379.889.868 để được tư vấn cụ thể từng b&eacute; ạ.</p>', 18, 7, 4, 1),
(4, 'TTRRY35F', 'Mèo Anh lông ngắn vàng chân lùn ', 2755000, 'images/m2.jpg', '<p><strong>M&egrave;o Anh l&ocirc;ng ngắn v&agrave;ng ch&acirc;n l&ugrave;n tai cụp m&atilde; MK542</strong>&nbsp;sở hữu v&oacute;c d&aacute;ng đ&aacute;ng y&ecirc;u v&agrave; cute, chất l&ocirc;ng đẹp khoẻ khoắn đ&ocirc;i mắt long lanh, m&egrave;o con được thừa hưởng những ưu điểm nổi bật từ gen bố mẹ.</p>\r\n<p>Qu&yacute; kh&aacute;ch c&oacute; thể qua đ&oacute;n m&egrave;o tại shop PetHouse.</p>', 3, 7, 3, 1),
(5, 'MK22TYRG', 'Mèo Anh lông ngắn chân lùn ', 3500000, 'images/M3.jpg', '<p><strong>M&egrave;o Anh l&ocirc;ng ngắn Munchkin ch&acirc;n l&ugrave;n tabby m&atilde; MK558</strong><span>&nbsp;với m&agrave;u l&ocirc;ng nổi bật, mềm mại như nhung đ&ocirc;i tai cute, c&ugrave;ng đ&ocirc;i mắt ma mị biểu cảm dễ thương đ&ocirc;i ch&acirc;n l&ugrave;n cute, tinh nghịch sẽ l&agrave;m bạn xao xuyến muốn đ&oacute;n b&eacute; về nh&agrave;.</span></p>', 12, 7, 3, 1),
(6, 'ALTTYVGF', 'Mèo Anh Lông Dài trưởng thành Jolien', 4500000, 'images/M6.jpg', '<p><strong>M&egrave;o Anh L&ocirc;ng D&agrave;i trưởng th&agrave;nh m&atilde; ALD1532&nbsp;</strong>sở hữu đ&ocirc;i mắt to tr&ograve;n kết hợp với bộ l&ocirc;ng &oacute;ng ả mượt m&agrave; tạo n&ecirc;n sự qu&yacute; ph&aacute;i nhưng cũng kh&ocirc;ng k&eacute;m phần sang trọng thu h&uacute;t &aacute;nh nh&igrave;n.</p>\r\n<p><strong>M&egrave;o Anh L&ocirc;ng D&agrave;i</strong><span>&nbsp;</span>l&agrave; d&ograve;ng m&egrave;o ngoan ngo&atilde;n, th&acirc;n thiện v&agrave; biết nghe lời. Lo&agrave;i m&egrave;o n&agrave;y c&oacute; thể sống ho&agrave; thuận c&ugrave;ng c&aacute;c th&uacute; cưng kh&aacute;c, ch&uacute;ng th&iacute;ch được chơi đ&ugrave;a, quấn qu&yacute;t được chủ &acirc;u yếm vuốt ve khi b&ecirc;n cạnh.</p>', 12, 7, 3, 1),
(8, 'TTYYM12Z', 'Mèo anh lông dài màu Vàng Trắng ', 4500000, 'images/1705482813_m25.jpg', '<p><strong>M&egrave;o anh l&ocirc;ng d&agrave;i m&agrave;u V&agrave;ng Trắng m&atilde; HML856<span>&nbsp;</span></strong><span>với thần th&aacute;i sang trọng c&ugrave;ng đ&ocirc;i mắt chứa cả một bầu trời đ&aacute;ng y&ecirc;u. B&eacute; c&oacute; chất l&ocirc;ng khoẻ khoắn nổi bật, khu&ocirc;n mặt tịt dễ thương cute nh&igrave;n v&agrave;o chắc chắn mọi người ai cũng phải m&ecirc; mẩn b&eacute; m&egrave;o n&agrave;y.</span></p>', 12, 7, 4, 1),
(9, 'TYUL337TV', 'Chó Cocker Spaniel nâu trắng ', 7400000, 'images/M8.jpg', '<p><strong>Ch&oacute; Cocker Spaniel n&acirc;u trắng m&atilde; CS751<span>&nbsp;</span></strong><span>nổi bật với m&agrave;u l&ocirc;ng khoẻ khoắn, chất l&ocirc;ng đẹp nổi bật mềm mượt c&ugrave;ng đ&ocirc;i tai d&agrave;i rất nghệ sĩ n&ecirc;n thơ đ&ocirc;i mắt to tr&ograve;n th&ocirc;ng minh nhanh nhẹn.</span></p>', 5, 6, 3, 1),
(10, 'TCYY57MKH', 'Chó Cocker Spaniel đen trắng ', 5700000, 'images/M9.jpg', '<p><strong>Ch&oacute; Cocker Spaniel đen trắng m&atilde; CS757</strong><span>&nbsp;l&agrave; một b&eacute; c&uacute;n sống t&igrave;nh cảm ngoan ngo&atilde;n biết v&acirc;ng lời dạy bảo, b&eacute; cuốn h&uacute;t mọi người bởi bộ l&ocirc;ng d&agrave;i, mềm mượt đầy nghệ thuật của m&igrave;nh.</span></p>', 7, 6, 3, 1),
(11, 'VNTTJ5K', 'Nước hoa chó mèo Bioline 207ml', 79000, 'images/M10.jpg', '<h2>Nước hoa ch&oacute; m&egrave;o Bioline 207ml</h2>\r\n<p><strong>Nước hoa ch&oacute; m&egrave;o Bioline</strong><span>&nbsp;</span>với c&ocirc;ng thức tạo hương nhẹ nh&agrave;ng dễ chịu với nhiều c&ocirc;ng dụng k&igrave; diệu gi&uacute;p đem đến những trải nghiệm thoải m&aacute;i, thư giản đến với th&uacute; cưng nh&agrave; bạn m&agrave; ho&agrave;n to&agrave;n an t&acirc;m khi sử dụng.</p>', 23, 1, 0, 1),
(12, 'FGTT57J', 'Lược chải lông Pet Grooming ', 157000, 'images/M11.jpg', '<h2>Lược chải l&ocirc;ng Pet Grooming d&agrave;nh cho ch&oacute; m&egrave;o (tặng lược nhỏ)</h2>\r\n<p><strong>Lược chải l&ocirc;ng Pet Grooming</strong><span>&nbsp;</span>l&agrave; một trong những m&oacute;n phụ kiện kh&ocirc;ng thể thiếu của c&aacute;c sen, gi&uacute;p l&ocirc;ng của th&uacute; cưng mềm mượt, kh&ocirc;ng bết, kh&ocirc;ng rối. Đặc biệt, với c&aacute;c giống ch&oacute; m&egrave;o l&ocirc;ng d&agrave;i, lược chải l&ocirc;ng lại c&agrave;ng thể hiện r&otilde; tầm quan trọng của m&igrave;nh. Khi chải l&ocirc;ng thường xuy&ecirc;n, bạn sẽ hạn chế được t&igrave;nh trạng l&ocirc;ng rụng d&iacute;nh v&agrave;o giường chiếu, ghế sofa. Kh&ocirc;ng chỉ ảnh hưởng mặt thẩm mỹ, l&ocirc;ng ch&oacute; m&egrave;o c&ograve;n c&oacute; thể g&acirc;y dị ứng cho một số người.</p>', 17, 1, 2, 1),
(13, 'HHTY57CC', 'Chó Becgie Bỉ Malinois ', 6550000, 'images/m12.jpg', '<p><strong>Ch&oacute; Becgie Bỉ Malinois m&agrave;u Duron m&atilde; BG1281&nbsp;</strong>với k&iacute;ch thước trung b&igrave;nh đến lớn, ch&uacute;ng c&oacute; d&aacute;ng vẻ mạnh mẽ v&agrave; sẵn s&agrave;ng ho&agrave;n th&agrave;nh mục ti&ecirc;u được giao. T&iacute;nh c&aacute;ch th&ocirc;ng minh v&agrave; nhanh nhạy của b&eacute; l&agrave;m cho b&eacute; dễ đ&agrave;o tạo v&agrave; th&iacute;ch l&agrave;m việc với con người. B&eacute; c&oacute; năng lượng lớn v&agrave; th&iacute;ch vận động, v&igrave; vậy cần sự k&iacute;ch th&iacute;ch v&agrave; hoạt động đều đặn. Sự lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch thể thao, vận động ngo&agrave;i trời như chạy bộ, leo n&uacute;i,&hellip; B&eacute; Becgie đực n&agrave;y được 2 th&aacute;ng tuổi, hoạt b&aacute;t, th&ocirc;ng m&igrave;nh v&agrave; rất nghe lời.</p>\r\n<p>Được sử dụng cho nhiều mục đ&iacute;ch, từ c&ocirc;ng việc cảnh s&aacute;t cho đến tham gia v&agrave;o thể thao ch&oacute;, Ch&oacute; B&eacute;cgie Bỉ l&agrave; người bạn đồng h&agrave;nh đ&aacute;ng y&ecirc;u v&agrave; th&ocirc;ng minh, l&agrave;m cho ch&uacute;ng trở th&agrave;nh lựa chọn l&yacute; tưởng cho những người y&ecirc;u ch&oacute; đ&ograve;i hỏi t&iacute;nh trung th&agrave;nh v&agrave; đẹp mắt. Ngo&agrave;i ra, ch&uacute;ng c&ograve;n c&oacute; d&aacute;ng vẻ dũng m&atilde;nh v&agrave; cơ bắp, với đầu tr&ograve;n v&agrave; mũi nhọn. Đ&ocirc;i mắt s&aacute;ng lấp l&aacute;nh v&agrave; đ&ocirc;i tai h&igrave;nh tam gi&aacute;c đứng thẳng tạo n&ecirc;n một khu&ocirc;n mặt tinh tế v&agrave; tinh tế.<span>&nbsp;</span></p>', 6, 6, 3, 1),
(14, 'HHYIOI45', 'Chó Cocker Spaniel đen trắng ', 5700000, 'images/1705482925_h7.jpg', '<p><strong>Ch&oacute; Cocker Spaniel đen trắng m&atilde; CS757</strong><span>&nbsp;l&agrave; một b&eacute; c&uacute;n sống t&igrave;nh cảm ngoan ngo&atilde;n biết v&acirc;ng lời dạy bảo, b&eacute; cuốn h&uacute;t mọi người bởi bộ l&ocirc;ng d&agrave;i, mềm mượt đầy nghệ thuật của m&igrave;nh.</span></p>', 7, 6, 4, 1),
(15, 'NHUI57CC', 'Chó Cocker Spaniel nâu', 2755000, 'images/m14.jpg', '<p><strong>Ch&oacute; Cocker Spaniel đen trắng m&atilde; CS757</strong><span>&nbsp;l&agrave; một b&eacute; c&uacute;n sống t&igrave;nh cảm ngoan ngo&atilde;n biết v&acirc;ng lời dạy bảo, b&eacute; cuốn h&uacute;t mọi người bởi bộ l&ocirc;ng d&agrave;i, mềm mượt đầy nghệ thuật của m&igrave;nh.</span></p>', 9, 6, 4, 1),
(16, 'HHTU57CC', 'Chó Cocker Spaniel nâu nhạt', 3500000, 'images/m16.jpg', '<p><strong>Ch&oacute; Cocker Spaniel n&acirc;u nhạt m&atilde; CS756</strong><span>&nbsp;với biểu cảm dễ thương th&acirc;n thiện&nbsp;v&oacute;c d&aacute;ng chuẩn được thừa hưởng m&atilde; gen chuẩn của bố mẹ. C&uacute;n sẽ l&agrave; người bạn trung th&agrave;nh, sống v&ocirc; c&ugrave;ng t&igrave;nh cảm với c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh.</span></p>', 12, 6, 3, 1),
(17, 'UJTT57CCV', 'Chó Yorkshire Terrier đen nâu ', 3500000, 'images/m18.jpg', '<p><strong>Ch&oacute; Yorkshire Terrier đen n&acirc;u m&atilde; YT815</strong><span>&nbsp;thu h&uacute;t mọi người bởi bộ l&ocirc;ng d&agrave;i sang trọng, th&acirc;n h&igrave;nh nhỏ nhắn xinh xắn c&ugrave;ng đ&ocirc;i tai nhỏ nhắn cưng xỉu. B&eacute; hiện tại đ&atilde; được 2 th&aacute;ng tuổi v&ocirc; c&ugrave;ng khoẻ mạnh lanh lợi, c&uacute;n c&oacute; thể ăn cơm v&agrave; c&aacute;m.</span></p>', 7, 6, 4, 1),
(18, 'BGHJ765', 'Mèo Himalaya Lilac siêu dễ thương', 2800000, 'images/m19.jpg', '<p><strong>M&egrave;o Himalaya Lilac m&atilde; HML857<span>&nbsp;</span></strong><span>kho&aacute;c tr&ecirc;n m&igrave;nh một bộ l&ocirc;ng bồng bềnh qu&yacute; tộc c&ugrave;ng khu&ocirc;n mặt ma mị đầy thần th&aacute;i sẽ khiến bạn m&ecirc; mệt v&agrave; muốn đ&oacute;n b&eacute; ngay về nh&agrave; m&igrave;nh.</span></p>', 10, 7, 4, 1),
(19, 'YUIO56GG', 'Mèo Ragdoll kem siêu đáng yêu', 4600000, 'images/m20.jpg', '<p><strong>M&egrave;o Ragdoll kem m&atilde; RD845<span>&nbsp;</span></strong><span>hiện nay được 2 th&aacute;ng tuổi khoẻ mạnh c&oacute; giấy tờ v&agrave; sổ ti&ecirc;m đầy đủ.B&eacute; c&oacute; nhiều đặc điểm nổi bật như m&agrave;u l&ocirc;ng đẹp, đ&ocirc;i ch&acirc;n nhỏ nhắn xinh xắn, cute.</span></p>', 5, 7, 3, 1),
(20, 'TTCUY67', 'Mèo Sphynx màu hồng Jolly Park', 3450000, 'images/m21.jpg', '<p><strong>M&egrave;o Sphynx m&agrave;u hồng m&atilde; SPH1257&nbsp;</strong>sở hữu cặp tai xoắn v&agrave; đ&ocirc;i mắt m&agrave;u xanh ngọc gi&uacute;p cho vẻ đẹp của b&eacute; m&egrave;o n&agrave;y ng&agrave;y c&agrave;ng trở n&ecirc;n ki&ecirc;u sa, sang trọng v&agrave; qu&yacute; ph&aacute;i.</p>\r\n<p>M&egrave;o Sphynx hay c&ograve;n được gọi l&agrave; m&egrave;o Nh&acirc;n Sư l&agrave; một trong những giống m&egrave;o được rất nhiều người ưa th&iacute;ch tại Việt Nam kể từ khi giống m&egrave;o n&agrave;y bắt đầu du nhập v&agrave;o nước ta. Để tham khảo th&ecirc;m về c&aacute;c b&eacute; m&egrave;o tại Pet House, qu&yacute; kh&aacute;ch vui l&ograve;ng kết bạn Zalo hoặc gọi Hotline: 0379.889.868 để được tư vấn cụ thể từng b&eacute; ạ</p>', 8, 7, 4, 1),
(21, 'VTUY76CC', 'Mèo Sphynx màu hồng cặp tai xoắn', 3800000, 'images/m22.jpg', '<p><strong>M&egrave;o Anh l&ocirc;ng ngắn tai cụp m&atilde; ALN1453<span>&nbsp;</span></strong>&ndash; sở hữu bộ l&ocirc;ng m&agrave;u silver si&ecirc;u d&agrave;y, mềm mượt, &oacute;ng ả như tơ c&ugrave;ng đ&ocirc;i tai cụp tr&ocirc;ng rất dễ thương. Th&ecirc;m một đặc điểm v&ocirc; c&ugrave;ng nổi bật nữa l&agrave; b&eacute; sở hữu &aacute;nh mắt v&ocirc; c&ugrave;ng đẹp đẽ, thần th&aacute;i v&agrave; huyền b&iacute;. Tuy tr&ocirc;ng ngoại h&igrave;nh c&oacute; vẻ lạnh l&ugrave;ng, nhưng t&iacute;nh c&aacute;ch của b&eacute; rất dịu d&agrave;ng, nhẹ nh&agrave;ng như ch&agrave;ng ho&agrave;ng tử trong mơ vậy đ&oacute;. B&eacute; được 10 th&aacute;ng tuổi, ti&ecirc;m 2 mũi v&agrave; xổ giun rồi đ&oacute; ạ, chỉ đợi c&aacute;c t&igrave;nh y&ecirc;u thương của mọi người đến ẵm b&eacute; về th&ocirc;i đ&oacute;.</p>\r\n<p>M&egrave;o Anh l&ocirc;ng ngắn được b&igrave;nh chọn l&agrave; giống m&egrave;o được ưa chuộng v&agrave; y&ecirc;u th&iacute;ch trong nhiều thập kỷ. C&oacute; v&ocirc; v&agrave;n l&yacute; do cho nhận định n&agrave;y, nổi bật hơn hết thảy l&agrave; c&aacute;c b&eacute; n&agrave;y c&oacute; ngoại h&igrave;nh v&ocirc; c&ugrave;ng đẹp mắt, ngh&igrave;n người nh&igrave;n th&igrave; cả ngh&igrave;n người y&ecirc;u thương, cưng nựng. Ngo&agrave;i ra, t&iacute;nh c&aacute;ch của m&egrave;o Anh kh&aacute; trầm tĩnh, ph&ugrave; hợp cho c&aacute;c bạn th&iacute;ch sự tĩnh lặng nhưng vẫn muốn c&oacute; một &ldquo;người bạn&rdquo; sống chung trong cuộc sống bận rộn n&agrave;y.</p>', 10, 7, 3, 1),
(22, 'TYUIII67', 'Mèo Anh lông ngắn bicolor ', 2700000, 'images/1704527134_m25.jpg', '<p><strong>M&egrave;o Anh l&ocirc;ng ngắn bicolor m&atilde; ALN133</strong><span>&nbsp;sở hữu v&oacute;c d&aacute;ng y&ecirc;u v&agrave; cute, chất l&ocirc;ng đẹp mềm mượt, m&egrave;o con được thừa hưởng những ưu điểm nổi bật từ gen bố mẹ.</span></p>', 8, 7, 0, 1),
(23, 'TYUILL5X', 'Chó Hà Lan tai ngắn dễ thương', 2500000, 'images/1704544793_cho3.jpg', '<p>ttttt</p>', 3, 6, 0, 1),
(24, 'TYUILL5', 'Chó Ấn Độ siêu thông minh', 4250000, 'images/1704545015_m26.jpg', '<p>ttyyy</p>', 7, 6, 0, 1),
(25, 'YUIOTT5', 'Chó Alaska siêu to khổng lồ', 7500000, 'images/1704545104_m27.jpg', '<p>tttttt</p>', 8, 6, 0, 1),
(26, 'TYUILLK', 'Chó Mông Cộc nâu đỏ ', 7250000, 'images/1704545189_m28.jpg', '<p>ttttt</p>', 7, 6, 0, 1),
(29, 'tttgggf', 'ttgggg', 4567655, 'images/1705483289_1.jpg', '<p>tggfdddd</p>', 7, 6, 0, 1),
(31, 'TTX146', 'Váy dạ hội cao cấp Sulimar cho mèo ', 255000, 'images/h3.jpg', '<table border=\"1\" style=\"border-collapse: collapse; width: 100%; height: 44.7812px;\"><colgroup><col style=\"width: 49.9465%;\"><col style=\"width: 49.9465%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px;\">TT</td>\r\n<td style=\"height: 22.3906px;\">Th&ocirc;ng tin</td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px;\">HAGL</td>\r\n<td style=\"height: 22.3906px;\">HAGL</td>\r\n</tr>\r\n<tr style=\"height: 0px;\">\r\n<td style=\"height: 0px;\">HNFC</td>\r\n<td style=\"height: 0px;\">HNFC</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\"></p>\r\n<p style=\"padding-left: 40px;\"></p>', 4, 1, 0, 1),
(32, 'TTXX77', 'Áo con vịt thời trang cho chó mèo', 35000, 'images/h2.jpg', '<p style=\"text-align: justify; line-height: 1.5;\"><span style=\"color: rgb(45, 194, 107);\">M&ugrave;a h&egrave; đang tới v&agrave; mang c&aacute;i n&oacute;ng đến, th&uacute; cưng của bạn sẽ bị ảnh hưởng tới sức khỏe nếu kh&ocirc;ng được bảo vệ kĩ c&agrave;ng. &Aacute;o h&igrave;nh vịt l&agrave; lựa chọn tốt để giải nhiệt cho c&aacute;c bạn ch&oacute; m&egrave;o những ng&agrave;y n&oacute;ng. L&agrave;m từ chất vải polyester c&oacute; độ chống b&aacute;m bụi, chống nhăn n&ecirc;n rất dễ d&agrave;ng l&agrave;m sạch, vệ sinh. Với m&agrave;u sắc bắt mắt c&ugrave;ng k&iacute;ch cỡ đa dạng ph&ugrave; hợp cho nhiều giống ch&oacute; m&egrave;o kh&aacute;c nhau. Được thiết kế h&agrave;i h&oacute;a c&ugrave;ng họa tiết ngộ nghĩnh, đ&aacute;ng y&ecirc;u th&igrave; đ&acirc;y l&agrave; sự lựa chọn h&agrave;ng đầu cho th&uacute; cưng của bạn.</span></p>\r\n<p></p>', 7, 1, 0, 1),
(33, 'TX375CC', 'Áo 2 dây mỏng cute cho chó mèo', 50000, 'images/h4.png', '<p>Thời tiết khi v&agrave;o h&egrave; g&acirc;y n&ecirc;n sự kh&oacute; chịu bởi sự n&oacute;ng nực, mặc &aacute;o th&igrave; n&oacute;ng kh&ocirc;ng mặc th&igrave; lạnh. Tuy nhi&ecirc;n với &aacute;o được tạo kiểu 2 d&acirc;y l&agrave; giải ph&aacute;p tốt cho th&uacute; cưng v&agrave;o những ng&agrave;y oi bức. L&agrave;m từ chất liệu vải th&ocirc;ng tho&aacute;ng tạo cảm gi&aacute;c m&aacute;t mẻ, dễ chịu c&ugrave;ng với độ thấm h&uacute;t mồ h&ocirc;i tốt. Với thiết kế 2 d&acirc;y c&ugrave;ng chất liệu mềm mại, &ecirc;m &aacute;i cho c&aacute;c b&eacute; dễ vận động, chạy nhảy, vui đ&ugrave;a thoải m&aacute;i. Sản phẩm c&oacute; t&iacute;nh thời trang, rất thu h&uacute;t bắt mắt bất cứ ai khi nh&igrave;n th&uacute; cưng của bạn mặc chiếc &aacute;o n&agrave;y.</p>', 0, 1, 0, 2),
(34, 'TX5151RM', 'Áo cộc tay thỏ carrot cho chó mèo', 80000, 'images/h6.jpg ', '<p>&Aacute;o cộc tay thỏ carrot với h&igrave;nh th&ugrave; đ&aacute;ng y&ecirc;u, ngộ nghĩnh gi&uacute;p cho th&uacute; cưng của bạn nổi bật hơn mỗi khi đi chơi, đi dạo ngo&agrave;i trời. Thu h&uacute;t được nhiều &aacute;nh nh&igrave;n, g&acirc;y sự ch&uacute; &yacute; từ mọi người l&agrave; ưu điểm lớn của sản phẩm n&agrave;y. Đa dạng m&agrave;u sắc, ph&ugrave; hợp cho nhiều giống ch&oacute; m&egrave;o kh&aacute;c nhau v&agrave; đều c&oacute; sẵn tại cửa h&agrave;ng Pet House</p>', 8, 1, 0, 1),
(35, 'TTXYY5C', 'Thức ăn cho mèo Cat’s Eye 1kg', 85000, 'images/h7.jpg', '<p>Thức ăn cho m&egrave;o Cat&rsquo;s Eye xuất xứ từ thương hiệu nổi tiếng được đ&aacute;nh gi&aacute; tốt nhất cho dinh dưỡng của m&egrave;o. Với c&aacute;c th&agrave;nh phần chất lượng cao c&oacute; trong thức ăn chắc chắn sẽ đem lại những lợi &iacute;ch to lớn đến hệ ti&ecirc;u ho&aacute; của m&egrave;o cưng nh&agrave; bạn.</p>', 0, 1, 0, 1),
(36, 'TX0375GGL', 'Bánh thưởng cho mèo Temptations', 57000, 'images/h8.jpg', '<p>B&aacute;nh thưởng cho m&egrave;o Temptations với 100% dinh dưỡng cho m&egrave;o trưởng th&agrave;nh mang nhiều hương vị thơm ngon ph&ugrave; hợp khẩu vị của c&aacute;c boss nhỏ. Ngo&agrave;i ra, với c&aacute;c th&agrave;nh phần an to&agrave;n, c&oacute; lợi trong b&aacute;nh gi&uacute;p cải thiện sức khoẻ hệ ti&ecirc;u ho&aacute; m&egrave;o cưng hiệu quả.</p>', 6, 1, 0, 1),
(37, 'TT57XXFG', 'Thuốc xổ giun cho chó Drontal – 1 viên ', 36000, 'images/h9.png', '<p>Thuốc xổ giun cho ch&oacute; Drontal &ndash; 24 vi&ecirc;n l&agrave; sản phẩm gi&uacute;p điều trị v&agrave; ph&ograve;ng ngừa c&aacute;c loại giun tr&ograve;n, s&aacute;n d&acirc;y g&acirc;y ảnh hưởng đến đường ruột, sức khoẻ của th&uacute; cưng. Thuốc đem lại an t&acirc;m cho người nu&ocirc;i khi được đặc chế bằng th&agrave;nh phần l&agrave;nh t&iacute;nh, an to&agrave;n với sức khoẻ của c&uacute;n.</p>', 11, 1, 0, 1),
(38, 'TCXY577GG', 'Bột nhổ lông tai cho chó mèo Pettis', 49000, 'images/h10.jpg', '<p>L&ocirc;ng mọc trong tai th&uacute; cưng l&agrave; l&iacute; do khiến tai c&aacute;c boss lu&ocirc;n bị ẩm ướt, dễ sinh ra c&aacute;c loại vi khuẩn g&acirc;y bệnh. V&igrave; vậy, bạn cần vệ sinh l&agrave;m sạch l&ocirc;ng tai th&uacute; cưng chỉ với bột nhổ l&ocirc;ng tai cho ch&oacute; m&egrave;o Pettis.</p>', 7, 1, 0, 1),
(39, 'XYTT51RR', 'Nước Rửa Tai Trị Viêm Bioline 50ml', 90000, 'images/h11.jpg', '<p>Nước rửa tai trị vi&ecirc;m Bioline 50ml l&agrave; sản phẩm d&agrave;nh cho ch&oacute; m&egrave;o gi&uacute;p vệ sinh l&agrave;m sạch tai, ngăn ngừa c&aacute;c bệnh vi&ecirc;m tai khử m&ugrave;i h&ocirc;i hiệu quả. Người nu&ocirc;i c&oacute; thể an t&acirc;m khi cho th&uacute; cưng sử dụng với th&agrave;nh phần nước rửa tai an to&agrave;n, th&acirc;n thiện với sức khoẻ c&aacute;c b&eacute;.</p>', 8, 1, 0, 1),
(40, 'XXTT57CC', 'Gel dinh dưỡng Bioline cho chó ', 135000, 'images/h12.jpg', '<p>Gel dinh dưỡng Bioline l&agrave; sản phẩm dinh dưỡng d&agrave;nh cho c&aacute;c b&eacute; c&uacute;n biếng ăn hay bỏ bữa, mệt mỏi sau khi vừa khỏi bệnh. Với c&aacute;c th&agrave;nh phần dưỡng chất bổ dưỡng, an to&agrave;n trong gel gi&uacute;p c&aacute;c boss nhỏ ăn ngon miệng, hấp thụ tốt hơn.</p>', 0, 1, 0, 1),
(41, 'TC2827UL', 'Thuốc nhỏ gáy trị ve rận hộp vàng', 16000, 'images/h13.jpg', '<p>Thuốc nhỏ g&aacute;y trị ve rận hộp v&agrave;ng huyền thoại, với th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n an to&agrave;n, dịu nhẹ với da th&uacute; cưng. Ngo&agrave;i ra, thuốc gi&uacute;p xua tan đi nỗi lo về c&aacute;c vấn đề bệnh ngo&agrave;i da do ve rận, nấm ghẻ lở g&acirc;y kh&oacute; chịu ở c&aacute;c boss nhỏ.</p>', 9, 1, 0, 1),
(42, 'YK66GGL', 'Thảm chùi chân cho mèo hình bàn chân', 40000, 'images/h16.jpg', '<p>Trong qu&aacute; tr&igrave;nh sinh hoạt h&agrave;ng ng&agrave;y, việc ch&acirc;n m&egrave;o cưng bị b&aacute;m bẩn hay vấn đề vương v&atilde;i c&aacute;t, thức ăn lu&ocirc;n l&agrave; điều mọi người nu&ocirc;i phải đối mặt. Chỉ với thảm ch&ugrave;i ch&acirc;n cho m&egrave;o h&igrave;nh b&agrave;n ch&acirc;n ngộ ngĩnh, sẽ gi&uacute;p xua tan đi nỗi lo đ&oacute; của mọi người.</p>', 7, 1, 0, 1),
(43, 'RM57TTU', 'Lược Comb  chải lông chó mèo ', 59000, 'images/h14.jpg', '<p>Lược Key Pet Comb sở hữu thiết kế hết sức th&ocirc;ng minh, l&agrave; d&ograve;ng sản phẩm đột ph&aacute; trong lĩnh vực chăm s&oacute;c th&uacute; cưng. B&ecirc;n cạnh độ bền cao c&ugrave;ng khả năng chải l&ocirc;ng mềm mượt, lược Key Pet Comb c&ograve;n c&oacute; cơ chế n&uacute;t ấn loại bỏ l&ocirc;ng thừa tiện lợi. Bạn sẽ kh&ocirc;ng cần gỡ l&ocirc;ng thủ c&ocirc;ng nữa, chỉ cần nhấn n&uacute;t l&agrave; l&ocirc;ng b&aacute;m tr&ecirc;n lược sẽ tự động được loại bỏ.</p>', 1, 1, 0, 1),
(44, 'BM21URL', 'Dầu tắm trị nấm cho mèo Fungamyl ', 186000, 'images/h15.jpg', '<p>Dầu tắm Fungamyl 200ml l&agrave; d&ograve;ng sản phẩm gi&uacute;p ngăn ngừa bệnh ve rận, k&iacute; sinh c&ugrave;ng c&aacute;c bệnh tr&oacute;c vảy, rụng l&ocirc;ng do vi khuẩn nấm g&acirc;y n&ecirc;n. Với hiệu quả nhanh ch&oacute;ng, an to&agrave;n đối với sức khoẻ c&aacute;c boss nhỏ n&ecirc;n người nu&ocirc;i c&oacute; thể an t&acirc;m sử dụng. C&aacute;ch sử dụng: Lắc đều dầu tắm trước khi d&ugrave;ng, tắm qua nước rồi xịt một lượng vừa xoa đều l&ecirc;n khắp cơ thể th&uacute; cưng. Để ủ từ 3-5 ph&uacute;t để tinh chất thẩm thấu v&agrave;o cuối c&ugrave;ng tắm sạch lại bằng nước ấm.</p>', 1, 1, 0, 1),
(45, 'CC66HMUI', 'Dây dắt cánh thiên thần siêu dễ thương cho boss', 34000, 'images/h17.jpg', '<p>D&acirc;y dắt c&aacute;nh thi&ecirc;n thần mang lại kiểu d&aacute;ng dễ thương, đ&aacute;ng y&ecirc;u đến cho c&aacute;c boss nhỏ khi đeo. D&acirc;y dắt được l&agrave;m bằng chất liệu vải tổng hợp c&oacute; độ bền cao, kh&ocirc;ng lo b&aacute;m bẩn hay &aacute;m m&ugrave;i h&ocirc;i đem lại sự an t&acirc;m đối với người nu&ocirc;i.</p>', 14, 1, 0, 1),
(46, 'VTUI667', 'Cát đậu phụ Ipet khử mùi cho mèo', 125000, 'images/h18.jpg', '<p>C&aacute;t đậu phụ Ipet được l&agrave;m từ b&atilde; đậu phụ tự nhi&ecirc;n, kh&ocirc;ng tạo bụi mịn. Đ&acirc;y l&agrave; d&ograve;ng sản phẩm cao cấp, c&oacute; khả năng giữ m&ugrave;i v&agrave; h&uacute;t ẩm cực kỳ tuyệt vời. Với những đặc t&iacute;nh vượt trội như vậy, c&aacute;t Ipet hết sức ph&ugrave; hợp để sử dụng trong m&ocirc;i trường căn hộ chung cư hoặc c&aacute;c ph&ograve;ng nhỏ.</p>', 0, 1, 0, 1),
(47, 'AWS78GGT', 'Rọ mõm nhựa cho chó siêu cute', 13000, 'images/h19.jpg', '<p>Khi bạn dẫn c&uacute;n cưng đến nơi c&ocirc;ng cộng, việc đảm bảo an to&agrave;n cho tất cả mọi người v&agrave; th&uacute; cưng l&agrave; v&ocirc; c&ugrave;ng cần thiết. V&igrave; vậy, việc chuẩn bị cho c&uacute;n cưng nh&agrave; bạn một chiếc rọ m&otilde;m nhựa l&agrave; việc cực kỳ thiết yếu. Điều n&agrave;y sẽ đảm bảo an to&agrave;n tối đa khi dẫn c&aacute;c b&eacute; ra ngo&agrave;i đi chơi.</p>', 15, 1, 0, 1),
(48, 'GGL37TTA', 'Đệm cho chó mèo kèm chiếu điều hòa hình tròn ', 175000, 'images/t2.jpg', '<p>Đệm cho ch&oacute; m&egrave;o k&egrave;m chiếu điều ho&agrave; h&igrave;nh trọn với kiểu d&aacute;ng thanh lịch, sang trọng với kh&ocirc;ng gian nằm nghỉ cho th&uacute; cưng thoải m&aacute;i. Đệm được l&oacute;t th&ecirc;m chiếu điều ho&agrave; l&agrave;m th&ocirc;ng tho&aacute;ng chống hầm b&iacute; khi nằm v&agrave;o c&aacute;c m&ugrave;a n&oacute;ng cực k&igrave; tiện lợi.</p>', 17, 1, 0, 1),
(49, 'RTV7UU3', 'Thảm da lộn mát mẻ dành cho chó mèo 80x60cm ', 235000, 'images/t1.jpg', '<p>Thảm da lộn m&aacute;t mẻ 80*60 cm l&agrave; sự lựa chọn ho&agrave;n hảo gi&uacute;p đem đến những giấc ngủ ngon l&agrave;nh đến cho th&uacute; cưng nh&agrave; bạn. Thảm được l&agrave;m bằng chất liệu da lộn c&oacute; độ bền cao, chống thấm, giữ nhiệt tốt tạo cảm gi&aacute;c thư gi&atilde;n khi nghỉ ngơi cho th&uacute; cưng.</p>', 7, 1, 0, 1),
(50, 'TNTZ32Y', 'Set nệm vải lưới 2 size dành cho chó mèo', 196000, 'images/t3.jpg', '<p>Set nệm vải lưới 2 size với độ d&agrave;y lớn, được nhồi b&ocirc;ng d&agrave;y dặn tạo cảm gi&aacute;c bồng bềnh, &ecirc;m &aacute;i khi nằm cho th&uacute; cưng. Nệm c&oacute; kiểu d&aacute;ng nhỏ gọn, thẩm mĩ gi&uacute;p người nu&ocirc;i c&oacute; thể chăm s&oacute;c th&uacute; cưng dễ d&agrave;ng v&agrave; hiệu quả hơn.</p>', 15, 1, 0, 1),
(59, 'fffff', 'dffff', 56777766, 'images/1705482012_2.jpg', '<p>ffgggg</p>', 5, 6, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`) VALUES
(0, 'Tân Vạn Phát'),
(2, 'Tân Vạn Thành'),
(3, 'PetStation'),
(4, 'Mật Pet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `phone`, `address`, `role`, `status`) VALUES
(13, 'Hoàng Anh', '6ff36d548cbcf133960d950223', 'Lê Hoàng Anh', 'lengocnhu220263@gmail.com ', '0933547662', 'Vĩnh Long  ', 1, 1),
(14, 'thịnh', '202cb962ac59075b964b07152d234b70', '', 'danthanhtvu@gmail.com  ', '0933547662 ', 'Trà Vinh   ', 0, 0),
(15, 'Lý Thế Dân', '3050727e4cc0372114a4bf31dd44c4bb', '', 'thedan27@gmail.com', '0922737541', 'Trà Vinh', 1, 0),
(16, 'Lê Minh Viễn', '64268eee5a0835122d29efc9c679fd4d', '', 'vienminh2727@gmail.com', '0927228334', 'Trà Vinh', 1, 0),
(17, 'Lê Hạnh', '827ccb0eea8a706c4c34a16891f84e7b', '', 'lamq9797@gmail.com ', '0933547662', 'Vĩnh Long   ', 1, 0),
(18, 'Doraemon', '827ccb0eea8a706c4c34a16891f84e7b', 'Nobita', 'doremon0708@gmail.com', '099999334', 'Duyên Hải', 0, 0),
(19, 'Nakrok', 'f6443660e9401dd09a8dcc41f160aaed', 'Lâm Khánh Quy', 'lamq9797@gmail.com', '0965134419', 'Trà Vinh', 0, 0),
(20, 'Lan Hoa', 'e10adc3949ba59abbe56e057f20f883e', '', 'lanhoa@gmail.com', '0755331446', 'Trà Vinh', 1, 0),
(21, 'Lê Thành Minh', '827ccb0eea8a706c4c34a16891f84e7b', '', 'thanhminh08@gmail.com', '0933511244', 'Trà Vinh', 1, 0),
(22, 'KhanhQuy', '827ccb0eea8a706c4c34a16891f84e7b', 'Lâm Khánh Quy ', 'lamq9797@gmail.com', '0999999998', 'Trà Vinh', 1, 0),
(24, 'NgocHan', '827ccb0eea8a706c4c34a16891f84e7b', 'Lê Ngọc Hân', 'ngochan0404@gmail.com', '0985154443', 'Bình Thuận', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `nd` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `rb3` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`cate_id`),
  ADD KEY `ncc` (`sup_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `nd` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `rb3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `ncc` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
