-- Inserção de dados na tabela Agencia
INSERT INTO Agencia (Endereco, Cidade, Num_Agencia, Estado, Contato)
VALUES
    ('Av. Paulista, 1000', 'São Paulo', 1, 'SP', '1112345678'),
    ('Rua da Praia, 500', 'Rio de Janeiro', 2, 'RJ', '2198765432'),
    ('Av. Sete de Setembro, 200', 'Curitiba', 3, 'PR', '4155551234'),
    ('Rua das Flores, 300', 'Porto Alegre', 4, 'RS', '5187654321'),
    ('Av. Brasil, 1500', 'Belo Horizonte', 5, 'MG', '3133339999');

-- Inserção de dados na tabela Pagamento
INSERT INTO Pagamento (Valor, Data_Pagamento, Status_Pagamento, Forma_Pagamento, Id_pagamento, Comprovante, Id_Comprovante)
VALUES
    (1500.00, '2024-04-15', 'Pago', 'Cartão de Crédito', 1, 'Recibo-123', 101),
    (1200.50, '2024-04-20', 'Pago', 'Transferência Bancária', 2, 'Recibo-456', 102),
    (1800.75, '2024-04-25', 'Atrasado', 'Boleto Bancário', 3, 'Recibo-242', 102),
    (900.00, '2024-04-28', 'Pago', 'Dinheiro', 4, 'Recibo-789', 104),
    (2000.00, '2024-05-01', 'Pago', 'Cartão de Débito', 5, 'Recibo-321', 105);

-- Inserção de dados na tabela Carro
INSERT INTO Carro (Modelo, Ano, Id_cliente, Placa, Tipo, Disponibilidade)
VALUES
    ('Civic', 2019, 101, 'ABC1234', 'Sedan', true),
    ('Golf', 2018, 102, 'XYZ5678', 'Hatchback', false),
    ('Corolla', 2020, 103, 'DEF9876', 'Sedan', true),
    ('HB20', 2017, 104, 'MNO4321', 'Hatchback', true),
    ('Cruze', 2019, 105, 'GHI7890', 'Sedan', false);

-- Inserção de dados na tabela Manutencao
INSERT INTO Manutencao (KM, Custo, Tipo_Manutencao, Id_Manutencao, Descricao, Manutencao)
VALUES
    (25000.50, 500.00, 'Troca de óleo', 1, 'Troca de óleo e filtro', '2024-03-10'),
    (30000.75, 700.00, 'Revisão completa', 2, 'Revisão geral do veículo', '2024-04-05'),
    (35000.00, 400.00, 'Troca de pneus', 3, 'Troca dos pneus dianteiros', '2024-04-25'),
    (40000.25, 600.00, 'Reparo da suspensão', 4, 'Reparo na suspensão traseira', '2024-05-01'),
    (45000.50, 800.00, 'Substituição de peças', 5, 'Substituição de peças danificadas', '2024-05-02');

-- Inserção de dados na tabela Cliente
INSERT INTO Cliente (Endereco, Id_cliente, Cidade, Email, Nome, Sobrenome, Estado, Celular, Id_pagamento)
VALUES
    ('Rua das Flores, 200', 101, 'São Paulo', 'cliente1@email.com', 'José', 'Silva', 'SP', '1199998888', 1),
    ('Av. Central, 300', 102, 'Rio de Janeiro', 'cliente2@email.com', 'Maria', 'Santos', 'RJ', '2177776666', 2),
    ('Rua da Praia, 100', 103, 'Curitiba', 'cliente3@email.com', 'João', 'Souza', 'PR', '4133332222', 3),
    ('Av. Paulista, 500', 104, 'Porto Alegre', 'cliente4@email.com', 'Ana', 'Oliveira', 'RS', '5155554444', 4),
    ('Rua das Árvores, 800', 105, 'Belo Horizonte', 'cliente5@email.com', 'Carlos', 'Ferreira', 'MG', '3188881111', 5);

-- Inserção de dados na tabela Funcionarios
INSERT INTO Funcionarios (Nome, Cargo, Id_Funcionario, Sobrenome, Data_Contratacao, Salario, Num_Agencia)
VALUES
    ('Luiz', 'Gerente', 201, 'Oliveira', '2020-01-15', 5000.00, 1),
    ('Fernanda', 'Vendedor', 202, 'Ribeiro', '2021-03-20', 3000.00, 2),
    ('Ricardo', 'Técnico', 203, 'Santana', '2022-05-10', 3500.00, 3),
    ('Paula', 'Atendente', 204, 'Silveira', '2023-02-12', 2800.00, 4),
    ('Marcos', 'Segurança', 205, 'Almeida', '2023-11-05', 2600.00, 5);

-- Inserção de dados na tabela Feedback
INSERT INTO Feedback (Id_Feedback, Avaliacao, Comentario, data_feedback)
VALUES
    (1, 4, 'Ótimo atendimento e carro em boas condições.', '2024-04-20'),
    (2, 3, 'Demorou um pouco para entregar o carro.', '2024-04-25'),
    (3, 5, 'Excelente serviço, pessoal muito prestativo.', '2024-05-01'),
    (4, 2, 'Carro sujo e tanque vazio na retirada.', '2024-05-02'),
    (5, 4, 'Boa experiência, mas poderiam oferecer mais variedade de carros.', '2024-05-03');

-- Inserção de dados na tabela Locacao
INSERT INTO Locacao (Id_locacao, Data_locacao, Valor_Total, Data_Devolucao, Id_cliente)
VALUES
    (1, '2024-04-15', 300.00, '2024-04-20', 101),
    (2, '2024-04-20', 250.00, '2024-04-25', 102),
    (3, '2024-04-25', 400.00, '2024-05-01', 103),
    (4, '2024-04-28', 350.00, '2024-05-02', 104),
    (5, '2024-05-01', 280.00, '2024-05-03', 105);

-- Inserção de dados na tabela Recebe
INSERT INTO Recebe (Id_Manutencao, Id_cliente)
VALUES
    (1, 101),
    (2, 102),
    (3, 103),
    (4, 104),
    (5, 105);

-- Inserção de dados na tabela Envia
INSERT INTO Envia (Id_Envio, Observacao, Id_Feedback, Id_cliente)
VALUES
    (1, 'Tudo ocorreu conforme combinado.', 1, 101),
    (2, 'Atraso na devolução do carro.', 2, 102),
    (3, 'Muito satisfeito com o serviço.', 3, 103),
    (4, 'Carro precisava de limpeza.', 4, 104),
    (5, 'Recomendo, mas esperava mais opções.', 5, 105);
