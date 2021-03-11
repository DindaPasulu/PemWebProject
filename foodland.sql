-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2021 pada 10.38
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodland`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) UNSIGNED NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `pass_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'Zhikri', 'muhammad.zhikri@student.umn.ac.id', 'almightylordzhikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_cust` int(5) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_cust` varchar(100) NOT NULL,
  `pass_cust` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `category`, `price`, `description`) VALUES
(1, 'French Fries', 'Snacks', 15000, 'Kentang goreng yang renyah dan gurih'),
(2, 'Egg Sandwich', 'Burgers', 23500, 'Roti lezat dengan telur, keju, mustard, dan potongan bawang'),
(3, 'Beef Burger', 'Burgers', 30000, 'Roti burger 100% daging sapi, saus tomat, acar timun, potongan bawang dan mustard.'),
(4, 'Cheeseburger', 'Burgers', 25000, 'Perpaduan roti burger dengan daging sapi gurih, selada segar, keju, saus tomat, acar, potongan bawang dan mustard'),
(5, 'Chicken Nuggets', 'Snacks', 20500, 'Nugget ayam tersedia dalam 5 pcs.'),
(6, 'Coca Cola', 'Beverages', 12000, 'Minuman berkarbonasi dengan rasa cola'),
(7, 'Lemon Tea', 'Beverages', 10500, 'Teh rasa buah lemon yang segar'),
(8, 'Affogato', 'Beverages', 11000, 'segelas es krim vanilla dengan satu shot espresso 100% Kopi Arabica'),
(9, 'Chocolate pie', 'Desserts', 9500, 'Pastry renyah berisi saus coklat yang memberikan cita rasa manis, lembut dan gurih'),
(10, 'Chocolate Sundae', 'Desserts', 6500, 'Es krim vanilla lembut dengan pilihan topping saus coklat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(5) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `qty` int(50) NOT NULL,
  `total_price` int(50) NOT NULL,
  `id_cust` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fkcustid` (`id_cust`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkcustid` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id_cust`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
