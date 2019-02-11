-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 186.202.152.115
-- Generation Time: 11-Fev-2019 às 14:59
-- Versão do servidor: 5.6.40-84.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koala_edu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_activities`
--

CREATE TABLE `tb_activities` (
  `act_id` int(11) NOT NULL,
  `act_lis_id` int(11) NOT NULL,
  `act_enunciado` text NOT NULL,
  `act_sub_id` int(11) NOT NULL,
  `act_teacher` int(11) NOT NULL,
  `act_cla_hash` varchar(255) NOT NULL,
  `act_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_activities`
--

INSERT INTO `tb_activities` (`act_id`, `act_lis_id`, `act_enunciado`, `act_sub_id`, `act_teacher`, `act_cla_hash`, `act_foto`) VALUES
(11, 3, '<p>Adote o calor específico da água como 1 cal/g⋅°C, e seu calor latente de vaporização como 540 cal/g. Com essas informações, determine a quantidade de calor necessária para vaporizar completamente 5 litros de água, inicialmente a uma temperatura de 20°C<br></p>', 1, 2, 'FID047', ''),
(12, 3, '<p>Uma pessoa relata que determinado corpo aquece rapidamente quando exposto a luz solar ao meio dia, mas esfria rapidamente quando colocado na sombra. Em relação a esse fato, podemos afirmar que:<br></p>', 1, 2, 'FID047', ''),
(13, 3, '<p>Considere uma torradeira doméstica (sanduicheira) e a chapa na qual colocamos o sanduíche para aquecer. Essa chapa deve ter uma capacidade térmica __________, pois deve aquecer ___________ quando for ligada, e esfriar _____________ quando for desligada.</p><p>Selecione a opção que contém as palavras que completam corretamente as lacunas.</p>', 1, 2, 'FID047', ''),
(14, 3, '<p>Um corpo apresenta capacidade térmica 500 cal / ºC.</p><p>Sobre o comportamento desse corpo são feitas 4 afirmações. Selecione apenas as que são corretas.</p>', 1, 2, 'FID047', ''),
(15, 3, '<p>O gráfico abaixo mostra como varia a temperatura de dois corpos homogêneos, A e B, em contato térmico no interior de um calorímetro de capacidade térmica desprezível.<br></p>', 1, 2, 'FID047', 'assets/img/listas/3/fid047-lista-3-q-5.png'),
(31, 7, '<p>Questão 01</p>', 1, 2, 'FI67BA', ''),
(32, 7, '<p>Questão 02<br></p>', 1, 2, 'FI67BA', ''),
(33, 7, '<p>Questão 03<br></p>', 1, 2, 'FI67BA', ''),
(34, 7, '<p>Questão 04<br></p>', 1, 2, 'FI67BA', ''),
(35, 7, '<p>Questão 05<br></p>', 1, 2, 'FI67BA', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_answers`
--

