<?php
session_start();

$users = array(
    "estoque@login.com" => "123456789"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

     if (isset($users[$email]) && $users[$email] === $password) {
            // Credenciais válidas: define mensagem de sucesso
            $_SESSION['message'] = 'Login successful!';
            $_SESSION['message_type'] = 'success';
            // Redireciona para a página de estoque (ou outra página de sua escolha)
            header('Location: estoqueatual.php');
            exit();
        } else {
            // Credenciais inválidas: define mensagem de erro
            $_SESSION['message'] = 'Invalid email or password';
            $_SESSION['message_type'] = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial';
            padding: 0 15px;
        }

        .box_login {
            width: 500px;
            height: 300px;
            background: #A9A9A9;
            border: 0;
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
            color: #FFF;
            text-align: left;
            margin: 15px 0 20px 15px;
            font-weight: 500;
        }

        form input {
            margin: 0 20px;
            width: calc(100% - 40px);
            padding: 10px 15px;
            border: 0;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            color: #6D4BFC;
        }

        form .btn-login {
            margin: 0 20px;
            width: calc(100% - 40px);
            background: #0000FF;
            color: #FFF;
            border: 0;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 20px;
        }

        .error {
            background-color: #F44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="box_login">
        <h1>Faça seu login</h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="E-MAIL" required>
            <input type="password" name="password" placeholder="SENHA" required>
            <button type="submit" class="btn-login">LOGAR</button>
        </form>
    </div>
</body>
</html>
