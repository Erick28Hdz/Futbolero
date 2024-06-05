<?php
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un club por su ID
function eliminarClub($ID, $conexion)
{
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblclubes WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarClub($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$nombreFilter = isset($_GET['Nombre']) ? mysqli_real_escape_string($mysqli, $_GET['Nombre']) : '';
$ciudadFilter = isset($_GET['Ciudad']) ? mysqli_real_escape_string($conexion, $_GET['Ciudad']) : '';
$direccionFilter = isset($_GET['Direccion']) ? mysqli_real_escape_string($conexion, $_GET['Direccion']) : '';
$estadioFilter = isset($_GET['Estadio']) ? mysqli_real_escape_string($conexion, $_GET['Estadio']) : '';
$capacidadFilter = isset($_GET['Capacidad']) ? mysqli_real_escape_string($conexion, $_GET['Capacidad']) : '';
$FKIdPatrocinadorPrincipalFilter = isset($_GET['FKIdPatrocinadorPrincipal']) ? mysqli_real_escape_string($conexion, $_GET['FKIdPatrocinadorPrincipal']) : '';
$FKIdPatrocinadorUniformeFilter = isset($_GET['FKIdPatrocinadorUniforme']) ? mysqli_real_escape_string($conexion, $_GET['FKIdPatrocinadorUniforme']) : '';
$FKIdPatrocinadorPechoFilter = isset($_GET['FKIdPatrocinadorPecho']) ? mysqli_real_escape_string($conexion, $_GET['FKIdPatrocinadorPecho']) : '';
$FKIdPatrocinadorMangaFilter = isset($_GET['FKIdPatrocinadorManga']) ? mysqli_real_escape_string($conexion, $_GET['FKIdPatrocinadorManga']) : '';
$FKIdPatrocinadorEspaldaFilter = isset($_GET['FKIdPatrocinadorEspalda']) ? mysqli_real_escape_string($conexion, $_GET['FKIdPatrocinadorEspalda']) : '';
$FKIDPlantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$FKIDNacionalidadesFilter = isset($_GET['FKIDNacionalidades']) ? mysqli_real_escape_string($conexion, $_GET['FKIDNacionalidades']) : '';
$FKIDLigasFilter = isset($_GET['FKIDLigas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDLigas']) : '';
$FKIDFichajesFilter = isset($_GET['FKIDFichajes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDFichajes']) : '';
$FKIDTemporadasFilter = isset($_GET['FKIDTemporadas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDTemporadas']) : '';
$FKIDPartidoFilter = isset($_GET['FKIDPartido']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPartido']) : '';
$FKIDEstadisticasFilter = isset($_GET['FKIDEstadisticas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDEstadisticas']) : '';
'';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdPatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas FROM tblclubes WHERE 1=1";

// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombreFilter)) {
    $sql .= " AND Nombre = ?";
    $paramTypes .= "s";
    $params[] = $nombreFilter;
}

if (!empty($ciudadFilter)) {
    $sql .= " AND Ciudad = ?";
    $paramTypes .= "s";
    $params[] = $ciudadFilter;
}

if (!empty($direccionFilter)) {
    $sql .= " AND Direccion = ?";
    $paramTypes .= "s";
    $params[] = $direccionFilter;
}

if (!empty($estadioFilter)) {
    $sql .= " AND Estadio = ?";
    $paramTypes .= "s";
    $params[] = $estadioFilter;
}

if (!empty($capacidadFilter)) {
    $sql .= " AND Capacidad = ?";
    $paramTypes .= "s";
    $params[] = $capacidadFilter;
}

if (!empty($FKIDPlantillaFilter)) {
    $sql .= " AND FKIDPlantilla = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPlantillaFilter;
}

if (!empty($FKIDNacionalidadesFilter)) {
    $sql .= " AND FKIDNacionalidades = ?";
    $paramTypes .= "s";
    $params[] = $FKIDNacionalidadesFilter;
}

if (!empty($FKIDLigasFilter)) {
    $sql .= " AND FKIDLigas = ?";
    $paramTypes .= "s";
    $params[] = $FKIDLigasFilter;
}

if (!empty($FKIDPatrocinadorPrincipalFilter)) {
    $sql .= " AND FKIdPatrocinadorPrincipal = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPatrocinadorPrincipalFilter;
}

if (!empty($FKIDPatrocinadorUniformeFilter)) {
    $sql .= " AND FKIdpatrocinadorUniforme = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPatrocinadorUniformeFilter;
}

if (!empty($FKIDPatrocinadorPechoFilter)) {
    $sql .= " AND FKIdPatrocinadorPecho = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPatrocinadorPechoFilter;
}

if (!empty($FKIDPatrocinadorMangaFilter)) {
    $sql .= " AND FKIdPatrocinadorManga = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPatrocinadorMangaFilter;
}

if (!empty($FKIDPatrocinadorEspaldaFilter)) {
    $sql .= " AND FKIdPatrocinadorEspalda = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPatrocinadorEspaldaFilter;
}

if (!empty($FKIDFichajesFilter)) {
    $sql .= " AND FKIDFichajes = ?";
    $paramTypes .= "s";
    $params[] = $FKIDFichajesFilter;
}

if (!empty($FKIDTemporadasFilter)) {
    $sql .= " AND FKIDTemporadas = ?";
    $paramTypes .= "s";
    $params[] = $FKIDTemporadasFilter;
}

if (!empty($FKIDPartidoFilter)) {
    $sql .= " AND FKIDPartido = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPartidoFilter;
}

if (!empty($FKIDEstadisticasFilter)) {
    $sql .= " AND FKIDEstadisticas = ?";
    $paramTypes .= "s";
    $params[] = $FKIDEstadisticasFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'Nombre':
        $sql .= " ORDER BY Nombre";
        break;
    case 'Ciudad':
        $sql .= " ORDER BY Ciudad";
        break;
    case 'Direccion':
        $sql .= " ORDER BY Direccion";
        break;
    case 'Estadio':
        $sql .= " ORDER BY Estadio";
        break;
    case 'Capacidad':
        $sql .= " ORDER BY Capacidad";
        break;
    case 'FKIDPlantilla':
        $sql .= " ORDER BY FKIDPlantilla";
        break;
    case 'FKIDNacionalidades':
        $sql .= " ORDER BY FKIDNacionalidades";
        break;
    case 'FKIDLigas':
        $sql .= " ORDER BY FKIDLigas";
        break;
    case 'FKIDPatrocinadorPrincipal':
        $sql .= " ORDER BY FKIdPatrocinadorPrincipal";
        break;
    case 'FKIDPatrocinadorUniforme':
        $sql .= " ORDER BY FKIdpatrocinadorUniforme";
        break;
    case 'FKIDPatrocinadorPecho':
        $sql .= " ORDER BY FKIdPatrocinadorPecho";
        break;
    case 'FKIDPatrocinadorManga':
        $sql .= " ORDER BY FKIdPatrocinadorManga";
        break;
    case 'FKIDPatrocinadorEspalda':
        $sql .= " ORDER BY FKIdPatrocinadorEspalda";
        break;
    case 'FKIDFichajes':
        $sql .= " ORDER BY FKIDFichajes";
        break;
    case 'FKIDTemporadas':
        $sql .= " ORDER BY FKIDTemporadas";
        break;
    case 'FKIDPartido':
        $sql .= " ORDER BY FKIDPartido";
        break;
    case 'FKIDEstadisticas':
        $sql .= " ORDER BY FKIDEstadisticas";
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
// Aquí debe ir el código para procesar el formulario de búsqueda si lo deseas.
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
    <title>Edición Clubes</title>
</head>

<body>
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de clubes</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de Ligas -->
                <table>
                    <h4>Tabla de clubes</h4>
                    <tr class="titabla">
                        <th><a href="Clubes.php?orderBy=ID" class="titabla">ID</a></th>
                        <th><a href="Clubes.php?orderBy=Nombre" class="titabla">Nombre</a></th>
                        <th><a href="Clubes.php?orderBy=Ciudad" class="titabla">Ciudad</a></th>
                        <th><a href="Clubes.php?orderBy=Direccion" class="titabla">Direccion</a></th>
                        <th><a href="Clubes.php?orderBy=Estadio" class="titabla">Estadio</a></th>
                        <th><a href="Clubes.php?orderBy=Capacidad" class="titabla">Capacidad</a></th>
                        <th><a href="Clubes.php?orderBy=FKIdPatrocinadorPrincipal" class="titabla">ID Patrocinador Principal</a></th>
                        <th><a href="Clubes.php?orderBy=FKIdPatrocinadorUniforme" class="titabla">ID Patrocinador Uniforme</a></th>
                        <th><a href="Clubes.php?orderBy=FKIdPatrocinadorPecho" class="titabla">ID Patrocinador Pecho</a></th>
                        <th><a href="Clubes.php?orderBy=FKIdPatrocinadorManga" class="titabla">ID Patrocinador Manga</a></th>
                        <th><a href="Clubes.php?orderBy=FKIdPatrocinadorEspalda" class="titabla">ID Patrocinador Espalda</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDPlantilla" class="titabla">ID Plantilla</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDNacionalidades" class="titabla">ID Nacionalidades</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDLigas" class="titabla">ID Ligas</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDFichajes" class="titabla">ID Fichajes</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDTemporadas" class="titabla">ID Temporadas</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDPartido" class="titabla">ID Partido</a></th>
                        <th><a href="Clubes.php?orderBy=FKIDEstadisticas" class="titabla">ID Estadisticas</a></th>
                        <th><a href="" class="titabla">Editar Club</a></th>
                        <th><a href="" class="titabla">Eliminar Club</a></th>
                    </tr>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>" . $fila['ID'] . "</td>";
                            echo "<td class='celda'>" . $fila['Nombre'] . "</td>";
                            echo "<td class='celda'>" . $fila['Ciudad'] . "</td>";
                            echo "<td class='celda'>" . $fila['Direccion'] . "</td>";
                            echo "<td class='celda'>" . $fila['Estadio'] . "</td>";
                            echo "<td class='celda'>" . $fila['Capacidad'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIdPatrocinadorPrincipal'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIdPatrocinadorUniforme'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIdPatrocinadorPecho'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIdPatrocinadorManga'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIdPatrocinadorEspalda'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPlantilla'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDNacionalidades'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDLigas'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDFichajes'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDTemporadas'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDPartido'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDEstadisticas'] . "</td>";
                            echo "<td><button class='button'><a href='Editar.php?ID=" . $fila['ID'] . "' class='editar'>Editar</a></button></td>";
                            echo "<td><form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='ID' value='" . $fila['ID'] . "'>
                                <button class='button' type='submit'>Eliminar</button>
                                </form></td>";
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
                <!-- Formulario de Buscar Liga -->
                <form method="POST" action="Clubes.php" class="form">
                    <label for="search"><input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Club:</span></label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de filtrado -->
                <form method="GET" action="Clubes.php" class="form">
                    <label for="Nombre"><input class="input" type="text" name="Nombre" id="Nombre" value="<?php echo $nombreFilter; ?>"><span>Filtrar por Nombre:</span></label>
                    <label for="Ciudad"><input class="input" type="text" name="Ciudad" id="Ciudad" value="<?php echo $ciudadFilter; ?>"><span>Filtrar por Ciudad:</span> </label>
                    <label for="Direccion"><input class="input" type="text" name="Direccion" id="Direccion" value="<?php echo $direccionFilter; ?>"><span>Filtrar por Dirección:</span> </label>
                    <label for="Estadio"><input class="input" type="text" name="Estadio" id="Estadio" value="<?php echo $estadioFilter; ?>"><span>Filtrar por Estadio:</span> </label>
                    <label for="Capacidad"><input class="input" type="text" name="Capacidad" id="Capacidad" value="<?php echo $capacidadFilter; ?>"><span>Filtrar por Capacidad:</span> </label>
                    <label for="FKIdPatrocinadorPrincipal"><input class="input" type="text" name="FKIdPatrocinadorPrincipal" id="FKIdPatrocinadorPrincipal" value="<?php echo $FKIdPatrocinadorPrincipalFilter; ?>"><span>Filtrar por ID Patrocinador Principal:</span> </label>
                    <label for="FKIdPatrocinadorUniforme"><input class="input" type="text" name="FKIdPatrocinadorUniforme" id="FKIdPatrocinadorUniforme" value="<?php echo $FKIdPatrocinadorUniformeFilter; ?>"><span>Filtrar por ID Patrocinador Uniforme:</span> </label>
                    <label for="FKIdPatrocinadorPecho"><input class="input" type="text" name="FKIdPatrocinadorPecho" id="FKIdPatrocinadorPecho" value="<?php echo $FKIdPatrocinadorPechoFilter; ?>"><span>Filtrar por ID Patrocinador Pecho:</span> </label>
                    <label for="FKIdPatrocinadorManga"><input class="input" type="text" name="FKIdPatrocinadorManga" id="FKIdPatrocinadorManga" value="<?php echo $FKIdPatrocinadorMangaFilter; ?>"><span>Filtrar por ID Patrocinador Manga:</span> </label>
                    <label for="FKIdPatrocinadorEspalda"><input class="input" type="text" name="FKIdPatrocinadorEspalda" id="FKIdPatrocinadorEspalda" value="<?php echo $FKIdPatrocinadorEspaldaFilter; ?>"><span>Filtrar por ID Patrocinador Espalda:</span> </label>
                    <label for="FKIDPlantilla"><input class="input" type="text" name="FKIDPlantilla" id="FKIDPlantilla" value="<?php echo $FKIDPlantillaFilter; ?>"><span>Filtrar por ID Plantilla:</span> </label>
                    <label for="FKIDNacionalidades"><input class="input" type="text" name="FKIDNacionalidades" id="FKIDNacionalidades" value="<?php echo $FKIDNacionalidadesFilter; ?>"><span>Filtrar por ID Nacionalidades:</span> </label>
                    <label for="FKIDLigas"><input class="input" type="text" name="FKIDLigas" id="FKIDLigas" value="<?php echo $FKIDLigasFilter; ?>"><span>Filtrar por ID Ligas:</span> </label>
                    <label for="FKIDFichajes"><input class="input" type="text" name="FKIDFichajes" id="FKIDFichajes" value="<?php echo $FKIDFichajesFilter; ?>"><span>Filtrar por ID Fichajes:</span> </label>
                    <label for="FKIDTemporadas"><input class="input" type="text" name="FKIDTemporadas" id="FKIDTemporadas" value="<?php echo $FKIDTemporadasFilter; ?>"><span>Filtrar por ID Temporadas:</span> </label>
                    <label for="FKIDPartido"><input class="input" type="text" name="FKIDPartido" id="FKIDPartido" value="<?php echo $FKIDPartidoFilter; ?>"><span>Filtrar por ID Partido:</span> </label>
                    <label for="FKIDEstadisticas"><input class="input" type="text" name="FKIDEstadisticas" id="FKIDEstadisticas" value="<?php echo $FKIDEstadisticasFilter; ?>"><span>Filtrar por ID Estadisticas:</span> </label>
                    <!-- Continuar con los demás campos de filtrado según la tabla tblclubes -->
                    <button type="submit" class="button">Filtrar</button>
                </form>

            </div>
        </div>
        <br><br><br>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Clubes/Registrarse.html" class="boton">Agregar Club</a></button>
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