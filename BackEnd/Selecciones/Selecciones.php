<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarUsuario($ID, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblseleccionesnacionales WHERE ID = ?";
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
$nombreFilter = isset($_GET['Nombre']) ? mysqli_real_escape_string($conexion, $_GET['Nombre']) : '';
$añofundacionFilter = isset($_GET['AñoFundacion']) ? mysqli_real_escape_string($conexion, $_GET['AñoFundacion']) : '';
$idplantillaFilter = isset($_GET['FKIDPlantilla']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPlantilla']) : '';
$idnacionalidadFilter = isset($_GET['FKIDNacionalidades']) ? mysqli_real_escape_string($conexion, $_GET['FKIDNacionalidades']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT sn.ID, sn.Nombre, sn.AñoFundacion, sn.FKIDPlantilla, n.Nombres AS NombreNacionalidad
        FROM tblseleccionesnacionales sn
        LEFT JOIN tblnacionalidades n ON sn.FKIDNacionalidades = n.ID
        WHERE 1=1";


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombreFilter)) {
    $sql .= " AND sn.Nombre = ?";
    $paramTypes .= "s";
    $params[] = $nombreFilter;
}

if (!empty($añofundacionFilter)) {
    $sql .= " AND sn.AñoFundacion = ?";
    $paramTypes .= "s";
    $params[] = $añofundacionFilter;
}

if (!empty($idplantillaFilter)) {
    $sql .= " AND sn.FKIDPlantilla = ?";
    $paramTypes .= "s";
    $params[] = $idplantillaFilter;
}

if (!empty($idnacionalidadFilter)) {
    $sql .= " AND NombreNacionalidad = ?";
    $paramTypes .= "s";
    $params[] = $idnacionalidadFilter;
}

if (!empty($idFilter)) {
    $sql .= " AND sn.ID = ?";
    $paramTypes .= "s";
    $params[] = $idFilter;
}
$sql .= " GROUP BY sn.ID";
// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY sn.ID";
        break;
    case 'Nombre':
        $sql .= " ORDER BY sn.Nombre";
        break;
    case 'AñoFundacion':
        $sql .= " ORDER BY sn.AñoFundacion";
        break;
    case 'FKIDPlantilla':
        $sql .= " ORDER BY sn.FKIDPlantilla";
        break;
    default:
        $sql .= " ORDER BY NombreNacionalidad";
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
        $sql = "SELECT ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades FROM tblseleccionesnacionales WHERE Nombre LIKE ? OR AñoFundacion LIKE ? OR FKIDPlantilla LIKE ? OR FKIDNacionalidades LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "sssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, );

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
<title>Edición Selecciones</title>
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
    <h3>Lista de Selecciones nacionales</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de selecciones nacionales -->
            <table>
            <h4>Tabla de Selecciones nacionales</h4>
                <tr class="titabla">
                    <th><a href="Selecciones.php?orderBy=ID" class="titabla">ID</a></th>
                    <th><a href="Selecciones.php?orderBy=Nombre" class="titabla">Nombre Selección</a></th>
                    <th><a href="Selecciones.php?orderBy=AñoFundacion"class="titabla">Año Fundación</a></th>
                    <th><a href="Selecciones.php?orderBy=FKIDPlantilla"class="titabla"># Jugadores</a></th>           
                    <th><a href="Selecciones.php?orderBy=NombreNacionalidad"class="titabla">Nacionalidad</a></th>
                    <th><a href=""class="titabla">Editar Selección</a></th>
                    <th><a href=""class="titabla">Eliminar Selección</a></th>	
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['ID']."</td>";
                        echo "<td class='celda'>".$fila['Nombre']."</td>";
                        echo "<td class='celda'>".$fila['AñoFundacion']."</td>";
                        echo "<td class='celda'>".$fila['FKIDPlantilla']."</td>";
                        echo "<td class='celda'>".$fila['NombreNacionalidad']."</td>";
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
        <!-- Formulario de Buscar seleccion nacional -->
            <form method="POST" action="Selecciones.php" class="form">
                <label for="search"><input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Selección:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Selecciones.php" class="form">
                    <label for="Nombre"><input class="input" type="text" name="Nombre" id="Nombre" value="<?php echo $nombreFilter; ?>"><span>Filtrar por Nombre:</span></label>
                    <label for="AñoFundacion"><input class="input" type="number" name="AñoFundacion" id="AñoFundacion" value="<?php echo $añofundacionFilter; ?>"><span>Filtrar por Año de fundacion:</span></label>                
                    <label for="FKIDPlantilla"><input class="input" type="number" name="FKIDPlantilla" id="FKIDPlantilla" value="<?php echo $idplantillaFilter; ?>"><span>Filtrar por FKIDPlantilla:</span></label>                  
                    <label for="FKIDNacionalidades"><input class="input" type="number" name="FKIDNacionalidades" id="FKIDNacionalidades" value="<?php echo $idnacionalidadFilter; ?>"><span>Filtrar por FKIDNacionalidades:</span></label>          
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div>
    <div class="botones">
    <button class="button"><a href="/FrontEnd/html/Nacionales/Registrarse.html" class="boton">Agregar Selección nacional</a></button>
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