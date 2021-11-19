<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "grado.php";
grado::eliminar($_GET["id"]);
header("Location: mostrar_grados.php");