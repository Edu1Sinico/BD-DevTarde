--ATIVIDADE COMPLEMENTAR SQL JOINS

-- CREATE TABLE E DATABASE
CREATE DATABASE AT5;

CREATE TABLE TabelaEX(
    NOME varchar (100) null
);

CREATE TABLE TabelaFX(
    NOME varchar (100) null
);

-- INSERIR DADOS

INSERT INTO TabelaEX VALUES ('Claudia');
INSERT INTO TabelaEX VALUES ('Cadu');
INSERT INTO TabelaEX VALUES ('Bruno');
INSERT INTO TabelaEX VALUES ('Lucineia');
INSERT INTO TabelaEX VALUES ('Augusto');

SELECT * FROM TabelaEX;

INSERT INTO TabelaFX VALUES ('Amarildo');
INSERT INTO TabelaFX VALUES ('Alvaro');
INSERT INTO TabelaFX VALUES ('Bruno');
INSERT INTO TabelaFX VALUES ('Damares');
INSERT INTO TabelaFX VALUES ('Augusto');

SELECT * FROM TabelaFX;

-- INNER JOIN

SELECT ex.nome, fx.nome
FROM TabelaEX AS ex
INNER JOIN TabelaFX AS fx
ON ex.nome = fx.nome;

-- Pega as informações da esquerda com o Inner Join
SELECT ex.nome, fx.nome
FROM TabelaEX AS ex
LEFT JOIN TabelaFX AS fx
ON ex.nome = fx.nome;

-- Pega as informações da direita com o Inner Join
SELECT ex.nome, fx.nome
FROM TabelaEX AS ex
RIGHT JOIN TabelaFX AS fx
ON ex.nome = fx.nome;

-- Pega as informações da esquerda com o Inner Join com uma condição de verificar se é null
SELECT ex.nome, fx.nome
FROM TabelaEX AS ex
LEFT JOIN TabelaFX AS fx
ON ex.nome = fx.nome
WHERE FX.NOME IS NULL;

-- Pega as informações da direita com o Inner Join com uma condição de verificar se é null
SELECT ex.nome, fx.nome
FROM TabelaEX AS ex
RIGHT JOIN TabelaFX AS fx
ON ex.nome = fx.nome
WHERE FX.NOME IS NULL;