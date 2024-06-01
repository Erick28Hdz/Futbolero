<?php
include '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idRol = $_POST['IdRol'];
    $nombre = $_POST['Nombre'];
    $idInvitados = $_POST['FKIDInvitados'];
    $idUsuarios = $_POST['FKIDUsuarios'];
    $idTrabajadores = $_POST['FKIDTrabajadores'];

    // Actualizar el registro
    $sql = "UPDATE tblroles SET Nombre=?, FKIDInvitados=?, FKIDUsuarios=?, FKIDTrabajadores=? WHERE IdRol=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $idInvitados, $idUsuarios, $idTrabajadores, $idRol);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("Location: /BackEnd/Roles/Roles.php");
        exit; // Asegurarse de que el código se detenga después de redireccionar
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }
}

// Mostrar formulario de edición
$nombre = '';
$idInvitados = '';
$idUsuarios = '';
$idTrabajadores = '';

if (isset($_GET['IdRol'])) {
    $idRol = $_GET['IdRol'];

    // Consulta para obtener el registro correspondiente al ID
    $sql = "SELECT * FROM tblroles WHERE IdRol = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idRol);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $idInvitados = $row['FKIDInvitados'];
        $idUsuarios = $row['FKIDUsuarios'];
        $idTrabajadores = $row['FKIDTrabajadores'];
    } else {
        echo "Registro no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
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
    <title>Editar Rol</title>
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
        <input type="hidden" name="IdRol" value="<?php echo $idRol; ?>">
        
        <label for="Nombre"><input class="input" type="text" name="Nombre" value="<?php echo $nombre; ?>" required><span>Actualizar nombre ROL:</span></label>
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
