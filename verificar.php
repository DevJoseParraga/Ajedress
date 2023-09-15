<?php
header("Access-Control-Allow-Origin: *"); //para ejecutar este archivo desde cualquier origen

$dbHost = 'localhost';
$dbUsername = 'kike';
$dbPassword = 'peppapig9731';
$dbDatabase = 'bd_usuario';
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

$ident = $_POST["id"];

$consulta = "SELECT estado FROM ajedrez WHERE ID = id";
$resultado = mysqli_query($conn, $consulta);
$estado = mysqli_fetch_row($resultado);

echo $estado[0];

?>