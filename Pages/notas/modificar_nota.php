<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "nota.php";
$nota = new nota($_POST["puntaje"], $_POST["id_estudiante"], $_POST["id_materia"]);
$nota->guardar();
header("Location: notas_estudiante.php?id=" . $_POST["id_estudiante"]);