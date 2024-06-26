-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cliente (
Pagamento_cliente Varchar(150),
Nome_cliente Varchar(100),
Endereco_cliente Varchar(255),
CPF_cliente char(14) PRIMARY KEY,
ID_pedidos serial
);


CREATE INDEX idx_cpf_cli ON Cliente(CPF_cliente);

CREATE TABLE Pizza (
Sabor_pizza varchar(30),
Valor_pizza money,
Tamanho_pizza char(1),
id_pizza int PRIMARY KEY
);

CREATE INDEX idx_id_pizza ON Pizza(id_pizza);

CREATE TABLE Pedido (
Data Date,
Status Varchar(20),
ID_pedidos serial PRIMARY KEY
);

--------------------------------------------------------------------
-- comandos inner join

-- Terceira query: utiliza apelidos para as tabelas e a sintaxe de junção explícita
SELECT ven.DUPLIC, cli.NOME
FROM cliente cli INNER JOIN venda ven ON cli.CODCLI =
ven.CODCLI;

-- Quarta query: utiliza apelidos para as tabelas, a sintaxe de junção explícita e ordena os resultados pelo nome do cliente
SELECT ven.DUPLIC, cli.NOME
FROM cliente cli INNER JOIN venda ven ON cli.CODCLI =
ven.CODCLI ORDER BY cli.NOME;

-- Primeira query: utiliza a sintaxe de junção explícita (moderna) e agrupa os resultados pelo nome do cliente, contando o número de vendas para cada cliente
SELECT cliente.NOME, COUNT(*) AS QTDE
FROM cliente INNER JOIN venda ON cliente.CODCLI =
venda.CODCLI
GROUP BY cliente.NOME;

--------------------------------------------------------------------

CREATE INDEX idx_id_ped ON Pedido(id_pedidos);

CREATE TABLE Funcionário (
ID_funcionarios serial PRIMARY KEY,
Sexo_funcionario char(1),
Cargo_funcionario varchar(100),
Nome_funcionario Varchar(100),
Turno_funcionario varchar(20),
ID_pedidos int,
FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos)
);

CREATE INDEX idx_id_func ON Funcionário(id_funcionarios);

CREATE TABLE Atender (
ID_pedidos serial,
ID_funcionarios serial,
FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE Preparo (
id_pizza int,
ID_funcionarios serial,
FOREIGN KEY(id_pizza) REFERENCES Pizza (id_pizza),
FOREIGN KEY(ID_funcionarios) REFERENCES Funcionário (ID_funcionarios)
);

CREATE TABLE Encomendar (
ID_pedidos serial,
id_pizza int,
FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos)
);

ALTER TABLE Cliente ADD FOREIGN KEY(ID_pedidos) REFERENCES Pedido (ID_pedidos);
