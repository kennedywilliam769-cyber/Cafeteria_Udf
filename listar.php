<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once "conexao.php";

echo "<h1>LISTANDO TABELAS</h1>";

$q = $conn->query("SHOW TABLES");

if(!$q){
    echo "<p>ERRO: ".$conn->error."</p>";
    exit;
}

while($row = $q->fetch_row()){
    echo "<p>".$row[0]."</p>";
}