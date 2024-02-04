<?php
class Operaciones {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrarDatos($nombre, $idUsuario, $archivo) {
        $query = "INSERT INTO operaciones (OpeNombre, OpeFechaCreacion, OpeUsuCreadorID, Opeimage) VALUES (?, NOW(), ?, ?)";
        $stmt = $this->conexion->prepare($query);
    
        // Bind de parámetros
        // La imagen se bindea como un string (s) en lugar de un integer (i)
        $stmt->bind_param("sis", $nombre, $idUsuario, $archivo);
    
        // Ejecutar la consulta
        return $stmt->execute();
    }
}
?>
