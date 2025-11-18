<?php
// DEBUG LIGADO
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

include 'conexao.php';

// debug: mostrar o que chegou no POST
echo "<h3>POST recebido:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if($email == "" || $senha == ""){
    echo "<p style='color:red'>CAMPO VAZIO</p>";
    exit;
}

$query = "SELECT * FROM usuarios1 WHERE email = '$email' LIMIT 1";
$result = $conn->query($query);

if(!$result){
    echo "<p style='color:red'>ERRO SQL: ".$conn->error."</p>";
    exit;
}

if($result->num_rows == 0){
    echo "<p style='color:red'>EMAIL NÃO ENCONTRADO</p>";
    exit;
}

$usuario = $result->fetch_assoc();

echo "<h3>DADOS DO USUARIO</h3>";
print_r($usuario);

echo "<br><br>Comparando senha...<br>";

if(md5($senha) == $usuario['senha']){
    echo "<p style='color:green'>SENHA OK!!</p>";
    $_SESSION['usuario_nome'] = $usuario['nome'];
    header("Refresh:2; URL=index.php");
    exit;
}else{
    echo "<p style='color:red'>SENHA ERRADA</p>";
    exit;
}
?>