<?php
include 'connection/connection.php';
// $pdo = pdo_connect_pgsql();

// Método para listar o última agência
function listarUltimaAgencia($pdo)
{
    try {
        $stmt = $pdo->query('
            SELECT a.id_agencia, c.nome AS cidade
            FROM agencia a
            JOIN cidade c ON a.id_cidade = c.id_cidade
            ORDER BY a.id_agencia DESC
            LIMIT 1
        ');
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    } catch (PDOException $e) {
        return 'Erro ao listar a agência: ' . $e->getMessage();
    }
}
