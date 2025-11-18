<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexao.php';

// Mostrar o que o PHP está recebendo
echo "<h3>🔍 Dados recebidos via POST:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');
$confirmar = trim($_POST['confirmar'] ?? '');

if ($nome == '' || $email == '' || $senha == '' || $confirmar == '') {
    echo "<p style='color:red'>⚠️ Por favor, preencha todos os campos.</p>";
    exit;
}

if ($senha !== $confirmar) {
    echo "<p style='color:red'>❌ As senhas não coincidem.</p>";
    exit;
}

// Verifica se o e-mail já existe
$check = $conn->prepare("SELECT id FROM usuarios1 WHERE email = ?");
if (!$check) {
    echo "<p style='color:red'>Erro ao preparar SELECT: " . $conn->error . "</p>";
    exit;
}

$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result === false) {
    echo "<p style='color:red'>Erro ao executar SELECT: " . $conn->error . "</p>";
    exit;
}

if ($result->num_rows > 0) {
    echo "<p style='color:red'>⚠️ Este e-mail já está cadastrado.</p>";
    exit;
}

// Criptografa a senha
$senha_md5 = md5($senha);
echo "<p>🔐 Senha criptografada: $senha_md5</p>";

// Insere no banco
$stmt = $conn->prepare("INSERT INTO usuarios1 (nome, email, senha) VALUES (?, ?, ?)");
if (!$stmt) {
    echo "<p style='color:red'>Erro ao preparar INSERT: " . $conn->error . "</p>";
    exit;
}

$stmt->bind_param("sss", $nome, $email, $senha_md5);
$ok = $stmt->execute();

if ($ok) {
    echo "<p style='color:green'>✅ Cadastro realizado com sucesso!</p>";
    echo "<meta http-equiv='refresh' content='3;url=login.php'>";
} else {
    echo "<p style='color:red'>❌ Erro ao cadastrar: " . $conn->error . "</p>";
}

$stmt->close();
$conn->close();
?>