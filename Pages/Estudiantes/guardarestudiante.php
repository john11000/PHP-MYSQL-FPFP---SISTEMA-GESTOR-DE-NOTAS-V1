<?php
    
?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "estudiante.php";
$estudiante = new estudiante($_POST["id"], $_POST["nombre1"], $_POST["nombre2"], $_POST["apellido1"], $_POST["apellido2"], $_POST["grado"], $_POST["curso"]);
$estudiante->guardar();
header("Location: mostrar_estudiantes.php");