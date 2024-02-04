<?php

class Consultar {

    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //Método para el login
    public function login($usuario, $contrasena){
        
        $query = "SELECT * FROM usuarios WHERE UsuNombre = ? AND UsuContrasenia = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            session_start();
            $_SESSION['name'] = $usuario;
            return true;
        } else {
            return false;
        }
    }

    //Función para registrar operaciones.
    
    public function registrarDatos($nombre, $idUsuario, $archivo) {
        $query = "INSERT INTO operaciones (OpeNombre, OpeFechaCreacion, OpeUsuCreadorID, Opeimage) VALUES (?, NOW(), ?, ?)";
        $stmt = $this->conexion->prepare($query);
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Bind de parámetros con tipos de datos adecuados
            $stmt->bind_param("sis", $nombre, $idUsuario, $archivo);
            
            // Ejecutar la consulta preparada
            $stmt->execute();
            
            // Verificar si la inserción fue exitosa
            if ($stmt->affected_rows > 0) {
                return true; // Éxito
            } else {
                ?>
                    <script>
                        alert("Datos registrados correctamente");
                    </script>
                <?php            
            }

        } else {
            // Manejar el error si la preparación de la consulta falló
            return false; // Fallo
        }
    }


    //Método para obtener el ID del usuario actual
    public static function getIdUsuarioActual() { 

        session_start();
        $nombre = $_SESSION['name'];
        $sql = "SELECT UsuID FROM usuarios WHERE UsuNombre = '$nombre'";      
        $sql = $this->conexion->query($sql);
        $id = $sql->fetch_assoc();
        
        return $id['UsuID'];
        echo $id;


    }
    




    // public function insertar($tabla, $data){
    //     $consulta="insert into ".$tabla." values(null,". $data .")";
    //     $resultado=$this->db->query($consulta);
    //     if ($resultado) {
    //         return true;
    //     }else {
    //         return false;
    //     }
    //  }

    // public function mostrar($tabla,$condicion){
    //     $consul="SELECT * FROM ".$tabla." WHERE ".$condicion.";";
    //         $resu=$this->db->query($consul);
    //         while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
    //             $this->personas[]=$filas;
    //         }
    //         return $this->personas;
    // } 

    // public function actualizar($tabla, $data, $condicion){       
    //     $consulta="update ".$tabla." set ". $data ." where ".$condicion;
    //     $resultado=$this->db->query($consulta);
    //     if ($resultado) {
    //         return true;
    //     }else {
    //         return false;
    //     }
    // }
    
    // public function eliminar($tabla, $condicion){
    //     $eli="delete from ".$tabla." where ".$condicion;
    //     $res=$this->db->query($eli);
    //     if ($res) {
    //         return true; 
    //     }else {
    //         return false;
    //     }
    // }







    
}