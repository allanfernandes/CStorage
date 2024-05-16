<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Estoque</title>
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
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adicionar Estoque</h2>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os dados do formulário
            $produto = $_POST['produto'];
            $quantidade = $_POST['quantidade'];

            try {
                // Conexão com o banco de dados SQLite
                $db = new SQLite3('atividadephp.db');

                // Criação da tabela "estoque" se ela não existir
                $db->exec('CREATE TABLE IF NOT EXISTS estoque (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    produto TEXT NOT NULL,
                    quantidade INTEGER NOT NULL
                )');

                // Prepara a instrução SQL de inserção
                $stmt = $db->prepare('INSERT INTO estoque (produto, quantidade) VALUES (:produto, :quantidade)');
                // Atribui os valores dos parâmetros
                $stmt->bindValue(':produto', $produto);
                $stmt->bindValue(':quantidade', $quantidade);

                // Executa a instrução SQL
                $stmt->execute();

                // Exibe a mensagem de sucesso
                echo "Item adicionado ao estoque com sucesso!";
            } catch (Exception $e) {
                // Em caso de erro, mostrar mensagem de erro
                echo "Erro ao inserir os dados no banco de dados: " . $e->getMessage();
            }
        }
        ?>
        <form method="post">
            <label for="produto">Produto:</label>
            <input type="text" id="produto" name="produto" required>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
            <button type="submit">Adicionar Estoque</button>
            <button onclick="window.location.href = 'estoqueatual.php';">Voltar</button>
        </form>
    </div>
</body>
</html>
