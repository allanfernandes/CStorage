<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #dc3545; 
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Remover Estoque</h2>
        <?php
        $db = new SQLite3('atividadephp.db');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os dados do formulário
            $produto = $_POST['produto'];
            $quantidade = $_POST['quantidade'];

            try {
                // Verifica se o produto está presente no estoque
                $stmt_check = $db->prepare('SELECT * FROM estoque WHERE produto = :produto');
                $stmt_check->bindValue(':produto', $produto);
                $result = $stmt_check->execute();

                // Se o produto não estiver presente no estoque, exibe uma mensagem de erro
                if (!$result->fetchArray()) {
                    echo "O produto '$produto' não está disponível no estoque.";
                } else {
                    // Prepara e executa a instrução SQL para remover a quantidade especificada do estoque
                    $stmt = $db->prepare('UPDATE estoque SET quantidade = quantidade - :quantidade WHERE produto = :produto');
                    $stmt->bindValue(':quantidade', $quantidade);
                    $stmt->bindValue(':produto', $produto);
                    $stmt->execute();

                    // Exibe uma mensagem informando que o estoque foi removido
                    echo "Estoque do produto '$produto' removido com sucesso!";
                
                }
            } catch (Exception $e) {
                // Em caso de erro, mostra mensagem de erro
                echo "Erro ao remover o estoque: " . $e->getMessage();
            }
        }
        ?>
        <form method="post">
            <label for="produto">Produto:</label>
            <input type="text" id="produto" name="produto" required>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
            <button type="submit">Remover Estoque</button> 
            <button onclick="window.location.href = 'estoqueatual.php';">Voltar</button>
        </form>
    </div>
</body>
</html>
