  <?php
session_start();

// Inicializa o carrinho se ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Remover item do carrinho
if (isset($_GET['remover'])) {
    $id = $_GET['remover'];
    unset($_SESSION['carrinho'][$id]);
    header("Location: carrinho.php");
    exit;
}

// Calcular total
$total = 0;
foreach ($_SESSION['carrinho'] as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Carrinho - Toca do Sabor Café & Cia</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body { font-family: Arial, sans-serif; background: #faf7f2; margin: 0; }
    header { background: #5c4033; color: white; padding: 15px 0; text-align: center; }
    header a { color: white; text-decoration: none; margin: 0 10px; }
    h1 span { color: #f2d16b; }
    main { max-width: 800px; margin: 40px auto; background: white; padding: 20px; border-radius: 10px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
    .btn { background: #5c4033; color: white; padding: 8px 14px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; }
    .btn:hover { background: #7b573d; }
    .total { font-weight: bold; font-size: 1.2em; text-align: right; }
  </style>
</head>
<body>

<header>
  <h1><a href="index.php"><span>♨️ Toca do Sabor Café & Cia ♨️</span></a></h1>
  <nav>
    <a href="index.php">Início</a>
    <a href="carrinho.php">Carrinho 🛒 
      <span id="contador-carrinho"><?php echo count($_SESSION['carrinho']); ?></span>
    </a>
    <?php if(isset($_SESSION['usuario_nome'])): ?>
      <span>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>
      <a href="logout.php">Sair</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
</header>

<main>
  <h2>Meu Carrinho</h2>

  <?php if (empty($_SESSION['carrinho'])): ?>
    <p>Seu carrinho está vazio ☕</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Preço</th>
          <th>Qtd</th>
          <th>Subtotal</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['carrinho'] as $id => $item): ?>
          <tr>
            <td><?php echo htmlspecialchars($item['nome']); ?></td>
            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
            <td><?php echo $item['quantidade']; ?></td>
            <td>R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
            <td><a href="carrinho.php?remover=<?php echo $id; ?>" class="btn">Remover</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p class="total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
    <a href="finalizar.php" class="btn">Finalizar Compra</a>
  <?php endif; ?>
</main>

<footer>
  <p style="text-align:center; color:#555; margin:20px 0;">
    © 2025 Cafeteria Toca do Sabor Café & Cia — Todos os direitos reservados.
  </p>
</footer>

</body>
</html>