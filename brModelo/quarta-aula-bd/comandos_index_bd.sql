-- 08/03/2024 - Banco de Dados
--CRIAÇÃO DA TABELA

CREATE TABLE TBL_CLIENTES
(
	cod_cli int,
	nome varchar(50)
);

select * from tbl_clientes;

-- COMANDOS PARA CRIAR UM INDEX EM UM ATRIBUTO DE UMA TABELA EM BD

CREATE INDEX idx_cli_cod ON TBL_CLIENTES(cod_cli);

CREATE INDEX idx_nome ON TBL_CLIENTES(nome);

-- COMANDO PARA EXCLUIR UM INDEX DA TABELA

DROP INDEX idx_cli_cod