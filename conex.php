<?php
header("Access-Control-Allow-Origin: *"); //para ejecutar este archivo desde cualquier origen

$dbHost = 'localhost';
$dbUsername = 'jose';
$dbPassword = 'josepl46';
$dbDatabase = 'bd_usuario';
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

// probar conexión
/*if($conn){
    echo "
    <head>
        <meta charset='UTF-8'>
        <meta 'http-equiv=X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='author' content='fortrainevolution.com'>
        <link rel='shortcut icon' href='./imagenes/logo6.png'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.7.0/hint.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css'>
        <link rel='stylesheet' href='./estilos.css' type='text/css'>
        <link href='https://fonts.cdnfonts.com/css/modern-age' rel='stylesheet'>
        <title>G.0.A.L chat</title>
    </head>
    <h3 class='bg-success'>todo bien</h3>";
}else{
    echo "<h3 class='bg-danger'>todo mal</h3>";
}*/

$consulta = "SELECT ID FROM ajedrez WHERE estado = 'incompleta'";

$resultado = mysqli_query($conn, $consulta);

$numero = mysqli_num_rows($resultado);

if($numero == 0){
    $consulta = "INSERT INTO ajedrez (jugador1, jugador2, estado) VALUES (0, 0, 'incompleta')";
    $resultado = mysqli_query($conn, $consulta);

    $consulta = "SELECT MAX(ID) FROM ajedrez";
    $resultado = mysqli_query($conn, $consulta);
    $ident = mysqli_fetch_row($resultado);

    echo "<h3 class='bg-primary'>$ident[0]</h3><br>";
    echo "<h3 class='bg-primary'>-----------</h3><br>";
    echo "<h3 class='bg-primary'>jugador uno</h3>";
}else{
    $ident = mysqli_fetch_row($resultado);
    $consulta = "UPDATE ajedrez SET estado='completa' WHERE ID='$ident[0]'";
    $resultado = mysqli_query($conn, $consulta);

    echo "<h3 class='bg-primary'>$ident[0]</h3>";
    echo "<h3 class='bg-primary'>----------</h3>";
    echo "<h3 class='bg-primary'>jugador dos</h3>";

}
