--Criando o Banco
CREATE DATABASE `curso_pdo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

--Tabela Contas
CREATE TABLE curso_pdo.contas (
    id INT auto_increment NOT NULL PRIMARY KEY,
	nome varchar(100) NOT NULL,
	saldo DOUBLE NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


--Inserts para iniciar
INSERT INTO curso_pdo.contas
(nome, saldo)
VALUES('Marco', 10.00);

INSERT INTO curso_pdo.contas
(nome, saldo)
VALUES('Pedro', 20.00);

INSERT INTO curso_pdo.contas
(nome, saldo)
VALUES('João', 20.50);