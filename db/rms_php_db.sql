-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 08:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms_php_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `food_id`) VALUES
(34, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_guests_details`
--

CREATE TABLE `customer_guests_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `guests_count` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_no` int(10) DEFAULT NULL,
  `request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_guests_details`
--

INSERT INTO `customer_guests_details` (`id`, `user_id`, `table_id`, `guests_count`, `first_name`, `last_name`, `email`, `contact_no`, `request`) VALUES
(1, 6, 2, 3, 'abc', 'xyz', 'damalesaurabh34@gmail.com', 950, '   nnnnnnnnnn'),
(2, 6, 1, 3, 'saurabh', 'damale', 'saurabh@gmail.com', 2147483647, ' some extra cheese');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `order_cancelled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `user_id`, `food_id`, `quantity`, `total_price`, `status`, `order_cancelled`) VALUES
(1, 6, 19, 3, 199, 1, 1),
(4, 6, 11, 1, 199, 1, 1),
(5, 6, 17, 1, 199, 1, 1),
(6, 6, 4, 1, 199, 1, 1),
(7, 6, 14, 2, 199, 1, 1),
(8, 6, 2, 3, 199, 1, 1),
(9, 6, 11, 1, 199, 1, 1),
(10, 6, 2, 1, 199, 1, 1),
(11, 6, 19, 9, 199, 1, 1),
(12, 6, 19, 2, 199, 1, 1),
(13, 6, 2, 1, 199, 1, 0),
(14, 6, 1, 1, 199, 1, 0),
(15, 6, 2, 1, 199, 1, 0),
(16, 6, 5, 1, 199, 1, 0),
(17, 6, 2, 3, 199, 1, 0),
(18, 6, 6, 2, 199, 1, 1),
(19, 6, 1, 7, 199, 1, 0),
(20, 6, 2, 1, 199, 1, 0),
(21, 6, 2, 1, 199, 1, 0),
(22, 6, 1, 1, 199, 1, 0),
(23, 6, 2, 2, 199, 1, 0),
(24, 6, 1, 3, 199, 1, 0),
(25, 6, 2, 1, 199, 1, 0),
(26, 6, 2, 1, 199, 1, 0),
(27, 6, 2, 1, 199, 1, 0),
(28, 6, 2, 1, 199, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `id` int(11) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_category` varchar(30) NOT NULL,
  `food_description` varchar(255) NOT NULL,
  `food_ingredients` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `discount_percentage` int(100) DEFAULT NULL,
  `primary_img` varchar(255) NOT NULL,
  `set_of_imgs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`id`, `food_name`, `food_category`, `food_description`, `food_ingredients`, `price`, `quantity`, `discount_percentage`, `primary_img`, `set_of_imgs`) VALUES
