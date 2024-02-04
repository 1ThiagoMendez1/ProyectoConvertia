<?php

// Clase para iniciar la sesión
class sessionStart {
    // Método para iniciar la sesión
    public function session(){
        // Iniciar la sesión
        session_start();
        // Verificar si la variable de sesión está vacía
        if (empty($_SESSION["name"])){
            // Redirigir al usuario a la página de inicio en caso de que la variable de sesión esté vacía
            header("location: /proyectoconvertia/");
        }
    }
}

?>