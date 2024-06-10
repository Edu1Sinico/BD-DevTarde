<?php
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

// Método de cadastrar funcionários
function cadastrarFuncionario($pdo)
{
    // Verifica se os dados não estão vazios
    if (!empty($_POST)) {
        try {
            // Configura as variáveis que serão inseridas
            $dados = array(
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':cargo' => $_POST['cargo'],
                ':id_funcionario' => $_POST['id_funcionario'],
                ':data_contratacao' => $_POST['data_contratacao'],
                ':salario' => $_POST['salario'],
                ':num_agencia' => $_POST['num_agencia']
            );

            // Insere um novo registro na tabela funcionário
            $stmt = $pdo->prepare('INSERT INTO funcionarios(id_funcionario, nome, sobrenome, cargo, salario, data_contratacao, num_agencia) VALUES (:id_funcionario, :nome, :sobrenome, :cargo, :salario, :data_contratacao, :num_agencia)');
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
    if (isset($_GET['id_funcionario'])) {
        try {
            $stmt = $pdo->prepare('DELETE FROM funcionarios WHERE id_funcionario = :id_funcionario');
            if ($stmt->execute([':id_funcionario' => $_GET['id_funcionario']])) {
                return 'Funcionário deletado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao deletar funcionário: ' . $e->getMessage();
        }
    } else {
        return 'id vazio.';
    }
}

// Método de atualizar os funcionários
function atualizarFuncionario($pdo)
{
    if (!empty($_POST)) {
        try {
            $dados = array(
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':cargo' => $_POST['cargo'],
                ':id_funcionario' => $_POST['id_funcionario'],
                ':data_contratacao' => $_POST['data_contratacao'],
                ':salario' => $_POST['salario'],
                ':num_agencia' => $_POST['num_agencia']
            );
            // atualiza o registro do funcionário na tabela funcionário
            $stmt = $pdo->prepare('UPDATE funcionarios SET nome = :nome, sobrenome = :sobrenome, cargo = :cargo, data_contratacao = :data_contratacao, salario = :salario, num_agencia = :num_agencia WHERE id_funcionario = :id_funcionario');
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
