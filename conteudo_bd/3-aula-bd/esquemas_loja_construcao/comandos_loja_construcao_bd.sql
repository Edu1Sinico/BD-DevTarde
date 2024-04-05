-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cliente (
Pagamento_cliente Varchar(150),
Nome_cliente Varchar(100),
Endereco_cliente Varchar(255),
CPF_cliente char(14) PRIMARY KEY,
ID_pedidos serial
);

CREATE TABLE Funcionário (
ID_funcionarios serial PRIMARY KEY,
Sexo_funcionario char(1),
Cargo_funcionario varchar(100),
Nome_funcionario Varchar(100),
Turno_funcionario varchar(20)
);

CREATE TABLE Produtos (
ID_produto int PRIMARY KEY,
Valor_produto money,
qtde_produto int,
tipo_produto varchar(30)
);

CREATE TABLE Pedido (
Data_pedido Date,
Status Varchar(20),
ID_pedidos serial PRIMARY KEY,
Data_entrega int
);

CREATE TABLE Atender (
ID_pedidos serial,
ID_funcionarios serial,
FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE Adquirir (
ID_produto int,
ID_funcionarios serial,
FOREIGN KEY(ID_produto) REFERENCES Produtos (ID_produto),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE Encomendar (
ID_pedidos serial,
ID_produto int,
FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos)/*falha: chave estrangeira*/
);

ALTER TABLE Cliente ADD FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos);

SELECT * FROM adquirir;
SELECT * FROM atender;
SELECT * FROM cliente;
SELECT * FROM encomendar;
SELECT * FROM funcionário;
SELECT * FROM pedido;
SELECT * FROM produtos;