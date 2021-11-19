<?php
$host = "localhost";
$usuario = "root";
$pass = "";
$bd = "notas";
$mysqli = new mysqli($host, $usuario, $pass, $bd);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>