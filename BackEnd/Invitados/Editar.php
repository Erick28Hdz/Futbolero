<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idInvitado = $_POST['idInvitado'];
    $País = $_POST['País'];
    $Ciudad = $_POST['Ciudad'];
    $Género = $_POST['Género'];
    $edad = $_POST['Edad'];
    $FKIDRoles = $_POST['FKIDRoles'];

    // Actualizar el registro
    $sql = "UPDATE tblinvitados SET País=?, Ciudad=?, Género=?, Edad=?, FKIDRoles=? WHERE idInvitado=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssi", $País, $Ciudad, $Género, $edad, $FKIDRoles, $idInvitado);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Invitados/Invitados.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$País = '';
$Ciudad = '';
$Género = '';
$edad = '';
$FKIDRoles = '';

if (isset($_GET['idInvitado'])) {
    $idInvitado = $_GET['idInvitado'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblinvitados WHERE idInvitado = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idInvitado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $País = $row['País'];
        $Ciudad = $row['Ciudad'];
        $Género = $row['Género'];
        $edad = $row['Edad'];
        $FKIDRoles = $row['FKIDRoles'];
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
    <link rel="stylesheet" href="/FrontEnd/css/Registros/EditarRegistros.css" />
    <title>Editar Invitado</title>
</head>
<body>
<header>
      <a href="/BackEnd/Roles/Roles.php"
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
        <h3>Edición de Rol</h3>
        <div class="card">
            <div class="card2">
    <form class="form" method="POST" action="Editar.php">
    <p class="title">Editar Rol</p>
            <p class="message">
              Edita nombre ROL para modificar el acceso en la plataforma.
            </p>
        <input type="hidden" name="idInvitado" value="<?php echo $idInvitado; ?>">
        <label for="País"><input class="input" type="text" name="País" value="<?php echo $País; ?>" required><span>Actualizar país:</span></label>
        <label for="Ciudad"><input class="input" type="text" name="Ciudad" value="<?php echo $Ciudad; ?>" required><span>Actualizar ciudad:</span></label>
        <label for="Género">
        <select class="input" name="Género" id="Género" required>
            <option value="Masculino" <?php echo ($Género == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option value="Femenino" <?php echo ($Género == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
            <option value="Otro" <?php echo ($Género == 'Otro') ? 'selected' : ''; ?>>Otro</option>
        </select><span>Actualizar género:</span></label>
        <label for="Edad"><input class="input" type="number" name="Edad" value="<?php echo $edad; ?>" required><span>Actualizar edad:</span></label>
        <label for="FKIDRoles"><input class="input" type="number" name="FKIDRoles" value="<?php echo $FKIDRoles; ?>" required><span>Actualizar ID ROL:</span></label>
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
