-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 186.202.152.115
-- Generation Time: 15-Fev-2019 às 16:06
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
(35, 7, '<p>Questão 05<br></p>', 1, 2, 'FI67BA', ''),
(36, 10, '<p><b>Para todas as questões, justifique detalhe e organize seus cálculos, listando os dados do problema e o modelo matemático utilizado.</b></p><hr><p>Um pessoa tem uma reunião na cidade vinha, marcada para 10 h. Sabendo que a distância a ser percorrida é de 175 km, e supondo uma velocidade média de 70 km/h para esse trajeto, a que horas essa pessoa deve sair de casa?<br></p><p><br></p>', 1, 2, 'FIDFDF', ''),
(37, 10, '<p>A velocidade dos projéteis balísticos é realmente impressionante. Uma bala de fuzil, por exemplo, pode se deslocar com velocidade de 900 m/s. </p><p>Nesse caso, qual o intervalo de tempo necessário para percorrer uma distância de 40 m?</p>', 1, 2, 'FIDFDF', ''),
(38, 10, 'Nessa questão você deve desenvolver um procedimento para calcular a velocidade com que você caminha. Descreva detalhadamente, no quadro de resposta, o procedimento e o cálculo, apresentando o valor encontrado.', 1, 2, 'FIDFDF', ''),
(39, 10, '<p>Uma pessoa dirige um veículo com uma velocidade de 90 km/h quando resolve mexer no celular, gastando um intervalo de tempo de 2 s nesse processo, contudo, com sua atenção totalmente voltada para o aparelho.</p><p>Calcule a distância percorrida pelo veículo enquanto a pessoa mexe no celular.</p>', 1, 2, 'FIDFDF', ''),
(40, 10, '<p>Uma corredor experimente já sabe que corre em um trecho perto da sua casa com uma velocidade média de 8 km/h. Qual a distância percorrida em um intervalo de tempo de 1h:20min?</p>', 1, 2, 'FIDFDF', '');

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
(25, 8, 'FI67BA', 7, 35, '<span style=\"color: rgb(51, 51, 51); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; font-size: 16px;\">Não vamos colocar meta. Vamos deixar a meta aberta, mas, quando atingirmos a meta, vamos dobrar a meta</span><br>', '11-02-2019 15:15', 3, 1),
(26, 10, 'FIDFDF', 10, 36, 'Ora, se eu tenho a distância (<span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">ΔS)</span> e a velocidade média, só falta o tempo (<span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt) necessário, que pode ser obtido por regra de 3 ou pela fórmula da velocidade média<br>Por regra de 3:<br>70 km   ----  1 h<br>175 km  ----  x h<br>70x = 175<br>x = 2,5h<br><br>Por velocidade média:<br>modelo:     [Vm = </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">ΔS / </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt]</span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\"><br>70 km/h = 175km / </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt = 175km / 70km/h<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt = 2,5h<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Ou seja, se em 2,5 horas a pessoa percorre a distância de 175 km, logo, ela deve sair de casa 2,5 horas antes da reunião.<br>10 - 2,5 = 7,5h<br> Dessa forma, devo sair de casa às sete e meia.</span>', '14-02-2019 21:07', 5, 1),
(27, 10, 'FIDFDF', 10, 37, '<span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Se eu tenho a velocidade média (900m/s) e a distância, dá para descobrir o intervalo de tempo (</span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt)</span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\"> por meio da fórmula da velocidade média ou por regra de 3:<br></span>Vm = <span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">ΔS / </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">900 = 40 / </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt = 40/900<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt = 0,444... s   ou    </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt=2/45 s<br>ou seja, em 0,444... s uma bala percorre 40 metros.<br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\"><br></span>', '14-02-2019 21:07', 5, 1),
(28, 10, 'FIDFDF', 10, 38, '<p>Vou para o shopping, o qual fica a 780 metros de distância, por uma avenida que não tem semáforos. Se eu demoro 6,5 minutos para chegar até o local, determine minha velocidade média em metros por segundo.<br>Para isso, primeiro deve-se transformar o intervalo de tempo (6,5 minutos<span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">) <span style=\"font-size: 14px;\">para a unidade</span><span style=\"font-size: 14px;\"> \"segundos\".<br></span></span><span style=\"font-size: 14px;\">1 min  -----  60 s<br>6,5 min ---   </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt</span><span style=\"font-size: 14px;\"><br></span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify;\">Δt = 390 s</span><span style=\"font-size: 14px;\">﻿.<br></span><span style=\"font-size: 14px;\">Agora, é só utilizar a fórmula da Velocidade Média ( Vm = </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify; color: rgb(0, 0, 0);\">ΔS / </span><span style=\"font-family: \"Open Sans\", sans-serif; font-size: 17px; text-align: justify; color: rgb(0, 0, 0);\">Δt )<br></span><span style=\"font-size: 14px;\">Vm = 780 m / 390 s<br>Velocidade média = 2 m/s</span></p>', '14-02-2019 21:07', 5, 1),
(29, 10, 'FIDFDF', 10, 39, 'Primeiro, deve-se saber a distância que perde com cada segundo que para.<br>90 km/h / 3,6 = 25 m/s<br>a cada segundo, percorre 25 metros.<br>se ele parou de acelerar, perdeu 50 metros em 2 segundos.', '14-02-2019 21:07', 5, 1),
(30, 10, 'FIDFDF', 10, 40, '<p>1h e 20 minutos pode ser reescrito como 80 minutos, e é possível fazer uma regra de 3<br>8 km ---- 60 min<br>&nbsp;x&nbsp; &nbsp; &nbsp; ---- 80 min<br>60x = 640&nbsp; &nbsp;(/10)<br>6x = 64<br>x = 64/6<br><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">ΔS</span>&nbsp;= 10,666... km<br><br>ou usando a fórmula de Velocidade Média<br>Vm =&nbsp;<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">ΔS /&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Δt<br>8 = x&nbsp; /&nbsp; 4/3h&nbsp; &nbsp; ... divisão de fração, multiplica pelo inverso da segunda e fica<br>8 = 3x / 4<br>3x = 32<br></span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\"><font color=\"#000000\">x</font> = 32/3</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify; color: rgb(0, 0, 0);\">ΔS</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">&nbsp;= 10,666... km<br><br></span></p>', '14-02-2019 21:07', 5, 1),
(31, 16, 'FIDFDF', 10, 36, '<p>se em 1 hora a pessoa percorre 70 km,em 2 ela percorreria 140 km(2 vezes 70),em em meia hora ela percorreria metade de 70 km,ou seja,35 km.</p><p>140+35=175</p><p>ou seja,ela levaria 2 horas e meia para completar o percurso,assim,teria que sair de casa às 7:30.</p>', '14-02-2019 22:59', 4, 2),
(32, 16, 'FIDFDF', 10, 37, '<p>900------1</p><p>40--------x</p><p>900x=40</p><p>x=40:900</p><p>x=0,044 (aproximadamente)</p><p><a href=\"resposta:0,044\">resposta:0,044</a>s</p>', '14-02-2019 22:59', 4, 2),
(33, 16, 'FIDFDF', 10, 38, '', '14-02-2019 22:59', 4, 2),
(34, 16, 'FIDFDF', 10, 39, '<p>90km/h é igual a 25m/s (dividi o 90 por 3,6)</p><p>logo,se são 25 metros por segundo em 2 segundos seriam 50 metros. (25.2)</p><p><br></p>', '14-02-2019 22:59', 4, 2),
(35, 16, 'FIDFDF', 10, 40, '<p>em uma hora percorrem-se 8 km.</p><p>1 hora tem 60 minutos,logo 20 minutos=1/3 de hora</p><p>8:3=2,6(aproximadamente)</p><p>logo,a distância percorrida é igual a 8km+2,6km=10,6km</p>', '14-02-2019 22:59', 4, 2),
(36, 18, 'FIDFDF', 10, 36, '<p>Distância a ser percorrida: 175 km</p><p>Velocidade média: 70 km/h</p><p>Se, em 1h, 70 km são percorridos, em 2.5h (2h:30min), 175 km serão percorridos. (REGRA DE TRÊS)</p><p>70km          1h</p><p>175km         X</p><p>70X = 175                                                                                                                                                                                                                                                                                             X = 175 / 70                                                                                                                                                                                                                                                                                             X = 2.5h                                                                                                                                                                                                                                                                                          </p><p>Portanto, a pessoa deve sair de casa às 7h:30min.</p>', '14-02-2019 23:02', 5, 2),
(37, 18, 'FIDFDF', 10, 37, '<p>Distância a ser percorrida: 40m</p><p>Velocidade: 900 m/s</p><p>Se, em 1s, 900 m são percorridos, em 0.044s, 40m serão percorridos. (REGRA DE TRÊS)</p><p>900m          1s</p><p>40m             X</p><p>900X = 40                                                                                                                                                                                                                                                                                              X = 40 / 900                                                                                                                                                                                                                                                                                            X = 0.044s             </p><p>Portanto, o intervalo de tempo necessário para percorrer uma distância de 40 m é 0.004 s                                                                                                                                                                                                                                                                           </p>', '14-02-2019 23:02', 5, 2),
(38, 18, 'FIDFDF', 10, 38, '<p>A distância entre minha casa e um supermercado próximo é de 2 km.</p><p>Marcando em um relógio o tempo necessário para percorrer tal distância, obtive como resultado 20 min, ou seja, andei 2 km em 20 min.</p><p>Se, em 20 min, percorri 2km, em 60 min (1h), eu percorreria 6km.</p><p>2km          20min</p><p> X             60min</p><p>20X = 60 x 2                                                                                                                                                                                                                                                                                            20X = 120                                                                                                                                                                                                                                                                                                X = 120 / 20                                                                                                                                                                                                                                                                                            X = 6km</p><p>Portanto, é possivel afirmar que a velocidade com que eu caminho é 6 km/h ou 1,66667 m/s.                                                                                                                                                                                                                                                                                         </p>', '14-02-2019 23:02', 5, 2),
(39, 18, 'FIDFDF', 10, 39, '<p>Velocidade: 90 km/h</p><p>Distância percorrida em 3600s: 90km</p><p>DIstância percorrida em 2s: X</p><p>90km&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3600s</p><p>&nbsp; &nbsp;X&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2s</p><p>X = (90 x 2) / 3600 = 0.05km</p><p>Portanto, a distância percorrida pelo veículo enquanto a pessoa mexe no celular é 0.05km ou 50m</p>', '14-02-2019 23:02', 5, 2),
(40, 18, 'FIDFDF', 10, 40, '<p>Velocidade média: 8 km/h</p><p>Se 8 km são percorridos em 1h, em 1.3h (1h:20min), serão percorridos 10.4 km.</p><p>8km          60min                                                                                                                                                                                                                                                                                     X             80min</p><p>X = (8 x 8) / 6 = 10.7km                                                                                                                                                                                                                                                                                                 </p><p>Portanto, a distância percorrida em um intervalo de tempo de 1h:20min é 10.7km</p>', '14-02-2019 23:02', 5, 2),
(41, 12, 'FIDFDF', 10, 36, '<p><span style=\"font-size: 18px;\">﻿S= 175 KM                          70= 175:X                                                                                        </span></p><p><span style=\"font-size: 18px;\"> V m= 70 KM/H                   175= 70 X                                  </span></p><p><span style=\"font-size: 18px;\">T= X= 2,5 H</span><span style=\"font-size: 18px;\">                           X= 175:70                    </span></p><p><span style=\"font-size: 18px;\">Tf= 10 H                                            X= 2,5 H</span><span style=\"font-size: 18px;\"> </span></p><p><span style=\"font-size: 18px;\">Ti= 10-2,5= 7,5 H = 7H 30Min                    </span></p>', '15-02-2019 0:13', 5, 1),
(42, 12, 'FIDFDF', 10, 37, '<p><span style=\"font-size: 18px;\">﻿S= 40 M                                     900= 40:X</span></p><p><span style=\"font-size: 18px;\">V m= 900 M/S                            900 X= 40</span></p><p><span style=\"font-size: 18px;\">T= X= 0,004444444 S                        X= 900:40</span></p><p><span style=\"font-size: 18px;\"><br></span></p><p><span style=\"font-size: 18px;\">                                                   </span><span style=\"font-size: 18px;\">   X= 0,004444444 S</span></p>', '15-02-2019 0:13', 5, 1),
(43, 12, 'FIDFDF', 10, 38, '<p><span style=\"font-size: 18px;\">Se eu Caminha-se em um campo de futebol,que tenha 120 M. Eu chegaria do inicio ao fim em 108 segundos. Então minha velocidade seria X M/S.</span></p><p><span style=\"font-size: 18px;\">S=120 M                                          X= 120:108</span></p><p><span style=\"font-size: 18px;\">T=108 S                                           X= 1.111111 M/S</span></p><p><span style=\"font-size: 18px;\">V m= X</span></p>', '15-02-2019 0:13', 5, 1),
(44, 12, 'FIDFDF', 10, 39, '<p><span style=\"font-size: 18px;\">﻿V m= 90 km/h= 25 m/s                  25=X:2</span><span style=\"font-size: 18px;\">                                            90:3,6=25</span></p><p><span style=\"font-size: 18px;\">T= 2 s                                          25 x 2=X</span></p><p><span style=\"font-size: 18px;\">S= X                                            X= 50 m<br></span><br></p>', '15-02-2019 0:13', 5, 1),
(45, 12, 'FIDFDF', 10, 40, '<p><span style=\"font-size: 18px;\">﻿</span><span style=\"font-size: 18px;\">V m= 8 km/h                                   8= X:1,3</span><span style=\"font-size: 18px;\">                                             60 MIN = 1 H    </span></p><p><span style=\"font-size: 18px;\">T= 1 H 20 MIN= 1,3 H                      X= 8 x 1,3                                              20 MIN=  X        </span></p><p><span style=\"font-size: 18px;\">S= X                                              X= 10,4 KM                                              60 X = 20</span></p><p><span style=\"font-size: 18px;\">                                                                                                                          X= 20:60                                                                                                                                                 X= 3</span></p>', '15-02-2019 0:13', 5, 1),
(46, 24, 'FIDFDF', 10, 36, '<p>A pessoa precisa sair de casa as 7h30min</p><p>175/70= 2,5</p><p>10h-2,5h=7,5</p>', '15-02-2019 10:51', 5, 2),
(47, 24, 'FIDFDF', 10, 37, '<p>metros - segundos</p><p>900      -      1</p><p>40        -      x</p><p>900x=40</p><p>x=0,04 segundos</p>', '15-02-2019 10:51', 5, 2),
(48, 24, 'FIDFDF', 10, 38, '<p>Se eu consigo percorrer uma distância de 100 metros em 20 segundos, para calcular a velocidade na qual eu caminho basta dividir a distancia pelo tempo, logo:</p><p>VM= Ds/Dt = 100/20= 5m/s</p>', '15-02-2019 10:51', 5, 2),
(49, 24, 'FIDFDF', 10, 39, '<p>km- segundos</p><p>90 - 3600</p><p>x   -  2</p><p>180= 3600x</p><p>x=0,05km=50m</p>', '15-02-2019 10:51', 5, 2),
(50, 24, 'FIDFDF', 10, 40, '<p>km - min</p><p>8&nbsp; -&nbsp; 60</p><p>x&nbsp; &nbsp;- 80</p><p>640 = 60x</p><p>x= 1,6km</p>', '15-02-2019 10:51', 5, 2),
(51, 9, 'FIDFDF', 10, 36, '<p>Velocidade Média: 70 km/h</p><p>Horário da reunião: 10 h</p><p>Distância: 175 km </p><p><br></p><p><b>Regra de Três</b></p><p>70 km - 1 h                               175 (km)/70 (km) = 2,5                                        10 h - 2h30min =<span style=\"font-weight: bolder;\"> 7h30min </span> <=== <span style=\"font-weight: bolder;\">RESPOSTA          </span>   </p><p>175 km - ? h                             mantendo a proporção,                                 </p><p>                                 1 x 2,5 = 2,5 h ou 2h30min (duração do percurso)</p>', '15-02-2019 11:36', 5, 1),
(52, 9, 'FIDFDF', 10, 37, '<p>Velocidade Média: 900 m/s</p><p>Distância: 40 m</p><p>Tempo: ? (s)</p><p><br></p><p>Vm = dS / dT</p><p>logo,</p><p>900 (m/s) = 40 (m) / dT (s)</p><p>900 (m/s) x dT (s) = 40 (m)</p><p>dT (s) = 40 (m) / 900 (m/s)</p><p>dT (s) =<b> 0,044 (s)</b>  ===> <b>RESPOSTA</b> <b>APROXIMADA</b></p>', '15-02-2019 11:36', 5, 1),
(53, 9, 'FIDFDF', 10, 38, '<p>Primeiro, medi (com trena e régua) um trajeto pequeno dentro da minha casa, pelo qual eu percorreria.    ====> O trajeto possui<b> 130,5 (cm)</b> OU <b>1,305 (m)</b></p><p>Após isso, preparei um cronômetro para marcar o tempo que eu gastaria caminhando normalmente por esse trajeto.</p><p>Fiz a marcação, e deu <b>1,75 (s)</b></p><p><br></p><p>Partindo para os cálculos, podemos concluir que:</p><p>Vm = dS / dT</p><p>Vm = 1,305 (m) / 1,75 (s) =<b> 0,745 (m/s)</b> OU<b> 2,682 (km/h)</b> ====><b> RESPOSTA APROXIMADA</b></p>', '15-02-2019 11:36', 5, 1),
(54, 9, 'FIDFDF', 10, 39, '<p>Velocidade Média = 90 (km/h)&nbsp;</p><p>dT = 2 (s)</p><p>Vm = dS/dT</p><p><br></p><p>mantendo tempo e velocidade na mesma grandeza,</p><p>90 : 3,6 = 25 (m/s)</p><p><br></p><p>e aplicando a fórmula,</p><p>25 = dS / 2</p><p>25 x 2 = dS</p><p><b>50 (m)</b> OU <b>0,05 (km)</b> = dS&nbsp; &nbsp;=====&gt; <b>RESPOSTA</b></p><p><br></p>', '15-02-2019 11:36', 5, 1),
(55, 9, 'FIDFDF', 10, 40, '<p>Velocidade Média = 8 (km/h)</p><p>dT = 1(h) + 20(min) OU 80 (min) OU <b>aprox.</b> 1,33 (h)</p><p>Vm = dS/dT</p><p><br></p><p>aplicando a fórmula (após deixar tudo em horas),</p><p>8 (km/h) = dS (km) / 1,33 (h)</p><p>8 (km/h) x 1,33 (h) = dS (km)</p><p>dS (km) = <b>10,66 (km)</b>&nbsp; OU<b> 10.660 (m)</b> ====&gt;<b> RESPOSTA APROXIMADA</b></p><p><br></p>', '15-02-2019 11:36', 5, 1),
(56, 129, 'FIDFDF', 10, 36, '<p>Km&nbsp; &nbsp; &nbsp; &nbsp;h&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ou seja, para chegar na reunião às 10 h, a pessoa terá que sair de 7:30, já que ela levará 2.5 horas para fazer&nbsp;</p><p>70 ------ 1&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;175km.</p><p>175 ----- x</p><p>70x = 175</p><p>x = 175/70</p><p>x = 2.5 h</p>', '15-02-2019 11:43', 2, 2),
(57, 129, 'FIDFDF', 10, 37, '<p>m&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; milésimos de s.</p><p>900 --------- 1000</p><p>40 ------------ x</p><p>900x = 40000</p><p>x = 40000/900</p><p>x = 44.4... milésimos para percorrer 40 m.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>', '15-02-2019 11:43', 2, 2),
(58, 129, 'FIDFDF', 10, 38, '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Vm = ΔS/</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Δt</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Δt = variação de tempo</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">ΔS = variação de espaço</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Vm = Velocidade Média</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Se eu caminho 100 m em 20 segundos, qual será minha velocidade média?</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\">Resposta = Vm =100 m/ 20 s = 5 m/s.<br></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px; text-align: justify;\"><br></span></p>', '15-02-2019 11:43', 2, 2),
(59, 129, 'FIDFDF', 10, 39, '<p>s&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;km</p><p>3600 ---- 90</p><p>&nbsp; &nbsp;2 ------- x</p><p>3600x = 180</p><p>x = 180/3600</p><p>x = 0.05 km ou 50 m.</p>', '15-02-2019 11:43', 2, 2),
(60, 129, 'FIDFDF', 10, 40, '<p>Min.&nbsp; &nbsp; &nbsp; Km</p><p>60 ------&nbsp; 8</p><p>80 ------ x</p><p>60x = 640</p><p>x = 640/60</p><p>x = 10.6... Km</p>', '15-02-2019 11:43', 2, 2),
(61, 34, 'FIDFDF', 10, 36, '<p><font face=\"Arial\"><span style=\"font-size: 14px;\">Vm <b>= </b></span><span style=\"color: rgba(0, 0, 0, 0.87); font-size: 14px;\">ΔS<b>/</b></span></font><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Δt</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">70km<b>/</b>1h <b>= </b>175km<b>/</b><i>x</i></span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">70<i>x</i> <b>=</b> 175<b>;</b>   <i>x</i> <b>= </b>2,5 (2h30min)</span></p><p><b><i><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Respos</span><font face=\"Arial\" style=\"\"><span style=\"color: rgba(0, 0, 0, 0.87); font-size: 14px;\">ta</span><font color=\"rgba(0, 0, 0, 0.870588235294118)\" style=\"\"><span style=\"font-size: 14px;\">: Essa pessoa deve sair de casa às 07h30min, já que o percurso dura duas horas e trinta minutos, este horário é suficiente para que ela esteja na reunião às 10h.</span></font></font></i></b></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\"><br></span></p>', '15-02-2019 12:38', 6, 2),
(62, 34, 'FIDFDF', 10, 37, '<p><font face=\"Arial\" style=\"color: rgb(48, 48, 48);\">Vm <span style=\"font-weight: bolder;\">= </span><span style=\"color: rgba(0, 0, 0, 0.87);\">ΔS<span style=\"font-weight: bolder;\">/</span></span></font><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Δt</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">900m<b>/</b>1s <b>=</b> 40m<b>/</b><i>x</i></span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">900<i>x</i> <b>=</b> 40<b>;</b>   <i>x</i> <b>=</b> 0,444...</span></p><p><i><b><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Resposta</span><font color=\"rgba(0, 0, 0, 0.870588235294118)\" face=\"Arial\">: É necessário aproximadamente 0,4 segundos para o projétil balístico percorrer uma distância de 40 metros.</font></b></i></p>', '15-02-2019 12:38', 6, 2),
(63, 34, 'FIDFDF', 10, 38, '<p><b><i>Enunciado:</i></b> Digamos que eu ande 200 metros, de minha casa até o supermercado mais próximo, em 15 minutos. Durante esse percurso, em qual velocidade média me encontro?</p><p><font face=\"Arial\">Vm <span style=\"font-weight: bolder;\">= </span><span style=\"color: rgba(0, 0, 0, 0.87);\">ΔS<span style=\"font-weight: bolder;\">/</span></span></font><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Δt <b>;</b> 15min <b>=</b> 900s</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\"><span style=\"font-style: italic;\">x</span> <span style=\"font-weight: bolder;\">=</span> 200m<span style=\"font-weight: bolder;\">/</span>900s</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">200 <span style=\"font-weight: bolder;\">=</span> 900<span style=\"font-style: italic;\">x</span><span style=\"font-weight: bolder;\">;</span>   <i>x</i> <span style=\"font-weight: bolder;\">=</span> 0,222...</span></p><p><i><b><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Resposta</span><font color=\"rgba(0, 0, 0, 0.870588235294118)\" face=\"Arial\">: Eu percorro 200 metros em 15 minutos, com uma velocidade média de aproximadamente 0,2m/s.</font></b></i></p><p><i><b><font face=\"Arial\" style=\"color: rgb(0, 0, 255);\">(prof., foi só um exemplo, ok?)</font></b></i></p>', '15-02-2019 12:38', 6, 2),
(64, 34, 'FIDFDF', 10, 39, '<p><font face=\"Arial\">Vm <span style=\"font-weight: bolder;\">= </span><span style=\"color: rgba(0, 0, 0, 0.87);\">ΔS<span style=\"font-weight: bolder;\">/</span></span></font><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Δt <span style=\"font-weight: bold;\">;</span> 2s <span style=\"font-weight: bold;\">=</span> 0,0005555556h</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">90km<span style=\"font-weight: bold;\">/</span>1h <span style=\"font-weight: bolder;\">= </span>x<span style=\"font-weight: bold;\">/</span>0,0005555556h</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\"><i>x</i> <span style=\"font-weight: bolder;\">= </span>0,05</span></p><p><i><span style=\"font-weight: bolder;\"><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Resposta</span><font color=\"rgba(0, 0, 0, 0.870588235294118)\" face=\"Arial\">: O veículo percorreu 0,05km enquanto a pessoa mexia no celular.</font></span></i><br></p>', '15-02-2019 12:38', 6, 2),
(65, 34, 'FIDFDF', 10, 40, '<p><font face=\"Arial\">Vm <span style=\"font-weight: bolder;\">= </span><span style=\"color: rgba(0, 0, 0, 0.87);\">ΔS<span style=\"font-weight: bolder;\">/</span></span></font><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Δt <span style=\"font-weight: bold;\">;</span> 2s <span style=\"font-weight: bold;\">=</span> 0,0005555556h</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">8km<span style=\"font-weight: bolder;\">/</span>1h <span style=\"font-weight: bolder;\">= </span>x<span style=\"font-weight: bolder;\">/</span>1,2</span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\"><i>x</i> <span style=\"font-weight: bolder;\">= </span>9,6</span></p><p><i><span style=\"font-weight: bolder;\"><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Arial;\">Resposta</span><font color=\"rgba(0, 0, 0, 0.870588235294118)\" face=\"Arial\">: O corredor percorre 9,6 km em 1h</font></span></i><span style=\"color: rgb(160, 0, 41); font-family: Arial; font-style: italic; font-weight: 700;\">:20min.</span></p>', '15-02-2019 12:38', 6, 2);

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
(1, 'site_title', 'Koala Educational (Alpha Test)'),
(2, 'site_author', 'Emerson Bruno e Tiago Coutinho'),
(3, 'site_version', 'a.0.2.01'),
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
(107, 107, 'Leonisia', 'Gabriela', 'leonisiag@gmail.com', '20191011010079'),
(108, 108, 'Victor', 'Medeiros', 'Victormed15@yahoo.com', '20181011110002'),
(109, 109, 'Matheus', 'Marcos', 'matheus.marcos.75000@gmail.com', '20191011010027'),
(110, 110, 'Lanay', 'Fernandes', 'lanay.fernandes@hotmail.com', '20181011110009'),
(111, 111, 'Leonardo', 'Silva', 'leonardodasilva.ifrn@gmail.com', '20181011110035'),
(112, 112, 'Pedro', 'Paulo', 'pedropaulolucas@hotmail.com', '20181011110011'),
(113, 113, 'Luca', 'Dantas', 'luca100sdantas2@gmail.com', '20181011110003'),
(114, 114, 'Thiago', 'Xavier', 'Thiago_xavier.2002@hotmail.com', '20181011110017'),
(115, 115, 'luiza', 'rodrigues', 'luizadmr12@gmail.com', '20191011010010'),
(116, 116, 'Victor Miguel', 'Gaspar de Oliveira', 'vm81564@gmail.com', '20181011110014'),
(117, 117, 'Felipe', 'Fausto', 'fellipe.fausto10@gmail.com', '20181011110026'),
(118, 118, 'Matheus', 'Albert', 'MatheusAL2018@outlook.com', '20181011110012'),
(119, 119, 'Joel', 'Victor', 'jnull.rx@gmail.com', '20181011110021'),
(120, 120, 'Christian', 'Cauã', 'christia10k@hotmail.com', '20181011110037'),
(121, 121, 'Gabriel', 'Costa Lima Dantas', 'gabrielcostalima21@gmail.com', '20181011110032'),
(122, 122, 'Maria Luiza', 'de Oliveira Cruz', 'marialuizaoliveiracruz@gmail.com', '20181011110030'),
(123, 123, 'Gilton', 'Junior', 'giltonjr2003@gmail.com', '20191011110039'),
(124, 124, 'João Victor', 'Saraiva', 'joaovictors2010@gmail.com', '20181011110008'),
(125, 125, 'Camily', 'Meireles', 'Camilykpmeireles@gmail.com', '201810111110023'),
(126, 126, 'Laura', 'Louise', 'lauralouise338@gmail.com', '20181011110001'),
(127, 127, 'Arthur', 'Melo', 'meloarthurmelo@gmail.com', '20181011110022'),
(128, 128, 'Rafael', 'Ribeiro', 'rafaellima52468@gmail.com', '20191011110027'),
(129, 129, 'Aristóteles', 'Daniel', 'aris4455@hotmail.com', '20191011110005'),
(130, 130, 'Wagner', 'Gomes', 'owleg250@hotmail.com', '20191011110023'),
(131, 131, 'Pedro', 'Henrique', 'pedrinhoresident4@hotmail.com', '20191011110019'),
(132, 132, 'Lucas', 'Dantas', 'lucaspatriota@outlook.com', '20191011110029'),
(133, 133, 'Joel', 'Cortez', 'joelcortez041@outlook.com', '20191011110034'),
(134, 134, 'Marcos', 'Vinicius', 'vinimaiasilva@gmail.com', '20191011110026'),
(135, 135, 'alexsander', 'anulino', 'alEX@hotmail.com', '20191011110012'),
(136, 136, 'Pablo', 'Marreiro da Silva', 'pablomarreiro@gmail.com', '20171011110025'),
(137, 137, 'Ana Carolina', 'Louredo', 'alouredo101@gmail.com', '20191011110001'),
(138, 138, 'Joanderson', 'Santos', 'j11gud@elsa.com', '20191011110007'),
(139, 139, 'Gabriel', 'Guilherme', 'gabrielguilherme13@hotmail.com', '20191011110011'),
(140, 140, 'Gabriel', 'Pereira', 'gabrielcp4@outlook.com', '20191011110031'),
(141, 141, 'Jhonata', 'Freitas', 'jhonatafreitassantos@hotmail.com', '20191011110035');

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
(7, 'Oscilações 01', 1, 2, 'FI67BA'),
(10, 'Atividade 01', 1, 2, 'FIDFDF');

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
(2, 'FIDFDF', '<p style=\"margin-left: 25px;\">                      <p></p><span style=\"font-weight: bolder;\">IMPORTANTE:</span><br>A aula de hoje (14/02) será no laboratório de informática da DIAC.&nbsp;<br></p><hr><p><b>DIÁRIO DE CLASSE</b><br><hr><p></p><p><b>11/02</b> - Aula inicial. Apresentamos a metodologia a ser utilizada e os recursos tecnológicos educacionais. Conteúdo: conceitos de posição, definição de movimento e repouso, conceito de velocidade, introdução ao estudo do conceito de referencial.</p><p>-&gt;<span style=\"font-weight: bold;\"> <i>Para casa</i></span>: ler as aulas 01 e 02 do site e resolver a lista 0101.</p><p><br></p>                        \r\n                      </p>', '14-02-2019 15:11'),
(3, 'FIED32', 'Bom dia Crianças!<div>Todos que solicitaram registro de cadastro tiveram os seus registros efetivados. Os demais podem e devem fazer isso ainda esta semana.&nbsp;</div>', '13-02-2019 12:27'),
(4, 'FID14E', '<ul><li><b>Diário de Classe</b></li></ul><hr><div>14/02 - Laboratório de Oscilações e Ondas</div><div style=\"margin-left: 25px;\">O primeiro grupo é o mesmo da aula anterior, é ficará até 11h:30 min. O restante da turma terá aula a partir desse horário.&nbsp;</div><div style=\"margin-left: 25px;\"><br></div><div>11/02 - Laboratório de Oscilações e Ondas</div><div><br></div><div><br></div>', '13-02-2019 20:31');

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
(23, 26, 'FID14E', '12-02-2019 13:06', 1),
(24, 27, 'FID14E', '12-02-2019 15:17', 1),
(25, 28, 'FID14E', '12-02-2019 15:42', 1),
(26, 29, 'FID14E', '12-02-2019 15:43', 1),
(27, 30, 'FIDFDF', '12-02-2019 16:25', 1),
(28, 31, 'FID14E', '12-02-2019 17:57', 1),
(29, 32, 'FID14E', '12-02-2019 19:26', 1),
(30, 33, 'FID14E', '12-02-2019 20:09', 1),
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
(104, 107, 'fi3476', '13-02-2019 14:43', 1),
(105, 108, 'FID14E', '13-02-2019 15:33', 1),
(106, 109, 'FIED32', '13-02-2019 15:47', 0),
(107, 110, 'FID14E', '13-02-2019 15:50', 1),
(108, 111, 'FID14E', '13-02-2019 17:22', 1),
(109, 112, 'FID14E', '13-02-2019 18:17', 1),
(110, 113, 'FID14E', '13-02-2019 18:35', 1),
(111, 114, 'FID14E', '13-02-2019 19:18', 1),
(112, 115, 'fied32', '13-02-2019 19:27', 0),
(113, 116, 'FID14E', '13-02-2019 20:05', 1),
(114, 117, 'FID14E', '13-02-2019 20:06', 1),
(115, 118, 'FID14E', '13-02-2019 20:08', 1),
(116, 119, 'FID14E', '13-02-2019 20:15', 1),
(117, 120, 'FID14E', '13-02-2019 20:19', 1),
(118, 121, 'FID14E', '13-02-2019 20:41', 1),
(119, 122, 'FID14E', '13-02-2019 21:43', 1),
(120, 123, 'FID14E', '13-02-2019 21:46', 1),
(121, 124, 'FID14E', '13-02-2019 21:53', 1),
(122, 125, 'FID14E', '13-02-2019 23:04', 1),
(123, 126, 'FID14E', '14-02-2019 10:51', 1),
(124, 127, 'FID14E', '14-02-2019 15:01', 1),
(125, 128, 'FIDFDF', '14-02-2019 15:37', 1),
(126, 129, 'FIDFDF', '14-02-2019 17:51', 1),
(127, 130, 'FIDFDF', '14-02-2019 17:51', 1),
(128, 131, 'FIDFDF', '14-02-2019 17:52', 1),
(129, 132, 'fidfdf', '14-02-2019 17:55', 1),
(130, 133, 'FIDFDF', '14-02-2019 17:56', 1),
(131, 134, 'FIDFDF', '14-02-2019 17:57', 1),
(132, 135, 'FIDFDF', '14-02-2019 18:01', 1),
(133, 136, 'FIDFDF', '14-02-2019 18:38', 1),
(134, 137, 'fidfdf', '14-02-2019 21:29', 1),
(135, 138, 'FIDFDF', '15-02-2019 11:20', 1),
(136, 139, 'FIDFDF', '15-02-2019 14:44', 1),
(137, 140, 'FIDFDF', '15-02-2019 14:46', 1),
(138, 141, 'FIDFDF', '15-02-2019 14:50', 1);

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
(4, 7, 8, 'b'),
(5, 10, 9, 'a'),
(6, 10, 10, 'b'),
(7, 10, 12, 'b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subjects`
--

CREATE TABLE `tb_subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_nome` varchar(255) NOT NULL,
  `sub_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_subjects`
--

INSERT INTO `tb_subjects` (`sub_id`, `sub_nome`, `sub_description`) VALUES
(1, 'Física', 'Matéria de Física'),
(3, 'Loona', 'KPOPISTICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_teacher_subject`
--

CREATE TABLE `tb_teacher_subject` (
  `tea_id` int(11) NOT NULL,
  `tea_usu_id` int(11) NOT NULL,
  `tea_sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_teacher_subject`
--

INSERT INTO `tb_teacher_subject` (`tea_id`, `tea_usu_id`, `tea_sub_id`) VALUES
(1, 2, 1),
(2, 25, 1),
(3, 7, 3);

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
(107, 'leonisia', '$2a$08$f7c7be1f0d3b50fe59d3euY9pxFUWrIKS85xYnN5hLHOPUuLgYkK2', 'f7c7be1f0d3b50fe59d3e9', 1),
(108, 'victormed15', '$2a$08$bca241ebdda65bd694707uP6FkTQoqBNkXb0T59Q.8ov9O/IVPCRK', 'bca241ebdda65bd6947078', 1),
(109, '20191011010027', '$2a$08$a2ce510a13b82d3269da0u1iEal5kLdI7fAypi3nhFHhUEkdQYvTm', 'a2ce510a13b82d3269da06', 1),
(110, 'pequenalua', '$2a$08$f940475dca8577442389eurQI1nnVj5wUf/2Gk5m98fYccFNQT0eW', 'f940475dca8577442389e4', 1),
(111, 'leonardo', '$2a$08$fe5c6a8540af5c331b63fu4qcsBe8IE0jgcP3cXihply/7w0kzVMq', 'fe5c6a8540af5c331b63f4', 1),
(112, 'pedropl', '$2a$08$fb3559deabfaa90391276OpeAnQU4Z9zIkmXSoCJ.xS1nEOYUnCsC', 'fb3559deabfaa90391276b', 1),
(113, 'lucadantas', '$2a$08$fef24d10334d9363c416eeiuQ.q0RIVGWr6ARE80OAdSKYS3c2E0e', 'fef24d10334d9363c416ef', 1),
(114, 'thiago', '$2a$08$de4a1b5d8376689834f2cOnJ8QijTP2S7W3Y.AuYQsviXiF.XcgIC', 'de4a1b5d8376689834f2cb', 1),
(115, '20191011010010', '$2a$08$8ce1d5d790718415aca0cujODaFG0szmhf0lbw8rM3jjONZ4/88hG', '8ce1d5d790718415aca0c2', 1),
(116, 'victormiguel', '$2a$08$a2488966d9e5798ef5d5cuKwSbCeEYqVwIWvJYNpPZ39OIjjBl73y', 'a2488966d9e5798ef5d5c5', 1),
(117, 'felipefausto', '$2a$08$0c382989314644770b5ddubqIh0QuKXbcO9Vwk8Ej6ebmPXc8Idee', '0c382989314644770b5dd2', 1),
(118, 'albert', '$2a$08$161bf5cc9cfac991aaf34ubiZcfeBpi3lrtdbmJ81ghmXfuAXFAUK', '161bf5cc9cfac991aaf347', 1),
(119, '20181011110021', '$2a$08$55d273a961dfc80ff14eaeNnVUHT4FjT3PB16/KPIRAcCjZE08raq', '55d273a961dfc80ff14eaf', 1),
(120, 'christian', '$2a$08$b5d7492f908c8af77bec6uuGiMMNnrkr/Gw82S/3nKJFtOsMa78Wm', 'b5d7492f908c8af77bec67', 1),
(121, 'gcld10', '$2a$08$d23476a66a1ef50621fb4OZl6sJW2GtMOcu7u1Lxmlpci9/DDaW/m', 'd23476a66a1ef50621fb4c', 1),
(122, 'marialuizacruz', '$2a$08$f148013d48eeef470b477uDnd14TwgHI/2/rHYPo8zZn1nQiJuzPO', 'f148013d48eeef470b4774', 1),
(123, 'giltinjr', '$2a$08$a29e20d78c01d70a0763aeggZHSrwsLttjgno6ibcrsQ1PeHUdC5C', 'a29e20d78c01d70a0763af', 1),
(124, 'joaov', '$2a$08$7fa65b7869dc064bc53f0ue7UXzfkAwKDw/SaCDTrEBYcd9mIivBq', '7fa65b7869dc064bc53f03', 1),
(125, 'camilykirlly', '$2a$08$c940c4851cdccf9b7e15cu0HlcvOsr4dzRwgmbQW8RZjtAW.IHlAS', 'c940c4851cdccf9b7e15c0', 1),
(126, 'lauralouise', '$2a$08$b0473c9af128c8ec46f65u1AQXNLUvY27p7sxfGTWS/HCanPpZRVO', 'b0473c9af128c8ec46f653', 1),
(127, 'arthurmelo777', '$2a$08$f9a880c5d04f2c64401a9ufZHPAyrvZzo7iqu6r8dQIaR9RkPXeDS', 'f9a880c5d04f2c64401a96', 1),
(128, 'rafael52468', '$2a$08$8c48163971400983eb72fusU/xEI.nGC.3eCOgcFXF9vrh.fB/6Lm', '8c48163971400983eb72f6', 1),
(129, 'aris402', '$2a$08$e2d62818011578c539622uk.hH44S8Sstem37fZCsUwP9kyj4Dzt6', 'e2d62818011578c5396226', 1),
(130, 'seteee', '$2a$08$7624da72e3e1633f1b789eX3wvYR77KNmnP5IbHo933AhFupA/kMa', '7624da72e3e1633f1b789f', 1),
(131, 'pedrocosta', '$2a$08$a582de4635c9dfa91f5a3Oj7WHLV9jaO4vUJxLbCuFjLv//wRkBcm', 'a582de4635c9dfa91f5a3d', 1),
(132, 'thecornogod', '$2a$08$ba50e05c9dbdab86e2159uQjh8l5zvlFHR1YjsBpvu.paw4E1FAV.', 'ba50e05c9dbdab86e21592', 1),
(133, 'joelcortez', '$2a$08$a41d47d805aab10a2ff69OYqFURdr0r87gBuFK6v9iApz8cMjHR/i', 'a41d47d805aab10a2ff69a', 1),
(134, 'fullcup', '$2a$08$264ffd2888511f7fb65c7u2aejG/0WMAlU5CuH8X2hpQwnBuRnV4u', '264ffd2888511f7fb65c70', 1),
(135, 'alexsandercosta', '$2a$08$9e2b59ac1a7f95246f0b7OuJPBvmMKivW0Z5FnkHTPQs.7MxmifbO', '9e2b59ac1a7f95246f0b7a', 1),
(136, 'pablows', '$2a$08$89638b0a081c39c7b3368elSvruBOGELdWsBO48RtYT8BxVDbDwje', '89638b0a081c39c7b3368f', 1),
(137, 'carolis', '$2a$08$11d58a2f95bfecc130acaeGgx8M6iXfVgM4wB20xfP8q7MDwGspc6', '11d58a2f95bfecc130acaf', 1),
(138, 'j11gud', '$2a$08$eddeae93f5ecbd4e21779uPY6yyg9zUqjMbZijyXtcpFY60Tr332S', 'eddeae93f5ecbd4e217795', 1),
(139, 'gabrielgui1313', '$2a$08$ada48af617258c29c338fuTiz/IFyda6qAl80Upn7hK1WGjNJcxGu', 'ada48af617258c29c338f8', 1),
(140, 'gabrielcp4', '$2a$08$ba35afbfe836a409dd80bu3bqXEfzqj1tywa9xWXh1WY2QSwsEOdO', 'ba35afbfe836a409dd80b3', 1),
(141, 'jhonatinhas', '$2a$08$6a871c2a83deeef5b7821uhy3E31/6OF3J2BTcaGwj6BW8iLOiC/W', '6a871c2a83deeef5b78210', 1);

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
-- Indexes for table `tb_teacher_subject`
--
ALTER TABLE `tb_teacher_subject`
  ADD PRIMARY KEY (`tea_id`);

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
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_answers`
--
ALTER TABLE `tb_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tb_lists`
--
ALTER TABLE `tb_lists`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_notify_class`
--
ALTER TABLE `tb_notify_class`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_register_class`
--
ALTER TABLE `tb_register_class`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_teacher_subject`
--
ALTER TABLE `tb_teacher_subject`
  MODIFY `tea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
