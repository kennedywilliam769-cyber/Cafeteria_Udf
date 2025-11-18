<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>♨️ Toca do Sabor Café & Cia ♨️</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js" defer></script>
</head>
<body>

  <?php include 'header.php'; ?>

  <section class="hero">
    <div class="carrossel-container">
      <div class="carrossel-slide">
        <img src="img/cafe1.jpg" alt="Café 1">
        <img src="img/cafe3.jpg" alt="Café 2">
        <img src="img/Cheesecake.jpg" alt="Café 3">
        <img src="img/cafe4.png.png" alt="Café 4">
      </div>
      <div class="hero-texto">
        <h1>Bem-vindo à <br><span>♨️ Toca do Sabor Café <br> & Cia ♨️</span></h1>
        <p>O mais puro café artesal de Brasília!</p>
      </div>
      <button class="seta seta-esquerda">⟵</button>
      <button class="seta seta-direita">⟶</button>
    </div>
  </section>

  <main id="produtos" class="produtos-container">
    <h2>Confira nosso produtos mais vendidos</h2>
    <div class="produtos-lista">

      <div class="produto">
        <img src="img/cafe1.png.png" alt="Café Espresso">
        <div class="produto-info">
          <h3>Café Espresso</h3>
          <p>Um clássico para quem tem pressa e ama o puro café.</p>
          <div class="produto-footer">
            <span class="preco">R$ 4,00</span>
            <div class="add-carrinho">
              <input type="number" value="1" min="1" class="qtd-input">
              <button class="btn-add-carrinho" data-id="1" data-nome="Café Espresso" data-preco="8">Adicionar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="produto">
        <img src="img/cafe3.png.png" alt="Cappuccino">
        <div class="produto-info">
          <h3>Cappuccino</h3>
          <p>Café cremoso e delicioso para seu dia começar melhor.</p>
          <div class="produto-footer">
            <span class="preco">R$ 6,00</span>
            <div class="add-carrinho">
              <input type="number" value="1" min="1" class="qtd-input">
              <button class="btn-add-carrinho" data-id="2" data-nome="Cappuccino" data-preco="6">Adicionar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="produto">
        <img src="img/bolo.png.jpg" alt="Bolo de Chocolate">
        <div class="produto-info">
          <h3>Bolo de Chocolate</h3>
          <p>Para acompanhar seu cafezinho, que tal um bolo delicioso?</p>
          <div class="produto-footer">
            <span class="preco">R$ 5,00</span>
            <div class="add-carrinho">
              <input type="number" value="1" min="1" class="qtd-input">
              <button class="btn-add-carrinho" data-id="4" data-nome="Bolo de Chocolate" data-preco="5">Adicionar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="produto">
        <img src="img/cafe2.png.png" alt="Cookies">
        <div class="produto-info">
          <h3>Cookies</h3>
          <p>Crocancia e docura no ponto certo.</p>
          <div class="produto-footer">
            <span class="preco">R$ 5,00</span>
            <div class="add-carrinho">
              <input type="number" value="1" min="1" class="qtd-input">
              <button class="btn-add-carrinho" data-id="5" data-nome="Cookies" data-preco="5">Adicionar</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

<?php
  // Lista de produtos disponíveis
$produtos = [
  ["id" => 1, "nome" => "Café Espresso", "preco" => 8.00, "img" => "img/cafe1.png.png"],
  ["id" => 2, "nome" => "Cappuccino", "preco" => 10.00, "img" => "img/cafe3.png.png"],
  ["id" => 3, "nome" => "Mocha", "preco" => 12.00, "img" => "img/mocha.png.jpg"],
  ["id" => 4, "nome" => "Latte", "preco" => 9.00, "img" => "img/latte.png.webp"],
  ["id" => 5, "nome" => "Brownie", "preco" => 7.00, "img" => "img/Brownie.png.jpg"],
  ["id" => 6, "nome" => "Cheesecake", "preco" => 11.00, "img" => "img/Cheesecake.png.jpg"]
];

// Adicionar produto ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {
    $id = $_POST['produto_id'];
    $quantidade = (int)$_POST['quantidade'];

    foreach ($produtos as $produto) {
        if ($produto['id'] == $id) {
            if (!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = [];

            // Se já existe o produto no carrinho, soma a quantidade
            if (isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
            } else {
                $_SESSION['carrinho'][$id] = [
                    "nome" => $produto['nome'],
                    "preco" => $produto['preco'],
                    "quantidade" => $quantidade
                ];
            }
        }
    }

    // Atualiza o contador de produtos no header
    $_SESSION['contador_carrinho'] = array_sum(array_column($_SESSION['carrinho'], 'quantidade'));

}
?>
<main class="produtos-container">
  <h2>Todos os Produtos</h2>
  <div class="carrossel-produtos-container">

    <button class="carrossel-btn esquerda">⟵</button>

    <div class="carrossel-produtos">
        <?php foreach ($produtos as $p): ?>
          <div class="produto">
            <img src="<?= $p['img'] ?>" alt="<?= $p['nome'] ?>">
            <div class="produto-info">
              <h3><?= $p['nome'] ?></h3>
              <p>Experimente o sabor do nosso <?= strtolower($p['nome']) ?>.</p>
              <div class="produto-footer">
                <span class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                <form method="post">
                  <input type="hidden" name="produto_id" value="<?= $p['id'] ?>">
                  <input type="number" name="quantidade" value="1" min="1">
                  <button type="submit" class="btn-adicionar">Adicionar</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>

    <button class="carrossel-btn direita">⟶</button>

</div>

</main>





  <footer id="contato">
    <p>© 2025 Toca do Sabor Café & Cia & Sabor — Todos os direitos reservados.</p>
    <p>Contato: <a href="mailto:contato@tocadosabor.com">contato@tocadosabor.com</a></p>
  </footer>

  <!-- Script que chama adicionar_ao_carrinho.php e atualiza o contador do header -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const botoes = document.querySelectorAll('.btn-add-carrinho');

      botoes.forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          const nome = btn.dataset.nome;
          const preco = btn.dataset.preco;
          const quantidadeInput = btn.parentElement.querySelector('.qtd-input');
          const quantidade = quantidadeInput ? parseInt(quantidadeInput.value) : 1;

          // Cria corpo POST
          const body = `id=${encodeURIComponent(id)}&nome=${encodeURIComponent(nome)}&preco=${encodeURIComponent(preco)}&quantidade=${encodeURIComponent(quantidade)}`;

          fetch('adicionar_carrinho.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: body
          })
          .then(res => res.json())
          .then(data => {
            if (data.status === 'ok') {
              const contadorEl = document.getElementById('contador-carrinho');
              if (contadorEl) contadorEl.innerText = data.qtd;
              btn.textContent = 'Adicionado!';
              btn.disabled = true;
              setTimeout(() => { btn.textContent = 'Adicionar'; btn.disabled = false; }, 800);
            } else {
              alert('Erro ao adicionar ao carrinho.');
            }
          })
          .catch(err => {
            console.error('Erro fetch:', err);
            alert('Erro ao conectar com o servidor.');
          });
        });
      });
    });
  </script>

</body>
</html>