-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 02:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codezshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `paid_time` int(11) NOT NULL DEFAULT 0,
  `coupon` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'HTML/Css', 'About HTML5 and Css...'),
(2, 'Javascript', 'About Javascript, Jquery, ReactJS...'),
(3, 'C#/.NET', 'About C# .NET, ASP.NET, F#, ML.NET...'),
(4, 'Java', 'About Java, Jsp, Servlet, Spring...'),
(5, 'C/C++', 'About C, C++...'),
(6, 'Python', 'About Python...'),
(7, 'PHP & MYSQL', 'About PHP, Lavarel Framework...'),
(8, 'The Others', 'The others languages...');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `is_percent` tinyint(1) NOT NULL,
  `created_time` int(11) NOT NULL DEFAULT 0,
  `applied_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `is_support` tinyint(1) NOT NULL DEFAULT 0,
  `released` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `title`, `content`, `description`, `price`, `thumb`, `code`, `is_support`, `released`, `updated`, `views`) VALUES
(1, 3, 1, 'MySQL Insert Multiple Rows', '&lt;p&gt;&lt;strong&gt;Summary&lt;/strong&gt;: in this tutorial, you will learn how to use a single MySQL&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;statement to insert multiple rows into a table.&lt;/p&gt;\r\n\r\n&lt;h2&gt;MySQL&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;multiple rows statement&lt;/h2&gt;\r\n\r\n&lt;p&gt;To insert multiple rows into a table, you use the following form of the&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;statement:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;INSERT INTO table_name (column_list) VALUES (value_list_1), (value_list_2), ... (value_list_n); &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;In this syntax:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;First, specify the name of table that you want to insert after the&amp;nbsp;&lt;code&gt;INSERT INTO&lt;/code&gt;&amp;nbsp;keywords.&lt;/li&gt;\r\n	&lt;li&gt;Second, specify a comma-separated column list inside parentheses after the table name.&lt;/li&gt;\r\n	&lt;li&gt;Third, specify a comma-separated list of row data in the&amp;nbsp;&lt;code&gt;VALUES&lt;/code&gt;&amp;nbsp;clause. Each element of the list represents a row. The number of values in each element must be the same as the number of columns in the&amp;nbsp;&lt;code&gt;column_list&lt;/code&gt;.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;MySQL&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;multiple rows limit&lt;/h3&gt;\r\n\r\n&lt;p&gt;In theory, you can insert any number of rows using a single&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;statement. However, when MySQL server receives the&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;statement whose size is bigger than&amp;nbsp;&lt;code&gt;max_allowed_packet&lt;/code&gt;, it will issue a packet too large error and terminates the connection.&lt;/p&gt;\r\n\r\n&lt;p&gt;This statement shows the current value of the&amp;nbsp;&lt;code&gt;max_allowed_packet&lt;/code&gt;&amp;nbsp;variable:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;SHOW VARIABLES LIKE &amp;#39;max_allowed_packet&amp;#39;; &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Here is the output on our MySQL database server. Note that the value in your server may be different.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mysqltutorial.org/wp-content/uploads/2019/08/MySQL-Insert-multiple-rows-max_allowed_packet.png&quot; style=&quot;height:36px; width:192px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;The number is the&amp;nbsp;&lt;code&gt;Value&lt;/code&gt;&amp;nbsp;column is the number of bytes.&lt;/p&gt;\r\n\r\n&lt;p&gt;To set a new value for the&amp;nbsp;&lt;code&gt;max_allowed_packet&lt;/code&gt;&amp;nbsp;variable, you use the following statement:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;SET GLOBAL max_allowed_packet=size; &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;where&amp;nbsp;&lt;code&gt;size&lt;/code&gt;&amp;nbsp;is an integer that represents the number the maximum allowed packet size in bytes.&lt;/p&gt;\r\n\r\n&lt;p&gt;Note that the&amp;nbsp;&lt;code&gt;max_allowed_packet&lt;/code&gt;&amp;nbsp;has no influence on the&amp;nbsp;&lt;code&gt;&lt;a href=&quot;https://www.mysqltutorial.org/mysql-insert-into-select/&quot;&gt;INSERT INTO .. SELECT&lt;/a&gt;&lt;/code&gt;&amp;nbsp;statement. The&amp;nbsp;&lt;code&gt;INSERT INTO .. SELECT&lt;/code&gt;&amp;nbsp;statement can insert as many rows as you want.&lt;/p&gt;\r\n\r\n&lt;h2&gt;MySQL&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;multiple rows example&lt;/h2&gt;\r\n\r\n&lt;p&gt;Let&amp;rsquo;s take an example of using the&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;multiple rows statement.&lt;/p&gt;\r\n\r\n&lt;p&gt;First,&amp;nbsp;&lt;a href=&quot;https://www.mysqltutorial.org/mysql-create-database/&quot;&gt;create a new table&lt;/a&gt;&amp;nbsp;called&amp;nbsp;&lt;code&gt;projects&lt;/code&gt;&amp;nbsp;for the demonstration:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;CREATE TABLE projects( project_id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, start_date DATE, end_date DATE, PRIMARY KEY(project_id) ); &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Second, use the&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;multiple rows statement to insert two rows into the&amp;nbsp;&lt;code&gt;projects&lt;/code&gt;&amp;nbsp;table:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;INSERT INTO projects(name, start_date, end_date) VALUES (&amp;#39;AI for Marketing&amp;#39;,&amp;#39;2019-08-01&amp;#39;,&amp;#39;2019-12-31&amp;#39;), (&amp;#39;ML for Sales&amp;#39;,&amp;#39;2019-05-15&amp;#39;,&amp;#39;2019-11-20&amp;#39;); &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;MySQL issued the following message:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;2 row(s) affected &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;It means that two rows have been inserted into the&amp;nbsp;&lt;code&gt;projects&lt;/code&gt;&amp;nbsp;table successfully.&lt;/p&gt;\r\n\r\n&lt;p&gt;Note that when you insert multiple rows and use the&amp;nbsp;&lt;code&gt;&lt;a href=&quot;https://www.mysqltutorial.org/mysql-last_insert_id.aspx&quot;&gt;LAST_INSERT_ID()&lt;/a&gt;&lt;/code&gt;&amp;nbsp;function to get the last inserted id of an&amp;nbsp;&lt;code&gt;&lt;a href=&quot;https://www.mysqltutorial.org/mysql-sequence/&quot;&gt;AUTO_INCREMENT&lt;/a&gt;&lt;/code&gt;&amp;nbsp;column, you will get the id of the first inserted row only, not the id of the last inserted row.&lt;/p&gt;\r\n\r\n&lt;p&gt;Third, use the following&amp;nbsp;&lt;code&gt;&lt;a href=&quot;https://www.mysqltutorial.org/mysql-select-statement-query-data.aspx&quot;&gt;SELECT&lt;/a&gt;&lt;/code&gt;&amp;nbsp;statement to verify the inserts:&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n\r\n&lt;p&gt;&lt;code&gt;SELECT * FROM projects; &lt;/code&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;small&gt;Code language: SQL (Structured Query Language) (sql)&lt;/small&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;This picture shows the output:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;MySQL Insert multiple rows example&quot; src=&quot;https://www.mysqltutorial.org/wp-content/uploads/2019/08/MySQL-Insert-multiple-rows-example.png&quot; style=&quot;height:58px; width:323px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;In this tutorial, you have learned how to use the MySQL&amp;nbsp;&lt;code&gt;INSERT&lt;/code&gt;&amp;nbsp;statement to insert multiple rows into a table.&lt;/p&gt;\r\n', 'Summary: in this tutorial, you will learn how to use a single MySQL INSERT statement to insert multiple rows into a table.', 123000, 'images/products/1_1634306694.jpg', 'files/products/1_1634306694.zip', 1, 1634306694, 1634372519, 26);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/users/avatars/default.jpg',
  `cover` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/users/covers/default.jpg',
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heading` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `join_time` int(11) DEFAULT 0,
  `money` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `fullname`, `email`, `dob`, `avatar`, `cover`, `website`, `heading`, `about`, `facebook`, `instagram`, `twitter`, `join_time`, `money`) VALUES
