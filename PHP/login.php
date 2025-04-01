<?php
session_start();

function authenticate($username, $password)
{
    $users = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_password_hash) = explode(',', $user);
        if ($username === $stored_username && password_verify($password, $stored_password_hash)) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            echo "Por favor, preencha todos os campos!";
        } else {
            if (authenticate($username, $password)) {
                $_SESSION["username"] = $username;
                header('Location: index.php');
                exit();
            } else {
                echo "Usuário ou senha incorretos!";
            }
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Ginásio Inteligente</title>
</head>

<body>
    <header>
        <div class="header-wrap">

            <div class="logo-container"><a href="index.php"><img src="img/logo.svg" alt="logo"></a></div>

            <div class="menu">

                <a href="index.php">Home</a>

                <div class="menu-dropdown">
                    <button class="dropdown">Empresa <i class="fa fa-caret-down"></i></button>
                    <div class="conteudo-dropdown">
                        <a href="#">Sobre</a>
                        <a href="#">Localização</a>
                    </div>
                </div>

                <div class="menu-dropdown">
                    <button class=" dropdown">Saúde <i class="fa fa-caret-down"></i></button>
                    <div class="conteudo-dropdown">
                        <a href="#">Consultas de Nutrição</a>
                    </div>
                </div>

                <div class="menu-dropdown">
                    <button class="dropdown">Preços <i class="fa fa-caret-down"></i></button>
                    <div class="conteudo-dropdown">
                        <a href="#">Planos</a>
                        <a href="#">Merchandising</a>
                    </div>
                </div>

                <div class="menu-dropdown">
                    <button class="dropdown">Ajuda <i class="fa fa-caret-down"></i></button>
                    <div class="conteudo-dropdown">
                        <a href="#">Contactos</a>
                    </div>
                </div>

            </div>

            <div class="menu-direito">
                <div class="login-wrapper">
                    <?php if(isset($_SESSION["username"])): ?>
                        <a class="login" href="dashboard.php">Dashboard</a>
                    <?php else: ?>
                        <a class="login" href="login.php">Login</a>
                    <?php endif; ?>
                    <a class="inscreve " href="#">Inscreve-te</a>
                </div>

            </div>
        </div>
    </header>
    <div class="background">
        <div class="container">
            <div class="formbox">
                <h2>LOGIN</h2>
                <form method="post" action="login.php">
                    <div class="line"></div>
                    <div class="input_wrap">
                        <input type="text" name="username" required>
                        <label>Nome</label>
                    </div>
                    <div class="input_wrap">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="manter">
                        <label><input type="checkbox" name="manter_sessao"> Manter Sessão Iniciada</label>
                    </div>
                    <div class="inputbox">
                        <input type="submit" value="Login">
                    </div>
                    <div class="inputbox">
                        <p>Não tem uma conta ? <a href="#">Inscreve-te!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
