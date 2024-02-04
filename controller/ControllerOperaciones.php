<?php

include_once './model/ModelOperaciones.php';

class RegistroController {
    
    private $operaciones;

    public function __construct() {
        // Establecer la conexión a la base de datos
        $conexion = new mysqli("localhost:3307", "root", "", "inventarioconvertia");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        $this->operaciones = new Operaciones($conexion);
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $imagen = $_FILES['file-ope']['tmp_name'];
            $archivo = addslashes(file_get_contents($imagen));

            $idUsuario = 1;
            $resultado = $this->operaciones->registrarDatos($nombre, $idUsuario, $archivo);
            if ($resultado) {
                ?> 
                    <script>
                        console.log("Datos registrados correctamente");
                    </script>    
                <?php
            } else {
                ?> 
                    <script>
                        console.log("Datos pailas");
                    </script>    
                <?php
            }
        }
    }

    Método para obtener el ID del usuario actual
    private function getIdUsuarioActual() {
        $sql = "SELECT UsuID FROM usuarios WHERE nombre = '{$_SESSION['name']}'";
        $sql = $this->conexion->query($sql);
        $id = $sql->fetch_assoc();
        return $id['UsuID'];
        echo $id;
    }

}



?>