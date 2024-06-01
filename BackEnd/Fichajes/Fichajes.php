<?php
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un fichaje por su ID
function eliminarFichaje($ID, $conexion)
{
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblfichajes WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarFichaje($idEliminar, $conexion);
}

// Variables para ordenar y filtrar
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'TipoFichaje';
$tipoFichajeFilter = isset($_GET['TipoFichaje']) ? mysqli_real_escape_string($conexion, $_GET['TipoFichaje']) : '';
$clubAnteriorFilter = isset($_GET['ClubAnterior']) ? mysqli_real_escape_string($conexion, $_GET['ClubAnterior']) : '';
$clubActualFilter = isset($_GET['ClubActual']) ? mysqli_real_escape_string($conexion, $_GET['ClubActual']) : '';
$costoFichajeFilter = isset($_GET['CostoFichaje']) ? mysqli_real_escape_string($conexion, $_GET['CostoFichaje']) : '';
$idTemporadaFilter = isset($_GET['FKIDTemporada']) ? mysqli_real_escape_string($conexion, $_GET['FKIDTemporada']) : '';
$idPlantillaFilter = isset($_GET['FKIDPlantillas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantillas']) : '';
$idClubFilter = isset($_GET['FKIDClubes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClubes']) : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT TipoFichaje, ClubAnterior, ClubActual, CostoFichaje, FKIDTemporada, FKIDPlantillas, FKIDClubes 
        FROM tblfichajes WHERE 1=1";

// Agregar cláusulas WHERE según los filtros seleccionados
if (!empty($tipoFichajeFilter)) {
    $sql .= " AND TipoFichaje = ?";
}

if (!empty($clubAnteriorFilter)) {
    $sql .= " AND ClubAnterior = ?";
}

if (!empty($clubActualFilter)) {
    $sql .= " AND ClubActual = ?";
}

if (!empty($costoFichajeFilter)) {
    $sql .= " AND CostoFichaje = ?";
}

if (!empty($idTemporadaFilter)) {
    $sql .= " AND FKIDTemporada = ?";
}

if (!empty($idPlantillaFilter)) {
    $sql .= " AND FKIDPlantillas = ?";
}

if (!empty($idClubFilter)) {
    $sql .= " AND FKIDClubes = ?";
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'TipoFichaje':
    case 'ClubAnterior':
    case 'ClubActual':
    case 'CostoFichaje':
    case 'FKIDTemporada':
    case 'FKIDPlantillas':
    case 'FKIDClubes':
        $sql .= " ORDER BY $orderBy";
        break;
    default:
        $sql .= " ORDER BY TipoFichaje";
        break;
}

// Preparar la consulta
$stmt = $conexion->prepare($sql);

// Asociar los parámetros en caso de que se hayan definido
if (!empty($tipoFichajeFilter)) {
    $stmt->bind_param("s", $tipoFichajeFilter);
}

if (!empty($clubAnteriorFilter)) {
    $stmt->bind_param("s", $clubAnteriorFilter);
}

if (!empty($clubActualFilter)) {
    $stmt->bind_param("s", $clubActualFilter);
}

if (!empty($costoFichajeFilter)) {
    $stmt->bind_param("d", $costoFichajeFilter);
}

if (!empty($idTemporadaFilter)) {
    $stmt->bind_param("i", $idTemporadaFilter);
}

if (!empty($idPlantillaFilter)) {
    $stmt->bind_param("i", $idPlantillaFilter);
}

if (!empty($idClubFilter)) {
    $stmt->bind_param("i", $idClubFilter);
}

// Ejecutar la consulta
$stmt->execute();

// Obtener los resultados
$resultado = $stmt->get_result();

// Resto del código para procesar los resultados y generar la salida HTML
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/FrontEnd/img/iconos/icono futbolero.png" rel="shortcut icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registros.css" />
    <title>Lista de Fichajes</title>
</head>

