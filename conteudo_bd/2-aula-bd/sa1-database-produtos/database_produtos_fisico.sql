-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Clientes (
CPF_Cliente Int PRIMARY KEY,
Nome varchar(255),
Endereco varchar(255)
)

CREATE TABLE Pedido (
Cod_Pedido Int PRIMARY KEY,
data_pedido date
)

CREATE TABLE Entrega (
Cod_Entrega Int PRIMARY KEY,
Empresa_Colaboradora varchar(255),
Frete money,
Tempo date
)

CREATE TABLE Meios_Pagamentos (
Tipo_Pagamento varchar(50),
Cod_Pagamento Int PRIMARY KEY
)

CREATE TABLE Produtos (
Cod_Produto Int PRIMARY KEY,
Marca varchar(100),
Peso decimal,
Desconto money,
Categoria varchar(100),
Preco money
)

CREATE TABLE Estoque (
Cod_Estoque Int PRIMARY KEY,
Quantidade int
)

CREATE TABLE Colaborador (
Nome Varchar(255),
CPF_Colaborador Int PRIMARY KEY,
Endereco varchar(150),
Salario money,
Cargo varchar(100),
Idade Int,
Turno varchar(10)
)

