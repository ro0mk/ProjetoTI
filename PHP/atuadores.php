<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:5;url=index.php");
  die("Acesso restrito.");
}

$valor_entradas = file_get_contents("../API/files/entradas/valor.txt");
$hora_entradas = file_get_contents("../API/files/entradas/hora.txt");
$nome_entradas = file_get_contents("../API/files/entradas/nome.txt");
$valor_saidas = file_get_contents("../API/files/saidas/valor.txt");
$hora_saidas = file_get_contents("../API/files/saidas/hora.txt");
$nome_saidas = file_get_contents("../API/files/saidas/nome.txt");
$valor_ac = file_get_contents("../API/files/ac/valor.txt");
$hora_ac = file_get_contents("../API/files/ac/hora.txt");
$nome_ac = file_get_contents("../API/files/ac/nome.txt");
//echo ($nome_temperatura . ". : ." . $valor_temperatura . ". ºC em ." . $hora_temperatura);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Atuadores</title>
  <link rel="stylesheet" href="../CSS/header.css">
  <link rel="shortcut icon" href="../IMG/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>

<body>

 <header>
        <div class="header-wrap">

            <div class="logo-container"><a href="index.php"><img src="../IMG/logo.svg" alt="logo"></a></div>

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
  <div id="container-header" class="container d-flex justify-content-around align-items-center">
    <div id="title-header">
      <h1>Dashboard: Atuadores</h1>
      <h6>Utilizador: <?php echo $username; ?></h6> <!-- Displaying the dynamic username here -->
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="card text-center" id="fundo">
          <div class="card-header sensor">Registo de Entradas: <?php echo $valor_entradas; ?> Clientes</div>
          <div class="card-body"><img src="../IMG/entrada.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b> <?php echo $hora_entradas; ?> <a href="historico.php">Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header sensor">Registo de Saídas: <?php echo $valor_saidas; ?> Clientes</div>
          <div class="card-body"><img src="../IMG/saida.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b> <?php echo $hora_saidas; ?>  <a href="historico.php">Histórico</a></div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card text-center"id="fundo">
          <div class="card-header atuador">Ar Condicionado: <?php echo $valor_ac; ?></div>
          <div class="card-body"><img src="../IMG/ac.png" alt=""></div>
          <div class="card-footer"><b>Atualização</b> <?php echo $hora_ac; ?>  <a href="historico.php">Histórico</a></div>
        </div>
      </div>
    </div>


  </div>
  <br>
  <div class="container" id="container-tabela">
    <div class="row">
      <div class="card" id="fundo">
        <div class="card-header"><p>Tabela de Atuadores</p></div>
        <div class="card-body">
          <table class="table ">
            <thead>
              <tr>
                <th scope="col"id="fundo">Tipo de Dispositivo IoT</th>
                <th scope="col"id="fundo">Valor</th>
                <th scope="col"id="fundo">Data de Atualização</th>
                <th scope="col"id="fundo">Média Diária</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $nome_entradas; ?></td>
                <td><?php echo $valor_entradas; ?></td>
                <td><?php echo $hora_entradas; ?></td>
                <td><span class="badge rounded-pill text-bg-danger">Abaixo da Média</span> </td>
              </tr>
              <tr>
              <td><?php echo $nome_saidas; ?></td>
                <td><?php echo $valor_saidas; ?></td>
                <td><?php echo $hora_saidas; ?></td>
                <td><span class="badge rounded-pill text-bg-primary">Dentro da Média</span></td>
              </tr>
              <tr>
              <td><?php echo $nome_ac; ?></td>
                <td><?php echo $valor_ac; ?></td>
                <td><?php echo $hora_ac; ?></td>
                <td><span class="badge rounded-pill text-bg-success">Acima da Média</span> </td>
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
