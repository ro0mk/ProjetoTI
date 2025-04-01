<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:5;url=index.php");
  die("Acesso restrito.");
}

$logs_temperatura = file_get_contents("api/files/temperatura/log.txt");
$logs_humidade = file_get_contents("api/files/humidade/log.txt");
$logs_luz = file_get_contents("api/files//luz/log.txt");
$logs_entradas = file_get_contents("api/files//entradas/log.txt");
$logs_saidas = file_get_contents("api/files//saidas/log.txt");
$logs_ac = file_get_contents("api/files//ac/log.txt");
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
      <h1>Dashboard: Histórico</h1>
      <h6>Utilizador: <?php echo $username; ?></h6> <!-- Displaying the dynamic username here -->
    </div>
  </div>
  
  <div class="container" id="container-tabela">
    <div class="row">
      <div class="card" id="fundo" >
        <div class="card-header"id="fundo"><p>Histórico de Sensores</p></div>
        <div class="card-body" >
          <table class="table" >
            <thead>
              <tr>
                <th scope="col" id="fundo"><a href="sensores.php">Temperatura</a></th>
                <th scope="col"id="fundo"><a href="sensores.php">Humidade</a></th>
                <th scope="col"id="fundo"><a href="sensores.php">Luzes</a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td ><?php echo $logs_temperatura; ?></td>
                <td ><?php echo $logs_humidade; ?></td>
                <td ><?php echo $logs_luz; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="container-tabela">
    <div class="row">
      <div class="card" id="fundo" >
        <div class="card-header"id="fundo"><p>Histórico de Atuadores</p></div>
        <div class="card-body" >
          <table class="table" >
            <thead>
              <tr>
                <th scope="col" id="fundo"><a href="atuadores.php">Registo de Entradas</a></th>
                <th scope="col"id="fundo"><a href="atuadores.php">Registo de Saidas</a></th>
                <th scope="col"id="fundo"><a href="atuadores.php">Ar Condicionado</a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td ><?php echo $logs_entradas; ?></td>
                <td ><?php echo $logs_saidas; ?></td>
                <td ><?php echo $logs_ac; ?></td>
              </tr>
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
