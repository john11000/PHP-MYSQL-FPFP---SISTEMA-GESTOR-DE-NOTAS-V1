<?php

?>
<?php
class estudiante
{
    private $id, $nombre1, $nombre2, $apellido1, $apellido2, $grado, $curso;

    public function __construct($id, $nombre1, $nombre2, $apellido1, $apellido2, $grado, $curso)
    {
        $this->id = $id;
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->grado = $grado;
        $this->curso = $curso;
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO estudiantes (id, nombre1, nombre2, apellido1, apellido2, grado, curso) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sentencia->bind_param('isssssi', $this->id, $this->nombre1, $this->nombre2, $this->apellido1, $this->apellido2, $this->grado, $this->curso);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT id, nombre1, nombre2, apellido1, apellido2, grado, curso FROM estudiantes");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUno($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre1, nombre2, apellido1, apellido2, grado, curso FROM estudiantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update estudiantes set nombre1=?, nombre2=?, apellido1=?, apellido2=?, grado=?, curso=? where id=?");
        $sentencia->bind_param('sssssii', $this->nombre1, $this->nombre2, $this->apellido1, $this->apellido2, $this->grado, $this->curso, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM estudiantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}