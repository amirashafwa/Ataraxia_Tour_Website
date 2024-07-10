-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 05:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ataraxia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','super admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `foto`, `name`, `username`, `password`, `level`) VALUES
(1, NULL, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'ga.png', 'super admin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'super admin'),
(3, NULL, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kd_booking` varchar(255) NOT NULL,
  `id_costumer` int(11) DEFAULT NULL,
  `id_destinasi` int(11) DEFAULT NULL,
  `id_transport` int(11) DEFAULT NULL,
  `id_villa` int(11) DEFAULT NULL,
  `asal` int(11) DEFAULT NULL,
  `berangkat` date DEFAULT NULL,
  `pulang` date DEFAULT NULL,
  `kategori` enum('VIP','Regular') DEFAULT NULL,
  `title` enum('Mr.','Mrs.','Ms.') DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tgl_booking` varchar(255) DEFAULT NULL,
  `request` text DEFAULT NULL,
  `tamu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `id_costumer` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `first_name`, `last_name`, `username`, `email`, `password`, `bio`, `profile_img`) VALUES
(3, 'User', 'User', 'user', 'tes@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'ini bio', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id_destinasi` int(11) NOT NULL,
  `kode_bandara` varchar(255) DEFAULT NULL,
  `destinasi` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `benua` enum('Africa','America','Australia','Asia','Europe') DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id_destinasi`, `kode_bandara`, `destinasi`, `negara`, `benua`, `deskripsi`, `foto`) VALUES
(1, 'RIX', 'Riga', 'Latvia', 'Europe', 'Lorem ipsum', 'riga-landscape.jpg'),
(9, 'DPS', 'Bali', 'Indonesia', 'Asia', 'Lorem ipsum', 'bali.jpg'),
(10, 'HNL', 'Honolulu', 'Hawaii', 'America', 'Lorem Ipsum', 'honolulu.jpg'),
(11, 'BNE', 'Brisbane', 'Australia', 'Australia', 'Lorem Ipsum', 'brisbane.jpg'),
(12, 'CPT', 'Cape Town', 'Afrika Selatan', 'Africa', 'Lorem', 'capetown.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `kd_booking` varchar(255) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `expired` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `kd_booking`, `card_name`, `card_number`, `cvv`, `expired`) VALUES
(9, 'ATX003', 'XXX', '1231231', 1231, '2023-12'),
(10, 'ATX004', 'Mr.asep', '1', 1, '2023-02'),
(11, 'ATX005', 'g', '1', 1, '2023-08'),
(12, 'ATX006', 'XXX', '1234', 1, '2023-08'),
(13, 'ATX007', 'Mr.asep', '123', 1, '2023-07');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `kode_transport` varchar(255) DEFAULT NULL,
  `nama_transport` varchar(255) DEFAULT NULL,
  `jenis` enum('Pesawat','Kereta','Bus','Kapal') DEFAULT NULL,
  `id_destinasi` int(11) DEFAULT NULL,
  `wkt_berangkat` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `kode_transport`, `nama_transport`, `jenis`, `id_destinasi`, `wkt_berangkat`, `logo`) VALUES
(2, 'EY-123', 'Etihad Airways', 'Pesawat', 1, '08:55', 'etihad.png'),
(4, 'GA-168', 'Garuda Indonesia', 'Pesawat', 9, '19:11', 'ga.png'),
(5, 'QZ-171', 'Air Asia', 'Pesawat', 9, '19:39', 'airasia.png'),
(6, 'BT-111', 'Air Baltic', 'Pesawat', 1, '19:44', 'airbaltic.jpg'),
(7, 'QF-234', 'Qantas', 'Pesawat', 11, '11:45', 'qantas.png'),
(8, 'SQ-345', 'Singapore Airlines', 'Pesawat', 11, '10:47', 'sa.png'),
(9, 'EK-321', 'Emirates', 'Pesawat', 12, '12:50', 'emirates.png'),
(10, 'HA-132', 'Hawaiian Airlines', 'Pesawat', 10, '19:59', 'hawaiian.png');

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `id_villa` int(11) NOT NULL,
  `nama_villa` varchar(255) DEFAULT NULL,
  `id_destinasi` int(11) DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `foto_villa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`id_villa`, `nama_villa`, `id_destinasi`, `detail_alamat`, `foto_villa`) VALUES
(1, 'Oak Heart, Lucavsalas namiņš', 1, '26 Lucavsalas iela, Rīga, LV-1004, Latvia', 'oak heart.jpg'),
(2, 'Conrad Bali', 9, 'Jl. Pratama No.168, Tanjung, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80363', 'conrad.webp'),
(3, 'Prince Waikiki', 10, '100 Holomoana Street, Honolulu, Oahu, HI 96815-1436', 'prince-waikiki.jpg'),
(4, 'The Westin Brisbane', 11, '111 Mary St, Brisbane City QLD 4000, Australia', 'westin.webp'),
(5, 'Villa Del Mar', 12, '4a Avenue Marina Bantry Bay, Bantry Bay, 8005 Cape Town, South Africa', 'villa del mar.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kd_booking`),
  ADD KEY `id_costumer` (`id_costumer`),
  ADD KEY `id_destinasi` (`id_destinasi`),
  ADD KEY `id_transport` (`id_transport`),
  ADD KEY `id_villa` (`id_villa`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `id_costumer` (`id_costumer`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_destinasi` (`id_destinasi`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`id_villa`),
  ADD KEY `id_destinasi` (`id_destinasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `id_villa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`id_costumer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_destinasi`) REFERENCES `destination` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`id_villa`) REFERENCES `villa` (`id_villa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`id_costumer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`id_destinasi`) REFERENCES `destination` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `villa`
--
ALTER TABLE `villa`
  ADD CONSTRAINT `villa_ibfk_1` FOREIGN KEY (`id_destinasi`) REFERENCES `destination` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
