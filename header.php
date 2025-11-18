<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Conta quantos itens há no carrinho
$qtd_carrinho = 0;
if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
    $qtd_carrinho = count($_SESSION['carrinho']);
}
?>
<header>
  <div class="topo">
    <h1><a href="index.php">♨️ Toca do Sabor Café & Cia ♨️</a></h1>
    <nav class="menu-principal">
      <a href="index.php">Início</a>
      <a href="carrinho.php">Carrinho 🛒 
  <span id="contador-carrinho">
    <?php echo isset($_SESSION['contador_carrinho']) ? $_SESSION['contador_carrinho'] : 0; ?>
  </span>
</a>

      <?php if(isset($_SESSION['usuario_nome'])): ?>
        <span class="menu-usuario">Conectado como: <span class="nome-destaque"><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span></span>
        <a href="logout.php">Sair</a>
      <?php else: ?>
        <a href="login.php" class="login">Login</a>
      <?php endif; ?>
    </nav>
  </div>
</header>