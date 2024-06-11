<?php
require '../Plataforma/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el autoloader de Composer
require __DIR__ . '/../Bibliotecas/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $documento = $_POST['Documento'];
    $correo = $_POST['Correo'];
    $contraseña = $_POST['Contraseña'];
    $telefono = $_POST['Teléfono'];
    $pais = $_POST['País'];
    $ciudad = $_POST['Ciudad'];
    $genero = $_POST['Género'];
    $fechanacimiento = $_POST['FechaNacimiento'];

    // Verificar campos obligatorios
    if (empty($nombre) || empty($apellido) || empty($documento) || empty($correo) || empty($contraseña) || empty($telefono) || empty($pais) || empty($ciudad) || empty($genero) || empty($fechanacimiento)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Verifica si el correo ya existe en la base de datos
        $verificarCorreo = "SELECT COUNT(*) as total FROM tblusuarios WHERE Correo = ?";
        $stmtVerificar = $mysqli->prepare($verificarCorreo);
        $stmtVerificar->bind_param("s", $correo);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();

        if ($rowVerificar['total'] > 0) {
            // El correo ya existe, manejar el error o redirigir a una página de error
            echo "Error: El correo ya está registrado.";
        } else {
            // Generar token de verificación
            $token = bin2hex(random_bytes(8)); // Genera un token aleatorio

            // Valor predeterminado del rol
            $defaultRoleId = 1; // Rol de invitado

            // Hashear la contraseña
            $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tblusuarios (Nombre, Apellido, Documento, Correo, Contraseña, Ciudad, Teléfono, País, Género, FechaNacimiento, Token, FKIDRoles) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $mysqli->error);
            }
            $stmt->bind_param("sssssssssssi", $nombre, $apellido, $documento, $correo, $hashedPassword, $ciudad, $telefono, $pais, $genero, $fechanacimiento, $token, $defaultRoleId);

            if ($stmt->execute()) {
                // Envía correo electrónico de verificación con PHPMailer
                $mail = new PHPMailer(true);

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                try {
                    // Configurar el servidor SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ganador.futbolero@gmail.com'; // Cambiar por tu dirección de correo Gmail
                    $mail->Password = 'dznrbdlgoynqmduz'; // Cambiar por tu contraseña de Gmail
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    // Configura PHPMailer para usar UTF-8
                    $mail->CharSet = 'UTF-8';

                    // Configurar el remitente y el destinatario
                    $mail->setFrom('tu_correo@gmail.com', 'FUTBOLERO tú ganador');
                    $mail->addAddress($correo, $nombre); // Correo del usuario registrado

                    // Configurar el asunto y el cuerpo del correo
                    $mail->Subject = 'Verifica tu cuenta';
                    $mail->Body    = "Hola $nombre,\n\nPara completar tu registro, ingresa el siguiente código en la página de verificación: $token";

                    // Enviar el correo electrónico
                    $mail->send();

                    // Redirigir a la página de verificación de correo
                    header("Location: /FrontEnd/html/Usuarios/verificar.html");
                    exit(); // Asegura que no se ejecute más código después de la redirección
                    echo "Se ha enviado un correo electrónico de verificación a $correo. Por favor, revisa tu bandeja de entrada.";
                } catch (Exception $e) {
                    echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
                }
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar el usuario: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}

$mysqli->close();
?>