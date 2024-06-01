<?php
include '../Plataforma/conexion.php';

// Proceso de inserción de temporada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $año = $_POST['año'];
    $periodo = $_POST['periodo'];
    $idLigas = $_POST['FKIDLigas'];
    $idClubes = $_POST['FKIDClubes'];

    $sqlInsert = "INSERT INTO tbltemporadas (Nombre, Año, Periodo, FKIDLigas, FKIDClubes) 
                  VALUES ('$nombre', '$año', '$periodo', '$idLigas', '$idClubes')";

    if ($conexion->query($sqlInsert) === TRUE) {
        echo "TEMPORADA INSERTADA CON ÉXITO. CIERRE ESTA VENTANA Y RECARGUE LA PÁGINA DE LA TABLA PARA VER LOS CAMBIOS.";
    } else {
        echo "Error al insertar la temporada: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar Temporada</title>
    <link href="/FrontEnd/img/iconos/icono futbolero.png" rel="shortcut icon" />
   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/FrontEnd/css/Registros.css" />    

 
</head>
<body>
    <h3>Insertar Temporada</h3>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <label for="año">Año:</label>
        <input type="text" id="año" name="año">
        <label for="periodo">Periodo:</label>
        <input type="text" id="periodo" name="periodo">
        <label for="FKIDLigas">ID Ligas:</label>
        <input type="text" id="FKIDLigas" name="FKIDLigas">
        <label for="FKIDClubes">ID Clubes:</label>
        <input type="text" id="FKIDClubes" name="FKIDClubes">
        <button type="submit">Insertar Temporada</button>
    </form>
</body>
</html>