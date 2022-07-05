-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 05:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_mau`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `bill_address` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `bill_tell` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dat_hang` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0.Chờ xác nhận\r\n1. Đang giao\r\n2. Giao hàng thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill_name`, `bill_address`, `bill_tell`, `ghi_chu`, `ngay_dat_hang`, `tong_tien`, `trang_thai`) VALUES
(71, 'Nguyễn thị Quỳnh ', 'Đồi 1- Hà Nội', '0348048435', '', '06:11:pm 20/10/2021', 4520000, 1),
(73, 'Nguyễn thị Quỳnh ', 'Đồi 1- Hà Nội', '0348048435', '', '06:12:pm 20/10/2021', 1040000, 2),
(74, 'Hoàng Đức', 'Đông Sơn-Hà Nội', '0348048435', '', '06:14:pm 20/10/2021', 1300000, 2),
(76, 'Nguyễn thị Quỳnh ', 'Đồi 1- Hà Nội', '0348048435', 'nhanh nha', '11:45:am 26/10/2021', 960000, 1),
(78, 'Bình', 'Đông Sơn-Hà Nội', '0348048435', 'drgdregregre', '09:29:am 06/02/2022', 1010000, 0),
(79, 'Nguyễn thị Quỳnh Anh', 'Yên Kiện-Hà Nội', '0348048435', 'retrtgrgreg', '09:31:am 06/02/2022', 790000, 0),
(80, 'Nguyễn thị Quỳnh Anh', 'Yên Kiện-Hà Nội', '0348048435', 'gregdfgdf', '09:35:am 06/02/2022', 3110000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `noi_dung` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `ngay_binh_luan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `noi_dung`, `id_user`, `id_products`, `ngay_binh_luan`) VALUES
(128, 'xinh thế nhè', 10, 33, '08:02:pm 01/10/2021'),
(134, 'hello', 10, 30, '06:39:pm 02/10/2021'),
(135, 'xin thế', 10, 29, '06:42:pm 02/10/2021'),
(137, 'xinh bthuong', 10, 32, '08:21:pm 02/10/2021'),
(139, 'helo người đẹp', 10, 32, '08:21:pm 02/10/2021'),
(140, 'áo xấu vl', 10, 35, '08:21:pm 02/10/2021'),
(141, 'helo người đẹp', 10, 31, '02:46:pm 03/10/2021'),
(144, 'gái đẹp thế', 4, 33, '05:13:am 17/10/2021'),
(145, 'áo đẹp quá ak', 4, 33, '05:13:am 17/10/2021'),
(146, 'áo đẹp lắm', 4, 32, '05:13:am 17/10/2021'),
(147, 'hello', 4, 31, '05:14:am 17/10/2021'),
(148, 'áo đẹp lắm ak', 4, 34, '05:14:am 17/10/2021'),
(149, 'áo đẹp lắm', 4, 35, '05:15:am 17/10/2021'),
(151, 'gái đẹp thế', 10, 39, '07:17:pm 18/10/2021'),
(152, 'Áo mặc vừa lắm', 12, 33, '08:39:pm 18/10/2021'),
(153, 'helo người đẹp', 11, 33, '04:21:pm 19/10/2021'),
(154, 'chị đẹp quá', 11, 43, '06:13:pm 20/10/2021'),
(155, 'chất đẹp lắm nha', 11, 35, '06:13:pm 20/10/2021'),
(156, 'gái đẹp thế', 4, 41, '11:46:am 26/10/2021'),
(157, 'gái đẹp thế', 10, 41, '05:02:pm 05/11/2021'),
(158, 'hello', 10, 35, '08:01:pm 23/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_hoa_don` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `id_products` int(11) NOT NULL,
  `img` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_hoa_don`, `id_products`, `img`, `user`, `price`, `so_luong`, `thanh_tien`, `id_bill`) VALUES
(92, 4, '41L', 41, './public/assets/img/pro3.webp', 'Nguyễn thị Quỳnh ', 530000, 4, 2120000, 71),
(93, 4, '43L', 43, './public/assets/img/pro11.webp', 'Nguyễn thị Quỳnh ', 480000, 5, 2400000, 71),
(95, 4, '35L', 35, './public/assets/img/pro10.webp', 'Nguyễn thị Quỳnh ', 260000, 4, 1040000, 73),
(96, 11, '35L', 35, './public/assets/img/pro10.webp', 'Hoàng Đức', 260000, 5, 1300000, 74),
(99, 4, '32M', 32, './public/assets/img/pro7.webp', 'Nguyễn thị Quỳnh ', 480000, 2, 960000, 76),
(101, 10, '41L', 41, './public/assets/img/pro3.webp', 'Bình', 530000, 1, 530000, 78),
(102, 10, '43L', 43, './public/assets/img/pro11.webp', 'Bình', 480000, 1, 480000, 78),
(103, 14, '35L', 35, './public/assets/img/pro10.webp', 'Nguyễn thị Quỳnh Anh', 260000, 1, 260000, 79),
(104, 14, '41L', 41, './public/assets/img/pro3.webp', 'Nguyễn thị Quỳnh Anh', 530000, 1, 530000, 79),
(105, 14, '43L', 43, './public/assets/img/pro11.webp', 'Nguyễn thị Quỳnh Anh', 480000, 1, 480000, 80),
(106, 14, '41L', 41, './public/assets/img/pro3.webp', 'Nguyễn thị Quỳnh Anh', 530000, 3, 1590000, 80),
(107, 14, '35L', 35, './public/assets/img/pro10.webp', 'Nguyễn thị Quỳnh Anh', 260000, 4, 1040000, 80);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`) VALUES
(2, 'Chân Váy'),
(4, 'Áo Khoác'),
(5, 'Áo'),
(11, 'Đầm'),
(18, 'Quần Công Sở'),
(20, 'Váy Đầm Công Sở'),
(31, 'Váy Đầm Công Sở dsfd');

