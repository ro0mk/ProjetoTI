<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/principal.css">
    <link rel="shortcut icon" href="../IMG/logo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/27dd9727ef.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

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
                <?php if(isset($_SESSION["username"])): ?>
                    <!-- If logged in -->
                    <a class="login" href="dashboard.php">Dashboard</a>
                    <a class="login" href="logout.php">Logout</a> <!-- Logout button -->
                <?php else: ?>
                    <!-- If logged out -->
                    <a class="login" href="login.php">Login</a>
                <?php endif; ?>
                <a class="inscreve " href="#">Inscreve-te</a>
            </div>
        </div>
    </header>
    

    <section id="hero" class="hero">
        <div class="container">
            <div class="hero-wrapper">
                <h1 class="heroheading">Lorem Ipsum is simply dummy text of the industry.</h1>
                <p class="herobody">Lorem Ipsum is simply dummy text of the industry.</p>
                <a href="#" class="herobtn">Inscreve-te</a>
            </div>
        </div>
    </section>

    <div id="container2" class="container2">
        <div class="photocontainer">
            <img src="img/index_img/pexels-leon-ardho-1552106.jpg" alt="fotodepessoaatreinar">
        </div>
        <div class="container2text">
            <h1 id="tituloslide">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
            <p id="textoslide" class="ctxt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>

            <a href="#" class="btnadere">
                <span class="btntextadere">Inscreve-te</span>
            </a>
        </div>
    </div>
</body>

</html>
