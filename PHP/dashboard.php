<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:5;url=index.php");
  die("Acesso restrito.");
}

$nome_utilizadores = file_get_contents("api/files/utilizadores/nome.txt");
$valor_utilizadores = file_get_contents("api/files/utilizadores/valor.txt");
$hora_utilizadores = file_get_contents("api/files/utilizadores/hora.txt");
$nome_clientes = file_get_contents("api/files/clientes/valor.txt");
$valor_clientes = file_get_contents("api/files/clientes/valor.txt");
$hora_clientes = file_get_contents("api/files/clientes/hora.txt");
$nome_ginasios = file_get_contents("api/files/ginasios/valor.txt");
$valor_ginasios = file_get_contents("api/files/ginasios/valor.txt");
$hora_ginasios = file_get_contents("api/files/ginasios/hora.txt");

$nome_pacote_estudante = file_get_contents("api/files/pacotes/nome_estudante.txt");
$valor_pacote_estudante = file_get_contents("api/files/pacotes/valor_estudante.txt");
$preco_pacote_estudante = file_get_contents("api/files/pacotes/preco_estudante.txt");

$nome_pacote_familiar = file_get_contents("api/files/pacotes/nome_familiar.txt");
$valor_pacote_familiar = file_get_contents("api/files/pacotes/valor_familiar.txt");
$preco_pacote_familiar = file_get_contents("api/files/pacotes/preco_familiar.txt");

$nome_pacote_singular = file_get_contents("api/files/pacotes/nome_singular.txt");
$valor_pacote_singular = file_get_contents("api/files/pacotes/valor_singular.txt");
$preco_pacote_singular = file_get_contents("api/files/pacotes/preco_singular.txt");
//echo ($nome_temperatura . ". : ." . $valor_temperatura . ". ºC em ." . $hora_temperatura);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Sensores</title>
  <link rel="stylesheet" href="../TI/CSS/header.css">
  <link rel="shortcut icon" href="../TI/IMG/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>

<body style="background-color:#685f5f;">

  <header>
        <div class="header-wrap">

            <div class="logo-container"><a href="index.php"><img src="img/logo.svg" alt="logo"></a></div>

            <div class="menu">

                <a href="dashboard.php">Home</a>
                <a href="sensores.php">Sensores</a>
                <a href="atuadores.php">Atuadores</a>
                <a href="historico.php">Histórico</a>
</div>
<form action="logout.php" class="d-flex justify-content-end" role="search">
        <button type="submit" class="inscreve">Terminar Sessão</button>
      </form>
</div>
    </header>
  <div id="container-header"class="container d-flex justify-content-around align-items-center">
    <div id="title-header">
      <h1>Dashboard: Centro de Comandos</h1>
      <h6>Utilizador: <?php echo $username; ?></h6> <!-- Displaying the dynamic username here -->
    </div>
  </div>
  <div class="container">
    <div class="row" >
      <div class="col-sm">
        <div class="card text-center "id="fundo">
          <div class="card-header sensor">Quantidade de Utilizadores: </div>
          <div class="card-body" id="caixa-home"><span><?php echo $valor_utilizadores; ?></span></div>
          <div class="card-footer"><b>Atualização</b> <?php echo $hora_utilizadores; ?> <a href="historico.php" >Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header sensor">Quantidade de Clientes:</div>
          <div class="card-body"id="caixa-home"><span> <?php echo $valor_clientes; ?></span> </div>
          <div class="card-footer"><b>Atualização</b><?php echo $hora_clientes; ?><a href="historico.php"> Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header atuador">Quantidade de Ginasios:</div>
          <div class="card-body"id="caixa-home"><span> <?php echo $valor_ginasios; ?></span></div>
          <div class="card-footer"><b>Atualização</b><?php echo $hora_ginasios; ?> <a href="historico.php">Histórico</a></div>
        </div>
      </div>
    </div>
  

    <div class="container" id="container-tabela">
    <div class="row">
      <div class="card" id="fundo" >
        <div class="card-header"id="fundo"><p>Tabela de Clientes</p></div>
        <div class="card-body" >
          <table class="table" >
            <thead>
              <tr>
                <th scope="col" id="fundo">Tipo de Subscrição </th>
                <th scope="col"id="fundo">Quantidade de Clientes</th>
                <th scope="col"id="fundo">Preço</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td ><?php echo $nome_pacote_estudante; ?></td>
                <td><?php echo $valor_pacote_estudante; ?></td>
                <td><?php echo $preco_pacote_estudante; ?></td>
              </tr>
              <tr>
              <tr>
                <td ><?php echo $nome_pacote_familiar; ?></td>
                <td><?php echo $valor_pacote_familiar; ?></td>
                <td><?php echo $preco_pacote_familiar; ?></td>
              </tr>
              <tr>
              <tr>
                <td ><?php echo $nome_pacote_singular; ?></td>
                <td><?php echo $valor_pacote_singular; ?></td>
                <td><?php echo $preco_pacote_singular; ?></td>
              </tr>
              <tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <div class="data-hoje">
  <?php
  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

  echo "Data de Hoje: " . $dia . '/' . $mes . '/' . $ano;

  ?></div>
</body>

</html>
