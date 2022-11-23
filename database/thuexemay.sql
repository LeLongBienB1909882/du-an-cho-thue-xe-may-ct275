-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 11:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuexemay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `FirstName`, `LastName`, `Status`, `Password`) VALUES
(2, 'Admin', 'adbien', 'Bien', 'Le', 1, 'a69884c98dbe012c09d053ea8515f939'),
(9, 'Admin', 'adAnh', 'Anh', 'Nguyen', 1, '8e7c74dd820c206e98603817a28f04a7');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ToDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(15, 721081626, 'demo@example.com', 25, '2022-11-18', '2022-11-22', 'Giao xe tận nơi', 1, '2022-11-18 09:45:10', '2022-11-18 09:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(11, 'Triumph', '2022-11-18 06:59:52', NULL),
(12, 'Yamaha', '2022-11-18 07:00:02', NULL),
(13, 'Benelli', '2022-11-18 07:01:11', NULL),
(14, 'Kawasaki', '2022-11-18 07:01:19', NULL),
(15, 'Ducati', '2022-11-18 07:01:25', NULL),
(16, 'Suzuki', '2022-11-18 07:01:35', NULL),
(17, 'SYM', '2022-11-18 07:01:41', NULL),
(18, 'Vinfast', '2022-11-18 07:01:48', NULL),
(19, 'Honda', '2022-11-18 07:02:33', NULL),
(20, 'BMW', '2022-11-18 07:03:01', NULL),
(21, 'ZongShen', '2022-11-18 07:03:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(10) DEFAULT NULL,
  `dob` char(4) DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `RegDate`, `UpdationDate`) VALUES
(6, 'De Mo Dat Xe', 'demo@example.com', '4297f44b13955235245b2497399d7a93', '0987654321', '2001', '124 đường 3-2 Xuân Khánh, Ninh Kiều, tp Cần Thơ', '2022-11-18 09:39:05', '2022-11-18 10:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `Vimage1`, `Vimage2`) VALUES
(12, 'Winner X', 19, 'Cuộc đời là một cuộc phiêu lưu tràn đầy những điều bất ngờ và mỗi người đều có một vạch đích của riêng mình. Hãy tự tin tạo những cú kích để vút xa và tạo dấu ấn riêng biệt cùng Honda WINNER X mới. Đánh dấu sự chuyển mình mạnh mẽ hướng tới hình ảnh một mẫu siêu xe thể thao cỡ nhỏ hàng đầu tại Việt Nam cùng những trang bị hiện đại và tối tân, WINNER X mới sẵn sàng cùng các tay lái bứt tốc trên mọi hành trình khám phá.', 200, 'winnerX1.png', 'winnerX2.png'),
(13, 'Sh mode 125cc', 19, 'Thuộc phân khúc xe ga cao cấp và thừa hưởng thiết kế sang trọng nổi tiếng của dòng xe SH, Sh mode luôn được đánh giá cao nhờ kiểu dáng sang trọng, tinh tế tới từng đường nét, động cơ tiên tiến và các tiện nghi cao cấp xứng tầm phong cách sống thời thượng, đẳng cấp.', 150000, 'shmode1.png', 'shmode2.png'),
(14, 'CB500X 2022', 19, 'CB500X - DŨNG MÃNH CHINH PHỤC HÀNH TRÌNH Đây chính là khoảnh khắc mà bạn đã luôn chờ đợi, khoảnh khắc đón chào CB500X trong một diện mạo khác. Mang đậm chất phiêu lưu, CB500X mạnh mẽ với các lựa chọn màu mới, cùng hệ thống giảm xóc hành trình dài và hệ thống phanh được nâng cấp. Kết hợp với động cơ xi-lanh đôi đặc trưng cho sức mạnh đáng gờm, CB500X phù hợp cho cả những người mới nhập môn hay người chơi nhiều kinh nghiệm, cho người lái thỏa sức trải nghiệm một chiếc xe vừa đầy sự thú vị mà vẫn an toàn.', 300000, 'cb500x1.jpg', 'cb500x2.jpg'),
(15, 'STREET SCRAMLER 900 2022', 11, 'Street Scrambler 2022 với kiểu dáng cổ điển kết hợp với địa hình, sở hữu phong cách riêng biệt nhưng vô cùng cuốn hút cùng với tính linh hoạt đã nhận được nhiều sự thu hút, tạo được danh tiếng riêng trên toàn thế giới. Và giờ đây, các cải tiến mới cho năm 2022 như: hiệu suất, hiệu năng, sự thoải mái và phong cách riêng biệt đậm chất Scrambler của Triumph giúp Street Scrambler mới mang đến cảm giác lái phấn khích hơn cùng khả năng xử lý linh hoạt vô cùng tuyệt vời.', 400000, 'STREETSCRAMLER1.png', 'STREETSCRAMLER2.png'),
(16, 'NVX 155 VVA PHIÊN B?N GI?I H?N MONSTER ENERGY YAMAHA MOTOGP', 12, 'NVX 155 VVA PHIÊN BẢN GIỚI HẠN MONSTER ENERGY YAMAHA MOTOGP\r\nBlue Core, 4 thì, 4 van, SOHC, làm mát bằng dung dịch\r\n', 100000, 'nvx1.png', 'nvx2.png'),
(17, 'EXCITER 155 VVA', 12, 'EXCITER 155 VVA PHIÊN BẢN GIỚI HẠN MASTER ART OF STREET', 300000, 'ex1.png', 'ex2.png'),
(19, 'SIRIUS', 12, 'SIRIUS PHIÊN BẢN RC VÀNH ĐÚC', 100000, 'si1.png', 'si2.png'),
(20, 'Benelli Leocino', 13, 'Đánh giá xe moto Benelli Leoncino Trail 500 là xe được trang bị nhiều tiêu chuẩn hiện đại và cao cấp, hệ thống điều khiển lái an toàn, tuy nhiên giá thành lại vô cùng rẻ so với những gì mà hãng đã bỏ ra.\r\n\r\nNếu như các dòng xe khác của Benelli đều được thiết kế cặp mâm đúc cả 2 bánh trước sau, có đường kính 17 inch thì chiếc Leoncino Trail 500 đậm chất “Scrambler” đã được đổi sang bánh căm cùng niềng nhôm bánh trước đường kính 19 inch và bánh sau 17 inch.', 300000, 'beni1.jpg', 'beni2.jpg'),
(21, 'Benelli TRK 502', 13, 'Hiện nay, trên thị trường không có quá nhiều sự lựa chọn cho các mẫu xe có dung tích máy nhỏ hơn 500 cc và phù hợp với địa hình đường trường. Do vậy, TRK 502 đón nhận được khá nhiều sự quan tâm từ người dùng.\r\nSản phẩm sở hữu thiết kế thông minh, trang bị hệ thống bó phanh vô cùng hiện đại chống bó cứng do thương hiệu nổi tiếng Bosch sản xuất. Đặc biệt, chiếc moto Benelli TRK 502 thiết kế chỗ gắn đồ đáp ứng cả 3 thùng hàng ở phía sau, rất lý tưởng cho những chuyến đi dong duổi nhiều ngày trên đường, tiện lợi mang quần áo, đồ dùng cá nhân, thực phẩm.', 340000, 'trk1.jpg', 'trk2.jpg'),
(22, 'Benelli BN302', 13, 'Có lẽ điều khiến các dân chơi xe thấy ấn tượng khi đánh giá xe moto Benelli BN302 đó là sự dễ điều khiển, phù hợp với mọi địa hình từ bằng phẳng tới nhấp nhô, gồ ghề. Benelli BN302 được trang bị động cơ phân khối DOHC, sử dụng cùng lúc 2 xi lanh với dung tích xi lanh là 300cc, công suất cực đại 37kW tại vòng tua 11.500 vòng/phút, lực kéo 27 Nm tại vòng tua 9.000 vòng/phút chắc hẳn sẽ mang tới rất nhiều trải nghiệm tuyệt vời cho những ai lần đầu chạy mẫu xe này. Xe được trang bị động cơ 4 thì xi-lanh đơn làm mát bằng dung dịch 250 phân khối, công suất cực đại 24,5 mã lực tại vòng tua máy 9.000 vòng/phút, mô-men xoắn tối đa 21 Nm tại 7.000 vòng/phút.', 330000, 'bn1.jpg', 'bn2.jpg'),
(23, 'Benelli RFS 150i', 13, 'Benelli RFS 150i là dòng xe côn, tham gia thị trường Việt Nam với phân khúc giá là 39.900.000 VNĐ với nhóm đối tượng hướng đến là giới trẻ. Xe sở hữu động cơ SOHC phân khối 150cc, xi-lanh đơn, 3 bugi cùng công nghệ phun xăng điện tử. Xe đạt công suất tối đa 15,5kW tại 8.500 vòng/phút, lực kéo 13 Nm tại 7.000 vòng/phút, được trang bị hộp số 6 cấp.', 220000, 'rfs1.jpg', ''),
(24, 'Ducati Monster 821', 15, 'Monster 821 thừa hưởng nhiều chi tiết từ phiên bản 1200. Tuy nhiên, những chi tiết khác biệt so với đời trước như đèn pha, bình xăng, ống xả và đuôi xe,.. đã giúp xe có diện mạo thể thao hơn rất nhiều.', 440000, 'mt1.jpg', 'mt2.jpg'),
(25, 'Ducati Multistrada 1200', 15, 'Multistrada 1200 có hệ thống điện tử rất hiện đại. Màn hình LCD hiển thị các thông số như tốc độ, số đang gài, lượng xăng tiêu hao… Đặc biệt, xe được tích hợp tính năng bluetooth, cho phép người lái và hành khách nghe nhạc thông qua tai nghe không dây khi đang chạy trên đường. Ngoài ra, màn hình này cũng có giao diện điều chỉnh chế độ chạy như Sport, Touring, Urban, Enduro.', 300000, 'm1.jpg', 'm2.jpg'),
(26, 'Ducati Diavel 1260S', 15, 'Xét về thiết kế, xe Ducati Diavel 1260S 2019 không có sự khác biệt quá nhiều so với Ducati XDiavel trước đó. Tổng thể của xe khá đồ sộ với kết cấu đặc biệt là khung thép lưới, càng sau của xe là loại gắp đơn được làm từ nhôm, giúp cho trọng lượng xe được giảm. Ngoài việc giảm trọng lượng thì thiết kế này cũng mang tới cho vẻ ngoài của xe nét thể thao và ấn tượng hơn. Các chi tiết chịu ảnh hưởng nhiều nhất bởi XDiavel là cụm đèn chiếu sáng với đèn ban ngày bằng LED, các hốc gió hai bên bình xăng và mỏ cày liền mạch hơn.', 500000, 'dia1.jpg', 'dia2.jpg'),
(27, 'Ducati XDiavel', 15, 'Giữ nguyên thiết kế đặc trưng của dòng Diavel, Ducati XDiavel là 1 trong các dòng xe Ducati tại Việt Nam ghi dấu ấn bởi kiểu dáng mạnh mẽ, độc đáo. Trang bị khối động cơ mới nhất L-Twin có dung tích 1.262cc, động cơ của xe sử dụng công nghệ tiên tiến van biến thiên, 8 van Desmosedici và sử dụng dung dịch để làm mát. Động cơ của xe có thể sản sinh được công suất tối đa là 156 mã lực cùng mô-men xoắn cực đại 129 Nm.', 500000, 'xdia1.jpg', 'xdia2.jpg'),
(28, 'Xe Suzuki Gixxer SF 250', 16, 'Xe máy Suzuki Gixxer SF 250 2022 có 8 ảnh và ảnh màu, trong đó có 5 ảnh ngoại thất, 3 ảnh màu Suzuki Gixxer SF 250 và các ảnh khác. Kiểm tra động cơ, thiết bị đo, đèn pha, mặt bên ..., gương, đuôi xe, đèn hậu, ghế ngồi, ống xả, bình xăng, bàn đạp, mâm, lốp, má phanh, tay nắm cho xe máy Suzuki Gixxer SF 250 2022 mới nhất tại đây.', 300000, 'sf1.jpg', 'sf2.jpg'),
(29, ' Satria F150', 16, 'The 2021 - 2022 Suzuki Satria F150 is offered in 4 variants - which are priced from VND 27,558 Triệu to VND 42,476 Triệu, the base model of satria-f150 is Suzuki Satria F150 Standard which is at a price of VND 27,558 Triệu and the top variant of Suzuki Satria F150 is 2021 Suzuki Satria F150 Black Predator which is offered at a price of VND 42,476 Triệu.', 500000, 's1.jpg', 's2.jpg'),
(30, 'GSX S150', 16, 'The 2021 - 2022 Suzuki GSX S150 is offered in 2 variants - which are priced from VND 44,127 Triệu to VND 47,302 Triệu, the base model of gsx-s150 is 2021 Suzuki GSX S150 Shutter Key which is at a price of VND 44,127 Triệu and the top variant of Suzuki GSX S150 is 2021 Suzuki GSX S150 Keyless which is offered at a price of VND 47,302 Triệu', 500000, 'gsx1.jpg', 'gsx2.jpg'),
(31, 'Angel 110', 17, 'Angel 110 đã trở lại với diện mạo mới cùng sự cải tiến rõ rệt từ động cơ đến ngoại hình xe. Thiết kế của vỏ xe thể thao, mạnh mẽ hơn cùng những nét cắt xẻ của bộ nhựa yếm kết hợp với cụm đèn xi nhan và đèn pha. \r\n\r\nAngel được trang bị động cơ 110cc nhờ đó xe có khả năng tăng tốc vượt trội, tiết kiệm xăng và bền bỉ hơn. Hiện nay, SYM Angle đang được bán với mức giá 17.090.000 VNĐ đối với phiên bản 110R và 15.490.000 VNĐ với phiên bản Angle 110.', 100000, 'an1.jpg', 'an1.jpg'),
(32, 'Elite 50', 17, 'Elite 50cc là dòng xe ga dáng nhỏ nằm trong phân khúc học sinh, sinh viên. Với những tiềm năng mà Elite 50 mang lại hứa hẹn đây sẽ là một sự thành công lớn của hãng. Thân xe được thiết kế nhỏ gọn giúp bạn dễ dàng khi dắt xe và điều khiển.', 100000, 'el.jpg', 'el.jpg'),
(33, 'Klara S', 18, 'Xe máy điện VinFast Klara S là dòng xe nổi tiếng đến từ nhà sản xuất ô tô - xe máy điện hàng đầu Việt Nam VinFast. Ngay từ khi ra mắt, xe đã nhận được rất nhiều sự yêu thích của khách hàng đặc biệt là các bạn trẻ. Vậy điều gì làm nên sức hút của dòng xe này? Dưới đây sẽ là những thông số kỹ thuật xe VinFast Klara S:', 50000, 'kl.jpg', 'kl.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
