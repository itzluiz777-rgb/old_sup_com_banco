CREATE DATABASE old_sup;
USE old_sup;

-- Início da transação (opcional, pois DDL em MySQL geralmente faz commit automático)
-- BEGIN;

-- Tabela cliente
 CREATE TABLE CLIENTE(
  NOME      VARCHAR(100)      NOT NULL,
  CPF      CHAR(11)         NOT NULL PRIMARY KEY,
  ENDERECO     VARCHAR(50),
 LOGIN VARCHAR(100),
 SENHA CHAR(255)
 );

-- Tabela PRODUTO
CREATE TABLE PRODUTO (
  NOME_PRO     VARCHAR(50)     NOT NULL  PRIMARY KEY,
  PRECO       DECIMAL(10,2)       NOT NULL
);
CREATE TABLE CARRINHO (
    CPF CHAR(11) NOT NULL,
	NOME_PRO INT NOT NULL,
    QUANTIDADE INT NOT NULL,

    FOREIGN KEY (CPF) REFERENCES CLIENTE(CPF),
    FOREIGN KEY (NOME_PRO) REFERENCES PRODUTO(ID_PRODUTO)
);

insert into PRODUTO(NOME_PRO,PRECO)VALUES
('Creatina max Titanium 250g', 55.01),
('Pre-treino insanity 300g', 84.20),
('isolate Protein Dark lab 1,8kg', 150.33),
('Whey 100% black Skull 900g', 90.00),
('Creamass 3kg integralmedica', 135.00),
('Whey Protein Dux 900g', 186.00),
('Tasty whey 900g', 262.25),
('Pre-treino Black Skull 900g', 80.20),
('Creatina Max Titanium 300g', 50.20),
('Creatina integralmedica 100g', 40.00),
('100% whey Dark lab 900g', 160.00),
('whey Growth lab 1kg', 136.00),
('mass titanium 1,4kg', 69.00),
('Creatina Creapure Dux', 200.00);)CREATE DATABASE old_sup;
USE old_sup;

-- Início da transação (opcional, pois DDL em MySQL geralmente faz commit automático)
-- BEGIN;

-- Tabela cliente
 CREATE TABLE CLIENTE(
  NOME      VARCHAR(100)      NOT NULL,
  CPF      CHAR(11)         NOT NULL PRIMARY KEY,
  ENDERECO     VARCHAR(50),
 LOGIN VARCHAR(100),
 SENHA CHAR(255)
 );

-- Tabela PRODUTO
CREATE TABLE PRODUTO (
  NOME_PRO     VARCHAR(50)     NOT NULL  PRIMARY KEY,
  PRECO       DECIMAL(10,2)       NOT NULL
)
CREATE TABLE CARRINHO (
    CPF CHAR(11) NOT NULL,
	NOME_PRO INT NOT NULL,
    QUANTIDADE INT NOT NULL,

    FOREIGN KEY (CPF) REFERENCES CLIENTE(CPF),
    FOREIGN KEY (NOME_PRO) REFERENCES PRODUTO(ID_PRODUTO)
);

insert into PRODUTO(NOME_PRO,PRECO)VALUES
('Creatina max Titanium 250g', 55.01),
('Pre-treino insanity 300g', 84.20),
('isolate Protein Dark lab 1,8kg', 150.33),
('Whey 100% black Skull 900g', 90.00),
('Creamass 3kg integralmedica', 135.00),
('Whey Protein Dux 900g', 186.00),
('Tasty whey 900g', 262.25),
('Pre-treino Black Skull 900g', 80.20),
('Creatina Max Titanium 300g', 50.20),
('Creatina integralmedica 100g', 40.00),
('100% whey Dark lab 900g', 160.00),
('whey Growth lab 1kg', 136.00),
('mass titanium 1,4kg', 69.00),
('Creatina Creapure Dux', 200.00);)



