<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar si se recibe correctamente el ID
  echo "ID recibido en el formulario: " . $_POST['ID'];
    $id = $_POST['ID'];
    $nombres = $_POST['Nombres'];
    $capital = $_POST['Capital'];
    $idiomas = $_POST['Idiomas'];
    $continente = $_POST['Continente'];
    $monedas = $_POST['Monedas'];
    $idPlantilla = $_POST['FKIDPlantilla'];
    $idClubes = $_POST['FKIDClubes'];
    $idLigas = $_POST['FKIDLigas'];

    // Actualizar el registro
    $sql = "UPDATE tblnacionalidades SET Nombres=?, Capital=?, Idiomas=?, Continente=?, Monedas=?, FKIDPlantilla=?, FKIDClubes=?, FKIDLigas=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssi", $nombres, $capital, $idiomas, $continente, $monedas, $idPlantilla, $idClubes, $idLigas, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Paises/Nacionalidades.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombres = '';
$capital = '';
$idiomas = '';
$continente = '';
$monedas = '';
$idPlantilla = '';
$idClubes = '';
$idLigas = '';

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblnacionalidades WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombres = $row['Nombres'];
        $capital = $row['Capital'];
        $idiomas = $row['Idiomas'];
        $continente = $row['Continente'];
        $monedas = $row['Monedas'];
        $idPlantilla = $row['FKIDPlantilla'];
        $idClubes = $row['FKIDClubes'];
        $idLigas = $row['FKIDLigas'];
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
    <link rel="stylesheet" href="/FrontEnd/css/Registros/EditarRegistros.css" />
    <title>Editar Paises</title>
  </head>
  <body>
    <header>
      <a href="/BackEnd/Paises/Nacionalidades.php"
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
        <h3>Edición de nacionalidades</h3>
        <div class="card">
            <div class="card2">
        <form class="form" action="/BackEnd/Paises/Editar.php" method="post">
        <p class="title">Editar país</p>
            <p class="message">
              Edita los paises para mostrar en la plataforma.
            </p>
                <input type="hidden" name="ID" value="<?php echo $id; ?>">
                <label for="Nombres"><input class="input" type="text" name="Nombres" value="<?php echo $nombres; ?>" required><span>Actualizar nombre:</span></label>
                <label for="Capital"><input class="input" type="text" name="Capital" value="<?php echo $capital; ?>" required><span>Actualizar capital:</span></label>
                <label for="Idiomas"><input class="input" type="text" name="Idiomas" value="<?php echo $idiomas; ?>" required><span>Actualizar idiomas:</span></label>
                <label for="Continente"><input class="input" type="text" name="Continente" value="<?php echo $continente; ?>" required><span>Actualizar continente:</span></label>
                <label for="Monedas"><input class="input" type="text" name="Monedas" value="<?php echo $monedas; ?>" required><span>Actualizar monedas:</span></label>
                <label for="FKIDPlantilla"> <input class="input" type="number" name="FKIDPlantilla" value="<?php echo $idPlantilla; ?>"><span>Actualizar  ID Plantilla:</span></label>
                <label for="FKIDClubes"><input class="input" type="number" name="FKIDClubes" value="<?php echo $idClubes; ?>"><span>Actualizar ID Club:</span></label>
                <label for="FKIDLigas"><input class="input" type="number" name="FKIDLigas" value="<?php echo $idLigas; ?>"><span>Actualizar  ID Liga:</span></label>
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