<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "../../componentes/encabezado.php";
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-h5 text-muted">Registro de estudiante</h1>
        <form action="guardarestudiante.php" method="POST" class="col-6 mx-auto">
            <div class="form-group">
                <label for="id">Número de identificación</label>
                <input name="id" required type="number" id="id" class="form-control btn-outline-primary" placeholder="Número de identificación">
            </div>
            <div class="form-group">
                <label for="nombre1">Primer nombre</label>
                <input name="nombre1" required type="text" id="nombre1" class="form-control btn-outline-primary" placeholder="Primer nombre">
            </div>
            <div class="form-group">
                <label for="nombre2">Segundo nombre</label>
                <input name="nombre2" type="text" id="nombre2" class="form-control btn-outline-primary" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <label for="apellido1">Primer Apellido</label>
                <input name="apellido1" required type="text" id="apellido1" class="form-control btn-outline-primary" placeholder="Primer apellido">
            </div>
            <div class="form-group">
                <label for="apellido2">Segundo Apellido</label>
                <input name="apellido2" required type="text" id="apellido2" class="form-control btn-outline-primary" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <label for="grado">Grado</label>
                <select name="grado" id="grado" class="form-control btn-outline-primary">
                    <?php
                    $query = $mysqli->query("SELECT * FROM grados");

                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="curso">Curso</label>
                <select name="curso" id="curso" class="form-control btn-outline-primary">
                    <?php
                    $query = $mysqli->query("SELECT * FROM cursos");

                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg></button>
            </div>
            <!--<div class="form-group">
                <a href="mostrar_estudiantes.php" class="btn btn-success">Volver</a>
            </div>-->
        </form>
    </div>
</div>
<?php include "../../componentes/pie.php" ?>