-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 23, 2023 lúc 05:07 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shoeshe`
--
CREATE DATABASE IF NOT EXISTS db_shoeshe;
USE db_shoeshe;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids'),
(4, 'Soccer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(4, 14),
(4, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Nike Court Vision Low', 1900000, 'Bạn đang thích kiểu dáng cổ điển của bóng rổ thập kỷ 80, nhưng cũng say mê bởi văn hóa nhanh chóng của môn thể thao ngày nay? Đây là đôi giày mới của Nike - Nike Court Vision Low. Những lớp phủ và đường may sắc sảo của nó được lấy cảm hứng từ cú ném hook của bóng rổ cổ điển, trong khi cổ giày thấp và thiết kế siêu thời trang mang lại diện mạo thanh lịch, thoải mái cho mọi ngày.', 'men01.jpg'),
(2, 'Air Jordan 1 Low', 3650000, 'Lấy cảm hứng từ phiên bản gốc ra mắt vào năm 1985, Air Jordan 1 Low mang đến vẻ ngoại hình sạch sẽ và cổ điển, quen thuộc nhưng luôn mới mẻ. Với thiết kế biểu tượng đi kèm hoàn hảo với mọi trang phục, đôi giày này đảm bảo bạn luôn nổi bật và phong cách.', 'men02.jpg'),
(3, 'Nike Air Force 1 \'07', 1750000, 'Ánh sáng vẫn tỏa sáng trong Nike Air Force 1 \'07, phiên bản gốc của bóng rổ mang đến sự mới mẻ cho những điều bạn biết rõ nhất: các lớp phủ được may chắc chắn, hoàn thiện sạch sẽ và một lượng flash hoàn hảo để làm cho bạn tỏa sáng.', 'men03.jpg'),
(4, 'Jordan Stadium 90', 1450000, 'Thoải mái là quan trọng nhất, nhưng điều đó không có nghĩa bạn phải hy sinh phong cách. Lấy cảm hứng thiết kế từ AJ1 và AJ5, Stadium 90 sẵn sàng cho việc mặc hàng ngày. Phần đầu giày được làm từ da tổng hợp và vải, kết hợp hộp ngón chân của AJ1 và chi tiết lửa từ AJ5. Công nghệ đệm Nike Air giúp mỗi bước chân trở nên dễ dàng như phong cách của bạn.', 'men04.jpg'),
(5, 'Nike Dunk Low Retro', 2350000, 'Được tạo ra cho sân đấu bóng rổ nhưng mang đến đường phố, biểu tượng bóng rổ thập kỷ 80 tái xuất với những chi tiết cổ điển và phong cách hồi tưởng. Cổ giày được đệm mềm, thiết kế thấp cắt và đế giữa bằng bọt giúp bạn có thể mang theo trò chơi của mình mọi nơi với sự thoải mái.', 'men05.jpg'),
(6, 'Air Jordan 1 Low SE', 1950000, 'Thấp cổ nhưng không bao giờ thấp tầm. Lấy cảm hứng từ phiên bản gốc xuất hiện vào năm \'85, đôi AJ1 này mang đến vẻ ngoại hình sạch sẽ và cổ điển, quen thuộc nhưng luôn mới mẻ. Sự kết hợp giữa lớp phủ da full-grain và lớp lót satin tạo nên vẻ ngoại hình mềm mại và sang trọng cho đôi giày này.Chúng đảm bảo độ bền và thoải mái với đường may theo truyền thống và logo Swoosh cổ điển. Khi bạn mang chúng, như là một ván đấu tennis đã kết thúc', 'women01.jpg'),
(7, 'Nike Air Force 1 \'07', 1750000, 'Vẻ rạng ngời vẫn tiếp tục trong Nike Air Force 1 \'07, biểu tượng bóng rổ mang đến sự mới mẻ cho những gì bạn biết rõ nhất: da sáng bóng, màu sắc táo bạo và lượng flash hoàn hảo để làm cho bạn tỏa sáng  và đế có độ ma sát cao sẽ đồng hành cùng bạn qua từng thời điểm nghỉ. Và dù chúng trông tuyệt vời ngay từ hộp, chúng vẫn giữ được vẻ ngầu ngày cả khi có vết xước và trầy trên bề mặt. Thực tế.', 'women02.jpg'),
(8, 'Nike Air Force 1 \'07 NN', 3350000, 'Biểu tượng bóng rổ này mang đến ý nghĩa mới cho cụm từ \"hơi mới\". Chất liệu vải nhẹ nhàng, một bó hoa màu xuân và chi tiết thêu mang đến không khí mùa hè cho những điều bạn đã biết và yêu thích: đệm Air, kiến trúc cổ điển và phong cách suốt những ngày dài.', 'women03.jpg'),
(9, 'Nike Air Force 1 Shadow', 1850000, 'Nike Air Force 1 Shadow mang đến một sự đổi mới vui nhộn cho thiết kế cổ điển của bóng rổ. Sử dụng cách tiếp cận lớp lớp, kéo dài thương hiệu và làm phình đế giữa, nó làm nổi bật DNA của AF-1 với một diện mạo mới, táo bạo.', 'women04.jpg'),
(10, 'Nike Cortez', 2750000, 'Một từ: truyền thống. Từ chạy dài thừa kế đến hiện tượng thời trang, sức hấp dẫn retro, đế giữa mềm như bọt và chi tiết nhìn như đang nằm xem thấy mang lại sự đặc sắc qua từng thập kỷ. Phiên bản này mang đến những màu sắc dễ phối hợp với không khí cổ điển.', 'women05.jpg'),
(15, 'Nike Tiempo Legend 10', 2430000, 'Ngay cả những huyền thoại cũng tìm cách phát triển. Được tạo ra để đưa trình độ chơi của bạn lên một tầm cao mới, phiên bản mới nhất của những đôi giày Academy này sử dụng chất liệu da tổng hợp FlyTouch Lite hoàn toàn mới. Mềm mại hơn so với da tự nhiên và được làm đôi lớp với lớp lưới, nó ôm sát chân của bạn, tăng khả năng thoáng khí và không làm chúng co rút quá mức, giúp bạn chơi thoải mái và kiểm soát nhịp độ trận đấu của mình.', 'menfb02.jpg'),
(11, 'Nike Court Borough', 2950000, 'Thêm một chút sức mạnh của hoa vào ngày của bạn với đôi giày sneaker phiên bản đặc biệt này. Được làm để chịu được thử thách, huyền thoại \"được tái tạo\" này kết hợp giữa các vật liệu bền bỉ và một thiết kế vô thời hạn để tạo ra phong cách cổ điển một cách hoàn toàn mới. Ngoài ra, hộp ngón chân và giữa chân được thiết kế lại giúp chân bạn có thêm không gian khi bạn chạy, nhảy và chơi.', 'kid01.jpg'),
(12, 'Nike Air Force 1 LV8', 800000, 'Vẫn ngầu như lúc nó xuất hiện lần đầu cách đây hơn 40 năm, AF-1 là một biểu tượng cổ điển mà bạn có thể tin tưởng. Thiết kế da bền bỉ, đệm Air và đế có độ ma sát cao sẽ đồng hành cùng bạn qua từng thời điểm nghỉ. Và dù chúng trông tuyệt vời ngay từ hộp, chúng vẫn giữ được vẻ ngầu ngày cả khi có vết xước và trầy trên bề mặt. Thực tế, chúng có thể trở nên thậm chí còn tốt hơn.', 'kid02.jpg'),
(13, 'Nike Court Legacy', 900000, 'NikeCourt Legacy mang đến phong cách chắt chiu từ văn hóa tennis. Chúng đảm bảo độ bền và thoải mái với đường may theo truyền thống và logo Swoosh cổ điển. Khi bạn mang chúng, như là một ván đấu tennis đã kết thúc - đó là trò chơi, set và trận đấu.', 'kid03.jpg'),
(14, 'Nike Mercurial Vapor 15', 7300000, 'Sân đấu là của bạn khi bạn buộc dây giày vào Vapor 15 Elite FG. Chúng tôi đã thêm một đơn vị Zoom Air, được thiết kế đặc biệt cho bóng đá, và texture có độ ma sát cao ở phía trên để có cảm giác chạm tuyệt vời, giúp bạn thống trị trong những phút cuối cùng của trận đấu - khi đó là quan trọng nhất. Cảm nhận tốc độ bùng nổ khi bạn lao vụt xung quanh sân, thực hiện các pha chơi quyết định với tốc độ và nhịp độ. Tốc độ nhanh chóng là ở đây.', 'menfb01.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user`, `password`, `role`) VALUES
('hung', '$2y$10$hBab6AJ.GwXpaJNBaO7CSegUS9Fmqixi6B5yOCDlRyBETUkulQQLa', 0),
('dat', '$2y$10$rROYmPHgurPaohf3ZHA4CeqRq5efRpsk4htaPTyFMJv41QwKxRhRi', 0),
('admin', '$2y$10$BG1lagPBy3YLVczTR6n8KuOLhkfsOGVBa7l/qSgSjaYEscRw0ELWW', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
