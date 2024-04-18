-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 12:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db5`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerFirstName` varchar(255) DEFAULT NULL,
  `CustomerLastName` varchar(255) DEFAULT NULL,
  `CustomerPhone` varchar(15) DEFAULT NULL,
  `CustomerPassword` varchar(255) DEFAULT NULL,
  `order_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerFirstName`, `CustomerLastName`, `CustomerPhone`, `CustomerPassword`, `order_count`) VALUES
(41, 'kjml', 'hj', '877', NULL, NULL),
(42, 'jk', 'kj', '76', NULL, NULL),
(43, 'dfh', 'gj', '35', NULL, NULL),
(44, 'b,j', 'jgh', '65', NULL, NULL),
(45, 'ertg', 'ert', '34', NULL, NULL),
(46, 'GD', 'TER', '456', NULL, NULL),
(47, 'FDF', 'GFD', '43', NULL, NULL),
(48, ',MMDF', 'FDFD', '43', NULL, NULL),
(49, 'rfe', 'erw', '32', NULL, NULL),
(50, 'sf', 'wef', 'rt22', NULL, NULL),
(51, 'jnk', 'm ,', '98', NULL, NULL),
(52, 'ms', 'ms', '123', '123', NULL),
(53, 'ms', 'sm', '123', NULL, NULL),
(54, 'ms', 'ms', '1234', NULL, NULL),
(55, 'msms', 'msms', '12345', NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgID` int(11) NOT NULL,
  `DishCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Dishimage` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DishName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgID`, `DishCategory`, `Dishimage`, `DishName`) VALUES
