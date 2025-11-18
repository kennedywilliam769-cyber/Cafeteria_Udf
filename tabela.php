<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include "conexao.php";

$sql = "CREATE TABLE usuarios1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabela usuarios1 criada com sucesso ✅";
} else {
  echo "Erro ao criar tabela: " . $conn->error;
}