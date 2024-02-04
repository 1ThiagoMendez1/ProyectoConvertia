<?php
class Operaciones {
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function registrarDatos($nombre, $email) {
        $query = "INSERT INTO operaciones (OpeNombre, OpeDate, OpeUsuCreator  ) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $nombre, $email);
        return $stmt->execute();
    }
}
?>