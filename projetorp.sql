-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jan-2019 às 04:39
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
(1, 1, '<p><b>questao</b> 1<br></p>', 2, 8, 'MAC421', 'assets/img/listas/mac421-lista-1-q-1.jpg'),
(2, 1, '<p>questao 2<br></p>', 2, 8, 'MAC421', ''),
(3, 1, '<p>questao 3<br></p>', 2, 8, 'MAC421', 'assets/img/listas/mac421-lista-1-q-3.jpg'),
(4, 1, '<p>questao 4<br></p>', 2, 8, 'MAC421', ''),
(5, 1, '<p>questao 5<br></p>', 2, 8, 'MAC421', 'assets/img/listas/mac421-lista-1-q-5.jpg'),
(6, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Adote o calor específico da água como <b>1 cal/g⋅°C</b>, e seu calor latente de vaporização como<b> 540 cal/g</b>. Com essas informações, determine a quantidade de calor necessária para vaporizar completamente <b>5 litros</b> de água, inicialmente a uma temperatura de <b>20°C</b>.</span><br></p>', 2, 8, 'MAC421', ''),
(7, 2, '<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">As especificações técnicas de um fogão informam que a potência térmica de um dos queimadores é de <b>645 cal/s</b>. Se o rendimento desse queimador, ao esquentar uma panela com água, é de <b>60%</b>, qual a energia útil fornecida em <b>5 minutos</b>?</span>', 2, 8, 'MAC421', ''),
(8, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Considere um queimador de fogão com potência de <b>500 cal/s</b> e rendimento <b>65%</b>. Quanto tempo seria necessário para fazer <b>ferver 2 litros</b> de água, inicialmente a uma temperatura de<b> 25°C</b>?</span><br></p>', 2, 8, 'MAC421', ''),
(9, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Uma pessoa põe <b>1,5 litro</b> de água em uma panela, a uma temperatura de <b>20°C</b>, e observa que leva <b>4 minutos</b> para que essa massa de água entre em <b>ebulição</b>, após ser posto em contato térmico com um queimador de fogão. Determine a <b>potência</b> útil desse queimador.</span><br></p>', 2, 8, 'MAC421', ''),
(10, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Consultando dados técnicos, obtemos a informação que o <i>poder calorífico</i> do GLP (gás liquefeito de petróleo) é de <b>11730 cal/g</b>. Considerando um fogão potência <b>640 cal/s</b>, com rendimento de <b>62%</b>, qual a massa de gás queimada em <b>15 minutos</b> de uso?</span><br></p>', 2, 8, 'MAC421', ''),
(11, 25, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Dois corpos, A e B, inicialmente com temperaturas diferentes, são postos em contato térmico no interior de um recipiente de baixa condutibilidade térmica. Nesse caso, podemos afirmar que:.</span><br></p>', 2, 8, 'MAC421', ''),
(12, 25, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Uma pessoa relata que determinado corpo aquece rapidamente quando exposto a luz solar ao meio dia, mas esfria rapidamente quando colocado na sombra. Em relação a esse fato, podemos afirmar que:.</span><br></p>', 2, 8, 'MAC421', ''),
(13, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">Considere uma torradeira doméstica (sanduicheira) e a chapa na qual colocamos o sanduíche para aquecer. Essa chapa deve ter uma capacidade térmica __________, pois deve aquecer ___________ quando for ligada, e esfriar _____________ quando for desligada..</font></span><br></p>', 2, 8, 'MAC421', ''),
(14, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">Um corpo apresenta capacidade térmica 500 cal / ºC.</font></span></p><p><font face=\"Arial\"><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\">Sobre o comportamento desse corpo são feitas 4 afirmações. Selecione apenas as que são corretas..</span><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><br></span></font><br></p>', 2, 8, 'MAC421', ''),
(15, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">O gráfico abaixo mostra como varia a temperatura de dois corpos homogêneos, A e B, em contato térmico no interior de um calorímetro de capacidade térmica desprezível.</font></span></p><p><font face=\"Arial\"><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\">Sobre o fenômeno apresentado abaixo são feitas 4 afirmativas. Quais são elas?.</span></font><br></p>', 2, 8, 'MAC421', 'assets/img/listas/mac421-lista-25-q-5.png'),
(16, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">A variação de temperatura da água do mar varia muito pouco entre do dia e a noite, em uma mesma data. Isso ocorre por que:.</font></span><br></p>', 2, 8, 'MAC421', ''),
(17, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">Considere uma panela na qual a água está fervendo, cozendo algum alimento. Podemos afirmar correntamente que, nesse caso, mantendo a potência máxima no \"queimador\" do fogão:.</font></span><br></p>', 2, 8, 'MAC421', ''),
(18, 25, '<p><font face=\"Arial\"><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\">A intensidade da radiação solar, em um dia de verão, próximo a linha do Equador, pode ser estimada com o seguinte valor: I = 60 cal/(cm</span><sup style=\"color: rgb(0, 0, 0); text-align: justify;\">2</sup><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\">&nbsp;⋅ h).</span></font></p><p><font face=\"Arial\"><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\">Analisando essas unidades, marque, entre as afirmações abaixo, apenas as que estão corretas:.</span><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><br></span></font><br></p>', 2, 8, 'MAC421', ''),
(19, 25, '<p><span style=\"color: rgb(0, 0, 0); font-size: 17px; text-align: justify;\"><font face=\"Arial\">Uma pessoa observa que a água de um grande lago estava \"fria\" durante um determinado dia ensolarado e \"morna\" durante a noite, algumas horas depois. Sobre esse fenômeno, podemos afirmar corretamente que:.</font></span><br></p>', 2, 8, 'MAC421', '');

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
  `ans_tries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_answers`
--

INSERT INTO `tb_answers` (`ans_id`, `ans_usu_id`, `ans_cla_hash`, `ans_lis_id`, `ans_act_id`, `ans_resposta`, `ans_date`, `ans_tries`) VALUES
(1, 4, 'MAC421', 25, 11, '<p>sdafsdfasdfasdfadsfasdfsadf</p>', '22-01-2019 1:28', 3),
(2, 4, 'MAC421', 25, 12, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(3, 4, 'MAC421', 25, 13, '<p>geraldo professor</p>', '22-01-2019 1:28', 3),
(4, 4, 'MAC421', 25, 14, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(5, 4, 'MAC421', 25, 15, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(6, 4, 'MAC421', 25, 16, 'TENTATIVA 3 DE <b>RESPOSTA</b>', '22-01-2019 1:28', 3),
(7, 4, 'MAC421', 25, 17, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(8, 4, 'MAC421', 25, 18, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(9, 4, 'MAC421', 25, 19, '<p>sdafsdfasdfasdfadsfasdfsadf<br></p>', '22-01-2019 1:28', 3),
(10, 4, 'MAC421', 2, 6, '<p><i><u>adsfdfsdg</u></i></p>', '22-01-2019 1:38', 1),
(11, 4, 'MAC421', 2, 7, '<p>dddasdfsdhsfsad</p>', '22-01-2019 1:38', 1),
(12, 4, 'MAC421', 2, 8, '<p>asdfwe324324</p>', '22-01-2019 1:38', 1),
(13, 4, 'MAC421', 2, 9, '<p>sg<font face=\"Arial\">sd<u>fgdsfgdfgdfgdfgddfgfdsg</u></font></p>', '22-01-2019 1:38', 1),
(14, 4, 'MAC421', 2, 10, '<p>adsfadfa<b>dsfadsfads</b></p>', '22-01-2019 1:38', 1);

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
(3, 'site_version', 'Em Desenvolvimento'),
(4, 'site_favicon', 'assets/img/favicon.ico'),
(5, 'qtd_atv', '15');

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
(3, 4, 'Emerson', 'Silva', 'emersonbruno2_@homail.com', '20161044110007'),
(6, 8, 'tiago', 'coutinho', 'tiago@coutinho.com', '20161044110009'),
(10, 13, 'Augusto', 'Barbosa', 'augustozero@hotmail.com', '20161044110001'),
(11, 14, 'Lucas', 'Braz', 'lucasbraz@usuario.com', '20161044110002');

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
(1, 'testando atividade com algumas imagens apenas (1,3,5)', 2, 8, 'MAC421'),
(2, 'Calorimetria 02', 2, 8, 'MAC421'),
(25, 'Termodinâmica / Calorimetria - 01', 2, 8, 'MAC421');

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
(1, 4, 'MAC421', '16-01-2019 16:53', 1),
(2, 13, 'MAC421', '17-01-2019 13:37', 1),
(3, 14, 'MAC421', '19-01-2019 14:52', 1);

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
(13, 'professorteste2', 'bhunji741', '', 1),
(14, 'lucasbraz', 'uehuebr', '', 1);

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
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_answers`
--
ALTER TABLE `tb_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
