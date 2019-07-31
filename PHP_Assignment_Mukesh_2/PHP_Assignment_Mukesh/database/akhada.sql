-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 09:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhada`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_des` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `long_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `title`, `short_des`, `category`, `long_des`) VALUES
(9, 1, 'BIGSTEP Technology Gu&#039;rugram', 'SOFTWARE', 'Fitness', 'We work on the latest technologies to achieve goals and solve problems. Our team builds winning products with our expertise and weï¿½re quick to adapt and conquer new technical challenges that come our way.'),
(43, 17, 'efe', 'ga', 'Exersice', 'fd'),
(44, 1, 'ACE', 'Known formally as the American Council on Exercise, the ACE is a nonprofit organization that certifies exercise professionals as well as health coaches.', 'Fitness', 'Known formally as the American Council on Exercise, the ACE is a nonprofit organization that certifies exercise professionals as well as health coaches. Their blog focuses on various fitness topics such as exercises for the lower body, strength training, exercises for agility, and the benefits of these exercises. The ACE is dedicated to helping people move throughout their day to day life as well as providing scientifically supported education and information to fitness enthusiasts, professionals, coaches, and trainers. Their end goal is to make an impact on preventable diseases related to inactivity and sedentary lifestyles by 2035.\r\n\r\n'),
(45, 1, 'Born Fitness', 'Born Fitness was developed as a program designed to make taking care of yourself easier and stress-free.', 'Fitness', 'Born Fitness was developed as a program designed to make taking care of yourself easier and stress-free. This means that all the headache around your health, nutrition decisions, and fitness practices are taken away in favor of easy and effective lifestyle changes. The blog is perfect for readers looking to lose weight, eat a better diet, live longer, gain muscle, or achieve another fitness goal. In addition, the blog is perfect for readers in all stages of their fitness journey whether they are beginners or fitness experts and enthusiasts. The posts are comprehensive, fun to read, easy to understand, and simple to execute.'),
(46, 1, 'Run To The Finish', 'Run to the Finish might just change our minds on that. ', 'Fitness', 'Run to the Finish has awesome information that you can really use. The majority of their blog posts talk about ways to get your body in shape with the help of running as well as warm-up tips, training exercises, and more. This site also has recipes, product reviews, profiles of well-known runners, and much more. Whether you love running or hate it, this blog is one to watch.'),
(60, 19, 'trhe', 'rewrt', 'Hardwork', 'gsdertgrstg'),
(61, 19, 'fdgsdf', 'dgd', 'Hardwork', 'dfdsfa'),
(62, 1, 'rrsg', 'SOFTWARE', 'Fitness', 'fgfdhth'),
(63, 1, 'sidhu', 'moose wala', 'Hardwork', 'So high'),
(64, 1, 'fdsdf', 'gdfag', 'Exersice', 'grrg'),
(65, 1, 'hgg&quot;jhk/jh&#039;', 'ghwjg&quot;&#039;/hv&#039;&#039;&#039;&#039;&#039;&#039;', 'Fitness', 'edewferf.&quot;/&#039;gj&#039;'),
(66, 1, 'fg', 'dgd', 'Fitness', 'dfsgfd'),
(67, 1, 'tgsr', 'dgd', 'Fitness', 'dfsgfd'),
(68, 1, 'gdfg', 'fds', 'Hardwork', 'dfgsd'),
(69, 1, 'BIGSTEP', 'See some of the technologies we commonly use', 'Hardwork', 'Mukesh Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(72, 21, 'gfdg/&#039;&#039;&#039;;&#039;&#039;/&quot; casdc', '/&#039;&#039;;;', 'Exersice', 'dagsdgadg&#039;/'),
(73, 1, 'gg', 'SOFTWARE', 'Hardwork', 'rgsgdf'),
(74, 1, 'fdds', 'sdaff', 'Exersice', 'ff'),
(75, 30, 'hii', 'hiigdfg', 'Fitness', 'hiidghj'),
(76, 30, 'hello', 'hello', 'Exersice', 'hello'),
(77, 30, 'rtep;&#039;p&#039;/&#039;', 'erwo;p;&#039;[&#039;', 'Fitness', 'l&#039;;jk;;p[pot875r76w2@!!$%'),
(78, 1, 'jhh', 'fhfgh', 'Fitness', 'hgj'),
(79, 1, 'gnf', 'fggggggggd', 'Fitness', 'dsdf'),
(80, 1, 'BIGSTEP', 'SOFTWARE', 'Fitness', 'cd'),
(81, 1, 'studio', 'lazy boy', 'Hardwork', 'beside britel Hotel'),
(82, 38, 'rgre', 'rer', 'Fitness', 'erww&quot;;'),
(83, 1, 'fitness', 'SOFTWARE', 'Hardwork', 'eefefffffess');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `phone`, `subject`, `contact_id`) VALUES
('mukesh suthar', 'honeysuthar4@gmail.com', '1234567890', 'yfhyfd', 1),
('deep khan', 'aaaaaa@poornima.com', '4545463453', 'good', 2),
('mukesh suthar', 'aaaaaa@poornima.com', '5635464555', 'asdsfsd', 3),
('mukesh suthar', 'honeysuthar4@gmail.com', '5635464555', 'sadfsaf\"', 4),
('deepak bihari', 'deepak4@gmail.com', '5635464555', 'sdasf', 5),
('deepak bihari', 'deepak4@gmail.com', '5635464555', 'sdasf', 6),
('fs dg', 'd@gm.cm', '9638527410', 'sda', 7),
('fgd re', 'aaaaaa@poornima.com', '5635464555', 'regwe', 8),
('fwe reg', 'rfgreg@fd.cpom', '1234567890', 'gvgfrw', 9),
('fre\";g suthar', 'honeysuthar4@gmail.com', '5635464555', 'dfergf\'', 10),
('mukesh suthar', 'honeysuthar4@gmail.com', '5635464555', 'wqd', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `phone`) VALUES
(1, 'mukesh kumar suthar', 'suthar110', 'suthar4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '5635464555'),
(3, 'dfddf', 'fd', 'aaaaaa@gmail.com', 'ffffff', '4545463453'),
(4, 'deepdjjjjj', 'ssd', 'aas@gmail.com', 'fgh', '1234567890'),
(5, 'jgfjgh', 'hjh', 'honeysuthar@gmail.com', 'gh', '1234567890'),
(7, 'hgdgfh', 'dgf', 'aaaa@poornima.com', 'nhn', '4254325324'),
(9, 'sdds', 'ghhg', 'aaaaaa@poornima.com', '123', '1234567809'),
(11, 'fdsssd', 'aa', 'trtrd@f.c', 'tr', '7418529630'),
(12, 'dfvdsxzvc', 'dsfcx', 'trtr@d.c', 'wer', '8527419630'),
(14, 'dsfdsf', 'rew', 'p@d.v', 'fsdf', '1234567957'),
(16, 'fdsdsdfsd', 'wewef', 'a@a.a', 'ewew', '7418574630'),
(17, 'udf', 'dss', 's@s.s', 'fg', '5635464777'),
(18, 'mukesh suthar', 'honey', 'honey4@gmail.com', ' e10adc3949ba59abbe56e057f20f883e', '9638527410'),
(19, 'deepanshu khandelwal', 'deepkhand', 'deep@gmail.com', 'deep123', '7789456142'),
(20, 'donald tom', 'tom', 'tom@gmail.com', '123456\r\n ', '4545463123'),
(21, 'john alex', 'alex112', 'john@poornima.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567895'),
(23, 'mukesh suthar', 'suthar', 'uthar4@gmail.com', 'd8e423a9d5eb97da9e2d58cd57b92808', '4254325324'),
(29, 'mukesh suthar', 'sut', 'h@gmail.com', 'dd88037ff38634a8042247ae824c5dc3', '9638527410'),
(30, 'karan johar', 'karan12', 'karan@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '9638510110'),
(31, 'yaal hoo', 'aads', 'deepanshu@gmail.com', '453e41d218e071ccfb2d1c99ce23906a', '4254325324'),
(32, 'gdg54654 suthar', 'aabb', 'bb@poornima.com', '25d55ad283aa400af464c76d713c07ad', '1234567809'),
(33, 'hfgh\" ffd', 'sf', 'hb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4254325324'),
(34, 'df fs', 'su', 'er4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890'),
(35, 'hgfg\";4154 df', 'aadd', 'rf@poornima.com', 'fcea920f7412b5da7be0cf42b8c93759', '4545463453'),
(36, 'fsa\"; suthar', 'dgfd', '5fg@poornima.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567809'),
(37, 'mukesh df6', 'suthar1105', 'honeysuthar4@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '4254325324'),
(38, 'mukesh suthar', 'ssuthar110', 'hn@gmail.com', '49f9ff3a98826af6cb10082688c8fba1', '9421964007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
