<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "curso.php";
$curso = new curso($_POST["id"], $_POST["nombre"], $_POST["grado"]);
$curso->actualizar();
header("Location: mostrar_cursos.php");