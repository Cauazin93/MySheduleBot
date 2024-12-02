-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2024 às 21:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `tipo_consulta` varchar(40) NOT NULL,
  `medico_da_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `tipo_consulta`, `medico_da_area`) VALUES
(1, 'Exame de Cavidade Oral', 1),
(2, 'Limpeza Dentária', 2),
(3, 'Restauração Dentária', 3),
(4, 'Implante Dentário', 4),
(5, 'Ortodontia', 5),
(6, 'Tratamento de Canal', 6),
(7, 'Cirurgia Oral', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta_cadastrada`
--

CREATE TABLE `consulta_cadastrada` (
  `id_consulta` int(11) NOT NULL,
  `paciente` int(11) DEFAULT NULL,
  `tipo_consulta` int(11) DEFAULT NULL,
  `datas` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `datas`
--

CREATE TABLE `datas` (
  `id_data` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id_login`, `usuario`, `senha`) VALUES
(1, 'admin', '1234'),
(2, 'Jhow', 'corintia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id_medico`, `nome`, `CPF`, `telefone`, `email`) VALUES
(1, 'Cássio Ramos', '123.456.789-00', '(11)91234-5678', 'cassio.ramos@email.com'),
(2, 'Fagner Ribeiro', '234.567.890-11', '(21)92345-6789', 'fagner.ribeiro@email.com'),
(3, 'Gilberto Oliveira', '345.678.901-22', '(31)93456-7890', 'gilberto.oliveira@email.com'),
(4, 'Jô Alves', '456.789.012-33', '(41)94567-8901', 'jo.alves@email.com'),
(5, 'Willian Borges', '567.890.123-44', '(51)95678-9012', 'willian.borges@email.com'),
(6, 'Renato Augusto', '678.901.234-55', '(61)96789-0123', 'renato.augusto@email.com'),
(7, 'Róger Guedes', '789.012.345-66', '(71)97890-1234', 'roger.guedes@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Idade` int(11) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `sexo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `Nome`, `Idade`, `CPF`, `telefone`, `sexo`) VALUES
(1, 'Jhow Jhow', 0, '334.345.131-23', '(18)22313-2313', 1),
(2, 'Cauã', 19, '154.325.131-23', '(18)98784-1341', 1),
(3, 'Cauã Reginato', 19, '439.234.242-43', '(18)99342-4324', 1),
(4, 'Feluipoe', 23, '123.232.423-24', '(14)32142-1341', 7),
(5, 'giovanna', 19, '154.325.131-13', '(18)22313-2313', 7),
(6, 'Leo', 18, '238.424.242-32', '(14)32414-1322', 5),
(7, 'Leo', 18, '238.424.242-32', '(14)32414-1322', 5),
(8, 'Jhow Jhow', 23, '238.424.242-32', '(18)98784-1332', 5),
(9, 'Batistuta', 12, '390.324.243-23', '(18)22313-2331', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sexo`
--

CREATE TABLE `sexo` (
  `Id_sexo` int(11) NOT NULL,
  `Nome_sexo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sexo`
--

INSERT INTO `sexo` (`Id_sexo`, `Nome_sexo`) VALUES
(5, 'Agênero'),
(6, 'Andrógino'),
(7, 'Bigênero'),
(8, 'Demigênero'),
(2, 'Feminino'),
(4, 'Gênero Fluido'),
(13, 'Gênero Neutro'),
(11, 'Homem Trans'),
(10, 'Intersexo'),
(1, 'Masculino'),
(12, 'Mulher Trans'),
(3, 'Não-binário'),
(15, 'Outro'),
(9, 'Pangênero'),
(14, 'Questionando');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `medico_da_area` (`medico_da_area`);

--
-- Índices de tabela `consulta_cadastrada`
--
ALTER TABLE `consulta_cadastrada`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `paciente` (`paciente`),
  ADD KEY `tipo_consulta` (`tipo_consulta`),
  ADD KEY `datas` (`datas`);

--
-- Índices de tabela `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id_data`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `senha` (`senha`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `sexo` (`sexo`);

--
-- Índices de tabela `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`Id_sexo`),
  ADD UNIQUE KEY `Nome_sexo` (`Nome_sexo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `consulta_cadastrada`
--
ALTER TABLE `consulta_cadastrada`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `datas`
--
ALTER TABLE `datas`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sexo`
--
ALTER TABLE `sexo`
  MODIFY `Id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`medico_da_area`) REFERENCES `medico` (`id_medico`);

--
-- Restrições para tabelas `consulta_cadastrada`
--
ALTER TABLE `consulta_cadastrada`
  ADD CONSTRAINT `consulta_cadastrada_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `consulta_cadastrada_ibfk_2` FOREIGN KEY (`tipo_consulta`) REFERENCES `consultas` (`id_consulta`),
  ADD CONSTRAINT `consulta_cadastrada_ibfk_3` FOREIGN KEY (`datas`) REFERENCES `datas` (`id_data`);

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`Id_sexo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
