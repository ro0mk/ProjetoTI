<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:5;url=index.php");
  die("Acesso restrito.");
}

$valor_temperatura = file_get_contents("../API/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("../API/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("../API/files/temperatura/nome.txt");
$valor_humidade = file_get_contents("../API/files/humidade/valor.txt");
$hora_humidade = file_get_contents("../API/files/humidade/hora.txt");
$nome_humidade = file_get_contents("../API/files/humidade/nome.txt");
$valor_luz = file_get_contents("../API/files/luz/valor.txt");
$hora_luz = file_get_contents("../API/files/luz/hora.txt");
$nome_luz = file_get_contents("../API/files/luz/nome.txt");
//echo ($nome_temperatura . ". : ." . $valor_temperatura . ". ºC em ." . $hora_temperatura);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Sensores</title>
  <link rel="stylesheet" href="../CSS/header.css">
  <link rel="shortcut icon" href="../IMG/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>

<body>

  <header>
        <div class="header-wrap">

            <div class="logo-container"><a href="index.php"><img src="../img/logo.svg" alt="logo"></a></div>

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
      <h1>Dashboard: Sensores</h1>
      <h6>Utilizador: <?php echo $username; ?></h6> <!-- Displaying the dynamic username here -->
    </div>
  </div>
  <div class="container">
    <div class="row" >
      <div class="col-sm">
        <div class="card text-center "id="fundo">
          <div class="card-header sensor">Temperatura: <?php echo $valor_temperatura; ?></div>
          <div class="card-body"><img src="../IMG/temperature-high.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b> <?php echo $hora_temperatura; ?> <a href="historico.php" >Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header sensor">Humidade: <?php echo $valor_humidade; ?></div>
          <div class="card-body"><img src="../IMG/humidity-high.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b><?php echo $hora_humidade; ?><a href="historico.php"> Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header atuador">Luzes: <?php echo $valor_luz; ?></div>
          <div class="card-body"><img src="../IMG/light-on.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b><?php echo $hora_luz; ?> <a href="historico.php">Histórico</a></div>
        </div>
      </div>
    </div>


  </div>
  <br>
  <div class="container" id="container-tabela">
    <div class="row">
      <div class="card" id="fundo" >
        <div class="card-header"id="fundo"><p>Tabela de Sensores</p></div>
        <div class="card-body" >
          <table class="table" >
            <thead>
              <tr>
                <th scope="col" id="fundo">Tipo de Dispositivo IoT</th>
                <th scope="col"id="fundo">Valor</th>
                <th scope="col"id="fundo">Data de Atualização</th>
                <th scope="col"id="fundo">Estado</th>
                <th scope="col"id="fundo">Alertas</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td ><?php echo $nome_temperatura; ?></td>
                <td><?php echo $valor_temperatura; ?></td>
                <td><?php echo $hora_temperatura; ?></td>
                <td>Normal</td>
                <td><span class="badge rounded-pill text-bg-danger" >Elevada</span> </td>
              </tr>
              <tr>
              <td ><?php echo $nome_humidade; ?></td>
                <td><?php echo $valor_humidade; ?></td>
                <td><?php echo $hora_humidade; ?></td>
                <td>Normal</td>
                <td><span class="badge rounded-pill text-bg-primary">Normal</span></td>
              </tr>
              <tr>
              <td ><?php echo $nome_luz; ?></td>
                <td><?php echo $valor_luz; ?></td>
                <td><?php echo $hora_luz; ?></td>
                <td>Ativo</td>
                <td><span class="badge rounded-pill text-bg-success">Ativo</span> </td>
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
