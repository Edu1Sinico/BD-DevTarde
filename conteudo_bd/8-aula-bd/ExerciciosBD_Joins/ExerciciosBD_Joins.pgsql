-- Exercícios de Inner Joins
USE DB_JOINS

SELECT * FROM Venda;
SELECT * FROM cliente;
SELECT * FROM Venda,cliente;

-- Exercício 1:
SELECT venda.duplic,venda.valor,cliente.nome 
FROM Cliente INNER JOIN venda
ON cliente.codcli = venda.codcli 
WHERE cliente.nome like 'PCTEC%';

-- Exercício 2:
SELECT cliente.nome,venda.vencto 
FROM cliente INNER JOIN venda 
ON cliente.codcli = venda.codcli 
WHERE venda.vencto BETWEEN '2004-11-01' AND '2004-11-30'
ORDER BY venda.vencto;

-- Exercício 3:
SELECT cliente.nome, venda.duplic 
FROM cliente INNER JOIN venda 
ON cliente.codcli = venda.codcli 
WHERE venda.vencto::text like '%-10-%';

-- Exercício 4:
SELECT cliente.nome, SUM(venda.valor) AS Valor Total, COUNT(*) AS qtdeTitulos  
FROM cliente INNER JOIN venda 
ON cliente.codcli = venda.codcli 
GROUP BY cliente.nome;

-- Exercício 5:


