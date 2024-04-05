
CREATE TABLE Pedido (
Data Date,
numero serial PRIMARY KEY,
total Varchar(20),
RG char(14)
);

CREATE TABLE Funcionário (
ID_funcionarios serial PRIMARY KEY,
Sexo_funcionario char(1),
Nome_funcionario Varchar(100),
Turno_funcionario varchar(20),
Cargo_funcionario varchar(100)
);

CREATE TABLE Cliente (
RG char(14) PRIMARY KEY,
Endereco Varchar(255),
Nome Varchar(100),
Telefone Varchar(150)
);

CREATE TABLE Produto (
nome varchar(30),
preco money,
Tamanho_pizza char(1),
codigo int PRIMARY KEY,
estoque int
);

CREATE TABLE Atender (
numero serial,
ID_funcionarios serial,
FOREIGN KEY(numero) REFERENCES Pedido (numero),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE Faz (
codigo int,
ID_funcionarios serial,
FOREIGN KEY(codigo) REFERENCES Produto (codigo),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE contem (
quantidade int not null,
codigo int,
numero serial,
FOREIGN KEY(codigo) REFERENCES Produto (codigo)/*falha: chave estrangeira*/
);

ALTER TABLE Pedido ADD FOREIGN KEY(RG) REFERENCES Cliente (RG);