<body>
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de Fichajes</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de fichajes -->
                <table>
                    <h4>Tabla de Fichajes</h4>
                    <tr class="titabla">
                        <th><a href="Fichajes.php?orderBy=TipoFichaje" class="titabla">Tipo de Fichaje</a></th>
                        <th><a href="Fichajes.php?orderBy=ClubAnterior" class="titabla">Club Anterior</a></th>
                        <th><a href="Fichajes.php?orderBy=ClubActual" class="titabla">Club Actual</a></th>
                        <th><a href="Fichajes.php?orderBy=CostoFichaje" class="titabla">Costo de Fichaje</a></th>
                        <th><a href="Fichajes.php?orderBy=FKIDTemporada" class="titabla">ID Temporada</a></th>
                        <th><a href="Fichajes.php?orderBy=FKIDPlantillas" class="titabla">ID Plantilla</a></th>
                        <th><a href="Fichajes.php?orderBy=FKIDClubes" class="titabla">ID Club</a></th>
                        <!-- Agregar más encabezados de columna según sea necesario -->
                        <th><a href="" class="titabla">Editar</a></th>
                        <th><a href="" class="titabla">Eliminar</a></th>
                    </tr>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>" . $fila['TipoFichaje'] . "</td>";
                            echo "<td class='celda'>" . $fila['ClubAnterior'] . "</td>";
                            echo "<td class='celda'>" . $fila['ClubActual'] . "</td>";
                            echo "<td class='celda'>" . $fila['CostoFichaje'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDTemporada'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPlantillas'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDClubes'] . "</td>";
                            // Agregar más columnas según sea necesario
                            echo "<td><button class='button'><a href='editar.php?ID=" . $fila['ID'] . "''>Editar</a></button></td>";
                            echo "<td><form method='POST' action='eliminar.php'>
                                <input type='hidden' name='ID' value='" . $fila['ID'] . "'>
                                <button class='button' type='submit'>Eliminar</button>
                                </form></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No se encontraron registros</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <div class="filtros">
                <p class="title">Filtros</p>
                <!-- Formulario de Buscar Trabajador -->
                <form method="POST" action="Fichajes.php" class="form">
                    <label for="search">
                        <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Trabajador:</span></label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de búsqueda -->
                <form method="GET" action="Fichajes.php" class="form">
                    <label for="TipoFichaje"><input class="input" type="text" name="TipoFichaje" id="TipoFichaje" value="<?php echo $tipoFichajeFilter; ?>"><span>Filtrar por Tipo de Fichaje:</span></label>
                    <label for="ClubAnterior"><input class="input" type="text" name="ClubAnterior" id="ClubAnterior" value="<?php echo $clubAnteriorFilter; ?>"><span>Filtrar por Club Anterior:</span></label>
                    <label for="ClubActual"><input class="input" type="text" name="ClubActual" id="ClubActual" value="<?php echo $clubActualFilter; ?>"><span>Filtrar por Club Actual:</span></label>
                    <label for="CostoFichaje"><input class="input" type="number" name="CostoFichaje" id="CostoFichaje" value="<?php echo $costoFichajeFilter; ?>"><span>Filtrar por Costo de Fichaje:</span></label>
                    <label for="FKIDTemporada"><input class="input" type="number" name="FKIDTemporada" id="FKIDTemporada" value="<?php echo $idTemporadaFilter; ?>"><span>Filtrar por ID de Temporada:</span></label>
                    <label for="FKIDPlantillas"><input class="input" type="number" name="FKIDPlantillas" id="FKIDPlantillas" value="<?php echo $idPlantillaFilter; ?>"><span>Filtrar por ID de Plantilla:</span></label>
                    <label for="FKIDClubes"><input class="input" type="number" name="FKIDClubes" id="FKIDClubes" value="<?php echo $idClubFilter; ?>"><span>Filtrar por ID de Club:</span></label>
                    <!-- Agregar más campos de filtro según sea necesario -->
                    <button type="submit" class="button">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Fichajes/Registrar.html">Agregar fichaje</a></button>
            <form method="POST" action="Exportar.php">
                <button type="submit" class="button">Hacer copia de seguridad</button>
            </form>
        </div>
    </main>
    <footer>
        <p>2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>