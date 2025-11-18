<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "cafeteria";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}

// opcional: debug
// echo "Conectado com sucesso ao banco: $db";
?>