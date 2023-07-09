-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 09, 2023 lúc 04:56 PM
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
-- Cơ sở dữ liệu: `oopcms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'Javascript'),
(3, 'NodeJS'),
(6, 'Python'),
(7, 'Laravel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 'The Than', 'example@gmail.com', 'Bai viet hay qua', 'approved', '2023-06-15'),
(5, 58, 'Nguyen Dinh Kien', 'example@gmail.com', 'Tinh yeu cu ngo diu danh den nay bong hoa be bang', 'approved', '2023-07-02'),
(8, 58, 'Nguyen Dinh Kien', 'example@gmail.com', 'Mot ngan noi dau\r\n', 'approved', '2023-07-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_content` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT 'draf',
  `post_title` varchar(255) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_view_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_comment_count`, `post_category_id`, `post_author`, `post_date`, `post_content`, `post_image`, `post_status`, `post_title`, `post_tags`, `post_view_count`) VALUES
(1, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(2, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(3, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(4, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(5, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(6, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(7, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(8, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(9, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(10, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(11, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(12, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(13, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(14, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(15, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(16, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(17, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(18, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(19, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(20, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(21, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(22, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(23, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(24, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(25, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(26, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(27, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(28, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(29, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(30, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(31, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(32, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(33, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(34, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(35, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(36, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(37, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(38, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(39, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(40, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(41, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(42, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(43, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(44, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(45, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(46, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(47, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(48, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(49, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(50, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(51, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(52, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(53, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(54, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(55, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(56, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(57, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(58, NULL, 1, 'Nguyễn Đình kiên', '2023-06-15', '<p>cach ma Kien hoc lap trinh nhu the nao</p>', 'image_1.jpg', 'published', 'Kien Hoc Lap Trinh', 'javascript, php', NULL),
(67, NULL, 7, 'Nguyen The Than', '2023-07-09', 'bien global trong PHP dung de lam gi', 'image_4.jpg', 'published', 'Bien global trong PHP', 'PHP', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$jalsnamsnxjaiwlqp82jak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'admin', 'example@gmail.com', '$2y$10$Wyj3yqC7awLyI1Rpnu6o4ucVK0ow1ze6HgB3TwWG89hyvlJRD5g7y', 'Nguyen The', 'Than', NULL, 'admin', '$2y$10$jalsnamsnxjaiwlqp82jak'),
(6, 'thethan', 'example1@gmail.com', '$2y$10$V2ZVdXeo1PGE0h8bEiLJluOKh/yxiSuQSi3IccxJ7W.KjepSOte22', 'Nguyen The', 'Nam', NULL, 'admin', '$2y$10$jalsnamsnxjaiwlqp82jak'),
(7, 'thethan2', 'example2@gmail.com', '$2y$10$1s2hKoANZ1G9jOJylU5mMeCiJ9UpO03j01FXsLHsknvp5.Kmm6M.i', NULL, NULL, NULL, 'subscriber', '$2y$10$jalsnamsnxjaiwlqp82jak');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `time`) VALUES
(1, 'ch539ct1466h9lou0vueqsff3j', 1686839190),
(2, '11bvqcebjprk0flr2tshk4tmo5', 1686844875);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
