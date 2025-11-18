<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta - Toca do Sabor Café & Cia</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-body">

  <div class="login-wrapper">
    <div class="login-box">
      <h1 class="login-logo">♨️ Toca do Sabor Café & Cia ♨️</h1>
      <h2>Criar Conta</h2>
      <p>Cadastre-se e aproveite os melhor café de Brasília!</p>


      <form action="salvar_cadastro.php" method="post" class="login-form">
  <label for="nome">Nome completo</label>
  <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>

  <label for="email">E-mail</label>
  <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

  <label for="senha">Senha</label>
  <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

  <label for="confirmar">Confirmar senha</label>
  <input type="password" id="confirmar" name="confirmar" placeholder="Confirme sua senha" required>

  <button type="submit" class="btn-login">Cadastrar</button>

  <div class="login-links">
    <a href="login.php">Já tem uma conta? Entrar</a>
  </div>

  <a href="index.php" class="voltar">← Voltar ao início</a>
</form>
    </div>
  </div>

</body>
</html>