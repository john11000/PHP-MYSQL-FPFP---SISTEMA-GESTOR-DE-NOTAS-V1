<?php
class materia
{
    private $id, $nombre;

    public function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO materias (id, nombre) VALUES (?, ?)");
        $sentencia->bind_param("is", $this->id, $this->nombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT id, nombre FROM materias");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUna($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre FROM materias WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("UPDATE materias set nombre=? where id=?");
        $sentencia->bind_param("si", $this->nombre, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM materias WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}