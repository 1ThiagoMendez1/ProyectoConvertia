<?php

require './model/consultas.php';


class PostsController
{
    /**
     * Función que envía todos los Post a la vista Home
     */
    public function index()
    {
        require './config/dbConexion.php';

        if (isset($_POST['btn-login'])) {

            $usuario = new Consultar($conexion);

            if ($usuario->login($_POST["name"], $_POST["password"])) {
                header("Location: ./view/pages/usuarios.php");
                exit();
            } else {
            ?>
                <script>
                    alert("Usuario o contraseña incorrectos");
                </script>
            <?php
            }
        }
        require VIEWS_PATH . '/home.php';
    }


    public function insertarOperacion()
    {

        require './config/dbConexion.php';
        if (isset($_POST['btn-regOper'])) {

            $operaciones = new Consultar($conexion);
            $consultar = new Consultar($conexion);

            if(strlen($_POST["nombre"]) > 0) {

                $nombre = $_POST["nombre"];

                $imagen = $_FILES['file-ope']['tmp_name'];
                $archivo = addslashes(file_get_contents($imagen));
                
                $idUsuario = $consultar->getIdUsuarioActual();
                $operaciones->registrarDatos($nombre, $idUsuario, $archivo);
                
            } else {
                echo "¡Algo fallo con el botón de registro de operaciones!";
            }

        }

        require VIEWS_PATH . '/usuarios.php';
    
    }







}


?>