CREATE TABLE IF NOT EXISTS contatos (
    id_contato INT NOT NULL PRIMARY KEY,
    nome varchar(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cel VARCHAR(255) NOT NULL,
    pizza VARCHAR(255) NOT NULL,
    cadastro date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contatos (id_contato, nome, email, cel, pizza, cadastro) VALUES

SELECT * FROM contantos

SELECT * FROM contatos ORDER BY id_contato OFFSET :offset 1 : 1

SELECT COUNT(*) FROM contatos

ALTER TABLE contatos COLUMN id_contato

CREATE TABLE IF NOT EXISTS pizza_sabores (
    id_pizza INT NOT NULL PRIMARY KEY,
    nome varchar(255) NOT NULL,
);