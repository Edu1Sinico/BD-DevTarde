<?php
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

// Método de cadastrar veículos
function cadastrarVeiculo($pdo)
{
    // Verifica se os dados não estão vazios
    if (!empty($_POST)) {
        try {
            // Configura as variáveis que serão inseridas
            $dados = array(
                ':id_carro' => $_POST['id_carro'],
                ':modelo' => $_POST['modelo'],
                ':ano' => $_POST['ano'],
                ':placa' => $_POST['placa'],
                ':tipo' => $_POST['tipo'],
                ':disponibilidade' => $_POST['disponibilidade']
            );

            // Insere um novo registro na tabela carro
            $stmt = $pdo->prepare('INSERT INTO carro(id_carro, modelo, ano, placa, tipo, disponibilidade) VALUES (:id_carro, :modelo, :ano, :placa, :tipo, :disponibilidade)');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'Veículo cadastrado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao cadastrar veículo: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de deletar os veículos
function deletarVeiculo($pdo)
{
    if (isset($_GET['id_carro'])) {
        try {
            $stmt = $pdo->prepare('DELETE FROM carro WHERE id_carro = :id_carro');
            if ($stmt->execute([':id_carro' => $_GET['id_carro']])) {
                return 'Veículo deletado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao deletar veículo: ' . $e->getMessage();
        }
    } else {
        return 'id vazio.';
    }
}

// Método de atualizar os veículos
function atualizarVeiculo($pdo)
{
    if (!empty($_POST)) {
        try {
            $dados = array(
                ':id_carro' => $_POST['id_carro'],
                ':modelo' => $_POST['modelo'],
                ':ano' => $_POST['ano'],
                ':placa' => $_POST['placa'],
                ':tipo' => $_POST['tipo'],
                ':disponibilidade' => $_POST['disponibilidade']
            );
            // atualiza o registro do veículo na tabela carro
            $stmt = $pdo->prepare('UPDATE carro SET modelo = :modelo, ano = :ano, placa = :placa, tipo = :tipo, disponibilidade = :disponibilidade WHERE id_carro = :id_carro');
            if ($stmt->execute($dados)) {
                // Mensagem de saída
                return 'Veículo atualizado com sucesso!';
            }
        } catch (PDOException $e) {
            return 'Erro ao atualizar o veículo: ' . $e->getMessage();
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}

// Método de listar os veículos
function listarVeiculos($pdo)
{
    try {
        $stmt = $pdo->query('SELECT * FROM carro');
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return 'Erro ao listar os veículos: ' . $e->getMessage();
    }
    die();
}

