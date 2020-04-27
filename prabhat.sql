-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 07:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prabhat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user_id`, `blog_id`, `parent_id`, `timestamp`, `del`) VALUES
(1, 'This is first blog comment', 1, 5, 1, '2020-04-24 20:14:39', 0),
(2, 'this good comment', 2, 9, NULL, '2020-04-26 19:35:07', 0),
(6, 'this is good comment', 1, 2, NULL, '2020-04-26 19:36:40', 0),
(7, 'that is good', 1, 2, NULL, '2020-04-26 19:43:36', 0),
(8, 'that is good', 1, 2, NULL, '2020-04-26 19:44:00', 0),
(9, 'hi how are u ?', 1, 7, NULL, '2020-04-26 20:16:42', 0),
(10, 'hi how are u', 11, 2, NULL, '2020-04-26 20:43:07', 0),
(11, 'i am fine bro', 11, 2, 10, '2020-04-26 21:04:21', 0),
(12, 'just ok', 1, 2, 10, '2020-04-26 21:09:12', 0),
(13, 'good job', 1, 2, NULL, '2020-04-26 21:09:22', 0),
(14, 'hi how are?', 11, 11, NULL, '2020-04-27 13:57:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `address`, `message`, `created_at`) VALUES
(1, 'Prabhat Dubey', 'prabhatdubey994@gmail.com', '8081954682', 'Vill - Chandauka Post- Bathuva, Bhiti', 'this is good blog', '2020-04-24 19:31:01'),
(2, 'Shivam Agrahari', 'shiavmag123@gmail.com', '9953934041', 'Noida', 'hi how are u bro.', '2020-04-24 20:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `address` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `father_name`, `email`, `image`, `address`, `password`, `status`, `role`) VALUES
(1, 'Admin', 'Dinesh Dubey', 'prabhat@gmail.com', 'f1a7d26fc9c14c9072978928b55f3c4f.jpg', 'Ambedkar Nagar', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Admin'),
(2, 'Praveen', 'Ramm', 'pravin994@gmail.com', 'dca4ea71da3468175687d01c130659a3.jpg', '122255', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'User'),
(4, 'Rohit yadav', 'Father\'s Name', 'evgh656@gmail.com', 'f588f7666782a6b3a7d9fd5eff1d9547.jpg', '15156', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'User'),
(5, 'Vivek Kumar', 'Vivek lannn', 'jude.matsi333mela@gmail.com', 'e5f1ec737c7e9b939ee20553f66f3eea.PNG', '123456', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'User'),
(9, 'Shivam Agrahari', 'Ram Deen', 'shiavmag123@gmail.com', 'fa69189973ddd14b34d177b437af8289.jpg', 'Akbarpur', 'e10adc3949ba59abbe56e057f20f883e', 0, 'User'),
(11, 'Amit razz', 'Amarjetet', 'amitrazz131202@gmail.com', '188140c8566fc04aa5e36b20632a15fb.png', 'Azamghar', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '''0''=>inactive,''1''=>active',
  `created_by` varchar(200) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_by`, `created_id`, `created_at`, `updated_at`) VALUES
