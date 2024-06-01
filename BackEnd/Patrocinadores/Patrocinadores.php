<?php
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un patrocinador por su ID
function eliminarPatrocinador($ID, $conexion)
{
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblpatrocinadores WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarPatrocinador($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$razonSocialFilter = isset($_GET['RazonSocial']) ? mysqli_real_escape_string($conexion, $_GET['RazonSocial']) : '';
$tipoContratoFilter = isset($_GET['TipoContrato']) ? mysqli_real_escape_string($conexion, $_GET['TipoContrato']) : '';
$tiempoContratoFilter = isset($_GET['TiempoContrato']) ? mysqli_real_escape_string($conexion, $_GET['TiempoContrato']) : '';
$plantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$clubFilter = isset($_GET['FKIDClubes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClubes']) : '';
$seleccionNacionalFilter = isset($_GET['FKIDSeleccionesNacionales']) ? mysqli_real_escape_string($conexion, $_GET['FKIDSeleccionesNacionales']) : '';
$temporadaFilter = isset($_GET['FKIDTemporadas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDTemporadas']) : '';

// Consulta SQL para obtener la lista de patrocinadores
$sql = "SELECT ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas FROM tblpatrocinadores WHERE 1=1";

// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

// Aplicar filtros a la consulta SQL
if (!empty($razonSocialFilter)) {
    $sql .= " AND RazonSocial = ?";
    $paramTypes .= "s";
    $params[] = $razonSocialFilter;
}

if (!empty($tipoContratoFilter)) {
    $sql .= " AND TipoContrato = ?";
    $paramTypes .= "s";
    $params[] = $tipoContratoFilter;
}

if (!empty($tiempoContratoFilter)) {
    $sql .= " AND TiempoContrato = ?";
    $paramTypes .= "i";
    $params[] = $tiempoContratoFilter;
}

if (!empty($plantillaFilter)) {
    $sql .= " AND FKIDPlantilla = ?";
    $paramTypes .= "i";
    $params[] = $plantillaFilter;
}

if (!empty($clubFilter)) {
    $sql .= " AND FKIDClubes = ?";
    $paramTypes .= "i";
    $params[] = $clubFilter;
}

if (!empty($seleccionNacionalFilter)) {
    $sql .= " AND FKIDSeleccionesNacionales = ?";
    $paramTypes .= "i";
    $params[] = $seleccionNacionalFilter;
}

if (!empty($temporadaFilter)) {
    $sql .= " AND FKIDTemporadas = ?";
    $paramTypes .= "i";
    $params[] = $temporadaFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'RazonSocial':
        $sql .= " ORDER BY RazonSocial";
        break;
    case 'TipoContrato':
        $sql .= " ORDER BY TipoContrato";
        break;
    case 'TiempoContrato':
        $sql .= " ORDER BY TiempoContrato";
        break;
    default:
        $sql .= " ORDER BY ID"; // Ordenar por ID por defecto
        break;
}

// Preparar la consulta
$stmt = $conexion->prepare($sql);

// Asociar los parámetros en caso de que se hayan definido
if (!empty($paramTypes)) {
    $stmt->bind_param($paramTypes, ...$params);
}

// Ejecutar la consulta
$stmt->execute();

// Obtener los resultados
$resultado = $stmt->get_result();

// Procesar el formulario de búsqueda
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Validar y limpiar la entrada del usuario
    $searchTerm = mysqli_real_escape_string($conexion, $searchTerm);

    if (!empty($searchTerm)) {
        // Construir la consulta SQL con cláusulas WHERE para aplicar los filtros
        $sql = "SELECT ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas FROM tblpatrocinadores WHERE RazonSocial LIKE ? OR TipoContrato LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Obtener los resultados
            $resultado = $stmt->get_result();
        } else {
            // Manejar errores en la ejecución de la consulta
            echo "Error en la ejecución de la consulta: " . $stmt->error;
        }

        // Cerrar la declaración preparada
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/FrontEnd/img/iconos/icono futbolero.png" rel="shortcut icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registros.css">
    <title>Lista de Patrocinadores</title>
</head>

<body id="patrocinadores">
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras"></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2">
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de Patrocinadores</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de patrocinadores -->
                <table>
                    <tr class="titabla">
                        <th><a href="Patrocinadores.php?orderBy=ID" class="titabla">ID</a></th>
                        <th><a href="Patrocinadores.php?orderBy=RazonSocial" class="titabla">Razón Social</a></th>
                        <th><a href="Patrocinadores.php?orderBy=TipoContrato" class="titabla">Tipo de Contrato</a></th>
                        <th><a href="Patrocinadores.php?orderBy=TiempoContrato" class="titabla">Tiempo de Contrato</a></th>
                        <th><a href="Patrocinadores.php?orderBy=FKIDPlantilla" class="titabla">ID Plantilla</a></th>
                        <th><a href="Patrocinadores.php?orderBy=FKIDClubes" class="titabla">ID Clubes</a></th>
                        <th><a href="Patrocinadores.php?orderBy=FKIDSeleccionesNacionales" class="titabla">ID Selecciones Nacionales</a></th>
                        <th><a href="Patrocinadores.php?orderBy=FKIDTemporadas" class="titabla">ID Temporadas</a></th>
                    </tr>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>" . $fila['ID'] . "</td>";
                            echo "<td class='celda'>" . $fila['RazonSocial'] . "</td>";
                            echo "<td class='celda'>" . $fila['TipoContrato'] . "</td>";
                            echo "<td class='celda'>" . $fila['TiempoContrato'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPlantilla'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDClubes'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDSeleccionesNacionales'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDTemporadas'] . "</td>";
                            echo "<td><button class='button'><a href='Editar.php?ID=" . $fila['ID'] . "''>Editar</a></button></td>";
                            echo "<td>
                                <form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='ID' value='" . $fila['ID'] . "'>
                                <button class='button' type='submit'>Eliminar</button>
                                </form>
                                </td>";
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
                <!-- Formulario de Buscar Patrocinador -->
                <form method="POST" action="Patrocinadores.php" class="form">
                    <label for="search">
                        <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Patrocinador:</span>
                    </label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de filtrado -->
                <form method="GET" action="Patrocinadores.php" class="form">
                    <label for="RazonSocial">
                        <input class="input" type="text" name="RazonSocial" id="RazonSocial" value="<?php echo $razonSocialFilter; ?>"><span>Filtrar por Razón Social:</span>
                    </label>
                    <label for="TipoContrato">
                        <input class="input" type="text" name="TipoContrato" id="TipoContrato" value="<?php echo $tipoContratoFilter; ?>"><span>Filtrar por Tipo de Contrato:</span>
                    </label>
                    <label for="TiempoContrato">
                        <input class="input" type="number" name="TiempoContrato" id="TiempoContrato" value="<?php echo $tiempoContratoFilter; ?>"><span>Filtrar por Tiempo de Contrato:</span>
                    </label>
                    <label for="FKIDPlantilla">
                        <input class="input" type="number" name="FKIDPlantilla" id="FKIDPlantilla" value="<?php echo $plantillaFilter; ?>"><span>Filtrar por ID de Plantilla:</span>
                    </label>
                    <label for="FKIDClubes">
                        <input class="input" type="number" name="FKIDClubes" id="FKIDClubes" value="<?php echo $clubesFilter; ?>"><span>Filtrar por ID de Club:</span>
                    </label>
                    <label for="FKIDSeleccionesNacionales">
                        <input class="input" type="number" name="FKIDSeleccionesNacionales" id="FKIDSeleccionesNacionales" value="<?php echo $seleccionesFilter; ?>"><span>Filtrar por ID de Selección Nacional:</span>
                    </label>
                    <label for="FKIDTemporadas">
                        <input class="input" type="number" name="FKIDTemporadas" id="FKIDTemporadas" value="<?php echo $temporadasFilter; ?>"><span>Filtrar por ID de Temporada:</span>
                    </label>
                    <button type="submit" class="button">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Patrocinadores/Registrar.html">Agregar Patrocinador</a></button>
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