<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibe correctamente el ID
  echo "ID recibido en el formulario: " . $_POST['ID'];
    $id = $_POST['ID'];
    $nombre = $_POST['Nombre'];
    $numeroEquipos = $_POST['NumeroEquipos'];
    $idClubes = $_POST['FKIDClubes'];
    $idNacionalidades = $_POST['FKIDNacionalidades'];
    $idTemporada = $_POST['FKIDTemporada'];
    $idPartidos = $_POST['FKIDPartidos'];

    // Actualizar el registro
    $sql = "UPDATE tblligas SET Nombre=?, NumeroEquipos=?, FKIDClubes=?, FKIDNacionalidades=?, FKIDTemporada=?, FKIDPartidos=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sissssi", $nombre, $numeroEquipos, $idClubes, $idNacionalidades, $idTemporada, $idPartidos, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Ligas/Ligas.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombre = '';
$numeroEquipos = '';
$idClubes = '';
$idNacionalidades = '';
$idTemporada = '';
$idPartidos = '';

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblligas WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $numeroEquipos = $row['NumeroEquipos'];
        $idClubes = $row['FKIDClubes'];
        $idNacionalidades = $row['FKIDNacionalidades'];
        $idTemporada = $row['FKIDTemporada'];
        $idPartidos = $row['FKIDPartidos'];
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
    <link
      href="https://fonts.googleapis.com/css2?family=Bungee&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/FrontEnd/css/EditarRegistros.css" />    
<title>Editar Liga</title>
</head>
<body>
<header>
      <a href="/BackEnd/Ligas/Ligas.php"
        ><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras"
      /></a>
      <img
        class="logo"
        src="/FrontEnd/img/iconos/icono futbolero.png"
        alt="Imagen 2"
      />
      <h1>Futbolero</h1>
      <h2>Tú Ganador</h2>
        </header>
        <main>
    <h3>Edición Liga profesional</h3>
    <div class="card">
            <div class="card2">
    <form class="form" method="POST" action="Editar.php">
    <p class="title">Editar liga profesional</p>
            <p class="message">
              Editar la liga para mostrar en la plataforma.
            </p>
    <input type="hidden" name="ID" value="<?php echo $id; ?>">
        <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required><span>Actualizar Nombre liga:</span></label>
        <label for="NumeroEquipos"><input class="input" type="number" name="NumeroEquipos" value="<?php echo $numeroEquipos; ?>" required><span>Actualizar número de Equipos:</span></label>
        <label for="FKIDClubes"><input class="input" type="number" name="FKIDClubes" value="<?php echo $idClubes; ?>"><span>Actualizar FKIDClubes:</span></label>
        <label for="FKIDNacionalidades"><input class="input" type="number" name="FKIDNacionalidades" value="<?php echo $idNacionalidades; ?>"><span>Actualizar FKIDNacionalidades:</span></label>
        <label for="FKIDTemporada"><input class="input" type="number" name="FKIDTemporada" value="<?php echo $idNacionalidades; ?>"><span>Actualizar FKIDTemporada:</span></label>
        <label for="FKIDPartidos"><input class="input" type="number" name="FKIDPartidos" value="<?php echo $idPartidos; ?>"><span>Actualizar FKIDPartidos:</span></label>
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
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</body>
</html>
