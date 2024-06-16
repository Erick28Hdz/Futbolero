<?php
require 'conexion.php';

// Verificar si ya hay una sesión activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para obtener el rol desde la tabla de roles
if (!function_exists('obtenerRol')) {
    function obtenerRol($conexion, $idRol) {
        try {
            $sql = "SELECT Nombre FROM tblroles WHERE IdRol = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $idRol);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows == 1) {
                $row = $resultado->fetch_assoc();
                return $row['Nombre']; // Retorna el nombre del rol
            } else {
                return "Rol no encontrado"; // Manejo de caso donde no se encuentra el rol
            }
        } catch (Exception $e) {
            error_log("Error al obtener rol: " . $e->getMessage());
            return "Error al obtener el rol";
        }
    }
}

// Inicializar variables para evitar errores de variable indefinida
$usuario = '';
$rol = '';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Consulta para usuarios
    try {
        $sql_usuario = "SELECT * FROM tblusuarios WHERE Correo = ?";
        $stmt_usuario = $conexion->prepare($sql_usuario);
        $stmt_usuario->bind_param("s", $usuario);
        $stmt_usuario->execute();
        $resultado_usuario = $stmt_usuario->get_result();

        // Si se encuentra el usuario en la tabla de usuarios
        if ($resultado_usuario->num_rows == 1) {
            $usuario_info = $resultado_usuario->fetch_assoc();
            $contrasena_hash = $usuario_info['Contraseña'];
            $fkidrol = $usuario_info['FKIDRoles'] ?? null;

            if (is_null($fkidrol)) {
                error_log("FKIDRoles no está definido para el usuario con correo: " . $usuario);
                echo "Inicio de sesión fallido. No se encontró el rol del usuario.";
                exit();
            }

            if (password_verify($contrasena, $contrasena_hash)) {
                $rol = obtenerRol($conexion, $fkidrol); // Obtener rol de la tabla roles
                
                if ($rol == "Rol no encontrado" || $rol == "Error al obtener el rol") {
                    echo "Inicio de sesión fallido. No se encontró el rol del usuario.";
                    exit();
                }

                $_SESSION['Correo'] = $usuario;
                $_SESSION['TipoUsuario'] = 'Regular';
                $_SESSION['Rol'] = $rol;

                echo "<script>";
                echo "localStorage.setItem('usuario', '" . $usuario . "');";
                echo "localStorage.setItem('rol', '" . $rol . "');";
                echo "</script>";

                header('Location: /FrontEnd/html/Inicio_sesion/Inicio.html');
                exit();
            } else {
                echo "Inicio de sesión fallido. La contraseña es incorrecta.";
                exit();
            }
        }

        // Consulta para trabajadores
        $sql_trabajador = "SELECT * FROM tbltrabajadores WHERE CorreoElectronico = ?";
        $stmt_trabajador = $conexion->prepare($sql_trabajador);
        $stmt_trabajador->bind_param("s", $usuario);
        $stmt_trabajador->execute();
        $resultado_trabajador = $stmt_trabajador->get_result();

        // Si se encuentra el trabajador en la tabla de trabajadores
        if ($resultado_trabajador->num_rows == 1) {
            $trabajador_info = $resultado_trabajador->fetch_assoc();
            $contrasena_hash = $trabajador_info['Contraseña'];
            $fkidrol = $trabajador_info['FKIDRoles'] ?? null;

            if (is_null($fkidrol)) {
                error_log("FKIDRoles no está definido para el trabajador con correo: " . $usuario);
                echo "Inicio de sesión fallido. No se encontró el rol del trabajador.";
                exit();
            }

            if (password_verify($contrasena, $contrasena_hash)) {
                $rol = obtenerRol($conexion, $fkidrol); // Obtener rol de la tabla roles
                
                if ($rol == "Rol no encontrado" || $rol == "Error al obtener el rol") {
                    echo "Inicio de sesión fallido. No se encontró el rol del trabajador.";
                    exit();
                }

                $_SESSION['Correo'] = $usuario;
                $_SESSION['TipoUsuario'] = 'Trabajador';
                $_SESSION['Rol'] = $rol;

                echo "<script>";
                echo "localStorage.setItem('usuario', '" . $usuario . "');";
                echo "localStorage.setItem('rol', '" . $rol . "');";
                echo "</script>";

                header('Location: /FrontEnd/html/Administradores/Administrador.html');
                exit();
            } else {
                echo "Inicio de sesión fallido. La contraseña es incorrecta.";
                exit();
            }
        }

        echo "Inicio de sesión fallido. El usuario no existe.";
    } catch (Exception $e) {
        error_log("Error en el proceso de inicio de sesión: " . $e->getMessage());
        echo "Ocurrió un error en el inicio de sesión. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>