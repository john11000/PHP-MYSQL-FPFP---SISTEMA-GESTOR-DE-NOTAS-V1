<?php

?>
<?php
include_once "../../MYSQLDB/conexion.php";
include_once "../../componentes/encabezado.php";
include_once "estudiante.php";
//obtener cantidad de estudiantes
$consulta = "SELECT * FROM estudiantes";
$resultado = $mysqli->query($consulta);
$cantidad = $resultado->num_rows;

//determinar cantidad de paginas a crear
$total_mostrar = 3;
$pagina = $cantidad / $total_mostrar;

?>
<div class="row">
    <div class="col-12">
        <h1 class="text-h4 text-muted text-uppercase" style="font-size: 1.5rem;">Listado de estudiantes</h1>


        <form action="estudiante_buscar.php" method="POST" class="col-6 mx-auto">
            <div class="form-group">
                <input class=" form-control my-1" type="number" name="campo" id="campo" placeholder="Identificación del estudiante">
                <input name="buscar" type="submit" id="buscar" value="Buscar" class="btn btn-primary form-control">
            </div>
            <a href="formulario_registro_estudiante.php" class="btn btn-primary my-2">añadir<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg></a>
            <a href="generarpdf_estudiante.php" class="btn btn-primary my-2">Generar pdf <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                </svg></a>

        </form>
    </div>

    <?php

    $page  = 1;


    if (isset($_GET['pagina'])) {
        $page = $_GET['pagina'];
    }

    if ($page > $total_mostrar || $page <= 0) {
        header("Location: mostrar_estudiantes.php?pagina=1");
    }

    $iniciar = ($page - 1) * $total_mostrar;
    $resultado = $mysqli->query("SELECT * FROM estudiantes LIMIT $iniciar,$total_mostrar");
    $consulta = $resultado->fetch_all(MYSQLI_ASSOC);
    $estudiantes = $consulta;
    ?>
    <div class="mx-auto">
        <table class="table table-responsive table-striped shadow table-hover  table-bordered">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Nº Identificación</th>
                    <th>1º Nombre</th>
                    <th>2º Nombre</th>
                    <th>1º Apellido</th>
                    <th>2º Apellido</th>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Ver notas</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante) { ?>
                    <tr>
                        <td><?php echo $estudiante["id"] ?></td>
                        <td><?php echo $estudiante["nombre1"] ?></td>
                        <td><?php echo $estudiante["nombre2"] ?></td>
                        <td><?php echo $estudiante["apellido1"] ?></td>
                        <td><?php echo $estudiante["apellido2"] ?></td>
                        <td><?php echo $estudiante["grado"] ?></td>
                        <td><?php echo $estudiante["curso"] ?></td>

                        <td>
                            <a href="editar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="eliminar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="notas_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
                                    <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="col-6 mx-auto text-center ">
        <nav aria-label="Page navigation-dark example" class="col-12">
            <ul class="paginacion col-12 mx-2">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="mostrar_estudiantes.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                        Anterior
                    </a>
                </li>

                <?php for ($i = 0; $i < $pagina; $i++) { ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                        <a class="page-link" href="mostrar_estudiantes.php?pagina=<?php echo $i + 1 ?>">
                            <?php echo $i + 1 ?>
                        </a>
                    </li>
                <?php } ?>

                <li class="page-item <?php echo $_GET['pagina'] >= $pagina ? 'disabled' : '' ?>"><a class="page-link" href="mostrar_estudiantes.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a></li>
            </ul>
        </nav>

    </div>

</div>
<div class="text-center">

    <?php
    include_once "../../componentes/pie.php";
    ?>
</div>