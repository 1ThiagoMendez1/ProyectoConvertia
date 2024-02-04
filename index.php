<?php 
    require 'config/dbConexion.php';
    require 'config/close_session.php';
    require 'controller/rutasController.php';

    define('VIEWS_PATH', __DIR__ . '/view/pages');
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($uri) {
        case '/proyectoconvertia/':
            $controller = new PostsController();
            $controller->index();
            break;
            
        case '/proyectoconvertia/view/pages/usuarios.php':
            $operaciones = new PostsController();
            $operaciones->insertarOperacion();
            
            break;

        case '/proyectoconvertia/config/close_session.php':
            $cerrarSesion = new CloseSession();
            $cerrarSesion->closeSession();
            break;


        default:
            http_response_code(404);
            echo "Página no encontradaaaa";
            break;
    }
    
?>



