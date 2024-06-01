<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar una temporada por su ID
function eliminarTemporada($ID, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tbltemporadas WHERE IdTemporada = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarTemporada($idEliminar, $conexion);
}

// Variables para ordenar y filtrar
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'IdTemporada';
$nombreFilter = isset($_GET['Nombre']) ? $_GET['Nombre'] : '';
$fechaInicialFilter = isset($_GET['FechaInicial']) ? $_GET['FechaInicial'] : '';
$fechaFinalFilter = isset($_GET['FechaFinal']) ? $_GET['FechaFinal'] : '';
$idLigasFilter = isset($_GET['FKIDLigas']) ? $_GET['FKIDLigas'] : '';
$idClubesFilter = isset($_GET['FKIDClubes']) ? $_GET['FKIDClubes'] : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT IdTemporada, Nombre, FechaInicial, FechaFinal, FKIDLigas, FKIDClubes FROM tbltemporadas WHERE 1=1";

// Construir la consulta SQL con los filtros si se han proporcionado
if (!empty($nombreFilter)) {
    $sql .= " AND Nombre = ?";
}

if (!empty($fechaInicialFilter)) {
    $sql .= " AND FechaInicial = ?";
}

if (!empty($fechaFinalFilter)) {
    $sql .= " AND FechaFinal = ?";
}

if (!empty($idLigasFilter)) {
    $sql .= " AND FKIDLigas = ?";
}

if (!empty($idClubesFilter)) {
    $sql .= " AND FKIDClubes = ?";
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'IdTemporada':
        $sql .= " ORDER BY IdTemporada";
        break;
    case 'Nombre':
        $sql .= " ORDER BY Nombre";
        break;
    case 'FechaInicial':
        $sql .= " ORDER BY FechaInicial";
        break;
    case 'FechaFinal':
        $sql .= " ORDER BY FechaFinal";
        break;
    case 'FKIDLigas':
        $sql .= " ORDER BY FKIDLigas";
        break;
    case 'FKIDClubes':
        $sql .= " ORDER BY FKIDClubes";
        break;
    default:
        $sql .= " ORDER BY IdTemporada";
        break;
}

// Preparar la consulta
$stmt = $conexion->prepare($sql);

// Asociar los parámetros en caso de que se hayan definido
if (!empty($nombreFilter)) {
    $stmt->bind_param("s", $nombreFilter);
}

if (!empty($fechaInicialFilter)) {
    $stmt->bind_param("s", $fechaInicialFilter);
}

if (!empty($fechaFinalFilter)) {
    $stmt->bind_param("s", $fechaFinalFilter);
}

if (!empty($idLigasFilter)) {
    $stmt->bind_param("i", $idLigasFilter);
}

if (!empty($idClubesFilter)) {
    $stmt->bind_param("i", $idClubesFilter);
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
        $sql = "SELECT IdTemporada, Nombre, FechaInicial, FechaFinal, FKIDLigas, FKIDClubes FROM tbltemporadas 
        WHERE Nombre LIKE ? OR FechaInicial = ? OR FechaFinal = ? OR FKIDLigas = ? OR FKIDClubes = ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ssiii"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@500&family=Kanit:wght@500&family=Rubik+Mono+One&family=Sintony&family=Suravaram&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/FrontEnd/css/Registros/Registros.css" />
    <title>Edición Temporadas</title>
</head>
<body>
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras"></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2">
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de Temporadas</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de Temporadas -->
                <table>
                    <h4>Tabla de Temporadas</h4>
                    <tr class="titabla">
                        <th><a href="Temporadas.php?orderBy=IdTemporada" class="titabla">ID</a></th>
                        <th><a href="Temporadas.php?orderBy=Nombre" class="titabla">Nombre</a></th>
                        <th><a href="Temporadas.php?orderBy=FechaInicial" class="titabla">Fecha Inicial</a></th>
                        <th><a href="Temporadas.php?orderBy=FechaFinal" class="titabla">Fecha Final</a></th>
                        <th><a href="Temporadas.php?orderBy=FKIDLigas" class="titabla">FKIDLigas</a></th>
                        <th><a href="Temporadas.php?orderBy=FKIDClubes" class="titabla">FKIDClubes</a></th>
                        <th><a href="" class="titabla">Editar Temporada</a></th>
                        <th><a href="" class="titabla">Eliminar Temporada</a></th>
                    </tr>   
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>".$fila['IdTemporada']."</td>";
                            echo "<td class='celda'>".$fila['Nombre']."</td>";
                            echo "<td class='celda'>".$fila['FechaInicial']."</td>";
                            echo "<td class='celda'>".$fila['FechaFinal']."</td>";
                            echo "<td class='celda'>".$fila['FKIDLigas']."</td>";
                            echo "<td class='celda'>".$fila['FKIDClubes']."</td>";
                            echo "<td><button class='button'><a href='Editar.php?ID=".$fila['IdTemporada']."' class='editar'>Editar</a></button></td>";
                            echo "<td><form method='POST' action='Eliminar.php'>
                                    <input type='hidden' name='ID' value='".$fila['IdTemporada']."'>
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
                <!-- Formulario de Buscar Temporada -->
                <form method="POST" action="Temporadas.php" class="form">
                    <label for="search"><input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Temporada:</span></label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de filtrado -->
                <form method="GET" action="Temporadas.php" class="form">
                    <label for="FechaInicial"><input class="input" type="date" name="FechaInicial" id="FechaInicial" value="<?php echo $fechaInicialFilter; ?>"><span>Filtrar por Fecha Inicial:</span></label>
                    <label for="FechaFinal"><input class="input" type="date" name="FechaFinal" id="FechaFinal" value="<?php echo $fechaFinalFilter; ?>"><span>Filtrar por Fecha Final:</span></label>
                    <button type="submit" class="button">Filtrar</button>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Temporada/Registrarse.html" class="boton">Agregar Temporada</a></button>
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
