<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$preco = floatval($_POST['preco'] ?? 0);

if ($id && $nome && $preco > 0) {
    // Se o produto já existe no carrinho, aumenta a quantidade
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade']++;
    } else {
        $_SESSION['carrinho'][$id] = [
            'id' => $id,
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => 1
        ];
    }

    // Atualiza o contador de itens no carrinho
    $_SESSION['contador_carrinho'] = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $_SESSION['contador_carrinho'] += $item['quantidade'];
    }

    // Retorna a quantidade total para o JavaScript
    echo json_encode([
        'status' => 'ok',
        'qtd' => $_SESSION['contador_carrinho']
    ]);
} else {
    echo json_encode(['status' => 'erro']);
}