-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2019 às 03:07
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetorp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_activities`
--

CREATE TABLE `tb_activities` (
  `act_id` int(11) NOT NULL,
  `act_titulo` text NOT NULL,
  `act_alternativeA` text NOT NULL,
  `act_alternativeB` text NOT NULL,
  `act_alternativeC` text NOT NULL,
  `act_alternativeD` text NOT NULL,
  `act_subject` int(11) NOT NULL,
  `act_teacher` int(11) NOT NULL,
  `act_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_class`
--

CREATE TABLE `tb_class` (
  `cla_id` int(11) NOT NULL,
  `cla_hash` int(11) NOT NULL,
  `cla_teacher` int(11) NOT NULL,
  `cla_subject` int(11) NOT NULL,
  `cla_start_time` varchar(255) NOT NULL,
  `cla_end_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_configs_site`
--

CREATE TABLE `tb_configs_site` (
  `con_id` int(11) NOT NULL,
  `con_nome_site` varchar(255) NOT NULL,
  `con_favico` varchar(255) NOT NULL,
  `con_status` int(11) NOT NULL,
  `con_descricao` mediumtext NOT NULL,
  `con_logo` varchar(255) NOT NULL,
  `con_cr` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info_users`
--

CREATE TABLE `tb_info_users` (
  `inf_id` int(11) NOT NULL,
  `inf_name` varchar(155) NOT NULL,
  `inf_lastname` varchar(255) NOT NULL,
  `inf_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lists`
--

CREATE TABLE `tb_lists` (
  `lis_id` int(11) NOT NULL,
  `lis_titulo` varchar(255) NOT NULL,
  `lis_subject` int(11) NOT NULL,
  `lis_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subjects`
--

CREATE TABLE `tb_subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_nome` varchar(255) NOT NULL,
  `sub_teacher` int(11) NOT NULL,
  `sub_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `usu_id` int(11) NOT NULL,
  `usu_login` varchar(255) NOT NULL,
  `usu_password` varchar(255) NOT NULL,
  `usu_session` varchar(255) NOT NULL,
  `usu_perm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_activities`
--
ALTER TABLE `tb_activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`cla_id`);

--
-- Indexes for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  ADD PRIMARY KEY (`inf_id`);

--
-- Indexes for table `tb_lists`
--
ALTER TABLE `tb_lists`
  ADD PRIMARY KEY (`lis_id`);

--
-- Indexes for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_activities`
--
ALTER TABLE `tb_activities`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
