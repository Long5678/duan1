-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 21, 2023 lúc 12:52 PM
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
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Cà Phê Hạt'),
(2, 'Cà phê rang xay'),
(5, 'Cà phê hòa tan'),
(6, 'Cà Phê Chuyên Biệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `date_comment` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pass` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `user`, `phone`, `email`, `address`, `pass`, `role`) VALUES
(0, 'admin', NULL, 'truongvien16042004@gmail.com', NULL, '12345678', 1),
(3, 'vanvien', NULL, 'vientvpd08408@fpt.edu.vn', NULL, '1234', 0),
(4, 'vien123', NULL, 'abc@gmail.com', NULL, '12345', 0),
(5, 'vien1111', NULL, 'xyz@gmail.com', NULL, '123456', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_dates` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_` int(10) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` varchar(255) NOT NULL,
  `NSX` varchar(255) NOT NULL,
  `dacdiem` varchar(255) NOT NULL,
  `hsd` varchar(255) NOT NULL,
  `khoiluong` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `img`, `NSX`, `dacdiem`, `hsd`, `khoiluong`, `discount`, `view`) VALUES
(11, 6, 'Legend Roman', 'Tuyệt phẩm cà phê Roman rất độc đáo và đầy tinh tế, thể chất đậm, tròn vị cùng mùi khói nhẹ, đặc trưng xen lẫn chút hương vị trái cây tươi tạo nên tách cà phê tuyệt hảo, đậm phong vị Espresso nguyên bản.', 550080, 'legend roman.jpg', 'Trung Nguyên', 'Phong vị Espresso, xen lẫn hương vị trái cây tươi', '1 năm', '200G', 0, 0),
(12, 6, 'Cà phê LEGEND', 'Tuyệt phẩm Cà Phê LEGEND là sự giao thao giữa “trời, đất và lòng đam mê của con người” từ “vùng đất Tây Nguyên huyền thoại” dâng lên người yêu cà phê cái “hương vị diệu kỳ đặc sắc” giúp khơi gợi nguồn cảm hứng bất tận, những giây phút sáng tạo xuất thần, ', 800000, '5000519_1.jpg', 'Trung Nguyên', 'LEGEND là cà phê chồn được sản xuất bằng phương pháp \"Lên men sinh học\", sản phẩm chỉ có duy nhất ở Trung Nguyên.', '2 năm', 'Hộp 225gr.', 0, 0),
(13, 6, 'Cà phê sáng tạo 8', 'Từ những ý niệm trên, cùng sự thấu hiểu sâu sắc về cà phê trong vai trò hạt nhân sáng tạo, các chuyên gia của Tập đoàn Trung Nguyên đã dày công nghiên cứu và bào chế thành công dòng sản phẩm CÀ PHÊ SÁNG TẠO – Cà phê tuyệt ngon, chuyên cho não sáng tạo để ', 239695, '5000125-1.jpg', 'Trung Nguyên.', 'Là một sản phẩm đặc biệt trong dòng Cà phê Sáng tạo của Trung Nguyên. Có hương thơm đầm, thơm rất lâu với hậu vị đậm và êm. Là một sự cân bằng hoàn hảo giữa hương và vị.', '2 năm', 'Hộp 250gr.', 0, 0),
(15, 5, 'Nescafe 3 in 1', 'Cà phê rang xay hòa tan NESCAFÉ 3in1 Đậm Vị Cà Phê được sản xuất từ những hạt cà phê nguyên chất được tuyển chọn kỹ càng, mang đến tách cà phê chuẩn gu đặc trưng với hương vị mạnh mẽ hòa quyện cùng sữa béo thơm ngon đến giọt cuối cùng.', 56000, 'sp chinh.jpg', 'Nestle', 'Robusta đậm đà đặc trưng cùng hương nồng nàn từ hạt Arabica! ', '1 năm', '340g', 0, 0),
(16, 5, 'Cà phê hòa tan G7', 'Hương vị khác biệt, đậm đà, hương thơm độc đáo quyến rũ với tinh túy từ những hạt cà phê nguyên chất chọn lọc cùng công nghệ hiện đại cho ra ly cà phê đúng chuẩn giúp sảng khoái tinh thần, tập trung làm việc và học tập. Sản phẩm chất lượng thương hiệu G7', 25000, 'sp1.jpg', 'Trung Nguyên', 'Với công nghệ rang & chế biến tại Buôn Mê Thuột. Duy nhất Trung Nguyên sở hữu công nghệ từ Châu Âu và bí quyết không thể sao chép', '1 năm', '21 gói x 16g', 0, 0),
(17, 5, 'Cà phê Gu mạnh 3 in 1', 'Cà phê G7 Gu Mạnh X2 hội tụ đủ những yếu tố đặc biệt như nguyên liệu tốt nhất, sản xuất trên công nghệ hàng đầu, bí quyết không thể sao chép, đã làm nên một loại cà phê thượng hạng và là niềm tự hào của Trung Nguyên bởi có chất lượng tuyệt hảo, đáp ứng đư', 55000, '5000069_3.jpg', 'Trung Nguyên', 'Cà phê hòa tan có hương vị mạnh gấp đôi các loại cà phê hòa tan thông thường.', '2 năm.', 'Hộp 12 gói x 25gr', 0, 0),
(18, 2, 'Cà phê bột mixphin', 'Cafe bột là loại cafe được rang xay từ hạt cafe chín.Trong giới những người yêu thích cà phê thì cafe bột là một loại cà phê được ưa chuộng rất nhiều nhất tại Việt Nam. Mỗi buổi sáng thức dậy, thưởng thức một ly cà phê nóng sẽ giúp tinh thần tỉnh táo hơn.', 150000, 'cà phê bột mixphin.jpg', ' Coffee&Tea Việt Nam', 'hạt Arabica chọn lọc từ Cầu Đất- Đà Lat, hạt Robusta chọn lọc từ Đắk lắk', '2 năm', '500gr/gói', 0, 0),
(19, 2, 'Cà phê bột morning', '100% hạt cà phê Việt Nam rang xay. Cà phê bột Morning được Coffee&Tea Việt Nam tuyển chọn với quy trình quản trị chất lượng nghiêm ngặt từ đầu vào nguyên liệu, nhằm mang đến cho khách hàng những sản phẩm chất lượng nhất.', 160000, 'cà phê bột morning.jpg', ' Coffee&Tea Việt Nam', 'đậm đà, đắng, hương socola, vị truyền thống', '2 năm', '1000gr/gói', 0, 0),
(20, 2, 'Cà phê Premium Blend ', 'Cà phê rang xay Premium Blend là một sản phẩm cà phê đặc biệt được chắt lọc từ những vùng nguyên liệu ngon nhất thế giới kết hợp công nghệ sản xuất hàng đầu và phương thức rang xay độc đáo không thể sao chép của Trung Nguyên, mang đến hương vị quyến rũ, đ', 180000, '5000097-2.jpg', 'Trung Nguyên', 'Nước pha màu nâu đậm, mùi thơm đặc trưng, bền, đầm, vị đậm đà, hàm lượng Caffeine: ≥ 1 %.', '2 năm', 'Lon 425gr.', 0, 0),
(21, 1, 'Cà Phê Cherry', 'Hạt cà phê Cherry mang một đặc điểm và hương vị rất khác lạ của một loài cây trưởng thành dưới nắng và gió của Cao Nguyên.', 55000, 'cherry.jpg', ' Phúc Long Heritage', 'Hạt cà phê vàng, sáng bóng rất đẹp. Khi pha tạo ra mùi thơm thoang thoảng, đặc biệt là vị chua của cherry tạo ra một cảm giác thật sảng khoái.', '2 năm', '200g', 0, 0),
(22, 1, 'Legend Success 1', 'Việc chọn lựa nguyên liệu là 01 bí quyết, cùng với nghệ thuật rang tạo nên sản phẩm cà phê Năng Lượng đượm hương thơm, thoáng mùi khói nhẹ, đậm vị cà phê nguyên bản, hậu vị đậm.', 150000, '2-2-768x768.jpg', 'Trung Nguyên', 'Thể chất đậm, mạnh, gu truyền thống', '2 năm', '1kg/bịch', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_product` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Fk_product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
