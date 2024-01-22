<?php
//! Conectarse con la base de datos
include "../../conections/coneccion_tabla.php";

//! Condicion para cuando le de en el boton de guardar
if (isset($_POST["guardar_cliente"])) {

    //* Guardar los datos ingresados en el formulario en variable
    $id = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['correo'];

    //* Validar si el ID ya existe
    $consulta_existencia = "SELECT id FROM tbl_cliente WHERE id = '$id'";
    $id_existencia = mysqli_query($conn, $consulta_existencia);

    //* Validar si el correo ya existe
    $consulta_existencia = "SELECT correo FROM tbl_cliente WHERE correo = '$correo'";
    $correo_existencia = mysqli_query($conn, $consulta_existencia);

    //* Validar si el usuario ya existe
    $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario'";
    $usuario_existencia = mysqli_query($conn, $consulta_existencia);

    //* funcion para que el nombre solo lleve letras
    if (!preg_match('/^[a-zA-Z]+$/', $nombre)) {
        echo "El nombre solo debe contener letras. Por favor, verifica.";
    }

    $maxLongitudUsuario = 20; // Establece la longitud máxima del usuario
    if (strlen($usuario) > $maxLongitudUsuario) {
        echo "El nombre de usuario debe tener como máximo $maxLongitudUsuario caracteres.";
    }

    // Validar longitud de la contraseña
    $minLongitudContrasena = 6; // Establece la longitud mínima de la contraseña
    $maxLongitudContrasena = 20; // Establece la longitud máxima de la contraseña
    if (strlen($contraseña) < $minLongitudContrasena || strlen($contraseña) > $maxLongitudContrasena) {
        echo "La contraseña debe tener entre $minLongitudContrasena y $maxLongitudContrasena caracteres.";
    }

    //* Condicion de el ID existe o no
    elseif (mysqli_num_rows($id_existencia) > 0) {    
        echo "la identificacion ya esta registrada. Por favor, elige otro.";
    } 

    //* Condicion de el correo existe o no
    elseif(mysqli_num_rows($correo_existencia) > 0) {    
        echo "El correo ya esta registrado. Por favor, elige otro.";
    }

     //* Condicion de el ucuario existe o no
    elseif(mysqli_num_rows($usuario_existencia) > 0) {    
        echo "Este nombre de usuario ya esta registrado. Por favor, elige otro.";
    }

    else {
        
        //* Encriptar la contraseña
        $hashed_password = SHA1($contraseña);

        //! Consulta SQL para guardar la informacion del cliente en la base de datos
        $sql_cliente = "INSERT INTO `tbl_cliente`(`id`, `nombre`, `usuario`, `contraseña`, `correo`) VALUES ('$id', '$nombre','$usuario','$hashed_password','$correo')";
        echo "Consulta SQL Cliente: " . $sql_cliente; // Imprime la consulta SQL para depuración
        $result_cliente = mysqli_query($conn, $sql_cliente);

        //! Consulta SQL para mandar el usuario y contraseña a una tabla de usuario
        $sql_usuario = "INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES ('$id','$usuario', '$hashed_password','2')";
        echo "Consulta SQL Usuario: " . $sql_usuario; // Imprime la consulta SQL para depuración
        $result_usuario = mysqli_query($conn, $sql_usuario);

        //* Condicion de que si todo a sido correcto lo redireccione a la vista de la tabla
        if ($result_cliente && $result_usuario) {
            header("Location: ../../vistas/cliente/admin_cliente.php");
        } else {
            die("Error en la consulta: " . mysqli_error($conn));
        }
    }
}
?>
