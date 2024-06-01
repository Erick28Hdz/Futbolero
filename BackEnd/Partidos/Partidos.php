<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarUsuario($ID, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblpartidos WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarUsuario($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$calendarioFilter = isset($_GET['Calendario']) ? mysqli_real_escape_string($conexion, $_GET['Calendario']) : '';
$clubLocalFilter = isset($_GET['ClubLocal']) ? mysqli_real_escape_string($conexion, $_GET['ClubLocal']) : '';
$clubVisitanteFilter = isset($_GET['ClubVisitante']) ? mysqli_real_escape_string($conexion, $_GET['ClubVisitante']) : '';
$horaFilter = isset($_GET['Hora']) ? mysqli_real_escape_string($conexion, $_GET['Hora']) : '';
$fechaFilter = isset($_GET['Fecha']) ? mysqli_real_escape_string($conexion, $_GET['Fecha']) : '';
$resultadoLocalFilter = isset($_GET['ResultadoLocal']) ? mysqli_real_escape_string($conexion, $_GET['ResultadoLocal']) : '';
$resultadoVisitanteFilter = isset($_GET['ResultadoVisitante']) ? mysqli_real_escape_string($conexion, $_GET['ResultadoVisitante']) : '';
$puntosFilter = isset($_GET['Puntos']) ? mysqli_real_escape_string($conexion, $_GET['Puntos']) : '';
$golesFilter = isset($_GET['Goles']) ? mysqli_real_escape_string($conexion, $_GET['Goles']) : '';
$tarjetasAmarillasFilter = isset($_GET['TarjetasAmarillas']) ? mysqli_real_escape_string($conexion, $_GET['TarjetasAmarillas']) : '';
$tarjetasRojasFilter = isset($_GET['TarjetasRojas']) ? mysqli_real_escape_string($conexion, $_GET['TarjetasRojas']) : '';
$doblesAmarillasFilter = isset($_GET['DoblesAmarillas']) ? mysqli_real_escape_string($conexion, $_GET['DoblesAmarillas']) : '';
$FKIDPlantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$FKIDLigasFilter = isset($_GET['FKIDLigas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDLigas']) : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT ID, Calendario, ClubLocal, ClubVisitante, Hora, Fecha, ResultadoLocal, ResultadoVisitante, Puntos, Goles, TarjetasAmarillas, TarjetasRojas, DoblesAmarillas, FKIDPlantilla, FKIDLigas FROM tblpartidos WHERE 1=1";


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($calendarioFilter)) {
    $sql .= " AND Calendario = ?";
    $paramTypes .= "s";
    $params[] = $calendarioFilter;
}

if (!empty($clubLocalFilter)) {
    $sql .= " AND ClubLocal = ?";
    $paramTypes .= "s";
    $params[] = $clubLocalFilter;
}

if (!empty($clubVisitanteFilter)) {
    $sql .= " AND ClubVisitante = ?";
    $paramTypes .= "s";
    $params[] = $clubVisitanteFilter;
}

if (!empty($horaFilter)) {
    $sql .= " AND Hora = ?";
    $paramTypes .= "s";
    $params[] = $horaFilter;
}

if (!empty($fechaFilter)) {
    $sql .= " AND Fecha = ?";
    $paramTypes .= "s";
    $params[] = $fechaFilter;
}

if (!empty($resultadoLocalFilter)) {
    $sql .= " AND ResultadoLocal = ?";
    $paramTypes .= "s";
    $params[] = $resultadoLocalFilter;
}

if (!empty($resultadoVisitanteFilter)) {
    $sql .= " AND ResultadoVisitante = ?";
    $paramTypes .= "s";
    $params[] = $resultadoVisitanteFilter;
}

if (!empty($puntosFilter)) {
    $sql .= " AND Puntos = ?";
    $paramTypes .= "s";
    $params[] = $puntosFilter;
}

if (!empty($golesFilter)) {
    $sql .= " AND Goles = ?";
    $paramTypes .= "s";
    $params[] = $golesFilter;
}

if (!empty($tarjetasAmarillasFilter)) {
    $sql .= " AND TarjetasAmarillas = ?";
    $paramTypes .= "s";
    $params[] = $tarjetasAmarillasFilter;
}

if (!empty($tarjetasRojasFilter)) {
    $sql .= " AND TarjetasRojas = ?";
    $paramTypes .= "s";
    $params[] = $tarjetasRojasFilter;
}

if (!empty($doblesAmarillasFilter)) {
    $sql .= " AND DoblesAmarillas = ?";
    $paramTypes .= "s";
    $params[] = $doblesAmarillasFilter;
}

if (!empty($FKIDPlantillaFilter)) {
    $sql .= " AND FKIDPlantilla = ?";
    $paramTypes .= "s";
    $params[] = $FKIDPlantillaFilter;
}

if (!empty($FKIDLigasFilter)) {
    $sql .= " AND FKIDLigas = ?";
    $paramTypes .= "s";
    $params[] = $FKIDLigasFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'Calendario':
        $sql .= " ORDER BY Calendario";
        break;
    case 'ClubLocal':
        $sql .= " ORDER BY ClubLocal";
        break;
    case 'ClubVisitante':
        $sql .= " ORDER BY ClubVisitante";
        break;
    case 'Hora':
        $sql .= " ORDER BY Hora";
        break;
    case 'Fecha':
        $sql .= " ORDER BY Fecha";
        break;
    case 'ResultadoLocal':
        $sql .= " ORDER BY ResultadoLocal";
        break;
    case 'ResultadoVisitante':
        $sql .= " ORDER BY ResultadoVisitante";
        break;
    case 'Puntos':
        $sql .= " ORDER BY Puntos";
        break;
    case 'Goles':
        $sql .= " ORDER BY Goles";
        break;
    case 'TarjetasAmarillas':
        $sql .= " ORDER BY TarjetasAmarillas";
        break;
    case 'TarjetasRojas':
        $sql .= " ORDER BY TarjetasRojas";
        break;
    case 'DoblesAmarillas':
        $sql .= " ORDER BY DoblesAmarillas";
        break;
    case 'FKIDPlantilla':
        $sql .= " ORDER BY FKIDPlantilla";
        break;
    case 'FKIDLigas':
        $sql .= " ORDER BY FKIDLigas";
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
        $sql = "SELECT ID, Calendario, ClubLocal, ClubVisitante, Hora, Fecha, ResultadoLocal, ResultadoVisitante, Puntos, Goles, TarjetasAmarillas, TarjetasRojas, DoblesAmarillas, FKIDPlantilla,  FKIDLigas 
        FROM tblpartidos 
        WHERE Calendario LIKE ? OR ClubLocal LIKE ? OR ClubVisitante LIKE ? OR Hora LIKE ? OR Fecha LIKE ? OR ResultadoLocal LIKE ? OR ResultadoVisitante LIKE ? OR Puntos LIKE ? OR Goles LIKE ? OR TarjetasAmarillas LIKE ? OR TarjetasRojas LIKE ? OR DoblesAmarillas LIKE ? OR FKIDPlantilla LIKE ? OR FKIDLigas LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ssssssssssssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registros.css" />
<title>Edición partidos</title>
</head>
<body>
<header>
    <a href="/FrontEnd/html/Administradores/Administrador.html"
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
    <h3>Lista de Partidos</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Partidos -->
            <table>
            <h4>Tabla de Partidos</h4>
                <tr class="titabla">
                    <th><a href="Partidos.php?orderBy=ID" class="titabla">ID</a></th>
                    <th><a href="Partidos.php?orderBy=Calendario"class="titabla">Calendario</a></th>
                    <th><a href="Partidos.php?orderBy=ClubLocal"class="titabla">Club Local</a></th>
                    <th><a href="Partidos.php?orderBy=ClubVisitante"class="titabla">Club Visitante</a></th>         
                    <th><a href="Partidos.php?orderBy=Hora"class="titabla">Hora</a></th>
                    <th><a href="Partidos.php?orderBy=Fecha"class="titabla">Fecha</a></th>
                    <th><a href="Partidos.php?orderBy=ResultadoLocal"class="titabla">Resultado Local</a></th>
                    <th><a href="Partidos.php?orderBy=ResultadoVisitante"class="titabla">Resultado Visitante</a></th>
                    <th><a href="Partidos.php?orderBy=Puntos"class="titabla">Puntos</a></th>
                    <th><a href="Partidos.php?orderBy=Goles"class="titabla">Goles</a></th>
                    <th><a href="Partidos.php?orderBy=TarjetasAmarillas"class="titabla">Tarjetas Amarillas</a></th>
                    <th><a href="Partidos.php?orderBy=TarjetasRojas"class="titabla">Tarjetas Rojas</a></th>
                    <th><a href="Partidos.php?orderBy=DoblesAmarillas"class="titabla">Dobles Amarillas</a></th>
                    <th><a href="Partidos.php?orderBy=FKIDPlantilla"class="titabla">FKID Plantilla</a></th>
                    <th><a href=""class="titabla">Editar Partido</a></th>
                    <th><a href=""class="titabla">Eliminar Partido</a></th>
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['ID']."</td>";
                        echo "<td class='celda'>".$fila['Calendario']."</td>";
                        echo "<td class='celda'>".$fila['ClubLocal']."</td>";
                        echo "<td class='celda'>".$fila['ClubVisitante']."</td>";
                        echo "<td class='celda'>".$fila['Hora']."</td>";
                        echo "<td class='celda'>".$fila['Fecha']."</td>";
                        echo "<td class='celda'>".$fila['ResultadoLocal']."</td>";
                        echo "<td class='celda'>".$fila['ResultadoVisitante']."</td>";
                        echo "<td class='celda'>".$fila['Puntos']."</td>";
                        echo "<td class='celda'>".$fila['Goles']."</td>";
                        echo "<td class='celda'>".$fila['TarjetasAmarillas']."</td>";
                        echo "<td class='celda'>".$fila['TarjetasRojas']."</td>";
                        echo "<td class='celda'>".$fila['DoblesAmarillas']."</td>";
                        echo "<td class='celda'>".$fila['FKIDPlantilla']."</td>";
                        echo "<td><button class='button'><a href='EditarPartido.php?ID=".$fila['ID']."'class='editar'>Editar</a></button></td>";
                        echo "<td><form method='GET' action='EsteArchivo.php'>
                                <input type='hidden' name='ID' value='".$fila['ID']."'>
                                <button class='button' type='submit' name='eliminar'>Eliminar</button>
                                </form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17'>No se encontraron registros</td></tr>";
                }
                ?>    
            </table>
        </div>
        
        <div class="filtros">
        <p class="title">Filtros</p>
        <!-- Formulario de Buscar Partido -->
            <form method="GET" action="Partidos.php" class="form">
                <label for="search"><input class="input" type="text" name="search" id="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><span>Buscar Partido:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Partidos.php" class="form">
                    <label for="Calendario"><input class="input" type="text" name="Calendario" id="Calendario" value="<?php echo isset($_GET['Calendario']) ? $_GET['Calendario'] : ''; ?>"><span>Filtrar por Calendario:</span></label>
                    <label for="ClubLocal"><input class="input" type="text" name="ClubLocal" id="ClubLocal" value="<?php echo isset($_GET['ClubLocal']) ? $_GET['ClubLocal'] : ''; ?>"><span>Filtrar por Club Local:</span></label>
                    <label for="ClubVisitante"><input class="input" type="text" name="ClubVisitante" id="ClubVisitante" value="<?php echo isset($_GET['ClubVisitante']) ? $_GET['ClubVisitante'] : ''; ?>"><span>Filtrar por Club Visitante:</span></label>
                    <label for="Fecha"><input class="input" type="text" name="Fecha" id="Fecha" value="<?php echo isset($_GET['Fecha']) ? $_GET['Fecha'] : ''; ?>"><span>Filtrar por Fecha:</span></label>
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div>
    <br><br><br>
<div class="botones">
<button class="button"><a href="/FrontEnd/html/Partidos/Registrarse.html" class="boton">Agregar Partido</a></button>
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
