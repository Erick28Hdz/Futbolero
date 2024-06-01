<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibe correctamente el ID
    echo "ID recibido en el formulario: " . $_POST['ID'];
    $id = $_POST['ID'];
    $calendario = $_POST['Calendario'];
    $clubLocal = $_POST['ClubLocal'];
    $clubVisitante = $_POST['ClubVisitante'];
    $hora = $_POST['Hora'];
    $fecha = $_POST['Fecha'];
    $resultadoLocal = $_POST['ResultadoLocal'];
    $resultadoVisitante = $_POST['ResultadoVisitante'];
    $puntos = $_POST['Puntos'];
    $goles = $_POST['Goles'];
    $tarjetasAmarillas = $_POST['TarjetasAmarillas'];
    $tarjetasRojas = $_POST['TarjetasRojas'];
    $doblesAmarillas = $_POST['DoblesAmarillas'];
    $fkidPlantilla = $_POST['FKIDPlantilla'];
    $fkidLigas = $_POST['FKIDLigas'];

    // Actualizar el registro
    $sql = "UPDATE tblpartidos SET Calendario=?, ClubLocal=?, ClubVisitante=?, Hora=?, Fecha=?, ResultadoLocal=?, ResultadoVisitante=?, Puntos=?, Goles=?, TarjetasAmarillas=?, TarjetasRojas=?, DoblesAmarillas=?, FKIDPlantilla=?, FKIDLigas=? WHERE ID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssssssssi", $calendario, $clubLocal, $clubVisitante, $hora, $fecha, $resultadoLocal, $resultadoVisitante, $puntos, $goles, $tarjetasAmarillas, $tarjetasRojas, $doblesAmarillas, $fkidPlantilla,  $fkidLigas, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Ligas/Ligas.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$calendario = '';
$clubLocal = '';
$clubVisitante = '';
$hora = '';
$fecha = '';
$resultadoLocal = '';
$resultadoVisitante = '';
$puntos = '';
$goles = '';
$tarjetasAmarillas = '';
$tarjetasRojas = '';
$doblesAmarillas = '';
$fkidPlantilla = '';
$fkidLigas = '';

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblpartidos WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $calendario = $row['Calendario'];
        $clubLocal = $row['ClubLocal'];
        $clubVisitante = $row['ClubVisitante'];
        $hora = $row['Hora'];
        $fecha = $row['Fecha'];
        $resultadoLocal = $row['ResultadoLocal'];
        $resultadoVisitante = $row['ResultadoVisitante'];
        $puntos = $row['Puntos'];
        $goles = $row['Goles'];
        $tarjetasAmarillas = $row['TarjetasAmarillas'];
        $tarjetasRojas = $row['TarjetasRojas'];
        $doblesAmarillas = $row['DoblesAmarillas'];
        $fkidPlantilla = $row['FKIDPlantilla'];
        $fkidClubes = $row['FKIDClubes'];
        $fkidLigas = $row['FKIDLigas'];
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
<title>Editar Partido</title>
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
    <h3>Edición de Partido</h3>
    <div class="card">
            <div class="card2">
    <form class="form" method="POST" action="Editar.php">
    <p class="title">Editar partido</p>
            <p class="message">
              Editar los detalles del partido.
            </p>
    <input type="hidden" name="ID" value="<?php echo $id; ?>">
        <label for="Calendario"><input class="input" type="text" name="Calendario" value="<?php echo $calendario; ?>" required><span>Actualizar Calendario:</span></label>
        <label for="ClubLocal"><input class="input" type="text" name="ClubLocal" value="<?php echo $clubLocal; ?>" required><span>Actualizar Club Local:</span></label>
        <label for="ClubVisitante"><input class="input" type="text" name="ClubVisitante" value="<?php echo $clubVisitante; ?>" required><span>Actualizar Club Visitante:</span></label>
        <label for="Hora"><input class="input" type="time" name="Hora" value="<?php echo $hora; ?>" required><span>Actualizar Hora:</span></label>
        <label for="Fecha"><input class="input" type="date" name="Fecha" value="<?php echo $fecha; ?>" required><span>Actualizar Fecha:</span></label>
        <label for="ResultadoLocal"><input class="input" type="number" name="ResultadoLocal" value="<?php echo $resultadoLocal; ?>"><span>Actualizar Resultado Local:</span></label>
        <label for="ResultadoVisitante"><input class="input" type="number" name="ResultadoVisitante" value="<?php echo $resultadoVisitante; ?>"><span>Actualizar Resultado Visitante:</span></label>
        <label for="Puntos"><input class="input" type="number" name="Puntos" value="<?php echo $puntos; ?>"><span>Actualizar Puntos:</span></label>
        <label for="Goles"><input class="input" type="number" name="Goles" value="<?php echo $goles; ?>"><span>Actualizar Goles:</span></label>
        <label for="TarjetasAmarillas"><input class="input" type="number" name="TarjetasAmarillas" value="<?php echo $tarjetasAmarillas; ?>"><span>Actualizar Tarjetas Amarillas:</span></label>
        <label for="TarjetasRojas"><input class="input" type="number" name="TarjetasRojas" value="<?php echo $tarjetasRojas; ?>"><span>Actualizar Tarjetas Rojas:</span></label>
        <label for="DoblesAmarillas"><input class="input" type="number" name="DoblesAmarillas" value="<?php echo $doblesAmarillas; ?>"><span>Actualizar Dobles Amarillas:</span></label>
        <label for="FKIDPlantilla"><input class="input" type="number" name="FKIDPlantilla" value="<?php echo $fkidPlantilla; ?>"><span>Actualizar FKIDPlantilla:</span></label>
        <label for="FKIDLigas"><input class="input" type="number" name="FKIDLigas" value="<?php echo $fkidLigas; ?>"><span>Actualizar FKIDLigas:</span></label>
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
