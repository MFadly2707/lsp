-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2023 pada 11.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goprinter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `printer_tb`
--

CREATE TABLE `printer_tb` (
  `idPrinter` int(10) NOT NULL,
  `NamaPrinter` char(50) DEFAULT NULL,
  `SpesifikasiPrinter` char(50) DEFAULT NULL,
  `HargaPrinter` int(50) DEFAULT NULL,
  `GambarPrinter` varchar(50) NOT NULL,
  `UserIdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `printer_tb`
--

INSERT INTO `printer_tb` (`idPrinter`, `NamaPrinter`, `SpesifikasiPrinter`, `HargaPrinter`, `GambarPrinter`, `UserIdUser`) VALUES
(8, 'hp deskjet 2655', 'All In One Printer', 6000000, 'img-banner.png', NULL),
(9, 'Canon 3040', 'Printer Terbaru', 3000000, 'product.png', NULL),
(10, 'Printer Canon', 'Murah', 12000000, 'img-banner.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(10) NOT NULL,
  `Jumlah` int(10) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `HargaPrinter` int(50) DEFAULT NULL,
  `UserIdUser` int(11) NOT NULL,
  `Printer_tblIdPrinter` int(11) NOT NULL,
  `UserIdUser2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `Jumlah`, `subtotal`, `status`, `tanggal`, `HargaPrinter`, `UserIdUser`, `Printer_tblIdPrinter`, `UserIdUser2`) VALUES
(1, 3, 9000000, 2, '2022-04-08 03:17:05', 3000000, 1, 9, 1),
(2, 1, 3000000, 3, '2022-04-08 05:38:07', 3000000, 1, 9, 1),
(3, 1, 3000000, 2, '2023-04-10 09:06:19', 3000000, 1, 9, 1),
(4, 2, 12000000, 2, '2023-04-10 09:06:22', 6000000, 1, 8, 1),
(5, 9, 27000000, 2, '2023-04-10 09:06:24', 3000000, 1, 9, 1),
(6, 7, 8400000, 2, '2023-04-10 09:06:26', 1200000, 1, 10, 1),
(7, 6, 18000000, 2, '2023-04-10 09:06:29', 3000000, 5, 9, 5),
(8, 14, 16800000, 1, '2023-04-10 09:07:38', 1200000, 1, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `Username`, `Password`) VALUES
(1, 'user', 'user'),
(2, 'admin', 'admin'),
(5, 'fadly', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `printer_tb`
--
ALTER TABLE `printer_tb`
  ADD PRIMARY KEY (`idPrinter`),
  ADD UNIQUE KEY `UserIdUser` (`UserIdUser`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `printer_tb`
--
ALTER TABLE `printer_tb`
  MODIFY `idPrinter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `printer_tb`
--
ALTER TABLE `printer_tb`
  ADD CONSTRAINT `printer_tb_ibfk_1` FOREIGN KEY (`UserIdUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
