<?php
header('Content-Type: text/html; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    echo "Recebi um POST";
    print_r($_POST);
    if (isset($_POST['valor'], $_POST['hora'], $_POST['nome'])) {
        file_put_contents("files/" . $_POST['nome'] . "/valor.txt", $_POST['valor']);
        file_put_contents("files/" . $_POST['nome'] . "/hora.txt", $_POST['hora']);
        file_put_contents("files/" . $_POST['nome'] . "/log.txt", $_POST['hora'] . ";" . $_POST['valor'] . PHP_EOL, FILE_APPEND);
    } else {
        http_response_code(400);
        echo "Faltam parametros no POST";
    }
} elseif ($method == "GET") {
    echo "Recebi um GET";
    if (isset($_GET['nome'])) {
        if ($nome == "temperatura" || $nome == "humidade" || $nome == "luz" || $nome == "ac" || $nome == "entradas" || $nome == "saidas") {
            echo file_get_contents("files/" . $_GET['nome'] . "/valor.txt");
        } else {
            http_response_code(400);
            echo "Parametros errados";
        }
    } else {
        http_response_code(403);
        echo "Sem acesso";
    }
} else {
    http_response_code(403);
    echo "Metodo nao permitido";
}
