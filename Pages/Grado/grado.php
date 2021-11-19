<?php
class grado
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
        $sentencia = $mysqli->prepare("INSERT INTO grados (id, nombre) VALUES (?, ?)");
        $sentencia->bind_param("is", $this->id, $this->nombre);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT id, nombre FROM grados");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUna($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre FROM grados WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("UPDATE grados set nombre=? where id=?");
        $sentencia->bind_param("si", $this->nombre, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM grados WHERE id = ?");
        $sentencia->bind_param("i", $id);

        $sentencia2 = $mysqli->prepare("DELETE FROM cursos_grados WHERE id_grado = ?");
        $sentencia2->bind_param("i", $id);
        
        $sentencia->execute();
        $sentencia2->execute();

    }
}