<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "materia.php";
$materia = new materia($_POST["id"], $_POST["nombre"]);
$materia->actualizar();
header("Location: mostrar_materias.php");