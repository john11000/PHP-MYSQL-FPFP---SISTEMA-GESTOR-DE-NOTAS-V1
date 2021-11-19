<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "estudiante.php";
Estudiante::eliminar($_GET["id"]);
header("Location: mostrar_estudiantes.php");