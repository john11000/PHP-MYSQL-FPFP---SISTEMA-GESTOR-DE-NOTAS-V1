<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "grado.php";
include_once "../../componentes/encabezado.php";
include_once "../Cursos/curso.php";
$grado = grado::obtenerUna($_GET["id"]);
$grados = $grado->id;
?>
<div class="row">
    <div class="col-12">
        <h1>Editar grado</h1>
        <form action="actualizar_grado.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $grado->nombre ?>" name="nombre" required type="text" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg></button>
            </div>
        </form>
    </div>
</div>
<?php include_once "../../componentes/pie.php" ?>