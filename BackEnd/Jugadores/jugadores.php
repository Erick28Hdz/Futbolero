<?php
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un jugador por su ID
function eliminarJugador($ID, $conexion)
{
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblplantillas WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $IDEliminar = $_GET['ID'];
    eliminarJugador($IDEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$dorsalFilter = isset($_GET['Dorsal']) ? mysqli_real_escape_string($mysql, $_GET['Dorsal']) : '';
$posicionFilter = isset($_GET['Posicion']) ? mysqli_real_escape_string($conexion, $_GET['Posicion']) : '';
$nombresFilter = isset($_GET['Nombres']) ? mysqli_real_escape_string($conexion, $_GET['Nombres']) : '';
$apellidosFilter = isset($_GET['Apellidos']) ? mysqli_real_escape_string($conexion, $_GET['Apellidos']) : '';
$fechaNacimientoFilter = isset($_GET['FechaNacimiento']) ? mysqli_real_escape_string($conexion, $_GET['FechaNacimiento']) : '';
$edadFilter = isset($_GET['Edad']) ? mysqli_real_escape_string($conexion, $_GET['Edad']) : '';
$estaturaFilter = isset($_GET['Estatura']) ? mysqli_real_escape_string($conexion, $_GET['Estatura']) : '';
$pieHabilFilter = isset($_GET['PieHabil']) ? mysqli_real_escape_string($conexion, $_GET['PieHabil']) : '';
$precioMercadoFilter = isset($_GET['PrecioMercado']) ? mysqli_real_escape_string($conexion, $_GET['PrecioMercado']) : '';
$partidosJugadosFilter = isset($_GET['PartidosJugados']) ? mysqli_real_escape_string($conexion, $_GET['PartidosJugados']) : '';
$tiempoJugadoFilter = isset($_GET['TiempoJugado']) ? mysqli_real_escape_string($conexion, $_GET['TiempoJugado']) : '';
$golesFilter = isset($_GET['Goles']) ? mysqli_real_escape_string($conexion, $_GET['Goles']) : '';
$asistenciasFilter = isset($_GET['Asistencias']) ? mysqli_real_escape_string($conexion, $_GET['Asistencias']) : '';
$atajadasFilter = isset($_GET['Atajadas']) ? mysqli_real_escape_string($conexion, $_GET['Atajadas']) : '';
$tarjetasAmarillasFilter = isset($_GET['TarjetasAmarillas']) ? mysqli_real_escape_string($conexion, $_GET['TarjetasAmarillas']) : '';
$doblesAmarillasFilter = isset($_GET['DoblesAmarillas']) ? mysqli_real_escape_string($conexion, $_GET['DoblesAmarillas']) : '';
$rojasDirectasFilter = isset($_GET['RojasDirectas']) ? mysqli_real_escape_string($conexion, $_GET['RojasDirectas']) : '';
$FKTemporadaFilter = isset($_GET['FKTemporada']) ? mysqli_real_escape_string($conexion, $_GET['FKTemporada']) : '';
$FKIDLigasFilter = isset($_GET['FKIDLigas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDLigas']) : '';
$FKIDClubesFilter = isset($_GET['FKIDClubes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClubes']) : '';
$FKIDNacionalidadesFilter = isset($_GET['FKIDNacionalidades']) ? mysqli_real_escape_string($conexion, $_GET['FKIDNacionalidades']) : '';
$FKIDSeleccionNacionalFilter = isset($_GET['FKIDSeleccionNacional']) ? mysqli_real_escape_string($conexion, $_GET['FKIDSeleccionNacional']) : '';
$FKIDPatrocinadoresFilter = isset($_GET['FKIDPatrocinadores']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPatrocinadores']) : '';
$FKIDPartidosFilter = isset($_GET['FKIDPartidos']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPartidos']) : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT * FROM tblplantillas WHERE 1=1";

// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($dorsalFilter)) {
    $sql .= " AND Dorsal = ?";
    $paramTypes .= "i";
    $params[] = $dorsalFilter;
}

if (!empty($posicionFilter)) {
    $sql .= " AND Posicion = ?";
    $paramTypes .= "s";
    $params[] = $posicionFilter;
}

if (!empty($nombresFilter)) {
    $sql .= " AND Nombres = ?";
    $paramTypes .= "s";
    $params[] = $nombresFilter;
}

if (!empty($apellidosFilter)) {
    $sql .= " AND Apellidos = ?";
    $paramTypes .= "s";
    $params[] = $apellidosFilter;
}

if (!empty($fechaNacimientoFilter)) {
    $sql .= " AND FechaNacimiento = ?";
    $paramTypes .= "s";
    $params[] = $fechaNacimientoFilter;
}

if (!empty($edadFilter)) {
    $sql .= " AND Edad = ?";
    $paramTypes .= "i";
    $params[] = $edadFilter;
}

if (!empty($estaturaFilter)) {
    $sql .= " AND Estatura = ?";
    $paramTypes .= "d";
    $params[] = $estaturaFilter;
}

if (!empty($pieHabilFilter)) {
    $sql .= " AND PieHabil = ?";
    $paramTypes .= "s";
    $params[] = $pieHabilFilter;
}

if (!empty($precioMercadoFilter)) {
    $sql .= " AND PrecioMercado = ?";
    $paramTypes .= "d";
    $params[] = $precioMercadoFilter;
}

if (!empty($partidosJugadosFilter)) {
    $sql .= " AND PartidosJugados = ?";
    $paramTypes .= "i";
    $params[] = $partidosJugadosFilter;
}

if (!empty($tiempoJugadoFilter)) {
    $sql .= " AND TiempoJugado = ?";
    $paramTypes .= "i";
    $params[] = $tiempoJugadoFilter;
}

if (!empty($golesFilter)) {
    $sql .= " AND Goles = ?";
    $paramTypes .= "i";
    $params[] = $golesFilter;
}

if (!empty($asistenciasFilter)) {
    $sql .= " AND Asistencias = ?";
    $paramTypes .= "i";
    $params[] = $asistenciasFilter;
}

if (!empty($atajadasFilter)) {
    $sql .= " AND Atajadas = ?";
    $paramTypes .= "i";
    $params[] = $atajadasFilter;
}

if (!empty($tarjetasAmarillasFilter)) {
    $sql .= " AND TarjetasAmarillas = ?";
    $paramTypes .= "i";
    $params[] = $tarjetasAmarillasFilter;
}

if (!empty($doblesAmarillasFilter)) {
    $sql .= " AND DoblesAmarillas = ?";
    $paramTypes .= "i";
    $params[] = $doblesAmarillasFilter;
}

if (!empty($rojasDirectasFilter)) {
    $sql .= " AND RojasDirectas = ?";
    $paramTypes .= "i";
    $params[] = $rojasDirectasFilter;
}

if (!empty($FKTemporadaFilter)) {
    $sql .= " AND FKTemporada = ?";
    $paramTypes .= "i";
    $params[] = $FKTemporadaFilter;
}

if (!empty($FKIDLigasFilter)) {
    $sql .= " AND FKIDLigas = ?";
    $paramTypes .= "i";
    $params[] = $FKIDLigasFilter;
}

if (!empty($FKIDClubesFilter)) {
    $sql .= " AND FKIDClubes = ?";
    $paramTypes .= "i";
    $params[] = $FKIDClubesFilter;
}

if (!empty($FKIDNacionalidadesFilter)) {
    $sql .= " AND FKIDNacionalidades = ?";
    $paramTypes .= "i";
    $params[] = $FKIDNacionalidadesFilter;
}

if (!empty($FKIDSeleccionNacionalFilter)) {
    $sql .= " AND FKIDSeleccionNacional = ?";
    $paramTypes .= "i";
    $params[] = $FKIDSeleccionNacionalFilter;
}

if (!empty($FKIDPatrocinadoresFilter)) {
    $sql .= " AND FKIDPatrocinadores = ?";
    $paramTypes .= "i";
    $params[] = $FKIDPatrocinadoresFilter;
}

if (!empty($FKIDPartidosFilter)) {
    $sql .= " AND FKIDPartidos = ?";
    $paramTypes .= "i";
    $params[] = $FKIDPartidosFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'Dorsal':
        $sql .= " ORDER BY Dorsal";
        break;
    case 'Posicion':
        $sql .= " ORDER BY Posicion";
        break;
    case 'Nombres':
        $sql .= " ORDER BY Nombres";
        break;
    case 'Apellidos':
        $sql .= " ORDER BY Apellidos";
        break;
    case 'FechaNacimiento':
        $sql .= " ORDER BY FechaNacimiento";
        break;
    case 'Edad':
        $sql .= " ORDER BY Edad";
        break;
    case 'Estatura':
        $sql .= " ORDER BY Estatura";
        break;
    case 'PieHabil':
        $sql .= " ORDER BY PieHabil";
        break;
    case 'PrecioMercado':
        $sql .= " ORDER BY PrecioMercado";
        break;
    case 'PartidosJugados':
        $sql .= " ORDER BY PartidosJugados";
        break;
    case 'TiempoJugado':
        $sql .= " ORDER BY TiempoJugado";
        break;
    case 'Goles':
        $sql .= " ORDER BY Goles";
        break;
    case 'Asistencias':
        $sql .= " ORDER BY Asistencias";
        break;
    case 'Atajadas':
        $sql .= " ORDER BY Atajadas";
        break;
    case 'TarjetasAmarillas':
        $sql .= " ORDER BY TarjetasAmarillas";
        break;
    case 'DoblesAmarillas':
        $sql .= " ORDER BY DoblesAmarillas";
        break;
    case 'RojasDirectas':
        $sql .= " ORDER BY RojasDirectas";
        break;
    case 'FKTemporada':
        $sql .= " ORDER BY FKTemporada";
        break;
    case 'FKIDLigas':
        $sql .= " ORDER BY FKIDLigas";
        break;
    case 'FKIDClubes':
        $sql .= " ORDER BY FKIDClubes";
        break;
    case 'FKIDNacionalidades':
        $sql .= " ORDER BY FKIDNacionalidades";
        break;
    case 'FKIDSeleccionNacional':
        $sql .= " ORDER BY FKIDSeleccionNacional";
        break;
    case 'FKIDPatrocinadores':
        $sql .= " ORDER BY FKIDPatrocinadores";
        break;
    case 'FKIDPartidos':
        $sql .= " ORDER BY FKIDPartidos";
        break;
    default:
        $sql .= " ORDER BY ID";
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
        $sql = "SELECT * FROM tblplantillas WHERE Dorsal LIKE ? OR Posicion LIKE ? OR Nombres LIKE ? OR Apellidos LIKE ? OR FechaNacimiento LIKE ? OR Edad LIKE ? OR Estatura LIKE ? OR PieHabil LIKE ? OR PrecioMercado LIKE ? OR PartidosJugados LIKE ? OR TiempoJugado LIKE ? OR Goles LIKE ? OR Asistencias LIKE ? OR Atajadas LIKE ? OR TarjetasAmarillas LIKE ? OR DoblesAmarillas LIKE ? OR RojasDirectas LIKE ? OR FKTemporada LIKE ? OR FKIDLigas LIKE ? OR FKIDClubes LIKE ? OR FKIDNacionalidades LIKE ? OR FKIDSeleccionNacional LIKE ? OR FKIDPatrocinadores LIKE ? OR FKIDPartidos LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = str_repeat("s", 24); // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registros.css" />
    <title>Control de Plantillas</title>
</head>

<body id="plantillas">
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de Plantillas</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de Plantillas -->
                <table>
                    <h4>Tabla de Plantillas</h4>
                    <tr class="titabla">
                        <th><a href="jugadores.php?orderBy=ID" class="titabla">ID</a></th>
                        <th><a href="jugadores.php?orderBy=Dorsal" class="titabla">Dorsal</a></th>
                        <th><a href="jugadores.php?orderBy=Posicion" class="titabla">Posicion</a></th>
                        <th><a href="jugadores.php?orderBy=Nombres" class="titabla">Nombres</a></th>
                        <th><a href="jugadores.php?orderBy=Apellidos" class="titabla">Apellidos</a></th>
                        <th><a href="jugadores.php?orderBy=FechaNacimiento" class="titabla">FechaNacimiento</a></th>
                        <th><a href="jugadores.php?orderBy=Edad" class="titabla">Edad</a></th>
                        <th><a href="jugadores.php?orderBy=Estatura" class="titabla">Estatura</a></th>
                        <th><a href="jugadores.php?orderBy=PieHabil" class="titabla">PieHabil</a></th>
                        <th><a href="jugadores.php?orderBy=PrecioMercado" class="titabla">PrecioMercado</a></th>
                        <th><a href="jugadores.php?orderBy=PartidosJugados" class="titabla">PartidosJugados</a></th>
                        <th><a href="jugadores.php?orderBy=TiempoJugado" class="titabla">TiempoJugado</a></th>
                        <th><a href="jugadores.php?orderBy=Goles" class="titabla">Goles</a></th>
                        <th><a href="jugadores.php?orderBy=Asistencias" class="titabla">Asistencias</a></th>
                        <th><a href="jugadores.php?orderBy=Atajadas" class="titabla">Atajadas</a></th>
                        <th><a href="jugadores.php?orderBy=TarjetasAmarillas" class="titabla">TarjetasAmarillas</a></th>
                        <th><a href="jugadores.php?orderBy=DoblesAmarillas" class="titabla">DoblesAmarillas</a></th>
                        <th><a href="jugadores.php?orderBy=RojasDirectas" class="titabla">RojasDirectas</a></th>
                        <th><a href="jugadores.php?orderBy=FKTemporada" class="titabla">FKTemporada</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDLigas" class="titabla">FKIDLigas</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDClubes" class="titabla">FKIDClubes</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDNacionalidades" class="titabla">FKIDNacionalidades</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDSeleccionNacional" class="titabla">FKIDSeleccionNacional</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDPatrocinadores" class="titabla">FKIDPatrocinadores</a></th>
                        <th><a href="jugadores.php?orderBy=FKIDPartidos" class="titabla">FKIDPartidos</a></th>
                        <th><a href="" class="titabla">Editar Trabajador</a></th>
                        <th><a href="" class="titabla">Eliminar Trabajador</a></th>
                    </tr>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>" . $fila['ID'] . "</td>";
                            echo "<td class='celda'>" . $fila['Dorsal'] . "</td>";
                            echo "<td class='celda'>" . $fila['Posicion'] . "</td>";
                            echo "<td class='celda'>" . $fila['Nombres'] . "</td>";
                            echo "<td class='celda'>" . $fila['Apellidos'] . "</td>";
                            echo "<td class='celda'>" . $fila['FechaNacimiento'] . "</td>";
                            echo "<td class='celda'>" . $fila['Edad'] . "</td>";
                            echo "<td class='celda'>" . $fila['Estatura'] . "</td>";
                            echo "<td class='celda'>" . $fila['PieHabil'] . "</td>";
                            echo "<td class='celda'>" . $fila['PrecioMercado'] . "</td>";
                            echo "<td class='celda'>" . $fila['PartidosJugados'] . "</td>";
                            echo "<td class='celda'>" . $fila['TiempoJugado'] . "</td>";
                            echo "<td class='celda'>" . $fila['Goles'] . "</td>";
                            echo "<td class='celda'>" . $fila['Asistencias'] . "</td>";
                            echo "<td class='celda'>" . $fila['Atajadas'] . "</td>";
                            echo "<td class='celda'>" . $fila['TarjetasAmarillas'] . "</td>";
                            echo "<td class='celda'>" . $fila['DoblesAmarillas'] . "</td>";
                            echo "<td class='celda'>" . $fila['RojasDirectas'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKTemporada'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDLigas'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDClubes'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDNacionalidades'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDSeleccionNacional'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPatrocinadores'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPartidos'] . "</td>";
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
                        echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="filtros">
                <p class="title">Filtros</p>
                <!-- Formulario de Buscar Jugador -->
                <form method="POST" action="jugadores.php" class="form">
                    <label for="search">
                        <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Jugador:</span>
                    </label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de filtrado -->
                <form method="GET" action="jugadores.php" class="form">
                    <label for="Nombres"><input class="input" type="text" name="Nombres" id="Nombres" value="<?php echo $nombresFilter; ?>"><span>Filtrar por Nombres:</span></label>
                    <label for="Apellidos"><input class="input" type="text" name="Apellidos" id="Apellidos" value="<?php echo $apellidosFilter; ?>"><span>Filtrar por Apellidos:</span></label>
                    <label for="Edad"><input class="input" type="number" name="Edad" id="Edad" value="<?php echo $edadFilter; ?>"><span>Filtrar por Edad:</span></label>
                    <label for="Estatura"><input class="input" type="number" name="Estatura" id="Estatura" value="<?php echo $estaturaFilter; ?>"><span>Filtrar por Estatura:</span></label>
                    <label for="PrecioMercado"><input class="input" type="number" name="PrecioMercado" id="PrecioMercado" value="<?php echo $precioFilter; ?>"><span>Filtrar por Precio de Mercado:</span></label>
                    <label for="Posicion">
                        <select class="input" name="Posicion" id="Posicion">
                            <option value="">Todas</option>
                            <option value="Portero" <?php if ($posicionFilter === 'Portero') echo ' selected'; ?>>Portero</option>
                            <option value="Defensa" <?php if ($posicionFilter === 'Defensa') echo ' selected'; ?>>Defensa</option>
                            <option value="Centrocampista" <?php if ($posicionFilter === 'Centrocampista') echo ' selected'; ?>>Centrocampista</option>
                            <option value="Delantero" <?php if ($posicionFilter === 'Delantero') echo ' selected'; ?>>Delantero</option>
                        </select>
                        <span>Filtrar por Posición:</span>
                    </label>
                    <button type="submit" class="button">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Jugadores/Registrar.html">Agregar Jugador</a></button>
            <form method="POST" action="Exportar.php">
                <button type="submit" class="button">Hacer copia de seguridad</button>
            </form>
        </div>
        </main>
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