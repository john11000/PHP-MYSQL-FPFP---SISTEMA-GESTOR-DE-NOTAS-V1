<?php
class curso
{
    private $id, $nombre, $grado;

    public function __construct($id, $nombre, $grado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->grado = $grado;
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO cursos (id, nombre, grado) VALUES (?, ?, ?)");
        $sentencia->bind_param("iss", $this->id, $this->nombre, $this->grado);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT id, nombre, grado FROM cursos");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUna($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre, grado FROM cursos WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("UPDATE cursos set nombre=?, grado=? where id=?");
        $sentencia->bind_param("ssi", $this->nombre, $this->grado, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM cursos WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}