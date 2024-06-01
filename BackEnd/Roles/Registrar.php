<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $idInvitados = $_POST['FKIDInvitados'];
    $idUsuarios = $_POST['FKIDUsuarios'];
    $idTrabajadores = $_POST['FKIDTrabajadores'];

    // Verificar campos obligatorios
    if (empty($nombre) && empty($idInvitados) && empty($idUsuarios) && empty($idTrabajadores)) {
        echo "Error: Todos los campos son opcionales. Puedes completar el formulario más tarde si lo deseas.";
    } else {
        // Verifica si el nombre del rol ya existe en la base de datos
        $verificarNombre = "SELECT COUNT(*) as total FROM tblroles WHERE Nombre = ?";
        $stmtVerificar = $conexion->prepare($verificarNombre);
        $stmtVerificar->bind_param("s", $nombre);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();

        if ($rowVerificar['total'] > 0) {
            // El rol ya existe, manejar el error o redirigir a una página de error
            echo "Error: El rol con ese nombre ya está registrado.";
        } else {
            // El rol no existe, procede con la inserción en la base de datos
            $sql = "INSERT INTO tblroles (Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $conexion->error);
            }
            $stmt->bind_param("ssss", $nombre, $idInvitados, $idUsuarios, $idTrabajadores);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de inicio
                header("Location: /BackEnd/Roles/Roles.php");
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar el Rol: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}

$conexion->close();
?>


