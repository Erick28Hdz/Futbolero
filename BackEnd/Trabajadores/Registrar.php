<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $correo = $_POST['CorreoElectronico'];
    $area = $_POST['Area'];
    $sueldo = $_POST['Sueldo'];
    $rol = $_POST['FKIDRoles'];

    // Verificar campos obligatorios
    if (empty($nombre) || empty($correo) || empty($area) || empty($sueldo) || empty($rol)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Verifica si el correo ya existe en la base de datos
        $verificarCorreo = "SELECT COUNT(*) as total FROM tbltrabajadores WHERE CorreoElectronico = ?";
        $stmtVerificar = $conexion->prepare($verificarCorreo);
        $stmtVerificar->bind_param("s", $correo);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();

        if ($rowVerificar['total'] > 0) {
            // El correo ya existe, manejar el error o redirigir a una página de error
            echo "Error: El correo ya está registrado.";
        } else {
            // El correo no existe, procede con la inserción en la base de datos
            $sql = "INSERT INTO tbltrabajadores (Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles) VALUES (?, ?, ?, ?,  (SELECT IdRol FROM tblroles WHERE Nombre = ?))";
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $conexion->error);
            }
            $stmt->bind_param("sssss", $nombre, $correo, $area, $sueldo, $rol);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de inicio
                header("Location: /BackEnd/Trabajadores/Trabajadores.php");
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar el trabajador: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}

$conexion->close();
?>


