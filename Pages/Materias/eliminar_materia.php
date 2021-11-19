<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "materia.php";
Materia::eliminar($_GET["id"]);
header("Location: mostrar_materias.php");