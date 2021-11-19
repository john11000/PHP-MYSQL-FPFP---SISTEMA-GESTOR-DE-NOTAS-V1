<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "../../componentes/encabezado.php";
include_once "estudiante.php";
include_once "../Materias/materia.php";
include_once "../notas/nota.php";
$estudiante = estudiante::obtenerUno($_GET["id"]);
$materias = materia::obtener();
$notas = nota::obtenerDeEstudiante($estudiante->id);
$materiasConCalificacion = nota::combinar($materias, $notas);
?>
<div class="row">
    <div class="col-12">
        <h1>Notas de :  <?php echo $estudiante->nombre1." ".$estudiante->nombre2." ". $estudiante->apellido1." ".$estudiante->apellido2 ?></h1>
    </div>
    <div class="col-8  mx-auto table-responsive">
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0;
                foreach ($materiasConCalificacion as $materia) {
                    $sumatoria += $materia["puntaje"];
                ?>
                    <tr>
                        <td>
                            <?php echo utf8_encode($materia["nombre"]); ?> 
                        </td>
                        <td>
                            <form action="modificar_nota.php" method="POST" class="form-inline">
                                <input type="hidden" value="<?php echo $estudiante->id ?>" name="id_estudiante">
                                <input type="hidden" value="<?php echo $materia["id"] ?>" name="id_materia">
                                <input value="<?php echo $materia["puntaje"] ?>" required min="0" max="5" step="0.01" name="puntaje" placeholder="Escriba la calificación" type="number" class="form-control">
                                <button class="btn btn-primary mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>PROMEDIO:</td>
                    <td>
                        <strong>
                            <?php
                            $promedio = $sumatoria / count($materias);
                            $promedio=number_format($promedio,2);
                            echo $promedio;
                            ?>
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
include_once "../../componentes/pie.php";