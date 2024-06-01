<?php
require 'conexion.php';

// Verificar si se ha enviado el formulario de recuperación de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Correo"])) {
    $email = filter_var($_POST["Correo"], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        // Consulta para buscar el usuario en la base de datos
        $consulta = "SELECT * FROM tblusuarios WHERE correo = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Generar código de recuperación
            $codigoRecuperacion = rand(100000, 999999); // Considera usar una opción más segura

            // Actualizar el código de recuperación en la base de datos para el usuario
            $updateQuery = "UPDATE tblusuarios SET TokenRecuperacion = ? WHERE Correo = ?";
            $updateStmt = $conexion->prepare($updateQuery);
            $updateStmt->bind_param("ss", $codigoRecuperacion, $email);
            $update = $updateStmt->execute();

            if ($update) {
                // Enviar correo electrónico
                $para = $email;
                $asunto = "Recuperación de Contraseña";
                $mensaje = "Tu código de recuperación es: " . $codigoRecuperacion;
                $cabeceras = 'From: tucorreo@dominio.com'; // Asegúrate de cambiar esto por tu dirección de correo real

                if (mail($para, $asunto, $mensaje, $cabeceras)) {
                    // Redireccionar de vuelta a la misma página con un parámetro en la URL
                    header("Location: /FrontEnd/html/Inicio sesión/Recuperar Contraseña.html?correo-enviado=true");
                    exit();
                } else {
                    echo "Error al enviar el correo.";
                }
            } else {
                echo "Error al actualizar el código de recuperación.";
            }
        } else {
            echo "El correo electrónico no está registrado.";
        }
    } else {
        echo "El formato del correo electrónico no es válido.";
    }

    // Ejecutar la consulta para actualizar el código de recuperación en la base de datos
    $updateStmt->execute();

    // Verificar si la consulta afectó filas (si se actualizó correctamente)
    if ($updateStmt->affected_rows > 0) {
        // El código de actualización fue exitoso
    } else {
        // Hubo un error al actualizar el código de recuperación
    }
}

// Verificar si se ha enviado el formulario de verificación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
    // Procesar el código de verificación y restablecer la contraseña
    // Agrega tu lógica aquí
    // Supongamos que el código se verificó correctamente y ahora queremos redirigir al usuario a la página de restablecimiento de contraseña
    header("Location: /FrontEnd/html/Inicio sesión/Recuperar contraseña.html");
    exit();
}

/// Verificar si se ha enviado el formulario de restablecimiento de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"]) && isset($_POST["recontra"])) {
    // Procesar el restablecimiento de contraseña
    $password = $_POST["password"];
    $recontra = $_POST["recontra"];

    if ($password != $recontra) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Agrega aquí la lógica para actualizar la contraseña en la base de datos.
    // Por ejemplo:
    $consultaActualizar = "UPDATE tblusuarios SET Contraseña = ? WHERE TokenRecuperacion = ?";
    $stmtActualizar = $conexion->prepare($consultaActualizar);
    $stmtActualizar->bind_param("ss", $password, $codigoRecuperacion);
    $resultadoActualizar = $stmtActualizar->execute();

    if ($resultadoActualizar) {
        echo "Contraseña cambiada con éxito.";
    } else {
        echo "Error al cambiar la contraseña: " . $stmtActualizar->error; // Imprime el mensaje de error específico
    }
}
?>