-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2021 pada 07.08
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
-- Database: `chachingan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(13, '16LYjuBZRGAeA', 6, '2021-03-14 07:55:25', 'Confirmed'),
(14, '16nHfw8HYEhV2', 6, '2021-03-14 08:10:02', 'Cart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idproduk`, `qty`) VALUES
(19, '16LYjuBZRGAeA', 1, 1),
(20, '16LYjuBZRGAeA', 2, 1),
(21, '16nHfw8HYEhV2', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(1, 'Hot Promo', '2021-03-12 14:31:19'),
(2, 'Meat', '2021-03-12 14:31:19'),
(3, 'Seafood', '2021-03-12 14:31:19'),
(4, 'Noodles', '2021-03-12 14:31:19'),
(5, 'Regular', '2021-03-12 14:31:19'),
(6, 'Rice', '2021-03-12 14:31:19'),
(7, 'Drink, Tea', '2021-03-12 14:31:19'),
(8, 'Drink,  Alcohol', '2021-03-12 14:31:19'),
(9, 'Drink, Juice', '2021-03-13 09:36:26'),
(10, 'Soup', '2021-03-13 09:39:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`) VALUES
(2, '16LYjuBZRGAeA', 6, 'Bank BCA', 'Julius Alfredo', '2021-03-01', '2021-03-14 08:01:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `lahir` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `first_name`, `last_name`, `gender`, `lahir`, `email`, `password`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Admin', 'Admin', '', '', 'admin@admin.com', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', '2020-03-16 11:31:17', 'Admin', NULL),
(6, 'Julius', 'Alfredo', 'Man', '2001-07-27', 'julius.alfredo@student.umn.ac.id', '$2y$10$CxrB5RbI68eCV6G1MJEQu.6gZyie0HN7ETcgQSx15DZF7eGnVzgd6', '2021-03-12 17:19:11', 'Member', NULL),
(7, 'Udin', 'Min', 'Man', '2021-03-03', 'udin.wp@gmail.com', '$2y$10$vnOO1Q3IMk4Gsy7WTzoAWOXag80CDxkqiJHs9v6YvMfVFyR2ZsHw6', '2021-03-15 06:06:51', 'Member', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no`, `metode`, `norek`, `logo`, `an`) VALUES
(1, 'Bank BCA', '13131231231', 'images/bca.jpg', 'Cha Chi Ngan'),
(2, 'Bank Mandiri', '943248844843', 'images/mandiri.jpg', 'Cha Chi Ngan'),
(3, 'DANA', '0882313132123', 'images/dana.png', 'Cha Chi Ngan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `hargabefore` int(11) NOT NULL,
  `hargaafter` int(11) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `tgldibuat`) VALUES
(1, 1, 'Hotpot', 'produk/Hotpot.jpg', 'Hotpot (火锅 huǒguō) is a “dish” to tell apart real Chinese food lovers. If you really appreciate hotpot rather than just ordering fired rice, chow mein, and dim sum all the time, you are truly a Chines', 5, 85000, 79000, '2021-03-13 06:51:20'),
(2, 2, 'Sichuan Pork', 'produk/Sichuan Pork.jpg', 'Sichuan Pork, actually, poached spicy slices of pork (水煮肉片 shuǐzhǔ ròupiàn) is a famous Sichuan cuisine dish. Rather than cooking pork by stir-frying or deep-frying, which consumes lots of oil and can', 4, 37500, 32000, '2021-03-13 06:53:31'),
(3, 2, 'Dumplings', 'produk/Dumplings.jpg', 'Dumplings (饺子 jiǎozi) consist of minced meat and chopped vegetables wrapped in a thin dough skin. With a long history of more than 1,800 years, dumplings are a traditional food widely popular in North', 4, 17500, 16500, '2021-03-13 06:58:06'),
(4, 3, 'Shrimp with Vermicelli and Garlic', 'produk/Shrimp with Vermicelli and Garlic.jpg', 'Shrimp with Vermicelli and Garlic, Shrimp with vermicelli and garlic (蒜蓉粉丝蒸虾 suànróng fěnsī zhēng xiā) is a dish not only favored by foreigners but also the Chinese younger generation in recent years ', 5, 25000, 20000, '2021-03-13 06:59:12'),
(5, 2, 'Braised Pork Balls in Gravy', 'produk/Braised Pork Balls in Gravy.jpg', 'Braised Pork Balls in Gravy, Braised pork balls in gravy (四喜丸子 sì xǐ wánzi) are also known as “Chinese meatballs” (many of our clients call them this). If you like meatballs and spaghetti, you’ll prob', 4, 30000, 28000, '2021-03-13 08:14:02'),
(6, 4, 'Chow Mein', 'produk/Chow Mein.jpg', 'Chow mein (炒面 chǎomiàn) is the Cantonese pronunciation of the Chinese characters above, which means stir-fried noodles. Generally speaking, this stir-fried dish consists of noodles, meat (usually chic', 4, 15000, 15000, '2021-03-13 08:15:25'),
(7, 2, 'Peking Roasted Duck', 'produk/Peking Roasted Duck.jpg', 'Peking duck (北京烤鸭 Běijīng kǎoyā) is a famous dish from Beijing, enjoying world fame, and considered as one of China’s national dishes.\r\n\r\nPeking duck is savored for its thin and crispy skin. The Slice', 5, 32500, 30000, '2021-03-13 08:20:28'),
(8, 2, 'Steamed Vermicelli Rolls', 'produk/Steamed Vermicelli Rolls.jpg', 'Steamed vermicelli rolls (肠粉 chángfěn) are definitely one of the must-orders of any dim sum meal! They are not only an expert choice in Guangzhou teahouses, morning tea restaurants, and street food ni', 3, 21000, 20000, '2021-03-13 08:21:25'),
(9, 3, 'Fried Shrimp with Cashew Nuts', 'produk/Fried Shrimp with Cashew Nuts.jpg', 'Fried shrimp with cashew nuts (腰果虾仁 yāoguǒ xiārén) is another popular dish among foreigners in China. Its name explains everything. You get the tenderness of peeled shrimps and the crispiness of cashe', 3, 17000, 17000, '2021-03-13 08:23:19'),
(10, 2, 'Sweet and Sour Pork', 'produk/Sweet and Sour Pork.jpg', 'Sweet and sour pork (糖醋里脊 tángcù lǐjǐ) has a bright orange-red color, and a delicious sweet and sour taste.\r\n\r\nAt the very beginning there was only sweet and sour pork, but to meet demands, there have', 3, 20000, 18000, '2021-03-13 08:24:14'),
(11, 2, 'Kung Pao Chicken', 'produk/Kung Pao Chicken.jpg', 'Kung Pao Chicken (宫保鸡丁 gōngbào jīdīng) is a famous Sichuan-style specialty, popular with both Chinese and foreigners. The major ingredients are diced chicken, dried chili, and fried peanuts. People in', 5, 130000, 130000, '2021-03-13 08:25:38'),
(12, 5, 'Ma Po Tofu', 'produk/Ma Po Tofu.jpg', 'Ma po tofu (麻婆豆腐 mápó dòufǔ) is one of the most famous dishes in Chuan Cuisine with a history of more than 100 years. Ma (麻) describes a spicy and hot taste which comes from pepper powder, one kind of', 4, 14300, 14000, '2021-03-13 08:32:50'),
(13, 5, 'Wontons', 'produk/Wontons.jpg', 'Wontons (馄饨 húntun) have been a customary food for people to eat on the winter solstice since the Tang Dynasty (618–907).\r\n\r\nThe most versatile shape of a wonton is simple a right triangle, similar to', 4, 23700, 22500, '2021-03-13 08:43:39'),
(14, 5, 'Spring Rolls', 'produk/Spring Rolls.jpg', 'Spring rolls (春卷 chūnjuǎn) are a Cantonese dim sum of cylindrical shape. The filling of spring rolls could be vegetables or meat, and the taste could be either sweet or savory. After fillings are wrap', 4, 11000, 11000, '2021-03-13 08:44:42'),
(15, 6, 'Yangchow Fried Rice', 'produk/Yangchow Fried Rice.jpg', 'Yangchow fried rice (扬州炒饭 Yángzhōu chǎofàn) is a classic fried rice you have to try if you travel to Yangzhou. It is in this city that chefs do fried rice the best, and so Yangchow fried rice has dist', 4, 15000, 15000, '2021-03-13 08:46:00'),
(16, 7, 'Pu Erh', 'produk/Pu Erh.jpg', 'Pu erh, also known as aged or vintage tea is a renowned tea produced exclusively in the Yunnan province of China. There are two main varieties: raw, non-fermented pu erh, called pu erh sheng, and ripe', 4, 15000, 15000, '2021-03-13 08:47:43'),
(17, 7, 'White Tea', 'produk/White Tea.jpg', 'White tea is a category of Chinese tea that has a somewhat vague classification. Still, it is generally considered that this variety is lighter in color and has a more delicate flavor than green or bl', 4, 8000, 8000, '2021-03-13 08:48:26'),
(18, 8, 'Mijiu', 'produk/Mijiu.jpg', 'Mijiu is a universal term used to denote basic Chinese rice wine, which is believed to have been the first of its kind that later influenced the immersion of many local varieties throughout Asia. It i', 4, 12000, 12000, '2021-03-13 08:49:14'),
(19, 7, 'Oolong', 'produk/Oolong.jpg', 'Oolong is a semi-oxidized tea that can vary depending on the leaf style, level of oxidation, color, and the roasting degree. Falling somewhere between green and black teas, it is one of the most compl', 4, 7000, 7000, '2021-03-13 08:52:26'),
(20, 8, 'Rice Wine', 'produk/Rice Wine.jpg', 'Although it presumably originated in China, rice wine is an alcoholic drink that exists in numerous local variants throughout Asia. This vast group of beverages is conventionally known as wine, but th', 5, 12000, 11000, '2021-03-13 09:01:22'),
(21, 7, 'Black Tea', 'produk/Black Tea.jpg', 'Black tea is a large and diverse category, and what differentiates it from other tea varieties is heavy oxidation—in the process, the tea leaves of the Camellia sinensis plant attain their distinctive', 4, 8000, 8000, '2021-03-13 09:02:01'),
(22, 2, 'Fried Frogs Legs', 'produk/Fried Frogs Legs.jpg', 'Frog is often said to taste like chicken, because it is mild in flavor. Frog legs can be best compared to chicken wings in taste and texture, but some people say that they taste similar to fish.', 4, 95000, 90000, '2021-03-13 09:38:30'),
(23, 10, 'Hot and Sour Soup', 'produk/Hot and Sour Soup.jpg', 'It is made with the goodness of mushrooms, cabbage, carrot and a spicy twist of red peppers or white pepper and sour with vinegar.', 4, 60000, 56000, '2021-03-13 09:40:48'),
(24, 2, 'Szechwan Chili Chicken', 'produk/Szechwan Chili Chicken.jpg', 'A fiery delight straight from the Sichuan region. It is loaded with pungent spices like brown pepper. red chillies, ginger, green chillies and white pepper.', 4, 72000, 72000, '2021-03-13 09:42:33'),
(25, 5, 'Chicken Congee', 'produk/Chicken Congee.jpg', 'Packed with bokchoy, mushrooms, spring onion and chicken, this heart-warming soup recipe is perfect for a chilly winter evening.', 4, 40000, 40000, '2021-03-13 10:03:22'),
(26, 6, 'Lotus Leaf Rice', 'produk/Lotus Leaf Rice.jpg', 'Lotus leaf rice is a classic Chinese dish consisting of sticky rice wrapped and steamed in lotus leaves.', 4, 50000, 45000, '2021-03-13 10:10:26'),
(27, 5, 'Oyster Omelette', 'produk/Oyster Omelette.jpg', 'The dish consists of small oysters added to a mixture of potato starch and egg batter.', 4, 45000, 40000, '2021-03-13 10:11:45'),
(28, 5, 'Moo Shu Pork', 'produk/Moo Shu Pork.jpg', 'A Northern Chinese dish known as moo shu pork is a seasoned meat and vegetable stir-fry that is also an integral part of American-Chinese cuisine.', 3, 60000, 56000, '2021-03-13 10:21:45'),
(29, 7, 'Chrysanthemum Tea ', 'produk/Chrysanthemum Tea .jpg', 'Coming from a flower, chrysanthemum tea is naturally flowery in both taste and scent, and provides a herbal remedy for many ailments.', 4, 12000, 10000, '2021-03-13 10:23:19'),
(30, 9, 'Orange Juice', 'produk/Orange Juice.jpg', 'A glass of fresh orange juice with fruit oranges', 5, 18000, 18000, '2021-03-13 10:24:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
