-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 07:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `points` int(11) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `contact`, `points`, `details`) VALUES
('5e7f1bc117ba6', 'New Costumer', '', 0, 'New Costumer dipilih untuk customer baru yang belum terdaftar'),
('5e7f89892fefa', 'Sunday', '082231487900', 0, 'Customer hari Minggu'),
('5e7f89cd31a3d', 'Andre', '083289379829', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` varchar(64) NOT NULL DEFAULT '',
  `transaction_id` varchar(64) NOT NULL DEFAULT '',
  `wallet_id` varchar(64) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `transaction_id`, `wallet_id`, `amount`, `status`, `datetime`) VALUES
('5e7f7a959e169', '5e7f7a3f5393a', '5e7f14575520e', 770000, 0, '2020-03-29 09:20:51'),
('5e7f7ac8530c3', '5e7f7ac84f22b', '5e7f12b633419', 770000, 1, '2020-03-28 17:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `image`, `description`) VALUES
('5e7d6c0752e43', 'Cheese Cake', 15000, 12, '5e7d6c0752e43.jpg', 'Cheesecake is a sweet dessert consisting of one or more layers. The main, and thickest layer, consists of a mixture of soft, fresh cheese, eggs, and sugar. If there is a bottom layer, it often consists of a crust or base made from crushed cookies, graham crackers, pastry, or sometimes sponge cake.'),
('5e7d72a6eb536', 'Bolu', 20000, 21, '5e7d72a6eb536.jpg', 'Cake is a form of sweet food made from flour, sugar, and other ingredients, that is usually baked. In their oldest forms, cakes were modifications of bread, but cakes now cover a wide range of preparations ...'),
('5e7d72fe4d656', 'BreadStick', 90000, 56, '5e7d72fe4d656.jpg', 'Breadsticks, also known as grissini, grissino or dipping sticks, are generally pencil-sized sticks of crisp, dry baked bread that originated in Italy. '),
('5e7d7379aa8b1', 'Tiramisu', 14000, 21, '5e7d7379aa8b1.jpg', 'Tiramisu is a coffee-flavoured Italian dessert. It is made of ladyfingers (savoiardi) dipped in coffee, layered with a whipped mixture of eggs, sugar, and mascarpone cheese, flavoured with cocoa. The recipe has been adapted into many varieties of cakes and other desserts.'),
('5e7d73d205453', 'Onde-onde', 5000, 22, '5e7d73d205453.jpg', 'Onde-onde adalah sejenis kue jajanan pasar yang populer di Indonesia. Kue ini sangat terkenal di daerah Mojokerto yang disebut sebagai kota onde-onde sejak zaman Majapahit. Onde-onde dapat ditemukan di pasar tradisional maupun dijual di pedagang kaki lima. '),
('5e7d740f20a19', 'Klepon', 6000, 10, '5e7d740f20a19.jpg', 'Klepon, or kelepon, is a traditional Southeast Asian green-coloured balls of rice cake filled with liquid palm sugar and coated in grated coconut, originating from Indonesia. The sweet glutinous rice balls is one of popular Indonesian kue, and it is commonly found in Indonesia, Malaysia, Brunei and Singapore.'),
('5e7d747ed6ca5', 'Roti Goreng', 2500, 29, '5e7d747ed6ca5.jpg', 'Roti goreng pinggir jalan manis.'),
('5e7d74d9466bd', 'BlackForest', 14000, 0, 'default.jpg', 'Black Forest gâteau or Black Forest cake is a chocolate sponge cake with a rich cherry filling based on the German dessert Schwarzwälder Kirschtorte, literally \"Black Forest Cherry-torte\". Typically, Black Forest gateau consists of several layers of chocolate sponge cake sandwiched with whipped cream and cherries.'),
('5e7d753e0da19', 'Pancake', 7000, 10, '5e7d753e0da19.jpg', 'A pancake is a flat cake, often thin and round, prepared from a starch-based batter that may contain eggs, milk and butter and cooked on a hot surface such as a griddle or frying pan, often frying with oil or butter.'),
('5e7d7578592d8', 'Waffle', 11000, 4, '5e7d7578592d8.jpg', 'A waffle is a dish made from leavened batter or dough that is cooked between two plates that are patterned to give a characteristic size, shape, and surface impression. There are many variations based on the type of waffle iron and recipe used. '),
('5e7d75c271383', 'Crepe', 7500, 3, '5e7d75c271383.jpg', 'A crêpe or crepe is a type of very thin pancake. Crêpes are usually of two types: sweet crêpes and savoury galettes. Crêpes are served with a variety of fillings, from the simplest with only sugar to flambéed crêpes Suzette or elaborate savoury galettes.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(64) NOT NULL DEFAULT '',
  `kasir_id` int(11) NOT NULL,
  `customer_id` varchar(64) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `kasir_id`, `customer_id`, `datetime`) VALUES
('5e7f7a3f5393a', 1, '5e7f1bc117ba6', '2020-03-28 17:24:31'),
('5e7f7a9595fe5', 1, '5e7f1bc117ba6', '2020-03-28 17:25:57'),
('5e7f7ac84f22b', 1, '5e7f1bc117ba6', '2020-03-28 17:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_product`
--

CREATE TABLE `transaction_product` (
  `id` varchar(64) NOT NULL DEFAULT '',
  `transaction_id` varchar(64) NOT NULL DEFAULT '',
  `product_id` varchar(64) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_product`
--

INSERT INTO `transaction_product` (`id`, `transaction_id`, `product_id`, `quantity`) VALUES
('5e7f7a3f577a3', '5e7f7a3f5393a', '5e7d72fe4d656', 4),
('5e7f7a3f58bd2', '5e7f7a3f5393a', '5e7d72a6eb536', 2),
('5e7f7a9597dd8', '5e7f7a9595fe5', '5e7d72fe4d656', 8),
('5e7f7a959b401', '5e7f7a9595fe5', '5e7d72a6eb536', 1),
('5e7f7a959c50e', '5e7f7a9595fe5', '5e7d6c0752e43', 2),
('5e7f7ac85006c', '5e7f7ac84f22b', '5e7d72fe4d656', 8),
('5e7f7ac850bc0', '5e7f7ac84f22b', '5e7d72a6eb536', 1),
('5e7f7ac852783', '5e7f7ac84f22b', '5e7d6c0752e43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','kasir') NOT NULL DEFAULT 'kasir',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'RizkyAndre', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'admin@mykasir.com', 'Rizky Andre Wibisono', '08222222', 'admin', '2020-03-29 09:27:09', 'user_no_image.jpg', '2020-02-27 02:27:05', 1),
(2, 'AndreWibisono', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'kasir@mykasir.com', 'Andre', '08222222', 'kasir', '2020-03-28 18:39:49', 'user_no_image.jpg', '2020-03-28 18:39:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`wallet_id`, `name`, `amount`, `description`) VALUES
('5e7f12b633419', 'Cash', 199000, 'Dompet cash adalah dompet penjualan dalam mesin kasir ini.'),
('5e7f12f15c482', 'Ovo', 775000, 'Dompet ovo adalah dompet untuk menerima pembayaran ovo'),
('5e7f130dc2cc7', 'GoPay', 1000, 'Dompet gopay adalah dompet untuk menerima pembayaran gopay'),
('5e7f14264713f', 'Dana', 2000, 'Dompet Dana adalah dompet untuk menerima pembayaran Dana'),
('5e7f14575520e', 'LinkAja', 770000, 'Dompet LinkAja adalah dompet untuk menerima pembayaran LinkAja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_product`
--
ALTER TABLE `transaction_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
