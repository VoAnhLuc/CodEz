-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 04:00 AM
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
  `coupon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
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
(1, 'C#', 'everything about .net c#'),
(2, 'Java', 'java do');

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
(1, 2, 1, 'MỞ LINK ĐĂNG KÝ THAM GIA TRIVIA QUIZ - YÊU CHUẨN SGK', '&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tdd/1/16/1f9d0.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; POV: &amp;ldquo;Nếu bản th&amp;acirc;n người bị x&amp;acirc;m hại t&amp;igrave;nh dục c&amp;oacute; phản ứng sinh l&amp;yacute; khi bị x&amp;acirc;m hại, th&amp;igrave; liệu c&amp;oacute; phải họ đang đồng &amp;yacute; cho sự x&amp;acirc;m hại của kẻ xấu?&amp;ldquo;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nếu bạn c&amp;ograve;n băn khoăn chưa t&amp;igrave;m được c&amp;acirc;u trả lời cho những vấn đề về gi&amp;aacute;o dục t&amp;iacute;nh như vậy, th&amp;igrave; h&amp;atilde;y tham gia Trivia Quiz - Y&amp;ecirc;u Chuẩn SGK ngay!&lt;/p&gt;\r\n\r\n&lt;p&gt;Y&amp;ecirc;u chuẩn SGK l&amp;agrave; bộ c&amp;acirc;u hỏi trắc nghiệm về sức khỏe t&amp;acirc;m sinh l&amp;yacute;, gi&amp;aacute;o dục giới t&amp;iacute;nh cho giới trẻ được tạo ra nhằm mang lại những kiến thức v&amp;agrave; g&amp;oacute;c nh&amp;igrave;n đa chiều về vấn đề n&amp;agrave;y. Th&amp;ocirc;ng qua việc tham gia Quiz c&amp;aacute;c bạn trẻ sẽ được trang bị th&amp;ecirc;m kiến thức để bảo vệ bản th&amp;acirc;n cũng như cởi bỏ &amp;acirc;u lo v&amp;agrave; trải nghiệm t&amp;igrave;nh dục an to&amp;agrave;n khi đ&amp;atilde; sẵn s&amp;agrave;ng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; TH&amp;Ocirc;NG TIN VỀ QUIZ Y&amp;Ecirc;U CHUẨN SGK&lt;/p&gt;\r\n\r\n&lt;p&gt;- Thời gian đăng k&amp;yacute;: 06.10.2021 - 23g59 14.10.2021&lt;/p&gt;\r\n\r\n&lt;p&gt;- Thời gian tham gia: 08g00 07.10.2021 - 15g00 15.10.2021&lt;/p&gt;\r\n\r\n&lt;p&gt;- Ph&amp;iacute; tham gia: 5.000 VND.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Với 2,000 lượt tham gia Quiz, BTC sẽ đ&amp;oacute;ng g&amp;oacute;p v&amp;agrave;o g&amp;oacute;i quỹ &amp;ldquo;D&amp;acirc;u khỏe D&amp;acirc;u xinh&amp;rdquo; số tiền l&amp;agrave; 2.000.000 VNĐ. Đ&amp;acirc;y l&amp;agrave; một s&amp;aacute;ng kiến cộng đồng của Tổ chức Th&amp;uacute;c đẩy B&amp;igrave;nh đẳng giới Việt Nam VOGE kết hợp với quỹ s&amp;aacute;ng kiến Mỗi ng&amp;agrave;y Một quả trứng của SCDI nhằm đ&amp;oacute;ng g&amp;oacute;p, hỗ trợ phụ nữ v&amp;agrave; trẻ em trong m&amp;ugrave;a dịch.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Hiện tại, g&amp;oacute;i &amp;ldquo;D&amp;acirc;u khỏe D&amp;acirc;u xinh&amp;rdquo; đ&amp;atilde; ho&amp;agrave;n th&amp;agrave;nh ph&amp;acirc;n ph&amp;aacute;t c&amp;aacute;c g&amp;oacute;i hỗ trợ cho đợt 1 ở H&amp;agrave; Nội v&amp;agrave; số tiền 2.000.000 VNĐ sẽ được đ&amp;oacute;ng g&amp;oacute;p v&amp;agrave;o cho quy m&amp;ocirc; đợt 2 ở TP.HCM.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Th&amp;ocirc;ng tin chi tiết g&amp;oacute;i &amp;ldquo;D&amp;acirc;u khoẻ D&amp;acirc;u xinh&amp;rdquo;: &lt;a href=&quot;https://l.facebook.com/l.php?u=https%3A%2F%2Fbitly.com.vn%2F3cjo9w%3Ffbclid%3DIwAR1c5ou8UJ7I3jleUXgtyaa5XfjfcZVrr5R3Le5Ifm0716wXczPw2R085DA&amp;amp;h=AT1268eEq4brJQ8Cy4Cc9GhTXCHgUJDsn48vAD9iefUV2LL_DXO29M8tl6jC89QeI1UXkT68hU_xW1hDi7DSUvIQHH_2IKNLfAEDbwEUbfJ20RSgK_h3OnD5dK6C4qVo1NAKdliELGKWwd7Iuti2&amp;amp;__tn__=-UK-y-R&amp;amp;c[0]=AT2sv36WY4dUUQRbL_urkC3qgeu0ndHR5LZII0N9kcHjLqRJHH2xMeiUNV9SCPuthvzxgQ_vQcdF2g6HNDQ5R8CLf8RXpozl_z3ChVjq35X2hfCo9xLBNl1h8SBeTI9FWHI8eyaKXwpHPF2BBfk27zInZbXoRpjf2j3lh9VxQMAZHeFSVbJGHvZmc662S5NhfQZlh-M&quot; target=&quot;_blank&quot;&gt;https://bitly.com.vn/3cjo9w&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Cập nhật th&amp;ocirc;ng tin g&amp;oacute;i &amp;ldquo;D&amp;acirc;u khỏe D&amp;acirc;u xinh&amp;rdquo;: &lt;a href=&quot;https://l.facebook.com/l.php?u=https%3A%2F%2Fbitly.com.vn%2Fies8rk%3Ffbclid%3DIwAR3qSsE2Jthm-O_5-jWYBlTq1N6mGfdS3ZxxpehJ90KKpoxefnj3NTI3xp0&amp;amp;h=AT16Zg-mDBpGmJBU3vGVynGjd7ovDUJJFYxG5zeyAp3UWPsF15fPlYn_DJbiJHCkFc4ArzQq04Cayus4cW4t7jWCUa9WOzEN_2hcUUR3BDhI2lX6pDDj31uas3MeyKBjHkJKiBdw0_47XqYGmd6q&amp;amp;__tn__=-UK-y-R&amp;amp;c[0]=AT2sv36WY4dUUQRbL_urkC3qgeu0ndHR5LZII0N9kcHjLqRJHH2xMeiUNV9SCPuthvzxgQ_vQcdF2g6HNDQ5R8CLf8RXpozl_z3ChVjq35X2hfCo9xLBNl1h8SBeTI9FWHI8eyaKXwpHPF2BBfk27zInZbXoRpjf2j3lh9VxQMAZHeFSVbJGHvZmc662S5NhfQZlh-M&quot; target=&quot;_blank&quot;&gt;https://bitly.com.vn/ies8rk&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Th&amp;ocirc;ng tin về Tổ chức Th&amp;uacute;c đẩy B&amp;igrave;nh đẳng giới Việt Nam VOGE: &lt;a href=&quot;https://l.facebook.com/l.php?u=https%3A%2F%2Fvoge.vn%2F%3Ffbclid%3DIwAR0JFRi_pkvw6K1CNztiXTdf5Agng6yscvVwWFQ-SbNVYfEupTknLeBSH-4&amp;amp;h=AT18dsw5s455GfViPIJMrBgN7NFfCcrAl_o_hQ_aBeKJkcdPXONXYAUlkFyO3ztw9mH7WpfqhIVhyJUWgCu0pGAqIUNH5S3v3WxYeUTa_dqK-j2vcM5JXYISp1jJBObzhEa3p5cQiQe5bC0pT7lQ&amp;amp;__tn__=-UK-y-R&amp;amp;c[0]=AT2sv36WY4dUUQRbL_urkC3qgeu0ndHR5LZII0N9kcHjLqRJHH2xMeiUNV9SCPuthvzxgQ_vQcdF2g6HNDQ5R8CLf8RXpozl_z3ChVjq35X2hfCo9xLBNl1h8SBeTI9FWHI8eyaKXwpHPF2BBfk27zInZbXoRpjf2j3lh9VxQMAZHeFSVbJGHvZmc662S5NhfQZlh-M&quot; target=&quot;_blank&quot;&gt;https://voge.vn/&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Th&amp;ocirc;ng tin về Trung t&amp;acirc;m Hỗ trợ S&amp;aacute;ng kiến Ph&amp;aacute;t triển Cộng đồng SCDI: &lt;a href=&quot;https://l.facebook.com/l.php?u=https%3A%2F%2Fscdi.org.vn%2F%3Ffbclid%3DIwAR3H3ANDK1kgVjGBwx-qVCYNq2Yg329AEHPhT9X4YkyNYBMk5L8nzG0uz_8&amp;amp;h=AT0lEy8XxkIWdBVa3KK3KYpEJc71kOyZw_emMgyI3Wjho38OllXfMJ9IwuTH_7NSAzz4DfBquPLjO_L7V5WnR8M_yNJG_NGWBeapIiHrsGiOyRT1KTw8l0Y9tzoUxxAzdKZpkQzpI8hR7J0OMR5E&amp;amp;__tn__=-UK-y-R&amp;amp;c[0]=AT2sv36WY4dUUQRbL_urkC3qgeu0ndHR5LZII0N9kcHjLqRJHH2xMeiUNV9SCPuthvzxgQ_vQcdF2g6HNDQ5R8CLf8RXpozl_z3ChVjq35X2hfCo9xLBNl1h8SBeTI9FWHI8eyaKXwpHPF2BBfk27zInZbXoRpjf2j3lh9VxQMAZHeFSVbJGHvZmc662S5NhfQZlh-M&quot; target=&quot;_blank&quot;&gt;https://scdi.org.vn/&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;___________________&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; QUYỀN LỢI KHI THAM GIA QUIZ Y&amp;Ecirc;U CHUẨN SGK&lt;/p&gt;\r\n\r\n&lt;p&gt;- Được cập nhật MSSV đối với sinh vi&amp;ecirc;n UEH.&lt;/p&gt;\r\n\r\n&lt;p&gt;- Học hỏi th&amp;ecirc;m nhiều kiến thức về gi&amp;aacute;o dục giới t&amp;iacute;nh cũng như sức khỏe t&amp;acirc;m sinh l&amp;yacute;.&lt;/p&gt;\r\n\r\n&lt;p&gt;- Chung tay đ&amp;oacute;ng g&amp;oacute;p v&amp;agrave;o Quỹ &amp;ldquo;D&amp;acirc;u khoẻ D&amp;acirc;u xinh&amp;rdquo; - Quỹ hỗ trợ phụ nữ v&amp;agrave; trẻ em m&amp;ugrave;a dịch với mỗi lượt tham gia.&lt;/p&gt;\r\n\r\n&lt;p&gt;___________________&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; LINK ĐĂNG K&amp;Yacute; DỰ THI: &lt;a href=&quot;https://forms.gle/FCR1njkSmwyM9MQx5?fbclid=IwAR1SJDPzOLylphLzvw4t3S3VSHLkqe-PFLE6TtMI45206dSUzFnxlUHi1qA&quot; target=&quot;_blank&quot;&gt;https://forms.gle/FCR1njkSmwyM9MQx5&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; LINK THAM GIA THI: &lt;a href=&quot;http://tracnghiemonline.youth.ueh.edu.vn/contest/2072/details?fbclid=IwAR1c5ou8UJ7I3jleUXgtyaa5XfjfcZVrr5R3Le5Ifm0716wXczPw2R085DA&quot; target=&quot;_blank&quot;&gt;http://tracnghiemonline.youth.ueh.edu.vn/con.../2072/details&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; C&amp;Aacute;CH THỨC ĐĂNG K&amp;Yacute;:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Bước 1: Người chơi like, follow fanpage STV, tag 3 người bạn c&amp;ugrave;ng tham gia v&amp;agrave; like, share b&amp;agrave;i viết n&amp;agrave;y về trang c&amp;aacute; nh&amp;acirc;n ở chế độ c&amp;ocirc;ng khai k&amp;egrave;m với hashtag &lt;a href=&quot;https://www.facebook.com/hashtag/stv?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#STV&lt;/a&gt; &lt;a href=&quot;https://www.facebook.com/hashtag/monut?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#MoNut&lt;/a&gt; &lt;a href=&quot;https://www.facebook.com/hashtag/coiauloyeuchangkho?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#CoiauloYeuchangkho&lt;/a&gt;. (Lưu &amp;yacute;: b&amp;agrave;i share ở c&amp;aacute;c chế độ kh&amp;aacute;c sẽ kh&amp;ocirc;ng được t&amp;iacute;nh l&amp;agrave; hợp lệ)&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Bước 2: Chuyển khoản ph&amp;iacute; tham gia để nhận m&amp;atilde; code tham gia quiz. (5.000 VND/v&amp;eacute;)&lt;/p&gt;\r\n\r\n&lt;p&gt;1. Ng&amp;acirc;n h&amp;agrave;ng Thương mại cổ phần Phương Đ&amp;ocirc;ng OCB&lt;/p&gt;\r\n\r\n&lt;p&gt;Số t&amp;agrave;i khoản: 0036100034680001&lt;/p&gt;\r\n\r\n&lt;p&gt;Chủ t&amp;agrave;i khoản: PHAN THUY THANH&lt;/p&gt;\r\n\r\n&lt;p&gt;2. V&amp;iacute; điện tử Momo&lt;/p&gt;\r\n\r\n&lt;p&gt;Số điện thoại: 0352094816&lt;/p&gt;\r\n\r\n&lt;p&gt;Chủ t&amp;agrave;i khoản: PHAN THU&amp;Yacute; THANH&lt;/p&gt;\r\n\r\n&lt;p&gt;Nội dung chuyển khoản: [Họ v&amp;agrave; t&amp;ecirc;n]_[MSSV]_[Số điện thoại]_[Số lượng v&amp;eacute; dự thi]&lt;/p&gt;\r\n\r\n&lt;p&gt;V&amp;iacute; dụ: Nguyễn Văn A_312010xxxxx_0123456789_01&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Bước 3: Điền th&amp;ocirc;ng tin v&amp;agrave; h&amp;igrave;nh ảnh chứng minh v&amp;agrave;o form đăng k&amp;yacute; dự thi v&amp;agrave; x&amp;aacute;c nhận.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t7d/1/16/1f7e3.png&quot; style=&quot;height:16px; width:16px&quot; /&gt;Bước 4: Truy cập link tham gia quiz, điền th&amp;ocirc;ng tin người tham gia v&amp;agrave; ho&amp;agrave;n th&amp;agrave;nh b&amp;agrave;i thi.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tf7/1/16/1f48c.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Trong v&amp;ograve;ng 48 giờ, BTC sẽ gửi m&amp;atilde; code tham gia Quiz qua mail sau khi đ&amp;atilde; kiểm tra c&amp;aacute;c bước được ho&amp;agrave;n th&amp;agrave;nh đầy đủ v&amp;agrave; ch&amp;iacute;nh x&amp;aacute;c. C&amp;aacute;c bạn vui l&amp;ograve;ng ch&amp;uacute; &amp;yacute; c&amp;aacute;c th&amp;ocirc;ng tin đăng k&amp;yacute; cũng như kiểm tra email thường xuy&amp;ecirc;n nh&amp;eacute;!&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tf7/1/16/1f48c.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; BTC sẽ cập nhật MSSV sau khi c&amp;aacute;c bạn ho&amp;agrave;n th&amp;agrave;nh Quiz Y&amp;ecirc;u Chuẩn SGK.&lt;/p&gt;\r\n\r\n&lt;p&gt;STV &amp;zwnj;-&amp;zwnj;&amp;zwnj; S Communications&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://www.facebook.com/hashtag/m%E1%BB%9F_n%C3%BAt%E2%80%8C%E2%80%8C?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#Mở_N&amp;uacute;t&amp;zwnj;&amp;zwnj;&lt;/a&gt; &lt;a href=&quot;https://www.facebook.com/hashtag/c%E1%BB%9Fi_%C3%A2u_lo_y%C3%AAu_ch%E1%BA%B3ng_kh%C3%B3?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#Cởi_&amp;acirc;u_lo_Y&amp;ecirc;u_chẳng_kh&amp;oacute;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://www.facebook.com/hashtag/stv%E2%80%8C%E2%80%8C?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#STV&amp;zwnj;&amp;zwnj;&lt;/a&gt; &lt;a href=&quot;https://www.facebook.com/hashtag/scoms%E2%80%8C?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#Scoms&amp;zwnj;&lt;/a&gt; &amp;zwnj;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://www.facebook.com/hashtag/durexvietnam%E2%80%8C%E2%80%8C?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#Durexvietnam&amp;zwnj;&amp;zwnj;&lt;/a&gt; &lt;a href=&quot;https://www.facebook.com/hashtag/yeuvolovoidurexjeans%E2%80%8C?__eep__=6&amp;amp;__cft__[0]=AZWlCFwm4xCBxQy3zFiTLZPICrMt530Sve8EivoQeUEL0QXMnrrVJusPKUSo-S-w96JrDSFPdJgQZWZ6igYbCCRfsK_z7XrUrbPaCfHFJVlOzsdzHqWhxawOHRaJRi7eq0AU05MpbvHAcvVhFLoowackXvQVcRHzGtaZjotuvAslBg&amp;amp;__tn__=*NK-y-R&quot;&gt;#YeuVoLoVoiDurexJeans&amp;zwnj;&lt;/a&gt; &amp;zwnj;&lt;/p&gt;\r\n\r\n&lt;p&gt;___________________&lt;/p&gt;\r\n\r\n&lt;p&gt;Mọi thắc mắc xin li&amp;ecirc;n hệ:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;?&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f4bb.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Fanpage: STV&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;☎️&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t22/1/16/260e.png&quot; style=&quot;height:16px; width:16px&quot; /&gt; Số điện thoại: 0946 431 740 (Ms. Quỳnh Hương)&lt;/p&gt;\r\n\r\n&lt;p&gt;___________________&lt;/p&gt;\r\n\r\n&lt;p&gt;????̂́?&amp;zwnj; &amp;zwnj;??̣??&amp;zwnj; &amp;zwnj;??̛̉&amp;zwnj; &amp;zwnj;??́?&amp;zwnj; lan&amp;zwnj; &amp;zwnj;tỏa&amp;zwnj; &amp;zwnj;th&amp;ocirc;ng&amp;zwnj; &amp;zwnj;điệp&amp;zwnj; &amp;zwnj;t&amp;iacute;ch&amp;zwnj; &amp;zwnj;cực,&amp;zwnj; &amp;zwnj;cung&amp;zwnj; &amp;zwnj;cấp&amp;zwnj; &amp;zwnj;cho&amp;zwnj; &amp;zwnj;giới&amp;zwnj; &amp;zwnj;trẻ&amp;zwnj; &amp;zwnj;những&amp;zwnj; &amp;zwnj;kiến&amp;zwnj; &amp;zwnj;thức&amp;zwnj; cần&amp;zwnj; &amp;zwnj;thiết&amp;zwnj; &amp;zwnj;để&amp;zwnj; &amp;zwnj;cởi&amp;zwnj; &amp;zwnj;bỏ&amp;zwnj; &amp;zwnj;&amp;acirc;u&amp;zwnj; &amp;zwnj;lo&amp;zwnj; &amp;zwnj;v&amp;agrave;&amp;zwnj; &amp;zwnj;trải&amp;zwnj; &amp;zwnj;nghiệm&amp;zwnj; &amp;zwnj;t&amp;igrave;nh&amp;zwnj; &amp;zwnj;dục&amp;zwnj; &amp;zwnj;an&amp;zwnj; &amp;zwnj;to&amp;agrave;n&amp;zwnj; &amp;zwnj;khi&amp;zwnj; &amp;zwnj;bản&amp;zwnj; &amp;zwnj;th&amp;acirc;n&amp;zwnj; &amp;zwnj;đ&amp;atilde;&amp;zwnj; &amp;zwnj;sẵn&amp;zwnj; &amp;zwnj;s&amp;agrave;ng.&amp;zwnj; &amp;zwnj;Được&amp;zwnj; &amp;zwnj;thực&amp;zwnj; &amp;zwnj;hiện&amp;zwnj; &amp;zwnj;bởi&amp;zwnj; &amp;zwnj;Ekip&amp;zwnj; &amp;zwnj;STV&amp;zwnj; &amp;zwnj;của&amp;zwnj; &amp;zwnj;Nh&amp;oacute;m&amp;zwnj; &amp;zwnj;Truyền&amp;zwnj; &amp;zwnj;th&amp;ocirc;ng&amp;zwnj; &amp;zwnj;Sinh&amp;zwnj; &amp;zwnj;Vi&amp;ecirc;n&amp;zwnj; &amp;zwnj;S&amp;zwnj; &amp;zwnj;Communications&amp;zwnj; &amp;zwnj;trực&amp;zwnj; &amp;zwnj;thuộc&amp;zwnj; &amp;zwnj;Hội&amp;zwnj; &amp;zwnj;Sinh&amp;zwnj; &amp;zwnj;viên&amp;zwnj; &amp;zwnj;Trường&amp;zwnj; &amp;zwnj;ĐH&amp;zwnj; &amp;zwnj;Kinh&amp;zwnj; &amp;zwnj;tế&amp;zwnj; &amp;zwnj;TP.HCM&amp;zwnj; &amp;zwnj;và&amp;zwnj; &amp;zwnj;được&amp;zwnj; &amp;zwnj;đồng&amp;zwnj; &amp;zwnj;hành&amp;zwnj; &amp;zwnj;bởi&amp;zwnj; &amp;zwnj;Durex&amp;zwnj; &amp;zwnj;Vietnam&amp;zwnj; &amp;zwnj;v&amp;agrave;&amp;zwnj; &amp;zwnj;Ứng&amp;zwnj; &amp;zwnj;dụng&amp;zwnj; &amp;zwnj;Video&amp;zwnj; &amp;zwnj;Monster.&lt;/p&gt;\r\n', '????̂́?‌ ‌??̣??‌ ‌??̛̉‌ ‌??́?‌ lan‌ ‌tỏa‌ ‌thông‌ ‌điệp‌ ‌tích‌ ‌cực,‌ ‌cung‌ ‌cấp‌ ‌cho‌ ‌giới‌ ‌trẻ‌ ‌những‌ ‌kiến‌ ‌thức‌ cần‌ ‌thiết‌ ‌để‌ ‌cởi‌ ‌bỏ‌ ‌âu‌ ‌lo‌ ‌và‌ ‌trải‌ ‌nghiệm‌ ‌tình‌ ‌dục‌ ‌a', 123123, 'images/products/1_1634214830.jpg', 'files/products/1_1634214937.zip', 1, 1634214830, 1634214937, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/avatars/default.jpg',
  `cover` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/covers/default.jpg',
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heading` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_action` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `dob`, `avatar`, `cover`, `website`, `heading`, `about`, `facebook`, `instagram`, `twitter`, `last_action`) VALUES
(1, 'hoaitran308', '123dddd', 'Hoài Trần', 'hoaitran@gmail.com', '0000-00-00', '/images/avatars/default.jpg', '', '', '', '', '', '', '', 0),
(2, 'nothegoodman', '8dd879145f56b996c695d7bb606a5ebf', 'Trần Văn Hoài', 'tranvanhoai.9a1.cpt@gmail.com', NULL, '/images/avatars/default.jpg', '/images/covers/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
