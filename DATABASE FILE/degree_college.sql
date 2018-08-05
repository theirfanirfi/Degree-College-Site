-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 01:22 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `degree_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_tbl`
--

CREATE TABLE `about_us_tbl` (
  `about_us_id` int(10) NOT NULL,
  `about_us_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_us_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us_tbl`
--

INSERT INTO `about_us_tbl` (`about_us_id`, `about_us_title`, `about_us_description`) VALUES
(9, 'Degree College Swat Kabal', 'Jahanzeb College, an invaluable gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities. This institution provides quality education to the youth of this area in various disciplines. Presently, it offers admissions in seven different disciplines at postgraduate level and in nine disciplines at the BS level. The BS 4 year integrated degree program is successfully going on here in this institution and has attracted students of both genders from all parts of the province. The demand of the public for further expansion of the BS 4 year degree program is always on the increase, and hopefully, keeping in view the need of the time, we will initiate this program in more disciplines in the near future. I see that time is not far, when Jahanzeb College would become a full pledged university on its own. I wish and hope that both the teachers and taught of this institution would add laurels to the good name of this college and would let no stone unturned in making this dream a reality. (Principal Prof. Muhammad Zahir Shah)');

-- --------------------------------------------------------

--
-- Table structure for table `academic_tbl`
--

CREATE TABLE `academic_tbl` (
  `academic_id` int(25) NOT NULL,
  `academic_level` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `academic_tbl`
--

INSERT INTO `academic_tbl` (`academic_id`, `academic_level`) VALUES
(5, 'Diplomas'),
(8, 'Degree');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contact_id` int(20) NOT NULL,
  `job_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`contact_id`, `job_title`, `phone_no`, `mobile_no`, `email`) VALUES
(2, 'managers', '7774444', '87687', 'abdur@jdfq'),
(8, 'Programers', '112233', '334455', 'programs@gmail.com'),
(9, 'Teacher', '778899', '6556565665', 'teacher@gmail.co'),
(10, 'Cleanar', '1112222', '1111222222111', 'cleanar@gmail.com'),
(11, 'driver', '999999', '88888', 'driver@gmail.com'),
(12, 'shjd', '7676', '67', 'hghghgj@jghsdgh'),
(13, 'Manager', '+923479124007', '+923479124007', 'civilxpert@gmail.com'),
(14, 'khan', '6556657', '7667776', 'khansw@gmail.com'),
(15, 'Office', '67665', '4444444', 'officesw@gmail.com'),
(16, 'Result (Office)', '6776878787', '65656776', 'resultsw@gmail.com'),
(17, 'Staff Room', '676767', '88787', 'staffroomsw@gmail.com'),
(18, 'Principal (Office)', '666777899', '556678899', 'principalsw@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `degree_admin`
--

CREATE TABLE `degree_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_pass` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `degree_admin`
--

INSERT INTO `degree_admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', '1a1dc91c907325c69271ddf0c944bc72');

-- --------------------------------------------------------

--
-- Table structure for table `experience_tbl`
--

CREATE TABLE `experience_tbl` (
  `exp_id` int(11) NOT NULL,
  `exp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experience_tbl`
--

INSERT INTO `experience_tbl` (`exp_id`, `exp_name`) VALUES
(2, 'Affiliations'),
(3, 'Experience');

-- --------------------------------------------------------

--
-- Table structure for table `exp_aff_tbl`
--

CREATE TABLE `exp_aff_tbl` (
  `id` int(11) NOT NULL,
  `exp_aff_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exp_aff_description` text COLLATE utf8_unicode_ci NOT NULL,
  `exp_aff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exp_aff_tbl`
--

INSERT INTO `exp_aff_tbl` (`id`, `exp_aff_name`, `exp_aff_description`, `exp_aff_id`) VALUES
(2, 'Saidu Medical College', 'ok. This is Saidu Medical Colleg.&nbsp;This is Saidu Medical Colleg.&nbsp;This is Saidu Medical Colleg.&nbsp; This is Saidu Medical Colleg.&nbsp;This is Saidu Medical Colleg.&nbsp;This is Saidu Medical Colleg.&nbsp;', 2),
(3, 'KMU', 'This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp; This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;This is KMU.&nbsp;', 3),
(6, 'Nursing College', 'This is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing CollegeThis is Nursing College', 3),
(7, 'jkfsdlf', 'jlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjf jlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjfjlsdjflsflkjf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `footer_tbl`
--

CREATE TABLE `footer_tbl` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer_tbl`
--

INSERT INTO `footer_tbl` (`id`, `location`, `fb_url`, `twitter_url`, `contact_officer_name`, `contact_officer_designation`, `contact_officer_phone`, `contact_officer_mobile`, `contact_officer_email`) VALUES
(2, 'Kabal, Swat', 'www.fb.com', 'www.twitter.com', 'Irfan Irfi', 'Principal', '+9212345678912', '+9212345678912', 'xyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

CREATE TABLE `gallery_tbl` (
  `image_id` int(100) NOT NULL,
  `image_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`image_id`, `image_name`, `image_date`) VALUES
(46, '4-480.jpg', '0017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `home_tbl`
--

CREATE TABLE `home_tbl` (
  `home_id` int(11) NOT NULL,
  `principal_msg_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg_description` text COLLATE utf8_unicode_ci,
  `principal_img_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_tbl`
--

INSERT INTO `home_tbl` (`home_id`, `principal_msg_title`, `msg_description`, `principal_img_name`) VALUES
(31, 'Nursing Collage Swat', 'Jahanzeb College, an invaluable gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities. This institution provides quality education to the youth of this area in various disciplines. Presently, it offers admissions in seven different disciplines at postgraduate level and in nine disciplines at the BS level. The BS 4 year integrated degree program is successfully going on here in this institution and has attracted students of both genders from all parts of the province. The demand of the public for further expansion of the BS 4 year degree program is always on the increase, and hopefully, keeping in view the need of the time, we will initiate this program in more disciplines in the near future. I see that time is not far, when Jahanzeb College would become a full pledged university on its own. I wish and hope that both the teachers and taught of this institution would add laurels to the good name of this college and would let no stone unturned in making this dream a reality. (Principal Prof. Muhammad Zahir Shah)', 'Principal1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `merit_list`
--

CREATE TABLE `merit_list` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_fname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domicile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marks_obtained` int(5) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merit_list_tbl`
--

CREATE TABLE `merit_list_tbl` (
  `merit_list_id` int(11) NOT NULL,
  `merit_list_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `merit_list_description` text COLLATE utf8_unicode_ci,
  `merit_list_date` date DEFAULT NULL,
  `merit_list_file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merit_list_tbl`
--

INSERT INTO `merit_list_tbl` (`merit_list_id`, `merit_list_title`, `merit_list_description`, `merit_list_date`, `merit_list_file_name`, `program_id`) VALUES
(43, 'Final Merit List', 'This is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;\r\nThis is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;\r\nThis is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;This is final merit list.&nbsp;', '2017-01-23', 'New Microsoft Word Document.docx', 26),
(44, 'Mid Psychology Merit List', 'This is 2nd last merit list.', '2017-02-01', 'Assignment.doc', 26);

-- --------------------------------------------------------

--
-- Table structure for table `news_tbl`
--

CREATE TABLE `news_tbl` (
  `news_id` int(50) NOT NULL,
  `news_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_details` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_tbl`
--

INSERT INTO `news_tbl` (`news_id`, `news_title`, `news_details`, `news_date`) VALUES
(1, 'Calendar', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities..................', '2016-05-11'),
(4, 'Result', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities..........................', '2016-06-08'),
(5, 'Sport Day', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities............................................', '2016-06-01'),
(9, 'Weather', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities.', '2016-06-09'),
(10, 'Holiday', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities.', '2016-06-01'),
(11, 'About Sport', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities.', '2016-12-31'),
(12, 'Merit List', 'Jahanzeb College, an gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country. The graduates from this institution serve the nation and the international community successfully in various capacities.................................................', '2016-07-19'),
(13, 'This is news', 'This is news.&nbsp;This is news.&nbsp;This is news.&nbsp;This is news.&nbsp; This is news.&nbsp;This is news.&nbsp;This is news.', '2017-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `our_achievement_tbl`
--

CREATE TABLE `our_achievement_tbl` (
  `achievement_id` int(11) NOT NULL,
  `achievement_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `achievement_description` text COLLATE utf8_unicode_ci,
  `achievement_image_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `our_achievement_tbl`
--

INSERT INTO `our_achievement_tbl` (`achievement_id`, `achievement_title`, `achievement_description`, `achievement_image_name`) VALUES
(2, 'Our Achievement', 'Jahanzeb College, an invaluable gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country.', '11025821_1021575894519983_8178787166451137415_n.jpg'),
(3, 'Our Mission', 'Jahanzeb College, an invaluable gift of the ex-ruler of Swat with its majestic building laying in the heart of the lush green valley, has a fecund and glorious past and enjoys a towering status among the educational institutions of this country.', 'helpothers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `our_mission_tbl`
--

CREATE TABLE `our_mission_tbl` (
  `mission_id` int(11) NOT NULL,
  `mission_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mission_description` text COLLATE utf8_unicode_ci,
  `mission_image_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `our_mission_tbl`
--

INSERT INTO `our_mission_tbl` (`mission_id`, `mission_title`, `mission_description`, `mission_image_name`) VALUES
(1, 'wertyuuuuuuuu111', 'hsd111111111111111', 'alone-quotes-tumblr-334.jpg'),
(2, 'h', 'ghsd', '1133494938.png'),
(4, 'dsghhjas', 's111111jhsd', 'itm_cute-dolls-pictures-for-fb-profile2013-05-04_04-39-37_2.jpg'),
(5, 'sdhjqhdjs', 'dshj', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program_gallery`
--

CREATE TABLE `program_gallery` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_date` date NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_gallery`
--

INSERT INTO `program_gallery` (`img_id`, `img_name`, `img_date`, `program_id`) VALUES
(2, 'b2.jpg', '2017-01-24', 25);

-- --------------------------------------------------------

--
-- Table structure for table `program_tbl`
--

CREATE TABLE `program_tbl` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_description` text COLLATE utf8_unicode_ci,
  `academic_id` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_tbl`
--

INSERT INTO `program_tbl` (`program_id`, `program_name`, `program_description`, `academic_id`) VALUES
(24, 'BSc Cardiolgy', 'Introduction/Description Within the realm of organization and work environment, the importance of human resources can never be overlooked. Amalgamating psychology in this domain has resulted in enrichment of manpower of organizations/industries on the global level. The healthier the human resources of an organization are mentally, the richer are the chances for economic progress of that organization as well as the entire country. The need for such a collaboration is also increasing in our country and now many organizations are including professional psychologists in various areas of organizations i.e. recruitment, screening, evaluation, morale boosting, etc. The M.Sc. (Organizational Psychology) Program offers a vast scope to the students to understand the peculiarities of organizational domain by viewing them from the lens of a psychologist. Program Objectives Following are the main objectives of the Program: To provide an understanding of all the fundamental psychological issues/theories regarding the behavior of individuals in organizational settings; To equip students with a wide range of skills and methods that they can apply in organizational setting; To sharpen the analytical skills of students based on objective and pragmatic investigation of psychological dynamics in the organizations;', 8),
(25, 'BSc Radiology', 'Introduction/Description Master&rsquo;s program in Mass Communication aims to provide learners a sound theoretical knowledge in the field of mass media. Whether it is the mushroom growth of TV channels in the country or increasing trend of online journalism along with all-time reliable print media, mass communication is expanding on a fast pace in its all dimensions. Thus it is expected to be a golden opportunity for those who are aspiring to work as broadcast journalists, reporters and producers in Television, Radio or Newspapers. Professionals, already associated to this field can also opt for this program in order to enhance their qualification. This study program will equip the students with reporting techniques, stages of news production, media laws and behind the camera operations in order to achieve professional competence demanded by the industry. Program Objectives After completing M.Sc Mass Communication, the students will be able to: Develop an ability to understand the latest trends in mass media; Think critically towards media contents and their impact on society; Develop a practical understanding of field through internship program; Cultivate research culture in the field of mass communication; Develop skills for creative writing; Join print or electronic media with a sound background of subject knowledge;', 8),
(26, 'BSc Nursing (BSN)', 'Introduction/Description Psychology is the science of behavior and the mind. In the BS Program, the study of Psychology provides an understanding of the basic processes of sensation, perception, learning, cognition, development, and personality along with the principles of Social Psychology, Clinical Psychology, and Behavioral Neuroscience. The knowledge of psychological principles and scientific methods for evaluating theories and research in the Social Sciences is essential in our rapidly changing society. The basic goal of the B.S. Program is to integrate the scientific foundation of Psychology with the strong background of Humanities along with basic science to better prepare students for the advanced training in Psychology, Medicine, Cognitive Science, Neuroscience, and other related disciplines. The B.S. Degree Program is explicitly aimed at preparing the students for advanced graduate study in the sciences and science-based professions. Program Objectives Following are the main objectives of the Program: To equip students with conceptual tools, scientific knowledge and practical skills so that they can gain a deeper understanding of themselves, others and human existence in general ; To articulate how psychological principles can be used to explain and understand the dynamics of social and psychological issues; To develop insights among students about how psychological principles can be used to understand and improve lifelong learning, social skills and environment related issues;', 8),
(27, 'Health Technolgy', 'this is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;', 5),
(28, 'Ultra Sound Technology', 'this is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\nthis is Health Technology.&nbsp;this is Health Technology.&nbsp;\r\n&nbsp;', 5);

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `slider_img_id` int(5) NOT NULL,
  `slider_img_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_img_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`slider_img_id`, `slider_img_title`, `slider_img_name`) VALUES
(18, 'Degree College', '381008-SwatuniversityPHOTOFAZALKHALIQTHEEXPRESSTRIBUNE-1337366106-584-640x480.JPG'),
(19, 'Degree College', 'campus.jpg'),
(20, 'Degree College', 'University-of-Swat.jpg'),
(21, 'This is image', '1.jpg'),
(22, 'This is image', '4.jpg'),
(23, 'This is another image', 'train.jpg'),
(24, 'This is Nursing College', 'b1.jpg'),
(25, 'This is Nursing College', 'b2.jpg'),
(26, 'This is Nursing College', 'nursing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `staff_id` int(60) NOT NULL,
  `staff_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_qualification` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_img_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`staff_id`, `staff_name`, `staff_designation`, `staff_qualification`, `staff_email`, `staff_img_name`, `program_id`) VALUES
(48, 'amir khan', 'Teacher', 'Psychology', 'amirsw@gmail.com', 'Native_English_Speakers.png', 24),
(49, 'waqar', 'Teacher', 'Psychology', 'waqarsw@gmail.com', 'teach-in-hong-kong-07.jpg', 24),
(50, 'Faroq', 'Teacher', 'Mass Communication', 'faroqsw@gmail.com', 'wachu_error.png', 25),
(51, 'adil khan', 'Teacher', 'Mass Communication', 'adilsw@gmail.com', 'working(1).jpg', 25),
(52, 'salman', 'Teacher', 'Psychology', 'smalmansw@gmail.com', 'a.jpg', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `academic_tbl`
--
ALTER TABLE `academic_tbl`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `degree_admin`
--
ALTER TABLE `degree_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `exp_aff_tbl`
--
ALTER TABLE `exp_aff_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_tbl`
--
ALTER TABLE `footer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `home_tbl`
--
ALTER TABLE `home_tbl`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `merit_list`
--
ALTER TABLE `merit_list`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `merit_list_tbl`
--
ALTER TABLE `merit_list_tbl`
  ADD PRIMARY KEY (`merit_list_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `news_tbl`
--
ALTER TABLE `news_tbl`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `our_achievement_tbl`
--
ALTER TABLE `our_achievement_tbl`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `our_mission_tbl`
--
ALTER TABLE `our_mission_tbl`
  ADD PRIMARY KEY (`mission_id`);

--
-- Indexes for table `program_gallery`
--
ALTER TABLE `program_gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `program_tbl`
--
ALTER TABLE `program_tbl`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `academic_id` (`academic_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`slider_img_id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `program_id` (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  MODIFY `about_us_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `academic_tbl`
--
ALTER TABLE `academic_tbl`
  MODIFY `academic_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `degree_admin`
--
ALTER TABLE `degree_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exp_aff_tbl`
--
ALTER TABLE `exp_aff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `footer_tbl`
--
ALTER TABLE `footer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `home_tbl`
--
ALTER TABLE `home_tbl`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `merit_list`
--
ALTER TABLE `merit_list`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `merit_list_tbl`
--
ALTER TABLE `merit_list_tbl`
  MODIFY `merit_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `news_tbl`
--
ALTER TABLE `news_tbl`
  MODIFY `news_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `our_achievement_tbl`
--
ALTER TABLE `our_achievement_tbl`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `our_mission_tbl`
--
ALTER TABLE `our_mission_tbl`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `program_gallery`
--
ALTER TABLE `program_gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `slider_img_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `staff_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `merit_list`
--
ALTER TABLE `merit_list`
  ADD CONSTRAINT `merit_list_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program_tbl` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `merit_list_tbl`
--
ALTER TABLE `merit_list_tbl`
  ADD CONSTRAINT `merit_list_tbl_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program_tbl` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_tbl`
--
ALTER TABLE `program_tbl`
  ADD CONSTRAINT `program_tbl_ibfk_1` FOREIGN KEY (`academic_id`) REFERENCES `academic_tbl` (`academic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD CONSTRAINT `staff_tbl_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program_tbl` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