(1, 1, 'nothegoodman', 'c71777503b0cdb84ab805d7565fec72f', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', '2200-03-01', 'images/users/avatars/1_1634377189.png', 'images/users/covers/1_1634377218.jpg', 'ascasc', '', 'asdasdasd', '', '', '', 1634306160, 0),
(2, 1, 'hoaitran308', '8dd879145f56b996c695d7bb606a5ebf', 'Hoài Trần', 'tranvanhoai.tt4@gmail.com', NULL, '/images/avatars/default.jpg', '/images/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634374054, 0),
(3, 1, 'tuoitre', '8dd879145f56b996c695d7bb606a5ebf', 'Tuoi Tre', 'tuoitre@gmail.com', NULL, '/images/users/avatars/default.jpg', '/images/users/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634378428, 0),
(4, 1, 'sayyes', '8dd879145f56b996c695d7bb606a5ebf', 'Tuoi Tre', 'tuoitre@gmail.com', NULL, '/images/users/avatars/default.jpg', '/images/users/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634378521, 0),
(5, 1, 'alohaha', '8dd879145f56b996c695d7bb606a5ebf', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', NULL, '/images/users/avatars/default.jpg', '/images/users/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634378895, 0),
(6, 1, 'alohaha2', '8dd879145f56b996c695d7bb606a5ebf', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', NULL, '/images/users/avatars/default.jpg', '/images/users/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634379028, 0),
(7, 1, 'alohaha23', '8dd879145f56b996c695d7bb606a5ebf', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', NULL, 'images/users/avatars/7_1634379055.png', 'images/users/covers/7_1634379055.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634379055, 0),
(8, 1, 'alohaha234', '8dd879145f56b996c695d7bb606a5ebf', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', NULL, 'images/users/avatars/8_1634379085.png', 'images/users/covers/8_1634379085.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1634379085, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `carts` (`coupon`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts` FOREIGN KEY (`coupon`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
