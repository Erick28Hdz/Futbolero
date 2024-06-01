<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombres = $_POST['Nombres'];
    $capital = $_POST['Capital'];
    $idiomas = $_POST['Idiomas'];
    $continente = $_POST['Continente'];
    $monedas = $_POST['Monedas'];
    $idPlantilla = $_POST['FKIDPlantilla'];
    $idClubes = $_POST['FKIDClubes'];
    $idLigas = $_POST['FKIDLigas'];
    
    // Verificar campos obligatorios
    if (empty($nombres) && empty($capital) && empty($idiomas) && empty($continente) && empty($monedas) && empty($idPlantilla) && empty($idClubes) && empty($idLigas)) {
        echo "Error: Los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Verifica si el nombre ya existe en la base de datos
        $verificarNombre = "SELECT COUNT(*) as total FROM tblnacionalidades WHERE Nombres = ?";
        $stmtVerificar = $conexion->prepare($verificarNombre);
        $stmtVerificar->bind_param("s", $nombres);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();

        if ($rowVerificar['total'] > 0) {
            // El nombre ya existe, manejar el error o redirigir a una página de error
            echo "Error: El País ya está registrado.";
        } else {
            // El país no existe, procede con la inserción en la base de datos
            $sql = "INSERT INTO tblnacionalidades (Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDClubes, FKIDLigas) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $conexion->error);
            }
            $stmt->bind_param("ssssssss", $nombres, $capital, $idiomas, $continente, $monedas, $idPlantilla, $idClubes, $idLigas);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de inicio
                header("Location: /BackEnd/Paises/Nacionalidades.php");
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar el país: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}

$conexion->close();
?>


