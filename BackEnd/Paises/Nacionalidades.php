<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarNacionalidad($id, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblnacionalidades WHERE 	
    ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['ID'])) {
    $idEliminar = $_GET['ID'];
    eliminarNacionalidad($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ID';
$nombresFilter = isset($_GET['Nombres']) ? mysqli_real_escape_string($conexion, $_GET['Nombres']) : '';
$capitalFilter = isset($_GET['Capital']) ? mysqli_real_escape_string($conexion, $_GET['Capital']) : '';
$idiomasFilter = isset($_GET['Idiomas']) ? mysqli_real_escape_string($conexion, $_GET['Idiomas']) : '';
$continenteFilter = isset($_GET['Continente']) ? mysqli_real_escape_string($conexion, $_GET['Continente']) : '';
$monedasFilter = isset($_GET['Monedas']) ? mysqli_real_escape_string($conexion, $_GET['Monedas']) : '';
$idPlantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$idClubesFilter = isset($_GET['FKIDClubes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClubes']) : '';
$idLigasFilter = isset($_GET['FKIDLigas']) ? mysqli_real_escape_string($conexion, $_GET['FKIDLigas']) : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT 
            n.ID, 
            n.Nombres, 
            n.Capital, 
            n.Idiomas, 
            n.Continente, 
            n.Monedas, 
            n.FKIDPlantilla, 
            COUNT(DISTINCT c.ID) AS NumClubes,
            COUNT(DISTINCT l.ID) AS NumLigas
        FROM tblnacionalidades n
        LEFT JOIN tblclubes c ON c.ID = n.FKIDClubes
        LEFT JOIN tblligas l ON l.ID = n.FKIDLigas
        WHERE 1 = 1 ";

// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombresFilter)) {
    $sql .= " AND Nombres = ?";
    $paramTypes .= "s";
    $params[] = $nombresFilter;
}

if (!empty($capitalFilter)) {
    $sql .= " AND `Capital` = ?";
    $paramTypes .= "s";
    $params[] = $capitalFilter;
}

if (!empty($idiomasFilter)) {
    $sql .= " AND `Idiomas` = ?";
    $paramTypes .= "s";
    $params[] = $idiomasFilter;
}

if (!empty($continenteFilter)) {
    $sql .= " AND `Continente` = ?";
    $paramTypes .= "s";
    $params[] = $continenteFilter;
}

if (!empty($monedasFilter)) {
    $sql .= " AND `Monedas` = ?";
    $paramTypes .= "s";
    $params[] = $monedasFilter;
}

if (!empty($idPlantillaFilter)) {
    $sql .= " AND FKIDPlantilla = ?";
    $paramTypes .= "s";
    $params[] = $idPlantillaFilter;
}

if (!empty($idClubesFilter)) {
    $sql .= " AND FKIDClubes = ?";
    $paramTypes .= "s";
    $params[] = $idClubesFilter;
}

if (!empty($idLigasFilter)) {
    $sql .= " AND FKIDLigas = ?";
    $paramTypes .= "s";
    $params[] = $idLigasFilter;
}

if (!empty($idFilter)) {
    $sql .= " AND ID = ?";
    $paramTypes .= "s";
    $params[] = $idFilter;
}

$sql .= " GROUP BY n.ID";

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY n.ID";
        break;
    case 'Nombres':
        $sql .= " ORDER BY n.Nombres";
        break;
    case 'Capital':
        $sql .= " ORDER BY n.Capital";
        break;
    case 'Idiomas':
        $sql .= " ORDER BY n.Idiomas";
        break;
    case 'Continente':
        $sql .= " ORDER BY n.Continente";
        break;
    case 'Monedas':
        $sql .= " ORDER BY n.Monedas";
        break;
     case ' FKIDPlantilla':
        $sql .= " ORDER BY  n.FKIDPlantilla";
        break;
    case 'FKIDClubes':
        $sql .= " ORDER BY NumClubes";
        break;
    default:
        $sql .= " ORDER BY NumLigas ";
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
        $sql = "SELECT ID, Nombres, Capital, Idiomas, Continente, Monedas,  FKIDPlantilla, FKIDClubes, FKIDLigas 
        FROM tblnacionalidades WHERE Nombres LIKE ? OR Capital LIKE ? OR Idiomas LIKE ? OR Continente 
        LIKE ? OR Monedas LIKE ? OR FKIDPlantilla LIKE ? OR FKIDClubes LIKE ? OR FKIDLigas";
        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "sssssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes,  $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <title>Control de nacionalidades</title>
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
    <h3>Lista de Nacionalidades</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Ligas -->
            <table>
            <h4>Tabla de Nacionalidades</h4>
                <tr class="titabla">
                    <th><a href="Nacionalidades.php?orderBy=ID" class="titabla">ID</a></th>
                    <th><a href="Nacionalidades.php?orderBy=Nombre"class="titabla">Nombre</a></th>
                    <th><a href="Nacionalidades.php?orderBy=Capital"class="titabla">Capital</a></th>
                    <th><a href="Nacionalidades.php?orderBy=Idiomas"class="titabla">Idiomas</a></th>
                    <th><a href="Nacionalidades.php?orderBy=Continente"class="titabla">Continente</a></th>
                    <th><a href="Nacionalidades.php?orderBy=Monedas"class="titabla">Monedas</a></th>
                    <th><a href="Nacionalidades.php?orderBy=FKIDPlantilla"class="titabla"># Jugadores</a></th>
                    <th><a href="Nacionalidades.php?orderBy=NumClubes"class="titabla"># Clubes</a></th>         
                    <th><a href="Nacionalidades.php?orderBy=NumLigas"class="titabla"># Ligas</a></th>
                    <th><a href=""class="titabla">Editar Nacionalidad</a></th>
                    <th><a href=""class="titabla">Eliminar Nacionalidad</a></th>
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['ID']."</td>";
                        echo "<td class='celda'>".$fila['Nombres']."</td>";
                        echo "<td class='celda'>".$fila['Capital']."</td>";
                        echo "<td class='celda'>".$fila['Idiomas']."</td>";
                        echo "<td class='celda'>".$fila['Continente']."</td>";
                        echo "<td class='celda'>".$fila['Monedas']."</td>";
                        echo "<td class='celda'>".$fila['FKIDPlantilla']."</td>";
                        echo "<td class='celda'>".$fila['NumClubes']."</td>";
                        echo "<td class='celda'>".$fila['NumLigas']."</td>";
                        echo "<td><button class='button'><a href='Editar.php?ID=".$fila['ID']."''>Editar</a></button></td>";
                        echo "<td><form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='ID' value='".$fila['ID']."'>
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
            <!-- Formulario de Buscar nacionalidad -->
            <form method="POST" action="Nacionalidades.php" class="form">
                <label for="search">
                <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Nacionalidad:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Nacionalidades.php" class="form">  
                    <label for="Nombres"><input class="input" type="text" name="Nombres" id="Nombres" value="<?php echo $nombresFilter; ?>"><span>Filtrar por Nombre:</span></label>
                    <label for="Capital"><input class="input" type="text" name="Capital" id="Capital" value="<?php echo $capitalFilter; ?>"><span>Filtrar por Capital:</span></label>
                    <label for="Idiomas"><input class="input" type="text" name="Idiomas" id="Idiomas" value="<?php echo $idiomasFilter; ?>"><span>Filtrar por Idioma:</span></label>
                    <label for="Continente"><input class="input" type="text" name="Continente" id="Continente" value="<?php echo $continenteFilter; ?>"><span>Filtrar por Continente:</span></label>
                    <label for="Monedas"><input class="input" type="text" name="Monedas" id="Monedas" value="<?php echo $monedasFilter; ?>"><span>Filtrar por Moneda:</span></label>
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div> 
<div class="botones">
<button class="button"><a href="/FrontEnd/html/Paises/Registrarse.html" class="boton">Agregar Nacionalidad</a></button>
    <form method="POST" action="Exportar.php">
    <button type="submit" class="button">Hacer copia de seguridad</button>
    </form>
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