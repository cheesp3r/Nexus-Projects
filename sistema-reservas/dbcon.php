<?php
/* Dados do Banco de Dados a conectar */
$servername = "162.241.2.133";
$database = "cheesper_nexus";
$username = "cheesper_admin";
$password = "aw96b6k13751";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo "<script> console.log('Erro ao Conectar ao MySql') </script>";
    die("Connection failed: " . mysqli_connect_error());
}

echo "<script> console.log('Conectado ao MySql') </script>";
?>