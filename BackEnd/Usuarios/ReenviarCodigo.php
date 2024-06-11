<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__ . '/../Bibliotecas/vendor/autoload.php';

// Función para reenviar el código de verificación
function reenviarCodigo($nombre, $correo, $conexion)
{
    try {
        // Generar un nuevo token de verificación
        $nuevoToken = bin2hex(random_bytes(10));

        // Actualizar el token en la base de datos
        $actualizarToken = "UPDATE tblusuarios SET Token = ? WHERE Correo = ?";
        $stmtActualizarToken = $conexion->prepare($actualizarToken);
        $stmtActualizarToken->bind_param("ss", $nuevoToken, $correo);
        $stmtActualizarToken->execute();
        $stmtActualizarToken->close();

        // Envíar correo electrónico con el nuevo código
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ganador.futbolero@gmail.com'; // Cambiar por tu dirección de correo Gmail
        $mail->Password = 'dznrbdlgoynqmduz'; // Cambiar por tu contraseña de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('tu_correo@gmail.com', 'FUTBOLERO tú ganador');
        $mail->addAddress($correo, $nombre); // Correo del usuario registrado
        $mail->Subject = 'Nuevo código';
        $mail->Body = "Hola $nombre,\n\nPara completar tu registro, ingresa el siguiente código en la página de verificación: $nuevoToken";
        $mail->send();

        // Retornar el nuevo token
        return $nuevoToken;
    } catch (Exception $e) {
        return false; // Retorna falso si hay un error al enviar el correo
    }
}

// Verificar si se ha proporcionado un correo en el formulario
if (isset($_POST['Correo'])) {
    $correo = $_POST['Correo'];

    // Imprimir el valor del correo para verificar si llega correctamente
    echo "Correo proporcionado en el formulario: $correo";


    // Validar el formato del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico proporcionado no es válido.";
        exit();
    }

    // Consulta para buscar el usuario en la base de datos
    $consulta = "SELECT * FROM tblusuarios WHERE Correo = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con el correo proporcionado
    if ($result->num_rows === 1) {
        // Obtener el nombre del usuario
        $usuario = $result->fetch_assoc();
        $nombre = $usuario['Nombre'];

        // Reenviar el código de verificación
        $nuevoToken = reenviarCodigo($nombre, $correo, $conexion);

        if ($nuevoToken !== false) {
            echo "Se ha reenviado un nuevo código a tu correo electrónico.";
            // Aquí podrías mostrar el nuevo token para fines de depuración (puedes omitir esto en producción)
            // echo "Nuevo código: $nuevoToken";
        } else {
            echo "Hubo un error al enviar el correo electrónico. Por favor, inténtalo de nuevo más tarde.";
        }
    } else {
        echo "No se encontró ningún usuario con este correo electrónico.";
    }
} else {
    // Mostrar un mensaje de error si no se proporcionó ningún correo en el formulario
    echo "El correo electrónico no se ha proporcionado.";
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>