(1, 'مقبلات', 'img\\Appetizers\\Caecer_salad_.png', 'سلطة سيزر'),
(2, 'مقبلات', 'img/Appetizers/Crab_salad_.png', 'سلطة السلطعون'),
(3, 'مقبلات', 'img/Appetizers/crispy_salad_.png', 'سلطة كرسبي'),
(4, 'مقبلات', 'img/Appetizers/Steak_Salad_.png', 'سلطة ستيك لحم'),
(5, 'مقبلات', 'img/Appetizers/JarjerSalad.png', 'سلطة جرجير'),
(6, 'مقبلات', 'img/Appetizers/greekSalad.png', 'سلطة يونانية'),
(7, 'مقبلات', 'img/Appetizers/BBQ_wings_.png', 'أجنحة الباربكيو'),
(8, 'مقبلات', 'img/Appetizers/Bufflo_wings_.png', 'أجنحة البافلو'),
(9, 'مقبلات', 'img/Appetizers/Breschetta_Bolognese_.png', 'برسكت بولونيز'),
(10, 'مقبلات', 'img/Appetizers/Breschetta_Basilikio_.png', 'برسكت باسكيليتو'),
(11, 'مقبلات', 'img/Appetizers/GarlicBread_.png', 'خبز الثوم'),
(12, ' مقبلات', 'img/Appetizers/Widges_.png', 'بطاطا ودجز'),
(13, 'بيتزا', 'img/Pizza/marghertia_pizza_.png', 'بيتزا مارغريتا'),
(14, 'بيتزا', 'img/Pizza/four_cheeses_pizza_.png', 'بيتزا الأجبان الأربعة'),
(15, 'بيتزا', 'img/Pizza/turkey_pizza_.png', 'بيتزا الفطر'),
(16, 'بيتزا', 'img/Pizza/pesto_pizza_.png', 'بيتزا البيستو'),
(17, 'بيتزا', 'img/Pizza/peri_peri_pizza_.png', 'بيتزا بيري بيري'),
(18, 'بيتزا', 'img/Pizza/shrimp_pizza_.png', 'بيتزا الروبيان'),
(19, 'بيتزا', 'img/Pizza/bianca_pizza_.png', 'بيتزا بيانكا'),
(20, 'بيتزا', 'img/Pizza/hawaiian_pizza_.png', 'بيتزا هاواي'),
(21, 'بيتزا', 'img/Pizza/bbq_chicken_pizza_.png', 'بيتزا باربكيو'),
(22, 'بيتزا', 'img/Pizza/alfredo_pizza_.png', 'بيتزا الفريدو'),
(23, 'بيتزا', 'img/Pizza/blue_cheese_pizza_.png', 'بيتزا الجبنة الزرقاء'),
(24, 'بيتزا', 'img/Pizza/neapolitan_pizza_.png', 'بيتزا نابولين'),
(25, 'بيتزا', 'img/Pizza/chicken_pizza_.png', 'بيتزا الدجاج'),
(26, 'بيتزا', 'img/Pizza/fungi_pizza_.png', 'بيتزا الحبش'),
(27, 'بيتزا', 'img/Pizza/sala_[izza_.png', 'بيتزا سالا'),
(28, 'بيتزا', 'img/Pizza/meat_pizza_.png', 'بيتزا اللحم'),
(29, 'بيتزا', 'img/Pizza/pepperoni_pizza_.png', 'بيتزا البيبروني'),
(30, 'بيتزا', 'img/Pizza/vegetables_pizza_.png', 'بيتزا الحضار'),
(31, 'بيتزا', 'img/Pizza/mexican_pizza_.png', 'بيتزا مكسيكية'),
(32, 'باستا', 'img/Pasta/fettuccine_.png', 'فيتوتشيني'),
(33, 'باستا', 'img/Pasta/linguine_pesto_.png', 'لينجويني بيستو'),
(34, 'باستا', 'img/Pasta/rigatoni_bolognese_.png', 'ريجاتوني بولوني'),
(35, 'باستا', 'img/Pasta/penne_all\'arrabbita_.png', 'بيني ارابيتا'),
(36, 'باستا', 'img/Pasta/risotto_.png', 'ريزوتو'),
(37, 'باستا', 'img/Pasta/shrimp_linguine_.png', 'لينجويني بالروبيان'),
(38, 'باستا', 'img/Pasta/lasagane_.png', 'لازانيا'),
(39, 'باستا', 'img/Pasta/spaghetti_bolgnese_.png', 'سباغيتي بولونيز'),
(40, 'باستا', 'img/Pasta/rigatoni_norma_.png', 'ريجاتوني نورما'),
(41, 'تحلية', 'img/Sweets/fondant_au_chocolat_coulant_.png', 'فوندو'),
(42, 'تحلية', 'img/Sweets/brownies_.png', 'براونيز'),
(43, 'تحلية', 'img/Sweets/eclair_.png', 'إكلير'),
(44, 'تحلية', 'img/Sweets/cheese_cake_.png', 'تشيز كيك'),
(45, 'تحلية', 'img/Sweets/tiramisu_.png', 'تيراميسو'),
(46, 'تحلية', 'img/Sweets/oreo_crepe_.png', 'أوريو كريب'),
(47, 'تحلية', 'img/Sweets/lottus_crepe_.png', 'لوتس كريب'),
(48, 'تحلية', 'img/Sweets/pisstachio_crepe_.png', 'بستاشيو كريب'),
(49, 'تحلية', 'img/Sweets/nutella_crepe_.png', 'نوتيلا كريب'),
(50, 'تحلية', 'img/Sweets/fruits_crepe_.png', 'كريب فواكه'),
(51, 'تحلية', 'img/Sweets/nutella_waffle_.png', 'وافل نوتيلا'),
(52, 'تحلية', 'img/Sweets/lottus_waffle_.png', 'وافل لوتس'),
(53, 'تحلية', 'img/Sweets/pistachio_waffle_.png', 'وافل بستاشيو'),
(54, 'تحلية', 'img/Sweets/fruits_waffle_.png', 'وافل فواكه'),
(55, 'تحلية', 'img/Sweets/ice_cream_waffle_.png', 'وافل آيسكريم'),
(56, 'تحلية', 'img/Sweets/oreo_wafflwe_.png', 'وافل أوريو'),
(57, 'تحلية', 'img/Sweets/kinder_waffle_.png', 'وافل كندر'),
(58, 'تحلية', 'img/Sweets/twix_waffle_.png', 'وافل تويكس'),
(59, 'تحلية', 'img/Sweets/sala_waffle_.png', 'وافل سالا'),
(60, 'مشروبات', 'img/drinks/orangejuice.png', 'عصير برتقال'),
(61, 'مشروبات', 'img/drinks/strawberryjuice.png', 'عصير فراولة'),
(62, 'مشروبات', 'img/drinks/pineapplejuice.png', 'عصير أناناس'),
(63, 'مشروبات', 'img/drinks/kiwijuice.png', 'عصير كيوي'),
(64, 'مشروبات', 'img/drinks/lemonjuice.png', 'عصير ليمون'),
(65, 'مشروبات', 'img/drinks/lemonandmintjuice.png', 'عصير ليمون ونعناع'),
(66, 'مشروبات', 'img/drinks/rmanjuice.png', 'عصير رمان'),
(67, 'مشروبات', 'img/drinks/oreo_milkshake_.png', 'ميلك شيك اوريو'),
(68, 'مشروبات', 'img/drinks/strawberry_milkshake_.png', 'ميلك شيك فراولة'),
(69, 'مشروبات', 'img/drinks/lottus_milkshake_.png', 'ميلك شيك لوتس'),
(70, 'مشروبات', 'img/drinks/nutella_milk_shake_.png', 'ميلك شيك نوتيلا'),
(71, 'مشروبات', 'img/drinks/twix_milk_shake_.png', 'ميلك شيك تويكس'),
(72, 'مشروبات', 'img/drinks/sala_milkshake_.png', 'ميلك شيك سالا'),
(73, 'مشروبات', 'img/drinks/kiwi_mojitop_.png', 'موهيتو كيوي'),
(74, 'مشروبات', 'img/drinks/redbull.png', 'موهيتو ريد بول'),
(75, 'مشروبات', 'img/drinks/pineapple_mojito_.png', 'موهيتو اناناس'),
(76, 'مشروبات', 'mg/drinks/lemon_and_mint_mojito_.png', 'موهيتو ليمون ونعناع'),
(77, 'مشروبات', 'img/drinks/strawberry_mojito_.png', 'موهيتو فراولة'),
(78, 'مشروبات', 'img/drinks/apple_mojito_.png', 'موهيتو تفاح'),
(79, 'مشروبات', 'img/drinks/blue_mojito_.png', 'موهيتو بلو'),
(80, 'مشروبات', 'img/drinks/frapp_.png', 'فرابتشينو'),
(81, 'مشروبات', 'img/drinks/caramel_frapp_.png', 'كراميل فرابتشينو'),
(82, 'مشروبات', 'img/drinks/ice_spanish_latte_.png', 'ايس سبانش لاتيه'),
(83, 'مشروبات', 'img/drinks/ice_chocolate_.png', 'ايس جوكلت'),
(84, 'مشروبات', 'img/drinks/mocha_frapp_.png', 'موكا فرابتشينو'),
(85, 'مشروبات', 'img/drinks/strawberry_frapp_.png', 'فرابتشينو فراولة'),
(86, 'مشروبات', 'img/drinks/ice_cappacino_.png', 'ايس كابتشينو'),
(87, 'مشروبات', 'vimg/drinks/ice_latte_.png', 'ايس لاتيه'),
(88, 'مشروبات', 'img/drinks/ice_coffe_maltezers_.png', 'ايس كوفي مالتيزرز'),
(89, 'مشروبات', 'img/drinks/ice_caramel_macheato_.png', 'ايس كراميل ماكياتو'),
(90, 'مشروبات', 'img/drinks/ice_lottus_latte_.png', 'ايس لوتس لاتيه'),
(91, 'مشروبات', 'img/drinks/pineapple_smoothie_.png', 'سموذي اناناس'),
(92, 'مشروبات', 'img/drinks/kiwi_smoothie_.png', 'سموذي كيوي'),
(93, 'مشروبات', 'img/drinks/lemon_smoothie_.png', 'سموذي ليمون'),
(94, 'مشروبات', 'img/drinks/strawberry_smoothie_.png', 'سموذي فراولة'),
(95, 'مشروبات', 'img/drinks/mango_smoothie_.png', 'سموذي مانجا'),
(96, 'مشروبات', 'img/drinks/hotchocolate.png', 'هوت جوكلت'),
(97, 'مشروبات', 'img/drinks/hotlottus.png', 'هوت لوتس'),
(98, 'مشروبات', 'img/drinks/hotpistachio.png', 'هوت بستاشيو'),
(99, 'مشروبات', 'img/drinks/milklandtea.png', 'شاي حليب'),
(100, 'مشروبات', 'img/drinks/nesscafe.png', 'نسكافيه'),
(101, 'مشروبات', 'img/drinks/tea.png', 'شاي'),
(102, 'مشروبات', 'img/drinks/turkishcoffee.png', 'قهوة تركية'),
(103, 'مشروبات', 'img/drinks/espresso.png', 'اسبريسو'),
(104, 'مشروبات', 'img/drinks/doubleespresso.png', 'اسبريسو دبل'),
(105, 'مشروبات', 'img/drinks/cappacino.png', 'كابتشينو'),
(106, 'مشروبات', 'img/drinks/americano.png', 'امريكانو'),
(107, 'مشروبات', 'img/drinks/macheato.png', 'ماكياتو'),
(108, 'مشروبات', 'img/drinks/latte.png', 'لاتيه سادة'),
(109, 'مشروبات', 'img/drinks/caramellatte.png', 'كراميل لاتيه'),
(110, 'مشروبات', 'img/drinks/mocha.png', 'موكا لاتيه');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `DishID` int(11) NOT NULL,
  `DishName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DishCategory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ingredient1` int(11) DEFAULT NULL,
  `ingredient1Quantity` int(11) DEFAULT NULL,
  `ingredient2` int(11) DEFAULT NULL,
  `ingredient2Quantity` int(11) DEFAULT NULL,
  `ingredient3` int(11) DEFAULT NULL,
  `ingredient3Quantity` int(11) DEFAULT NULL,
  `Ingredient4` int(11) DEFAULT NULL,
  `Ingredient4Quantity` int(11) DEFAULT NULL,
  `Ingredient5` int(11) DEFAULT NULL,
  `Ingredient5Quantity` int(11) DEFAULT NULL,
  `Ingredient6` int(11) DEFAULT NULL,
  `Ingredient6Quantity` int(11) DEFAULT NULL,
  `Ingredient7` int(11) DEFAULT NULL,
  `Ingredient7Quantity` int(11) DEFAULT NULL,
  `Ingredient8` int(11) DEFAULT NULL,
  `Ingredient8Quantity` int(11) DEFAULT NULL,
  `Ingredient9` int(11) DEFAULT NULL,
  `Ingredient9Quantity` int(11) DEFAULT NULL,
  `Ingredient10` int(11) DEFAULT NULL,
  `Ingredient10Quantity` int(11) DEFAULT NULL,
  `DishDescription` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL,
  `DishImage` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`DishID`, `DishName`, `DishCategory`, `ingredient1`, `ingredient1Quantity`, `ingredient2`, `ingredient2Quantity`, `ingredient3`, `ingredient3Quantity`, `Ingredient4`, `Ingredient4Quantity`, `Ingredient5`, `Ingredient5Quantity`, `Ingredient6`, `Ingredient6Quantity`, `Ingredient7`, `Ingredient7Quantity`, `Ingredient8`, `Ingredient8Quantity`, `Ingredient9`, `Ingredient9Quantity`, `Ingredient10`, `Ingredient10Quantity`, `DishDescription`, `TotalPrice`, `DishImage`) VALUES
