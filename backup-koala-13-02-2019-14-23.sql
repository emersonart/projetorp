-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 186.202.152.115
-- Generation Time: 13-Fev-2019 às 15:23
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
(20, 7, 'FI67BA', 7, 35, 'EAE MEU PARCEIRO 5', '11-02-2019 14:00', 1, 1),
(21, 8, 'FI67BA', 7, 31, 'HIII EOQ VRAU', '11-02-2019 15:15', 3, 1),
(22, 8, 'FI67BA', 7, 32, 'SOLADITO DE PLASMA', '11-02-2019 15:15', 3, 1),
(23, 8, 'FI67BA', 7, 33, 'NTIC - Novas Tecnologias de Informatica ', '11-02-2019 15:15', 3, 1),
(24, 8, 'FI67BA', 7, 34, '<span style=\"font-family: Helvetica, Arial, sans-serif; font-size: 18px; color: rgb(255, 0, 0);\">Não acho que quem ganhar ou quem perder, nem quem ganhar nem perder, vai ganhar ou perder. Vai todo mundo perder.</span>', '11-02-2019 15:15', 3, 1),
(25, 8, 'FI67BA', 7, 35, '<span style=\"color: rgb(51, 51, 51); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; font-size: 16px;\">Não vamos colocar meta. Vamos deixar a meta aberta, mas, quando atingirmos a meta, vamos dobrar a meta</span><br>', '11-02-2019 15:15', 3, 1);

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
(1, 'Turma 2019.1 - Integrado', 'FID047', 7, 3, '25-01-2019', '31-01-2019', 'Turma do integrado de fisica', 1),
(2, 'Infoweb2019', 'FI67BA', 7, 3, '25-01-2019', '15-02-2019', 'Campus: IFRN - CNAT\r\nCurso: Informática para Internet\r\nSérie: 2° ano', 1),
(3, 'infoweb1ano', 'FIDFDF', 2, 1, '11-02-2019', '15-02-2019', 'Curso Técnico de Informática para Internet, primeiro ano, 2019.', 1),
(4, 'infoweb2ano', 'FID14E', 2, 1, '12-02-2019', '15-02-2019', 'Curso Técnico em Informática para Internet, 2º ano, 2019.', 1),
(5, 'Edif1M19', 'FIED32', 25, 2, '13-02-2019', '22-02-2019', 'Edificações 1 ano 2019', 1),
(6, 'Edif1V19', 'FI3476', 25, 2, '13-02-2019', '22-02-2019', 'Edificações Vespertino 2019', 1);

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
(8, 8, 'Augusto', 'Barbosa', 'augusto2barbosa@gmail.com', '20161044110039'),
(9, 9, 'Daniel', 'Santana', 'danielsantana2004@gmail.com', '20191011110014'),
(10, 10, 'Ueniry Felipe', 'Dantas do Rêgo', 'ueniry.d@gmail.com', '20191011110017'),
(11, 11, 'Viviane', 'Pereira', 'vivsgoms@gmail.com', '20191011110022'),
(12, 12, 'Lindemberg', 'Nunes', 'lncjunior2013@outlook.com', '20191011110032'),
(13, 13, 'Jully', 'Viviane', 'Viviane.jully1@gmail.com', '20191011110015'),
(14, 14, 'Marcílio', 'Custódio da Silva', 'Marcilioifrn@gmail.com', '20181011110036'),
(15, 15, 'Kaio', 'Silva', 'gado123@hotmail.com', '20191011110009'),
(16, 16, 'Larissa', 'Karla dos Santos Nascimento', 'larissakarla94@gmail.com', '20191011110021'),
(17, 17, 'Bruno', 'Felipe', 'brunofeliperf@hotmail.com', '20191011110003'),
(18, 18, 'Kael', 'Paraguassu', 'kaelparaguassu49@gmail.com', '20191011110020'),
(19, 19, 'Mariana', 'Morais', 'marianaquel.morais@gmail.com', '20191011110004'),
(20, 20, 'LAURA', 'MACEDO', 'lauramillyarofc@hotmail.com', '20191011110006'),
(21, 21, 'Helena', 'Capistrano', 'Helenamcapistrano@gmail.com', '20191011110016'),
(22, 22, 'Roberto', 'Fabricio', 'Roberto.Fabricio2012@gmail.com', '20191011110008'),
(24, 24, 'Marina', 'Medeiros', 'medeiros.marina@escolar.ifrn.edu.br', '20191011110013'),
(25, 25, 'Manoel', 'Leonel', 'leonel.oliveira@ifrn.edu.br', '20100000000000'),
(26, 26, 'Pedro', 'Cursino', 'pedrocursino77@gmail.com', '20181011110004'),
(27, 27, 'Roberta', 'Manuela', 'roberta.manuela@escolar.ifrn.edu.br', '20181011110015'),
(28, 28, 'Klaus', 'Reiniger', 'klausreininja@gmail.com', '20181011110019'),
(29, 29, 'Paulo', 'Daniel', 'pdanielcdo11@gmail.com', '20181011110007'),
(30, 30, 'Beatriz', 'Ferreira', 'triszferreira@gmail.com', '20191011110018'),
(31, 31, 'Danilo', 'Rafael', 'Danilofechine@hotmail.com', '20181011110028'),
(32, 32, 'gabriel', 'dos santos moura', 'gs4763052@gmail.com', '20181011110025'),
(33, 33, 'Giovana', 'Costa', 'telgio6@gmail.com', '20181011110024'),
(34, 34, 'Luara Cristine', 'Paixão Fernandes', 'luara_10ariivanise@hotmail.com', '20191011110028'),
(35, 35, 'Gabriel', 'Fontineli', 'nao_sei@gmail.com', '20191011110010'),
(36, 36, 'Rafael', 'E. M. Campelo', 'rafael.endres1235@gmail.com', '20191011110002'),
(37, 37, 'Radmila', 'Gama', 'srapadalecki0611@gmail.com', '20171011110017'),
(38, 38, 'Maxwell', 'Dantas de Lima', 'tmallwer@gmail.com', '20191011010053'),
(39, 39, 'Anne', 'Coutinho', 'annegcoutinhom@gmail.com', '20191011010054'),
(40, 40, 'Samuel', 'Oliveira', 'jsamueloliveira152@gmail.com', '20191011010021'),
(41, 41, 'Izabel', 'Costa', 'izabelcosta410@gmail.com', '20191011010067'),
(42, 42, 'Rebeca', 'Reis', 'rebecareis8@live.com', '20191011010032'),
(43, 43, 'Sara', 'Barbosa', 'olindabotelho@yahoo.com.br', '20191011010013'),
(44, 44, 'Marliany', 'Lívia', 'mmarliany.gomes@gmail.com', '2019101101002'),
(45, 45, 'Victor', 'Dantas', 'victordantas86@gmail.com', '20191011010035'),
(46, 46, 'Victor', 'Alves', 'victoralves.silva@hotmail.com', '20191011010052'),
(47, 47, 'Samantha', 'Araujo', 'sluize14@gmail.com', '20191011010041'),
(48, 48, 'Thiago', 'Miguel', 'filhomiguel157@gmail.com', '20191011010017'),
(49, 49, 'Vitallo Leonardo', 'Lopes Paraconha', 'leothedoido47@gmail.com', '20191011010024'),
(50, 50, 'Lucas', 'Lemuel', 'lucas343@bol.com.br', '20191011010006'),
(51, 51, 'Eloise', 'Vieira', 'eloisevsilva@outlook.com', '20191011010040'),
(52, 52, 'Matheus', 'cardoso', 'mc25033@gmail.com', '20181011010068'),
(53, 53, 'Daniel', 'Luis', 'danielluisdemelopinheiro225@gmail.com', '20191011010059'),
(54, 54, 'ANNA', 'COSTA', 'anaclaracosta571@GMAIL.COM', '20191011010049'),
(55, 55, 'Paulo', 'Victor', 'oliveiravictor740@gmail.com', '20191011010025'),
(56, 56, 'Leon', 'Freitas', 'leonfreitaslopes@gmail.com', '20191011010014'),
(57, 57, 'Maysa', 'Macedo', 'maysamikaele380@gmail.com', '20191011010056'),
(58, 58, 'Maria Eduarda', 'de Freitas Medeiros', 'dudinhaa_mariaa@yahoo.com.br', '20191011010019'),
(59, 59, 'Vitor', 'Paulino', 'vitorpaulinog@gmail.com', '20191011010012'),
(60, 60, 'samuel', 'elias', 'se821937@gmail.com', '20191011010064'),
(61, 61, 'Ritoria Regia', 'Ribeiro Ravalcante', 'Vitoriaregiar862@gmail.com', '20191011010026'),
(62, 62, 'Camila', 'Campos', 'camilacamposlyrarn@gmail.com', '2019101010020'),
(63, 63, 'Ingridi', 'Samia', 'Samiaingridi2004@gmail.com', '20191011010063'),
(64, 64, 'Paulo', 'Gabriel', 'paulofraca364@gmail.com', '20191011010011'),
(65, 65, 'livia', 'faustino', 'liviafaustinonascimento123@gmail.com', '201910110158494'),
(66, 66, 'juliana', 'costa', 'julianathiagoc@gmail.com', '20191011010043'),
(67, 67, 'euclides', 'guedes', 'euclidesguedes@gmal.com', '20191011010031'),
(68, 68, 'Gabriel', 'Rocha', 'gabrielrochaf83@gmail.com', '20191011010046'),
(69, 69, 'Izabelly', 'Martins', 'izammelo0@gmail.com', '20191011010015'),
(70, 70, 'Geraldo', 'Ferreira', 'geraldoffg@gmail.com', '20191011010016'),
(71, 71, 'Thayza', 'Costa', 'thayzaferreira6@gmail.com', '20191011010068'),
(72, 72, 'Jaqueline', 'Ketylly', 'jaqketyll12@gmail.com', '20191011010044'),
(73, 73, 'ketlen', 'yasmim', 'ketlenyasmim22@gmail.com', '20191011010050'),
(74, 74, 'Sthefany', 'Izidio', 'sthefanyizidioo@gmail.com', '20191011010004'),
(75, 75, 'Natasha', 'França', 'natashaf217@gmail.com', '20191011010037'),
(76, 76, 'fernanda', 'araújo', 'fernanda.araujo@contemporaneo.g12.br', '20191011010034'),
(77, 77, 'Thiago', 'Silva', 'ithiagomess@gmail.com', '20191011010033'),
(78, 78, 'Francisco', 'Vargas', 'francpvn@gmail.com', '20191011010022'),
(79, 79, 'Alice', 'Laranja', 'lilicelm08@gmail.com', '20191011010057'),
(80, 80, 'Lara', 'Nascimento', 'doismundosig@gmail.com', '20191011010069'),
(81, 81, 'João Lucas', 'Teixeira da SIlva', 'jl836523@gmail.com', '20191011010071'),
(82, 82, 'kleonilson', 'santos', 'kleonilsonichigo@gmail.com', '20191011010003'),
(83, 83, 'Matheus', 'Diogenes', 'Mdiogenes27@gmail.com', '20191011010008'),
(84, 84, 'Bianca', 'Xavier', 'bianca15xavier@gmail.com', '20191011010077'),
(85, 85, 'Willian Eduardo', 'Santos', 'wesacari@gmail.com', '20191011010039'),
(86, 86, 'Yasmim', 'Thainara', 'yasmim.thainara@hotmail.com', '20191011010065'),
(87, 87, 'jose', 'humberto', 'humbertojunior2015@hotmail.com', '20181014320032'),
(88, 88, 'Giovanna', 'Rosendo', 'gigirosendo@hotmail.com', '20191011010045'),
(89, 89, 'Whigna', 'Barbosa', 'whigna_03barbosa@hotmail.com', '20191011010029'),
(90, 90, 'Anne Beatriz', 'Bezerra dos Santos', 'EnnyBias@gmail.com', '20191011010028'),
(91, 91, 'Gabriela', 'Alves', 'Mariagabrielasilvaalves@gmail.com', '20191011010007'),
(92, 92, 'João Guilherme', 'Nascimento', 'drjganadpn@gmail.com', '20191011010055'),
(93, 93, 'vitoria', 'fagundes', 'v.fagundes1005@icloud.com', '20191011010072'),
(94, 94, 'Daniel', 'Dário', 'danieldario753@gmail.com', '20191011010036'),
(95, 95, 'cecilia', 'santiago', 'mccm201392@gmail.com', '20191011010051'),
(96, 96, 'Matheus', 'Andrade', 'matheuzsilva1d@gmail.com', '20191011010018'),
(97, 97, 'gabriel', 'basilio', 'basiliogabriel344@gmail.com', '20191011010058'),
(98, 98, 'Antonio', 'Carlos', 'uchihasasuke2701@gmail.com', '20191011010047'),
(99, 99, 'Amanda', 'Souza', 'amandasoumendes@gmail.com', '20191011010005'),
(100, 100, 'gilnara', 'mirian', 'gilnaramirian@gmail.com', '20191011010070'),
(101, 101, 'Anthony', 'Lucas', 'anthony_luc23@outlook.com', '20191011010009'),
(102, 102, 'Magnus', 'Ryan', 'magnus.ryan.27@gmail.com', '20191011010048'),
(103, 103, 'Amália', 'Matias', 'amaliamatias@outlook.com', '20191011010042'),
(104, 104, 'Maria', 'Eduarda', 'jeronimomariaeduarda617@gmail.com', '20191011010061'),
(105, 105, 'Mariana', 'Esmeralda', 'mariesmeralda2004@gmail.com', '20191011010001'),
(106, 106, 'Alice', 'Pimentel', 'alice_bf@hotmail.com', '20181011010056'),
(107, 107, 'Leonisia', 'Gabriela', 'leonisiag@gmail.com', '20191011010079');

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
(1, 'FI67BA', '<ul><li style=\"text-align: left;\"><span style=\"font-weight: bolder;\">13/02</span>&nbsp;</li><ul><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Laboratório: oscilações e ondas (parte 2)</li><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Ler aulas 05 a 08.</li><li style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; - Fazer exercícios das aulas&nbsp;</li><li><span style=\"font-style: italic;\">&nbsp; &nbsp; &nbsp; -&gt;-&gt; Entregar lista 01 até o dia 15/02.</span></li><li><span style=\"font-style: italic;\"><br></span></li></ul><li><b>11/02</b>&nbsp;</li><ul><li style=\"margin-left: 25px;\">- Laboratório: oscilações e ondas (parte 1)</li><li style=\"margin-left: 25px;\">- Ler aulas 01 a 04, no site.</li></ul><li style=\"text-align: left;\"><br></li><ul><ul><ul><ul><ul><ul><li style=\"\"><span style=\"color: rgb(206, 198, 206); background-color: rgb(0, 0, 255);\"><br></span></li></ul></ul></ul></ul></ul></ul><li style=\"margin-left: 25px;\"><p></p></li></ul><p></p>', '27-01-2019 16:29'),
(2, 'FIDFDF', '<p></p><b>DIÁRIO DE CLASSE</b><br><hr><p></p><p><b>11/02</b> - Aula inicial. Apresentamos a metodologia a ser utilizada e os recursos tecnológicos educacionais. Conteúdo: conceitos de posição, definição de movimento e repouso, conceito de velocidade, introdução ao estudo do conceito de referencial.</p><p>-&gt;<span style=\"font-weight: bold;\"> <i>Para casa</i></span>: ler as aulas 01 e 02 do site e resolver a lista 0101.</p><p><br></p>', '12-02-2019 12:16'),
(3, 'FIED32', 'Bom dia Crianças!<div>Todos que solicitaram registro de cadastro tiveram os seus registros efetivados. Os demais podem e devem fazer isso ainda esta semana.&nbsp;</div>', '13-02-2019 12:27');

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
(6, 8, 'FI67BA', '11-02-2019 14:49', 1),
(7, 9, 'FIDFDF', '11-02-2019 20:05', 1),
(8, 10, 'FIDFDF', '11-02-2019 20:33', 1),
(9, 11, 'FIDFDF', '11-02-2019 20:54', 1),
(10, 12, 'FIDFDF', '11-02-2019 21:01', 1),
(11, 13, 'FIDFDF', '11-02-2019 21:30', 1),
(12, 14, 'FIDFDF', '11-02-2019 22:04', 1),
(13, 15, 'FIDFDF', '11-02-2019 22:04', 1),
(14, 16, 'FIDFDF', '11-02-2019 22:15', 1),
(15, 17, 'FIDFDF', '11-02-2019 22:23', 1),
(16, 18, 'FIDFDF', '11-02-2019 22:34', 1),
(17, 19, 'FIDFDF', '12-02-2019 0:41', 1),
(18, 20, 'FIDFDF', '12-02-2019 8:52', 1),
(19, 21, 'FIDFDF', '12-02-2019 9:43', 1),
(20, 22, 'FIDFDF', '12-02-2019 11:25', 1),
(22, 24, 'FIDFDF', '12-02-2019 12:01', 1),
(23, 26, 'FID14E', '12-02-2019 13:06', 0),
(24, 27, 'FID14E', '12-02-2019 15:17', 0),
(25, 28, 'FID14E', '12-02-2019 15:42', 0),
(26, 29, 'FID14E', '12-02-2019 15:43', 0),
(27, 30, 'FIDFDF', '12-02-2019 16:25', 1),
(28, 31, 'FID14E', '12-02-2019 17:57', 0),
(29, 32, 'FID14E', '12-02-2019 19:26', 0),
(30, 33, 'FID14E', '12-02-2019 20:09', 0),
(31, 34, 'FIDFDF', '12-02-2019 23:24', 1),
(32, 35, 'FIDFDF', '13-02-2019 8:41', 1),
(33, 36, 'FIDFDF', '13-02-2019 8:57', 1),
(34, 37, 'FIDFDF', '13-02-2019 9:02', 1),
(35, 38, 'FIED32', '13-02-2019 10:27', 1),
(36, 39, 'FIED32', '13-02-2019 10:27', 1),
(37, 40, 'FIED32', '13-02-2019 10:28', 1),
(38, 41, 'FIED32', '13-02-2019 10:28', 1),
(39, 42, 'FIED32', '13-02-2019 10:28', 1),
(40, 43, 'FIED32', '13-02-2019 10:28', 1),
(41, 44, 'fied32', '13-02-2019 10:28', 1),
(42, 45, 'FIED32', '13-02-2019 10:28', 1),
(43, 46, 'FIED32', '13-02-2019 10:28', 1),
(44, 47, 'fied32', '13-02-2019 10:29', 1),
(45, 48, 'FIED32', '13-02-2019 10:29', 1),
(46, 49, 'FIED32', '13-02-2019 10:29', 1),
(47, 50, 'FIED32', '13-02-2019 10:30', 1),
(48, 51, 'FIED32', '13-02-2019 10:30', 1),
(49, 52, 'FIED32', '13-02-2019 10:30', 1),
(50, 53, 'FIED32', '13-02-2019 10:30', 1),
(51, 54, 'FIED32', '13-02-2019 10:31', 1),
(52, 55, 'FIED32', '13-02-2019 10:31', 1),
(53, 56, 'FIED32', '13-02-2019 10:31', 1),
(54, 57, 'FIED32', '13-02-2019 10:32', 1),
(55, 58, 'FIED32', '13-02-2019 10:32', 1),
(56, 59, 'FIED32', '13-02-2019 10:32', 1),
(57, 60, 'FIED32', '13-02-2019 10:32', 1),
(58, 61, 'FIED32', '13-02-2019 10:32', 1),
(59, 62, 'FIED32', '13-02-2019 10:33', 1),
(60, 63, 'FIED32', '13-02-2019 10:33', 1),
(61, 64, 'FIED32', '13-02-2019 10:33', 1),
(62, 65, 'fied32', '13-02-2019 10:34', 1),
(63, 66, 'FIED32', '13-02-2019 10:35', 1),
(64, 67, 'FIED32', '13-02-2019 10:39', 1),
(65, 68, 'FIED32', '13-02-2019 11:23', 1),
(66, 69, 'FIED32', '13-02-2019 11:26', 1),
(67, 70, 'FI3476', '13-02-2019 14:16', 1),
(68, 71, 'FI3476', '13-02-2019 14:16', 1),
(69, 72, 'fi3476', '13-02-2019 14:18', 1),
(70, 73, 'fi3476', '13-02-2019 14:21', 1),
(71, 74, 'FI3476', '13-02-2019 14:21', 1),
(72, 75, 'fi3476', '13-02-2019 14:21', 1),
(73, 76, 'FI3476', '13-02-2019 14:21', 1),
(74, 77, 'fi3476', '13-02-2019 14:21', 1),
(75, 78, 'FI3476', '13-02-2019 14:22', 1),
(76, 79, 'FI3476', '13-02-2019 14:22', 1),
(77, 80, 'FI3476', '13-02-2019 14:22', 1),
(78, 81, 'FI3476', '13-02-2019 14:23', 1),
(79, 82, 'fi3476', '13-02-2019 14:23', 1),
(80, 83, 'FI3476', '13-02-2019 14:23', 1),
(81, 84, 'FI3476', '13-02-2019 14:23', 1),
(82, 85, 'fi3476', '13-02-2019 14:24', 1),
(83, 86, 'FI3476', '13-02-2019 14:24', 1),
(84, 87, 'FI3476', '13-02-2019 14:24', 1),
(85, 88, 'FI3476', '13-02-2019 14:25', 1),
(86, 89, 'FI3476', '13-02-2019 14:25', 1),
(87, 90, 'FI3476', '13-02-2019 14:25', 1),
(88, 91, 'FI3476', '13-02-2019 14:27', 1),
(89, 92, 'FI3476', '13-02-2019 14:28', 1),
(90, 93, 'FI3476', '13-02-2019 14:29', 1),
(91, 94, 'fi3476', '13-02-2019 14:30', 1),
(92, 95, 'FI3476', '13-02-2019 14:30', 1),
(93, 96, 'fi3476', '13-02-2019 14:30', 1),
(94, 97, 'FI3476', '13-02-2019 14:30', 1),
(95, 98, 'fi3476', '13-02-2019 14:31', 1),
(96, 99, 'FI3476', '13-02-2019 14:32', 1),
(97, 100, 'FI3476', '13-02-2019 14:32', 1),
(98, 101, 'fi3476', '13-02-2019 14:34', 1),
(99, 102, 'fi3476', '13-02-2019 14:34', 1),
(100, 103, 'FI3476', '13-02-2019 14:35', 1),
(101, 104, 'fi3476', '13-02-2019 14:37', 1),
(102, 105, 'FI3476', '13-02-2019 14:37', 1),
(103, 106, 'fi3476', '13-02-2019 14:39', 1),
(104, 107, 'fi3476', '13-02-2019 14:43', 1);

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
(2, 7, 6, 'd'),
(3, 7, 7, 'c'),
(4, 7, 8, 'b');

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
(1, 'Física 1', 'Matéria de Física', 2),
(2, 'Física 2', 'Matéria de Física', 25),
(3, 'Loona', 'KPOPISTICO', 7);

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
(7, 'budgetsole', '$2a$08$1c58ceb43a05e8c787598Ot5SowyDsh6WN2M8eIGm8qYPZ2swp/ta', '1c58ceb43a05e8c787598b', 2),
(8, 'arttiko', '$2a$08$aa9155b95b690d6c7c97cu5j3pNcK.3GIJYzzXb//XrZtcsnG60TO', 'aa9155b95b690d6c7c97c0', 1),
(9, 'danielsantana', '$2a$08$71d4261f29a8b94dbeef3udMNHfWq1Vsta4du08uJJ0yzPBVm/YDe', '71d4261f29a8b94dbeef34', 1),
(10, 'faueni12', '$2a$08$cd29de19ffafb156fa1c4usEoJvNI4QQpGJEFM2iDUjUGDxsgFR4i', 'cd29de19ffafb156fa1c49', 1),
(11, 'vivsgoms', '$2a$08$1afca7854b19c6247064ce0a5OUOkNpxV1NyVw54QkuPzXa1Jwwte', '1afca7854b19c6247064ce', 1),
(12, 'gcjim', '$2a$08$96e90314ddafe1c85aef6ueXCpf/q4sTF5XmZf/bm3EGUKZeD0PNm', '96e90314ddafe1c85aef69', 1),
(13, 'jully', '$2a$08$931407b51472926840c36uXKi5r65CJgsy8psyTuBu8C58Z4twxpO', '931407b51472926840c361', 1),
(14, 'marcilio', '$2a$08$c2c0d9e70f9823e33a741OvAc1sSroC.DEYvrGj.7cP4uZDpiK8by', 'c2c0d9e70f9823e33a741a', 1),
(15, 'kaio_gado', '$2a$08$d4b8cda74fd75a1a42606uvTyq4vOWqQxu4w9SXWhny2n3hewh8s.', 'd4b8cda74fd75a1a426062', 1),
(16, 'larissakarla', '$2a$08$92280e022c674fd84d3fbe7kMqpQN12k7pKaIk5U2xrhaT6NBWD1C', '92280e022c674fd84d3fbf', 1),
(17, 'bruno', '$2a$08$89db89687582afad0c6dau6bCklfPZUSuc461X80W8ROYonn7KdTK', '89db89687582afad0c6da7', 1),
(18, 'k4pp5', '$2a$08$6e5e1c6122567b1e93b4eu4Kc5iG.dU8CnhaM2GsmulpgIx1cXiq6', '6e5e1c6122567b1e93b4e4', 1),
(19, 'mariana', '$2a$08$749adc55cc5f12aaf7c88uF7zaDH6./Xy9KmTeT4Aqqecn/1ojew.', '749adc55cc5f12aaf7c888', 1),
(20, 'laura_emilly', '$2a$08$263b8dbb1f6d69e7ed840OT3jUI2YmpQV2DYbitlTPHnBR4tCP4jW', '263b8dbb1f6d69e7ed840a', 1),
(21, 'helenamcapistrano', '$2a$08$c2efd266449c94c0bb35bueQnCSE5LJR0yI7MoCAcKKjgAvtUOz96', 'c2efd266449c94c0bb35b2', 1),
(22, 'robertof', '$2a$08$f1053835e9b05e0aafe23OiiQr9svTMzNeEqUhn6D7.OOEeJ6UxaG', 'f1053835e9b05e0aafe23a', 1),
(24, 'medeirosmarina', '$2a$08$6b21d447a5311c6dc0519uFc4vw4WpRRdy4V/ALA5qtTlrvdO6sT6', '6b21d447a5311c6dc05198', 1),
(25, 'manoelleonel', '$2a$08$b7541f7ed070ca9240b04uGC2Ku.dmfF1kejtY2R3C12fDX0ibfni', 'b7541f7ed070ca9240b044', 2),
(26, 'pedroac', '$2a$08$74122dcaf3aa044ab8f1dOnaF8eRnTJB61r8YXdKvDeHs5SknDhIa', '74122dcaf3aa044ab8f1dc', 1),
(27, 'roberta_manuela', '$2a$08$c490bd48a990329f8e65feBWvH2LSCqnqeUuyO85iYPh/aQgQk7SC', 'c490bd48a990329f8e65ff', 1),
(28, 'klausreiniger', '$2a$08$c90ec7df933094457f95buAzdKCdF.XvQW5h./.YhHhakQJmbKI7y', 'c90ec7df933094457f95b2', 1),
(29, 'paulodaniel', '$2a$08$fe1fc3a2195dd5a300766ut58eqfoZBXYA/it58Lx/VdKZ1gR8pP.', 'fe1fc3a2195dd5a3007665', 1),
(30, 'beatrizferreira', '$2a$08$48ee4b13ad8ac42886da9u58OxOqxEsR9ZLXDlrACEfntORUA432q', '48ee4b13ad8ac42886da90', 1),
(31, 'daniloraf', '$2a$08$51b4bca4a34a62da3e70aeAK9HV6emeZAeThsItnHh4gF9Jfx/3dG', '51b4bca4a34a62da3e70af', 1),
(32, 'gabriel', '$2a$08$edaba074393812027a850OjArXCGuAnHDKZQIDHLlppihVB.LYqjy', 'edaba074393812027a850c', 1),
(33, 'giocld', '$2a$08$22f2697ea236f77020b2cu1DDP6hVro4HBvlBC9lGtJj0nsFDVzM.', '22f2697ea236f77020b2c5', 1),
(34, 'luarapaixao', '$2a$08$e52fcaa26f244f005e4f9uPEkr/CohKzqPj82P2WoewppiafqIKhC', 'e52fcaa26f244f005e4f93', 1),
(35, 'fontigata1', '$2a$08$d9bdcd7723b96bc66acfaufmCumBiEpgB7PNC80TZ0yEvFIHP52JK', 'd9bdcd7723b96bc66acfa4', 1),
(36, 'rafaelcampelo', '$2a$08$e8de96db4d54e65416646uKO/qKaFv44UfAa.lSvnZbTJs4I3DJ/u', 'e8de96db4d54e654166464', 1),
(37, 'srapadalecki', '$2a$08$932cafcba98853b1e1346uCnuD6vHrlJogiLeSnxA8MSKlXwec65a', '932cafcba98853b1e13462', 1),
(38, 'malwer10', '$2a$08$42c3d0c683332303e38cceg7FWKMTkBXlSBscqcm9EyYhygz7ZPOC', '42c3d0c683332303e38ccf', 1),
(39, '20191011010054', '$2a$08$b5e4bba88e9f43675bc32Oj7EpaF7.l3vLBB06bIAzv3PNoE4BkNy', 'b5e4bba88e9f43675bc32c', 1),
(40, '20191011010021', '$2a$08$82ea6f4be5a94c9dd8226er5Im7/toZb9F7jBKs7dkXTJcq7vd5X.', '82ea6f4be5a94c9dd8226e', 1),
(41, '20191011010067', '$2a$08$12d857cd1cc30d4246918uKb69ZMkrMIN9mdRYq.BTzYbitIjJbba', '12d857cd1cc30d42469183', 1),
(42, '20191011010032', '$2a$08$4026b0955f9d42a345ac1uAL0QbfPere1tpLZvk0DM28p6RGT6Q32', '4026b0955f9d42a345ac10', 1),
(43, '20191011010013', '$2a$08$cd3f4f2aea86a190ffef6ujokMbbs57Q9W2d5ax71eCFMgzDP3aay', 'cd3f4f2aea86a190ffef68', 1),
(44, '20191011010002', '$2a$08$6292b9ac7d6cb669e707fe0KzoTFsBN3w9VnVjomP9TmqIID01h26', '6292b9ac7d6cb669e707fe', 1),
(45, '20191011010035', '$2a$08$66f12341c518bed0122ccu3JlzFQK/fQq/hQ7.xeHlZd3Ujke8pMy', '66f12341c518bed0122cc3', 1),
(46, '20191011010052', '$2a$08$66af04389c63271b8c945uLaspRjSJGU4trL0tKzB1LtiwevkfGeG', '66af04389c63271b8c9452', 1),
(47, '20191011010041', '$2a$08$8f47e3ed148213fb66bd1ukEtGy1et96LDkuJ0IOw6ixajoROZVGu', '8f47e3ed148213fb66bd13', 1),
(48, 'thiagomiguel', '$2a$08$1095dd28490e329d5888aetbwCG0z2Qvs7HdeLAhpr0QFyDtOr1Oy', '1095dd28490e329d5888af', 1),
(49, 'vitallo_leonardo', '$2a$08$0ee90cc2ab65742b71c16eAGYeps0apeijSvEo1x5moNV7eCBbJwO', '0ee90cc2ab65742b71c16f', 1),
(50, '20191011010006', '$2a$08$a2dff911b5f140199c79bunLkYunpYtk1yWkRvIEhXGnJuh55wBRa', 'a2dff911b5f140199c79b0', 1),
(51, 'eloise', '$2a$08$caf314d84ff6e020283ebupobs2j/8D/I6X8CMcGU5J5DotBDjzYG', 'caf314d84ff6e020283eb0', 1),
(52, '20181011010068', '$2a$08$4a14fd422a5004aadcffaOCU6OaX3jQQ/rqewrYgZ6De5ThNrQh6O', '4a14fd422a5004aadcffab', 1),
(53, '20191011010059', '$2a$08$5f5a37d6854fd90e18e03u0YhuY5CyDohCV9ALiBmmblkfq9vWjz.', '5f5a37d6854fd90e18e032', 1),
(54, '20191011010049', '$2a$08$deb1f6c80dfadfefd4a0cuPifrqCARm2IDj6gA.SVohpvzwfELxDu', 'deb1f6c80dfadfefd4a0c9', 1),
(55, '20191011010025', '$2a$08$91d9f3d37ec246944ec4eOP7oBJQPEXrehHYMCnhr7C6zYZldbelq', '91d9f3d37ec246944ec4eb', 1),
(56, '20191011010014', '$2a$08$4af46b9fd58c074013569u4yJ1G6cYWzcAO13YrDs1g5SaPAjcCd.', '4af46b9fd58c0740135690', 1),
(57, '20191011010056', '$2a$08$b761a1d5be1e8fb8a4aecegYAhpC5u6Ps5K7XVqdh4ENCYjXzVzmm', 'b761a1d5be1e8fb8a4aecf', 1),
(58, '20191011010019', '$2a$08$ff1fa694b7aee7f5eb833uIVJ8TLCVNk6tL9aDOejoyffkRNrc3.a', 'ff1fa694b7aee7f5eb8332', 1),
(59, '20191011010012', '$2a$08$ea45de9217ad75c8764f0eGHdrmnrygflV7m0pfJysJAntjJn/FDS', 'ea45de9217ad75c8764f0e', 1),
(60, 'samueleliasdasilva', '$2a$08$5c634144edceeca9a426culNIPs92PwkciFTW7dvGzk1whBp84usy', '5c634144edceeca9a426c3', 1),
(61, '201910110010026', '$2a$08$a6ed8a11867d46b358b4bOA3RPRvIRcwVKdB6O5.4d4Qup9X/zD2.', 'a6ed8a11867d46b358b4bc', 1),
(62, 'camilacampos', '$2a$08$cce6b27301f7f9d7d4a72uz6Wom3Fe8NiKjWtOciQBO9brBjxIGoa', 'cce6b27301f7f9d7d4a722', 1),
(63, '20191011010063', '$2a$08$1450c710e654801d59121O5bJ8cEU/qfz5fxGVntq2gdEjoEHXwb2', '1450c710e654801d59121c', 1),
(64, '20191011010011', '$2a$08$cd57728a2ede62aa61ef9Oacx7w6fOR8KSpt4rZXNZs/oYXYI2JQy', 'cd57728a2ede62aa61ef9a', 1),
(65, '20191011010060', '$2a$08$323480391c84cc3dbdd5dOzO.ET27QfNsL49VN2iNM0ZGDQRFQyVG', '323480391c84cc3dbdd5da', 1),
(66, '20191011010043', '$2a$08$69bbf1ddeadcf48f1fc1bu8820WiJahZAfsWI8ezR1GFgIMGt.fmy', '69bbf1ddeadcf48f1fc1b2', 1),
(67, '20191011010031', '$2a$08$e54e6c8965b44177e5892uA73hyLE7PW/Z.JlnBlr2IcDYzunhjH6', 'e54e6c8965b44177e58927', 1),
(68, 'gabrielrocha96', '$2a$08$c34e24861e8786e8c1c77uvku4u4N4kBi5HChFqPEv4m8tw1qUr6C', 'c34e24861e8786e8c1c774', 1),
(69, '20191011010015', '$2a$08$4690d42f88875a858568fezYd6ZuhmID8cZjE.cD2Hmt2mG/ZX6SC', '4690d42f88875a858568ff', 1),
(70, 'geraldoffg', '$2a$08$0c442d331c8068dc8b91fuEtrDON0cj7F/ts8aSHKs0.OCq7b1cHW', '0c442d331c8068dc8b91f1', 1),
(71, '20191011010068', '$2a$08$1306e42e3aff26be0ba93uLFKB85p3augcquoz5pilsURvYUwZKyC', '1306e42e3aff26be0ba939', 1),
(72, '20191011010044', '$2a$08$e241bab75c46549d212fcOczJEAsFYHqMyig.EUBfHzsU6PtyPkV.', 'e241bab75c46549d212fca', 1),
(73, '20191011010050', '$2a$08$1ab28fadfb0975ba7d337ubmLHWsYpmiY42hHHG0o/DMwJT1SQAou', '1ab28fadfb0975ba7d3374', 1),
(74, 'sthefanyi', '$2a$08$49e9eb3358b27e6f0abf6uVbvgUjp0AXMhLXbTIvMsH3EoVgLp1Gi', '49e9eb3358b27e6f0abf68', 1),
(75, '20191011010037', '$2a$08$e0b7b8fa511e1f5156fc5eshgyJRj2OPr9dAy20pHoXrU7by7f/hy', 'e0b7b8fa511e1f5156fc5e', 1),
(76, 'ysabelle', '$2a$08$8b1e58ed868e52933dc71OqI3SbKzF6VqpFJDrmy8oQGn4cevzjC6', '8b1e58ed868e52933dc71b', 1),
(77, '20191011010033', '$2a$08$9f2f89109c04824bc7d17OBsX7P/JkwKM3U/uozuVfBU8unwuUrCS', '9f2f89109c04824bc7d17c', 1),
(78, 'vargasnetto', '$2a$08$0787a3de0c9b138d08c7euwFvjISTGHKen9QxSncuj8pDcgkrEANy', '0787a3de0c9b138d08c7e4', 1),
(79, 'alicelaranja', '$2a$08$d1a9c40f43d86b44fade8u3xFQZF/m32xgR8KJlYWBrSJCP/1jqC6', 'd1a9c40f43d86b44fade87', 1),
(80, 'lara_', '$2a$08$ab095e846645bb55201d0uNbOJLcnaAj/7F7I1Xi.VN..bm1oWpTi', 'ab095e846645bb55201d05', 1),
(81, '20191011010071', '$2a$08$34228f8ebad569432ffc7uWKLAJyq5XLU9Yw9nHjYeUHnKMyzysfC', '34228f8ebad569432ffc73', 1),
(82, '20191011010003', '$2a$08$b5d07f23842dc831aff68upxi5S1mpUViNaSNxLCjW31c4TOXCxyC', 'b5d07f23842dc831aff685', 1),
(83, '20191011010008', '$2a$08$198d276966b9d850e2145uct6lXewjq8OOaOjn30536X0R8AGYzUW', '198d276966b9d850e21451', 1),
(84, '20191011010077', '$2a$08$54c8f7d6ee1b434d2b94eOVWtg.SWpmhZOdWUl28TkUwFUYUIeSpa', '54c8f7d6ee1b434d2b94ec', 1),
(85, '20191011010039', '$2a$08$644c628040fc3342fc3d9uMXnu6yay/q0UuuSsMpRRYpiDvZIaJPe', '644c628040fc3342fc3d94', 1),
(86, 'yasmim_thainara', '$2a$08$e2389fa38d14426260472uKMhmp6meaZotSEyLhyKs0mQiyzEwGU.', 'e2389fa38d144262604726', 1),
(87, 'humberto', '$2a$08$8b0e1432ccaceb271b1fautlkYxDX.M0gu./tDSXppQd1cuD5TU3e', '8b0e1432ccaceb271b1fa2', 1),
(88, '20191011010045', '$2a$08$4a5fc2975b2d4c89b5e4eO7FKfxTLfv5UStBeufhrSx54pMiPf24a', '4a5fc2975b2d4c89b5e4eb', 1),
(89, '20191011010029', '$2a$08$8f3df7779d0a0bc1dd77beHQQHP6b87i5a/Qne06C6bu87bK15wT6', '8f3df7779d0a0bc1dd77bf', 1),
(90, '20191011010028', '$2a$08$d36d0d1d9d892800a44d8uVOZan5dVsPUpk8kY0twU7vmtMNAvW42', 'd36d0d1d9d892800a44d83', 1),
(91, 'gabrielaalves', '$2a$08$ed4d2fc617a6f6f9f4b1duvzokbjANgpvRhEFTW/qXxPWYlvn2cM2', 'ed4d2fc617a6f6f9f4b1d4', 1),
(92, '20191011010055', '$2a$08$0fc2dec86d7252374525fOyBSzmx7AKqswcjNQdmQPWPfRPk7DC5e', '0fc2dec86d7252374525fc', 1),
(93, 'vitoriafagundes', '$2a$08$d5a455acb62083263c841uZ4d9etFGM4va1PFcYLX2CbnFUGgebdm', 'd5a455acb62083263c8416', 1),
(94, '20191011010036', '$2a$08$1ba9b3837d8a01490f6c9eY/FcTcNrdEoTB6vjoVwlsyaYOECtUcu', '1ba9b3837d8a01490f6c9e', 1),
(95, 'ceciia', '$2a$08$c132a9e4456db856048d7uScRWCOaaf.yjfGWfBJqkEpZd7RcoCr2', 'c132a9e4456db856048d75', 1),
(96, '20191011010018', '$2a$08$f1feb2b3cf382a57c21fbu5BNmyMrGFeLcupdk5RUrZY6f1F0ohq6', 'f1feb2b3cf382a57c21fb1', 1),
(97, '20191011010058', '$2a$08$4b59bc721ce08685774f8uBGwnoulvdY9AoWtLEPDIhPn6k.KhsPS', '4b59bc721ce08685774f82', 1),
(98, 'tonho', '$2a$08$86efeec00ad572a987a7auEPq9OQbsnfnxBpYH8In./O2L82rEV6C', '86efeec00ad572a987a7a1', 1),
(99, 'amanda', '$2a$08$1e6eee6e49ae1a13ab0a4u7zBfvGCIRmFR7ECB9YLEnjJwBXkzDhy', '1e6eee6e49ae1a13ab0a46', 1),
(100, '20191011010070', '$2a$08$33311a856b3cd6d201f7cu4/RCaTqGo4zGP2eRVNWMLwtGKqwC1xS', '33311a856b3cd6d201f7c4', 1),
(101, '20191011010009', '$2a$08$ee2dac723f79228b007aeupkkG85OHvpcgAJujUVQMSabTTf4pLR2', 'ee2dac723f79228b007ae7', 1),
(102, '20191011010048', '$2a$08$77dceb21e2d82ceab4d76uKWrStNl0o/24AE1aESjn14yMeMt/PiS', '77dceb21e2d82ceab4d767', 1),
(103, '20191011010042', '$2a$08$454ae208f0fe2d0e8185euxQ.tKFttVqws5RNJs6tfp31DhrG2EKq', '454ae208f0fe2d0e8185e7', 1),
(104, '20191011010061', '$2a$08$46bd15b8e19cde453708dun8sV6NGpHbJ5HSr2EEyPwco30aqpi/S', '46bd15b8e19cde453708d4', 1),
(105, '20191011010001', '$2a$08$4973cf2eed2bec38cbfc2OQSsFEgurQksLPNfBc65bELlnmaoPjWO', '4973cf2eed2bec38cbfc2b', 1),
(106, 'psyzook', '$2a$08$410b087f5c782359d80c8uStZuyUfsbMwFTKkvIA6WzcjvmVLZ2kW', '410b087f5c782359d80c80', 1),
(107, 'leonisia', '$2a$08$f7c7be1f0d3b50fe59d3euY9pxFUWrIKS85xYnN5hLHOPUuLgYkK2', 'f7c7be1f0d3b50fe59d3e9', 1);

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
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_configs_site`
--
ALTER TABLE `tb_configs_site`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_notify_class`
--
ALTER TABLE `tb_notify_class`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
