<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "../../componentes/encabezado.php";
include_once "estudiante.php";

$cont=0;

if (!empty($_POST)) 
{
    $valor=$_POST['campo'];

    if(!empty($valor))
    {
        $consulta="SELECT id, nombre1, nombre2, apellido1, apellido2, grado, curso FROM estudiantes WHERE id=$valor";
        $resultado=$mysqli->query($consulta);
        $cont++;
    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>Información del estudiante</h1>
        <a href="formulario_registro_estudiante.php" class="btn btn-info my-2">Nuevo</a>
        <?php 
            if($cont > 0){
                    foreach ($resultado as $estudiante) { ?>
            <a href="pdfsolo_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-info my-2">Generar Reporte</a>
        <?php }}?>
        <a href="mostrar_estudiantes.php" class="btn btn-info my-2">Mostrar todos</a>

        <form action="estudiante_buscar.php" method="POST">
            <div class="form-group">
                <input class="input_busqueda" type="number" name="campo" id="campo" placeholder="Identificación del estudiante">
                <input name="buscar" type="submit" id="buscar" value="Buscar" class="btn btn-info">
            </div>
        </form>
    </div>

    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>1º Nombre</th>
                    <th>2º Nombre</th>
                    <th>1º Apellido</th>
                    <th>2º Apellido</th>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Notas</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($cont > 0){
                foreach ($resultado as $estudiante) { ?>
                    <tr>
                        <td><?php echo $estudiante["id"] ?></td>
                        <td><?php echo $estudiante["nombre1"] ?></td>
                        <td><?php echo $estudiante["nombre2"] ?></td>
                        <td><?php echo $estudiante["apellido1"] ?></td>
                        <td><?php echo $estudiante["apellido2"] ?></td>
                        <td><?php echo $estudiante["grado"] ?></td>
                        <td><?php echo $estudiante["curso"] ?></td>
                        <td>
                            <a href="notas_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td>
                        <td>
                            <a href="editar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="eliminar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "pie.php";