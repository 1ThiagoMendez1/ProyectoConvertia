
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesIndexUss.css">
    <title>Inventario convertía</title>
</head>

<body>

    <div class="cont-all" id="cont-all">

        <center>
            <a href="../../config/close_session.php">
                <h4 style="color: greenyellow;">SALIR</h4>
            </a>
            <a href="">
                <h4 style="color: white;">User Connected: <?php echo "{$_SESSION["name"]}"?></h4>
            </a>
            <div class="logo"></div>
            <h1><span style="color: #3d6864;">CONVERTÍA</span>-<span style="color: #80d186;">INVENTARIO</span></h1>
            <h3>Sistema de gestión de inventario del área de IT - Colombia</h3>
        </center>

        <header>
            <a href="#">Usuarios</a>
            <a href="#">Inventario Bodega</a>
            <a href="#">Inventario operaciones</a>
            <a href="#">Modificaciones</a>
            <a href="#">Autorizaciones</a>
            <a href="#">Operaciones</a>
        </header>

        <!-- Contenedor para las operaciones. -->

        <button onclick="abrirVentanaEmergente()">Agregar</button>

        <div class="cont-operaciones">

            <a href="./img/claro.png">
                <div class="claro"></div>Claro Hogar
            </a>
        </div>

        <div id="myModal">
            <div class="modal-content">
                <!-- Contenido de la ventana emergente -->
                <p onclick="cerrarVentanaEmergente()" class="close"></p>

                <p class="logo-convertia"></p>
                <h3 id="title-oper">Formulario para el registro de operaciones</h3>

                <form id="registroForm" method="POST" enctype="multipart/form-data">
                    <label for="nombre">Nombre de la operación:</label>
                    <input type="text" id="nombre" name="nombre" required><br><br>

                    <label for="file">Imagen de la operación:</label>
                    <input type="file" id="file" value="Elegir archivo" name="file-ope">

                    <input type="submit" value="Registrar" name="btn-regOper">
                </form>
            </div>
        </div>

    </div>

        <footer>
            <section>
                <p class="dAutor">©2021 Convertia - Intelligent Customer Acquisition. All Rights Reserved</p>
            </section>
        </footer>

    </div>

</body>

<script>
// Función para abrir la ventana emergente
function abrirVentanaEmergente() {
    document.getElementById("myModal").style.display = "block";
    document.getElementById("cont-all").style.display = blur(4);
}

// Función para cerrar la ventana emergente
function cerrarVentanaEmergente() {
    document.getElementById("myModal").style.display = "none";
}
</script>

</html>
