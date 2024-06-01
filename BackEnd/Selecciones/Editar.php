<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar si se recibe correctamente el ID
  echo "ID recibido en el formulario: " . $_POST['ID'];
    $ID = $_POST['ID'];
    $nombre = $_POST['Nombre'];
    $añofundacion = $_POST['AñoFundacion'];
    $idplantilla = $_POST['FKIDPlantilla'];
    $idnacionalidad = $_POST['FKIDNacionalidades'];
    
    // Actualizar el registro
    $sql = "UPDATE tblseleccionesnacionales SET Nombre=?, AñoFundacion=?, FKIDPlantilla=?, FKIDNacionalidades=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssii", $nombre, $añofundacion, $idplantilla, $idnacionalidad, $ID);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Selecciones/Selecciones.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombre = '';
$añofundacion = '';
$idplantilla = '';
$idnacionalidad = '';

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblseleccionesnacionales WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $añofundacion = $row['AñoFundacion'];
        $idplantilla = $row['FKIDPlantilla'];
        $idnacionalidad = $row['FKIDNacionalidades'];
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
    <title>Editar Selección</title>
</head>
<body>
<header>
      <a href="/BackEnd/Selecciones/Selecciones.php"
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
    <h3>Editar Selección nacional</h3>
    <div class="card">
            <div class="card2">
    <form class="form" method="POST" action="Editar.php">
    <p class="title">Editar Selección nacional</p>
            <p class="message">
              Edita selección para mostrar en la plataforma.
            </p>
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required><span>Actualizar Nombre:</span></label>
        <label for="AñoFundacion"><input class="input" type="number" name="AñoFundacion" value="<?php echo $añofundacion; ?>" required><span>Actualizar Año de fundacion:</span></label>
        <label for="FKIDPlantilla"><input class="input" type="number" name="FKIDPlantilla" value="<?php echo $idplantilla; ?>"><span>Actualizar ID Plantilla:</span></label>
        <label for="FKIDNacionalidades"><input class="input" type="number" name="FKIDNacionalidades" value="<?php echo $idnacionalidad; ?>"><span>Actualizar ID Nacionalidades:</span></label>
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
