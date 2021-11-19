<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "grado.php";
$grado = new grado($_POST["id"], $_POST["nombre"]);
$grado->actualizar();
header("Location: mostrar_grados.php");