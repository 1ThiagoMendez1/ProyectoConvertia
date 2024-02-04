<?php

// $server="localhost";
// $pwd="";
// $usuario="root";
// $basedatos="inventarioconvertia";

// try{
//     $conn = new PDO("mysql:host=$server; dbname=$basedatos;", $usuario, $pwd);
// } catch (PDOexception $e) {
//     die('Connected failed: '. $e->getMessage());
// }


$conexion = new mysqli("localhost:3307", "root", "", "inventarioconvertia");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
