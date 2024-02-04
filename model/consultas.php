<?php

class Consultar {

    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //Método para el login
    public function login($usuario, $contrasena){
        // Consulta SQL para verificar si el usuario y la contraseña existen en la base de datos.
        $query = "SELECT * FROM usuarios WHERE UsuNombre = ? AND UsuContrasenia = ?";
        // Preparar la consulta
        $stmt = $this->conexion->prepare($query);
        // Verificar si la preparación de la consulta fue exitosa
        $stmt->bind_param("ss", $usuario, $contrasena);
        // Ejecutar la consulta preparada
        $stmt->execute();
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();

        // Verificar si el resultado de la consulta es igual a 1, si es así, iniciar la sesión.
        if ($result->num_rows === 1) {  
            // Iniciar la sesión
            session_start();
            // Asignar el nombre de usuario a la variable de sesión
            $_SESSION['name'] = $usuario;
            // Retornar verdadero si el usuario y la contraseña existen en la base de datos.
            return true;
        } else {
            // Retornar falso si el usuario y la contraseña no existen en la base de datos.
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
                //Retornar verdadero si la inserción fue exitosa.
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
    public function getIdUsuarioActual() { 
            
        // Asignar la session a la variable de nombre
        $nombre = $_SESSION['name'];

        // Realizar una consulta sql en la que se obtenga el ID del usuario actual
        $sql = "SELECT UsuID FROM usuarios WHERE UsuNombre = '$nombre'";    
        // Ejecutar la consulta
        $resultado = $this->conexion->query($sql);
        
        // Verificar si la consulta fue exitosa o no. Si no, mostrar el error.
        if ($resultado === false) {
            die("Error en la consulta: " . $conexion->error);
        }

        // Obtener el resultado de la consulta y asignarlo a un array asociativo.
        $fila = $resultado->fetch_assoc();

        // Por último, retornar el ID del usuario actual.
        return $fila['UsuID'];
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