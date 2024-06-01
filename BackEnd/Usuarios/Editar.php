<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_POST['idUsuario'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Documento = $_POST['Documento'];
    $Correo = $_POST['Correo'];
    $Teléfono = $_POST['Teléfono'];
    $País = $_POST['País'];
    $Ciudad = $_POST['Ciudad'];
    $Género = $_POST['Género'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $FKIDRoles = $_POST['FKIDRoles'];

    // Actualizar el registro
    $sql = "UPDATE tblusuarios SET Nombre=?, Apellido=?, Documento=?, Correo=?, Teléfono=?, País=?, Ciudad=?, Género=?, FechaNacimiento=?, FKIDRoles=? WHERE idUsuario=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssssi", $Nombre, $Apellido, $Documento, $Correo, $Teléfono, $País, $Ciudad, $Género, $FechaNacimiento, $FKIDRoles, $idUsuario);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Usuarios/Usuarios.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$Nombre = '';
$Apellido = '';
$Documento = '';
$Correo = '';
$Teléfono = '';
$País = '';
$Ciudad = '';
$Género = '';
$FechaNacimiento = '';
$FKIDRoles = '';

if (isset($_GET['idUsuario'])) {
    $idUsuario = $_GET['idUsuario'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblusuarios WHERE idUsuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $Nombre = $row['Nombre'];
        $Apellido = $row['Apellido'];
        $Documento = $row['Documento'];
        $Correo = $row['Correo'];
        $Teléfono = $row['Teléfono'];
        $País = $row['País'];
        $Ciudad = $row['Ciudad'];
        $Género = $row['Género'];
        $FechaNacimiento = $row['FechaNacimiento'];
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
    <title>Editar Usuarios</title>
  </head>
  <body>
    <header>
      <a href="/BackEnd/Usuarios/Usuarios.php"
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
        <h3>Edición de Usuario</h3>
        <div class="card">
            <div class="card2">
        <form class="form" action="/BackEnd/Usuarios/Editar.php" method="post">
        <p class="title">Editar Usuario</p>
            <p class="message">
              Edita usuarios para tener acceso en la plataforma.
            </p>
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $Nombre; ?>" required><span>Actualizar Nombre:</span></label>
                <label for="Apellido"><input class="input" type="text" name="Apellido" value="<?php echo $Apellido; ?>" required><span>Actualizar Apellido:</span></label>
                <label for="Documento"><input class="input" type="number" name="Documento" value="<?php echo $Documento; ?>" required><span>Actualizar Documento:</span></label>
                <label for="Correo"><input class="input" type="text" name="Correo" value="<?php echo $Correo; ?>" required><span>Actualizar correo electronico:</span></label>
                <label for="Teléfono"><input class="input" type="number" name="Teléfono" value="<?php echo $Teléfono; ?>" required><span>Actualizar teléfono:</span></label>
                <label for="País"> <input class="input" type="text" name="País" value="<?php echo $País; ?>" required><span>Actualizar  país:</span></label>
                <label for="Ciudad"> <input class="input" type="text" name="Ciudad" value="<?php echo $Ciudad; ?>" required><span>Actualizar  ciudad:</span></label>
                <label for="Género">
        <select class="input" name="Género" id="Género" required>
            <option value="Masculino" <?php echo ($Género == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option value="Femenino" <?php echo ($Género == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
            <option value="Otro" <?php echo ($Género == 'Otro') ? 'selected' : ''; ?>>Otro</option>
        </select><span>Actualizar género:</span></label>
        <label for="FechaNacimiento"><input class="input" type="date" name="FechaNacimiento" value="<?php echo $FechaNacimiento; ?>" required><span>Actualizar fecha de cacimiento:</span></label>
        <label for="FKIDRoles"><input class="input" type="number" name="FKIDRoles" value="<?php echo $FKIDRoles; ?>" required><span>Actualizar  Rol:</span></label>
        <a href="#" class="enlaces">Términos y Condiciones</a>
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