(2, 'Lorem Ipsum is not simply random text.', 'lorem-ipsum-is-not-simply-random-text-', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', 'fe9151ed9653ef6fde6a77c945c33da5.jpg', 1, 'User', 2, '2020-04-27 12:48:22', '2020-03-16 07:14:21'),
(5, 'Blog 4', 'blog-4', '&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui r', 'b1f8b83c06cd9e3eb68ccda2ef58fc2c.PNG', 1, 'Admin', 1, '0000-00-00 00:00:00', '2020-03-30 06:55:00'),
(7, 'What is PYTHON ?', 'what-is-python-', 'Python is a pure object oriented programming languge.', 'e56a5be97eff406e3a581cb59423b33e.png', 1, 'Admin', 1, '2020-04-27 09:52:25', '2020-04-22 09:50:44'),
(8, 'Create New Blog', 'create-new-blog', '<p>If the optional&nbsp;<code>split_length</code>&nbsp;parameter is specified, the returned array will be broken down into chunks with each being&nbsp;<code>split_length</code>&nbsp;in length, otherwise each chunk will be one character in length.</p>\r\n\r\n<p><strong><code>FALSE</code></strong>&nbsp;is returned if&nbsp;<code>split_length</code>&nbsp;is less than 1. If the&nbsp;<code>split_length</code>&nbsp;length exceeds the length of&nbsp;<code>string</code>, the entire string is returned as the first (and only) array element.</p>', '2d48f525518572b6741a26b615b56ffa.PNG', 1, 'Admin', 1, '2020-04-27 09:52:29', '2020-04-25 18:07:04'),
(9, 'best ios training institute in delhi', 'best-ios-training-institute-in-delhi', 'APTRON Delhi offers an inclusive&nbsp;<strong>iOS App Development with Swift training in delhi</strong>. The extensive practical training provided by&nbsp;<strong>iOS App Development with Swift training institute in delhi</strong>&nbsp;equips live projects and simulations. Such detailed&nbsp;<strong>iOS App Development with Swift course</strong>&nbsp;has helped our students secure job in various MNCs. The trainers at APTRON Delhi are subject specialist corporate professionals providing in-depth study in iOS App Development with Swift course in delhi. Participants completing the iOS App Development with Swift certification have plethora of job opportunities in the industry.', 'c19103a49e81f9080ff727a1da9cd69f.jpg', 1, 'Admin', 1, '2020-04-27 09:52:33', '2020-04-25 18:35:05'),
(10, '30 Most Asked Django Interview Questions – Unlock Your Success in 2020', '30-most-asked-django-interview-questions-unlock-your-success-in-2020', 'Django is a great framework and is currently in high demand. You may get the job opportunity in the field of Django that you desire. So, this tutorial will help you to practice some Django interview questions and answers, which are very important to showcase your understanding in an interview.\r\n\r\nBookmark the complete series of Django interview questions for your interview preparation:\r\n\r\nDjango Interview Questions and Answers for Freshers\r\nDjango Interview Questions and Answers for Experienced\r\n\r\n \r\nLet’s start your interview preparation with some tricky Django interview', 'd41f8c93691d2c13cfb1fb407d76e33a.jpg', 1, 'User', 1, '2020-04-27 13:44:03', '2020-04-27 13:44:03'),
(11, 'Blog Home Courses Data Science Big Data Categories Interview Questions Job ', 'blog-home-courses-data-science-big-data-categories-interview-questions-job-', 'Django Admin is the preloaded interface made to fulfill the need of web developers as they won&rsquo;t need to make another admin panel which is time-consuming and expensive. Django Admin is application imported from django.contrib packages. It is meant to be operated by the organization itself and therefore doesn&rsquo;t need the extensive frontend.', '5f559aa236e61733f885e2e765c6abf6.jpg', 1, 'User', 1, '2020-04-27 14:40:36', '2020-04-27 13:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_setting`
--

CREATE TABLE `tbl_site_setting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_title` text NOT NULL,
  `site_meta_keyword` text NOT NULL,
  `site_meta_description` text NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `about_image` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `logo` text NOT NULL,
  `p_title1` text DEFAULT NULL,
  `p_content1` text DEFAULT NULL,
  `p_title2` text DEFAULT NULL,
  `p_content2` text DEFAULT NULL,
  `p_title3` text DEFAULT NULL,
  `p_content3` text DEFAULT NULL,
  `youtube_url` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site_setting`
--

INSERT INTO `tbl_site_setting` (`id`, `site_name`, `site_title`, `site_meta_keyword`, `site_meta_description`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `about`, `about_image`, `email`, `contact`, `address`, `facebook`, `twitter`, `youtube`, `instagram`, `linkedin`, `logo`, `p_title1`, `p_content1`, `p_title2`, `p_content2`, `p_title3`, `p_content3`, `youtube_url`, `created_at`, `updated_at`) VALUES
(1, 'prabhattech.com', 'Prabhat Tech', 'this meta keyword', '<strong>Prabhat Tech </strong>is the most popular Programming & Web Development blog. Our main work is to make the best online tutorial on programming and web development. We bring the useful and best tutorials for web professionals — developers, programmers, freelancers and site owners. Any viewer of this site are free to browse our tutorials and download scripts.<br/><strong>Our Skills</strong><br />We are developing all of the following technologies:<br /><br />PHP<br />MySql<br />Web Development<br />Web Programming<br />CodeIgniter Frameworks<br />Ajax<br />jQuery<br />JavaScript<br />HTML<br />CSS', 'gmail.com', 'prabhatdubey994@gmail.com', 'prabhat8896', '456', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'prabhatdubey994@gmail.com', '+918081954350', 'NuSys Technologies, C-218, C Block, Sector 63, Noida, Uttar Pradesh 201301', 'https://facebook.com/prabhatdubey26', 'https://twitter.com/prabhatdubey26', 'https://www.youtube.com/', 'https://www.instagram.com/prabhatdubey26', 'https://www.linkedin.com/in/prabhatdubey26/', 'f9a95869d4209ff8a9cd79655f59e18a.png', 'Flexible Pricing', 'By the same illusion which lifts the horizon of the sea to the level of the the sable cloud beneath was dished out and the car seemed to float in the middle of an darker half strewn.', 'Creative Solutions', 'By the same illusion which lifts the horizon of the sea to the level of the the sable cloud beneath was dished out and the car seemed to float in the middle of an darker half strewn.', 'Premium Support', 'By the same illusion which lifts the horizon of the sea to the level of the the sable cloud beneath was dished out and the car seemed to float in the middle of an darker half strewn.', 'https://www.youtube.com/watch?v=mIcr_p-kzKs', '2019-08-19 00:00:00', '2019-08-19 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `tbl_blog` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
