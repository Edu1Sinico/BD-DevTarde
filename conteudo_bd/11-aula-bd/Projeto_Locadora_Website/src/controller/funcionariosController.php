<?php
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['operation'] === 'cadastrar') {
        $message = cadastrarFuncionario($pdo);
    } elseif ($_POST['operation'] === 'atualizar') {
        $message = atualizarFuncionario($pdo);
    } elseif ($_POST['operation'] === 'excluir') {
        $message = deletarFuncionario($pdo);
    }
}

// Método de cadastrar funcionários
function cadastrarFuncionario($pdo)
{
    // Verifica se os dados não estão vazios
    if (!empty($_POST)) {
        try {
            // Configura as variáveis que serão inseridas
            $dados = array(
                ':id_funcionario' => $_POST['id_funcionario'],
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':cargo' => $_POST['cargo'],
                ':salario' => $_POST['salario'],
                ':data_contratacao' => $_POST['data_contratacao'],
                ':num_agencia' => $_POST['num_agencia'],
                ':senha' => $_POST['senha'],
                ':email' => $_POST['email'],
                ':tipo' => 'funcionario' // Define o tipo padrão como funcionário
            );

            // Insere um novo registro na tabela funcionários
            $stmt = $pdo->prepare('INSERT INTO funcionarios(id_funcionario, nome, sobrenome, cargo, salario, data_contratacao, num_agencia,senha, tipo, email) VALUES (:id_funcionario, :nome, :sobrenome, :cargo, :salario, :data_contratacao, :num_agencia, :senha, :tipo, :email)');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'Funcionário cadastrado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao cadastrar funcionário: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de deletar os funcionários
function deletarFuncionario($pdo)
{
    if (isset($_POST['id_funcionario'])) {
        try {
            $stmt = $pdo->prepare('DELETE FROM funcionarios WHERE id_funcionario = :id_funcionario');
            if ($stmt->execute([':id_funcionario' => $_POST['id_funcionario']])) {
                return 'Funcionário deletado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao deletar funcionário: ' . $e->getMessage();
        }
    } else {
        return 'ID vazio.';
    }
}

// Método de atualizar os funcionários
function atualizarFuncionario($pdo)
{
    if (!empty($_POST)) {
        try {
            $dados = array(
                ':id_funcionario' => $_POST['id_funcionario'],
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':cargo' => $_POST['cargo'],
                ':data_contratacao' => $_POST['data_contratacao'],
                ':salario' => $_POST['salario'],
                ':num_agencia' => $_POST['num_agencia'],
                ':email' => $_POST['email']
            );

            // atualiza o registro do funcionário na tabela funcionário
            $stmt = $pdo->prepare('UPDATE funcionarios SET nome = :nome, sobrenome = :sobrenome, cargo = :cargo, data_contratacao = :data_contratacao, salario = :salario, num_agencia = :num_agencia, email = :email WHERE id_funcionario = :id_funcionario');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'Funcionário atualizado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao atualizar o funcionário: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de listar os funcionarios
function listarFuncionarios($pdo)
{
    try {
        $stmt = $pdo->query('SELECT * FROM funcionarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return 'Erro ao listar os funcionários: ' . $e->getMessage();
    }
}

// Método para listar o último funcionário
function listarUltimoFuncionario($pdo)
{
    try {
        $stmt = $pdo->query('SELECT id_funcionario FROM funcionarios ORDER BY id_funcionario DESC LIMIT 1');
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id_funcionario'] : null;
    } catch (PDOException $e) {
        return 'Erro ao listar o funcionário: ' . $e->getMessage();
    }
}
