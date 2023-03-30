-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_palki`
--

-- --------------------------------------------------------

--
-- Table structure for table `palki_admin`
--

CREATE TABLE `palki_admin` (
  `id` int(4) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki_admin`
--

INSERT INTO `palki_admin` (`id`, `user_name`, `email`, `password`, `image`, `role`) VALUES
(1, 'Nowshad Alve', 'a@a.a', '202cb962ac59075b964b07152d234b70', 'C21020.jpg', '1'),
(2, 'Nowshad Alve', 'nowshadalve@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'C21020.jpg', '1'),
(3, 'Nowshad Alve', 'nowshedalve@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'C21020.jpg', '1'),
(4, 'Hasan Mahmud', 'rockstar125.hasan@gmail.com', '202cb962ac59075b964b07152d234b70', 'orange-juice.png', '1'),
(5, 'MD Nowshad Alam Chowdhury', 'nwoshadalve@gmail.com', '202cb962ac59075b964b07152d234b70', 'lychee.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `palki__category`
--

CREATE TABLE `palki__category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki__category`
--

INSERT INTO `palki__category` (`category_id`, `category`, `category_description`) VALUES
(87, 'Politics', 'External and internal politics in a country. This can be internationally.'),
(88, 'Sports', 'All kinds of sports.'),
(89, 'Business', 'All kind of business'),
(90, 'COVID-19', 'about COVID-19 issues.'),
(91, 'Life Style', 'Our daily life styles.'),
(92, 'World Affairs', 'Regarding world affairs.');

-- --------------------------------------------------------

--
-- Table structure for table `palki__comments`
--

CREATE TABLE `palki__comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `reply` text NOT NULL,
  `replier_id` int(11) NOT NULL,
  `replier_name` varchar(80) NOT NULL,
  `replier_img` varchar(255) NOT NULL,
  `replier_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki__comments`
--

INSERT INTO `palki__comments` (`id`, `post_id`, `name`, `comment`, `comment_date`, `reply`, `replier_id`, `replier_name`, `replier_img`, `replier_date`) VALUES
(9, 7, 'Tanvir Ahmed', 'What will be happen to Ukraine!!', 'Mar 27, 2023', 'Nothing will be happen', 3, 'Nowshad Alve', 'C21020.jpg', 'Mar 27, 2023'),
(10, 7, 'Hasan Mahmud', 'Thanks for sharing the news!!', 'Mar 27, 2023', 'We appreciate it. :)', 3, 'Nowshad Alve', 'C21020.jpg', 'Mar 29, 2023'),
(13, 12, 'Hasan Mahmud', 'What an amazing Innovation. But, sorry to hear that, it fails.', 'Mar 29, 2023', 'It is inspiring to be failed sometimes. It shows us the new lights of hope ', 3, 'Nowshad Alve', 'C21020.jpg', 'Mar 29, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `palki__messages`
--

CREATE TABLE `palki__messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki__messages`
--

INSERT INTO `palki__messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'MD Nwoshad Alam', 'nwoshadalve@gmail.com', 'Hello', 'This is a sample message.'),
(3, 'Rahat Khan', 'rahatkhan@yahoo.com', 'Improved System', 'The system has been improved!'),
(4, 'MD Nwoshad Alam', 'nowshedalve@gmail.com', 'Hello', 'Again Testing'),
(5, 'MD Nwoshad Alam', 'nowshedalve@gmail.com', 'Improved System', 'Ok.'),
(6, 'MD Nwoshad Alam', 'nowshad@gmail.com', 'New Message', 'This is a new message.');

-- --------------------------------------------------------

--
-- Table structure for table `palki__post`
--

CREATE TABLE `palki__post` (
  `post_id` int(11) NOT NULL,
  `post_category` varchar(50) NOT NULL,
  `post_tag` varchar(100) NOT NULL,
  `post_tittle` varchar(100) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` text NOT NULL,
  `post_facebook` varchar(255) NOT NULL,
  `post_twitter` varchar(255) NOT NULL,
  `post_role` varchar(20) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `post_comments` text NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_img_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki__post`
--

INSERT INTO `palki__post` (`post_id`, `post_category`, `post_tag`, `post_tittle`, `post_summary`, `post_description`, `post_facebook`, `post_twitter`, `post_role`, `user_name`, `user_id`, `post_date`, `post_comments`, `post_img`, `post_img_location`) VALUES
(7, 'Politics', 'International Politics, Foreign Policy, Recent Issues', 'ইউক্রেনের হাতে পড়তে যাওয়া ইউরেনিয়ামসমৃদ্ধ গোলাবারুদ কতটা ভয়ংকর', 'রাশিয়ার যুদ্ধ শুরুর পর থেকেই ইউক্রেনকে বিপুলসংখ্যক অস্ত্রসহায়তা করেছে পশ্চিমা দেশগুলো। এই সহায়তা এখনো চলছে। এরই মধ্যে কিয়েভের হাতে ‘ডিপ্লিটেড ইউরেনিয়ামসমৃদ্ধ’ গোলাবারুদ তুলে দিতে চাচ্ছে যুক্তরাজ্য। পারমাণবিক অস্ত্র তৈরির জন্য ইউরেনিয়ামসমৃদ্ধ করার সময় পাওয়া যায় এই ডিপ্লিটেড ইউরেনিয়াম।\r\n<br><br>\r\nযুক্তরাজ্যের এই ঘোষণার পর চুপ নেই রাশিয়া। সঙ্গে সঙ্গে কড়া প্রতিক্রিয়া জানিয়েছেন রুশ প্রেসিডেন্ট ভ্লাদিমির পুতিন। হুঁশিয়ারি দিয়ে...', 'রাশিয়ার যুদ্ধ শুরুর পর থেকেই ইউক্রেনকে বিপুলসংখ্যক অস্ত্রসহায়তা করেছে পশ্চিমা দেশগুলো। এই সহায়তা এখনো চলছে। এরই মধ্যে কিয়েভের হাতে ‘ডিপ্লিটেড ইউরেনিয়ামসমৃদ্ধ’ গোলাবারুদ তুলে দিতে চাচ্ছে যুক্তরাজ্য। পারমাণবিক অস্ত্র তৈরির জন্য ইউরেনিয়ামসমৃদ্ধ করার সময় পাওয়া যায় এই ডিপ্লিটেড ইউরেনিয়াম।\r\n<br><br>\r\nযুক্তরাজ্যের এই ঘোষণার পর চুপ নেই রাশিয়া। সঙ্গে সঙ্গে কড়া প্রতিক্রিয়া জানিয়েছেন রুশ প্রেসিডেন্ট ভ্লাদিমির পুতিন। হুঁশিয়ারি দিয়ে বলেছেন, পশ্চিমারা একত্র হয়ে এমন সব অস্ত্র ব্যবহার করছে, যেগুলোতে পারমাণবিক উপাদান রয়েছে। এর উপযুক্ত জবাব দেবে মস্কো। এখানে প্রশ্ন উঠছে, গোলাবারুদে ডিপ্লিটেড ইউরেনিয়াম থাকলে তা কতটা ভয়ংকর। গবেষণা প্রতিষ্ঠান আরএএনডির পরমাণুবিশেষজ্ঞ এডওয়ার্ড গেইস্টের মতে, এ ধরনের অস্ত্রে কিছুটা তেজস্ক্রিয় উপাদান থাকবে। তবে সেগুলো পারমাণবিক অস্ত্রের মতো বিক্রিয়া শুরু করে না।', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Fworld%2Feurope%2Fhtngtooavq', '', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'ukrine_issues.webp', 'D:Softwarexampp	mpphpD7A6.tmp'),
(8, 'Sports', 'Cricket, Coach', 'রমজান মাসে পাকিস্তান কেন ভালো খেলে, বললেন মিকি আর্থার', 'রমজান মাসের মধ্যেই আজ শুরু হয়েছে পাকিস্তান-আফগানিস্তান টি-টোয়েন্টি সিরিজ। আর এই মাসে খেলতে নামলে পাকিস্তানি ক্রিকেটাররা বিশেষভাবে উজ্জীবিত থাকেন বলে জানিয়েছেন দেশটির সাবেক প্রধান কোচ মিকি আর্থার।\r\n<br><br>\r\nবর্তমানে ডার্বিশয়ার কাউন্টি ক্রিকেট ক্লাবের প্রধান কোচের দায়িত্বে আছেন আর্থার। সম্প্রতি তিনি এক সাক্ষাৎকারে পাকিস্তানি ক্রিকেটারদের ওপর রমজান মাসের প্রভাব নিয়ে কথা বলেছেন। রমজান মাসে ধর্মীয় বিশ্বাস কীভাবে পাকিস্তানি...', 'রমজান মাসের মধ্যেই আজ শুরু হয়েছে পাকিস্তান-আফগানিস্তান টি-টোয়েন্টি সিরিজ। আর এই মাসে খেলতে নামলে পাকিস্তানি ক্রিকেটাররা বিশেষভাবে উজ্জীবিত থাকেন বলে জানিয়েছেন দেশটির সাবেক প্রধান কোচ মিকি আর্থার।\r\n<br><br>\r\nবর্তমানে ডার্বিশয়ার কাউন্টি ক্রিকেট ক্লাবের প্রধান কোচের দায়িত্বে আছেন আর্থার। সম্প্রতি তিনি এক সাক্ষাৎকারে পাকিস্তানি ক্রিকেটারদের ওপর রমজান মাসের প্রভাব নিয়ে কথা বলেছেন। রমজান মাসে ধর্মীয় বিশ্বাস কীভাবে পাকিস্তানি খেলোয়াড়দের প্রভাবিত করে, তা জানাতে গিয়ে আর্থার বলেছেন, ‘আমি মনে করি, গুরুত্বপূর্ণ ব্যাপার হচ্ছে অন্য একটি সংস্কৃতিতে প্রবেশ করা। এর (রমজানের) নৈতিকতা ও মূল্যবোধ দ্বারা আমি খুবই মোহিত হয়েছি। এই সংস্কৃতি খুবই শুদ্ধ ও ভালো। মুসলিমদের বিশ্বাসের জন্য রমজানের সময়টা খুবই গুরুত্বপূর্ণ। এই মাসে আমরা মানসম্মত ক্রিকেট খেলেছি। আমরা সব সময় সফলও হয়েছি।’\r\n<br><br>\r\n২০১৬ থেকে ২০১৯ পর্যন্ত পাকিস্তান ক্রিকেট দলের প্রধান কোচের দায়িত্ব পালন করেছেন আর্থার। তাঁর সময়ে চ্যাম্পিয়নস ট্রফি জয়সহ বেশি কিছু সাফল্য পায় পাকিস্তান। নিজের সময়ে রমজান মাসে পাকিস্তান ক্রিকেটের সাফল্যের কিছু উদাহরণও তুলে ধরেন আর্থার, ‘রমজানে আমরা চ্যাম্পিয়নস ট্রফি জিতেছি। রমজানেই আমরা লর্ডসে টেস্ট জিতেছি। যেটা আমার গুরুত্বপূর্ণ লেগেছে, তা হলো নিজেদের বিশ্বাস এবং রমজানের প্রতি খেলোয়াড়দের নিবেদন। এটা খুবই দারুণ ব্যাপার। পাশাপাশি যেটা উজ্জীবিত করে, তা হলো যেভাবে খেলোয়াড়েরা এর সঙ্গে মানিয়ে নেয়, সেটা। এটা খুবই দারুণ।’', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Fsports%2Fcricket%2F3k74x4bih4', 'https://twitter.com', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'pak-sports.webp', 'D:Softwarexampp	mpphpB682.tmp'),
(9, 'Business', 'Share Market, Currency', 'বৈশ্বিক শেয়ারবাজারে দরপতন', 'ইউরোপ, আমেরিকা ও এশিয়ার বড় বড় শেয়ারবাজারগুলোয় বিনিয়োগকারীরা এখন প্রবল স্নায়ুচাপে ভুগছেন। মার্কিন যুক্তরাষ্ট্রের পরপর দুটি ব্যাংক বন্ধ এবং সুইজারল্যান্ডের একটি ব্যাংক বিক্রি হয়ে যাওয়ায় দেশে দেশে শেয়ারবাজারের বিনিয়োগকারীরা যেন আস্থা হারিয়ে ফেলছেন। আতঙ্কে অধিকাংশ বিনিয়োগকারীই শেয়ার ছেড়ে দিচ্ছেন। ফলে শেয়ারবাজারগুলোয় বিশেষ করে ব্যাংকের শেয়ার দরে ব্যাপক হারে পতন ঘটছে।\r\n<br><br>\r\nসপ্তাহের শেষ লেনদেন দিবস শুক্রবার ইউরোপে...', 'ইউরোপ, আমেরিকা ও এশিয়ার বড় বড় শেয়ারবাজারগুলোয় বিনিয়োগকারীরা এখন প্রবল স্নায়ুচাপে ভুগছেন। মার্কিন যুক্তরাষ্ট্রের পরপর দুটি ব্যাংক বন্ধ এবং সুইজারল্যান্ডের একটি ব্যাংক বিক্রি হয়ে যাওয়ায় দেশে দেশে শেয়ারবাজারের বিনিয়োগকারীরা যেন আস্থা হারিয়ে ফেলছেন। আতঙ্কে অধিকাংশ বিনিয়োগকারীই শেয়ার ছেড়ে দিচ্ছেন। ফলে শেয়ারবাজারগুলোয় বিশেষ করে ব্যাংকের শেয়ার দরে ব্যাপক হারে পতন ঘটছে।\r\n<br><br>\r\nসপ্তাহের শেষ লেনদেন দিবস শুক্রবার ইউরোপে যুক্তরাজ্য, জার্মানি ও ফ্রান্স, এশিয়ায় জাপান, হংকং, ভারতসহ বিভিন্ন দেশের শেয়ারবাজারের মূল্যসূচক কমেছে।\r\n<br><br>\r\nএদিন সবচেয়ে বেশি পতন দেখেছে জার্মানির শেয়ারবাজার। সেখানে দয়েশে ব্যাংকের শেয়ারের দর একপর্যায়ে তো ১৪ শতাংশ কমে যায়। ইউরোপের অন্যান্য দেশেও ব্যাংকের শেয়ারের দামে বড় লোকসানের প্রবণতা দেখা গেছে। ইউরোপীয় দেশগুলোর মধ্যে জার্মানির কমার্জব্যাংক, ফ্রান্সের সোসাইট জেনারেলের শেয়ার দর ৬ শতাংশ করে পড়েছে। যুক্তরাজ্যে বার্কলেস ব্যাংকের শেয়ার দরে পতন ঘটেছে প্রায় ৫ শতাংশ।\r\n<br><br>\r\nদিনের লেনদেনের শুরুতেই মার্কিন যুক্তরাষ্ট্রের শেয়ারবাজারেও নিম্নমুখী প্রবণতা লক্ষ করা গেছে। সেখানে মর্গ্যান স্ট্যানলি, জেপি মরগান চেজ, গোল্ডম্যান স্যাকচ, ওয়েলস ফার্গো, ব্যাংক অব আমেরিকাসহ বিভিন্ন ব্যাংক ও আর্থিক প্রতিষ্ঠানের শেয়ারের দাম ১ থেকে ২ শতাংশ কমেছে। তবে দেশটির আঞ্চলিক ব্যাংকগুলোর মধ্যে ফার্স্ট রিপাবলিক ব্যাংক, প্যাকওয়েস্ট ব্যাংক করপোরেশন, ওয়েস্টার্ন অ্যালায়েন্স ব্যাংক করপোরেশন, ট্রুইস্ট ফিন্যান্সিয়াল করপোরশন প্রভৃতি প্রতিষ্ঠানের শেয়ারদর ১ থেকে ৫ শতাংশ পর্যন্ত কমেছে।\r\nইউরোপীয় দেশগুলোর মধ্যে শুক্রবার যুক্তরাজ্যে এফটিএসই ১০০ সূচক ১ দশমিক ৫৫ ও এফটিএসই সূচক ১ দশমিক ৪৫ শতাংশ কমেছে। ফ্রান্সের সিএসি ৪০ সূচক ২ দশমিক শূন্য ৬ শতাংশ, জার্মানির ড্যাক্স ২ দশমিক শূন্য ৯ শতাংশ, স্পেনের আইবিইএক্স ৩৫ সূচক ২ দশমিক ২৫ শতাংশ ও নেদারল্যান্ডসের এইএক্স ১ দশমিক ৭১ শতাংশ পড়েছে। প্যান ইউরোপিয়ান সূচক ইউরোস্টকস ৫০ কমেছে ২ দশমিক শূন্য ৭ শতাংশ।\r\n<br><br>\r\nযুক্তরাষ্ট্রের ডাউজোন্স সূচক শূন্য দশমিক ৬০ শতাংশ, ন্যাসডাক সূচক শূন্য দশমিক ৬১ শতাংশ ও এসঅ্যান্ডপি ৫০০ সূচক দশমিক ৫৬ শতাংশ পড়েছে।\r\n<br><br>\r\nএশিয়ার শেয়ারবাজারগুলোর মধ্যে জাপানের নিক্কেই ২২৫ সূচক দশমিক ১৩ শতাংশ, হংকংয়ের হেংসেং সূচক দশমিক ৬৭ শতাংশ, ভারতের বিএসই সেনসেক্স সূচক দশমিক ৬৯ শতাংশ কমেছে।\r\n<br><br>\r\nঅর্থনৈতিক প্রবৃদ্ধি ত্বরান্বিত করতে ২০০৮ সালের বৈশ্বিক আর্থিক সংকটের সময় এবং এরপর ২০২০ সালে কোভিড–১৯ মহামারি আঘাত হানার সময় কেন্দ্রীয় ব্যাংকগুলো সুদের হার কমিয়েছিল। কিন্তু গত বছর বা তারও কিছু আগে থেকে ব্যাংকগুলো ক্রমবর্ধমান মূল্যস্ফীতি নিয়ন্ত্রণে আনার জন্য দ্রুতগতিতেই নীতি–নির্ধারণী সুদের হার বাড়িয়েছে। এভাবে সুদের হার বাড়ানোর কারণে ব্যাংকগুলোর বিনিয়োগের ওপর প্রভাব ফেলতে শুরু করে। এতে বিনিয়োগকারীদের স্নায়ুর চাপ বৃদ্ধি পায়। তাঁরা উদ্বিগ্ন হয়ে পড়েন। বদৌলতে শেয়ারের দাম কমে যায়।\r\nএ ছাড়া নীতিনির্ধারণী সুদের হার বাড়ানোর ফলে তা মন্দার আশঙ্কা বাড়িয়ে দিয়েছে বলে মন্তব্য করেছেন এ জে বেল নামক প্রতিষ্ঠানের বিনিয়োগ পরিচালক রাস মোল্ড।\r\n<br><br>\r\nএদিকে জার্মানির বুন্দেস ব্যাংকের প্রেসিডেন্ট জোয়াকিম নাগেল বলেন, এখনো ব্যাপক মূল্যস্ফীতির অর্থ হলো কেন্দ্রীয় ব্যাংকগুলোকে নীতি সুদের হার আরও বাড়াতে হবে। তবে তিনি ডয়চে ব্যাংক সম্পর্কে মন্তব্য করতে অস্বীকৃতি জানান। তবে যুক্তরাষ্ট্র ও সুইজারল্যান্ডের ব্যাংক খাত নিয়ে মন্তব্য করেন। বলেন, যুক্তরাষ্ট্রে সিলিকন ভ্যালি ব্যাংক ও সিগনেচার ব্যাংকের ব্যর্থতা এবং সুইজারল্যান্ডে ইউবিএস ব্যাংক তার দীর্ঘদিনের প্রতিদ্বন্দ্বী ক্রেডিট সুইস কিনে নেওয়ার পর শেয়ারবাজারে অস্থিরতা প্রত্যাশিতই ছিল বলা যায়। এ ধরনের উল্লেখযোগ্য ঘটনা ঘটার পর সাধারণত পথ এলোমেলো হয়ে যায়।\r\n<br><br>\r\nযুক্তরাষ্ট্রের সিলিকন ভ্যালি ব্যাংকের পতনের ফলে বিনিয়োগকারীদের মধ্যে আস্থা হারানোর প্রবণতা আরও বেড়ে যায়। এই অবস্থায় ইউরোপ, আমেরিকার সরকার ও কেন্দ্রীয় ব্যাংকগুলো এখন বিনিয়োগকারীদের উদ্বেগ কমানোর চেষ্টা করছে।\r\n<br><br>\r\nমার্কিন অর্থমন্ত্রী জ্যানেট ইয়েলেন গত মঙ্গলবার এক বক্তৃতায় বলেছেন, পরিস্থিতি স্থিতিশীল হচ্ছে এবং মার্কিন ব্যাংকিং ব্যবস্থা ভালো আছে।\r\n<br><br>\r\nশুক্রবার ব্যাংক অব ইংল্যান্ডের (ব্রিটিশ কেন্দ্রীয় ব্যাংক) গভর্নর অ্যান্ড্রু বেইলি বলেন, যুক্তরাজ্যের ব্যাংকিং ব্যবস্থা ‘নিরাপদ ও ভালো আছে’।\r\nসম্প্রতি যুক্তরাষ্ট্রের সিলিকন ভ্যালি ব্যাংক (এসভিপি) ও সিগনেচার ব্যাংক বন্ধ হয়ে যায়। সেই জের কাটতে না কাটতেই গত সপ্তাহে বিশ্বের অন্যতম বৃহৎ ব্যাংক ক্রেডিট সুইসের বিপদে পড়ার খবর প্রকাশ পায়। ব্যাংকটি তারল্য বাড়াতে দেশটির কেন্দ্রীয় ব্যাংকের কাছ থেকে ৫ হাজার ৪০০ কোটি ডলার ঋণ নেয়। এরপরই জানা যায়, ক্রেডিট সুইসকে ইউবিএস এজির সঙ্গে একীভূত হওয়ার পরামর্শ দিয়েছে সুইজারল্যান্ডের কেন্দ্রীয় ব্যাংক। এতে ক্রেডিট সুইসের শেয়ার দরে ব্যাপক পতন ঘটে। এরপর দেশটির আরেক বৃহৎ ব্যাংক ইউবিএস ৩২৩ কোটি ডলারে ১৬৭ বছরের পুরোনো ব্যাংক ক্রেডিট সুইসকে কিনে নেয়। সূত্র: বিবিসি, রয়টার্স।', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Fbusiness%2Fmarket%2Fghiz4qmvlu', 'https://twitter.com', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'internationalShareMarket.webp', 'D:Softwarexampp	mpphp181F.tmp'),
(10, 'COVID-19', 'Pandamic, World Crisis, Virous', 'করোনা মহামারির বিদায়ের সময় জানাল ডব্লিউএইচও', 'বিশ্ব স্বাস্থ্য সংস্থার (ডব্লিউএইচও) প্রধান তেদরোস আধানোম গেব্রেয়াসুস বলেছেন, করোনা মহামারির গুরুতর পর্যায় চলতি বছরই বিদায় নিতে পারে। এর পরিপ্রেক্ষিতে তিনি আশা প্রকাশ করে বলেন, এ বছর বিশ্বজুড়ে করোনা-সংক্রান্ত জরুরি অবস্থা আর থাকবে না। বিদায় নেবে করোনা মহামারি।\r\n<br><br>\r\nজনস্বাস্থ্য খাতের সম্মানজনক থমাস ফ্রান্সিস জুনিয়র মেডেল ইন গ্লোবাল পাবলিক হেলথ পেয়েছেন তেদরোস আধানোম। গত সোমবার এ পুরস্কার...', 'বিশ্ব স্বাস্থ্য সংস্থার (ডব্লিউএইচও) প্রধান তেদরোস আধানোম গেব্রেয়াসুস বলেছেন, করোনা মহামারির গুরুতর পর্যায় চলতি বছরই বিদায় নিতে পারে। এর পরিপ্রেক্ষিতে তিনি আশা প্রকাশ করে বলেন, এ বছর বিশ্বজুড়ে করোনা-সংক্রান্ত জরুরি অবস্থা আর থাকবে না। বিদায় নেবে করোনা মহামারি।\r\n<br><br>\r\nজনস্বাস্থ্য খাতের সম্মানজনক থমাস ফ্রান্সিস জুনিয়র মেডেল ইন গ্লোবাল পাবলিক হেলথ পেয়েছেন তেদরোস আধানোম। গত সোমবার এ পুরস্কার গ্রহণ করেন তিনি। এ উপলক্ষে এক বিবৃতিতে সংস্থাটির প্রধান তেদরোস আধানোম তাঁর এ প্রত্যাশার কথা জানান। সোমবার বিশ্ব স্বাস্থ্য সংস্থার ওয়েবসাইটে তা প্রকাশ করা হয়েছে।', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Fworld%2Fpxzmd6tzqg', 'https://twitter.com', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'whopresident.webp', 'D:Softwarexampp	mpphpDF55.tmp'),
(11, 'Life Style', 'Life Tips, Fitness, Way of Living', 'টানা বসে থাকার অনেক বিপদ, কীভাবে এড়াবেন', 'টানা বসে থাকা শরীরের জন্য মোটেও ভালো নয়। এতে বেড়ে যায় ডায়াবেটিস, হৃদ্‌রোগ ও ক্যানসারের মতো জটিল সব রোগের আশঙ্কা। অথচ অনেককেই দিনের বেশির ভাগ সময় বসে থেকেই কাটিয়ে দিতে হয়। বিশেষ করে চাকরিজীবীদের একটা বড় অংশকে। সারা দিন টেবিলে বসে কাজ করতে হয় বলে তাঁদের চাকরিকে বলাই হয় ‘ডেস্ক জব’। এর বাইরেও অনেকে সারা...', 'টানা বসে থাকা শরীরের জন্য মোটেও ভালো নয়। এতে বেড়ে যায় ডায়াবেটিস, হৃদ্‌রোগ ও ক্যানসারের মতো জটিল সব রোগের আশঙ্কা। অথচ অনেককেই দিনের বেশির ভাগ সময় বসে থেকেই কাটিয়ে দিতে হয়। বিশেষ করে চাকরিজীবীদের একটা বড় অংশকে। সারা দিন টেবিলে বসে কাজ করতে হয় বলে তাঁদের চাকরিকে বলাই হয় ‘ডেস্ক জব’। এর বাইরেও অনেকে সারা দিন বসে থাকেন। অবসরের পরে এই প্রবণতা আরও বাড়ে। তাতে একই সঙ্গে বাড়তে থাকে ঝুঁকি। জেনে নিন কীভাবে ঝুঁকি এড়িয়ে চলবেন।\r\n<br> <br>\r\nটানা বসে থাকা ঠিক কী কারণে শরীরে খারাপ প্রভাব ফেলে, সে ব্যাপারে এখনো সবাই নিশ্চিত নয়। সাধারণভাবে ধরে নেওয়া হয়, এর জন্য দায়ী মাংসপেশির নিষ্ক্রিয় হয়ে থাকা। সে জন্য বলা হয়, টানা কাজ করার ফাঁকে ফাঁকে ছোট ছোট বিরতি নেওয়া। অন্তত প্রতি ঘণ্টায় একবার করে হলেও উঠে একটু হাঁটাহাঁটি করা। অন্তত এক মিনিটের জন্য হলেও। দ্রুত হাঁটারও দরকার নেই। হেলেদুলে হাঁটলেও চলবে। টানা বসে থাকলে শরীরের মাংসপেশিগুলো আড়ষ্ট হয়ে পড়ে। প্রয়োজন নড়াচড়া করে সেই আড়ষ্ট ভাব দূর করা। তবে সবচেয়ে ভালো হয় প্রতি আধা ঘণ্টা পরপর পাঁচ মিনিটের বিরতি নিতে পারলে।\r\n<br><br>\r\n<strong>বদলাতে হবে দৃষ্টিভঙ্গি</strong>\r\n<br><br>\r\nকিন্তু অধিকাংশ অফিসেই এটা করা মুশকিল। কাজের মাঝে কর্মীরা একটু করে হেঁটে বেড়াবেন, এটা প্রায় কর্মক্ষেত্রেই গ্রহণযোগ্য আচরণ নয়। এমনকি যেখানে এটা নিষেধ করা হয় না, সেখানেও এই কাজকে দেখা হতে পারে ফাঁকি দেওয়ার ছল হিসেবে। ঊর্ধ্বতনরা মনে করতে পারেন, যিনি নিয়মিত হাঁটছেন, তিনি আসলে কাজ কম করছেন। এই অনুশীলন থেকে বের হয়ে আসা জরুরি। কারণ যিনি টানা বসে কাজ করে যাচ্ছেন, তাঁর পক্ষে পুরো সময় মনোযোগ ধরে রাখাও কঠিন। অন্যদিকে নিয়মিত বিরতি নেওয়া কেবল শরীরের পক্ষেই উপকারী নয়। একই সঙ্গে কাজেও মনোযোগ বাড়ায়।\r\n<br><br>\r\nএটাও ঠিক, অফিসে সব সময় হাঁটাও সমীচীন নয়। অনেক অফিসে অত জায়গাও থাকে না যে সবাই একসঙ্গে বিরতি নিয়ে হেঁটে বেড়াতে পারবে। সে ক্ষেত্রে নিজের জায়গায় থেকেই নিয়মিত বিরতিতে হালকা ব্যায়ামের মতো করে নিতে পারেন। করতে পারেন বক্স স্কোয়াট। একটা বাক্স হাতে নিয়ে চেয়ার থেকে উঠে দাঁড়াবেন, আবার বসে পড়বেন। এভাবে কয়েকবার করলেই শরীরের আড়ষ্ট ভাব দূর হওয়ার কথা। কিংবা স্রেফ নিজের জায়গায় দাঁড়িয়ে হালকা কিছু ব্যায়াম করে নিতে পারেন। যেমন দুই হাত ছড়িয়ে টেনে নিয়ে, কিংবা শরীর পর্যায়ক্রমে দুই পাশে হেলিয়ে ব্যায়াম করতে পারেন।\r\n<br><br>\r\nঅনেক অফিসে হয়তো সেটাও সম্ভব না। কিংবা কোনো কোনো দিন এমন পরিস্থিতি হতে পারে, যে জায়গায় দাঁড়িয়েও ব্যায়াম করা সম্ভব হচ্ছে না। সে ক্ষেত্রে স্রেফ বসে থেকেই জোরে জোরে শ্বাস নিয়ে ছাড়ুন। তাতে অন্তত আড়ষ্ট ভাব খানিকটা দূর হবে। অনেক অফিসে আবার টানা বসার সমস্যা দূর করতে যোগ করা হয়েছে উঁচু টেবিল। যাতে দাঁড়িয়েও কাজ করা যায়। সেটা আসলে কতটা কার্যকরী, তা নিয়ে এখনো সংশয় রয়েছে। অনেকের মতেই, টানা বসে থাকা ও দাঁড়িয়ে থাকা আসলে একই ব্যাপার।|', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Flifestyle%2Fhealth%2F04e6s0941d', 'https://twitter.com', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'lifestyle1.webp', 'D:Softwarexampp	mpphp30BF.tmp'),
(12, 'World Affairs', 'Recent Issues, Recent Development, Invention', 'বিশ্বের প্রথম থ্রিডি-প্রিন্টেড রকেট উৎক্ষেপণের পরপরই ব্যর্থ', 'প্রায় সম্পূর্ণরূপে থ্রিডি-প্রিন্টেড যন্ত্রাংশ দিয়ে তৈরি রকেট টেরান-১ গত বুধবার রাতে উৎক্ষেপণ করা হয়। তবে তিনবারের চেষ্টায় উৎক্ষেপণ সফল হলেও কক্ষপথে পৌঁছাতে পারেনি রকেটটি।\r\n<br><br>\r\nরকেটের নির্মাতা প্রতিষ্ঠান যুক্তরাষ্ট্রের রিলেটিভিটি স্পেস জানিয়েছে, ছয় বছর আগে তৈরি কোম্পানির প্রথম মেটাল থ্রিডি–প্রিন্ট ছাড়া পরীক্ষামূলক এই ফ্লাইটে আর কিছুই ছিল না। উদ্ভাবনকারীরা রকেটটিকে ১২৫ মাইল উঁচু কক্ষপথে স্থাপন করতে চেয়েছিল,...', 'প্রায় সম্পূর্ণরূপে থ্রিডি-প্রিন্টেড যন্ত্রাংশ দিয়ে তৈরি রকেট টেরান-১ গত বুধবার রাতে উৎক্ষেপণ করা হয়। তবে তিনবারের চেষ্টায় উৎক্ষেপণ সফল হলেও কক্ষপথে পৌঁছাতে পারেনি রকেটটি।\r\n<br><br>\r\nরকেটের নির্মাতা প্রতিষ্ঠান যুক্তরাষ্ট্রের রিলেটিভিটি স্পেস জানিয়েছে, ছয় বছর আগে তৈরি কোম্পানির প্রথম মেটাল থ্রিডি–প্রিন্ট ছাড়া পরীক্ষামূলক এই ফ্লাইটে আর কিছুই ছিল না। উদ্ভাবনকারীরা রকেটটিকে ১২৫ মাইল উঁচু কক্ষপথে স্থাপন করতে চেয়েছিল, তবে পৃথিবীর নিম্ন কক্ষপথে পৌঁছানোর আগেই রকেটের ওপরের অংশে আগুন ধরে যায়।\r\n<br><br>\r\nযুক্তরাষ্ট্রের ফ্লোরিডায় অবস্থিত কেপ ক্যানাভেরাল স্পেস ফোর্স স্টেশন থেকে উৎক্ষেপণ করার পর প্রথম ধাপে রকেটটি ঠিকঠাকই কাজ করেছিল। কিন্তু এর পরই ওপরের অংশে আগুন জ্বলে উঠতে দেখা যায়, তারপর বন্ধ হয়ে আটলান্টিকে ধসে পড়ে।\r\n<br><br>\r\nরিলেটিভিটি স্পেসের টেকনিক্যাল প্রোগ্রাম ম্যানেজার আরওয়া তিজানি ক্যালি বলেন, ‘কেউ কখনো থ্রিডি প্রিন্টেড রকেট পৃথিবীর নিম্ন কক্ষপথে পাঠানোর চেষ্টা করেনি। আমরা হয়তো পুরোপুরি সফল হইনি, তবে প্রমাণ করতে পেরেছি যে থ্রিডি প্রিন্টেড রকেট ওড়ানো সম্ভব।’\r\nরকেট নির্মাণ প্রতিষ্ঠান রিলেটিভিটি স্পেস বলেছে, থ্রিডি-প্রিন্টেড ধাতব অংশগুলো দিয়ে টেরান-১ রকেটের ৮৫ শতাংশ তৈরি হয়েছে। রকেটের বড় সংস্করণে আরও বেশি কিছু থাকবে এবং একাধিক ফ্লাইটের জন্য বারবার ব্যবহার করা হবে।\r\n<br><br>\r\n২০১৫ সালে দুজন তরুণ মহাকাশ প্রকৌশলী রিলেটিভিটি স্পেস তৈরি করে। প্রতিষ্ঠানটির সদর দপ্তর যুক্তরাষ্ট্রের ক্যালিফোর্নিয়ার লং বিচে।', 'https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.prothomalo.com%2Fworld%2Fgtk0ztzs2k', 'sadsaddad', 'Admin', 'Nowshad Alve', 3, 'Mar 24, 2023', '', 'recentworlds.webp', 'D:Softwarexampp	mpphpB687.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `palki__tag`
--

CREATE TABLE `palki__tag` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tag_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `palki__tag`
--

INSERT INTO `palki__tag` (`tag_id`, `tag`, `tag_description`) VALUES
(9, 'International Politics', 'International political issues'),
(10, 'Local Politics', 'Local political issues'),
(11, 'Foreign Policy', 'The post about foreign policy'),
(12, 'Political Relation', 'Political relations between two countries.'),
(13, 'Recent Issues', 'Highlighting the recent issues which occurs globally.'),
(14, 'Cricket', 'International Cricket news.'),
(15, 'Coach', 'Coach of a sport game.'),
(16, 'Share Market', 'Share market news.'),
(17, 'Currency', 'International Currency.'),
(18, 'Pandamic', 'All pandemic across the globe.'),
(19, 'World Crisis', 'Crisis in the world.'),
(20, 'Virous', 'Virous Attack'),
(21, 'Life Tips', 'Tips for make life easy'),
(22, 'Fitness', 'Importance of fitness.'),
(23, 'Way of Living', 'Way of lead our life.'),
(24, 'Recent Development', 'Recent development sectors.'),
(25, 'Invention', 'New inventions.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `palki_admin`
--
ALTER TABLE `palki_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `palki__category`
--
ALTER TABLE `palki__category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `palki__comments`
--
ALTER TABLE `palki__comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `palki__messages`
--
ALTER TABLE `palki__messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palki__post`
--
ALTER TABLE `palki__post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_tittle` (`post_tittle`);

--
-- Indexes for table `palki__tag`
--
ALTER TABLE `palki__tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `palki_admin`
--
ALTER TABLE `palki_admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `palki__category`
--
ALTER TABLE `palki__category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `palki__comments`
--
ALTER TABLE `palki__comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `palki__messages`
--
ALTER TABLE `palki__messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `palki__post`
--
ALTER TABLE `palki__post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `palki__tag`
--
ALTER TABLE `palki__tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
