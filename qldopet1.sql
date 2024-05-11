-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 04:58 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldopet1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_dat_hang`
--

CREATE TABLE `chi_tiet_dat_hang` (
  `ma` int(10) NOT NULL,
  `madathang` int(10) NOT NULL,
  `masanpham` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `gia` float NOT NULL,
  `thoigian` date NOT NULL DEFAULT current_timestamp(),
  `mieuta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_dat_hang`
--

INSERT INTO `chi_tiet_dat_hang` (`ma`, `madathang`, `masanpham`, `soluong`, `gia`, `thoigian`, `mieuta`) VALUES
(7, 8, 3, 1, 48000, '2023-12-01', ''),
(8, 9, 5, 5, 44500, '2023-12-01', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_hang`
--

CREATE TABLE `dat_hang` (
  `madathang` int(10) NOT NULL,
  `tenkhachhang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` int(15) NOT NULL,
  `trangthai` bit(10) NOT NULL,
  `tongtien` float NOT NULL,
  `thoigian` date NOT NULL DEFAULT current_timestamp(),
  `tinnhan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dat_hang`
--

INSERT INTO `dat_hang` (`madathang`, `tenkhachhang`, `diachi`, `email`, `sodienthoai`, `trangthai`, `tongtien`, `thoigian`, `tinnhan`) VALUES
(8, 'Trần Quang Hải', 'hà nam', 'tranhai20022018@gmail.com', 942117601, b'0000000000', 48000, '2023-12-01', ''),
(9, 'Trần Quang Hải', 'hà nam', 'tranhai20022018@gmail.com', 942117601, b'0000000000', 222500, '2023-12-01', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `soDienThoai` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noiDung` text NOT NULL,
  `thoiGianGui` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoTen`, `soDienThoai`, `email`, `noiDung`, `thoiGianGui`) VALUES
(3, 'Trần Quang Mạnh', '1234567890', 'tranquangmanh02@gmail.com', '123', '2023-11-25 01:52:29'),
(4, 'Trần Quang Mạnh', '1234567890', 'tranquangmanh02@gmail.com', '123', '2023-11-25 01:58:56'),
(5, 'hải', '0942117601', 'tranhai20022018@gmail.com', 'lập trình không khó, mà rất khó', '2023-11-26 02:32:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(10) NOT NULL,
  `tenloai` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` bit(5) NOT NULL,
  `mieuta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `trangthai`, `mieuta`) VALUES
(1, 'Thức ăn cho thú cưng', b'00001', 'Thức ăn cho thú cưng'),
(2, 'Phụ kiện cho thú cưng', b'00001', 'Phụ kiện cho thú cưng'),
(3, 'Vệ sinh cho thú cưng', b'00001', 'Vệ sinh cho thú cưng'),
(4, 'Quần áo & Phụ kiện', b'00001', 'Quần áo & Phụ kiện'),
(5, 'Đồ chơi thú cưng', b'00001', 'Đồ chơi thú cưng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `manguoidung` int(10) NOT NULL,
  `tennguoidung` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`manguoidung`, `tennguoidung`, `matkhau`, `email`, `sodienthoai`, `diachi`) VALUES
(1, 'haihai', '123', 'tranhai20022018@gmail.com', '0942117601', 'hà nam'),
(3, 'admin', '123', 'admin@gmail.com', '999999999', 'Hà Nội'),
(4, 'hai hay ho', '12345', 'tranhai@gmail.com', '0987654321', 'hà nam'),
(5, 'kimhari', '123', 'kimhari2506@gmail.com', '0942117600', 'hà nam'),
(6, 'huongxg', '1234', 'huong@nthgmail.com', '0942117607', 'hà nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `masanpham` int(10) NOT NULL,
  `tensanpham` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `maloai` int(10) NOT NULL,
  `mieuta` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoihan` timestamp NOT NULL DEFAULT current_timestamp(),
  `tongmua` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`masanpham`, `tensanpham`, `gia`, `maloai`, `mieuta`, `anh`, `thoihan`, `tongmua`) VALUES
(1, 'Hạt CATSRANG KITTEN Cho Mèo Con', 87000, 1, 'Bổ sung thêm chất xơ, giúp cho tiêu hóa tốt hơn, ngăn chặn tình trạng lông vón cục\r\nTăng cường dưỡng chất đầy đủ cho cơ thể\r\nChăm sóc bộ lông mèo bóng mượt\r\nPhòng tránh bệnh quáng gà nhờ các chất dinh dưỡng được cung cấp cân bằng và đầy đủ.', '56677.jpg', '2023-11-09 15:13:24', 6),
(2, 'Thức ăn cho mèo con Catsrang', 75000, 1, 'Catsrang Kitten 1.5kg là một dòng sản phẩm thức ăn chuyên dụng dạng hạt cho mèo con, có nguồn gốc xuất xứ ở Hàn Quốc và đã được nhập khẩu cung cấp chính hãng tại Việt Nam. Sản phẩm đáp ứng đầy đủ những nhu cầu về dưỡng chất cần thiết cho quá trình phát triển ở mèo. Đặc biệt, luôn tạo tiền đề tốt nhất để thú cưng của bạn có khỏe mạnh trong giai đoạn trưởng thành.', '442bca51121ecae85cd96fb1255289be.jpg', '2023-11-09 15:56:48', 0),
(3, 'Phụ kiện - Đệm / nệm / ổ cho thú cưng', 48000, 2, '* Ngủ trên giường với gối mềm mại và thoải mái.\n\n• Thông qua quá trình sản xuất tiêu chuẩn, chú ý đến từng bước.\n\n• Lông mềm mại, làm cho thú cưng cảm thấy mềm mại, thoải mái, không bị gián đoạn.\n\n• Nội thất được làm đầy VỚI SỢI TỔNG hợp 3D, không sờn, không sụp đổ, mềm mại, bền, thoải mái khi chạm vào, không gây kích ứng.\n\n* Đáy ghế được may bằng vải chống thấm nước và chống trượt.\n\n* Lâu dài, an toàn cho vật nuôi. có thể giặt\n\n• Màu xám sang, xịn, sạch.\n\n• Kích thước 27*34cm', 'phukien1.jpg', '2023-11-04 22:38:59', 0),
(5, 'Bát ăn cho chó mèo thú cưng hai ngăn', 44500, 2, 'Đường kính đáy bát to: 18.5cm\r\nĐường kính miệng bát to: 14cm\r\nĐường kính miệng bát nhỏ: 10cm\r\nChiều dài: 30 cm\r\nChiều rộng:15 cm\r\nChiều cao: 6 cm\r\nChất liệu: Nhựa PP, inox\r\nBát ăn được làm từ chất liệu cao cấp, không chứa BPA, an toàn cho sức khỏe thú cưng. Mặt bát phẳng và rộng giúp chó mèo dễ dàng tiếp cận thức ăn mà không làm rơi vãi ra ngoài. Hai ngăn có thể tháo rời giúp việc vệ sinh trở nên dễ dàng và tiện lợi hơn bao giờ hết.', 'phukien2.jpg', '2023-09-08 02:46:07', 0),
(6, 'Balo phi hành gia trong suốt thú cưng', 80000, 2, '- Balo phi hành gia cho chó mèo là sản phẩm linh động cho khách hàng khi mang theo thú cưng của mình đi chơi.\n- Balo phi hành gia có thiết kế thông minh, thông thoáng giúp cho thú cưng của bạn thoải mái và an toàn khi di chuyển. Vòm kính có thể thay thế bằng lưới nhựa và phù hợp với nhu cầu của bạn. Lưới nhựa tặng kèm ngay bên trong Balo phi hành gia mà bạn không cần phải mua thêm. \nkích cỡ 33*28*42, balo phù hợp cho các boss dưới 10kg', 'phukien3.jpg', '2023-06-04 07:48:47', 0),
(7, 'WHISKAS Thức Ăn Cho Mèo Trưởng Thành', 248900, 1, 'Sản phẩm này bao gồm các loại thức ăn khô và ướt với nhiều hương vị khác nhau, từ viên giòn đến mọng nước, giúp đáp ứng khẩu vị và nhu cầu dinh dưỡng của mèo. Được chế biến từ nguyên liệu chất lượng như ngũ cốc, gia cầm và phụ phẩm gia cầm, cám gạo, hạ đậu nành, WHISKAS đảm bảo cung cấp protein, chất béo, canxi và các dưỡng chất khác giúp mèo phát triển khỏe mạnh.', 'thucan1.jpg', '2023-12-01 03:36:15', 0),
(8, 'Thức Ăn Cho Chó Con Dạng Sốt', 129900, 1, 'Thức ăn cho chó con dạng sốt thường chứa các thành phần giàu dinh dưỡng như phụ phẩm thịt gà, gan bò, và thịt gà. Các chất tạo gel và chất xơ giúp cải thiện độ kết dính và cấu trúc của thức ăn, trong khi dầu đậu nành cung cấp axit béo cần thiết. Sản phẩm này cung cấp một lượng protein đáng kể, cần thiết cho sự phát triển của chó con, cũng như các vitamin và khoáng chất hỗ trợ sức khỏe tổng thể. Thức ăn dạng sốt cũng dễ tiêu hóa, giúp chó con dễ dàng hấp thụ các dưỡng chất.', 'thucan2.jpg', '2023-11-27 01:34:31', 0),
(9, 'Phụ kiện dây dắt Hamster mới nhất', 30000, 2, 'Giới thiệu phụ kiện dây dắt hamster đa năng - sự lựa chọn hoàn hảo cho những chú hamster yêu quý của bạn! Với thiết kế thông minh và tiện lợi, phụ kiện này không chỉ giúp bạn dễ dàng dắt thú cưng nhỏ bé của mình đi dạo mà còn mang lại cho chúng niềm vui khi khám phá thế giới bên ngoài chuồng của mình.\r\n\r\nSản phẩm được làm từ chất liệu cao cấp, đảm bảo sự thoải mái và an toàn tối đa cho hamster khi sử dụng. Dây dắt có độ đàn hồi tốt, phù hợp với mọi kích cỡ hamster, từ bé nhỏ đến lớn hơn.', 'phukien4.jpg', '2023-11-19 03:37:36', 0),
(10, 'Hoa quả sấy thơm ngon cho Hamster', 8000, 1, 'Sản phẩm “Hoa quả sấy thơm ngon cho Hamster” của Pikapet được chọn lọc kỹ càng từ những loại hoa quả ngon và chất lượng nhất. Được đóng gói tiện lợi trong túi zip, sản phẩm này giúp bảo quản hoa quả khô một cách tốt nhất, đảm bảo độ tươi mới và tránh được sự xâm nhập của kiến gián. Mỗi túi có trọng lượng 100 gram, cung cấp một lượng đáng kể thức ăn thưởng cho hamster của bạn, giúp chúng có thêm sự đa dạng trong chế độ ăn hàng ngày.', 'thucan3.jpg', '2023-11-06 13:41:16', 0),
(11, 'MASTI Xịt khử mùi cho thú cưng', 41000, 3, 'Xịt đa chức năng của chúng tôi có thể khử mùi hôi. Xịt khử mùi hiệu quả có khả năng khử mùi và nấm mốc do vật nuôi gây ra, chẳng hạn như mùi cơ thể, mùi phân, mùi phân và mùi hôi.\r\n\r\n\r\n\r\nKhông thành vấn đề nếu bạn vào miệng và nhìn trực tiếp vào cơ thể trẻ em. Nó có thể được xịt trực tiếp lên cơ thể trẻ em để vô tình làm vô hại. Không thành vấn đề nếu bạn vào miệng và mắt mà không có tai nạn vào miệng và mắt.', 'vstc1.jpg', '2018-11-14 11:10:51', 13),
(12, 'Lược chải lông MASTI LI0068 đẹp mắt', 32000, 3, '[Tên sản phẩm] Lược chải lông gỡ rối tự làm sạch [Chất liệu] Thép không gỉ + Cao su mềm [Thích hợp cho thú cưng] Cún cưng, mèo cưng lông dài và ngắn [Đặc điểm] Nhấn một nút làm sạch đơn giản và thoải mái. Sản phẩm tốt/ Thiết kế cẩn thận các chi tiết/ Đầu tròn đã được chứng minh an toàn/ Không làm tổn thương da/ Thao tác đơn giản, dễ dàng sử dụng.\r\n\r\nThông tin sản phẩm: Chiều dài 20cm, Chiều rộng 10cm.', 'vstc2.jpg', '2022-11-30 11:15:22', 22),
(13, 'Cát Vệ Sinh Cho Mèo Hương Vị Capuchino', 55000, 3, '-	Cát vệ sinh Nhật Bản hỗ trợ khử mù hiệu quả, hỗ trợ hạn chế tối đa mùi khó chịu từ chất thải của mèo\r\n\r\n-	Cát vệ sinh không bụi bẩn, không dính chân sẽ mang tới cho mèo cưng của bạn trải nghiệm tốt khi sử dụng\r\n\r\n-	Bên cạnh đó sản phẩm với công thức kháng khuẩn sẽ hỗ trợ bảo vệ sức khỏe của mèo\r\n\r\n-	Cát vệ sinh dễ vón cục khi tiếp xúc với phân và nước tiểu của thú cưng, do đó góp phần hỗ trợ cho công việc dọn vệ sinh chuồng của bạn tiện lợi và dễ dàng hơn.', 'vstc3.jpg', '2023-11-30 14:31:40', 12),
(14, 'Gel tắm cho thú cưng khử mùi chống ngứa', 45000, 3, 'Đảm bảo bốn chức năng\r\nGiàu các AFFG cytokines\r\nCó khả năng kích hoạt sâu tế bào lông\r\nĐánh thức thần kinh phát triểnc ác sợi lông và nuôi dưỡng các sợi lông hư tổn\r\nGiàu các yếu tố làm đẹp sinh học \r\nTăng cường điều hòa dinh dưỡng của lông, làm cho lông mềm mại và sạch sẽ hơn \r\nCông nghệ chiết xuất sinh học \r\nThu hút và giải phóng các yếu tố dưỡng ẩm sinh học để đạt được độ ẩm \r\nChứa các peptide kháng khuẩn sinh học \r\nSản phẩm có thể ức chế vi khuẩn hiệu quả, khử mùi đặc biệt và thực sự đạt đượ', 'vstc4.jpg', '2022-11-28 14:34:44', 47),
(15, 'Combo kìm cắt dũa móng cho chó mèo', 25000, 3, 'Đầu kìm cắt bằng thép không gỉ: Chọn chất liệu thép không gỉ tốt, Chống ăn mòn, chịu nhiệt độ cao, độ bền và độ bền cao. Thiết kế vách ngăn an toàn Vách ngăn móng tay của vật nuôi không bị cắt quá sâu và làm tổn thương da Của chủ sở hữu vật nuôi. Tay cầm không trượt. Thiết kế thân thiện người dùng có thể đóng vai trò mát xa chống trượt. Lựa chọn tinh tế, chất liệu sử dụng TPE, PP sẽ không gây dị ứng da cho vật nuôi hoặc con người Khóa bằng phẳng.', 'vstc5.jpg', '2023-08-07 14:38:02', 98),
(16, 'Áo Len Phối Nhung In Hình Mèo Dễ Thương', 28000, 4, 'Chất liệu: Áo được làm bằng chất liệu len và nhung cao cấp, mềm mại, ấm áp và thoáng khí. Áo có thể giữ cho thú cưng của bạn không bị lạnh trong mùa đông và không bị nóng trong mùa hè.\r\nThiết kế: Áo có thiết kế đơn giản nhưng đáng yêu, với hình mèo hoạt hình in trên ngực áo. Áo có nhiều màu sắc để bạn lựa chọn, như đỏ, vàng, xanh, hồng. Áo có cổ tròn và tay áo dài, ôm sát cơ thể thú cưng, không gây cảm giác bí bách hoặc khó chịu.', 'quanao1.jpg', '2020-12-02 14:45:50', 76),
(17, 'Chuông gắn vòng cổ thú cưng Masti', 1500, 4, 'Thính giác của chó cưng và mèo cưng nhạy hơn nhiều lần so với con người, vì vậy bản thân âm thanh chuông sẽ không quá to và âm thanh to quá lớn sẽ gây hại cho thính giác của thú cưng. Nếu bạn cho rằng âm thanh quá to, bạn cũng có thể nhét bông hoặc giấy vệ sinh bên trong chuông.', 'quanao2.jpg', '2023-11-30 15:08:26', 34),
(18, 'Yếm Ăn Hình Nón Giáng Sinh Cho Thú Cưng', 45000, 4, 'Màu sắc: \r\n\r\nS: (Thích hợp cho vật nuôi 1-4 kg)\r\n\r\nL: (Thích hợp cho vật nuôi 4-7.5 kg)\r\n\r\nChất liệu: Polyester\r\n\r\nMùa hay nhất: Bốn mùa\r\n\r\nPhong cách: phim hoạt hình\r\n\r\nCác ngày lễ áp dụng: Halloween / Ngày ma, Đám cưới, Sinh nhật, Giáng sinh, Lễ hội mùa xuân, Tết Trung thu, Tết Dương lịch, Quốc khánh', 'quanao3.jpg', '2023-11-30 15:10:57', 29),
(19, 'Hipidog pet móc treo quần áo bằng nhựa', 5200, 4, 'Loại sản phẩm: Móc treo quần áo thú cưng\r\n\r\nDành cho: Cún cưng\r\n\r\nChất liệu: Nhựa\r\n\r\nMóc treo quần áo kích thước S (18cm) (Chiều dài xấp xỉ 18 cm) Thích hợp với size quần áo S M L\r\n\r\nMóc treo quần áo kích thước L (25cm) (Chiều dài xấp xỉ 25 cm) Thích hợp cho size quần áo L XL XXL\r\n\r\nGói hàng bao gồm:\r\n\r\n1 x Móc treo quần áo thú cưng', 'quanao4.jpg', '2023-11-15 15:12:04', 65),
(20, 'Đồ chơi thú cưng thiết kế chuột lồng', 8500, 5, 'Thông tin chi tiết: \r\n\r\nChất Liệu: Lông thỏ\r\n\r\nDanh mục sản phẩm: đồ chơi mèo vui nhộn\r\n\r\nTrọng lượng: 20 gram\r\n\r\nMàu sắc: có màu sắc ngẫu nhiên\r\n\r\nĐường kính của quả bóng khoảng 6,5 cm.', 'dochoi1.jpg', '2023-11-25 15:22:03', 81),
(21, 'Đồ chơi cần câu thú cưng bằng dây thép', 12000, 5, 'Mèo đồ chơi với chuông và rít để thu hút mèo.\r\n\r\nĐó là một món đồ chơi cho mèo để thực hành kỹ năng của họ. Để nhảy và di chuyển, một món đồ chơi tuyệt vời để tương tác với con mèo của bạn để chơi và tập thể dục.\r\n\r\nTrêu chọc mèo đồ chơi vật nuôi, thiết kế cực nhỏ để làm cho bạn thoải mái để chơi với mèo.\r\n\r\nThực hiện theo các cửa hàng và nhấp vào liên kết sản phẩm\r\n\r\nSẽ có nhiều sản phẩm khác xuất hiện.Nếu bạn muốn biết thêm thông tin, bạn có thể hỏi qua chat. dịch vụ sau bán hàng', 'dochoi2.jpg', '2023-11-06 15:30:36', 54),
(22, 'pet toys cánh đầy màu sắc đồ chơi thú cưng', 16000, 5, 'Bong bóng cánh thiên thần, Cánh bướm\r\n\r\n- Băng tay có thể điều chỉnh độ dài theo ràng buộc\r\n\r\n- Kích thước có thể nhìn thấy trong hình ảnh\r\n\r\n- Cho tiệc sinh nhật, ngày thiếu nhi, các bữa tiệc khác nhau\r\n\r\n- Bóng bay bằng giấy bạc có thể loại bỏ không khí sau đó tái sử dụng\r\n\r\n- Sử dụng Máy thổi phồng để thổi bóng bay\r\n\r\n- Không thổi bóng quá chặt, có thể làm bong bóng bị vỡ!!', 'dochoi3.jpg', '2023-11-29 15:32:16', 17),
(23, 'Bóng Rơm Tự Nhiên Treo Đồ Chơi Cho Thỏ', 27000, 5, '- Làm bằng tay, chọn lọc tự nhiên, tươi và tự nhiên, tự nhiên và không ô nhiễm\r\n- Có thể treo trong lồng để cho thú cưng răng hàm lâu dài và duy trì sức khỏe răng miệng\r\n- Chơi với thú cưng của bạn, trút bỏ cảm xúc của bạn và để thú cưng của bạn lớn lên khỏe mạnh\r\n- Trang trí đẹp, bóng rơm tinh tế có thể được sử dụng để trang trí lồng\r\n- Thực tế và bền, mạnh mẽ và chống cắn, tuổi thọ lâu dài\r\n--Kích Thước: 40 x 6cm', 'dochoi4.jpg', '2023-11-27 15:34:45', 3),
(24, 'Đồ Chơi Chuột Giả Có catnip Cho Mèo', 13000, 5, 'Catnip chứa nhiều loại khoáng chất: vitamin, chất xơ thực vật và chất diệp lục, v.v. Mèo có thể thư giãn khi chơi.\r\nLàm bằng catnip và lông vũ hoang dã: không phụ gia hóa học, chú ý đến sức khỏe và sự an toàn của mèo.\r\nThiết kế: Mỗi catnip được kết hợp với lông vũ để thu hút hoàn toàn sự chú ý của mèo, chúng sẽ thích món đồ chơi này.\r\nKích thước: Kích thước chuột dài khoảng 5 cm, tổng chiều dài của sản phẩm khoảng 13 cm.\r\nLông mềm: chủ nhân có thể chơi các trò chơi tương tác với mèo.\r\nTính năng:', 'dochoi5.jpg', '2023-11-29 15:39:16', 91),
(25, 'Đồ chơi bàn xoay tầng lăn bóng tương tác', 48000, 5, 'Sản phẩm này là một loại đồ chơi cho mèo có thiết kế bàn xoay với nhiều tầng lăn bóng. Mỗi tầng có một quả bóng màu sắc khác nhau để thu hút sự chú ý của mèo. Mèo có thể đẩy bóng để làm cho nó lăn trên bàn xoay, tạo ra âm thanh và chuyển động thú vị. Đồ chơi này giúp kích thích trí thông minh, sáng tạo và khả năng vận động của mèo, đồng thời giảm stress và cô đơn khi không có chủ nhân ở bên. Đồ chơi này có nhiều kích cỡ và mẫu mã khác nhau để phù hợp với nhu cầu và sở thích của mèo và chủ nhân.', 'dochoi6.jpg', '2023-11-26 16:01:02', 42),
(26, 'Vòng cổ nhựa thời trang cho thú cưng', 25000, 2, 'Màu sản phẩm: Vàng , Bạc\r\n\r\nKích thước sản phẩm: Chu vi vòng cổ trung bình khoảng 36cm + 7cm (dây chuyền kéo dài)\r\n\r\nChiều rộng sản phẩm: 2cm\r\n\r\nTrọng lượng sản phẩm: 35g', 'phukien5.jpg', '2023-08-15 16:07:24', 68),
(27, 'Rọ mõm hình mỏ vịt cho chó siêu xinh', 33000, 2, 'Rọ mõm cho chó, rọ mõm hình mỏ vịt siêu xinh dành cho chó to và chó nhỏ\r\n\r\nBây giờ ra ngoài đi dạo, đi công viên thì bé boss nhà mình luôn luôn phải được trang bị một chiếc \"rọ mõm cho chó\" đấy nhé các SEN. Một mặt vừa có thể bảo vệ những người đi đường, những bạn chó, bạn mèo khác ở công viên, một mặt đó cũng là cách để boss đỡ ăn trúng đồ ăn bậy bạ trên đường đó nha.', 'phukien6.jpg', '2023-11-12 16:11:22', 86),
(28, 'Vòng loa đeo cổ chống cắn cho chó', 74000, 2, 'Vòng chống liếm cho cún và mèo, chống liếm vết thương sau khi phẫu thuật ( triệt sản, mổ u, đóng đinh...) vết chầy xước, vùng da tổn thương. Chống cào, dụi, tránh tổn thương mắt.\r\n\r\n- size 7 – Vòng cổ 18-20cm\r\n- size 6 – Vòng cổ 18-22cm\r\n- size 5 – VÒng cổ 23-29cm\r\n- size 4 – Vòng cổ 26-31cm\r\n- size 3 – Vòng cổ 34-36cm\r\n- size 2 – Vòng cổ 33-38cm\r\n- size 1 – Vòng cổ 41-48cm', 'phukien7.jpg', '2023-11-15 16:13:17', 24),
(29, 'Dây xích chó mèo kèm yếm Dây dắt chó đi dạo', 68000, 2, 'Dây dắt cho chó mèo kèm yếm Dây dắt chó mèo đi dạo\r\nKích thước :\r\n- Size M: bản yếm rộng 1cm, vòng yếm 35 - 45cm (1-7kg)\r\n- Size L: bản rộng 1.5cm, vòng yếm 40 - 55cm (3-10kg )\r\nCông dụng :\r\n- dây xích chó được thiết kế dạng ôm sát từ hai bên, có thể điều chỉnh kích thước ôm sát với phần vai và cổ, giúp chó không bị đau hay trầy xước da do dây lỏng.\r\n- Dây dắt mèo có tay cầm êm, giúp bạn không bị đau tay khi cầm lâu.\r\n- Chất liệu từ vải dày bền đẹp.\r\n Màu sắc: đỏ , xanh dương , nâu', 'phukien8.jpg', '2023-11-13 16:14:44', 73),
(30, 'Quần áo thú cưng xinh xắn họa tiết hoạt hình', 32000, 4, 'Danh mục sản phẩm: Đồ mặc cho cặp đôi thú cưng, Áo khoác cho thú cưng\r\n\r\nChất liệu: Vải Cotton, Vải có độ co giãn tốt, phù hợp với hầu hết các vật nuôi mặc\r\n\r\n[Kích thước] Nên Đo Ngực Và Chiều Dài Lưng, Nên Thả Rộng 2 ~ 3 cm, Trọng Lượng Chỉ Mang Tính Chất Tham Khảo, Bạn Có Thể Tham khảo Dịch Vụ Khách Hàng Về Vấn Đề Kích Thước Là Tham khảo Chỉ\r\n\r\nCân nặng 1-2kg (Ngực 35cm, Dài lưng 25cm, Cân nặng khuyến nghị 1-2kg)\r\n\r\nCân nặng 2,5-35kg (Ngực 40cm, Dài lưng 30cm, Cân nặng khuyến nghị 2,5-35kg)\r\n\r', 'quanao5.jpg', '2023-11-29 16:27:12', 57),
(31, 'Gói thức ăn Masti 15g cho mèo cưng', 1000, 1, 'Súp thưởng cho mèo: Sản phẩm là một loại súp dành cho mèo trên 6 tháng tuổi, có 3 vị: gà, cá ngừ và cá tuyết. Súp giúp kích thích sự thèm ăn, dễ tiêu hóa và hấp thụ, giàu taurine và chất dinh dưỡng khác', 'thucan4.jpg', '2023-12-31 14:51:29', 15),
(32, 'Thức ăn chó Smartheart - 400g/túi', 26000, 1, '- Giúp tim mạch khỏe mạnh: Axit béo Omega-3 từ dầu cá cho tim mạch khỏe mạnh.\r\n- Tăng cường hệ thống miễn dịch: Vitamin E và Selenium giúp tăng cường hệ thống miễn dịch.\r\n- Hệ tiêu hóa khỏe mạnh: Với thành phần dễ tiêu hóa giúp hấp thụ chất dinh dưỡng tối ưu.\r\n- Da và lông khỏe mạnh: Axit béo Omega 3 & 6 cân bằng và đảm bảo cho da khỏe và lông óng mượt.\r\n- Xương và răng khỏe mạnh: Canxi và Photpho cho xương hông chắc và răng khỏe mạnh.', 'thucan5.jpg', '2023-12-18 14:56:19', 78);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_dat_hang`
--
ALTER TABLE `chi_tiet_dat_hang`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `fk_sanpham` (`masanpham`),
  ADD KEY `fk_dathang` (`madathang`);

--
-- Chỉ mục cho bảng `dat_hang`
--
ALTER TABLE `dat_hang`
  ADD PRIMARY KEY (`madathang`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`manguoidung`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `fk_loai` (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_dat_hang`
--
ALTER TABLE `chi_tiet_dat_hang`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dat_hang`
--
ALTER TABLE `dat_hang`
  MODIFY `madathang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `manguoidung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `masanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_dat_hang`
--
ALTER TABLE `chi_tiet_dat_hang`
  ADD CONSTRAINT `chi_tiet_dat_hang_ibfk_1` FOREIGN KEY (`masanpham`) REFERENCES `san_pham` (`masanpham`),
  ADD CONSTRAINT `fk_dathang` FOREIGN KEY (`madathang`) REFERENCES `dat_hang` (`madathang`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_loai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
