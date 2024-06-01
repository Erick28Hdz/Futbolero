<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se ha enviado un formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idPatrocinador = $_POST['idPatrocinador'];
    $razonSocial = $_POST['razonSocial'];
    $tipoContrato = $_POST['tipoContrato'];
    $tiempoContrato = $_POST['tiempoContrato'];
    $idPlantilla = $_POST['idPlantilla'];
    $idClubes = $_POST['idClubes'];
    $idSeleccionesNacionales = $_POST['idSeleccionesNacionales'];
    $idTemporadas = $_POST['idTemporadas'];

    // Actualizar los datos del patrocinador en la base de datos
    $sql = "UPDATE tblpatrocinadores 
            SET RazonSocial = ?, TipoContrato = ?, TiempoContrato = ?, 
                FKIDPlantilla = ?, FKIDClubes = ?, FKIDSeleccionesNacionales = ?, FKIDTemporadas = ? 
            WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssi", $razonSocial, $tipoContrato, $tiempoContrato, $idPlantilla, $idClubes, $idSeleccionesNacionales, $idTemporadas, $idPatrocinador);
    if ($stmt->execute()) {
        // Redireccionar después de la edición exitosa
        header("Location: patrocinadores.php");
        exit();
    } else {
        echo "Error al actualizar el patrocinador: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$razon_social = '';
$tipo_contrato = '';
$tiempo_contrato = '';

// Si no se envió un formulario de edición, recuperar los detalles del patrocinador
if (isset($_GET['id'])) {
    $idPatrocinador = $_GET['id'];
    $sql = "SELECT * FROM tblpatrocinadores WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idPatrocinador);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontró el patrocinador
    if ($resultado->num_rows === 1) {
        $row = $result->fetch_assoc();
        $razon_social = $row['RazonSocial'];
        $tipo_contrato = $row['TipoContrato'];
        $tiempo_contrato = $row['TiempoContrato'];
        $FKIDPlantilla = $row['FKIDPlantilla'];
        $FKIDClubes = $row['FKIDClubes'];
        $FKIDSeleccionesNacionales = $row['FKIDSeleccionesNacionales'];
        $FKIDTemporadas = $row['FKIDTemporadas'];
    } else {
        echo "No se encontró ningún patrocinador con el ID proporcionado.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/FrontEnd/img/iconos/icono futbolero.png" rel="shortcut icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/FrontEnd/css/Registros/EditarRegistros.css" />
    <title>Editar patrocinador</title>
</head>

<body>
    <header>
        <a href="/BackEnd/Patrocinadores/Patrocinadores.php"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Edición de patrocinador</h3>
        <div class="card">
            <div class="card2">

                <form class="form" method="POST" action="/BackEnd/Patrocinadores/Patrocinadores.php">
                    <p class="title">Editar patrocinador</p>
                    <p class="message">
                        Edita patrocinadores para tener acceso en la plataforma.
                    </p>
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <label for="RazonSocial"><input class="input" type="text" name="RazonSocial" value="<?php echo $razon_social; ?>" required><span>Actualizar Razón Social:</span></label>
                    <label for="TipoContrato"><input class="input" type="text" name="TipoContrato" value="<?php echo $tipo_contrato; ?>" required><span>Actualizar Tipo de Contrato:</span></label>
                    <label for="TiempoContrato"><input class="input" type="text" name="TiempoContrato" value="<?php echo $tiempo_contrato; ?>" required><span>Actualizar Tiempo de Contrato:</span></label>
                    <label for="FKIDPlantilla"><input class="input" type="number" name="FKIDPlantilla" value="<?php echo $FKIDPlantilla; ?>" required><span>Actualizar ID de Plantilla:</span></label>
                    <label for="FKIDClubes"><input class="input" type="number" name="FKIDClubes" value="<?php echo $FKIDClubes; ?>" required><span>Actualizar ID de Clubes:</span></label>
                    <label for="FKIDSeleccionesNacionales"><input class="input" type="number" name="FKIDSeleccionesNacionales" value="<?php echo $FKIDSeleccionesNacionales; ?>" required><span>Actualizar ID de Selecciones Nacionales:</span></label>
                    <label for="FKIDTemporadas"><input class="input" type="number" name="FKIDTemporadas" value="<?php echo $FKIDTemporadas; ?>" required><span>Actualizar ID de Temporadas:</span></label>
                    <!-- Botón de envío -->
                    <button class="submit" type="submit" value="Actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </main>
    <!-- Footer con botón de modo invitado y enlace de términos y condiciones -->
    <footer>
        <p>2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>