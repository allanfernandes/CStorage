<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Remessas</title>
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
        /* Centralizar números na tabela */
        td:nth-child(2) {
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
    </style>
</head>
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
<body>
    <table>
        <tr>
            <th>Produto</th>
            <th>Quantidade de entrega da remessa</th>
        </tr>
        <tr>
            <td>Macarrão</td>
            <td>10</td>
        </tr>
        <tr>
            <td>Arroz</td>
            <td>15</td>
        </tr>
        <tr>
            <td>Feijão</td>
            <td>20</td>
        </tr>
        <tr>
            <td>Óleo</td>
            <td>5</td>
        </tr>
    </table>
    <button onclick="window.location.href = 'estoqueatual.php';">Voltar</button>
</body>
</html>
