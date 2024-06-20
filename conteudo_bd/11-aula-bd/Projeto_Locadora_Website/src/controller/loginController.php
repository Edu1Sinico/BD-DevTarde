<?php
session_start();
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

function loginUser($pdo)
{
    if (!empty($_POST)) {
        try {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            // Verifica na tabela de clientes
            $stmt = $pdo->prepare('SELECT * FROM cliente WHERE email = :email AND senha = :senha');
            $stmt->execute([':email' => $email, ':senha' => $senha]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['user_id'] = $user['id_cliente'];
                $_SESSION['user_name'] = $user['nome'];
                $_SESSION['user_tipo'] = 'cliente'; // Define o tipo de usuário como cliente
                header("Location: /src/"); // Redireciona para a página inicial após o login bem-sucedido
                exit(); // Certifica-se de que o script não continua após o redirecionamento
            }

            // Se não encontrar na tabela de clientes, verifica na tabela de funcionários
            $stmt = $pdo->prepare('SELECT * FROM funcionarios WHERE email = :email AND senha = :senha');
            $stmt->execute([':email' => $email, ':senha' => $senha]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['user_id'] = $user['id_funcionario'];
                $_SESSION['user_name'] = $user['nome'];
                $_SESSION['user_tipo'] = 'funcionario'; // Define o tipo de usuário como funcionário
                header("Location: /src/"); // Redireciona para a página inicial após o login bem-sucedido
                exit(); // Certifica-se de que o script não continua após o redirecionamento
            }

            // Se não encontrar nem na tabela de clientes nem na tabela de funcionários
            return 'Credenciais inválidas.';
        } catch (PDOException $e) {
            return 'Erro ao realizar o login.';
        }
    } else {
        return 'Dados vazios.';
    }
    die();
}