CREATE TABLE `tb_answers` (
  `ans_id` int(11) NOT NULL,
  `ans_usu_id` int(11) NOT NULL,
  `ans_cla_hash` text NOT NULL,
  `ans_lis_id` int(11) NOT NULL,
  `ans_act_id` int(11) NOT NULL,
  `ans_resposta` text NOT NULL,
  `ans_date` varchar(255) NOT NULL,
  `ans_tries` int(11) NOT NULL,
  `ans_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_answers`
--

INSERT INTO `tb_answers` (`ans_id`, `ans_usu_id`, `ans_cla_hash`, `ans_lis_id`, `ans_act_id`, `ans_resposta`, `ans_date`, `ans_tries`, `ans_status`) VALUES
(6, 4, 'FID047', 3, 11, '<p>teste resposta 1</p>', '25-01-2019 2:46', 1, 1),
(7, 4, 'FID047', 3, 12, '<p>teste resposta 2<br></p>', '25-01-2019 2:46', 1, 1),
(8, 4, 'FID047', 3, 13, '<p>teste resposta 3<br></p>', '25-01-2019 2:46', 1, 1),
(9, 4, 'FID047', 3, 14, '<p>teste resposta 4<br></p>', '25-01-2019 2:46', 1, 1),
(10, 4, 'FID047', 3, 15, '<p>teste resposta 5<br></p>', '25-01-2019 2:46', 1, 1),
(11, 6, 'FI67BA', 7, 31, '<p>Resposta 01 - modificada por emerson</p>', '26-01-2019 11:30', 3, 1),
(12, 6, 'FI67BA', 7, 32, '<p>Resposta 02<br></p>', '26-01-2019 11:30', 3, 1),
(13, 6, 'FI67BA', 7, 33, '<p>Resposta 03 - modificada por emerson<br></p>', '26-01-2019 11:30', 3, 1),
(14, 6, 'FI67BA', 7, 34, '<p>Resposta 04<br></p>', '26-01-2019 11:30', 3, 1),
(15, 6, 'FI67BA', 7, 35, '<p>Resposta 05 - modificada por emerson<br></p>', '26-01-2019 11:30', 3, 1),
(16, 7, 'FI67BA', 7, 31, 'EAE MEU PARCEIRO 1', '11-02-2019 14:00', 1, 1),
(17, 7, 'FI67BA', 7, 32, 'EAE MEU PARCEIRO 2', '11-02-2019 14:00', 1, 1),
(18, 7, 'FI67BA', 7, 33, 'EAE MEU PARCEIRO 3', '11-02-2019 14:00', 1, 1),
(19, 7, 'FI67BA', 7, 34, 'EAE MEU PARCEIRO 4', '11-02-2019 14:00', 1, 1),
(20, 7, 'FI67BA', 7, 35, 'EAE MEU PARCEIRO 5', '11-02-2019 14:00', 1, 1);

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
(1, 'Turma 2019.1 - Integrado', 'FID047', 2, 1, '25-01-2019', '31-01-2019', 'Turma do integrado de fisica', 1),
(2, 'Infoweb2019', 'FI67BA', 2, 1, '25-01-2019', '15-02-2019', 'Campus: IFRN - CNAT\r\nCurso: Informática para Internet\r\nSérie: 2° ano', 1);

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
(3, 'site_version', 'Em Desenvolvimento'),
(4, 'site_favicon', 'assets/img/favicon.ico'),
(5, 'qtd_atv', '5');

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
(1, 1, 'Emerson Bruno', 'Dantas da Silva', 'emersonbruno_@hotmail.com', 'adm'),
(2, 2, 'Geraldo', 'Felipe', 'fisicainvertida@fisica.com.br', '20161044110000'),
(4, 4, 'Aluno', 'Teste1', 'teste@aluno.com', '20171044110000'),
(5, 5, 'Aluno', 'Teste2', 'teste2@aluno.com', '20171044110001'),
(6, 6, 'Aluno', 'de Tal', 'aluno01@gmail.com', '15648997845'),
(7, 7, 'Tiago', 'Coutinho', 'tiagocoutinho111@gmail.com', '20161044110028'),
(8, 8, 'Augusto', 'Barbosa', 'augusto2barbosa@gmail.com', '20161044110039');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lists`
--

CREATE TABLE `tb_lists` (
  `lis_id` int(11) NOT NULL,
  `lis_name` text NOT NULL,
  `lis_subject` int(11) NOT NULL,
  `lis_teacher` int(11) NOT NULL,
  `lis_cla_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lists`
--

INSERT INTO `tb_lists` (`lis_id`, `lis_name`, `lis_subject`, `lis_teacher`, `lis_cla_hash`) VALUES
(3, 'Termodinâmica / Calorimetria - 01', 1, 2, 'FID047'),
(7, 'Oscilações 01', 1, 2, 'FI67BA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notify_class`
--

CREATE TABLE `tb_notify_class` (
  `not_id` int(11) NOT NULL,
  `not_cla_hash` varchar(255) NOT NULL,
  `not_message` text NOT NULL,
  `not_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_notify_class`
--

INSERT INTO `tb_notify_class` (`not_id`, `not_cla_hash`, `not_message`, `not_date`) VALUES
(1, 'FI67BA', '<ul><li style=\"text-align: left;\"><span style=\"font-weight: bolder;\">13/02</span>&nbsp;</li><ul><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Laboratório: oscilações e ondas (parte 2)</li><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Ler aulas 05 a 08.</li><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Fazer exercícios das aulas&nbsp;</li><li><span style=\"font-style: italic;\">&nbsp; &nbsp; &nbsp; -&gt;-&gt; Entregar lista 01 até o dia 15/02.</span></li><li><span style=\"font-style: italic;\"><br></span></li></ul><li><b>11/02</b>&nbsp;</li><ul><li style=\"margin-left: 25px;\">- Laboratório: oscilações e ondas (parte 1)</li><li style=\"margin-left: 25px;\">- Ler aulas 01 a 04, no site.</li></ul><li style=\"text-align: left;\"><br></li><ul><ul><ul><ul><ul><ul><li style=\"\"><span style=\"color: rgb(206, 198, 206); background-color: rgb(0, 0, 255);\"><br></span></li></ul></ul></ul></ul></ul></ul><li style=\"margin-left: 25px;\"><p></p></li></ul><p></p>', '27-01-2019 16:29');

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
(2, 4, 'FID047', '25-01-2019 2:44', 1),
(3, 5, 'FID047', '25-01-2019 2:45', 1),
(4, 6, 'FI67BA', '25-01-2019 22:26', 1),
(5, 7, 'FI67BA', '11-02-2019 13:58', 1),
(6, 8, 'FI67BA', '11-02-2019 14:49', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `rev_id` int(11) NOT NULL,
  `rev_lis_id` int(11) NOT NULL,
  `rev_usu_id` int(11) NOT NULL,
  `rev_nota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_reviews`
--

INSERT INTO `tb_reviews` (`rev_id`, `rev_lis_id`, `rev_usu_id`, `rev_nota`) VALUES
(1, 3, 4, 'c'),
(2, 7, 6, 'b'),
(3, 7, 7, 'c');

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
(1, 'Física', 'Matéria de Física', 2);

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
(1, 'adminemerson', '$2a$08$57e3ff37fd247da3a2794eGPMUmDETJm4rVw5mc7rxB2KPh7OV8iC', '57e3ff37fd247da3a2794f', 0),
(2, 'geraldofelipe', '$2a$08$332cd3f6f83d75ba74215um69in0Aq6MqvDsuyaZSe4XrGtRLgD0G', '332cd3f6f83d75ba742159', 2),
(4, 'alunoteste', '$2a$08$a5aabbb0633a0bbabe170uyqi2p6X4/6uSGVBBKLuoaequXFvfxk.', 'a5aabbb0633a0bbabe1709', 1),
(5, 'alunoteste2', '$2a$08$def8ce42c0ab04e50fa2cOxAg2xwBvRim.t5VETPF6fjudgwEbMK.', 'def8ce42c0ab04e50fa2ca', 1),
(6, 'Aluno01', '$2a$08$b7541f7ed070ca9240b04uGC2Ku.dmfF1kejtY2R3C12fDX0ibfni', 'b7541f7ed070ca9240b044', 1),
(7, 'budgetsole', '$2a$08$1c58ceb43a05e8c787598Ot5SowyDsh6WN2M8eIGm8qYPZ2swp/ta', '1c58ceb43a05e8c787598b', 1),
(8, 'arttiko', '$2a$08$aa9155b95b690d6c7c97cu5j3pNcK.3GIJYzzXb//XrZtcsnG60TO', 'aa9155b95b690d6c7c97c0', 1);

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
-- Indexes for table `tb_notify_class`
--
ALTER TABLE `tb_notify_class`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`rev_id`);

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
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_answers`
--
ALTER TABLE `tb_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_notify_class`
--
ALTER TABLE `tb_notify_class`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
