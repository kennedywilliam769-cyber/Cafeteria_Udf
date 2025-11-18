<?php
session_start();

// Limpa o carrinho após finalizar
unset($_SESSION['carrinho']);
unset($_SESSION['contador_carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .sucesso-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            text-align: center;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }

        .sucesso-container h2 {
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .sucesso-container p {
            font-size: 18px;
            margin-bottom: 25px;
            color: #444;
        }

        .btn-voltar {
            display: inline-block;
            background: #8B4513;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-voltar:hover {
            background: #A0522D;
        }
    </style>
</head>
<body>

<div class="sucesso-container">
    <h2>Compra realizada com sucesso! ✔️</h2>
    <p>Obrigado por comprar na <strong>Toca do Sabor Café & Cia</strong>!</p>

    <a href="index.php" class="btn-voltar">Voltar para o início</a>
</div>

</body>
</html>