(1, 'Spaghetti Bolognese', 'Pasta', 'Classic spaghetti with rich meat sauce', 'Spaghetti, ground beef, tomato sauce, garlic, onion, basil', 90, 50, 0, 'spaghetti_bolognese.jpg', 'spaghetti_bolognese.jpg,spaghetti_bolognese_2.jpg,spaghetti_bolognese_3.jpg'),
(2, 'Chicken Caesar Salad', 'Salad', 'Crisp romaine lettuce with grilled chicken and Caesar dressing', 'Romaine lettuce, grilled chicken breast, Caesar dressing, croutons, Parmesan cheese', 100, 30, 10, 'chicken_caesar_salad.jpg', 'chicken_caesar_salad.jpg,chicken_caesar_salad_2.jpg,chicken_caesar_salad_3.jpg'),
(3, 'Margherita Pizza', 'Pizza', 'Traditional Italian pizza with tomato sauce, mozzarella, and basil', 'Pizza dough, tomato sauce, mozzarella cheese, fresh basil', 130, 40, 5, 'margherita_pizza.jpg', 'margherita_pizza.jpg,margherita_pizza_2.jpg,margherita_pizza_3.jpg'),
(4, 'Beef Burger', 'Burgers', 'Juicy beef patty with lettuce, tomato, and pickles on a sesame seed bun', 'Beef patty, sesame seed bun, lettuce, tomato, pickles, ketchup, mustard', 100, 45, 0, 'beef_burger.jpg', 'beef_burger.jpg,beef_burger_2.jpg,beef_burger_3.jpg'),
(5, 'Vegetable Stir Fry', 'Stir Fry', 'Fresh mixed vegetables stir-fried in a savory sauce', 'Broccoli, bell peppers, carrots, snap peas, onions, soy sauce, garlic', 80, 35, 0, 'vegetable_stir_fry.jpg', 'vegetable_stir_fry.jpg,vegetable_stir_fry_2.jpg,vegetable_stir_fry_3.jpg'),
(6, 'Chocolate Brownie Sundae', 'Desserts', 'Warm chocolate brownie topped with vanilla ice cream and chocolate syrup', 'Brownie mix, vanilla ice cream, chocolate syrup', 60, 25, 15, 'chocolate_brownie_sundae.jpg', 'chocolate_brownie_sundae.jpg,chocolate_brownie_sundae_2.jpg,chocolate_brownie_sundae_3.jpg'),
(7, 'Tuna Sandwich', 'Sandwiches', 'Flaky tuna mixed with mayo, served on toasted bread with lettuce and tomato', 'Canned tuna, mayonnaise, bread, lettuce, tomato', 80, 20, 0, 'tuna_sandwich.jpg', 'tuna_sandwich.jpg,tuna_sandwich_2.jpg,tuna_sandwich_3.jpg'),
(8, 'Chicken Tikka Masala', 'Indian', 'Tender chicken in a creamy tomato sauce with aromatic spices', 'Chicken breast, tomato sauce, cream, garam masala, garlic, ginger', 120, 30, 0, 'chicken_tikka_masala.jpg', 'chicken_tikka_masala.jpg,chicken_tikka_masala_2.jpg,chicken_tikka_masala_3.jpg'),
(9, 'Caesar Wrap', 'Wraps', 'Grilled chicken, romaine lettuce, and Caesar dressing wrapped in a flour tortilla', 'Grilled chicken breast, romaine lettuce, Caesar dressing, flour tortilla', 90, 35, 10, 'caesar_wrap.jpg', 'caesar_wrap.jpg,caesar_wrap_2.jpg,caesar_wrap_3.jpg'),
(10, 'Vegetarian Pizza', 'Pizza', 'Delicious pizza loaded with assorted vegetables', 'Pizza dough, tomato sauce, mozzarella cheese, bell peppers, onions, olives, mushrooms', 130, 40, 0, 'vegetarian_pizza.jpg', 'vegetarian_pizza.jpg,vegetarian_pizza_2.jpg,vegetarian_pizza_3.jpg'),
(11, 'Shrimp Pad Thai', 'Thai', 'Stir-fried rice noodles with shrimp, egg, bean sprouts, and peanuts', 'Rice noodles, shrimp, egg, bean sprouts, peanuts, tamarind sauce', 150, 25, 0, 'shrimp_pad_thai.jpg', 'shrimp_pad_thai.jpg,shrimp_pad_thai_2.jpg,shrimp_pad_thai_3.jpg'),
(12, 'Classic Cheeseburger', 'Burgers', 'All-American cheeseburger with lettuce, tomato, onion, and pickles', 'Beef patty, cheese, sesame seed bun, lettuce, tomato, onion, pickles, ketchup, mustard', 110, 40, 0, 'classic_cheeseburger.jpg', 'classic_cheeseburger.jpg,classic_cheeseburger_2.jpg,classic_cheeseburger_3.jpg'),
(13, 'Penne Arrabiata', 'Pasta', 'Penne pasta in a spicy tomato sauce with garlic and chili flakes', 'Penne pasta, tomato sauce, garlic, chili flakes, olive oil', 100, 30, 0, 'penne_arrabiata.jpg', 'penne_arrabiata.jpg,penne_arrabiata_2.jpg,penne_arrabiata_3.jpg'),
(14, 'Greek Salad', 'Salad', 'Fresh salad with tomatoes, cucumbers, olives, onions, and feta cheese', 'Tomatoes, cucumbers, olives, onions, feta cheese, olive oil, oregano', 90, 35, 0, 'greek_salad.jpg', 'greek_salad.jpg,greek_salad_2.jpg,greek_salad_3.jpg'),
(15, 'Chicken Quesadilla', 'Mexican', 'Grilled chicken and melted cheese folded in a flour tortilla', 'Grilled chicken breast, cheese, flour tortilla', 80, 25, 0, 'chicken_quesadilla.jpg', 'chicken_quesadilla.jpg,chicken_quesadilla_2.jpg,chicken_quesadilla_3.jpg'),
(16, 'Mushroom Risotto', 'Italian', 'Creamy risotto cooked with mushrooms, onions, and Parmesan cheese', 'Arborio rice, mushrooms, onion, Parmesan cheese, vegetable broth', 110, 30, 0, 'mushroom_risotto.jpg', 'mushroom_risotto.jpg,mushroom_risotto_2.jpg,mushroom_risotto_3.jpg'),
(17, 'Fish and Chips', 'Seafood', 'Crispy battered fish served with seasoned fries and tartar sauce', 'White fish fillets, batter, potatoes, tartar sauce', 120, 20, 0, 'fish_and_chips.jpg', 'fish_and_chips.jpg,fish_and_chips_2.jpg,fish_and_chips_3.jpg'),
(18, 'Chicken Fajitas', 'Mexican', 'Sizzling chicken strips with bell peppers and onions, served with tortillas and toppings', 'Chicken breast, bell peppers, onions, tortillas, salsa, sour cream, guacamole', 140, 25, 0, 'chicken_fajitas.jpg', 'chicken_fajitas.jpg,chicken_fajitas_2.jpg,chicken_fajitas_3.jpg'),
(19, 'Caprese Salad', 'Salad', 'Simple salad made with fresh tomatoes, mozzarella cheese, and basil', 'Tomatoes, mozzarella cheese, basil, balsamic glaze', 70, 30, 0, 'caprese_salad.jpg', 'caprese_salad.jpg,caprese_salad_2.jpg,caprese_salad_3.jpg'),
(21, 'example', 'one', 'This is an exmple', '', 122, 11, 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_data`
--

CREATE TABLE `table_data` (
  `id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_data`
--

INSERT INTO `table_data` (`id`, `table_no`, `seats`) VALUES
(1, 101, 6),
(2, 102, 4),
(3, 103, 2),
(4, 104, 6),
(13, 105, 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_reserved`
--

CREATE TABLE `table_reserved` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `reservation_cancelled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_reserved`
--

INSERT INTO `table_reserved` (`id`, `user_id`, `table_id`, `date`, `status`, `reservation_cancelled`) VALUES
(1, 6, 1, '2024-05-27', 1, 1),
(2, 6, 2, '0000-00-00', 1, 1),
(3, 6, 1, '0000-00-00', 1, 1),
(4, 6, 4, '0000-00-00', 1, 1),
(5, 6, 2, '0000-00-00', 1, 1),
(6, 6, 13, '0000-00-00', 1, 1),
(7, 6, 1, '2024-03-06', 1, 1),
(8, 6, 2, '2024-03-06', 1, 1),
(9, 6, 1, '2024-02-06', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_address_info`
--

CREATE TABLE `users_address_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `addr2` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_address_info`
--

INSERT INTO `users_address_info` (`id`, `user_id`, `address`, `addr2`, `country`, `state`, `city`, `zip_code`) VALUES
(5, 6, 'khardi', 'at post khardi222', 'two', 'three', 'four', 421601);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `username`, `email`, `password`) VALUES
(1, 'john_doe', 'john.doe@example.com', 'password123'),
(2, 'jane_smith', 'jane.smith@example.com', 'abc123'),
(3, 'mike_jones', 'mike.jones@example.com', 'qwerty'),
(4, 'sarah_brown', 'sarah.brown@example.com', 'pass123'),
(5, 'alex_williams', 'alex.williams@example.com', 'password321'),
(6, 'saurabh', 'saurabh@gmail.com', 'saurabh123'),
(7, 'staffuser', 'staff@gmail.com', 'staff123');

-- --------------------------------------------------------

--
-- Table structure for table `users_personal_info`
--

CREATE TABLE `users_personal_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `m_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_personal_info`
--

INSERT INTO `users_personal_info` (`id`, `user_id`, `fname`, `lname`, `m_no`) VALUES
(2, 6, 'saurabh', 'damale', '9879879877'),
(6, 7, 'abc', 'xyz', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_guests_details`
--
ALTER TABLE `customer_guests_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_data`
--
ALTER TABLE `table_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_reserved`
--
ALTER TABLE `table_reserved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_address_info`
--
ALTER TABLE `users_address_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_personal_info`
--
ALTER TABLE `users_personal_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer_guests_details`
--
ALTER TABLE `customer_guests_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_data`
--
ALTER TABLE `table_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_reserved`
--
ALTER TABLE `table_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_address_info`
--
ALTER TABLE `users_address_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_personal_info`
--
ALTER TABLE `users_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
