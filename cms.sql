-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 27, 2017 at 10:18 AM
-- Server version: 10.2.8-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Others'),
(22, 'Bangladeshi Recipe');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(23, 1501312970, 'Tahsin Masrur', 'user', 17, 'tama.tama@gmail.com', '', 'unknown-picture.png', 'Yammy!!! ', 'approve'),
(24, 1501312998, 'Azmain Yakin Srizon', 'srizon', 17, 'azmainsrizon@gmail.com', '', 'user-4.png', ';)', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(36, 'Jeera-Pani-2.jpg'),
(37, 'jeera-pani-3.jpg'),
(40, 'Whole-spice-beef-curry-2.jpg'),
(41, 'Whole-spice-beef-curry-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`, `views`, `status`) VALUES
(17, 1501289277, 'A WELCOME DRINK FOR SUMMER PARTIES â€“ REFRESHING JEERA PANI', 'srizon', 'user-4.png', 'jeera-pani-1.jpg', 'Bangladeshi Recipe', 'welcome, refreshing, zeera, pani, drink, bangladeshi, recipe, srizon, azmain, yakin', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;</p>\r\n<p>Tangy, sweet, spicy, and refreshing. Tamarind, molasses, cumin, and mint! Delicately flavored with roasted cumin powder and black salt, jeera pani is a refreshing welcome drink sure to perk you up on a hot summer day.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/Jeera-Pani-2.jpg\" alt=\"Jeera-Pani-2.jpg\" width=\"400\" height=\"338\" /></p>\r\n<p>Jeera (à¦œà¦¿à¦°à¦¾) in Bangla means cumin and pani (à¦ªà¦¾à¦¨à¦¿) is water. This cumin water drink boasts fresh, lively flavors and is generally served as an appetizer or welcome drink. I first encountered jeera pani at a restaurant during a trip to Bangladesh several years ago. The restaurant welcomes all the guests with this flavorful drink during summer. I was very intrigued by this very popular summer drink that I had to make at home to cool off from the Texas heat.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/jeera-pani-3.jpg\" alt=\"jeera-pani-3.jpg\" width=\"400\" height=\"549\" /></p>\r\n<p>This week being the last week of Ramadan, jeera pani will be a perfect drink to break fast during iftar or a refreshing beverage to welcome family, friends and the neighbors into your home on Eid.</p>\r\n<p>Enjoy!</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Recipe : Jeera Pani</strong></p>\r\n<p><strong>Ingredients:</strong><br /><strong>1.&nbsp;</strong>4 tablespoon molasses<br /><strong>2.&nbsp;</strong>4 tablespoon sugar<br /><strong>3.&nbsp;</strong>2 cups water<br /><strong>4.&nbsp;</strong>4 teaspoon lemon juice<br /><strong>5.&nbsp;</strong>4 teaspoon tamarind paste<br /><strong>6.&nbsp;</strong>1 teaspoon roasted cumin powder<br /><strong>7.&nbsp;</strong>&frac14; teaspoon black salt</p>\r\n<p><strong>Steps:</strong><br /><strong>1.</strong> In a small saucepan, bring sugar, molasses and 1 cup water to a boil. Simmer and stir until the sugar has fully dissolved. Remove from heat and cool completely.<br /><strong>2.</strong> Place lemon juice and tamarind paste in a pitcher with syrup and remaining water. Stir mixture.<br /><strong>3.</strong> Add cumin powder, black salt and wait 10 minutes for flavors to blend.<br /><strong>4.</strong> Pour over ice to serve.</p>\r\n<p><strong>Notes:</strong></p>\r\n<ul>\r\n<li>Adjust sweetness according to taste.</li>\r\n<li>You may strain the jeera pani through a fine mesh after 10 minutes of adding the cumin powder if you like. However, the cumin(jeera) flavor will lessen if you strain.</li>\r\n</ul>\r\n</body>\r\n</html>', 21, 'publish'),
(18, 1501291025, 'EID-UL-ADHA SPECIAL BEEF CURRY WITH WHOLE SPICES', 'srizon', 'user-4.png', 'Whole-spice-beef-curry-1.jpg', 'Bangladeshi Recipe', 'beef, curry, eid-ul-adha, special, bangladeshi, recipe, azmain, yakin, srizon', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Â </p>\r\n<p>After the congregational Eid prayers on the first morning of the festival, families either convene for the slaughter or do it individually at their own homes. In my childhood home, within minutes of the sacrifice, this special beef curry would be on the stove. The first of many meat dishes mom would prepare for Eid.</p>\r\n<p>Our family tradition was to eat khichuri and this beef curry with whole spices for lunch. My husband says that the first meal at their home after qurbani was just plain rice with this scrumptious curry. Even now, if mom is celebrating Eid with us, I request her to make this beef curry and khichuri for lunch while I take the backseat and assist her in the kitchen. Made from the freshest beef and the freshest spices, the curry is slow cooked, allowing the meat to release its juices. As the beef becomes tender, the curry develops flavor after mixing with the spices and fills each corner of the house with an irresistible aroma just too hard to resist.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/Whole-spice-beef-curry-2.jpg\" alt=\"Whole-spice-beef-curry-2.jpg\" width=\"400\" height=\"600\" /></p>\r\n<p>Whether you celebrate Eid or not, fill your kitchen with the scents of Bangladesh by cooking up this aromatic beef curry. Fiery and fresh spices incorporated with the freshest beef is the most irresistible and comfort food of any Bangladeshi Muslim family.<br />This is the most basic and the simplest curry that Bangladeshi home cooks should master. No garnish, no extra frills, just simple yet lip-smackingly delicious. This is simplicity at its best.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/Whole-spice-beef-curry-3.jpg\" alt=\"Whole-spice-beef-curry-3.jpg\" width=\"400\" height=\"514\" /></p>\r\n<p>For our Bengali palate, the curry tastes better the next day. Warm leftovers thoroughly on stove and enjoy!</p>\r\n<p>Â </p>\r\n<p>Â </p>\r\n<p><strong>Recipe : Spicy Beef Curry with whole spices</strong></p>\r\n<p><strong>Ingredients:</strong><br /><strong>1.Â </strong>2 lbs beef<br /><strong>2.Â </strong>Â½ cup oil<br /><strong>3.Â </strong>1 cup onion, sliced<br /><strong>4.Â </strong>2 tablespoon ginger, coarsely chopped<br /><strong>5.Â </strong>5-6 garlic cloves, coarsely chopped<br /><strong>6.Â </strong>2-3 cloves<br /><strong>7.Â </strong>2-3 cinnamon, about 1â€ each<br /><strong>8.Â </strong>3-4 black cardamom<br /><strong>9.Â </strong>1 teaspoon coriander powder<br /><strong>10.Â </strong>1 tablespoon cumin seeds<br /><strong>11.Â </strong>6-8 black peppercorn<br /><strong>12.Â </strong>1-2 bay leaves<br /><strong>13.Â </strong>1 teaspoon turmeric<br /><strong>14.Â </strong>3 tablespoons yogurt<br /><strong>15.Â </strong>5-8 whole red chilli, slited or broken into pieces<br /><strong>16.Â </strong>1 Â½ teaspoon Salt, or according to taste</p>\r\n<p><strong>Steps:</strong><br /><strong>1.</strong> Wash meat and drain water.<br /><strong>2.</strong> Add all ingredients and marinate about 20-30 minutes.<br /><strong>3.</strong> Turn on stove and cook meat in medium low heat until oil starts releasing from the side and beef is tender. Stir occasionally in between and add little water if it gets too dry or starts sticking at the bottom of the pan.</p>\r\n<p><strong>Notes :</strong><br /><strong>1.</strong>Â Beef releases a lot of water while cooking. Depending on the quality of beef, you may need to add water to make the beef tender. When cooking with beef in the US, I usually do not add water. Use your judgment here.<br /><strong>2.Â </strong>Adjust chili per taste.<br /><strong>3.Â </strong>Warming this curry in microwave doesnâ€™t do justice to this beef curry so please warm on stovetop. Traditionally, a huge batch of meat is usually cooked and savored for several days.</p>\r\n</body>\r\n</html>', 22, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$quickbrownfoxjumpsover',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`, `details`, `salt`) VALUES
(17, 1501289084, 'Azmain Yakin', 'Srizon', 'srizon', 'azmainsrizon@gmail.com', 'user-4.png', '$2y$10$quickbrownfoxjumpsoveeY9pMFS/wQwPv8a.ue25tQ49uiBt9jlC', 'admin', 'Hello...\r\nI\'m Azmain Yakin Srizon, just a tech-freak guy. Love to learn new things everyday, share them & enjoy what I\'m doing.', '$2y$10$quickbrownfoxjumpsover');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
