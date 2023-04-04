<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "mateus";
//Criar Conexão
$mysqli = new mysqli($servidor, $usuario, $senha, $dbname);
//Check
if ($mysqli->connect_errno){
    echo "Connect Failed" . $mysqli->connect_error;
    exit();
}
?>
