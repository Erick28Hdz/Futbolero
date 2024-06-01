<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idTrabajador = $_POST['idTrabajador'];
  $nombre = $_POST['Nombre'];
  $Correo = $_POST['CorreoElectronico'];
  $area = $_POST['Area'];
  $sueldo = $_POST['Sueldo'];
  $FKIDRoles = $_POST['FKIDRoles'];

  // Actualizar el registro
  $sql = "UPDATE tbltrabajadores SET Nombre=?, CorreoElectronico=?, Area=?, Sueldo=?, FKIDRoles=? WHERE idTrabajador=?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("sssssi", $nombre, $Correo, $area, $sueldo, $FKIDRoles, $idTrabajador);

  if ($stmt->execute()) {
    echo "Registro actualizado correctamente";
    header("Location: /BackEnd/Trabajadores/Trabajadores.php");
    exit; // Asegurarse de que el código se detenga después de redireccionar
  } else {
    echo "Error al actualizar el registro: " . $stmt->error;
  }
}

// Mostrar formulario de edición
$nombre = '';
$Correo = '';
$area = '';
$sueldo = '';
$FKIDRoles = '';

if (isset($_GET['idTrabajador'])) {
  $idTrabajador = $_GET['idTrabajador'];

  // Consulta para obtener el registro correspondiente al ID
  $sql = "SELECT * FROM tbltrabajadores WHERE idTrabajador = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("i", $idTrabajador);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nombre = $row['Nombre'];
    $Correo = $row['CorreoElectronico'];
    $area = $row['Area'];
    $sueldo = $row['Sueldo'];
    $FKIDRoles = $row['FKIDRoles'];
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
  <title>Editar Trabajador</title>
</head>

<body>
  <header>
    <a href="/BackEnd/Trabajadores/Trabajadores.php"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
    <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
    <h1>Futbolero</h1>
    <h2>Tú Ganador</h2>
  </header>
  <main>
    <h3>Edición de Trabajador</h3>
    <div class="card">
      <div class="card2">

        <form class="form" method="POST" action="/BackEnd/Trabajadores/Editar.php">
          <p class="title">Editar Trabajador</p>
          <p class="message">
            Edita trabajadores para tener acceso en la plataforma.
          </p>
          <input type="hidden" name="idTrabajador" value="<?php echo $idTrabajador; ?>">
          <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required><span>Actualizar nombre:</span></label>
          <label for="CorreoElectronico"><input class="input" type="email" name="CorreoElectronico" value="<?php echo $Correo; ?>" required><span>Actualizar correo electronico:</span></label>
          <label for="Area"><input class="input" type="text" name="Area" value="<?php echo $area; ?>" required><span>Actualizar área:</span></label>
          <label for="Sueldo"><input class="input" type="text" name="Sueldo" value="<?php echo $sueldo; ?>" required><span>Actualizar sueldo:</span></label>
          <label for="FKIDRoles"><input class="input" type="number" name="FKIDRoles" value="<?php echo $FKIDRoles; ?>" required><span>Actualizar ID Rol:</span></label>
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