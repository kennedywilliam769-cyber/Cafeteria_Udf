<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Toca do Sabor Café & Cia</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-body">

  <div class="login-wrapper">
    <div class="login-box">
      <h1 class="login-logo">♨️ Toca do Sabor Café & Cia ♨️</h1>
      <h2>Entrar</h2>
      <p>Bem-vindo de volta! Faça login para continuar.</p>

      <form action="autenticar.php" method="post" class="login-form">
  <label for="email">E-mail</label>
  <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

  <label for="senha">Senha</label>
  <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

  <button type="submit" class="btn-login">Entrar</button>

  <div class="login-links">
    <a href="esqueceusenha.php">Esqueceu a senha?</a>
    <a href="cadastro.php">Criar conta</a>
  </div>
  <a href="index.php" class="voltar">← Voltar ao início</a>
</form>

<!-- mostrar mensagem de erro simples -->
<?php if(isset($_GET['erro'])): ?>
  <p style="color:red; text-align:center;">E-mail ou senha incorretos.</p>
<?php endif; ?>
    </div>
  </div>

</body>
</html>