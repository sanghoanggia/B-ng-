-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4307:4307
-- Generation Time: Feb 18, 2024 at 05:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `Namee` varchar(20) NOT NULL,
  `Passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Namee`, `Passwords`) VALUES
(1, 'sang1', 'sang1'),
(2, 'Admin2', 'adminpass2'),
(3, 'Admin3', 'adminpass3');

-- --------------------------------------------------------

--
-- Table structure for table `bangxephang`
--

CREATE TABLE `bangxephang` (
  `Mabang` int(11) NOT NULL,
  `MaGiaiDau` int(11) DEFAULT NULL,
  `MaCLB` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `SoTran` int(11) DEFAULT NULL,
  `HieuSo` int(11) DEFAULT NULL,
  `SoDiem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bangxephang`
--

INSERT INTO `bangxephang` (`Mabang`, `MaGiaiDau`, `MaCLB`, `MoTa`, `SoTran`, `HieuSo`, `SoDiem`) VALUES
(1, 1, 1, 'Mô tả cho CLB 1', NULL, NULL, NULL),
(2, 1, 2, 'Mô tả cho CLB 2', NULL, NULL, NULL),
(3, 2, 3, 'Mô tả cho CLB 3', NULL, NULL, NULL),
(4, 0, 0, 'Hà Nội FC', 0, 0, 0),
(5, 0, 0, 'Bình Đinh', 0, 0, 0),
(6, 0, 0, 'Hải Phòng', 0, 0, 0),
(7, 0, 0, 'Nam Định', 0, 0, 0),
(8, 0, 0, 'Sài Gòn	', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caulacbo`
--

CREATE TABLE `caulacbo` (
  `MaCLB` int(11) NOT NULL,
  `TenCLB` varchar(255) NOT NULL,
  `MaGiaiDau` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `SanNha` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `SoTran` int(11) DEFAULT NULL,
  `HieuSo` int(11) DEFAULT NULL,
  `SoDiem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caulacbo`
--

INSERT INTO `caulacbo` (`MaCLB`, `TenCLB`, `MaGiaiDau`, `MoTa`, `SanNha`, `HinhAnh`, `SoTran`, `HieuSo`, `SoDiem`) VALUES
(1, 'Manchester United', 2, 'Câu lạc bộ Anh', 'Old Trafford', 'mancity.jpg', 10, 5, 15),
(2, 'Barcelona', 2, 'Câu lạc bộ Tây Ban Nha', 'Camp Nou', 'saigon.jpg', 12, 8, 18),
(3, 'Juventus', 3, 'Câu lạc bộ Ý', 'Allianz Stadium', 'bayer.jpg', 11, 6, 16),
(5, 'Paris Saint-Germain', 2, 'Câu lạc bộ hàng đầu của Pháp', 'Parc des Princes', 'psg.jpg', 21, 15, 47),
(6, 'Chelsea', 5, 'Câu lạc bộ bóng đá Anh với nhiều thành công', 'Stamford Bridge', 'hcm.jpg', 19, 16, 42),
(7, 'AC Milan', 5, 'Câu lạc bộ bóng đá có lịch sử lâu dài ở Italy', 'San Siro', 'alt.jpg', 20, 14, 41),
(8, 'Borussia Dortmund', 2, 'Câu lạc bộ nổi tiếng của Đức với khán giả nhiệt huyết', 'Signal Iduna Park', 'inter.jpg', 18, 10, 36),
(10, 'Hà Nội FC', 1, 'Description 1A', 'Stadium 1A', 'viettel.jpg', 2, -51, 0),
(11, 'Bình Định', 1, 'Description 1B', 'Stadium 1B', 'binhdinh.jpg', 5, 35, 15),
(12, 'Hải Phòng', 1, 'Description 1C', 'Stadium 1C', 'psg.jpg', 3, 29, 9),
(13, 'Nam Định', 1, 'Description 1D', 'Stadium 1D', 'atta.jpg', 1, -2, 0),
(14, 'Sài Gòn', 1, 'Description 1E', 'Stadium 1E', 'saigon.jpg', 1, -11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caulacbo1`
--

CREATE TABLE `caulacbo1` (
  `MaCLB` int(11) NOT NULL,
  `TenCLB` varchar(255) NOT NULL,
  `MaGiaiDau` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `SanNha` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `SoTran` int(11) DEFAULT NULL,
  `HieuSo` int(11) DEFAULT NULL,
  `SoDiem` int(11) DEFAULT NULL,
  `banthang` int(11) DEFAULT NULL,
  `banthua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caulacbo1`
--

INSERT INTO `caulacbo1` (`MaCLB`, `TenCLB`, `MaGiaiDau`, `MoTa`, `SanNha`, `HinhAnh`, `SoTran`, `HieuSo`, `SoDiem`, `banthang`, `banthua`) VALUES
(1, 'Hà Nội FC', 1, 'Description A', 'Stadium A', 'mancity.jpg', 2, 4, -9, 6, 2),
(2, 'Bình Định', 1, 'Description B', 'Stadium B', 'binhdinh.jpg', 3, -1, 3, 6, 7),
(3, 'Hải Phòng', 1, 'Description C', 'Stadium C', 'psg.jpg', 5, 1, 6, 13, 12),
(4, 'Nam Định', 1, 'Description D', 'Stadium D', 'bayer.jpg', 3, 3, 6, 9, 6),
(5, 'Sài Gòn', 1, 'Description E', 'Stadium E', 'saigon.jpg', 3, -7, 0, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cauthu`
--

CREATE TABLE `cauthu` (
  `MaCauThu` int(11) NOT NULL,
  `TenCauThu` varchar(255) NOT NULL,
  `MaCLB` int(11) DEFAULT NULL,
  `ViTri` varchar(55) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `CLB_now` varchar(55) DEFAULT NULL,
  `CLB_old` varchar(55) DEFAULT NULL,
  `anh` varchar(55) DEFAULT NULL,
  `QueQuan` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cauthu`
--

INSERT INTO `cauthu` (`MaCauThu`, `TenCauThu`, `MaCLB`, `ViTri`, `NgaySinh`, `CLB_now`, `CLB_old`, `anh`, `QueQuan`, `MoTa`) VALUES
(1, 'Harry Kane', 1, 'Tiền đạo', '1993-07-28', 'Manchester United', 'Tottenham Hotspur', 'kane.jpg', 'Anh', 'Chân sút hàng đầu'),
(2, 'Lionel Messi', 2, 'Tiền đạo', '1987-06-24', 'Barcelona', '', 'messi.jpg', 'Argentina', 'Huyền thoại bóng đá'),
(3, 'Cristiano Ronaldo', 3, 'Tiền đạo', '1985-02-05', 'Juventus', 'Real Madrid', 'ronaldo.jpg', 'Bồ Đào Nha', 'Máy ghi bàn');

-- --------------------------------------------------------

--
-- Table structure for table `chitiettrandau`
--

CREATE TABLE `chitiettrandau` (
  `MaTranDau` int(11) NOT NULL,
  `NgayDienRa` date DEFAULT NULL,
  `MaCLBChuNha` int(11) DEFAULT NULL,
  `MaCLBKhach` int(11) DEFAULT NULL,
  `MaCauThu` int(11) DEFAULT NULL,
  `TenCLB` varchar(255) NOT NULL,
  `ThongTin` varchar(255) DEFAULT NULL,
  `Cauthu_the` varchar(255) DEFAULT NULL,
  `Cauthu_banthang` varchar(255) DEFAULT NULL,
  `Mota` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiettrandau`
--

INSERT INTO `chitiettrandau` (`MaTranDau`, `NgayDienRa`, `MaCLBChuNha`, `MaCLBKhach`, `MaCauThu`, `TenCLB`, `ThongTin`, `Cauthu_the`, `Cauthu_banthang`, `Mota`, `HinhAnh`) VALUES
(1, '2023-01-15', 1, 2, 1, 'Manchester United', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Chi tiết trận đấu', 'image.jpg'),
(2, '2023-01-16', 2, 3, 2, 'Barcelona', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Chi tiết trận đấu', 'image.jpg'),
(3, '2023-01-17', 3, 1, 3, 'Juventus', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Thông tin cầu thủ', 'Chi tiết trận đấu', 'image.jpg'),
(4, NULL, NULL, NULL, NULL, '', '234234', 'sang', 'sang', 'khong ', '3223'),
(5, NULL, NULL, NULL, NULL, '', 'sang', 'sang', 'sang', 'sang', 'sang'),
(6, NULL, NULL, NULL, NULL, '', '0', 'sang', 'sa', 'saew', 'sâ');

-- --------------------------------------------------------

--
-- Table structure for table `chitiettrandau1`
--

CREATE TABLE `chitiettrandau1` (
  `MaTranDau` int(11) NOT NULL,
  `Mota` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiettrandau1`
--

INSERT INTO `chitiettrandau1` (`MaTranDau`, `Mota`, `HinhAnh`) VALUES
(2, '4343', '3434'),
(11, 'sâs2232323', '2332'),
(12, '4543534', '345345'),
(27, '43434', '433434'),
(33, 'hahah', 'wc2022.jpg'),
(57, '434', 'sukien5.jpg'),
(62, 'sang 1', 'mancity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `giaidau`
--

CREATE TABLE `giaidau` (
  `MaGiaiDau` int(11) NOT NULL,
  `TenGiaiDau` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `SoDoi` int(11) NOT NULL,
  `DiaDiem` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giaidau`
--

INSERT INTO `giaidau` (`MaGiaiDau`, `TenGiaiDau`, `MoTa`, `SoDoi`, `DiaDiem`, `HinhAnh`) VALUES
(1, 'Premier League', 'Giải đấu của mấy thằng ngu', 222, 'Anh', 'ngoaihang.jfif'),
(2, 'La Liga', 'Giải đấu tại Tây Ban Nha', 20, 'Tây Ban Nha', 'laliga.jfif'),
(3, 'Serie A', 'Giải đấu hàng đầu tại Ý', 20, 'Ý', 'seria.jfif'),
(4, 'V_League', 'Giải đấu số 1 Việt Nam', 13, 'Việt Nam', 'vietnam.jfif'),
(5, 'Thai League', 'Giải đấu đẳng cấp của Thái Lan', 13, 'Thái Lan', 'thai.jfif'),
(6, 'Bundesligaaaaaa', 'Giải đấu top 6 châu âu', 16, 'Đức', 'duc.jfif'),
(13, 'Ngoại hạng B', 'không', 23, 'Hưng yên', 'sukien2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MaMessage` int(11) NOT NULL,
  `NoiDung` varchar(255) DEFAULT NULL,
  `ThoiGianGui` datetime DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MaMessage`, `NoiDung`, `ThoiGianGui`, `IdUser`, `email`) VALUES
(1, 'Chào bạn từ User1', '2023-12-15 15:25:46', 1, NULL),
(2, 'Tin nhắn từ User2', '2023-12-15 15:25:46', 2, NULL),
(3, 'Chào bạn từ User3', '2023-12-15 15:25:46', 3, NULL),
(4, '234234234', '2023-12-16 03:04:49', 1, NULL),
(6, 'qwewee', '2023-12-17 16:38:41', 1, NULL),
(7, 'qwewee', '2023-12-17 16:39:17', 1, NULL),
(8, 'sang đây', '2023-12-17 16:40:43', 1, NULL),
(9, 'ưewqrwer', '2023-12-17 17:49:25', 0, NULL),
(10, '2342342424234', '2023-12-17 17:54:55', 0, ''),
(11, '324234234234242424234234', '2023-12-17 17:56:27', 0, '234234'),
(12, 'sang đẹp traiii', '2023-12-17 17:58:09', 435345, 'chiyeuvietnam132@gmail.com'),
(13, '23423442', '2024-02-18 11:34:59', 234, 'chiyeuvietnam132@gmail.com'),
(14, '23423442', '2024-02-18 11:38:31', 234, 'chiyeuvietnam132@gmail.com'),
(15, '324', '2024-02-18 11:38:38', 3242, 'chiyeuvietnam132@gmail.com'),
(16, '452345423534', '2024-02-18 11:42:01', 43545, 'chiyeuvietnam132@gmail.com'),
(17, '423423423423423', '2024-02-18 11:45:31', 23423, 'chiyeuvietnam132@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvientochuc`
--

CREATE TABLE `nhanvientochuc` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) NOT NULL,
  `TenViTri` varchar(255) NOT NULL,
  `MaViTri` int(11) DEFAULT NULL,
  `MaGiaiDau` int(11) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvientochuc`
--

INSERT INTO `nhanvientochuc` (`MaNhanVien`, `TenNhanVien`, `TenViTri`, `MaViTri`, `MaGiaiDau`, `HinhAnh`) VALUES
(1, 'Sang hi úc', 'Quản lý sự kiện', 1, 1, 'sang.jpg'),
(2, 'Sang Thái Lan', 'Trọng tài', 2, 1, 'sang1.jpg'),
(3, 'Sang Hoàng Gia', 'Quản lý vé', 3, 3, 'sang2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saver`
--

CREATE TABLE `saver` (
  `MaThongTin` int(11) NOT NULL,
  `NoiDung` varchar(255) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saver`
--

INSERT INTO `saver` (`MaThongTin`, `NoiDung`, `IdUser`) VALUES
(1, 'Dữ liệu đã lưu 1', 1),
(2, 'Dữ liệu đã lưu 2', 2),
(3, 'Dữ liệu đã lưu 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

CREATE TABLE `sukien` (
  `MaSuKien` int(11) NOT NULL,
  `TenSuKien` varchar(255) NOT NULL,
  `MaGiaiDau` int(11) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sukien`
--

INSERT INTO `sukien` (`MaSuKien`, `TenSuKien`, `MaGiaiDau`, `MoTa`, `HinhAnh`) VALUES
(1, 'Bàn thắng từ Messi', 2, 'rất dài dòng', 'sukien1.jpg'),
(2, 'Thẻ đỏ cho Ronaldo', 3, 'đây là 1 lần siuuuuuuuuuuuuuu', 'sukien2.jpg'),
(3, 'Bàn thắng phút cuối của Kane', 1, 'đâu rồi em', 'sukien3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trandau`
--

CREATE TABLE `trandau` (
  `MaTranDau` int(11) NOT NULL,
  `MaGiaiDau` int(11) DEFAULT NULL,
  `NgayDienRa` date DEFAULT NULL,
  `MaCLBChuNha` int(11) DEFAULT NULL,
  `MaCLBKhach` int(11) DEFAULT NULL,
  `banthangnha` int(11) DEFAULT NULL,
  `banthangkhach` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trandau`
--

INSERT INTO `trandau` (`MaTranDau`, `MaGiaiDau`, `NgayDienRa`, `MaCLBChuNha`, `MaCLBKhach`, `banthangnha`, `banthangkhach`) VALUES
(62, 1, '2023-12-14', 1, 2, 4, 1),
(63, 1, '2023-12-15', 3, 4, 2, 4),
(64, 1, '2023-12-20', 3, 5, 4, 1),
(65, 1, '2023-12-07', 4, 5, 3, 1),
(66, 1, '2023-12-14', 3, 4, 3, 2),
(68, 1, '2023-12-08', 1, 2, 2, 1),
(69, 1, '2023-12-08', 2, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL,
  `Namee` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Number` varchar(10) NOT NULL,
  `Passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `Namee`, `Email`, `Number`, `Passwords`) VALUES
(1, 'User1', 'user1@example.com', '1234567890', 'userpass1'),
(2, 'User2', 'user2@example.com', '9876543210', 'userpass2'),
(3, 'User3', 'user3@example.com', '5555555555', 'userpass3');

-- --------------------------------------------------------

--
-- Table structure for table `vitritrandau`
--

CREATE TABLE `vitritrandau` (
  `MaViTri` int(11) NOT NULL,
  `TenViTri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitritrandau`
--

INSERT INTO `vitritrandau` (`MaViTri`, `TenViTri`) VALUES
(1, 'Thủ môn trống'),
(2, 'Hậu vệ'),
(3, 'Tiền vệ'),
(4, 'Tiền đạo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indexes for table `bangxephang`
--
ALTER TABLE `bangxephang`
  ADD PRIMARY KEY (`Mabang`);

--
-- Indexes for table `caulacbo`
--
ALTER TABLE `caulacbo`
  ADD PRIMARY KEY (`MaCLB`);

--
-- Indexes for table `caulacbo1`
--
ALTER TABLE `caulacbo1`
  ADD PRIMARY KEY (`MaCLB`),
  ADD KEY `MaGiaiDau` (`MaGiaiDau`);

--
-- Indexes for table `cauthu`
--
ALTER TABLE `cauthu`
  ADD PRIMARY KEY (`MaCauThu`);

--
-- Indexes for table `chitiettrandau`
--
ALTER TABLE `chitiettrandau`
  ADD PRIMARY KEY (`MaTranDau`);

--
-- Indexes for table `chitiettrandau1`
--
ALTER TABLE `chitiettrandau1`
  ADD PRIMARY KEY (`MaTranDau`);

--
-- Indexes for table `giaidau`
--
ALTER TABLE `giaidau`
  ADD PRIMARY KEY (`MaGiaiDau`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MaMessage`);

--
-- Indexes for table `nhanvientochuc`
--
ALTER TABLE `nhanvientochuc`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `saver`
--
ALTER TABLE `saver`
  ADD PRIMARY KEY (`MaThongTin`);

--
-- Indexes for table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`MaSuKien`);

--
-- Indexes for table `trandau`
--
ALTER TABLE `trandau`
  ADD PRIMARY KEY (`MaTranDau`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- Indexes for table `vitritrandau`
--
ALTER TABLE `vitritrandau`
  ADD PRIMARY KEY (`MaViTri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bangxephang`
--
ALTER TABLE `bangxephang`
  MODIFY `Mabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `caulacbo`
--
ALTER TABLE `caulacbo`
  MODIFY `MaCLB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cauthu`
--
ALTER TABLE `cauthu`
  MODIFY `MaCauThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chitiettrandau`
--
ALTER TABLE `chitiettrandau`
  MODIFY `MaTranDau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `giaidau`
--
ALTER TABLE `giaidau`
  MODIFY `MaGiaiDau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MaMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nhanvientochuc`
--
ALTER TABLE `nhanvientochuc`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saver`
--
ALTER TABLE `saver`
  MODIFY `MaThongTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `MaSuKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trandau`
--
ALTER TABLE `trandau`
  MODIFY `MaTranDau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vitritrandau`
--
ALTER TABLE `vitritrandau`
  MODIFY `MaViTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caulacbo1`
--
ALTER TABLE `caulacbo1`
  ADD CONSTRAINT `caulacbo1_ibfk_1` FOREIGN KEY (`MaGiaiDau`) REFERENCES `giaidau` (`MaGiaiDau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
