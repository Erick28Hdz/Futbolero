<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $ciudad = $_POST['Ciudad'];
    $direccion = $_POST['Direccion'];
    $estadio = $_POST['Estadio'];
    $capacidad = $_POST['Capacidad'];
    $idPatrocinadorPrincipal = $_POST['FKIdPatrocinadorPrincipal'];
    $idPatrocinadorUniforme = $_POST['FKIdpatrocinadorUniforme'];
    $idPatrocinadorPecho = $_POST['FKIdPatrocinadorPecho'];
    $idPatrocinadorManga = $_POST['FKIdPatrocinadorManga'];
    $idPatrocinadorEspalda = $_POST['FKIdPatrocinadorEspalda'];
    $idPlantilla = $_POST['FKIDPlantilla'];
    $idNacionalidades = $_POST['FKIDNacionalidades'];
    $idLigas = $_POST['FKIDLigas'];
    $idFichajes = $_POST['FKIDFichajes'];
    $idTemporadas = $_POST['FKIDTemporadas'];
    $idPartido = $_POST['FKIDPartido'];
    $idEstadisticas = $_POST['FKIDEstadisticas'];

    // Verifica si todos los campos obligatorios están llenos
    if (empty($nombre) || empty($ciudad) || empty($direccion) || empty($estadio) || empty($capacidad)) {
        echo "Error: Todos los campos obligatorios son requeridos. Por favor, complete el formulario.";
    } else {
        // Verifica si el nombre ya existe en la base de datos
        $verificarNombre = "SELECT COUNT(*) as total FROM tblclubes WHERE Nombre = ?";
        $stmtVerificar = $conexion->prepare($verificarNombre);
        $stmtVerificar->bind_param("s", $nombre);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();
       
        if ($rowVerificar['total'] > 0) {
            // El club ya existe, maneja el error o redirige a una página de error
            echo "Error: El club ya está registrado.";
        } else {
            // Realiza la inserción en la base de datos
            $sql = "INSERT INTO tblclubes (Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, 
            FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, 
            FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $conexion->error);
            }
            $stmt->bind_param("ssssssssssssssss", $nombre, $ciudad, $direccion, $estadio, $capacidad, 
            $idPatrocinadorPrincipal, $idPatrocinadorUniforme, $idPatrocinadorPecho, $idPatrocinadorManga, 
            $idPatrocinadorEspalda, $idPlantilla, $idNacionalidades, $idLigas, $idFichajes, $idTemporadas, 
            $idPartido, $idEstadisticas);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de inicio
                header("Location: /BackEnd/Clubes/Clubes.php");
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar el club de fútbol: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}
$conexion->close();
?>
