<?php
$host = "localhost";
$user = "root";
$pass = "root"; // sem senha
$db   = "cafeteria";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ Erro na conexão: " . $conn->connect_error);
}

echo "✅ Conectado com sucesso ao banco: $db";
?>