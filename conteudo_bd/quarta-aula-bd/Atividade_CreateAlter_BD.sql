-- 08/03/2024 - Banco de Dados
-- 1. Criação de Banco de Dados e Tabelas

CREATE TABLE Fornecedor (
	FCodigo int not null primary key,
	Fnome varchar(100) not null,
	Status varchar(10) default 'Ativo',
	Cidade varchar (50)
);

CREATE TABLE Peca (
	PCodigo int not null primary key,
	Pnome varchar(100) not null,
	Cor varchar(15),
	Peso float not null,
	Cidade varchar(50) not null
);

CREATE TABLE Instituicao(
	ICodigo int not null primary key,
	nome varchar(50) not null
);

CREATE TABLE Projeto (
	PRcodigo int not null primary key,
	PRnome varchar(100) not null,
	Cidade varchar(50) not null,
	ICodigo int not null,
	FOREIGN KEY (ICodigo) REFERENCES Instituicao
);

CREATE TABLE Fornecimento (
	Fcodigo int not null,
	FOREIGN KEY (Fcodigo) REFERENCES Fornecedor,
	PCodigo int not null,
	FOREIGN KEY (PCodigo) REFERENCES Peca,
	PRcodigo int not null,
	FOREIGN KEY (PRcodigo) REFERENCES Projeto,
	Quantidade int not null
);

----------------------------------------------------------------------------

-- 2. Alterações no esquema das tabelas

-- Tabela fornecedor
ALTER TABLE Fornecedor ADD Fone VARCHAR(11);
ALTER TABLE Fornecedor DROP Cidade;
ALTER TABlE Fornecedor RENAME COLUMN FCodigo TO Fcod;
ALTER TABLE Fornecedor ADD CCod INT NOT NULL;
ALTER TABLE Fornecedor ADD FOREIGN KEY (CCod) REFERENCES Cidade;

-- Inserindo dados na tabela fornecedor
INSERT INTO Fornecedor VALUES (1, 'Kalunga', 'ATIVO', 1930234066, 11);
INSERT INTO Fornecedor VALUES (2, 'LLC Logística', 'INATIVO', 1130245578, 12);
INSERT INTO Fornecedor VALUES (3, 'Velho Barreiro', 'ATIVO', 1930324068, 13);
INSERT INTO Fornecedor VALUES (4, 'Hyundai', 'ATIVO', 1930234545, 14);

TRUNCATE TABLE Fornecedor CASCADE;

-- Remoção de dados da tabela Fornecedor
DELETE FROM Fornecedor WHERE status = 'INATIVO';

select * from Fornecedor;

CREATE INDEX cod_fornecedor ON Fornecedor(fcod);

-- Tabela Cidade
ALTER TABLE Instituicao RENAME TO Cidade;
ALTER TABLE Cidade RENAME COLUMN icodigo to CCod;
ALTER TABLE Cidade RENAME COLUMN nome to Cnome;
ALTER TABLE Cidade ADD UF CHAR(2);

-- Inserindo dados na tabela cidade
INSERT INTO Cidade VALUES (11, 'Limeira', 'SP');
INSERT INTO Cidade VALUES (12, 'São Paulo', 'SP');
INSERT INTO Cidade VALUES (13, 'Rio Claro', 'SP');
INSERT INTO Cidade VALUES (14, 'Piracicaba', 'SP');
INSERT INTO Cidade VALUES (15, 'Ribeirão Preto', 'SP');
INSERT INTO Cidade VALUES (16, 'Jundiai', 'SP');

select * from Cidade;

CREATE INDEX cod_cidade ON Cidade(ccod);

-- Tabela Peça
ALTER TABlE peca RENAME COLUMN PCodigo TO Pcod;
ALTER TABLE peca DROP Cidade;
ALTER TABLE peca ADD CCod INT NOT NULL;
ALTER TABLE peca ADD FOREIGN KEY (CCod) REFERENCES Cidade (CCod);

-- Inserindo dados na tabela peça
INSERT INTO peca VALUES (1, 'Processador', 'Padrão', 300, 13);
INSERT INTO peca VALUES (2, 'Lona', 'Azul', 12, 11);
INSERT INTO peca VALUES (3, 'Cachaça', 'Transparente', 11, 15);
INSERT INTO peca VALUES (4, 'Hyndai Creta', 'Preto', 10000, 14);

UPDATE Peca SET peso = 400 Where pnome = 'Lona';

select * from Peca;

CREATE INDEX cod_produto ON Peca(pcod);

-- Tabela Projeto
ALTER TABLE Projeto DROP Cidade;
ALTER TABLE Projeto DROP ICodigo;
ALTER TABLE Projeto ADD CCod INT NOT NULL;
ALTER TABLE Projeto ADD FOREIGN KEY(CCod) REFERENCES Cidade (CCod);

-- Inserindo dados na tabela projetos
INSERT INTO Projeto VALUES (1, 'Eletrônicos', 11);
INSERT INTO Projeto VALUES (2, 'Mecânicos', 13);
INSERT INTO Projeto VALUES (3, 'Escolas', 12); 

select * from Projeto;

CREATE INDEX cod_projeto ON Projeto(prcodigo);

-- Tabela Fornecimento
ALTER TABLE Fornecimento RENAME COLUMN Fcodigo TO Fcod;
ALTER TABLE Fornecimento RENAME COLUMN PCodigo TO Pcod;
ALTER TABLE Fornecimento RENAME COLUMN PRcodigo TO PRcod;

-- Inserindo dados na tabela Fornecimento
INSERT INTO Fornecimento VALUES (01, 0001, 01, 660);
INSERT INTO Fornecimento VALUES (02, 0002, 03, 10);
INSERT INTO Fornecimento VALUES (04, 0004, 02, 220);

select * from Fornecimento;

DROP TABLE FORNECIMENTO;
DROP TABLE PECA; 
DROP TABLE FORNECEDOR;
DROP TABLE PROJETO;
DROP TABLE CIDADE;
DROP TABLE INSTITUICAO;