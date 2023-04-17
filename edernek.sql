-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 25 Mar 2023, 21:22:01
-- Sunucu sürümü: 10.6.10-MariaDB-log
-- PHP Sürümü: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `edernek`
--
CREATE DATABASE IF NOT EXISTS `edernek` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci;
USE `edernek`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abab`
--

DROP TABLE IF EXISTS `abab`;
CREATE TABLE `abab` (
  `id` int(11) NOT NULL,
  `msira` int(6) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `yyeri` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `kocanno` int(5) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni Bağış Alındı Belgesi ( MALZEME GİRİŞİ )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abb`
--

DROP TABLE IF EXISTS `abb`;
CREATE TABLE `abb` (
  `abb_id` int(11) NOT NULL,
  `abb_sn` int(11) NOT NULL,
  `abb_mc` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abb_miktar` int(11) NOT NULL,
  `abb_birim` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abab_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Alınan bağış bilgileri';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(75, 'admin', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aidat`
--

DROP TABLE IF EXISTS `aidat`;
CREATE TABLE `aidat` (
  `id` int(11) NOT NULL,
  `uyeno` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mkt` date NOT NULL,
  `mno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mkesen` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ay` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `au` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aldigiYardim`
--

DROP TABLE IF EXISTS `aldigiYardim`;
CREATE TABLE `aldigiYardim` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `aldigiYardim`
--

INSERT INTO `aldigiYardim` (`id`, `name`) VALUES
(1, '2022 Engelli Maaşı'),
(2, 'Evde Bakım Maaşı'),
(3, 'Emekli Maaşı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclist`
--

DROP TABLE IF EXISTS `araclist`;
CREATE TABLE `araclist` (
  `id` int(11) NOT NULL,
  `aracadi` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soforadi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `plaka` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aractakip`
--

DROP TABLE IF EXISTS `aractakip`;
CREATE TABLE `aractakip` (
  `id` int(3) NOT NULL,
  `uid` int(11) NOT NULL COMMENT 'üyenin üye tablosundaki id ''si',
  `tarih` date NOT NULL COMMENT 'hizmetin verildiği tarih',
  `ttarih` date NOT NULL COMMENT 'talep edilen tarih',
  `adsoyad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'hizmet alanın adı soyadı',
  `gyer` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'gideceği yer adresi ',
  `saat` time NOT NULL COMMENT 'gideceği saat',
  `arac` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'giden araç nosu',
  `adresi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'hizmet alanın adresi',
  `aciklama` text COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'araç için not',
  `dernekid` int(11) NOT NULL COMMENT 'hizmet veren derneğin id''si',
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aynialindi`
--

DROP TABLE IF EXISTS `aynialindi`;
CREATE TABLE `aynialindi` (
  `id` int(11) NOT NULL,
  `msira` int(6) NOT NULL,
  `sirano` int(5) NOT NULL,
  `mcinsi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(3) NOT NULL,
  `birim` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not` longblob NOT NULL,
  `kocanno` int(5) NOT NULL,
  `iptal` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni  Bağış Alındı Belgesi ( MALZEME GİRİŞİ )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayniyardim`
--

DROP TABLE IF EXISTS `ayniyardim`;
CREATE TABLE `ayniyardim` (
  `id` int(11) NOT NULL,
  `msira` int(6) NOT NULL,
  `btarih` date NOT NULL COMMENT 'Belgenin Hazırlanış Tarihi',
  `sirano` int(2) NOT NULL,
  `mcinsi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(3) NOT NULL,
  `birim` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not` longblob NOT NULL,
  `kocanno` int(5) NOT NULL,
  `iptal` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `itarih` date NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni Yardım Teslim Belgesi ( MALZEME ÇIKIŞI )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aytb`
--

DROP TABLE IF EXISTS `aytb`;
CREATE TABLE `aytb` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bht` date NOT NULL,
  `yyeri` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not1` longblob NOT NULL,
  `kocanno` int(5) NOT NULL,
  `msira` int(6) NOT NULL,
  `iptal` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni Yardım Teslim Belgesi ( MALZEME ÇIKIŞI )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aytbml`
--

DROP TABLE IF EXISTS `aytbml`;
CREATE TABLE `aytbml` (
  `id` int(11) NOT NULL,
  `aytbid` int(11) NOT NULL,
  `sirano` int(2) NOT NULL,
  `mcinsi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(3) NOT NULL,
  `birim` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aciklama` text COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aytb_tutanak`
--

DROP TABLE IF EXISTS `aytb_tutanak`;
CREATE TABLE `aytb_tutanak` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soyadi1` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bht` date NOT NULL,
  `yyeri` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not` longblob NOT NULL,
  `kocanno` int(5) NOT NULL,
  `msira` int(6) NOT NULL,
  `iptal` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni Yardım Teslim Belgesi ( MALZEME ÇIKIŞI )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aytb_yedek`
--

DROP TABLE IF EXISTS `aytb_yedek`;
CREATE TABLE `aytb_yedek` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bht` date NOT NULL,
  `yyeri` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `teden` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nasilverildi` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not` longblob NOT NULL,
  `kocanno` int(5) NOT NULL,
  `msira` int(6) NOT NULL,
  `iptal` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Ayni Yardım Teslim Belgesi ( MALZEME ÇIKIŞI )';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka_cuzdan`
--

DROP TABLE IF EXISTS `banka_cuzdan`;
CREATE TABLE `banka_cuzdan` (
  `id` int(3) NOT NULL,
  `tarih` date NOT NULL,
  `aciklama` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gider` decimal(12,2) NOT NULL,
  `gelir` decimal(12,2) NOT NULL,
  `yil` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `demirbas`
--

DROP TABLE IF EXISTS `demirbas`;
CREATE TABLE `demirbas` (
  `id` int(3) NOT NULL,
  `sn` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ecsv` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nsa` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `at` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mbkl` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tdml` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `yl` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ibt` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ict` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `idbmvt` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `isbhoi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ismt` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nerede` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depo_cikis`
--

DROP TABLE IF EXISTS `depo_cikis`;
CREATE TABLE `depo_cikis` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `kocan_no` int(11) NOT NULL,
  `sayfa_no` int(11) NOT NULL,
  `cinsi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `marka` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `aciklama` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depo_giris`
--

DROP TABLE IF EXISTS `depo_giris`;
CREATE TABLE `depo_giris` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `kocan_no` int(11) NOT NULL,
  `sayfa_no` int(11) NOT NULL,
  `fatura_no` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `cinsi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `marka` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `aciklama` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dernek`
--

DROP TABLE IF EXISTS `dernek`;
CREATE TABLE `dernek` (
  `id` int(11) NOT NULL,
  `sicilno` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekadi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `adres` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tel` varchar(17) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fax` varchar(17) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gsm` varchar(17) COLLATE utf8mb3_unicode_ci NOT NULL,
  `webadresi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mailadresi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `engelGrubu`
--

DROP TABLE IF EXISTS `engelGrubu`;
CREATE TABLE `engelGrubu` (
  `id` int(11) NOT NULL,
  `engelGrubu` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Engel Grubu';

--
-- Tablo döküm verisi `engelGrubu`
--

INSERT INTO `engelGrubu` (`id`, `engelGrubu`) VALUES
(1, 'BEDENSEL'),
(2, 'ZİHİNSEL'),
(3, 'GÖRME'),
(4, 'İŞİTME'),
(5, 'SÜREĞEN'),
(6, 'HASTALIK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eosList`
--

DROP TABLE IF EXISTS `eosList`;
CREATE TABLE `eosList` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `eosList`
--

INSERT INTO `eosList` (`id`, `name`) VALUES
(1, 'KAZA'),
(2, 'HASTALIK'),
(3, 'DOĞUŞTAN');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `evrak`
--

DROP TABLE IF EXISTS `evrak`;
CREATE TABLE `evrak` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `evrak`
--

INSERT INTO `evrak` (`id`, `name`) VALUES
(1, 'Engelli Raporu'),
(2, 'İkametgah'),
(3, 'Nüfus Cüzdanı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faliyetgrup`
--

DROP TABLE IF EXISTS `faliyetgrup`;
CREATE TABLE `faliyetgrup` (
  `id` int(11) NOT NULL,
  `adi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faliyetrapor`
--

DROP TABLE IF EXISTS `faliyetrapor`;
CREATE TABLE `faliyetrapor` (
  `id` int(11) NOT NULL,
  `kayittarihi` date NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `icerik` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `grup` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `form1`
--

DROP TABLE IF EXISTS `form1`;
CREATE TABLE `form1` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `adi` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soyadi` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hizmet` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `fno` int(5) NOT NULL,
  `ack` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adt` int(11) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelirtur`
--

DROP TABLE IF EXISTS `gelirtur`;
CREATE TABLE `gelirtur` (
  `id` int(11) NOT NULL,
  `gelirtur` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gidertur`
--

DROP TABLE IF EXISTS `gidertur`;
CREATE TABLE `gidertur` (
  `id` int(11) NOT NULL,
  `gidertur` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastalik`
--

DROP TABLE IF EXISTS `hastalik`;
CREATE TABLE `hastalik` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='hastalıkları listelemek için';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet`
--

DROP TABLE IF EXISTS `hizmet`;
CREATE TABLE `hizmet` (
  `id` int(11) NOT NULL,
  `hizmetadi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `htalep`
--

DROP TABLE IF EXISTS `htalep`;
CREATE TABLE `htalep` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `talebi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durumu` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ttarih` date NOT NULL,
  `vtarih` date NOT NULL,
  `itarih` date NOT NULL,
  `not` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `talan` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adet` int(5) NOT NULL DEFAULT 1,
  `kayitedenid` int(11) NOT NULL,
  `bezboyut` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adresi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aciklama` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `dsoru` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `hbid` int(5) NOT NULL,
  `verilen` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `koçanno` int(11) NOT NULL,
  `makbuzno` int(11) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

DROP TABLE IF EXISTS `il`;
CREATE TABLE `il` (
  `id` bigint(20) NOT NULL,
  `adi` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`id`, `adi`, `slug`) VALUES
(1, 'ADANA', 'ADANA'),
(2, 'ADIYAMAN', 'ADİYAMAN'),
(3, 'AFYONKARAHİSAR', 'AFYONKARAHİSAR'),
(4, 'AĞRI', 'AGRİ'),
(5, 'AMASYA', 'AMASYA'),
(6, 'ANKARA', 'ANKARA'),
(7, 'ANTALYA', 'ANTALYA'),
(8, 'ARTVİN', 'ARTVİN'),
(9, 'AYDIN', 'AYDİN'),
(10, 'BALIKESİR', 'BALİKESİR'),
(11, 'BİLECİK', 'BİLECİK'),
(12, 'BİNGÖL', 'BİNGOL'),
(13, 'BİTLİS', 'BİTLİS'),
(14, 'BOLU', 'BOLU'),
(15, 'BURDUR', 'BURDUR'),
(16, 'BURSA', 'BURSA'),
(17, 'ÇANAKKALE', 'CANAKKALE'),
(18, 'ÇANKIRI', 'CANKİRİ'),
(19, 'ÇORUM', 'CORUM'),
(20, 'DENİZLİ', 'DENİZLİ'),
(21, 'DİYARBAKIR', 'DİYARBAKİR'),
(22, 'EDİRNE', 'EDİRNE'),
(23, 'ELAZIĞ', 'ELAZİG'),
(24, 'ERZİNCAN', 'ERZİNCAN'),
(25, 'ERZURUM', 'ERZURUM'),
(26, 'ESKİŞEHİR', 'ESKİSEHİR'),
(27, 'GAZİANTEP', 'GAZİANTEP'),
(28, 'GİRESUN', 'GİRESUN'),
(29, 'GÜMÜŞHANE', 'GUMUSHANE'),
(30, 'HAKKARİ', 'HAKKARİ'),
(31, 'HATAY', 'HATAY'),
(32, 'ISPARTA', 'İSPARTA'),
(33, 'MERSİN', 'MERSİN'),
(34, 'İSTANBUL', 'İSTANBUL'),
(35, 'İZMİR', 'İZMİR'),
(36, 'KARS', 'KARS'),
(37, 'KASTAMONU', 'KASTAMONU'),
(38, 'KAYSERİ', 'KAYSERİ'),
(39, 'KIRKLARELİ', 'KİRKLARELİ'),
(40, 'KIRŞEHİR', 'KİRSEHİR'),
(41, 'KOCAELİ', 'KOCAELİ'),
(42, 'KONYA', 'KONYA'),
(43, 'KÜTAHYA', 'KUTAHYA'),
(44, 'MALATYA', 'MALATYA'),
(45, 'MANİSA', 'MANİSA'),
(46, 'KAHRAMANMARAŞ', 'KAHRAMANMARAS'),
(47, 'MARDİN', 'MARDİN'),
(48, 'MUĞLA', 'MUGLA'),
(49, 'MUŞ', 'MUS'),
(50, 'NEVŞEHİR', 'NEVSEHİR'),
(51, 'NİĞDE', 'NİGDE'),
(52, 'ORDU', 'ORDU'),
(53, 'RİZE', 'RİZE'),
(54, 'SAKARYA', 'SAKARYA'),
(55, 'SAMSUN', 'SAMSUN'),
(56, 'SİİRT', 'SİİRT'),
(57, 'SİNOP', 'SİNOP'),
(58, 'SİVAS', 'SİVAS'),
(59, 'TEKİRDAĞ', 'TEKİRDAG'),
(60, 'TOKAT', 'TOKAT'),
(61, 'TRABZON', 'TRABZON'),
(62, 'TUNCELİ', 'TUNCELİ'),
(63, 'ŞANLIURFA', 'SANLİURFA'),
(64, 'UŞAK', 'USAK'),
(65, 'VAN', 'VAN'),
(66, 'YOZGAT', 'YOZGAT'),
(67, 'ZONGULDAK', 'ZONGULDAK'),
(68, 'AKSARAY', 'AKSARAY'),
(69, 'BAYBURT', 'BAYBURT'),
(70, 'KARAMAN', 'KARAMAN'),
(71, 'KIRIKKALE', 'KİRİKKALE'),
(72, 'BATMAN', 'BATMAN'),
(73, 'ŞIRNAK', 'SİRNAK'),
(74, 'BARTIN', 'BARTİN'),
(75, 'ARDAHAN', 'ARDAHAN'),
(76, 'IĞDIR', 'İGDİR'),
(77, 'YALOVA', 'YALOVA'),
(78, 'KARABÜK', 'KARABUK'),
(79, 'KİLİS', 'KİLİS'),
(80, 'OSMANİYE', 'OSMANİYE'),
(81, 'DÜZCE', 'DUZCE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilce`
--

DROP TABLE IF EXISTS `ilce`;
CREATE TABLE `ilce` (
  `id` int(20) NOT NULL,
  `il_id` bigint(20) DEFAULT NULL,
  `adi` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Tablo döküm verisi `ilce`
--

INSERT INTO `ilce` (`id`, `il_id`, `adi`, `slug`) VALUES
(1, 1, 'Seyhan', 'seyhan'),
(2, 1, 'Yüreğir', 'yuregir'),
(3, 1, 'Sarıçam', 'saricam'),
(4, 1, 'Çukurova', 'cukurova'),
(5, 1, 'Aladağ(Karsantı)', 'aladagkarsanti'),
(6, 1, 'Ceyhan', 'ceyhan'),
(7, 1, 'Feke', 'feke'),
(8, 1, 'İmamoğlu', 'imamoglu'),
(9, 1, 'Karaisalı', 'karaisali'),
(10, 1, 'Karataş', 'karatas'),
(11, 1, 'Kozan', 'kozan'),
(12, 1, 'Pozantı', 'pozanti'),
(13, 1, 'Saimbeyli', 'saimbeyli'),
(14, 1, 'Tufanbeyli', 'tufanbeyli'),
(15, 1, 'Yumurtalık', 'yumurtalik'),
(16, 2, 'Adıyaman', 'adiyaman'),
(17, 2, 'Besni', 'besni'),
(18, 2, 'Çelikhan', 'celikhan'),
(19, 2, 'Gerger', 'gerger'),
(20, 2, 'Gölbaşı', 'golbasi'),
(21, 2, 'Kahta', 'kahta'),
(22, 2, 'Samsat', 'samsat'),
(23, 2, 'Sincik', 'sincik'),
(24, 2, 'Tut', 'tut'),
(25, 3, 'Afyonkarahisar', 'afyonkarahisar'),
(26, 3, 'Başmakçı', 'basmakci'),
(27, 3, 'Bayat', 'bayat'),
(28, 3, 'Bolvadin', 'bolvadin'),
(29, 3, 'Çay', 'cay'),
(30, 3, 'Çobanlar', 'cobanlar'),
(31, 3, 'Dazkırı', 'dazkiri'),
(32, 3, 'Dinar', 'dinar'),
(33, 3, 'Emirdağ', 'emirdag'),
(34, 3, 'Evciler', 'evciler'),
(35, 3, 'Hocalar', 'hocalar'),
(36, 3, 'İhsaniye', 'ihsaniye'),
(37, 3, 'İscehisar', 'iscehisar'),
(38, 3, 'Kızılören', 'kiziloren'),
(39, 3, 'Sandıklı', 'sandikli'),
(40, 3, 'Sincanlı(Sinanpaşa)', 'sincanlisinanpasa'),
(41, 3, 'Sultandağı', 'sultandagi'),
(42, 3, 'Şuhut', 'suhut'),
(43, 4, 'Ağrı', 'agri'),
(44, 4, 'Diyadin', 'diyadin'),
(45, 4, 'Doğubeyazıt', 'dogubeyazit'),
(46, 4, 'Eleşkirt', 'eleskirt'),
(47, 4, 'Hamur', 'hamur'),
(48, 4, 'Patnos', 'patnos'),
(49, 4, 'Taşlıçay', 'taslicay'),
(50, 4, 'Tutak', 'tutak'),
(51, 5, 'Amasya', 'amasya'),
(52, 5, 'Göynücek', 'goynucek'),
(53, 5, 'Gümüşhacıköy', 'gumushacikoy'),
(54, 5, 'Hamamözü', 'hamamozu'),
(55, 5, 'Merzifon', 'merzifon'),
(56, 5, 'Suluova', 'suluova'),
(57, 5, 'Taşova', 'tasova'),
(58, 6, 'Altındağ', 'altindag'),
(59, 6, 'Çankaya', 'cankaya'),
(60, 6, 'Etimesgut', 'etimesgut'),
(61, 6, 'Keçiören', 'kecioren'),
(62, 6, 'Mamak', 'mamak'),
(63, 6, 'Sincan', 'sincan'),
(64, 6, 'Yenimahalle', 'yenimahalle'),
(65, 6, 'Gölbaşı', 'golbasi'),
(66, 6, 'Pursaklar', 'pursaklar'),
(67, 6, 'Akyurt', 'akyurt'),
(68, 6, 'Ayaş', 'ayas'),
(69, 6, 'Bala', 'bala'),
(70, 6, 'Beypazarı', 'beypazari'),
(71, 6, 'Çamlıdere', 'camlidere'),
(72, 6, 'Çubuk', 'cubuk'),
(73, 6, 'Elmadağ', 'elmadag'),
(74, 6, 'Evren', 'evren'),
(75, 6, 'Güdül', 'gudul'),
(76, 6, 'Haymana', 'haymana'),
(77, 6, 'Kalecik', 'kalecik'),
(78, 6, 'Kazan', 'kazan'),
(79, 6, 'Kızılcahamam', 'kizilcahamam'),
(80, 6, 'Nallıhan', 'nallihan'),
(81, 6, 'Polatlı', 'polatli'),
(82, 6, 'Şereflikoçhisar', 'sereflikochisar'),
(83, 7, 'Muratpaşa', 'muratpasa'),
(84, 7, 'Kepez', 'kepez'),
(85, 7, 'Konyaaltı', 'konyaalti'),
(86, 7, 'Aksu', 'aksu'),
(87, 7, 'Döşemealtı', 'dosemealti'),
(88, 7, 'Akseki', 'akseki'),
(89, 7, 'Alanya', 'alanya'),
(90, 7, 'Elmalı', 'elmali'),
(91, 7, 'Finike', 'finike'),
(92, 7, 'Gazipaşa', 'gazipasa'),
(93, 7, 'Gündoğmuş', 'gundogmus'),
(94, 7, 'İbradı(Aydınkent)', 'ibradiaydinkent'),
(95, 7, 'Kale(Demre)', 'kaledemre'),
(96, 7, 'Kaş', 'kas'),
(97, 7, 'Kemer', 'kemer'),
(98, 7, 'Korkuteli', 'korkuteli'),
(99, 7, 'Kumluca', 'kumluca'),
(100, 7, 'Manavgat', 'manavgat'),
(101, 7, 'Serik', 'serik'),
(102, 8, 'Artvin', 'artvin'),
(103, 8, 'Ardanuç', 'ardanuc'),
(104, 8, 'Arhavi', 'arhavi'),
(105, 8, 'Borçka', 'borcka'),
(106, 8, 'Hopa', 'hopa'),
(107, 8, 'Murgul(Göktaş)', 'murgulgoktas'),
(108, 8, 'Şavşat', 'savsat'),
(109, 8, 'Yusufeli', 'yusufeli'),
(110, 9, 'Aydın', 'aydin'),
(111, 9, 'Bozdoğan', 'bozdogan'),
(112, 9, 'Buharkent(Çubukdağı)', 'buharkentcubukdagi'),
(113, 9, 'Çine', 'cine'),
(114, 9, 'Germencik', 'germencik'),
(115, 9, 'İncirliova', 'incirliova'),
(116, 9, 'Karacasu', 'karacasu'),
(117, 9, 'Karpuzlu', 'karpuzlu'),
(118, 9, 'Koçarlı', 'kocarli'),
(119, 9, 'Köşk', 'kosk'),
(120, 9, 'Kuşadası', 'kusadasi'),
(121, 9, 'Kuyucak', 'kuyucak'),
(122, 9, 'Nazilli', 'nazilli'),
(123, 9, 'Söke', 'soke'),
(124, 9, 'Sultanhisar', 'sultanhisar'),
(125, 9, 'Didim', 'didimyenihisar'),
(126, 9, 'Yenipazar', 'yenipazar'),
(127, 10, 'Balıkesir', 'balikesir'),
(128, 10, 'Ayvalık', 'ayvalik'),
(129, 10, 'Balya', 'balya'),
(130, 10, 'Bandırma', 'bandirma'),
(131, 10, 'Bigadiç', 'bigadic'),
(132, 10, 'Burhaniye', 'burhaniye'),
(133, 10, 'Dursunbey', 'dursunbey'),
(134, 10, 'Edremit', 'edremit'),
(135, 10, 'Erdek', 'erdek'),
(136, 10, 'Gömeç', 'gomec'),
(137, 10, 'Gönen', 'gonen'),
(138, 10, 'Havran', 'havran'),
(139, 10, 'İvrindi', 'ivrindi'),
(140, 10, 'Kepsut', 'kepsut'),
(141, 10, 'Manyas', 'manyas'),
(142, 10, 'Marmara', 'marmara'),
(143, 10, 'Savaştepe', 'savastepe'),
(144, 10, 'Sındırgı', 'sindirgi'),
(145, 10, 'Susurluk', 'susurluk'),
(146, 11, 'Bilecik', 'bilecik'),
(147, 11, 'Bozüyük', 'bozuyuk'),
(148, 11, 'Gölpazarı', 'golpazari'),
(149, 11, 'İnhisar', 'inhisar'),
(150, 11, 'Osmaneli', 'osmaneli'),
(151, 11, 'Pazaryeri', 'pazaryeri'),
(152, 11, 'Söğüt', 'sogut'),
(153, 11, 'Yenipazar', 'yenipazar'),
(154, 12, 'Bingöl', 'bingol'),
(155, 12, 'Adaklı', 'adakli'),
(156, 12, 'Genç', 'genc'),
(157, 12, 'Karlıova', 'karliova'),
(158, 12, 'Kığı', 'kigi'),
(159, 12, 'Solhan', 'solhan'),
(160, 12, 'Yayladere', 'yayladere'),
(161, 12, 'Yedisu', 'yedisu'),
(162, 13, 'Bitlis', 'bitlis'),
(163, 13, 'Adilcevaz', 'adilcevaz'),
(164, 13, 'Ahlat', 'ahlat'),
(165, 13, 'Güroymak', 'guroymak'),
(166, 13, 'Hizan', 'hizan'),
(167, 13, 'Mutki', 'mutki'),
(168, 13, 'Tatvan', 'tatvan'),
(169, 14, 'Bolu', 'bolu'),
(170, 14, 'Dörtdivan', 'dortdivan'),
(171, 14, 'Gerede', 'gerede'),
(172, 14, 'Göynük', 'goynuk'),
(173, 14, 'Kıbrıscık', 'kibriscik'),
(174, 14, 'Mengen', 'mengen'),
(175, 14, 'Mudurnu', 'mudurnu'),
(176, 14, 'Seben', 'seben'),
(177, 14, 'Yeniçağa', 'yenicaga'),
(178, 15, 'Burdur', 'burdur'),
(179, 15, 'Ağlasun', 'aglasun'),
(180, 15, 'Altınyayla(Dirmil)', 'altinyayladirmil'),
(181, 15, 'Bucak', 'bucak'),
(182, 15, 'Çavdır', 'cavdir'),
(183, 15, 'Çeltikçi', 'celtikci'),
(184, 15, 'Gölhisar', 'golhisar'),
(185, 15, 'Karamanlı', 'karamanli'),
(186, 15, 'Kemer', 'kemer'),
(187, 15, 'Tefenni', 'tefenni'),
(188, 15, 'Yeşilova', 'yesilova'),
(189, 16, 'Nilüfer', 'nilufer'),
(190, 16, 'Osmangazi', 'osmangazi'),
(191, 16, 'Yıldırım', 'yildirim'),
(192, 16, 'Büyükorhan', 'buyukorhan'),
(193, 16, 'Gemlik', 'gemlik'),
(194, 16, 'Gürsu', 'gursu'),
(195, 16, 'Harmancık', 'harmancik'),
(196, 16, 'İnegöl', 'inegol'),
(197, 16, 'İznik', 'iznik'),
(198, 16, 'Karacabey', 'karacabey'),
(199, 16, 'Keles', 'keles'),
(200, 16, 'Kestel', 'kestel'),
(201, 16, 'Mudanya', 'mudanya'),
(202, 16, 'Mustafakemalpaşa', 'mustafakemalpasa'),
(203, 16, 'Orhaneli', 'orhaneli'),
(204, 16, 'Orhangazi', 'orhangazi'),
(205, 16, 'Yenişehir', 'yenisehir'),
(206, 17, 'Çanakkale', 'canakkale'),
(207, 17, 'Ayvacık-Assos', 'ayvacik-assos'),
(208, 17, 'Bayramiç', 'bayramic'),
(209, 17, 'Biga', 'biga'),
(210, 17, 'Bozcaada', 'bozcaada'),
(211, 17, 'Çan', 'can'),
(212, 17, 'Eceabat', 'eceabat'),
(213, 17, 'Ezine', 'ezine'),
(214, 17, 'Gelibolu', 'gelibolu'),
(215, 17, 'Gökçeada(İmroz)', 'gokceadaimroz'),
(216, 17, 'Lapseki', 'lapseki'),
(217, 17, 'Yenice', 'yenice'),
(218, 18, 'Çankırı', 'cankiri'),
(219, 18, 'Atkaracalar', 'atkaracalar'),
(220, 18, 'Bayramören', 'bayramoren'),
(221, 18, 'Çerkeş', 'cerkes'),
(222, 18, 'Eldivan', 'eldivan'),
(223, 18, 'Ilgaz', 'ilgaz'),
(224, 18, 'Kızılırmak', 'kizilirmak'),
(225, 18, 'Korgun', 'korgun'),
(226, 18, 'Kurşunlu', 'kursunlu'),
(227, 18, 'Orta', 'orta'),
(228, 18, 'Şabanözü', 'sabanozu'),
(229, 18, 'Yapraklı', 'yaprakli'),
(230, 19, 'Çorum', 'corum'),
(231, 19, 'Alaca', 'alaca'),
(232, 19, 'Bayat', 'bayat'),
(233, 19, 'Boğazkale', 'bogazkale'),
(234, 19, 'Dodurga', 'dodurga'),
(235, 19, 'İskilip', 'iskilip'),
(236, 19, 'Kargı', 'kargi'),
(237, 19, 'Laçin', 'lacin'),
(238, 19, 'Mecitözü', 'mecitozu'),
(239, 19, 'Oğuzlar(Karaören)', 'oguzlarkaraoren'),
(240, 19, 'Ortaköy', 'ortakoy'),
(241, 19, 'Osmancık', 'osmancik'),
(242, 19, 'Sungurlu', 'sungurlu'),
(243, 19, 'Uğurludağ', 'ugurludag'),
(244, 20, 'Denizli', 'denizli'),
(245, 20, 'Acıpayam', 'acipayam'),
(246, 20, 'Akköy', 'akkoy'),
(247, 20, 'Babadağ', 'babadag'),
(248, 20, 'Baklan', 'baklan'),
(249, 20, 'Bekilli', 'bekilli'),
(250, 20, 'Beyağaç', 'beyagac'),
(251, 20, 'Bozkurt', 'bozkurt'),
(252, 20, 'Buldan', 'buldan'),
(253, 20, 'Çal', 'cal'),
(254, 20, 'Çameli', 'cameli'),
(255, 20, 'Çardak', 'cardak'),
(256, 20, 'Çivril', 'civril'),
(257, 20, 'Güney', 'guney'),
(258, 20, 'Honaz', 'honaz'),
(259, 20, 'Kale', 'kale'),
(260, 20, 'Sarayköy', 'saraykoy'),
(261, 20, 'Serinhisar', 'serinhisar'),
(262, 20, 'Tavas', 'tavas'),
(263, 21, 'Sur', 'sur'),
(264, 21, 'Bağlar', 'baglar'),
(265, 21, 'Yenişehir', 'yenisehir'),
(266, 21, 'Kayapınar', 'kayapinar'),
(267, 21, 'Bismil', 'bismil'),
(268, 21, 'Çermik', 'cermik'),
(269, 21, 'Çınar', 'cinar'),
(270, 21, 'Çüngüş', 'cungus'),
(271, 21, 'Dicle', 'dicle'),
(272, 21, 'Eğil', 'egil'),
(273, 21, 'Ergani', 'ergani'),
(274, 21, 'Hani', 'hani'),
(275, 21, 'Hazro', 'hazro'),
(276, 21, 'Kocaköy', 'kocakoy'),
(277, 21, 'Kulp', 'kulp'),
(278, 21, 'Lice', 'lice'),
(279, 21, 'Silvan', 'silvan'),
(280, 22, 'Edirne', 'edirne'),
(281, 22, 'Enez', 'enez'),
(282, 22, 'Havsa', 'havsa'),
(283, 22, 'İpsala', 'ipsala'),
(284, 22, 'Keşan', 'kesan'),
(285, 22, 'Lalapaşa', 'lalapasa'),
(286, 22, 'Meriç', 'meric'),
(287, 22, 'Süleoğlu(Süloğlu)', 'suleoglusuloglu'),
(288, 22, 'Uzunköprü', 'uzunkopru'),
(289, 23, 'Elazığ', 'elazig'),
(290, 23, 'Ağın', 'agin'),
(291, 23, 'Alacakaya', 'alacakaya'),
(292, 23, 'Arıcak', 'aricak'),
(293, 23, 'Baskil', 'baskil'),
(294, 23, 'Karakoçan', 'karakocan'),
(295, 23, 'Keban', 'keban'),
(296, 23, 'Kovancılar', 'kovancilar'),
(297, 23, 'Maden', 'maden'),
(298, 23, 'Palu', 'palu'),
(299, 23, 'Sivrice', 'sivrice'),
(300, 24, 'Erzincan', 'erzincan'),
(301, 24, 'Çayırlı', 'cayirli'),
(302, 24, 'İliç(Ilıç)', 'ilicilic'),
(303, 24, 'Kemah', 'kemah'),
(304, 24, 'Kemaliye', 'kemaliye'),
(305, 24, 'Otlukbeli', 'otlukbeli'),
(306, 24, 'Refahiye', 'refahiye'),
(307, 24, 'Tercan', 'tercan'),
(308, 24, 'Üzümlü', 'uzumlu'),
(309, 25, 'Palandöken', 'palandoken'),
(310, 25, 'Yakutiye', 'yakutiye'),
(311, 25, 'Aziziye(Ilıca)', 'aziziyeilica'),
(312, 25, 'Aşkale', 'askale'),
(313, 25, 'Çat', 'cat'),
(314, 25, 'Hınıs', 'hinis'),
(315, 25, 'Horasan', 'horasan'),
(316, 25, 'İspir', 'ispir'),
(317, 25, 'Karaçoban', 'karacoban'),
(318, 25, 'Karayazı', 'karayazi'),
(319, 25, 'Köprüköy', 'koprukoy'),
(320, 25, 'Narman', 'narman'),
(321, 25, 'Oltu', 'oltu'),
(322, 25, 'Olur', 'olur'),
(323, 25, 'Pasinler', 'pasinler'),
(324, 25, 'Pazaryolu', 'pazaryolu'),
(325, 25, 'Şenkaya', 'senkaya'),
(326, 25, 'Tekman', 'tekman'),
(327, 25, 'Tortum', 'tortum'),
(328, 25, 'Uzundere', 'uzundere'),
(329, 26, 'Odunpazarı', 'odunpazari'),
(330, 26, 'Tepebaşı', 'tepebasi'),
(331, 26, 'Alpu', 'alpu'),
(332, 26, 'Beylikova', 'beylikova'),
(333, 26, 'Çifteler', 'cifteler'),
(334, 26, 'Günyüzü', 'gunyuzu'),
(335, 26, 'Han', 'han'),
(336, 26, 'İnönü', 'inonu'),
(337, 26, 'Mahmudiye', 'mahmudiye'),
(338, 26, 'Mihalgazi', 'mihalgazi'),
(339, 26, 'Mihalıçcık', 'mihaliccik'),
(340, 26, 'Sarıcakaya', 'saricakaya'),
(341, 26, 'Seyitgazi', 'seyitgazi'),
(342, 26, 'Sivrihisar', 'sivrihisar'),
(343, 27, 'Şahinbey', 'sahinbey'),
(344, 27, 'Şehitkamil', 'sehitkamil'),
(345, 27, 'Oğuzeli', 'oguzeli'),
(346, 27, 'Araban', 'araban'),
(347, 27, 'İslahiye', 'islahiye'),
(348, 27, 'Karkamış', 'karkamis'),
(349, 27, 'Nizip', 'nizip'),
(350, 27, 'Nurdağı', 'nurdagi'),
(351, 27, 'Yavuzeli', 'yavuzeli'),
(352, 28, 'Giresun', 'giresun'),
(353, 28, 'Alucra', 'alucra'),
(354, 28, 'Bulancak', 'bulancak'),
(355, 28, 'Çamoluk', 'camoluk'),
(356, 28, 'Çanakçı', 'canakci'),
(357, 28, 'Dereli', 'dereli'),
(358, 28, 'Doğankent', 'dogankent'),
(359, 28, 'Espiye', 'espiye'),
(360, 28, 'Eynesil', 'eynesil'),
(361, 28, 'Görele', 'gorele'),
(362, 28, 'Güce', 'guce'),
(363, 28, 'Keşap', 'kesap'),
(364, 28, 'Piraziz', 'piraziz'),
(365, 28, 'Şebinkarahisar', 'sebinkarahisar'),
(366, 28, 'Tirebolu', 'tirebolu'),
(367, 28, 'Yağlıdere', 'yaglidere'),
(368, 29, 'Gümüşhane', 'gumushane'),
(369, 29, 'Kelkit', 'kelkit'),
(370, 29, 'Köse', 'kose'),
(371, 29, 'Kürtün', 'kurtun'),
(372, 29, 'Şiran', 'siran'),
(373, 29, 'Torul', 'torul'),
(374, 30, 'Hakkari', 'hakkari'),
(375, 30, 'Çukurca', 'cukurca'),
(376, 30, 'Şemdinli', 'semdinli'),
(377, 30, 'Yüksekova', 'yuksekova'),
(378, 31, 'Antakya', 'antakya'),
(379, 31, 'Altınözü', 'altinozu'),
(380, 31, 'Belen', 'belen'),
(381, 31, 'Dörtyol', 'dortyol'),
(382, 31, 'Erzin', 'erzin'),
(383, 31, 'Hassa', 'hassa'),
(384, 31, 'İskenderun', 'iskenderun'),
(385, 31, 'Kırıkhan', 'kirikhan'),
(386, 31, 'Kumlu', 'kumlu'),
(387, 31, 'Reyhanlı', 'reyhanli'),
(388, 31, 'Samandağ', 'samandag'),
(389, 31, 'Yayladağı', 'yayladagi'),
(390, 32, 'Isparta', 'isparta'),
(391, 32, 'Aksu', 'aksu'),
(392, 32, 'Atabey', 'atabey'),
(393, 32, 'Eğridir(Eğirdir)', 'egridiregirdir'),
(394, 32, 'Gelendost', 'gelendost'),
(395, 32, 'Gönen', 'gonen'),
(396, 32, 'Keçiborlu', 'keciborlu'),
(397, 32, 'Senirkent', 'senirkent'),
(398, 32, 'Sütçüler', 'sutculer'),
(399, 32, 'Şarkikaraağaç', 'sarkikaraagac'),
(400, 32, 'Uluborlu', 'uluborlu'),
(401, 32, 'Yalvaç', 'yalvac'),
(402, 32, 'Yenişarbademli', 'yenisarbademli'),
(403, 33, 'Akdeniz', 'akdeniz'),
(404, 33, 'Yenişehir', 'yenisehir'),
(405, 33, 'Toroslar', 'toroslar'),
(406, 33, 'Mezitli', 'mezitli'),
(407, 33, 'Anamur', 'anamur'),
(408, 33, 'Aydıncık', 'aydincik'),
(409, 33, 'Bozyazı', 'bozyazi'),
(410, 33, 'Çamlıyayla', 'camliyayla'),
(411, 33, 'Erdemli', 'erdemli'),
(412, 33, 'Gülnar(Gülpınar)', 'gulnargulpinar'),
(413, 33, 'Mut', 'mut'),
(414, 33, 'Silifke', 'silifke'),
(415, 33, 'Tarsus', 'tarsus'),
(416, 34, 'Bakırköy', 'bakirkoy'),
(417, 34, 'Bayrampaşa', 'bayrampasa'),
(418, 34, 'Beşiktaş', 'besiktas'),
(419, 34, 'Beyoğlu', 'beyoglu'),
(420, 34, 'Arnavutköy', 'arnavutkoy'),
(421, 34, 'Eyüp', 'eyup'),
(422, 34, 'Fatih', 'fatih'),
(423, 34, 'Gaziosmanpaşa', 'gaziosmanpasa'),
(424, 34, 'Kağıthane', 'kagithane'),
(425, 34, 'Küçükçekmece', 'kucukcekmece'),
(426, 34, 'Sarıyer', 'sariyer'),
(427, 34, 'Şişli', 'sisli'),
(428, 34, 'Zeytinburnu', 'zeytinburnu'),
(429, 34, 'Avcılar', 'avcilar'),
(430, 34, 'Güngören', 'gungoren'),
(431, 34, 'Bahçelievler', 'bahcelievler'),
(432, 34, 'Bağcılar', 'bagcilar'),
(433, 34, 'Esenler', 'esenler'),
(434, 34, 'Başakşehir', 'basaksehir'),
(435, 34, 'Beylikdüzü', 'beylikduzu'),
(436, 34, 'Esenyurt', 'esenyurt'),
(437, 34, 'Sultangazi', 'sultangazi'),
(438, 34, 'Adalar', 'adalar'),
(439, 34, 'Beykoz', 'beykoz'),
(440, 34, 'Kadıköy', 'kadikoy'),
(441, 34, 'Kartal', 'kartal'),
(442, 34, 'Pendik', 'pendik'),
(443, 34, 'Ümraniye', 'umraniye'),
(444, 34, 'Üsküdar', 'uskudar'),
(445, 34, 'Tuzla', 'tuzla'),
(446, 34, 'Maltepe', 'maltepe'),
(447, 34, 'Ataşehir', 'atasehir'),
(448, 34, 'Çekmeköy', 'cekmekoy'),
(449, 34, 'Sancaktepe', 'sancaktepe'),
(450, 34, 'Büyükçekmece', 'buyukcekmece'),
(451, 34, 'Çatalca', 'catalca'),
(452, 34, 'Silivri', 'silivri'),
(453, 34, 'Şile', 'sile'),
(454, 34, 'Sultanbeyli', 'sultanbeyli'),
(455, 35, 'Aliağa', 'aliaga'),
(456, 35, 'Balçova', 'balcova'),
(457, 35, 'Bayındır', 'bayindir'),
(458, 35, 'Bornova', 'bornova'),
(459, 35, 'Buca', 'buca'),
(460, 35, 'Çiğli', 'cigli'),
(461, 35, 'Foça', 'foca'),
(462, 35, 'Gaziemir', 'gaziemir'),
(463, 35, 'Güzelbahçe', 'guzelbahce'),
(464, 35, 'Karşıyaka', 'karsiyaka'),
(465, 35, 'Kemalpaşa', 'kemalpasa'),
(466, 35, 'Konak', 'konak'),
(467, 35, 'Cumaovası(Menderes)', 'cumaovasimenderes'),
(468, 35, 'Menemen', 'menemen'),
(469, 35, 'Narlıdere', 'narlidere'),
(470, 35, 'Seferihisar', 'seferihisar'),
(471, 35, 'Selçuk', 'selcuk'),
(472, 35, 'Torbalı', 'torbali'),
(473, 35, 'Urla', 'urla'),
(474, 35, 'Bayraklı', 'bayrakli'),
(475, 35, 'Karabağlar', 'karabaglar'),
(476, 35, 'Bergama', 'bergama'),
(477, 35, 'Beydağ', 'beydag'),
(478, 35, 'Çeşme', 'cesme'),
(479, 35, 'Dikili', 'dikili'),
(480, 35, 'Karaburun', 'karaburun'),
(481, 35, 'Kınık', 'kinik'),
(482, 35, 'Kiraz', 'kiraz'),
(483, 35, 'Ödemiş', 'odemis'),
(484, 35, 'Tire', 'tire'),
(485, 36, 'Kars', 'kars'),
(486, 36, 'Akyaka', 'akyaka'),
(487, 36, 'Arpaçay', 'arpacay'),
(488, 36, 'Digor', 'digor'),
(489, 36, 'Kağızman', 'kagizman'),
(490, 36, 'Sarıkamış', 'sarikamis'),
(491, 36, 'Selim', 'selim'),
(492, 36, 'Susuz', 'susuz'),
(493, 37, 'Kastamonu', 'kastamonu'),
(494, 37, 'Abana', 'abana'),
(495, 37, 'Ağlı', 'agli'),
(496, 37, 'Araç', 'arac'),
(497, 37, 'Azdavay', 'azdavay'),
(498, 37, 'Bozkurt', 'bozkurt'),
(499, 37, 'Cide', 'cide'),
(500, 37, 'Çatalzeytin', 'catalzeytin'),
(501, 37, 'Daday', 'daday'),
(502, 37, 'Devrekani', 'devrekani'),
(503, 37, 'Doğanyurt', 'doganyurt'),
(504, 37, 'Hanönü(Gökçeağaç)', 'hanonugokceagac'),
(505, 37, 'İhsangazi', 'ihsangazi'),
(506, 37, 'İnebolu', 'inebolu'),
(507, 37, 'Küre', 'kure'),
(508, 37, 'Pınarbaşı', 'pinarbasi'),
(509, 37, 'Seydiler', 'seydiler'),
(510, 37, 'Şenpazar', 'senpazar'),
(511, 37, 'Taşköprü', 'taskopru'),
(512, 37, 'Tosya', 'tosya'),
(513, 38, 'Kocasinan', 'kocasinan'),
(514, 38, 'Melikgazi', 'melikgazi'),
(515, 38, 'Talas', 'talas'),
(516, 38, 'Akkışla', 'akkisla'),
(517, 38, 'Bünyan', 'bunyan'),
(518, 38, 'Develi', 'develi'),
(519, 38, 'Felahiye', 'felahiye'),
(520, 38, 'Hacılar', 'hacilar'),
(521, 38, 'İncesu', 'incesu'),
(522, 38, 'Özvatan(Çukur)', 'ozvatancukur'),
(523, 38, 'Pınarbaşı', 'pinarbasi'),
(524, 38, 'Sarıoğlan', 'sarioglan'),
(525, 38, 'Sarız', 'sariz'),
(526, 38, 'Tomarza', 'tomarza'),
(527, 38, 'Yahyalı', 'yahyali'),
(528, 38, 'Yeşilhisar', 'yesilhisar'),
(529, 39, 'Kırklareli', 'kirklareli'),
(530, 39, 'Babaeski', 'babaeski'),
(531, 39, 'Demirköy', 'demirkoy'),
(532, 39, 'Kofçaz', 'kofcaz'),
(533, 39, 'Lüleburgaz', 'luleburgaz'),
(534, 39, 'Pehlivanköy', 'pehlivankoy'),
(535, 39, 'Pınarhisar', 'pinarhisar'),
(536, 39, 'Vize', 'vize'),
(537, 40, 'Kırşehir', 'kirsehir'),
(538, 40, 'Akçakent', 'akcakent'),
(539, 40, 'Akpınar', 'akpinar'),
(540, 40, 'Boztepe', 'boztepe'),
(541, 40, 'Çiçekdağı', 'cicekdagi'),
(542, 40, 'Kaman', 'kaman'),
(543, 40, 'Mucur', 'mucur'),
(544, 41, 'İzmit', 'izmit'),
(545, 41, 'Başiskele', 'basiskele'),
(546, 41, 'Çayırova', 'cayirova'),
(547, 41, 'Darıca', 'darica'),
(548, 41, 'Dilovası', 'dilovasi'),
(549, 41, 'Kartepe', 'kartepe'),
(550, 41, 'Gebze', 'gebze'),
(551, 41, 'Gölcük', 'golcuk'),
(552, 41, 'Kandıra', 'kandira'),
(553, 41, 'Karamürsel', 'karamursel'),
(554, 41, 'Tütünçiftlik', 'tutunciftlik'),
(555, 41, 'Derince', 'derince'),
(556, 42, 'Karatay', 'karatay'),
(557, 42, 'Meram', 'meram'),
(558, 42, 'Selçuklu', 'selcuklu'),
(559, 42, 'Ahırlı', 'ahirli'),
(560, 42, 'Akören', 'akoren'),
(561, 42, 'Akşehir', 'aksehir'),
(562, 42, 'Altınekin', 'altinekin'),
(563, 42, 'Beyşehir', 'beysehir'),
(564, 42, 'Bozkır', 'bozkir'),
(565, 42, 'Cihanbeyli', 'cihanbeyli'),
(566, 42, 'Çeltik', 'celtik'),
(567, 42, 'Çumra', 'cumra'),
(568, 42, 'Derbent', 'derbent'),
(569, 42, 'Derebucak', 'derebucak'),
(570, 42, 'Doğanhisar', 'doganhisar'),
(571, 42, 'Emirgazi', 'emirgazi'),
(572, 42, 'Ereğli', 'eregli'),
(573, 42, 'Güneysınır', 'guneysinir'),
(574, 42, 'Hadim', 'hadim'),
(575, 42, 'Halkapınar', 'halkapinar'),
(576, 42, 'Hüyük', 'huyuk'),
(577, 42, 'Ilgın', 'ilgin'),
(578, 42, 'Kadınhanı', 'kadinhani'),
(579, 42, 'Karapınar', 'karapinar'),
(580, 42, 'Kulu', 'kulu'),
(581, 42, 'Sarayönü', 'sarayonu'),
(582, 42, 'Seydişehir', 'seydisehir'),
(583, 42, 'Taşkent', 'taskent'),
(584, 42, 'Tuzlukçu', 'tuzlukcu'),
(585, 42, 'Yalıhüyük', 'yalihuyuk'),
(586, 42, 'Yunak', 'yunak'),
(587, 43, 'Kütahya', 'kutahya'),
(588, 43, 'Altıntaş', 'altintas'),
(589, 43, 'Aslanapa', 'aslanapa'),
(590, 43, 'Çavdarhisar', 'cavdarhisar'),
(591, 43, 'Domaniç', 'domanic'),
(592, 43, 'Dumlupınar', 'dumlupinar'),
(593, 43, 'Emet', 'emet'),
(594, 43, 'Gediz', 'gediz'),
(595, 43, 'Hisarcık', 'hisarcik'),
(596, 43, 'Pazarlar', 'pazarlar'),
(597, 43, 'Simav', 'simav'),
(598, 43, 'Şaphane', 'saphane'),
(599, 43, 'Tavşanlı', 'tavsanli'),
(600, 43, 'Tunçbilek', 'tuncbilek'),
(601, 44, 'Malatya', 'malatya'),
(602, 44, 'Akçadağ', 'akcadag'),
(603, 44, 'Arapkir', 'arapkir'),
(604, 44, 'Arguvan', 'arguvan'),
(605, 44, 'Battalgazi', 'battalgazi'),
(606, 44, 'Darende', 'darende'),
(607, 44, 'Doğanşehir', 'dogansehir'),
(608, 44, 'Doğanyol', 'doganyol'),
(609, 44, 'Hekimhan', 'hekimhan'),
(610, 44, 'Kale', 'kale'),
(611, 44, 'Kuluncak', 'kuluncak'),
(612, 44, 'Pötürge', 'poturge'),
(613, 44, 'Yazıhan', 'yazihan'),
(614, 44, 'Yeşilyurt', 'yesilyurt'),
(615, 45, 'Manisa', 'manisa'),
(616, 45, 'Ahmetli', 'ahmetli'),
(617, 45, 'Akhisar', 'akhisar'),
(618, 45, 'Alaşehir', 'alasehir'),
(619, 45, 'Demirci', 'demirci'),
(620, 45, 'Gölmarmara', 'golmarmara'),
(621, 45, 'Gördes', 'gordes'),
(622, 45, 'Kırkağaç', 'kirkagac'),
(623, 45, 'Köprübaşı', 'koprubasi'),
(624, 45, 'Kula', 'kula'),
(625, 45, 'Salihli', 'salihli'),
(626, 45, 'Sarıgöl', 'sarigol'),
(627, 45, 'Saruhanlı', 'saruhanli'),
(628, 45, 'Selendi', 'selendi'),
(629, 45, 'Soma', 'soma'),
(630, 45, 'Turgutlu', 'turgutlu'),
(631, 46, 'Kahramanmaraş', 'kahramanmaras'),
(632, 46, 'Afşin', 'afsin'),
(633, 46, 'Andırın', 'andirin'),
(634, 46, 'Çağlayancerit', 'caglayancerit'),
(635, 46, 'Ekinözü', 'ekinozu'),
(636, 46, 'Elbistan', 'elbistan'),
(637, 46, 'Göksun', 'goksun'),
(638, 46, 'Nurhak', 'nurhak'),
(639, 46, 'Pazarcık', 'pazarcik'),
(640, 46, 'Türkoğlu', 'turkoglu'),
(641, 47, 'Mardin', 'mardin'),
(642, 47, 'Dargeçit', 'dargecit'),
(643, 47, 'Derik', 'derik'),
(644, 47, 'Kızıltepe', 'kiziltepe'),
(645, 47, 'Mazıdağı', 'mazidagi'),
(646, 47, 'Midyat(Estel)', 'midyatestel'),
(647, 47, 'Nusaybin', 'nusaybin'),
(648, 47, 'Ömerli', 'omerli'),
(649, 47, 'Savur', 'savur'),
(650, 47, 'Yeşilli', 'yesilli'),
(651, 48, 'Muğla', 'mugla'),
(652, 48, 'Bodrum', 'bodrum'),
(653, 48, 'Dalaman', 'dalaman'),
(654, 48, 'Datça', 'datca'),
(655, 48, 'Fethiye', 'fethiye'),
(656, 48, 'Kavaklıdere', 'kavaklidere'),
(657, 48, 'Köyceğiz', 'koycegiz'),
(658, 48, 'Marmaris', 'marmaris'),
(659, 48, 'Milas', 'milas'),
(660, 48, 'Ortaca', 'ortaca'),
(661, 48, 'Ula', 'ula'),
(662, 48, 'Yatağan', 'yatagan'),
(663, 49, 'Muş', 'mus'),
(664, 49, 'Bulanık', 'bulanik'),
(665, 49, 'Hasköy', 'haskoy'),
(666, 49, 'Korkut', 'korkut'),
(667, 49, 'Malazgirt', 'malazgirt'),
(668, 49, 'Varto', 'varto'),
(669, 50, 'Nevşehir', 'nevsehir'),
(670, 50, 'Acıgöl', 'acigol'),
(671, 50, 'Avanos', 'avanos'),
(672, 50, 'Derinkuyu', 'derinkuyu'),
(673, 50, 'Gülşehir', 'gulsehir'),
(674, 50, 'Hacıbektaş', 'hacibektas'),
(675, 50, 'Kozaklı', 'kozakli'),
(676, 50, 'Göreme', 'goreme'),
(677, 51, 'Niğde', 'nigde'),
(678, 51, 'Altunhisar', 'altunhisar'),
(679, 51, 'Bor', 'bor'),
(680, 51, 'Çamardı', 'camardi'),
(681, 51, 'Çiftlik(Özyurt)', 'ciftlikozyurt'),
(682, 51, 'Ulukışla', 'ulukisla'),
(683, 52, 'Ordu', 'ordu'),
(684, 52, 'Akkuş', 'akkus'),
(685, 52, 'Aybastı', 'aybasti'),
(686, 52, 'Çamaş', 'camas'),
(687, 52, 'Çatalpınar', 'catalpinar'),
(688, 52, 'Çaybaşı', 'caybasi'),
(689, 52, 'Fatsa', 'fatsa'),
(690, 52, 'Gölköy', 'golkoy'),
(691, 52, 'Gülyalı', 'gulyali'),
(692, 52, 'Gürgentepe', 'gurgentepe'),
(693, 52, 'İkizce', 'ikizce'),
(694, 52, 'Karadüz(Kabadüz)', 'karaduzkabaduz'),
(695, 52, 'Kabataş', 'kabatas'),
(696, 52, 'Korgan', 'korgan'),
(697, 52, 'Kumru', 'kumru'),
(698, 52, 'Mesudiye', 'mesudiye'),
(699, 52, 'Perşembe', 'persembe'),
(700, 52, 'Ulubey', 'ulubey'),
(701, 52, 'Ünye', 'unye'),
(702, 53, 'Rize', 'rize'),
(703, 53, 'Ardeşen', 'ardesen'),
(704, 53, 'Çamlıhemşin', 'camlihemsin'),
(705, 53, 'Çayeli', 'cayeli'),
(706, 53, 'Derepazarı', 'derepazari'),
(707, 53, 'Fındıklı', 'findikli'),
(708, 53, 'Güneysu', 'guneysu'),
(709, 53, 'Hemşin', 'hemsin'),
(710, 53, 'İkizdere', 'ikizdere'),
(711, 53, 'İyidere', 'iyidere'),
(712, 53, 'Kalkandere', 'kalkandere'),
(713, 53, 'Pazar', 'pazar'),
(714, 54, 'Adapazarı', 'adapazari'),
(715, 54, 'Hendek', 'hendek'),
(716, 54, 'Arifiye', 'arifiye'),
(717, 54, 'Erenler', 'erenler'),
(718, 54, 'Serdivan', 'serdivan'),
(719, 54, 'Akyazı', 'akyazi'),
(720, 54, 'Ferizli', 'ferizli'),
(721, 54, 'Geyve', 'geyve'),
(722, 54, 'Karapürçek', 'karapurcek'),
(723, 54, 'Karasu', 'karasu'),
(724, 54, 'Kaynarca', 'kaynarca'),
(725, 54, 'Kocaali', 'kocaali'),
(726, 54, 'Pamukova', 'pamukova'),
(727, 54, 'Sapanca', 'sapanca'),
(728, 54, 'Söğütlü', 'sogutlu'),
(729, 54, 'Taraklı', 'tarakli'),
(730, 55, 'Atakum', 'atakum'),
(731, 55, 'İlkadım', 'ilkadim'),
(732, 55, 'Canik', 'canik'),
(733, 55, 'Tekkeköy', 'tekkekoy'),
(734, 55, 'Alaçam', 'alacam'),
(735, 55, 'Asarcık', 'asarcik'),
(736, 55, 'Ayvacık', 'ayvacik'),
(737, 55, 'Bafra', 'bafra'),
(738, 55, 'Çarşamba', 'carsamba'),
(739, 55, 'Havza', 'havza'),
(740, 55, 'Kavak', 'kavak'),
(741, 55, 'Ladik', 'ladik'),
(742, 55, '19Mayıs(Ballıca)', '19mayisballica'),
(743, 55, 'Salıpazarı', 'salipazari'),
(744, 55, 'Terme', 'terme'),
(745, 55, 'Vezirköprü', 'vezirkopru'),
(746, 55, 'Yakakent', 'yakakent'),
(747, 56, 'Siirt', 'siirt'),
(748, 56, 'Baykan', 'baykan'),
(749, 56, 'Eruh', 'eruh'),
(750, 56, 'Kurtalan', 'kurtalan'),
(751, 56, 'Pervari', 'pervari'),
(752, 56, 'Aydınlar', 'aydinlar'),
(753, 56, 'Şirvan', 'sirvan'),
(754, 57, 'Sinop', 'sinop'),
(755, 57, 'Ayancık', 'ayancik'),
(756, 57, 'Boyabat', 'boyabat'),
(757, 57, 'Dikmen', 'dikmen'),
(758, 57, 'Durağan', 'duragan'),
(759, 57, 'Erfelek', 'erfelek'),
(760, 57, 'Gerze', 'gerze'),
(761, 57, 'Saraydüzü', 'sarayduzu'),
(762, 57, 'Türkeli', 'turkeli'),
(763, 58, 'Sivas', 'sivas'),
(764, 58, 'Akıncılar', 'akincilar'),
(765, 58, 'Altınyayla', 'altinyayla'),
(766, 58, 'Divriği', 'divrigi'),
(767, 58, 'Doğanşar', 'dogansar'),
(768, 58, 'Gemerek', 'gemerek'),
(769, 58, 'Gölova', 'golova'),
(770, 58, 'Gürün', 'gurun'),
(771, 58, 'Hafik', 'hafik'),
(772, 58, 'İmranlı', 'imranli'),
(773, 58, 'Kangal', 'kangal'),
(774, 58, 'Koyulhisar', 'koyulhisar'),
(775, 58, 'Suşehri', 'susehri'),
(776, 58, 'Şarkışla', 'sarkisla'),
(777, 58, 'Ulaş', 'ulas'),
(778, 58, 'Yıldızeli', 'yildizeli'),
(779, 58, 'Zara', 'zara'),
(780, 59, 'Tekirdağ', 'tekirdag'),
(781, 59, 'Çerkezköy', 'cerkezkoy'),
(782, 59, 'Çorlu', 'corlu'),
(783, 59, 'Hayrabolu', 'hayrabolu'),
(784, 59, 'Malkara', 'malkara'),
(785, 59, 'Marmaraereğlisi', 'marmaraereglisi'),
(786, 59, 'Muratlı', 'muratli'),
(787, 59, 'Saray', 'saray'),
(788, 59, 'Şarköy', 'sarkoy'),
(789, 60, 'Tokat', 'tokat'),
(790, 60, 'Almus', 'almus'),
(791, 60, 'Artova', 'artova'),
(792, 60, 'Başçiftlik', 'basciftlik'),
(793, 60, 'Erbaa', 'erbaa'),
(794, 60, 'Niksar', 'niksar'),
(795, 60, 'Pazar', 'pazar'),
(796, 60, 'Reşadiye', 'resadiye'),
(797, 60, 'Sulusaray', 'sulusaray'),
(798, 60, 'Turhal', 'turhal'),
(799, 60, 'Yeşilyurt', 'yesilyurt'),
(800, 60, 'Zile', 'zile'),
(801, 61, 'Trabzon', 'trabzon'),
(802, 61, 'Akçaabat', 'akcaabat'),
(803, 61, 'Araklı', 'arakli'),
(804, 61, 'Arsin', 'arsin'),
(805, 61, 'Beşikdüzü', 'besikduzu'),
(806, 61, 'Çarşıbaşı', 'carsibasi'),
(807, 61, 'Çaykara', 'caykara'),
(808, 61, 'Dernekpazarı', 'dernekpazari'),
(809, 61, 'Düzköy', 'duzkoy'),
(810, 61, 'Hayrat', 'hayrat'),
(811, 61, 'Köprübaşı', 'koprubasi'),
(812, 61, 'Maçka', 'macka'),
(813, 61, 'Of', 'of'),
(814, 61, 'Sürmene', 'surmene'),
(815, 61, 'Şalpazarı', 'salpazari'),
(816, 61, 'Tonya', 'tonya'),
(817, 61, 'Vakfıkebir', 'vakfikebir'),
(818, 61, 'Yomra', 'yomra'),
(819, 62, 'Tunceli', 'tunceli'),
(820, 62, 'Çemişgezek', 'cemisgezek'),
(821, 62, 'Hozat', 'hozat'),
(822, 62, 'Mazgirt', 'mazgirt'),
(823, 62, 'Nazımiye', 'nazimiye'),
(824, 62, 'Ovacık', 'ovacik'),
(825, 62, 'Pertek', 'pertek'),
(826, 62, 'Pülümür', 'pulumur'),
(827, 63, 'Şanlıurfa', 'sanliurfa'),
(828, 63, 'Akçakale', 'akcakale'),
(829, 63, 'Birecik', 'birecik'),
(830, 63, 'Bozova', 'bozova'),
(831, 63, 'Ceylanpınar', 'ceylanpinar'),
(832, 63, 'Halfeti', 'halfeti'),
(833, 63, 'Harran', 'harran'),
(834, 63, 'Hilvan', 'hilvan'),
(835, 63, 'Siverek', 'siverek'),
(836, 63, 'Suruç', 'suruc'),
(837, 63, 'Viranşehir', 'viransehir'),
(838, 64, 'Uşak', 'usak'),
(839, 64, 'Banaz', 'banaz'),
(840, 64, 'Eşme', 'esme'),
(841, 64, 'Karahallı', 'karahalli'),
(842, 64, 'Sivaslı', 'sivasli'),
(843, 64, 'Ulubey', 'ulubey'),
(844, 65, 'Van', 'van'),
(845, 65, 'Bahçesaray', 'bahcesaray'),
(846, 65, 'Başkale', 'baskale'),
(847, 65, 'Çaldıran', 'caldiran'),
(848, 65, 'Çatak', 'catak'),
(849, 65, 'Edremit(Gümüşdere)', 'edremitgumusdere'),
(850, 65, 'Erciş', 'ercis'),
(851, 65, 'Gevaş', 'gevas'),
(852, 65, 'Gürpınar', 'gurpinar'),
(853, 65, 'Muradiye', 'muradiye'),
(854, 65, 'Özalp', 'ozalp'),
(855, 65, 'Saray', 'saray'),
(856, 66, 'Yozgat', 'yozgat'),
(857, 66, 'Akdağmadeni', 'akdagmadeni'),
(858, 66, 'Aydıncık', 'aydincik'),
(859, 66, 'Boğazlıyan', 'bogazliyan'),
(860, 66, 'Çandır', 'candir'),
(861, 66, 'Çayıralan', 'cayiralan'),
(862, 66, 'Çekerek', 'cekerek'),
(863, 66, 'Kadışehri', 'kadisehri'),
(864, 66, 'Saraykent', 'saraykent'),
(865, 66, 'Sarıkaya', 'sarikaya'),
(866, 66, 'Sorgun', 'sorgun'),
(867, 66, 'Şefaatli', 'sefaatli'),
(868, 66, 'Yenifakılı', 'yenifakili'),
(869, 66, 'Yerköy', 'yerkoy'),
(870, 67, 'Zonguldak', 'zonguldak'),
(871, 67, 'Alaplı', 'alapli'),
(872, 67, 'Çaycuma', 'caycuma'),
(873, 67, 'Devrek', 'devrek'),
(874, 67, 'Karadenizereğli', 'karadenizeregli'),
(875, 67, 'Gökçebey', 'gokcebey'),
(876, 68, 'Aksaray', 'aksaray'),
(877, 68, 'Ağaçören', 'agacoren'),
(878, 68, 'Eskil', 'eskil'),
(879, 68, 'Gülağaç(Ağaçlı)', 'gulagacagacli'),
(880, 68, 'Güzelyurt', 'guzelyurt'),
(881, 68, 'Ortaköy', 'ortakoy'),
(882, 68, 'Sarıyahşi', 'sariyahsi'),
(883, 69, 'Bayburt', 'bayburt'),
(884, 69, 'Aydıntepe', 'aydintepe'),
(885, 69, 'Demirözü', 'demirozu'),
(886, 70, 'Karaman', 'karaman'),
(887, 70, 'Ayrancı', 'ayranci'),
(888, 70, 'Başyayla', 'basyayla'),
(889, 70, 'Ermenek', 'ermenek'),
(890, 70, 'Kazımkarabekir', 'kazimkarabekir'),
(891, 70, 'Sarıveliler', 'sariveliler'),
(892, 71, 'Kırıkkale', 'kirikkale'),
(893, 71, 'Bahşili', 'bahsili'),
(894, 71, 'Balışeyh', 'baliseyh'),
(895, 71, 'Çelebi', 'celebi'),
(896, 71, 'Delice', 'delice'),
(897, 71, 'Karakeçili', 'karakecili'),
(898, 71, 'Keskin', 'keskin'),
(899, 71, 'Sulakyurt', 'sulakyurt'),
(900, 71, 'Yahşihan', 'yahsihan'),
(901, 72, 'Batman', 'batman'),
(902, 72, 'Beşiri', 'besiri'),
(903, 72, 'Gercüş', 'gercus'),
(904, 72, 'Hasankeyf', 'hasankeyf'),
(905, 72, 'Kozluk', 'kozluk'),
(906, 72, 'Sason', 'sason'),
(907, 73, 'Şırnak', 'sirnak'),
(908, 73, 'Beytüşşebap', 'beytussebap'),
(909, 73, 'Cizre', 'cizre'),
(910, 73, 'Güçlükonak', 'guclukonak'),
(911, 73, 'İdil', 'idil'),
(912, 73, 'Silopi', 'silopi'),
(913, 73, 'Uludere', 'uludere'),
(914, 74, 'Bartın', 'bartin'),
(915, 74, 'Amasra', 'amasra'),
(916, 74, 'Kurucaşile', 'kurucasile'),
(917, 74, 'Ulus', 'ulus'),
(918, 75, 'Ardahan', 'ardahan'),
(919, 75, 'Çıldır', 'cildir'),
(920, 75, 'Damal', 'damal'),
(921, 75, 'Göle', 'gole'),
(922, 75, 'Hanak', 'hanak'),
(923, 75, 'Posof', 'posof'),
(924, 76, 'Iğdır', 'igdir'),
(925, 76, 'Aralık', 'aralik'),
(926, 76, 'Karakoyunlu', 'karakoyunlu'),
(927, 76, 'Tuzluca', 'tuzluca'),
(928, 77, 'Yalova', 'yalova'),
(929, 77, 'Altınova', 'altinova'),
(930, 77, 'Armutlu', 'armutlu'),
(931, 77, 'Çiftlikköy', 'ciftlikkoy'),
(932, 77, 'Çınarcık', 'cinarcik'),
(933, 77, 'Termal', 'termal'),
(934, 78, 'Karabük', 'karabuk'),
(935, 78, 'Eflani', 'eflani'),
(936, 78, 'Eskipazar', 'eskipazar'),
(937, 78, 'Ovacık', 'ovacik'),
(938, 78, 'Safranbolu', 'safranbolu'),
(939, 78, 'Yenice', 'yenice'),
(940, 79, 'Kilis', 'kilis'),
(941, 79, 'Elbeyli', 'elbeyli'),
(942, 79, 'Musabeyli', 'musabeyli'),
(943, 79, 'Polateli', 'polateli'),
(944, 80, 'Osmaniye', 'osmaniye'),
(945, 80, 'Bahçe', 'bahce'),
(946, 80, 'Düziçi', 'duzici'),
(947, 80, 'Hasanbeyli', 'hasanbeyli'),
(948, 80, 'Kadirli', 'kadirli'),
(949, 80, 'Sumbas', 'sumbas'),
(950, 80, 'Toprakkale', 'toprakkale'),
(951, 81, 'Düzce', 'duzce'),
(952, 81, 'Akçakoca', 'akcakoca'),
(953, 81, 'Cumayeri', 'cumayeri'),
(954, 81, 'Çilimli', 'cilimli'),
(955, 81, 'Gölyaka', 'golyaka'),
(956, 81, 'Gümüşova', 'gumusova'),
(957, 81, 'Kaynaşlı', 'kaynasli'),
(958, 81, 'Yığılca', 'yigilca'),
(962, 20, 'Pamukkale', 'pamukkale'),
(963, 7, 'Olympos', 'olympos'),
(964, 7, 'Çıralı', 'cirali'),
(965, 7, 'Kaleiçi', 'kaleici'),
(967, 33, 'Kızkalesi', 'kizkalesi'),
(968, 20, 'Karahayit', 'karahayit');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilceler`
--

DROP TABLE IF EXISTS `ilceler`;
CREATE TABLE `ilceler` (
  `CountyID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `CountyName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iller`
--

DROP TABLE IF EXISTS `iller`;
CREATE TABLE `iller` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurul`
--

DROP TABLE IF EXISTS `kurul`;
CREATE TABLE `kurul` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kurul`
--

INSERT INTO `kurul` (`id`, `name`) VALUES
(1, 'YÖNETİM KURULU'),
(2, 'DENETLEME KURULU');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurulGorev`
--

DROP TABLE IF EXISTS `kurulGorev`;
CREATE TABLE `kurulGorev` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kurulGorev`
--

INSERT INTO `kurulGorev` (`id`, `name`) VALUES
(1, 'BAŞKAN'),
(2, 'BAŞKAN YARDIMCISI'),
(3, 'SAYMAN'),
(4, 'GENEL SEKRETER'),
(5, 'ASIL ÜYE'),
(6, 'YEDEK ÜYE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `islem` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzeme`
--

DROP TABLE IF EXISTS `malzeme`;
CREATE TABLE `malzeme` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Tablo döküm verisi `malzeme`
--

INSERT INTO `malzeme` (`id`, `adi`, `durum`, `dernekid`) VALUES
(1, 'JELLİ MİNDER', 1, 1),
(2, 'HAVALI MİNDER', 1, 1),
(3, 'BANYO SANDALYESİ (KOMOT)', 1, 1),
(13, 'MEDİVEYA COMPEKS KAS GÜÇLENDİRME ALETİ', 1, 1),
(5, 'ÖNDEN TEKERLEKLİ WALKER', 1, 1),
(6, 'MANUEL TEKERLEKLİ SANDALYE (42 CM)', 1, 1),
(7, 'MANUEL TEKERLEKLİ SANDALYE (38 CM)', 1, 1),
(8, 'MANUEL TEKERLEKLİ SANDALYE BÜYÜK BOY (AYAK KISMI KALKAN)', 1, 1),
(9, 'MANUEL TEKERLEKLİ SANDALYE (40 CM)', 1, 1),
(10, 'ERZAK', 1, 1),
(11, 'AKÜLÜ TEKERLEKLİ SANDALYE', 1, 1),
(12, 'WALKER', 1, 1),
(14, 'HASTA BEZİ - BÜYÜK BOY', 1, 1),
(15, 'HASTA BEZİ - KÜÇÜK BOY', 1, 1),
(16, 'HASTA BEZİ - ORTA  BOY', 1, 1),
(17, 'HASTA BEZİ - NO: 5', 1, 1),
(18, 'HASTA BEZİ - NO: 6', 1, 1),
(19, 'YATAK KORUYUCU', 1, 1),
(20, 'MANUEL TEKERLEKLİ SANDALYE (44 CM)', 1, 1),
(21, 'MANUEL TEKERLEKLİ SANDALYE (46 CM)', 1, 1),
(22, 'KATETER CH08', 1, 1),
(23, 'KATETER CH12', 1, 1),
(24, 'KOLTUK DEĞNEĞİ', 1, 1),
(25, 'KANEDYEN', 1, 1),
(26, 'İDRAR TORBASI', 1, 1),
(27, 'HASTA BEZİ', 1, 1),
(28, 'ÖZELLİKLİ MANUEL TEKERLEKLİ SANDALYE', 1, 1),
(29, 'ADAK ETİ', 1, 1),
(30, 'TEKERLEKLİ SANDALYE', 1, 1),
(31, 'SONDA TORBASI', 1, 1),
(32, 'MİNDER', 1, 1),
(33, 'HASTA KARYOLASI', 1, 1),
(34, 'KATETER CH14', 1, 1),
(35, 'SOĞUK KOMPRES', 0, 1),
(36, 'KOLTUK DEĞNEĞİ PABUCU', 1, 1),
(37, 'MUSLUKLU SONDA', 1, 1),
(38, 'YARA MİNDERİ', 1, 1),
(39, 'EL TAŞIMA LİFTİ', 0, 1),
(40, 'KATETER CH18', 1, 1),
(41, 'MAJOR  2  CİHAZI', 0, 1),
(42, 'MAJOR 2 STRİP', 0, 1),
(43, 'TETRAPLEJİ SAND.', 1, 1),
(44, 'HAVALI YATAK', 1, 1),
(45, 'POMPA', 1, 1),
(46, 'CİLA MOTORU', 0, 1),
(47, 'KIL TESTERE', 0, 1),
(48, 'TESTERE TAKOZU', 0, 1),
(49, 'KURŞUN KABI', 0, 1),
(50, 'ANTEP MAKASI', 0, 1),
(51, 'YARIM YUVARLAK PENSE', 0, 1),
(52, 'TAM YUVARLAK PENSE', 0, 1),
(53, 'YAN KESKİ', 0, 1),
(54, 'FREZE MOTORU', 0, 1),
(55, 'ŞALEMO TAKIMI', 0, 1),
(56, 'DEDENTÖR', 0, 1),
(57, 'BAŞLIK', 0, 1),
(58, 'MİKRON FİSÜR', 0, 1),
(59, 'OLUKLU DEMİR', 0, 1),
(60, 'ŞARNEL HADDESİ', 0, 1),
(61, 'BÜYÜK YUVARLAK EGE', 0, 1),
(62, 'EĞE', 0, 1),
(63, 'MAŞA', 0, 1),
(64, 'HESTEK TAKIMI', 1, 1),
(65, 'YÜZÜK ÖLÇÜM ÇUBUĞU', 0, 1),
(66, 'TAHTA TOKMAK', 0, 1),
(67, 'TAHTA ÖLÇÜM ÇUBUGU', 0, 1),
(68, 'ÇEKİÇ', 0, 1),
(69, 'BOMBE KALIBI', 0, 1),
(70, 'MENGENE', 0, 1),
(71, 'ZIMPARA TEKERLEĞİ', 0, 1),
(72, 'CİLA', 0, 1),
(73, 'MUM KESKİ ALETLERİ', 0, 1),
(74, 'GAZ LAMBASI', 0, 1),
(75, 'ALEV AYAGI', 0, 1),
(76, 'BİLEKLİKLİK TAKOZU', 0, 1),
(77, 'FREZE BAŞLIKLARI', 0, 1),
(78, 'PEMBE TOZ ZOÇYAGI', 0, 1),
(79, 'TAHTA MAŞA', 0, 1),
(80, 'GÜMÜŞ AYAR DAMGASI', 0, 1),
(81, 'YÜZÜK ÖLÇÜMÜ', 0, 1),
(82, 'ÖRS', 0, 1),
(83, 'PERGEL', 0, 1),
(84, 'PENSE', 0, 1),
(85, 'BİSTER', 0, 1),
(86, 'NEŞTER', 0, 1),
(111, 'ŞARJ MAKİNASI', 0, 1),
(88, 'ÇAY', 0, 1),
(89, 'ŞEKER', 0, 1),
(90, 'TUALET KAGIDI', 0, 1),
(91, 'TİŞÖRT', 0, 1),
(92, 'BARDAK SU', 0, 1),
(93, 'SULU BOYA', 0, 1),
(94, 'RESİM FIRÇASI', 0, 1),
(95, 'RESİM KAGIDI', 0, 1),
(96, 'PALET', 0, 1),
(97, 'MÜREKKEB', 0, 1),
(98, 'KLASÖR', 0, 1),
(109, 'TONER', 0, 1),
(100, 'KURŞUN KALEM', 0, 1),
(101, 'TOPLU İĞNE', 0, 1),
(102, 'EL SABUNU', 0, 1),
(103, 'DURU BANYO SABUNU', 0, 1),
(104, 'CİF', 0, 1),
(105, 'BOBİN İP', 0, 1),
(106, 'ÇİYAT NUSHALI SÜREKLİ FORM', 0, 1),
(107, 'A4 KAGIT DOSYA', 0, 1),
(108, 'KATETER CH06', 1, 1),
(112, 'İLAÇ', 0, 1),
(117, 'ELEKTRİK SÜPÜRGESİ', 1, 1),
(114, 'ULAŞIM', 1, 1),
(125, 'DENGE BİLEKLİKLERİ', 0, 1),
(120, 'mobilya', 0, 1),
(123, 'AKÜ 33 AMPER', 1, 1),
(122, 'AKÜ 26 AMPER', 1, 1),
(124, 'AKÜ 44 AMPER', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `matgelir`
--

DROP TABLE IF EXISTS `matgelir`;
CREATE TABLE `matgelir` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `fisno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tur` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tutar` decimal(12,2) NOT NULL,
  `aidat` decimal(12,2) NOT NULL,
  `bagis` decimal(12,2) NOT NULL,
  `banka` decimal(12,2) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `matgider`
--

DROP TABLE IF EXISTS `matgider`;
CREATE TABLE `matgider` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `fisno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tur` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `odemesekli` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tutar` decimal(12,2) NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `yazar` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sender` int(11) NOT NULL,
  `message` blob NOT NULL,
  `kime` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `okunma` int(1) NOT NULL,
  `sil` int(1) NOT NULL DEFAULT 0,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenimdurumu`
--

DROP TABLE IF EXISTS `ogrenimdurumu`;
CREATE TABLE `ogrenimdurumu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ogrenimdurumu`
--

INSERT INTO `ogrenimdurumu` (`id`, `name`) VALUES
(1, 'OKUMA YAZMA BİLMİYOR'),
(2, 'OKUR YAZAR'),
(3, 'ÖZEL EĞİTİM'),
(4, 'İLKOKUL'),
(5, 'ORTAOKUL'),
(6, 'İLKÖĞRETİM'),
(7, 'LİSE'),
(8, 'ÜNİVERSİTE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rehber`
--

DROP TABLE IF EXISTS `rehber`;
CREATE TABLE `rehber` (
  `id` int(3) NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `isim` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tel1` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tel2` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tel3` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fax` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `cep` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `not` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rehber_kategori`
--

DROP TABLE IF EXISTS `rehber_kategori`;
CREATE TABLE `rehber_kategori` (
  `id` int(3) NOT NULL,
  `kat_adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `talepler`
--

DROP TABLE IF EXISTS `talepler`;
CREATE TABLE `talepler` (
  `id` int(11) NOT NULL,
  `uyeId` int(11) NOT NULL,
  `talep` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `Durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `talepler`
--

INSERT INTO `talepler` (`id`, `uyeId`, `talep`, `Durum`) VALUES
(1, 1, '11', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

DROP TABLE IF EXISTS `uye`;
CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `uyeno` int(6) DEFAULT NULL,
  `mtarih` date NOT NULL COMMENT 'MÜRACCAT TARİHİ',
  `ubt` date DEFAULT NULL COMMENT 'ÜYE BAŞLANGIÇ TARİHİ',
  `uyetur` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ÜYELİK TÜRÜ',
  `tcno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `isim` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `babaadi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `anneadi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dyeri` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'DOĞUM YERİ',
  `dtarih` date NOT NULL COMMENT 'DOĞUM TARİHİ',
  `medenidurum` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `cinsiyeti` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `kangrub` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `kutuk` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_semt` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_mh` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'İKAMET MAHALLESİ',
  `i_cd` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'İKAMET CADDESİ',
  `i_sk` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'İKAMET SOKAK',
  `i_site` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_kapino` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_daireno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_ilce` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `i_il` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `meslegi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gsm` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ev_tel` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `s_guvence` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'SOSYAL GÜVENCESİ',
  `engl_grubu` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ENGEL GRUBU',
  `engl_svy` varchar(3) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Engel Seviyesi',
  `engl_sebebi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `engl_aciklamasi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `engl_yakinligi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ogrenimdurumu` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `okuyormu` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ilgialani` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `talep` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gorev` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notlar` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `uyedurumu` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'üyelik durumu',
  `acvt` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ayrilmanedeni` longtext COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `evadres` longtext COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'EV ADRESİ',
  `eos` longtext COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ENGEL OLUŞ SEBEBİ',
  `i_diger` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `evrak` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `resimadet` int(1) NOT NULL,
  `ukararno` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guncelleme` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dernekid` int(11) NOT NULL,
  `calisiyormu` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `aldigiYardim` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyedurumu`
--

DROP TABLE IF EXISTS `uyedurumu`;
CREATE TABLE `uyedurumu` (
  `id` int(11) NOT NULL,
  `durum` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `uyedurumu`
--

INSERT INTO `uyedurumu` (`id`, `durum`) VALUES
(1, 'ONAY BEKLİYOR'),
(2, 'AKTİF'),
(3, 'VEFAT'),
(4, 'AYRILDI'),
(5, 'ÇIKARILDI'),
(6, 'ÜYE DEĞİL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeTur`
--

DROP TABLE IF EXISTS `uyeTur`;
CREATE TABLE `uyeTur` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `uyeTur`
--

INSERT INTO `uyeTur` (`id`, `name`) VALUES
(1, 'ENGELLİ ÜYE'),
(2, 'SAĞLAM ÜYE'),
(3, 'ENGELLİ VASİSİ'),
(4, 'ÜYE DEĞİL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

DROP TABLE IF EXISTS `yonetim`;
CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `adi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gorevi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `durum` int(1) NOT NULL,
  `kurul_adi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sira` int(2) NOT NULL,
  `ilk_tarih` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `son_tarih` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dernekid` int(11) NOT NULL,
  `imzaYetki` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abab`
--
ALTER TABLE `abab`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `abb`
--
ALTER TABLE `abb`
  ADD PRIMARY KEY (`abb_id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aidat`
--
ALTER TABLE `aidat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aldigiYardim`
--
ALTER TABLE `aldigiYardim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `araclist`
--
ALTER TABLE `araclist`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aractakip`
--
ALTER TABLE `aractakip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayniyardim`
--
ALTER TABLE `ayniyardim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aytb`
--
ALTER TABLE `aytb`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aytbml`
--
ALTER TABLE `aytbml`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aytb_tutanak`
--
ALTER TABLE `aytb_tutanak`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `aytb_yedek`
--
ALTER TABLE `aytb_yedek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banka_cuzdan`
--
ALTER TABLE `banka_cuzdan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `demirbas`
--
ALTER TABLE `demirbas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depo_cikis`
--
ALTER TABLE `depo_cikis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depo_giris`
--
ALTER TABLE `depo_giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dernek`
--
ALTER TABLE `dernek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `engelGrubu`
--
ALTER TABLE `engelGrubu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `eosList`
--
ALTER TABLE `eosList`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `evrak`
--
ALTER TABLE `evrak`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faliyetgrup`
--
ALTER TABLE `faliyetgrup`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faliyetrapor`
--
ALTER TABLE `faliyetrapor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `form1`
--
ALTER TABLE `form1`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelirtur`
--
ALTER TABLE `gelirtur`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gidertur`
--
ALTER TABLE `gidertur`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hastalik`
--
ALTER TABLE `hastalik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmet`
--
ALTER TABLE `hizmet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `htalep`
--
ALTER TABLE `htalep`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `il`
--
ALTER TABLE `il`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilce`
--
ALTER TABLE `ilce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ilID` (`il_id`);

--
-- Tablo için indeksler `ilceler`
--
ALTER TABLE `ilceler`
  ADD PRIMARY KEY (`CountyID`),
  ADD KEY `FK_Counties_CityID` (`CityID`);

--
-- Tablo için indeksler `iller`
--
ALTER TABLE `iller`
  ADD PRIMARY KEY (`CityID`);

--
-- Tablo için indeksler `kurul`
--
ALTER TABLE `kurul`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kurulGorev`
--
ALTER TABLE `kurulGorev`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `malzeme`
--
ALTER TABLE `malzeme`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `matgelir`
--
ALTER TABLE `matgelir`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `matgider`
--
ALTER TABLE `matgider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrenimdurumu`
--
ALTER TABLE `ogrenimdurumu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rehber`
--
ALTER TABLE `rehber`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rehber_kategori`
--
ALTER TABLE `rehber_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `talepler`
--
ALTER TABLE `talepler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyedurumu`
--
ALTER TABLE `uyedurumu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `uyeTur`
--
ALTER TABLE `uyeTur`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abab`
--
ALTER TABLE `abab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=781;

--
-- Tablo için AUTO_INCREMENT değeri `abb`
--
ALTER TABLE `abb`
  MODIFY `abb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1286;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `aidat`
--
ALTER TABLE `aidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `aldigiYardim`
--
ALTER TABLE `aldigiYardim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `araclist`
--
ALTER TABLE `araclist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `aractakip`
--
ALTER TABLE `aractakip`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- Tablo için AUTO_INCREMENT değeri `ayniyardim`
--
ALTER TABLE `ayniyardim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3396;

--
-- Tablo için AUTO_INCREMENT değeri `aytb`
--
ALTER TABLE `aytb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `aytbml`
--
ALTER TABLE `aytbml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `aytb_tutanak`
--
ALTER TABLE `aytb_tutanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2551;

--
-- Tablo için AUTO_INCREMENT değeri `aytb_yedek`
--
ALTER TABLE `aytb_yedek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2723;

--
-- Tablo için AUTO_INCREMENT değeri `banka_cuzdan`
--
ALTER TABLE `banka_cuzdan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `demirbas`
--
ALTER TABLE `demirbas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- Tablo için AUTO_INCREMENT değeri `depo_cikis`
--
ALTER TABLE `depo_cikis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `depo_giris`
--
ALTER TABLE `depo_giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `dernek`
--
ALTER TABLE `dernek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `engelGrubu`
--
ALTER TABLE `engelGrubu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `eosList`
--
ALTER TABLE `eosList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `evrak`
--
ALTER TABLE `evrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `faliyetgrup`
--
ALTER TABLE `faliyetgrup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `faliyetrapor`
--
ALTER TABLE `faliyetrapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `form1`
--
ALTER TABLE `form1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `gelirtur`
--
ALTER TABLE `gelirtur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `gidertur`
--
ALTER TABLE `gidertur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `hastalik`
--
ALTER TABLE `hastalik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `hizmet`
--
ALTER TABLE `hizmet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `htalep`
--
ALTER TABLE `htalep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2951;

--
-- Tablo için AUTO_INCREMENT değeri `il`
--
ALTER TABLE `il`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `ilce`
--
ALTER TABLE `ilce`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=969;

--
-- Tablo için AUTO_INCREMENT değeri `ilceler`
--
ALTER TABLE `ilceler`
  MODIFY `CountyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

--
-- Tablo için AUTO_INCREMENT değeri `iller`
--
ALTER TABLE `iller`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `kurul`
--
ALTER TABLE `kurul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kurulGorev`
--
ALTER TABLE `kurulGorev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10709;

--
-- Tablo için AUTO_INCREMENT değeri `malzeme`
--
ALTER TABLE `malzeme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Tablo için AUTO_INCREMENT değeri `matgelir`
--
ALTER TABLE `matgelir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- Tablo için AUTO_INCREMENT değeri `matgider`
--
ALTER TABLE `matgider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- Tablo için AUTO_INCREMENT değeri `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenimdurumu`
--
ALTER TABLE `ogrenimdurumu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `rehber`
--
ALTER TABLE `rehber`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=983;

--
-- Tablo için AUTO_INCREMENT değeri `rehber_kategori`
--
ALTER TABLE `rehber_kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `talepler`
--
ALTER TABLE `talepler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyedurumu`
--
ALTER TABLE `uyedurumu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `uyeTur`
--
ALTER TABLE `uyeTur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ilceler`
--
ALTER TABLE `ilceler`
  ADD CONSTRAINT `FK_Counties_CityID` FOREIGN KEY (`CityID`) REFERENCES `iller` (`CityID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