-- --------------------------------------------------------

--
-- Table structure for table `img_products`
--

CREATE TABLE `img_products` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_products`
--

INSERT INTO `img_products` (`id`, `id_products`, `image`) VALUES
(13, 26, 'detai1.2.webp'),
(14, 26, 'detai1.3.webp'),
(15, 26, 'detai1.4.webp'),
(16, 26, 'detai1.webp'),
(17, 27, 'deetai2.2.webp'),
(18, 27, 'deetai2.3.webp'),
(19, 27, 'detai2.1.webp'),
(20, 27, 'detai2.4.webp'),
(21, 27, 'detai2.webp'),
(22, 28, 'detai3.1.webp'),
(23, 28, 'detai3.2.webp'),
(24, 28, 'detai3.webp'),
(25, 29, 'detai4.1.webp'),
(26, 29, 'detai4.2.webp'),
(27, 29, 'detai4.3.webp'),
(28, 29, 'detai4.webp'),
(29, 30, 'detai5.1.webp'),
(30, 30, 'detai5.3.webp'),
(31, 30, 'detai5.4.webp'),
(32, 30, 'detai5.5.webp'),
(33, 30, 'detai5.webp'),
(34, 31, 'detai6.1.webp'),
(35, 31, 'detai6.2.webp'),
(36, 31, 'detai6.3.webp'),
(37, 31, 'detai6.4.webp'),
(38, 31, 'detai6.webp'),
(39, 32, 'detai7.1.webp'),
(40, 32, 'detai7.2.webp'),
(41, 32, 'detai7.3.webp'),
(42, 32, 'detai7.4.webp'),
(43, 32, 'detai7.5.webp'),
(44, 32, 'detai7.webp'),
(45, 33, 'detai8.1.webp'),
(46, 33, 'detai8.2.webp'),
(47, 33, 'detai8.3.webp'),
(48, 33, 'detai8.4webp.webp'),
(49, 33, 'detai8.webp'),
(50, 34, 'detai9.1.webp'),
(51, 34, 'detai9.2.webp'),
(52, 34, 'detai9.5.webp'),
(53, 34, 'detai9.webp'),
(54, 35, 'detai10.2.webp'),
(55, 35, 'detai10.3.webp'),
(56, 35, 'detai10.4.webp'),
(57, 35, 'detai10.webp'),
(58, 35, 'pro10.1.webp'),
(59, 36, 'blog2png.png'),
(60, 37, '244662968_4179789968816366_5055210922193364731_n.jpg'),
(61, 38, 'blog2png.png'),
(62, 39, 'detai3.1.webp'),
(63, 39, 'detai3.2.webp'),
(64, 39, 'detai3.webp'),
(65, 40, 'detai3.1.webp'),
(66, 40, 'detai3.2.webp'),
(67, 40, 'detai3.webp'),
(68, 40, 'pro3.webp'),
(69, 41, 'detai3.1.webp'),
(70, 41, 'detai3.2.webp'),
(71, 41, 'detai3.webp'),
(72, 41, 'pro3.webp'),
(73, 42, 'deitai11.webp'),
(74, 42, 'detai4.1.webp'),
(75, 42, 'detai4.2.webp'),
(76, 42, 'detai4.3.webp'),
(77, 42, 'detai4.webp'),
(78, 43, 'deitai11.webp'),
(79, 43, 'detai11.1.webp'),
(80, 43, 'detai11.2.webp'),
(81, 43, 'detai11.3.webp'),
(82, 43, 'detai11.4.webp'),
(83, 44, 'detai5.4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ma_sp` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `img` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `mieu_ta` varchar(325) COLLATE utf8_unicode_ci NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `id_danh_muc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `ma_sp`, `gia`, `so_luong`, `img`, `mieu_ta`, `luot_xem`, `id_danh_muc`) VALUES
(26, 'Đầm xòe cổ đan tông phối nút gỗ', ' HL16-38', 500000, 24, './public/assets/img/pro1.webp', '- Chất liệu: Linen bột\r\n- Màu sắc: Xanh rêu trắng\r\nNếu đã nhàm chán với những chiếc đầm đơn sắc đến sở làm, sao nàng không thử chiếc đầm xòe họa tiết HL16-38 này của K&K Fashion. Buổi sáng không biết mặc gì diện ngay “em ấy”, nàng sẽ có vẻ ngoài chỉn chu ngay tức thì để đến công sở. Nhờ vào kiểu dáng cổ đan tông thanh lịch,', 13, 20),
(27, 'Đầm thun công sở dáng ôm xoắn ngực', ' HL16-30', 280000, 21, './public/assets/img/pro2.webp', '- Chất liệu: Thun cotton\r\n- Màu sắc: Họa tiết nhiều màu\r\nGiống như chiếc đầm thun ôm HL16-29, nhưng phiên bản này được K&K Fashion triển khai trên nền họa tiết tie dye màu sắc tươi sáng hơn, thích hợp cho những cô nàng ưa chuộng sự nổi bật. Form ôm tôn dáng, kết hợp ăn ý cùng chất liệu thun cotton co giãn vừa giúp khoe trọn', 26, 2),
(29, 'Đầm đen cổ đan tông viền trắng', 'KK105-11', 480000, 24, './public/assets/img/pro4.webp', '- Chất liệu: Thun tuyết\r\n- Màu sắc: Nền đen viền chỉ trắng\r\nBên cạnh những mẫu đầm cổ tròn, cổ sơ mi quen thuộc, thì nay chiếc đầm KK105-11 mới nhất của K&K Fashion được thiết kế với chi tiết cổ đan tông sẽ giúp nàng trở nên thanh lịch và sang trọng hơn rất nhiều nơi công sở. Những đường chỉ trắng tinh tế chạy dọc theo từng', 13, 11),
(30, 'Áo blazer nữ trắng tay dài', 'AK10-11', 470000, 50, './public/assets/img/pro5.webp', '- Chất liệu: Bố Cotton\r\n- Màu sắc: Trắng\r\nVới những cô nàng công sở, một chiếc blazer trắng chắc chắn là món đồ không thể thiếu bởi có thể nói, đây chính là item “phối gì cũng đẹp”. Áo blazer AK10-11 được may bằng chất liệu bố cotton - loại vải có những ưu điểm của cả hai chất liệu này: lên form tốt, ít nhăn, dễ giặt ủi, mề', 17, 2),
(31, 'Đầm họa tiết tay lỡ cổ vuông', 'KK106-10', 430000, 20, './public/assets/img/pro6.webp', '- Chất liệu: Sẹc lanh\r\n- Màu sắc: Họa tiết nhiều màu\r\nHọa tiết có hoa, có lá, có cả động vật của chiếc đầm KK106-10 này tạo ấn tượng mạnh mẽ đối với các cô nàng K&K Fashion. Chiếc đầm họa tiết KK106-10 được thiết kế dáng hơi suông nhẹ, cổ vuông, phần tay lỡ có bo thun tạo độ phồng duyên dáng phù hợp với mọi vóc dáng của các', 88, 11),
(32, 'Đầm xòe hai dây họa tiết hoa', 'HL15-35', 480000, 13, './public/assets/img/pro7.webp', '- Chất liệu: Gấm\r\n- Màu sắc: Nền xanh đen họa tiết hoa nhiều màu\r\nMỗi khi hè về, chưa một họa tiết nào có thể “soán ngôi” hoa. Và chiếc đầm hoa dáng xòe HL15-35 mới ra mắt của K&K Fashion là gợi ý tuyệt vời để nàng bổ sung vào list danh sách thời trang mùa hè của các chị em. Với những đường nét cắt cúp tạo phom dáng trẻ tru', 83, 20),
(33, 'Đầm xòe hoa cổ sen tay lỡ', 'KK105-08', 440000, 20, './public/assets/img/pro8.webp', '- Chất liệu: Lụa\r\n- Màu sắc: Họa tiết hoa nhiều màu\r\nThời tiết mùa hè oi bức khó chịu, thì mẫu đầm xòe họa tiết hoa KK105-08 là một lựa chọn hợp lý cho các cô nàng công sở. Họa tiết, màu sắc nổi bật như bức tranh sơn dầu, trên chất liệu vải lụa, mềm mại, thoáng mát, dễ chịu, mang đến cảm giác nhẹ nhàng như khí trời mùa đông', 130, 11),
(34, 'Chân váy chữ A đuôi cá đính nút', ' CV02-35', 320000, 29, './public/assets/img/pro9.webp', '	\r\nTrang chủ / Thời trang công sở / Chân váy / Chân váy chữ A đuôi cá đính nút\r\nChân váy chữ A đuôi cá đính nút\r\nMã SP : CV02-35\r\n\r\n320.000 ₫\r\nSize S M L XL\r\n1\r\n Bảng size\r\n \r\nVui lòng chọn Size\r\nMÔ TẢ SẢN PHẨM\r\n- Chất liệu: Tweed\r\n- Màu sắc: Họa tiết nhiều màu\r\nChân váy chữ A CV02-35 được thiết kế trên nền chất liệu Tweed,', 135, 11),
(35, 'Chân váy bút chì công sở màu đe', 'CV03-03', 260000, 14, './public/assets/img/pro10.webp', '- Chất liệu: Thun Pcc\r\n- Màu sắc: Đen\r\nChân váy bút chì công sở màu đen cv03-03 có ưu điểm giúp tôn vòng 3 của phụ nữ vô cùng quyến rũ, gợi cảm. Thiết kế được may từ chất liệu vải thun PC cao cấp có độ dày dặn vừa phải, mềm mại và thân thiện với mọi làn da, đặc biệt là có độ co giãn tốt giúp người mặc luôn cảm thấy thoải má', 71, 2),
(41, 'Đầm đỏ chữ A cổ sơ mi tay lỡ', 'KK104-34', 530000, 24, './public/assets/img/pro3.webp', '- Chất liệu: Đũi - Màu sắc: Đỏ Sắc đỏ nồng nàn chính là gam màu không thể thiếu trong mùa Year End Party của K&K Fashion. Mặc dù rực rỡ táo bạo, nhưng màu đỏ sẽ mang lại cho quý cô một bề ngoài đầy hợp thời và phong cách. Hãy thử một chiếc váy chữ A KK104-34 với phom dáng đơn giản, vừa vặn, nhưng lại tỉ mỉ trong từng đườn', 28, 5),
(43, 'Đầm lụa dáng ôm sát nách eo xếp ly', 'KK104-34', 480000, 63, './public/assets/img/pro11.webp', '- Chất liệu: Lụa mango\r\n- Màu sắc: Xanh\r\nMẫu đầm lụa KK106-06 trong BST mới lần này K&K Fashion tin chắc sẽ làm hội chị em đổ gục. Chiếc đầm liền đa-zi-năng vừa đủ sang trọng đến những buổi tiệc, và cũng đảm bảo độ thanh lịch đến công sở, giúp nàng đẹp mọi hoàn cảnh mà chẳng mất nhiều thời gian chuẩn bị. Đầm ôm cao cấp được', 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `img` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `vai_tro` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `user`, `email`, `mat_khau`, `dia_chi`, `tel`, `img`, `vai_tro`) VALUES
(4, 'Nguyễn thị Quỳnh ', 'qanhh962k@gmail.com', '29102001', 'Đồi 1- Hà Nội', 348048435, './public/assets/img/t.yo.jpg', 0),
(10, 'Bình', 'binhndph15107@fpt.edu.vn', 'binhboong', 'Đông Sơn-Hà Nội', 348048435, './public/assets/img/120353086_727066621205488_677302150378010326_n.jpg', 1),
(11, 'Hoàng Đức', 'binhnguyen@gmail.com', '123123', 'Đông Sơn-Hà Nội', 348048435, './public/assets/img/120133645_657744038490519_8590915236820805041_n.jpg', 0),
(12, 'Hoàng Tử cá chép', 'ducbinh123@gmail.com', '123123', 'Yên Kiện-Hà Nội', 348048435, './public/assets/img/qa.jpg', 0),
(13, 'Nguyễn thị Quỳnh Anh', 'qanh@gmail.com', '123123', 'Yên Kiện-Hà Nội', 348048435, './public/assets/img/detai5.5.webp', 0),
(14, 'Nguyễn thị Quỳnh Anh', 'binhnguyen@gmail.com', 'binhboong', 'Yên Kiện-Hà Nội', 348048435, './public/assets/img/qa.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
