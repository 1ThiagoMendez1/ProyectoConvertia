<?php

class CloseSession {
    public function closeSession() {
        session_start();
        session_destroy();
        header("location: /proyectoconvertia/");
    }
}

?>