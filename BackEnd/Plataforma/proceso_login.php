<?php
require 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Buscar en la tabla de usuarios
    $sql_usuario = "SELECT * FROM tblusuarios WHERE Correo = '$usuario'";
    $resultado_usuario = $conexion->query($sql_usuario);

    // Si se encuentra el usuario en la tabla de usuarios
    if ($resultado_usuario->num_rows == 1) {
        $usuario_info = $resultado_usuario->fetch_assoc();
        if ($usuario_info['Contraseña'] == $contrasena) {
            $_SESSION['Correo'] = $usuario;
            $_SESSION['TipoUsuario'] = 'Regular';
            $_SESSION['Rol'] = $usuario_info['Rol']; // Guardar el rol del usuario
            header('Location: /FrontEnd/html/Inicio_sesion/Inicio.html');
            exit();
        } else {
            echo "Inicio de sesión fallido. La contraseña es incorrecta.";
            exit();
        }
    }

    // Buscar en la tabla de trabajadores si no se encuentra el usuario en la tabla de usuarios
    $sql_trabajador = "SELECT * FROM tbltrabajadores WHERE CorreoElectronico = '$usuario'";
    $resultado_trabajador = $conexion->query($sql_trabajador);

    // Si se encuentra el usuario en la tabla de trabajadores
    if ($resultado_trabajador->num_rows == 1) {
        $trabajador_info = $resultado_trabajador->fetch_assoc();
        if ($trabajador_info['Contraseña'] == $contrasena) {
            $_SESSION['Correo'] = $usuario;
            $_SESSION['TipoUsuario'] = 'Trabajador';
            $_SESSION['Rol'] = $trabajador_info['Rol']; // Guardar el rol del trabajador
            $_SESSION['Area'] = $trabajador_info['Area']; // Guardar el área del trabajador
            header('Location: /FrontEnd/html/Administradores/Administrador.html');
            exit();
        } else {
            echo "Inicio de sesión fallido. La contraseña es incorrecta.";
            exit();
        }
    }

    // Si no se encuentra el usuario en ninguna de las tablas
    echo "Inicio de sesión fallido. El usuario no existe.";
}

// Guardar la información de la sesión en localStorage
echo "<script>";
echo "localStorage.setItem('usuario', '" . $usuario . "');";
echo "localStorage.setItem('rol', '');"; // Establecer el rol en blanco por defecto
echo "</script>";
?>