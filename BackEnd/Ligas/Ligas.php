<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarUsuario($ID, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblligas WHERE 	
    ID = ?";
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
$numeroEquiposFilter = isset($_GET['NumeroEquipos']) ? mysqli_real_escape_string($conexion, $_GET['NumeroEquipos']) : '';
$idClubesFilter = isset($_GET['FKIDClubes']) ? mysqli_real_escape_string($conexion, $_GET['FKIDClubes']) : '';
$idNacionalidadesFilter = isset($_GET['FKIDNacionalidades']) ? mysqli_real_escape_string($conexion, $_GET['FKIDNacionalidades']) : '';
$idTemporadaFilter = isset($_GET['FKIDTemporada']) ? mysqli_real_escape_string($conexion, $_GET['FKIDTemporada']) : '';
$idPartidosFilter = isset($_GET['FKIDPartidos']) ? mysqli_real_escape_string($conexion, $_GET['FKIDPartidos']) : '';

// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos FROM tblligas WHERE 1=1";


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombreFilter)) {
    $sql .= " AND Nombre = ?";
    $paramTypes .= "s";
    $params[] = $nombreFilter;
}

if (!empty($numeroEquiposFilter)) {
    $sql .= " AND `NumeroEquipos` = ?";
    $paramTypes .= "s";
    $params[] = $numeroEquiposFilter;
}

if (!empty($idClubesFilter)) {
    $sql .= " AND FKIDClubes = ?";
    $paramTypes .= "s";
    $params[] = $idClubesFilter;
}

if (!empty($idNacionalidadesFilter)) {
    $sql .= " AND FKIDNacionalidades = ?";
    $paramTypes .= "s";
    $params[] = $idNacionalidadesFilter;
}

if (!empty($idTemporadaFilter)) {
    $sql .= " AND FKIDTemporada = ?";
    $paramTypes .= "s";
    $params[] = $idPartidosFilter;
}

if (!empty($idPartidosFilter)) {
    $sql .= " AND FKIDPartidos = ?";
    $paramTypes .= "s";
    $params[] = $idPartidosFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'ID':
        $sql .= " ORDER BY ID";
        break;
    case 'Nombre':
        $sql .= " ORDER BY Nombre";
        break;
    case 'NumeroEquipos':
        $sql .= " ORDER BY NumeroEquipos";
        break;
    case 'Género':
        $sql .= " ORDER BY FKIDClubes";
        break;
    case ' FKIDTemporada':
        $sql .= " ORDER BY  FKIDTemporadas";
        break;
    case ' FKIDPartidos':
        $sql .= " ORDER BY  FKIDPartidos";
        break;
    default:
        $sql .= " ORDER BY FKIDNacionalidades";
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
        $sql = "SELECT ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades,  FKIDTemporada, FKIDPartidos 
        FROM tblligas LIKE ? OR Nombre LIKE ? OR NumeroEquipos LIKE ? OR FKIDClubes LIKE ? OR FKIDNacionalidades
         LIKE ? OR FKIDTemporada LIKE ? OR FKIDTemporada LIKE ? OR FKIDPartidos";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "sssssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
<title>Edición Ligas</title>
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
    <h3>Lista de Ligas</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Ligas -->
            <table>
            <h4>Tabla de Ligas</h4>
                <tr class="titabla">
                    <th><a href="Ligas.php?orderBy=ID" class="titabla">ID</a></th>
                    <th><a href="Ligas.php?orderBy=Nombre"class="titabla">Nombre</a></th>
                    <th><a href="Ligas.php?orderBy=NumeroEquipos"class="titabla">Numero Equipos</a></th>
                    <th><a href="Ligas.php?orderBy=FKIDClubes"class="titabla">FKIDClubes</a></th>         
                    <th><a href="Ligas.php?orderBy=FKIDNacionalidades"class="titabla">FKIDNacionalidades</a></th>
                    <th><a href="Ligas.php?orderBy=FKIDTemporada"class="titabla">FKIDTemporada</a></th>
                    <th><a href="Ligas.php?orderBy=FKIDPartidos"class="titabla">FKIDPartidos</a></th>
                    <th><a href=""class="titabla">Editar Liga</a></th>
                    <th><a href=""class="titabla">Eliminar Liga</a></th>
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['ID']."</td>";
                        echo "<td class='celda'>".$fila['Nombre']."</td>";
                        echo "<td class='celda'>".$fila['NumeroEquipos']."</td>";
                        echo "<td class='celda'>".$fila['FKIDClubes']."</td>";
                        echo "<td class='celda'>".$fila['FKIDNacionalidades']."</td>";
                        echo "<td class='celda'>".$fila['FKIDTemporada']."</td>";
                        echo "<td class='celda'>".$fila['FKIDPartidos']."</td>"; 
                        echo "<td><button class='button'><a href='Editar.php?ID=".$fila['ID']."'class='editar'>Editar</a></button></td>";
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
        <!-- Formulario de Buscar Liga -->
            <form method="POST" action="Ligas.php" class="form">
                <label for="search"><input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Liga:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Ligas.php" class="form">
                    <label for="NumeroEquipos"><input class="input" type="text" name="NumeroEquipos" id="NumeroEquipos" value="<?php echo $numeroEquiposFilter; ?>"><span>Filtrar por Numero Equipos:</span></label>
                    <label for="FKIDClubes"><input class="input" type="text" name="FKIDClubes" id="FKIDClubes" value="<?php echo $idClubesFilter; ?>"><span>Filtrar por Club:</span> </label>
                    <label for="FKIDNacionalidades"><input class="input" type="text" name="FKIDNacionalidades" id="FKIDNacionalidades" value="<?php echo $idNacionalidadesFilter; ?>"><span>Filtrar por Nacionalidad:</span> </label>
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div>
    <br><br><br>
<div class="botones">
<button class="button"><a href="/FrontEnd/html/Ligas/Registrarse.html" class="boton">Agregar Liga</a></button>
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