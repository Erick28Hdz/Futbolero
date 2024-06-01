<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar una estadística por su ID
function eliminarEstadistica($idEstadistica, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblestadisticas WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idEstadistica);
    $stmt->execute();
}
    
// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarEstadistica($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$posesionFilter = isset($_GET['Posesion']) ? mysqli_real_escape_string($conexion, $_GET['Posesion']) : '';
$tirosEsquinaFilter = isset($_GET['TirosEsquina']) ? mysqli_real_escape_string($conexion, $_GET['TirosEsquina']) : '';
$marcadorFilter = isset($_GET['Marcador']) ? mysqli_real_escape_string($conexion, $_GET['Marcador']) : '';
$tiroArcoFilter = isset($_GET['TiroArco']) ? mysqli_real_escape_string($conexion, $_GET['TiroArco']) : '';
$empateFilter = isset($_GET['Empate']) ? mysqli_real_escape_string($conexion, $_GET['Empate']) : '';
$victoriaVisitanteFilter = isset($_GET['VictoriaVisitante']) ? mysqli_real_escape_string($conexion, $_GET['VictoriaVisitante']) : '';
$victoriaLocalFilter = isset($_GET['VictoriaLocal']) ? mysqli_real_escape_string($conexion, $_GET['VictoriaLocal']) : '';
$faltasFilter = isset($_GET['Faltas']) ? mysqli_real_escape_string($conexion, $_GET['Faltas']) : '';
$golesFilter = isset($_GET['Goles']) ? mysqli_real_escape_string($conexion, $_GET['Goles']) : '';
$atajadasFilter = isset($_GET['Atajadas']) ? mysqli_real_escape_string($conexion, $_GET['Atajadas']) : '';
$tarjetasAmarillasFilter = isset($_GET['TarjetasAmarillas']) ? mysqli_real_escape_string($conexion, $_GET['TarjetasAmarillas']) : '';
$tarjetasRojasFilter = isset($_GET['TarjetasRojas']) ? mysqli_real_escape_string($conexion, $_GET['TarjetasRojas']) : '';
$FKIDPartidoFilter = isset($_GET['FKIDPartido']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPartido']) : '';
$FKIDPlantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$FKIDClubFilter = isset($_GET['FKIDClub']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClub']) : '';
$FKIDSeleccionesNacionalesFilter = isset($_GET['FKIDSeleccionesNacionales']) ? mysqli_real_escape_string($conexion, $_GET['FKIDSeleccionesNacionales']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE

$sql = "SELECT ID, Posesion, TirosEsquina, Marcador, TiroArco, Empate, VictoriaVisitante, VictoriaLocal, Faltas, Goles, Atajadas, TarjetasAmarillas, TarjetasRojas, FKIDPartido, FKIDPlantilla, FKIDClub, FKIDSeleccionesNacionales FROM tblestadisticas WHERE 1 = 1";  // Agregamos una condición siempre verdadera para comenzar la cláusula WHERE


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

// Agrega aquí los bloques para cada filtro que desees implementar, utilizando los nombres de los campos de la tabla tblestadisticas.

$sql .= " GROUP BY ID";

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'Posesion':
        $sql .= " ORDER BY Posesion";
        break;
    case 'TirosEsquina':
        $sql .= " ORDER BY TirosEsquina";
        break;
    case 'Marcador':
        $sql .= " ORDER BY Marcador";
        break;
    case 'TiroArco':
        $sql .= " ORDER BY TiroArco";
        break;
    case 'Empate':
        $sql .= " ORDER BY Empate";
        break;
    case 'VictoriaVisitante':
        $sql .= " ORDER BY VictoriaVisitante";
        break;
    case 'VictoriaLocal':
        $sql .= " ORDER BY VictoriaLocal";
        break;
    case 'Faltas':
        $sql .= " ORDER BY Faltas";
        break;
    case 'Goles':
        $sql .= " ORDER BY Goles";
        break;
    case 'Atajadas':
        $sql .= " ORDER BY Atajadas";
        break;
    case 'TarjetasAmarillas':
        $sql .= " ORDER BY TarjetasAmarillas";
        break;
    case 'TarjetasRojas':
        $sql .= " ORDER BY TarjetasRojas";
        break;
    case 'FKIDPartido':
        $sql .= " ORDER BY FKIDPartido";
        break;
    case 'FKIDPlantilla':
        $sql .= " ORDER BY FKIDPlantilla";
        break;
    case 'FKIDClub':
        $sql .= " ORDER BY FKIDClub";
        break;
    case 'FKIDSeleccionesNacionales':
        $sql .= " ORDER BY FKIDSeleccionesNacionales";
        break;
    default:
        // Ordenar por ID por defecto
        $sql .= " ORDER BY ID";
        break;
}

// Preparar la consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die('Error en la preparación de la consulta: ' . $conexion->error);
}
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
        $sql = "SELECT ID, Posesion, TirosEsquina, Marcador, TiroArco, Empate, VictoriaVisitante, VictoriaLocal, Faltas, Goles, Atajadas, TarjetasAmarillas, TarjetasRojas, FKIDPartido, FKIDPlantilla, FKIDClub, FKIDSeleccionesNacionales FROM tblestadisticas WHERE Posesion LIKE ? OR TirosEsquina LIKE ? OR Marcador LIKE ? OR TiroArco LIKE ? OR Empate LIKE ? OR VictoriaVisitante LIKE ? OR VictoriaLocal LIKE ? OR Faltas LIKE ? OR Goles LIKE ? OR Atajadas LIKE ? OR TarjetasAmarillas LIKE ? OR TarjetasRojas LIKE ? OR FKIDPartido LIKE ? OR FKIDPlantilla LIKE ? OR FKIDClub LIKE ? OR FKIDSeleccionesNacionales LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "sssssssssssssssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <title>Control de Roles</title>
</head>
<body id="roles">
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
    <h3>Lista de Roles</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Roles -->
            <table>
            <h4>Tabla de Roles</h4>
                <tr class="titabla">
                    <th><a href="Roles.php?orderBy=ID" class="titabla">ID</a></th>
                    <th><a href="Roles.php?orderBy=Posesion" class="titabla">Posesion</a></th>
                    <th><a href="Roles.php?orderBy=TirosEsquina" class="titabla">TirosEsquina</a></th>
                    <th><a href="Roles.php?orderBy=Marcador" class="titabla">Marcador</a></th>           
                    <th><a href="Roles.php?orderBy=TiroArco" class="titabla">TiroArco</a></th>
                    <th><a href="Roles.php?orderBy=Empate" class="titabla">Empate</a></th>
                    <th><a href="Roles.php?orderBy=VictoriaVisitante" class="titabla">VictoriaVisitante</a></th>
                    <th><a href="Roles.php?orderBy=VictoriaLocal" class="titabla">VictoriaLocal</a></th>
                    <th><a href="Roles.php?orderBy=Faltas" class="titabla">Faltas</a></th>
                    <th><a href="Roles.php?orderBy=Goles" class="titabla">Goles</a></th>
                    <th><a href="Roles.php?orderBy=Atajadas" class="titabla">Atajadas</a></th>
                    <th><a href="Roles.php?orderBy=TarjetasAmarillas" class="titabla">TarjetasAmarillas</a></th>
                    <th><a href="Roles.php?orderBy=TarjetasRojas" class="titabla">TarjetasRojas</a></th>
                    <th><a href="Roles.php?orderBy=FKIDPartido" class="titabla">FKIDPartido</a></th>
                    <th><a href="Roles.php?orderBy=FKIDPlantilla" class="titabla">FKIDPlantilla</a></th>
                    <th><a href="Roles.php?orderBy=FKIDClub" class="titabla">FKIDClub</a></th>
                    <th><a href="Roles.php?orderBy=FKIDSeleccionesNacionales" class="titabla">FKIDSeleccionesNacionales</a></th>
                    <th><a href=""class="titabla">Editar Rol</a></th>
                    <th><a href=""class="titabla">Eliminar Rol</a></th>	
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['ID']."</td>";
                        echo "<td class='celda'>".$fila['Posesion']."</td>";
                        echo "<td class='celda'>" . $fila['TirosEsquina'] . "</td>";
                        echo "<td class='celda'>" . $fila['Marcador'] . "</td>";
                        echo "<td class='celda'>" . $fila['TiroArco'] . "</td>";
                        echo "<td class='celda'>" . $fila['Empate'] . "</td>";
                        echo "<td class='celda'>" . $fila['VictoriaVisitante'] . "</td>";
                        echo "<td class='celda'>" . $fila['VictoriaLocal'] . "</td>";
                        echo "<td class='celda'>" . $fila['Faltas'] . "</td>";
                        echo "<td class='celda'>" . $fila['Goles'] . "</td>";
                        echo "<td class='celda'>" . $fila['Atajadas'] . "</td>";
                        echo "<td class='celda'>" . $fila['TarjetasAmarillas'] . "</td>";
                        echo "<td class='celda'>" . $fila['TarjetasRojas'] . "</td>";
                        echo "<td class='celda'>" . $fila['FKIDPartido'] . "</td>";
                        echo "<td class='celda'>" . $fila['FKIDPlantilla'] . "</td>";
                        echo "<td class='celda'>" . $fila['FKIDClub'] . "</td>";
                        echo "<td class='celda'>" . $fila['FKIDSeleccionesNacionales'] . "</td>";
                        echo "<td><button class='button'><a href='Editar.php?ID=".$fila['ID']."''>Editar</a></button></td>";
                        echo "<td>
                        <form method='POST' action='Eliminar.php'>
                          <input type='hidden' name='ID' value='".$fila['ID']."'>
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
        <!-- Formulario de Buscar Roles -->
            <form method="POST" action="Roles.php" class="form">
                <label for="search">
                    <input class="input"type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Rol:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Roles.php" class="form">
                <label for="Nombre"><input class="input" type="text" name="Nombre" id="Nombre" value="<?php echo $nombreFilter; ?>"><span>Filtrar por Nombre:</span></label>
                <label for="IdRol">
                <select class="input" name="IdRol" id="IdRol">
                    <option value="">Todos</option>
                    <option value="1"<?php echo isset($idRolFilter) && $idRolFilter === '1' ? ' selected' : ''; ?>>Invitado</option>
                    <option value="2"<?php echo isset($idRolFilter) && $idRolFilter === '2' ? ' selected' : ''; ?>>Básico</option>
                    <option value="3"<?php echo isset($idRolFilter) && $idRolFilter === '3' ? ' selected' : ''; ?>>Estrella</option>
                    <option value="4"<?php echo isset($idRolFilter) && $idRolFilter === '4' ? ' selected' : ''; ?>>Premium</option>
                    <option value="5"<?php echo isset($idRolFilter) && $idRolFilter === '5' ? ' selected' : ''; ?>>Administrador</option>
                </select>
                <span>Filtrar por Rol:</span>
                </label>
            <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div>
    <br><br><br><br><br>
    <div class="botones">
    <button class="button"><a href="/FrontEnd/html/Estadisticas/Registrarse.html" class="boton">Agregar nuevo Rol</a></button>
        <form method="POST" action="Exportar.php">
        <button type="submit" class="button">Hacer copia de seguridad</button>></form>
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
