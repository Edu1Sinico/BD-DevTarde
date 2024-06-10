<?php
include 'connection/connection.php';
$pdo = pdo_connect_pgsql();

// Método de listar as agências
function listarAgencia($pdo)
{
    try {
        $stmt = $pdo->query('SELECT * FROM agencia');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return 'Erro ao listar as agências: ' . $e->getMessage();
    }
}
