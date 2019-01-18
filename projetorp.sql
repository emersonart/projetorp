-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jan-2019 às 23:37
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
  `act_lis_id` int(11) NOT NULL,
  `act_titulo` text NOT NULL,
  `act_subject` int(11) NOT NULL,
  `act_teacher` int(11) NOT NULL,
  `act_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_answers`
--

CREATE TABLE `tb_answers` (
  `ans_id` int(11) NOT NULL,
  `ans_usu_id` int(11) NOT NULL,
  `ans_cla_id` int(11) NOT NULL,
  `ans_lis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_class`
--

CREATE TABLE `tb_class` (
  `cla_id` int(11) NOT NULL,
  `cla_nome` text NOT NULL,
  `cla_hash` varchar(22) NOT NULL,
  `cla_teacher` int(11) NOT NULL,
  `cla_subject` int(11) NOT NULL,
  `cla_start_time` varchar(255) NOT NULL,
  `cla_end_time` varchar(255) NOT NULL,
  `cla_descricao` text NOT NULL,
  `cla_insc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_class`
--

INSERT INTO `tb_class` (`cla_id`, `cla_nome`, `cla_hash`, `cla_teacher`, `cla_subject`, `cla_start_time`, `cla_end_time`, `cla_descricao`, `cla_insc`) VALUES
(1, 'Turma 1', 'FI758D', 1, 1, '14-01-2019', '15-02-2019', '', 1),
(5, 'Turma 2', 'MAC421', 8, 2, '17-01-2019', '18-01-2019', 'adfsadsfadsf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_configs_site`
--

CREATE TABLE `tb_configs_site` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_configs_site`
--

INSERT INTO `tb_configs_site` (`con_id`, `con_name`, `con_value`) VALUES
(1, 'site_title', 'Koala Educational'),
(2, 'site_author', 'Emerson Bruno e Tiago Coutinho'),
(3, 'site_version', 'Em Desenvolvimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info_users`
--

CREATE TABLE `tb_info_users` (
  `inf_id` int(11) NOT NULL,
  `inf_usu_id` int(11) NOT NULL,
  `inf_name` varchar(155) NOT NULL,
  `inf_lastname` varchar(255) NOT NULL,
  `inf_email` varchar(255) NOT NULL,
  `inf_registration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_info_users`
--

INSERT INTO `tb_info_users` (`inf_id`, `inf_usu_id`, `inf_name`, `inf_lastname`, `inf_email`, `inf_registration`) VALUES
(1, 1, 'Emerson', 'Bruno', 'emersonbruno_@hotmail.com', '0'),
(2, 3, 'Alyanna', 'emersonart', 'emersonbruno_@homail.com', '20161044110008'),
(3, 4, 'Emerson', 'Silva', 'emersonbruno2_@homail.com', '2147483647'),
(6, 8, 'tiago', 'coutinho', 'tiago@coutinho.com', '20161044110009'),
(10, 13, 'teste de', 'professor', 'professor2@teste.com', '20161044110001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lists`
--

CREATE TABLE `tb_lists` (
  `lis_id` int(11) NOT NULL,
  `lis_titulo` varchar(255) NOT NULL,
  `lis_subject` int(11) NOT NULL,
  `lis_teacher` int(11) NOT NULL,
  `tb_id_act` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lists`
--

INSERT INTO `tb_lists` (`lis_id`, `lis_titulo`, `lis_subject`, `lis_teacher`, `tb_id_act`) VALUES
(1, 'lista termodinamica', 1, 5, '1/8/10/11/12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_register_class`
--

CREATE TABLE `tb_register_class` (
  `reg_id` int(11) NOT NULL,
  `reg_usu_id` int(11) NOT NULL,
  `reg_cla_hash` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `reg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_register_class`
--

INSERT INTO `tb_register_class` (`reg_id`, `reg_usu_id`, `reg_cla_hash`, `reg_date`, `reg_status`) VALUES
(1, 8, 'fi758d', '16-01-2019 16:53', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subjects`
--

CREATE TABLE `tb_subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_nome` varchar(255) NOT NULL,
  `sub_description` text NOT NULL,
  `sub_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_subjects`
--

INSERT INTO `tb_subjects` (`sub_id`, `sub_nome`, `sub_description`, `sub_teacher`) VALUES
(1, 'Física', 'materia de fisica', 1),
(2, 'Matemática', 'matéria de calculo', 8);

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
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`usu_id`, `usu_login`, `usu_password`, `usu_session`, `usu_perm`) VALUES
(1, 'professor', '123456', '', 2),
(3, 'emersonart', 'emerson23', '', 0),
(4, 'emersonart2', 'emerson23', '', 1),
(8, 'tiago', 't14g00', '', 2),
(13, 'professorteste2', 'bhunji741', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_activities`
--
ALTER TABLE `tb_activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `tb_answers`
--
ALTER TABLE `tb_answers`
  ADD PRIMARY KEY (`ans_id`);

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
-- Indexes for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  ADD PRIMARY KEY (`reg_id`);

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
-- AUTO_INCREMENT for table `tb_answers`
--
ALTER TABLE `tb_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
