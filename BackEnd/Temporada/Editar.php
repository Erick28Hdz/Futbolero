<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibe correctamente el ID
    $id = $_POST['IdTemporada'];
    $nombre = $_POST['Nombre'];
    $fechaInicial = $_POST['FechaInicial'];
    $fechaFinal = $_POST['FechaFinal'];
    $idLigas = $_POST['FKIDLigas'];
    $idClubes = $_POST['FKIDClubes'];

    // Actualizar el registro
    $sql = "UPDATE tbltemporadas SET Nombre=?, FechaInicial=?, FechaFinal=?, FKIDLigas=?, FKIDClubes=? WHERE IdTemporada=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssii", $nombre, $fechaInicial, $fechaFinal, $idLigas, $idClubes, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Temporada/Temporada.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombre = '';
$fechaInicial = '';
$fechaFinal = '';
$idLigas = '';
$idClubes = '';

if (isset($_GET['IdTemporada'])) {
    $id = $_GET['IdTemporada'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tbltemporadas WHERE IdTemporada = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $fechaInicial = $row['FechaInicial'];
        $fechaFinal = $row['FechaFinal'];
        $idLigas = $row['FKIDLigas'];
        $idClubes = $row['FKIDClubes'];
    } else {
        echo "Registro no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
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
    <title>Editar Temporada</title>
</head>
<body>
    <header>
        <a href="/BackEnd/Temporada/Temporada.php">
            <img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" />
        </a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Edición de Temporada</h3>
        <div class="card">
            <div class="card2">
                <form class="form" method="POST" action="Editar.php">
                    <p class="title">Editar Temporada</p>
                    <p class="message">
                        Edita la temporada para mostrar en la plataforma.
                    </p>
                    <input type="hidden" name="IdTemporada" value="<?php echo $id; ?>">
                    <label for="Nombre">
                        <input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required>
                        <span>Actualizar Nombre:</span>
                    </label>
                    <label for="FechaInicial">
                        <input class="input" type="date" name="FechaInicial" value="<?php echo $fechaInicial; ?>" required>
                        <span>Actualizar Fecha Inicial:</span>
                    </label>
                    <label for="FechaFinal">
                        <input class="input" type="date" name="FechaFinal" value="<?php echo $fechaFinal; ?>" required>
                        <span>Actualizar Fecha Final:</span>
                    </label>
                    <label for="FKIDLigas">
                        <input class="input" type="text" name="FKIDLigas" value="<?php echo $idLigas; ?>">
                        <span>Actualizar ID Ligas:</span>
                    </label>
                    <label for="FKIDClubes">
                        <input class="input" type="text" name="FKIDClubes" value="<?php echo $idClubes; ?>">
                        <span>Actualizar ID Clubes:</span>
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
