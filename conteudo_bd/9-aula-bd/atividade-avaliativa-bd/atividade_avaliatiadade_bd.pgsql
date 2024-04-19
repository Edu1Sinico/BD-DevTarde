--  Exercício 1: Listar todos os pedidos com detalhes do cliente. Consulta para obter informações
-- sobre os pedidos e os clientes que os fizeram.

SELECT ped.id_pedidos, ped.status, cli.nome_cliente 
FROM pedido ped 
INNER JOIN cliente cli ON cli.id_pedidos = ped.id_pedidos;

--  Exercício 2: Listar todos os itens de pedidos com detalhes da pizza. Consulta para mostrar os
-- itens de pedidos e os detalhes das pizzas associadas a eles.

SELECT ped.*, piz.* 
FROM pedido ped 
INNER JOIN pizza piz ON piz.id_pizza = ped.id_pedidos;

-- Exercício 3: Listar todos os funcionários com suas respectivas atribuições. Consulta para
-- mostrar os funcionários e as áreas em que estão trabalhando.

SELECT fun.nome_funcionario, fun.cargo_funcionario, setor.nome_setor 
FROM funcionario fun 
INNER JOIN setor_pizzaria setor ON setor.id_setor = fun.id_setor;

-- Exercício 4: Listar todos os pedidos com status e funcionários responsáveis. Consulta para
-- mostrar os pedidos, seus status e os funcionários responsáveis pelo atendimento.

SELECT ped.ID_pedidos, ped.Status, fun.Nome_funcionario 
FROM Pedido ped 
INNER JOIN Atender ate ON ped.ID_pedidos = ate.ID_pedidos 
INNER JOIN Funcionario fun ON ate.ID_funcionarios = fun.ID_funcionarios;

-- Exercício 5: Listar todos os clientes com seus pedidos realizados. Consulta para exibir os
-- clientes e todos os pedidos que eles fizeram.

SELECT cli.Nome_cliente, ped.ID_pedidos, ped.Data, ped.Status 
FROM Cliente cli 
LEFT JOIN Pedido ped ON cli.ID_pedidos = ped.ID_pedidos;

-- Exercício 6: Listar todas as pizzas disponíveis com seus respectivos ingredientes. Consulta
-- para mostrar todas as pizzas disponíveis e seus ingredientes.

-- SELECT piz.Sabor_pizza, ing.Nome_ingrediente 
-- FROM Pizza piz 
-- LEFT JOIN Ingredientes ing ON piz.ID_pizza = ing.ID_pizza;

-- Exercício 7: Listar todos os pedidos com detalhes de entrega (se disponível). Consulta para
-- mostrar os pedidos com detalhes de entrega, se disponíveis.



-- Exercício 8: Listar todos os funcionários com seus respectivos supervisores. Consulta para
-- exibir os funcionários e seus supervisores, se aplicável.

SELECT fun1.Nome_funcionario AS Funcionario, fun2.Nome_funcionario AS Supervisor 
FROM Funcionario fun1 
LEFT JOIN Funcionario fun2 ON fun1.ID_supervisor = fun2.ID_funcionarios;

-- Exercício 9: Listar todos os itens de pedidos com seus respectivos tamanhos. Consulta para
-- mostrar os itens de pedidos e os tamanhos das pizzas associadas a eles.



-- Exercício 10: Listar todas as pizzas com suas respectivas promoções. Consulta para mostrar
-- todas as pizzas e suas promoções, se houver.



------------> Segunda parte - Consulta com comandos SQL básicos: <------------

-- Exercício 11: Listar todos os clientes cadastrados. Consulta para recuperar todos os clientes
-- que já fizeram pedidos na pizzaria.



-- Exercício 12: Listar todos os pedidos realizados em um determinado período. Consulta para
-- visualizar todos os pedidos feitos dentro de um intervalo de datas específico.



-- Exercício 13: Listar os itens de um pedido específico. Consulta para ver todos os itens (pizzas,
-- bebidas, etc.) em um pedido específico.



-- Exercício 14: Calcular o total gasto por um cliente. Consulta para somar o valor de todos os
-- pedidos feitos por um cliente específico.



-- Exercício 15: Listar os sabores de pizza mais populares. Consulta para mostrar os sabores de
-- pizza mais pedidos pelos clientes.



-- Exercício 16: Verificar a disponibilidade de um determinado sabor de pizza. Consulta para
-- verificar se um sabor específico de pizza está disponível no momento.



-- Exercício 17: Listar todos os funcionários. Consulta para recuperar informações de todos os
-- funcionários da pizzaria.



-- Exercício 18: Verificar o horário de funcionamento da pizzaria. Consulta para saber os horários
-- de abertura e fechamento da pizzaria.



-- Exercício 19: Listar os pedidos em andamento. Consulta para ver todos os pedidos que ainda
-- não foram entregues.



-- Exercício 20: Calcular o tempo médio de espera dos pedidos. Consulta para calcular o tempo
-- médio que os clientes esperam pelos pedidos.


