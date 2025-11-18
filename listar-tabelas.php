<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include "conexao.php";

echo "<h2>Tabelas encontradas no banco $db:</h2><br><br>";

$result = $conn->query("SHOW TABLES");
while($row = $result->fetch_array()){
    echo $row[0] . "<br>";
}