(1, 'سلطة سيزر', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'خس، صلصة سيزر، خبز توست، صدر دجاج ', '0.03', NULL),
(2, 'سلطة السلطعون', 'مقبلات', 1, 3, 2, 42, 3, 1, 45, 10, 5, 20, 6, 20, 17, 10, 9, 40, 100, 20, 15, 10, 'خيار، جزر، بصل، شرائح السلطعون، صلصة', '0.20', NULL),
(3, 'سلطة كرسبي', 'مقبلات', 1, 33, 22, 322, 13, 100, 24, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 19, 25, 100, 'خضار، دجاج مقرمش، بطاطا مقلية، صلصة', '2.38', NULL),
(4, 'سلطة ستيك لحم', 'مقبلات', 11, 30, 22, 2, 3, 100, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'قطع الستيك مع السلطة بالصلصة المميزة', '0.59', NULL),
(5, 'سلطة جرجير', 'مقبلات', 1, 3, 2, 24, 30, 12, 4, 150, 5, 20, 6, 200, 7, 100, 9, 40, 0, 0, 0, 0, 'جرجير، فطر، بصل، جوز، رمان، صلصة', '0.26', NULL),
(6, 'سلطة يونانية', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 0, 0, 0, 0, 0, 0, 'خضار، خس، فلفل، بصل، زيتون، ذرة، طماطم كرزية، جبن فيتا، صلصة يونانية', '0.03', NULL),
(7, 'أجنحة الباربكيو', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 0, 0, 0, 0, 0, 0, 0, 0, 'أجنحة الدجاج المغمسة بصلصة الباربكيو', '0.03', NULL),
(8, 'أجنحة البافلو', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'أجنحة الدجاج المغمسة بصلصة البافلو المميزة', '0.03', NULL),
(9, 'برسكت بولونيز', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 10, 0, 0, 0, 0, 0, 0, 'خبز محمص مع اللحم وصوص الطماطم الكرزية والثوم والملح والزيتون الاسود وجبنة الموزاريلا', '0.03', NULL),
(10, 'برسكت باسكيليتو', 'مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'خبز محمص مع جبنة الفيتا والطماطم الكرزية وشرائح الزيتون', '0.03', NULL),
(11, 'خبز الثوم', 'مقبلات', 1, 3, 2, 2, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'خبز محمص مع الثوم وزيت الزيتون', '0.03', NULL),
(12, 'بطاطا ودجز', ' مقبلات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'شرائح البطاطا المقلية مغطاة بالصوص اللذيذ', '0.03', NULL),
(13, 'بيتزا مارغريتا', 'بيتزا', 2, 30, 3, 200, 17, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'صوص الطمام الكرزية الخاص، جبن موزاريلا، جبن بارمزان، اوريغانو', '1.25', NULL),
(14, 'بيتزا الأجبان الأربعة', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية، جبن موزاريلا، جبن شيدر، جبنة بيضاء، جبن بارمزان، اوريغانو', '0.03', NULL),
(15, 'بيتزا الفطر', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 50, 20, 10, 'صوص الطماطم الخاص، جبن موزاريلا، بولونيز مفروم، طماطم كرزية، جبن بارمزان، اوريغانو', '0.03', NULL),
(16, 'بيتزا البيستو', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 150, 'صوص البيستو، جبن موزاريلا، جبن بارمزان، طماطم كرزية، شرائح دجاج، اوريغانو', '0.03', NULL),
(17, 'بيتزا بيري بيري', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية، جبن موزاريلا، جبن شيدر، شرائح الدجاج الحارة، فلفل، صلصة سالا الحارة، جبن بارمزان، اوريغان', '0.03', NULL),
(18, 'بيتزا الروبيان', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية، جبن موزاريلا، روبيان مشوي، زيتون مقطع، ذرة، ريحان، جبن بارمزان، اوريغانو', '0.03', NULL),
(19, 'بيتزا بيانكا', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 20, 7, 10, 9, 40, 10, 20, 20, 1, 'صوص جبنة كريمية، جبن موزاريلا ، جبن بارمزان، اوريغانو', '0.03', NULL),
(20, 'بيتزا هاواي', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الباربكيو، جبن موزاريلا، شرائح الحبش المدخنة، قطع أناناس، اوريغانو', '0.03', NULL),
(21, 'بيتزا باربكيو', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 120, 20, 120, 'صوص الباربكيو، جبن موزاريلا، فلفل، شرائح الدجاج، جبن بارمزان، اوريغان', '0.03', NULL),
(22, 'بيتزا الفريدو', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 120, 5, 20, 6, 200, 7, 10, 9, 40, 10, 250, 20, 100, 'صوص الطماطم الكرزية، جبن موزاريلا، جبن شيدر، جبنة بيضاء، جبن بارمزان، اوريغانو', '0.03', NULL),
(23, 'بيتزا الجبنة الزرقاء', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الحبنة الزرقاء، جبنة زرقاء، جبن موزاريلا، شرائح التفاح، جوز، جرجير، جبن بارمزان، اوريغانو', '0.03', NULL),
(24, 'بيتزا نابولين', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، جبن بارمزان، اوريغانو', '0.03', NULL),
(25, 'بيتزا الدجاج', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 110, 'صوص الطماطم الكرزية، جبن موزاريلا، شرائح الدجاج، فطر، طماطم مجففة، فلفل، جبن بارمزان، اوريغان', '0.03', NULL),
(26, 'بيتزا الحبش', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 160, 'صوص الطماطم الكرزية، جبن موزاريلا، شرائح الحبش، جبن بارمزان، اوريغانو', '0.03', NULL),
(27, 'بيتزا سالا', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، لحم مفروم، شرائح البيبروني، بصل، طماطم كرزية، جبن بارمزان، اوريغان', '0.03', NULL),
(28, 'بيتزا اللحم', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، شرائح ستيك لحم، فلفل، طماطم كرزية، جبن بارمزان، اوريغانو', '0.03', NULL),
(29, 'بيتزا البيبروني', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، شرائح البيبروني، جبن بارمزان، اوريغانو', '0.03', NULL),
(30, 'بيتزا الحضار', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، فطر، زيتون، فلفل، جبن بارمزان، اوريغانو', '0.03', NULL),
(31, 'بيتزا مكسيكية', 'بيتزا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 150, 'صوص الطماطم الكرزية الخاص، جبن موزاريلا، لحم مفروم، فلفل، بصل مفروم، شرائح هالابينو، شرائح بيبروني، طماطم كرزية، جبن شيدر، جبن بارمزان، اوريغانو', '0.03', NULL),
(32, 'فيتوتشيني', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, ' باستا، كريمة طبخ، زبد، بصل، ثوم', '0.03', NULL),
(33, 'لينجويني بيستو', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 0, 0, 0, 0, 0, 0, 0, 0, 'باستا، صلصة البيستو المميزة ', '0.03', NULL),
(34, 'ريجاتوني بولوني', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'باستا، بولونيز', '0.03', NULL),
(35, 'بيني ارابيتا', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'باستا، صلصة ارابيتا المميزة', '0.03', NULL),
(36, 'ريزوتو', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'رز، روبيان، كريمة طبخ، زبد،حمص، ثوم، بصل', '0.03', NULL),
(37, 'لينجويني بالروبيان', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'باستا، روبيان، كريمة طبخ، بصل، زبد، ثوم', '0.03', NULL),
(38, 'لازانيا', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'لزانيا، لحم مفروم، بشاميل، موزاريلا، طماطم، ثوم بصل', '0.03', NULL),
(39, 'سباغيتي بولونيز', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'سباغيتي، لحم مفروم، صوص الطماط الكرزية، ثوم', '0.03', NULL),
(40, 'ريجاتوني نورما', 'باستا', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 20, 100, 'باستا، صلصة خاصة، خضار', '0.03', NULL),
(41, 'فوندو', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'كيك محشي بشوكولا سائلة', '0.03', NULL),
(42, 'براونيز', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'كيك مغطى بشوكولا سائلة', '0.03', NULL),
(43, 'إكلير', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'كيك الجبنة محشي بحشوة الكاسترد ومغطى بالشوكولا البلجيكية', '0.03', NULL),
(44, 'تشيز كيك', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'كيك الجبنة مع المربى او صلصة الشوكولا', '0.03', NULL),
(45, 'تيراميسو', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'أصابع التيراميسو منقوعة بالنسكافيه والكريمة', '0.03', NULL),
(46, 'أوريو كريب', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'عجينة الكريب مغطاة بشوكولا سائلة ومحشية ببسكويت الاوريو', '0.03', NULL),
(47, 'لوتس كريب', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'عجينة الكريب مغطاة بزبدة اللوتس الذائبة ومحشية ببسكويت الوتس', '0.03', NULL),
(48, 'بستاشيو كريب', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'عجينة الكريب مغطاة بزبدة البستاشيو', '0.03', NULL),
(49, 'نوتيلا كريب', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'عجينة الكريب مغطاة بالشوكولا', '0.03', NULL),
(50, 'كريب فواكه', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'عجينة الكريب مغطاة بشوكولا سائلة وتقدم مع قطع الفواكه', '0.03', NULL),
(51, 'وافل نوتيلا', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(52, 'وافل لوتس', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(53, 'وافل بستاشيو', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(54, 'وافل فواكه', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(55, 'وافل آيسكريم', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(56, 'وافل أوريو', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(57, 'وافل كندر', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(58, 'وافل تويكس', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(59, 'وافل سالا', 'تحلية', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(60, 'عصير برتقال', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(61, 'عصير فراولة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(62, 'عصير أناناس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(63, 'عصير كيوي', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(64, 'عصير ليمون', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(65, 'عصير ليمون ونعناع', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(66, 'عصير رمان', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(67, 'ميلك شيك اوريو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(68, 'ميلك شيك فراولة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(69, 'ميلك شيك لوتس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(70, 'ميلك شيك نوتيلا', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(71, 'ميلك شيك تويكس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(72, 'ميلك شيك سالا', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(73, 'موهيتو كيوي', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(74, 'موهيتو ريد بول', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(75, 'موهيتو اناناس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(76, 'موهيتو ليمون ونعناع', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(77, 'موهيتو فراولة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(78, 'موهيتو تفاح', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(79, 'موهيتو بلو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(80, 'فرابتشينو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(81, 'كراميل فرابتشينو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(82, 'ايس سبانش لاتيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(83, 'ايس جوكلت', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(84, 'موكا فرابتشينو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(85, 'فرابتشينو فراولة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(86, 'ايس كابتشينو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(87, 'ايس لاتيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(88, 'ايس كوفي مالتيزرز', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(89, 'ايس كراميل ماكياتو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(90, 'ايس لوتس لاتيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(91, 'سموذي اناناس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(92, 'سموذي كيوي', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(93, 'سموذي ليمون', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(94, 'سموذي فراولة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(95, 'سموذي مانجا', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(96, 'هوت جوكلت', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(97, 'هوت لوتس', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(98, 'هوت بستاشيو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(99, 'شاي حليب', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(100, 'نسكافيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(101, 'شاي', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(102, 'قهوة تركية', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(103, 'اسبريسو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(104, 'اسبريسو دبل', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(105, 'كابتشينو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(106, 'امريكانو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(107, 'ماكياتو', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(108, 'لاتيه سادة', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(109, 'كراميل لاتيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL),
(110, 'موكا لاتيه', 'مشروبات', 1, 3, 2, 2, 3, 1, 4, 100, 5, 20, 6, 200, 7, 100, 9, 40, 10, 20, 0, 0, 'لا يتوفر وصف', '0.03', NULL);

--
-- Triggers `menu`
--
DELIMITER $$
CREATE TRIGGER `calculateTotalPrice` BEFORE INSERT ON `menu` FOR EACH ROW BEGIN
  SET NEW.TotalPrice = ((NEW.ingredient1Quantity / (SELECT productQuantity FROM Products WHERE productID = NEW.ingredient1)) * (SELECT price FROM Products WHERE productID = NEW.ingredient1) +
    (NEW.ingredient2Quantity / (SELECT productQuantity FROM Products WHERE productID = NEW.ingredient2)) * (SELECT price FROM Products WHERE productID = NEW.ingredient2) +(NEW.ingredient3Quantity / (SELECT productQuantity FROM Products WHERE productID = NEW.ingredient3)) * (SELECT price FROM Products WHERE productID = NEW.ingredient3)
  );END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderUUID` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dishName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dishDesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dishPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tableNumber` int(11) DEFAULT NULL,
  `pickupTime` datetime DEFAULT NULL,
  `customerFirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderUUID`, `dishName`, `dishDesc`, `dishPrice`, `quantity`, `orderType`, `tableNumber`, `pickupTime`, `customerFirstName`, `totalPrice`, `created_at`) VALUES
(120, '661e523557ca3', 'سلطة كرسبي,أجنحة الباربكيو,لينجويني بيستو,براونيز', 'خضار، دجاج مقرمش، بطاطا مقلية، صلصة,أجنحة الدجاج المغمسة بصلصة الباربكيو,باستا، صلصة البيستو المميزة ,كيك مغطى بشوكولا سائلة', '2.38,0.03,0.03,0.03', '1,1,1,1', 'dine-in', 3344, '0000-00-00 00:00:00', 'ms', '2.47', '2024-04-16 09:25:57'),
(121, '661e526577755', 'سلطة السلطعون,سلطة كرسبي,سلطة يونانية,عصير ليمون ونعناع,عصير رمان', 'خيار، جزر، بصل، شرائح السلطعون، صلصة,خضار، دجاج مقرمش، بطاطا مقلية، صلصة,خضار، خس، فلفل، بصل، زيتون، ذرة، طماطم كرزية، جبن فيتا، صلصة يونانية,لا يتوفر وصف,لا يتوفر وصف', '0.20,2.38,0.03,0.03,0.03', '2,2,2,1,2', 'dine-in', 3333, '0000-00-00 00:00:00', 'ali', '5.31', '2024-04-16 09:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productQuantity`, `price`) VALUES
(1, 'صدر دجاج', 100, '0.56'),
(2, 'أفخاذ دجاج', 100, '0.43'),
(5, 'لحم غنم عراقي', 100, '1.44'),
(6, 'أجنحة دجاج', 100, '0.43'),
(7, 'خس', 100, '0.20'),
(8, 'خبز توست', 100, '0.30'),
(9, 'صلصة\r\n        ', 100, '1.20'),
(10, 'خيار', 100, '1.83'),
(11, 'جزر\r\n       ', 100, '0.06'),
(12, 'بصل', 100, '0.33'),
(13, 'سلطعون\r\n        ', 100, '0.52'),
(14, 'خضار', 100, '0.43'),
(15, 'بطاطا\r\n        ', 100, '0.04'),
(16, 'جرجير\r\n        ', 10, '0.04'),
(18, 'صلصة', 100, '1.20'),
(20, 'جزر', 100, '0.06'),
(22, 'سلطعون', 100, '0.52'),
(24, 'بطاطا ', 100, '0.04'),
(25, 'جرجير', 10, '0.04'),
(26, 'فطر', 100, '0.50'),
(27, 'جوز', 100, '1.04'),
(28, 'رمان\r\n       ', 100, '1.04'),
(29, 'فلفل بارد\r\n        ', 100, '0.04'),
(30, 'زيتون ', 100, '1.15'),
(31, 'ذرة ', 100, '0.14'),
(32, 'طماطم كرزية ', 100, '0.94'),
(33, 'جبن فيتا', 100, '99.00'),
(34, 'جبن موزاريلا', 100, '99.00'),
(35, 'زيت زيتون ', 100, '1.50'),
(36, 'ثوم ', 100, '0.45'),
(37, 'فلفل هالابينو', 100, '99.00'),
(38, 'شرائح شيدر', 100, '1.20'),
(39, 'شرائح بارمزان ', 100, '1.20'),
(40, 'اوريغان', 2, '0.02'),
(42, 'شاي', 100, '0.20'),
(43, 'قهوة ', 100, '0.20'),
(44, 'ريد بول ', 100, '1.20'),
(45, 'بلو', 100, '1.20'),
(46, 'سيرب كراميل ', 100, '1.80'),
(47, 'برتقال', 100, '0.20'),
(48, 'ليمون', 100, '0.20'),
(49, 'كيوي ', 100, '0.20'),
(50, 'أناناس', 100, '0.60'),
(51, 'نعناع', 100, '0.05'),
(52, 'فراولة', 100, '0.20'),
(53, 'فواكه مشكل ', 100, '0.20'),
(54, 'شوكولاتة كندر', 100, '0.50'),
(55, 'نوتيلا', 100, '0.80'),
(56, 'زبدة البستاشيو', 100, '0.90'),
(57, 'زبدة  اللوتس\r\n        ', 100, '0.80'),
(58, 'بسكويت اللوتس\r\n        ', 100, '0.60'),
(59, 'بسكويت اوريو\r\n        ', 100, '0.50'),
(60, 'حليب بودرة\r\n        ', 100, '0.20'),
(61, 'خميرة\r\n        ', 100, '0.02'),
(62, 'بيكنغ باودر\r\n        ', 100, '0.02'),
(63, 'فانيلا\r\n        ', 100, '0.02'),
(64, 'بيض\r\n        ', 100, '1.50'),
(65, 'سباغيتي\r\n        ', 100, '0.75'),
(75, 'سكر\r\n        ', 100, '0.20'),
(76, 'مربى\r\n        ', 100, '0.20'),
(77, 'كاسترد\r\n        ', 100, '0.45'),
(78, 'شوكولا بلجيكية\r\n        ', 100, '2.20'),
(79, 'آيسكريم\r\n        ', 100, '2.20'),
(80, 'نسكافيه\r\n        ', 100, '0.24'),
(81, 'كريمة تزيين\r\n        ', 100, '0.15'),
(82, 'كريمة طبخ\r\n        ', 100, '0.20'),
(83, 'طماطم مجففة\r\n        ', 100, '0.90'),
(84, 'رز\r\n        ', 100, '0.34'),
(85, 'تفاح احمر\r\n        ', 100, '0.30'),
(86, 'تفاح اخضر\r\n        ', 100, '0.45'),
(87, 'روبيان\r\n        ', 100, '3.30'),
(88, 'طماطم كرزية مجففة\r\n        ', 100, '0.30'),
(89, 'حمص\r\n        ', 100, '0.10'),
(90, 'باستا\r\n        ', 100, '0.30'),
(92, 'بولونيز\r\n        ', 100, '2.30'),
(93, 'زبد\r\n        ', 100, '0.35'),
(94, 'صلصة البشاميل الجاهزة\r\n        ', 100, '0.40'),
(95, 'شوكولا سائلة\r\n        ', 100, '1.30'),
(96, 'شوكولا تويكس\r\n        ', 100, '0.90');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CustomerPhone` bigint(11) DEFAULT NULL,
  `CustomerReview` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`CustomerID`, `CustomerName`, `CustomerPhone`, `CustomerReview`) VALUES
(2, ' نور علي', 7723658711, 'ألطعام رائع '),
(3, 'فاطمة ', 7802650994, ' المكان نظيف والطعام ممتاز'),
(4, 'Sarahh', 394853, 'Very tasty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `idx_order_count` (`order_count`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`DishID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderUUID` (`orderUUID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `DishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`imgID`) REFERENCES `menu` (`DishID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
