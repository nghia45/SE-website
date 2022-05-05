-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2022 lúc 05:57 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_mysql`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dangki`
--

CREATE TABLE `tb_dangki` (
  `id_dangki` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_dangki`
--

INSERT INTO `tb_dangki` (`id_dangki`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'lam', 'lamvip24042002@gmail.com', 'sdfasdfvajsn', '827ccb0eea8a706c4c34a16891f84e7b', '0435353252'),
(2, 'lam', '20020433@vnu.edu.vn', 'sdfasdfvajsn', '827ccb0eea8a706c4c34a16891f84e7b', '0435353252');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Adidas', 1),
(2, 'Bitis', 2),
(3, 'Nike', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id_order_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_order_details`
--

INSERT INTO `tb_order_details` (`id_order_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(1, '2134', 5, 3),
(2, '9', 5, 4),
(3, '9', 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` int(100) NOT NULL,
  `giasp` int(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'nike1', 1, 200000, 100, 'nike-air-force-1-shadow-pistachio.jpg', 'giay dep', 'giay sieu dep', 1, 3),
(2, 'nike2', 2, 300000, 200, 'csxyfmvdyp8eh.jpg', 'giay dep', 'giay super dep', 1, 3),
(3, 'nike3', 3, 250000, 150, 'fragment-sacai-Nike-LDWaffle-Grey-DH2684-001-3.jpg', 'giay dep', 'giay cuc dep', 1, 3),
(4, 'bitis1', 100, 200000, 100, '6jnu0krailucu.jpg', 'fggdfgds', 'fdgdfsgsd', 1, 2),
(5, 'bitis2', 200, 300000, 150, 'a779bfa4694a821412b75dbcae84cbf1.jpg', 'fgshf', 'gdsfgsdf', 1, 2),
(7, 'adidas1', 10, 300000, 200, 'tải xuống.jpg', 'dsfgf', 'fdgsdg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thanhtoan`
--

CREATE TABLE `tb_thanhtoan` (
  `id_thanhtoan` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_thanhtoan`
--

INSERT INTO `tb_thanhtoan` (`id_thanhtoan`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, 1, '2134', 1),
(2, 1, '9', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tb_dangki`
--
ALTER TABLE `tb_dangki`
  ADD PRIMARY KEY (`id_dangki`);

--
-- Chỉ mục cho bảng `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD PRIMARY KEY (`id_order_details`);

--
-- Chỉ mục cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  ADD PRIMARY KEY (`id_thanhtoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_dangki`
--
ALTER TABLE `tb_dangki`
  MODIFY `id_dangki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id_order_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  MODIFY `id_thanhtoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
