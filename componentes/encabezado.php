<?php
/*encabezado*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estilos.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Sistemas de Notas</title>
</head>

<body>
    <nav class="navbar navbar-expand-md my-0 flex-md-column">
        <h1> <a class="navbar-brand text-bold text-uppercase fs-1 h1" style="font-size: 2rem;">Sistema de Notas</a></h1>
        <div class="collapse navbar-collapse mr-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-blue" href="../../Pages/Estudiantes/mostrar_estudiantes.php?pagina=1">Estudiantes</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="../Materias/mostrar_materias.php">Materias</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="../Grado/mostrar_grados.php">Grado</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="../Cursos/mostrar_cursos.php">Curso</a>
                </li>
            </ul>
        </div>

        
        <div class="dropdown d-block d-sm-none d-md-none">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
            <ul class="dropdown-menu dropdown">

                <li class="dropdown-item">
                    <a class=" text-blue" href="mostrar_estudiantes.php">Estudiantes</a>
                </li>

                <li class="dropdown-item ">
                    <a class="" href="mostrar_materias.php">Materias</a>
                </li>

                <li class="dropdown-item ">
                    <a class="" href="mostrar_grados.php">Grado</a>
                </li>

                <li class="dropdown-item ">
                    <a class="" href="mostrar_cursos.php">Curso</a>
                </li>
            </ul>

        </div>





    </nav>


    <hr>
    <main class="container-fluid text-center">