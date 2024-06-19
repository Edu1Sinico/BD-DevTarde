<?php
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

// Método de cadastrar clientes
function cadastrarCliente($pdo)
{
    // Verifica se os dados não estão vazios
    if (!empty($_POST)) {
        try {
            // Configura as variáveis que serão inseridas
            $dados = array(
                ':id_cliente' => $_POST['id_cliente'],
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':email' => $_POST['email'],
                ':celular' => $_POST['celular'],
                ':senha' => $_POST['senha'],
                ':estado' => $_POST['estado'],
                ':cidade' => $_POST['cidade'],
                ':endereco' => $_POST['endereco'],
            );

            // Insere um novo registro na tabela cliente
            $stmt = $pdo->prepare('INSERT INTO cliente(id_cliente, nome, sobrenome, email, celular, senha, estado, cidade, endereco) VALUES (:id_cliente, :nome, :sobrenome, :email, :celular, :senha, :estado, :cidade, :endereco)');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'cliente cadastrado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao cadastrar cliente: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de deletar os clientes
function deletarCliente($pdo)
{
    if (isset($_GET['id_cliente'])) {
        try {
            $stmt = $pdo->prepare('DELETE FROM cliente WHERE id_cliente = :id_cliente');
            if ($stmt->execute([':id_cliente' => $_POST['id_cliente']])) {
                return 'cliente deletado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao deletar cliente: ' . $e->getMessage();
        }
    } else {
        return 'ID vazio.';
    }
}

// Método de atualizar os clientes
function atualizarCliente($pdo)
{
    if (!empty($_POST)) {
        try {
            $dados = array(
                ':id_cliente' => $_POST['id_cliente'],
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':email' => $_POST['email'],
                ':celular' => $_POST['celular'],
                ':senha' => $_POST['senha']
            );
            // atualiza o registro do cliente na tabela cliente
            $stmt = $pdo->prepare('UPDATE cliente SET nome = :nome, sobrenome = :sobrenome, email = :email, celular = :celular, senha = :senha WHERE id_cliente = :id_cliente');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'cliente atualizado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao atualizar o cliente: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de listar os clientes
function listarClientes($pdo)
{
    try {
        $stmt = $pdo->query('SELECT * FROM cliente');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return 'Erro ao listar os clientes: ' . $e->getMessage();
    }
}

// Método para listar o último cliente
function listarUltimoCliente($pdo)
{
    try {
        $stmt = $pdo->query('SELECT id_cliente FROM cliente ORDER BY id_cliente DESC LIMIT 1');
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id_cliente'] : null;
    } catch (PDOException $e) {
        return 'Erro ao listar o cliente: ' . $e->getMessage();
    }
}
