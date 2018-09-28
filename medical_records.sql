-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2018 pada 09.23
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `medical_records`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_check_up_patient`
--

CREATE TABLE IF NOT EXISTS `mr_check_up_patient` (
  `cup_id` int(10) NOT NULL AUTO_INCREMENT,
  `cup_patien_id` int(10) NOT NULL,
  `cup_patien_name` varchar(50) NOT NULL,
  `cup_check_up_date` date NOT NULL,
  `cup_disease_complaints` varchar(50) NOT NULL,
  `cup_diagnosis` varchar(100) NOT NULL,
  `cup_medicine` varchar(100) NOT NULL,
  `cup_user_update` varchar(10) NOT NULL,
  PRIMARY KEY (`cup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `mr_check_up_patient`
--

INSERT INTO `mr_check_up_patient` (`cup_id`, `cup_patien_id`, `cup_patien_name`, `cup_check_up_date`, `cup_disease_complaints`, `cup_diagnosis`, `cup_medicine`, `cup_user_update`) VALUES
(1, 0, 'marcus dedy', '2018-02-03', 'test', 'test', 'test', 'dedy'),
(2, 2, 'Dhani Aski', '2018-02-04', 'Sakit kepala', 'migran', 'oskadon', 'dedy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_ms_poly`
--

CREATE TABLE IF NOT EXISTS `mr_ms_poly` (
  `mp_poly_id` int(5) NOT NULL,
  `mp_poly_name` varchar(25) DEFAULT NULL,
  `mp_doctor_name` varchar(35) DEFAULT NULL,
  `mp_information` varchar(35) DEFAULT NULL,
  `mp_user_update` varchar(35) DEFAULT NULL,
  `mp_update_date` date DEFAULT NULL,
  PRIMARY KEY (`mp_poly_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mr_ms_poly`
--

INSERT INTO `mr_ms_poly` (`mp_poly_id`, `mp_poly_name`, `mp_doctor_name`, `mp_information`, `mp_user_update`, `mp_update_date`) VALUES
(0, 'Umum', 'dedy', 'Test', 'dedy', '2018-02-04'),
(1, 'Umum', 'Choirul Amir', 'dokter umum', 'dedy', '2018-02-03'),
(2, 'Spesialis Mata', 'Yuda Aan', 'spesialis mata', 'dedy', '2018-02-03'),
(3, 'Spesialis Jantung', 'Jimi Amirudin', 'spesialis jantung', 'dedy', '2018-02-03'),
(4, 'Spesialis Dalam', 'Siti Sulistya', 'spesialis dalam', 'dedy', '2018-02-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_ms_user`
--

CREATE TABLE IF NOT EXISTS `mr_ms_user` (
  `mu_user_id` int(5) NOT NULL AUTO_INCREMENT,
  `mu_username` varchar(25) DEFAULT NULL,
  `mu_name` varchar(35) DEFAULT NULL,
  `mu_password` varchar(50) DEFAULT NULL,
  `mu_access` varchar(3) DEFAULT NULL,
  `mu_update_date` date DEFAULT NULL,
  `mu_user_update` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`mu_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `mr_ms_user`
--

INSERT INTO `mr_ms_user` (`mu_user_id`, `mu_username`, `mu_name`, `mu_password`, `mu_access`, `mu_update_date`, `mu_user_update`) VALUES
(1, 'dedy', 'Marcus Dedy', '289dff07669d7a23de0ef88d2f7129e7', 'U', '2018-02-02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_patient_registration`
--

CREATE TABLE IF NOT EXISTS `mr_patient_registration` (
  `pr_patien_id` int(10) NOT NULL,
  `pr_identity_card` varchar(35) DEFAULT NULL,
  `pr_patien_name` varchar(50) DEFAULT NULL,
  `pr_gender` varchar(1) DEFAULT NULL,
  `pr_blood_type` varchar(2) DEFAULT NULL,
  `pr_religion` varchar(10) DEFAULT NULL,
  `pr_place_of_birth` varchar(35) DEFAULT NULL,
  `pr_date_of_birth` varchar(15) DEFAULT NULL,
  `pr_address` varchar(100) DEFAULT NULL,
  `pr_phone` varchar(14) DEFAULT NULL,
  `pr_status` varchar(7) DEFAULT NULL,
  `pr_employment` varchar(10) DEFAULT NULL,
  `pr_family_status` varchar(5) DEFAULT NULL,
  `pr_family_name` varchar(50) DEFAULT NULL,
  `pr_family_phone` varchar(14) DEFAULT NULL,
  `pr_poly_id` int(5) DEFAULT NULL,
  `pr_update_date` date DEFAULT NULL,
  `pr_user_update` varchar(10) DEFAULT NULL,
  `pr_check_up_patient_status` varchar(1) DEFAULT NULL,
  `pr_prescription_status` varchar(1) DEFAULT NULL,
  `pr_payment_status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`pr_patien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mr_patient_registration`
--

INSERT INTO `mr_patient_registration` (`pr_patien_id`, `pr_identity_card`, `pr_patien_name`, `pr_gender`, `pr_blood_type`, `pr_religion`, `pr_place_of_birth`, `pr_date_of_birth`, `pr_address`, `pr_phone`, `pr_status`, `pr_employment`, `pr_family_status`, `pr_family_name`, `pr_family_phone`, `pr_poly_id`, `pr_update_date`, `pr_user_update`, `pr_check_up_patient_status`, `pr_prescription_status`, `pr_payment_status`) VALUES
(0, '12345678', 'marcus dedy', 'L', 'O', 'Katolik', 'yogyakarta', '1988-Jan', 'tangerang cikokol', '1234578', 'lajang', 'Swasta', 'suami', 'kamu', '5648', 1, '2018-02-03', 'dedy', 'T', 'T', 'T'),
(1, '45678945675', 'Jhon Thon jon', 'L', 'O', 'Islam', 'Jakarta', '1989-Jan-1989', 'Jakarta pusat', '084568945', 'nikah', 'Swasta', 'istri', 'Tumi', '084658765', 1, '2018-02-03', '', NULL, NULL, NULL),
(2, '897567836', 'Dhani Aski', 'L', 'O', 'Islam', 'Jakarta', '1988-Mar-1988', 'Jakarta pusat', '7896899', 'nikah', 'Swasta', 'suami', 'Tini', '7896897', 0, '2018-02-04', 'dedy', 'T', 'T', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_payment`
--

CREATE TABLE IF NOT EXISTS `mr_payment` (
  `py_id` int(10) NOT NULL,
  `py_patien_id` int(10) NOT NULL,
  `py_patien_name` varchar(50) NOT NULL,
  `py_total_prescription` int(10) NOT NULL,
  `py_payment` int(10) NOT NULL,
  `py_update_date` date NOT NULL,
  `py_user_update` varchar(10) NOT NULL,
  PRIMARY KEY (`py_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mr_payment`
--

INSERT INTO `mr_payment` (`py_id`, `py_patien_id`, `py_patien_name`, `py_total_prescription`, `py_payment`, `py_update_date`, `py_user_update`) VALUES
(0, 0, 'marcus dedy', 112500, 112500, '2018-02-03', 'dedy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mr_prescription`
--

CREATE TABLE IF NOT EXISTS `mr_prescription` (
  `p_id` int(10) NOT NULL,
  `p_cup_id` int(10) NOT NULL,
  `p_patien_id` int(10) NOT NULL,
  `p_patien_name` varchar(50) NOT NULL,
  `p_medical_consultation_fees` int(25) NOT NULL,
  `p_medicines` int(25) NOT NULL,
  `p_admin` int(25) NOT NULL,
  `p_update_date` date NOT NULL,
  `p_user_update` varchar(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mr_prescription`
--

INSERT INTO `mr_prescription` (`p_id`, `p_cup_id`, `p_patien_id`, `p_patien_name`, `p_medical_consultation_fees`, `p_medicines`, `p_admin`, `p_update_date`, `p_user_update`) VALUES
(0, 1, 0, 'marcus dedy', 50000, 60000, 2500, '2018-02-03', 'dedy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
