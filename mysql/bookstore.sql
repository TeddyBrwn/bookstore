CREATE DATABASE bookstore CHARACTER SET utf8 COLLATE utf8_general_ci;
USE bookstore;


CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `tensach` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `imgURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `book` (`id`, `tensach`, `gia`, `mota`, `imgURL`) VALUES
(8, 'Ăn xanh để khoẻ', 60000, 'Sức khoẻ', 'combo-an-xanh-song-lanh.jpg'),
(9, 'Dinh dưỡng xanh', 150000, 'Sức khoẻ', 'combo-dinh-duong-than-duoc-xanh.jpg'),
(10, 'Ma buồn lưu manh', 60000, 'Truyện', 'ma-bun-luu-manh-mt.jpg'),
(11, 'Lược sử loài người', 140000, 'Lịch sử, Tiến hóa của loài người', 'combo-luoc-su-loai-nguoi.jpg'),
(12, 'Gia đình', 70000, 'Gia đình', 'bo-sach-500-cau-chuyen-dao-duc.jpg'),
(13, 'Hạnh phúc sáng tạo', 70000, 'Cảm xúc, ý chí', 'combo-hanh-phuc-sang-tao.jpg'),
(14, 'Đường mây trong cõi mộng', 80000, 'Tôn giáo, tâm linh', 'duong-may-trong-coi-mong.jpg'),
(15, 'Đường mây trên đất hoa', 140000, 'Tôn giáo, tâm linh', 'duong-may-tren-dat-hoa.jpg'),
(16, 'Tính lương thiện', 40000, 'Giáo dục', 'bo-sach-nhung-cau-chuyen-cho-con-thanh-nguoi-tu-te.jpg');

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `user` (`id`, `user`, `password`, `email`) VALUES
(7, 'admin', 'admin123', 'admin@gmail.com'),
(8, 'customer', 'customer123', 'customer@gmail.com'),
(13, 'vu', '202cb962ac59075b964b07152d234b70', 'vu@gmail.com');


ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

