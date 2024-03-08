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

select * from Fornecedor;

CREATE INDEX cod_fornecedor ON Fornecedor(fcod);

-- Tabela Cidade
ALTER TABLE Instituicao RENAME TO Cidade;
ALTER TABLE Cidade RENAME COLUMN icodigo to CCod;
ALTER TABLE Cidade RENAME COLUMN nome to Cnome;
ALTER TABLE Cidade ADD UF CHAR(2);

select * from Cidade;

CREATE INDEX cod_cidade ON Cidade(ccod);

-- Tabela Peça
ALTER TABlE peca RENAME COLUMN PCodigo TO Pcod;
ALTER TABLE peca DROP Cidade;
ALTER TABLE peca ADD CCod INT NOT NULL;
ALTER TABLE peca ADD FOREIGN KEY (CCod) REFERENCES Cidade (CCod);

select * from Peca;

CREATE INDEX cod_produto ON Peca(pcod);

-- Tabela Projeto
ALTER TABLE Projeto DROP Cidade;
ALTER TABLE Projeto DROP ICodigo;
ALTER TABLE Projeto ADD CCod INT NOT NULL;
ALTER TABLE Projeto ADD FOREIGN KEY(CCod) REFERENCES Cidade (CCod);

select * from Projeto;

CREATE INDEX cod_projeto ON Projeto(prcodigo);

-- Tabela Fornecimento
ALTER TABLE Fornecimento RENAME COLUMN Fcodigo TO Fcod;
ALTER TABLE Fornecimento RENAME COLUMN PCodigo TO Pcod;
ALTER TABLE Fornecimento RENAME COLUMN PRcodigo TO PRcod;

select * from Fornecimento;

DROP TABLE FORNECIMENTO;
DROP TABLE PECA; 
DROP TABLE FORNECEDOR;
DROP TABLE PROJETO;
DROP TABLE CIDADE;
DRoP TABLE INSTITUICAO;