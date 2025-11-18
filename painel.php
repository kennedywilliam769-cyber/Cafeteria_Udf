<?php
// C:\xampp\htdocs\cafeteria\painel.php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.html");
    exit;
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Painel - Cafeteria</title>
</head>
<body>
  <h1>Bem-vindo ao painel</h1>
  <p>Você está conectado como: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
  <p><a href="logout.php">Sair</a></p>
</body>
</html>