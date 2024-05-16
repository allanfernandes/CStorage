        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Estoque Atual</title>
            <style>
                /* Estilos CSS aqui */
                table {
                    border-collapse: collapse;
                    width: 50%;
                    margin: 20px auto;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
                td:nth-child(2) {
                text-align: center;
                }
                th:nth-child(2) {
                text-align: center;
                }    
                /* Estilo das células da primeira coluna */
                td:nth-child(odd) {
                    background-color: #f9f9f9;
                }
                /* Estilo das células da segunda coluna */
                td:nth-child(even) {
                    background-color: #f0f0f0;
                }
                .button-container {
                    text-align: center;
                }
                .button-container button {
                    display: inline-block;
                    margin: 10px;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                .button-container button:hover {
                    background-color: #0056b3;
                }
                .logout-button {
                    background-color: #dc3545;
                }
                .logout-button:hover {
                    background-color: #c82333;
                }
    </style>
</head>
<body>
    <?php
    try {
        // Conexão com o banco de dados SQLite
        $db = new SQLite3('atividadephp.db');

        // Criação da tabela "estoque" se ela não existir
        $db->exec('CREATE TABLE IF NOT EXISTS estoque (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            produto TEXT NOT NULL,
            quantidade INTEGER NOT NULL
        )');

        // Query para selecionar todos os registros da tabela "estoque"
        $result = $db->query('SELECT * FROM estoque');

        // Verifica se existem registros
        if ($result->numColumns() > 0) {
            echo "<table>";
            echo "<tr><th>Produto</th><th>Quantidade</th></tr>";
            // Itera sobre os resultados e exibe cada registro na tabela
            while ($row = $result->fetchArray()) {
                echo "<tr>";
                echo "<td>" . $row['produto'] . "</td>";
                echo "<td>" . $row['quantidade'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum produto cadastrado no estoque.";
        }
    } catch (Exception $e) {
        // Em caso de erro, mostra mensagem de erro
        echo "Erro ao acessar o banco de dados: " . $e->getMessage();
    }
    ?>
    <div class="button-container">
    <button onclick="window.location.href = 'adicionarestoque.php';">Adicionar Estoque</button>
        <button onclick="window.location.href = 'removerestoque.php';">Remover Estoque</button>
        <button type="button" onclick="window.location.href = 'proximaentrega.php';">Próxima Entrega de Mercadoria</button>
          <button class="Sair" onclick="window.location.href = 'index.php';">Sair</button>
    </div>
</body>
</html>
