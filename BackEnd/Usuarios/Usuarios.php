<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarUsuario($idUsuario, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblusuarios WHERE idUsuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['idUsuario'])) {
    $idEliminar = $_GET['idUsuario'];
    eliminarUsuario($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'idUsuario';
$generoFilter = isset($_GET['Género']) ? mysqli_real_escape_string($conexion, $_GET['Género']) : '';
$paisFilter = isset($_GET['País']) ? mysqli_real_escape_string($conexion, $_GET['País']) : '';
$ciudadFilter = isset($_GET['Ciudad']) ? mysqli_real_escape_string($conexion, $_GET['Ciudad']) : '';
$rolFilter = isset($_GET['FKIDRoles']) ? mysqli_real_escape_string($conexion, $_GET['FKIDRoles']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT idUsuario, Nombre, Apellido, Documento, `País`, Ciudad, Correo, Teléfono, Género, FechaNacimiento, FKIDRoles FROM tblusuarios WHERE 1=1";


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($generoFilter)) {
    $sql .= " AND Género = ?";
    $paramTypes .= "s";
    $params[] = $generoFilter;
}

if (!empty($paisFilter)) {
    $sql .= " AND `País` = ?";
    $paramTypes .= "s";
    $params[] = $paisFilter;
}

if (!empty($ciudadFilter)) {
    $sql .= " AND Ciudad = ?";
    $paramTypes .= "s";
    $params[] = $ciudadFilter;
}

if (!empty($rolFilter)) {
    $sql .= " AND FKIDRoles = ?";
    $paramTypes .= "s";
    $params[] = $rolFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'idUsuario':
        $sql .= " ORDER BY idUsuario";
        break;
    case 'Nombre':
        $sql .= " ORDER BY Nombre";
        break;
    case 'Apellido':
        $sql .= " ORDER BY Apellido";
        break;
    case 'Documento':
        $sql .= " ORDER BY Documento";
        break;
    case 'País':
        $sql .= " ORDER BY País";
        break;
    case 'Ciudad':
        $sql .= " ORDER BY Ciudad";
        break;
    case 'Género':
        $sql .= " ORDER BY Género";
        break;
    case 'edad':
        $sql .= " ORDER BY FechaNacimiento";
        break;
    default:
        $sql .= " ORDER BY FKIDRoles";
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
        $sql = "SELECT idUsuario, Nombre, Apellido, Documento, Correo, Teléfono, País, Ciudad, Género, FechaNacimiento, FKIDRoles FROM tblusuarios WHERE Nombre LIKE ? OR Apellido LIKE ? OR Documento LIKE ? OR País LIKE ? OR Ciudad LIKE ? OR Correo LIKE ? OR Teléfono LIKE ? OR Género LIKE ? OR FechaNacimiento LIKE ? OR FKIDRoles LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ssssssssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
    <title>Control de usuarios</title>
</head>
<body id="usuarios">
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
    <h3>Lista de Usuarios</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Usuarios -->
            <table>
            <h4>Tabla de Usuarios</h4>
                <tr class="titabla">
                    <th><a href="Usuarios.php?orderBy=idUsuario" class="titabla">ID</a></th>
                    <th><a href="Usuarios.php?orderBy=Nombre" class="titabla">Nombre</a></th>
                    <th><a href="Usuarios.php?orderBy=Apellido" class="titabla">Apellido</a></th>
                    <th><a href="Usuarios.php?orderBy=Documento"class="titabla">Documento</a></th>
                    <th><a href="Usuarios.php?orderBy=Correo"class="titabla">Correo</a></th>
                    <th><a href="Usuarios.php?orderBy=Teléfono"class="titabla">Teléfono</a></th>
                    <th><a href="Usuarios.php?orderBy=País"class="titabla">País</a></th>
                    <th><a href="Usuarios.php?orderBy=Ciudad"class="titabla">Ciudad</a></th>
                    <th><a href="Usuarios.php?orderBy=Género"class="titabla">Género</a></th>
                    <th><a href="Usuarios.php?orderBy=FechaNacimiento"class="titabla">Fecha Nacimiento</a></th>           
                    <th><a href="Usuarios.php?orderBy=FKIDRoles"class="titabla">FKIDRoles</a></th>
                    <th><a href=""class="titabla">Editar Usuario</a></th>
                    <th><a href=""class="titabla">Eliminar Usuario</a></th>
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['idUsuario']."</td>";
                        echo "<td class='celda'>".$fila['Nombre']."</td>";
                        echo "<td class='celda'>".$fila['Apellido']."</td>";
                        echo "<td class='celda'>".$fila['Documento']."</td>";
                        echo "<td class='celda'>".$fila['Correo']."</td>";
                        echo "<td class='celda'>".$fila['Teléfono']."</td>";
                        echo "<td class='celda'>".$fila['País']."</td>";
                        echo "<td class='celda'>".$fila['Ciudad']."</td>";
                        echo "<td class='celda'>".$fila['Género']."</td>";
                        echo "<td class='celda'>".$fila['FechaNacimiento']."</td>";
                        echo "<td class='celda'>".$fila['FKIDRoles']."</td>";
                        echo "<td><button class='button'><a href='Editar.php?idUsuario=".$fila['idUsuario']."''>Editar</a></button></td>";
                        echo "<td>
                                <form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='idUsuario' value='".$fila['idUsuario']."'>
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
            <!-- Formulario de Buscar usuario -->
            <form method="POST" action="Usuarios.php" class="form">
                <label for="search">
                    <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar usuario:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Usuarios.php" class="form">
                <label for="Género">
                    <select class="input" name="Género" id="Género">
                        <option value="">Todos</option>
                        <option value="Masculino"<?php if ($generoFilter === 'Masculino') echo ' selected'; ?>>Masculino</option>
                        <option value="Femenino"<?php if ($generoFilter === 'Femenino') echo ' selected'; ?>>Femenino</option>
                        <option value="Otro"<?php if ($generoFilter === 'Otro') echo ' selected'; ?>>Otro</option>
                    </select>
                    <span>Filtrar por género:</span></label>
                    <label for="País"><input class="input" type="text" name="País" id="País" value="<?php echo $paisFilter; ?>"><span>Filtrar por país:</span></label>  
                    <label for="ciudad"><input class="input" type="text" name="Ciudad" id="Ciudad" value="<?php echo $ciudadFilter; ?>"><span>Filtrar por ciudad:</span></label>
                    <label for="FKIDRoles">
                    <select class="input" name="FKIDRoles" id="FKIDRoles">
                        <option value="">Todos</option>
                        <option value="2"<?php if ($rolFilter === '2') echo ' selected'; ?>>Básico</option>
                        <option value="3"<?php if ($rolFilter === '3') echo ' selected'; ?>>Estrella</option>
                        <option value="4"<?php if ($rolFilter === '4') echo ' selected'; ?>>Premium</option>
                    </select>
                    <span>Filtrar por Rol:</span>
                    </label>
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div> 
<div class="botones">
<button class="button"><a href="/FrontEnd/html/Usuarios/Registrarse.html" class="boton">Agregar Usuario</a></button>
    <form method="POST" action="Exportar.php">
    <button type="submit" class="button">Hacer copia de seguridad</button></form>
    </div> 
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