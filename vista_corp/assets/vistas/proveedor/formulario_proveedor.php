<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="stylesheet" href="../../css/formulario_registro.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>
    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar proveedor</b></h3>
        </div>
        <form action="../../controladores/proveedor/registrar_proveedor.php" method="POST" >
        
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" requered>
                <label for="floatingInputidentificacion">Identificacion:</label>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:15px;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" requered>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="telefono" type="number" class="form-control cuadro_texto1" id="floatingInputtelefono" placeholder="telefono" requered>
                <label for="floatingInputtelefono">Telefono:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="correo" requered>
                <label for="correo">Correo electronico:</label> 
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" requered>
                <label for="usuario">Usuario:</label>
                <div id="result_usuario" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:15px !important;">
                <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="contraseña" requered>
                <label for="contraseña">Contraseña:</label>
                <div id="result_contraseña" style="color:red; font-size:15px;"></div>
            </div>

            <button type="submit" class="submit" name="guardar_proveedor">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>
<script src="../../js/validaciones.js"></script>
</body>
</html>
