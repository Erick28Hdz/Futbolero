<?php
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';


// Función para eliminar un usuario por su ID
function eliminarUsuario($idTrabajador, $conexion)
{
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tbltrabajadores WHERE idTrabajador = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idTrabajador);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['idTrabajador'])) {
    $idEliminar = $_GET['idTrabajador'];
    eliminarUsuario($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'idTrabajador';
$nombreFilter = isset($_GET['Nombre']) ? mysqli_real_escape_string($mysqli, $_GET['Nombre']) : '';
$areaFilter = isset($_GET['Area']) ? mysqli_real_escape_string($mysqli, $_GET['Area']) : '';
$sueldoFilter = isset($_GET['Sueldo']) ? mysqli_real_escape_string($mysqli, $_GET['Sueldo']) : '';
$rolFilter = isset($_GET['FKIDRoles']) ? mysqli_real_escape_string($mysqli, $_GET['FKIDRoles']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT idTrabajador, Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles FROM tbltrabajadores WHERE 1=1";

// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombreFilter)) {
    $sql .= " AND Nombre = ?";
    $paramTypes .= "s";
    $params[] = $nombreFilter;
}

if (!empty($areaFilter)) {
    $sql .= " AND Area = ?";
    $paramTypes .= "s";
    $params[] = $areaFilter;
}

if (!empty($sueldoFilter)) {
    $sql .= " AND Sueldo = ?";
    $paramTypes .= "s";
    $params[] = $sueldoFilter;
}

if (!empty($rolFilter)) {
    $sql .= " AND FKIDRoles = ?";
    $paramTypes .= "s";
    $params[] = $rolFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'idTrabajador':
        $sql .= " ORDER BY idTrabajador";
        break;
    case 'Nombre':
        $sql .= " ORDER BY Nombre";
        break;
    case 'Area':
        $sql .= " ORDER BY Area";
        break;
    case 'Sueldo':
        $sql .= " ORDER BY Sueldo";
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
    $searchTerm = mysqli_real_escape_string($mysqli, $searchTerm);

    if (!empty($searchTerm)) {
        // Construir la consulta SQL con cláusulas WHERE para aplicar los filtros
        $sql = "SELECT idTrabajador, Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles FROM tbltrabajadores WHERE Nombre LIKE ? OR CorreoElectronico LIKE ? OR Area LIKE ? OR Sueldo LIKE ? OR FKIDRoles LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "sssss"; // Tipos de parámetros (cambiar según corresponda)
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
    <title>Control de trabajadores</title>
</head>

<body id="trabajadores">
    <header>
        <a href="/FrontEnd/html/Administradores/Administrador.html"><img src="/FrontEnd/img/iconos/atrás rojo.png" alt="" class="atras" /></a>
        <img class="logo" src="/FrontEnd/img/iconos/icono futbolero.png" alt="Imagen 2" />
        <h1>Futbolero</h1>
        <h2>Tú Ganador</h2>
    </header>
    <main>
        <h3>Lista de Trabajadores</h3>
        <div class="container">
            <div class="table-container">
                <!-- Tabla de Trabajadores -->
                <table>
                    <h4>Tabla de Trabajadores</h4>
                    <tr class="titabla">
                        <th><a href="Trabajadores.php?orderBy=idTrabajador" class="titabla">ID</a></th>
                        <th><a href="Trabajadores.php?orderBy=Nombre" class="titabla">Nombre</a></th>
                        <th><a href="Trabajadores.php?orderBy=CorreoElectronico" class="titabla">Correo Electronico</a></th>
                        <th><a href="Trabajadores.php?orderBy=Area" class="titabla">Área</a></th>
                        <th><a href="Trabajadores.php?orderBy=Sueldo" class="titabla">Sueldo</a></th>
                        <th><a href="Trabajadores.php?orderBy=FKIDRoles" class="titabla">FKIDRoles</a></th>
                        <th><a href="" class="titabla">Editar Trabajador</a></th>
                        <th><a href="" class="titabla">Eliminar Trabajador</a></th>
                    </tr>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='celda'>" . $fila['idTrabajador'] . "</td>";
                            echo "<td class='celda'>" . $fila['Nombre'] . "</td>";
                            echo "<td class='celda'>" . $fila['CorreoElectronico'] . "</td>";
                            echo "<td class='celda'>" . $fila['Area'] . "</td>";
                            echo "<td class='celda'>" . $fila['Sueldo'] . "</td>";
                            echo "<td class='celda'>" . $fila['FKIDRoles'] . "</td>";
                            echo "<td><button class='button'><a href='Editar.php?idTrabajador=" . $fila['idTrabajador'] . "''>Editar</a></button></td>";
                            echo "<td>
                                <form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='idTrabajador' value='" . $fila['idTrabajador'] . "'>
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
                <!-- Formulario de Buscar Trabajador -->
                <form method="POST" action="Trabajadores.php" class="form">
                    <label for="search">
                        <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Trabajador:</span></label>
                    <button type="submit" class="button">Buscar</button>
                </form>
                <!-- Formulario de filtrado -->
                <form method="GET" action="Trabajadores.php" class="form">
                    <label for="Nombre"><input class="input" type="text" name="Nombre" id="Nombre" value="<?php echo $nombreFilter; ?>"><span>Filtrar por Nombre:</span></label>
                    <label for="Area"><input class="input" type="text" name="Area" id="Area" value="<?php echo $areaFilter; ?>"><span>Filtrar por Área:</span></label>
                    <label for="Sueldo"><input class="input" type="number" name="Sueldo" id="Sueldo" value="<?php echo $sueldoFilter; ?>"><span>Filtrar por Sueldo:</span></label>
                    <label for="FKIDRoles">
                        <select class="input" name="FKIDRoles" id="FKIDRoles">
                            <option value="">Todos</option>
                            <option value="2" <?php if ($rolFilter === '2') echo ' selected'; ?>>Básico</option>
                            <option value="3" <?php if ($rolFilter === '3') echo ' selected'; ?>>Estrella</option>
                            <option value="4" <?php if ($rolFilter === '4') echo ' selected'; ?>>Premium</option>
                        </select>
                        <span>Filtrar por Rol:</span>
                    </label>
                    <button type="submit" class="button">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="botones">
            <button class="button"><a href="/FrontEnd/html/Trabajadores/Registrarse.html">Agregar Trabajador</a></button>
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