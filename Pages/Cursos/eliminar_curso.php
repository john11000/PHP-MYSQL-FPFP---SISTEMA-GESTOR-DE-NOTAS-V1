<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "curso.php";
curso::eliminar($_GET["id"]);
header("Location: mostrar_cursos.php");