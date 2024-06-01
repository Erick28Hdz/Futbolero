<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se ha proporcionado un código en el formulario
if (isset($_POST['Token'])) {
    $token = $_POST['Token'];

    // Consulta para buscar el código en la base de datos
    $consulta = "SELECT * FROM tblusuarios WHERE Token = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con el código proporcionado
    if ($result->num_rows === 1) {
        // Marcar la cuenta del usuario como verificada (actualizar el campo correspondiente en la base de datos)
        $usuario = $result->fetch_assoc();
        $nombre = $usuario['Nombre'];
        $idUsuario = $usuario['IdUsuario'];
        $actualizar = "UPDATE tblusuarios SET Verificado = 1 WHERE IdUsuario = ?";
        $stmtActualizar = $conexion->prepare($actualizar);
        $stmtActualizar->bind_param("i", $idUsuario);
        $stmtActualizar->execute();

        // Mostrar un mensaje de verificación exitosa
        echo "¡Felicidades, $nombre! Tu cuenta ha sido verificada correctamente. Disfruta de nuestra plataforma y comienza a explorar todas nuestras características.";

        // Redirigir al usuario a la página de membresías
        header("Location: /FrontEnd/html/Pagos/Membresias.html");
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        // Mostrar un mensaje de error si el código no es válido
        echo "El código de verificación no es válido.";
    }
} else {
    // Mostrar un mensaje de error si no se proporcionó ningún código en el formulario
    echo "El código de verificación no se ha proporcionado.";
}

// Cerrar la conexión a la base de datos si $stmt está definido
if (isset($stmt)) {
    $stmt->close();
}

$conexion->close();
?>