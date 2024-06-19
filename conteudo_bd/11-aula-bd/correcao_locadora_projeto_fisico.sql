-- Gera��o de Modelo f�sico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Agencia (
Endereco Varchar(255) Not Null,
Cidade Varchar(255) Not Null,
Num_Agencia INT PRIMARY KEY,
Estado Varchar(2) Not Null,
Contato Varchar(11) Not Null
);

CREATE TABLE Pagamento (
Valor Money Not Null,
Data_Pagamento Date Not Null,
Status_Pagamento Varchar(50) Not Null,
Forma_Pagamento Varchar(100) Not Null,
Id_pagamento INT,
Comprovante Varchar(255),
Id_Comprovante INT,
PRIMARY KEY(Id_pagamento,Id_Comprovante)
);

CREATE TABLE Carro (
Modelo Varchar(25),
Ano INT,
Id_carro INT PRIMARY KEY,
Placa Varchar(7) Not Null,
Tipo Varchar (25),
Disponibilidade Bool Not Null
);

CREATE TABLE Manutencao (
KM Decimal Not Null,
Custo Money Not Null,
Tipo_Manutencao Varchar(100) Not Null,
Id_Manutencao INT PRIMARY KEY,
Descricao Varchar(255) Not Null,
Manutencao Date Not Null
);

CREATE TABLE Cliente (
Endereco Varchar(255) Not Null,
Id_cliente INT PRIMARY KEY,
Cidade Varchar(255) Not Null,
Email Varchar(100) Not Null,
Nome Varchar(125) Not Null,
Sobrenome Varchar(125) Not Null,
Estado Varchar(2) Not Null,
Celular Varchar(11) Not Null,
Id_pagamento INT
);

CREATE TABLE Funcionarios (
Nome Varchar(125) Not Null,
Cargo Varchar (50) Not Null,
Id_Funcionario INT PRIMARY KEY,
Sobrenome Varchar(125) Not Null,
Data_Contratacao Date Not Null,
Salario Money Not Null,
Num_Agencia INT,
FOREIGN KEY(Num_Agencia) REFERENCES Agencia (Num_Agencia)
);

CREATE TABLE Feedback (
Id_Feedback INT PRIMARY KEY,
Avaliacao INT,
Comentario Varchar(255),
data_feedback Date
);

CREATE TABLE Locacao (
Id_locacao INT PRIMARY KEY,
Data_locacao Date Not Null,
Valor_Total Money Not Null,
Data_Devolucao Date Not Null,
Id_cliente INT,
Id_carro INT,
FOREIGN KEY(Id_carro) REFERENCES Carro (Id_carro),
FOREIGN KEY(Id_cliente) REFERENCES Cliente (Id_cliente)
);

CREATE TABLE Recebe (
Id_Manutencao INT,
Id_carro INT,
FOREIGN KEY(Id_Manutencao) REFERENCES Manutencao (Id_Manutencao),
FOREIGN KEY(Id_carro) REFERENCES Carro (Id_carro)
);

CREATE TABLE Envia (
Id_Envio INT PRIMARY KEY,
Observacao Varchar(255),
Id_Feedback INT,
Id_cliente INT,
FOREIGN KEY(Id_Feedback) REFERENCES Feedback (Id_Feedback)
);
