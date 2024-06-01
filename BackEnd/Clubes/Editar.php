<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibe correctamente el ID
    echo "ID recibido en el formulario: " . $_POST['ID'];
    $id = $_POST['ID'];
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

    // Actualizar el registro
    $sql = "UPDATE tblclubes SET Nombre=?, Ciudad=?, Direccion=?, Estadio=?, Capacidad=?, 
    FKIdPatrocinadorPrincipal=?, FKIdpatrocinadorUniforme=?, FKIdPatrocinadorPecho=?, 
    FKIdPatrocinadorManga=?, FKIdPatrocinadorEspalda=?, FKIDPlantilla=?, FKIDNacionalidades=?, 
    FKIDLigas=?, FKIDFichajes=?, FKIDTemporadas=?, FKIDPartido=?, FKIDEstadisticas=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssssssssssssi", $nombre, $ciudad, $direccion, $estadio, $capacidad, 
    $idPatrocinadorPrincipal, $idPatrocinadorUniforme, $idPatrocinadorPecho, $idPatrocinadorManga, 
    $idPatrocinadorEspalda, $idPlantilla, $idNacionalidades, $idLigas, $idFichajes, $idTemporadas, 
    $idPartido, $idEstadisticas, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Clubes/ClubesFut.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombre = ''; 
$ciudad = ''; 
$direccion = ''; 
$estadio = ''; 
$capacidad = ''; 
$idPatrocinadorPrincipal = '';
$idPatrocinadorUniforme = '';
$idPatrocinadorPecho = '';
$idPatrocinadorManga = '';
$idPatrocinadorEspalda = '';
$idPlantilla = '';
$idNacionalidades = ''; 
$idLigas = '';
$idFichajes = ''; 
$idTemporadas = ''; 
$idPartido = ''; 
$idEstadisticas = ''; 

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblclubes WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre']; 
        $ciudad = $row['Ciudad']; 
        $direccion = $row['Direccion']; 
        $estadio = $row['Estadio']; 
        $capacidad = $row['Capacidad']; 
        $idPatrocinadorPrincipal = $row['FKIdPatrocinadorPrincipal']; 
        $idPatrocinadorUniforme = $row['FKIdpatrocinadorUniforme']; 
        $idPatrocinadorPecho = $row['FKIdPatrocinadorPecho']; 
        $idPatrocinadorManga = $row['FKIdPatrocinadorManga']; 
        $idPatrocinadorEspalda = $row['FKIdPatrocinadorEspalda']; 
        $idPlantilla = $row['FKIDPlantilla'];
        $idNacionalidades = $row['FKIDNacionalidades']; 
        $idLigas = $row['FKIDLigas'];
        $idFichajes = $row['FKIDFichajes']; 
        $idTemporadas = $row['FKIDTemporadas']; 
        $idPartido = $row['FKIDPartido']; 
        $idEstadisticas = $row['FKIDEstadisticas'];
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
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registrarse.css" />
    <title>Editar Club</title>
</head>
<body>
<header>
      <a href="/BackEnd/Clubes/Clubes.php"
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
    <h3>Edición de Club de fútbol</h3>
    <div class="card">
            <div class="card2">
    <form class="form"  method="POST" action="Editar.php">
    <p class="title">Editar Club profesional</p>
            <p class="message">
              Edita el club para mostrar en la plataforma.
            </p>    
    <input type="hidden" name="ID" value="<?php echo $id; ?>">
        <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required><span>Actualizar Nombre:</span></label>
        <label for="Ciudad"><input class="input" type="text" name="Ciudad" value="<?php echo $ciudad; ?>" required><span>Actualizar Ciudad:</span></label>
        <label for="Direccion"><input class="input" type="text" name="Direccion" value="<?php echo $direccion; ?>" required><span>Actualizar Dirección:</span></label>
        <label for="Estadio"><input class="input" type="text" name="Estadio" value="<?php echo $estadio; ?>" required><span>Actualizar Estadio:</span></label>
        <label for="Capacidad"><input class="input" type="number" name="Capacidad" value="<?php echo $capacidad; ?>" required><span>Actualizar Capacidad:</span></label>
        <label for="FKIdPatrocinadorPrincipal"><input class="input" type="number" name="FKIdPatrocinadorPrincipal" value="<?php echo $idPatrocinadorPrincipal; ?>"><span>Actualizar ID Patrocinador Principal:</span></label>
        <label for="FKIdpatrocinadorUniforme"><input class="input" type="number" name="FKIdpatrocinadorUniforme" value="<?php echo $idPatrocinadorUniforme; ?>"><span>Actualizar ID Patrocinador de Uniforme:</span></label>
        <label for="FKIdPatrocinadorPecho"><input class="input" type="number" name="FKIdPatrocinadorPecho" value="<?php echo $idPatrocinadorPecho; ?>"><span>Actualizar ID Patrocinador de Pecho:</span></label>
        <label for="FKIdPatrocinadorManga"><input class="input" type="number" name="FKIdPatrocinadorManga" value="<?php echo $idPatrocinadorManga; ?>"><span>Actualizar ID Patrocinador de Manga:</span></label>
        <label for="FKIdPatrocinadorEspalda"><input class="input" type="number" name="FKIdPatrocinadorEspalda" value="<?php echo $idPatrocinadorEspalda; ?>"><span>Actualizar ID Patrocinador de Espalda:</span></label>
        <label for="FKIDPlantilla"><input class="input" type="number" name="FKIDPlantilla" value="<?php echo $idPlantilla; ?>"><span>Actualizar ID Plantilla:</span></label>
        <label for="FKIDNacionalidades"><input class="input" type="number" name="FKIDNacionalidades" value="<?php echo $idNacionalidades; ?>"><span>Actualizar ID Nacionalidades:</span></label>
        <label for="FKIDLigas"><input class="input" type="number" name="FKIDLigas" value="<?php echo $idLigas; ?>"><span>Actualizar ID Ligas:</span></label>
        <label for="FKIDFichajes"><input class="input" type="number" name="FKIDFichajes" value="<?php echo $idFichajes; ?>"><span>Actualizar ID Fichajes:</span></label>
        <label for="FKIDTemporadas"><input class="input" type="number" name="FKIDTemporadas" value="<?php echo $idTemporadas; ?>"><span>Actualizar ID Temporadas:</span></label>
        <label for="FKIDPartido"><input class="input" type="number" name="FKIDPartido" value="<?php echo $idPartido; ?>"><span>Actualizar ID Partido:</span></label>
        <label for="FKIDEstadisticas"><input class="input" type="number" name="FKIDEstadisticas" value="<?php echo $idEstadisticas; ?>"><span>Actualizar ID Estadisticas:</span></label>
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
