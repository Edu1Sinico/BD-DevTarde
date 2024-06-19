<?php

function pdo_connect_pgsql() {
$endereco = 'localhost';
$banco = 'locadora';
$adm = 'postgres';
$senha = 'postgres';

try {
$pdo = new PDO(
"pgsql:host=$endereco;port=5432;dbname=$banco",
$adm,
$senha,
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
return $pdo;
} catch (PDOException $e) {
die("Falha ao conectar ao banco de dados: " . $e->getMessage());
}
}