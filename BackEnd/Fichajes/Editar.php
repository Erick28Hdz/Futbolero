<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['ID'];
    $TipoFichaje = $_POST['TipoFichaje'];
    $ClubAnterior = $_POST['ClubAnterior'];
    $ClubActual = $_POST['ClubActual'];
    $CostoFichaje = $_POST['CostoFichaje'];
    $FKIDTemporada = $_POST['FKIDTemporada'];
    $FKIDPlantillas = $_POST['FKIDPlantillas'];
    $FKIDClubes = $_POST['FKIDClubes'];

    // Actualizar el registro
    $sql = "UPDATE tu_tabla SET TipoFichaje=?, ClubAnterior=?, ClubActual=?, CostoFichaje=?, FKIDTemporada=?, FKIDPlantillas=?, FKIDClubes=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("siiidiii", $TipoFichaje, $ClubAnterior, $ClubActual, $CostoFichaje, $FKIDTemporada, $FKIDPlantillas, $FKIDClubes, $ID);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /ruta_de_tu_pagina.php"); // Reemplaza 'ruta_de_tu_pagina.php' con la ruta real
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}
// Mostrar formulario de edición
$TipoFichaje = '';
$ClubAnterior = '';
$ClubActual = '';
$CostoFichaje = '';
$FKIDTemporada = '';
$FKIDPlantillas = '';
$FKIDClubes = '';

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tu_tabla WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $TipoFichaje = $row['TipoFichaje'];
        $ClubAnterior = $row['ClubAnterior'];
        $ClubActual = $row['ClubActual'];
        $CostoFichaje = $row['CostoFichaje'];
        $FKIDTemporada = $row['FKIDTemporada'];
        $FKIDPlantillas = $row['FKIDPlantillas'];
        $FKIDClubes = $row['FKIDClubes'];
    } else {
        echo "Registro no encontrado";
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
    <title>Editar fichaje</title>
</head>

<body>
    <header>
        <a href="/BackEnd/Trabajadores/Trabajadores.php"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Editar Fichaje</h3>
        <div class="card">
            <div class="card2">
                <form class="form" method="POST" action="/BackEnd/patrocinadores/Editar.php">
                    <p class="title">Editar Patrocinador</p>
                    <p class="message">Edita patrocinadores para tener acceso en la plataforma.</p>
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <label for="TipoFichaje">
                        <input class="input" type="text" name="TipoFichaje" value="<?php echo $TipoFichaje; ?>" required>
                        <span>Actualizar Tipo de Fichaje:</span>
                    </label>
                    <label for="ClubAnterior">
                        <input class="input" type="number" name="ClubAnterior" value="<?php echo $ClubAnterior; ?>" required>
                        <span>Actualizar Club Anterior:</span>
                    </label>
                    <label for="ClubActual">
                        <input class="input" type="number" name="ClubActual" value="<?php echo $ClubActual; ?>" required>
                        <span>Actualizar Club Actual:</span>
                    </label>
                    <label for="CostoFichaje">
                        <input class="input" type="text" name="CostoFichaje" value="<?php echo $CostoFichaje; ?>" required>
                        <span>Actualizar Costo de Fichaje:</span>
                    </label>
                    <label for="FKIDTemporada">
                        <input class="input" type="number" name="FKIDTemporada" value="<?php echo $FKIDTemporada; ?>" required>
                        <span>Actualizar ID de Temporada:</span>
                    </label>
                    <label for="FKIDPlantillas">
                        <input class="input" type="number" name="FKIDPlantillas" value="<?php echo $FKIDPlantillas; ?>" required>
                        <span>Actualizar ID de Plantillas:</span>
                    </label>
                    <label for="FKIDClubes">
                        <input class="input" type="number" name="FKIDClubes" value="<?php echo $FKIDClubes; ?>" required>
                        <span>Actualizar ID de Clubes:</span>
                    </label>
                    <!-- Botón de envío -->
                    <button class="submit" type="submit" value="Actualizar">Actualizar</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>