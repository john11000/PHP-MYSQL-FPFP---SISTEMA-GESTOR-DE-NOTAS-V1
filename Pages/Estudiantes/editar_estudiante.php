<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "estudiante.php";
include_once "../../componentes/encabezado.php";
$estudiante = estudiante::obtenerUno($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-h5 text-muted">Editar estudiante</h1>
        <form action="actualizar_estudiante.php" method="POST" class="col-6 mx-auto">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nombre1" class="text-primary">Primer nombre</label>
                <input value="<?php echo $estudiante->nombre1 ?>" name="nombre1" required type="text" id="nombre1" class="form-control btn-outline-primary" placeholder="Primer nombre">
            </div>
            <div class="form-group">
                <label for="nombre2" class="text-primary">Segundo nombre</label>
                <input value="<?php echo $estudiante->nombre2 ?>" name="nombre2" type="text" id="nombre2" class="form-control btn-outline-primary" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <label for="apellido1" class="text-primary">Primer Apellido</label>
                <input value="<?php echo $estudiante->apellido1 ?>" name="apellido1" required type="text" id="apellido1" class="form-control btn-outline-primary" placeholder="Primer apellido">
            </div>
            <div class="form-group">
                <label for="apellido2" class="text-primary">Segundo Apellido</label>
                <input value="<?php echo $estudiante->apellido2 ?>" name="apellido2" required type="text" id="apellido2" class="form-control btn-outline-primary" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <label for="grado" class="text-primary">Grado: </label>
                <select name="grado" id="grado" class="form-control btn-outline-primary">
                    <?php
                        $grado=$estudiante->grado;

                        echo '<option value="'.$grado.'">'.$grado.'</option>';
                        $query = $mysqli -> query ("SELECT * FROM grados");
                        
                        while ($valores = mysqli_fetch_array($query))
                        {
                            if($valores['nombre']!=$grado)
                            {
                                echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
                            }
                            
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="curso" class="text-primary">Curso</label>
                <select name="curso" id="curso" class="form-control btn-outline-primary">
                    <?php
                        $curso=$estudiante->curso;

                        echo '<option value="'.$curso.'">'.$curso.'</option>';

                        $query = $mysqli -> query ("SELECT * FROM cursos");
                        
                        while ($valores = mysqli_fetch_array($query))
                        {
                            if($valores['nombre']!=$curso)
                            {
                                echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
                            }
                        }
                    ?>
                </select>
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