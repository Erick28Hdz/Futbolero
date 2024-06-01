<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarRoles($idRol, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblroles WHERE IdRol = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idRol);
    $stmt->execute();
}
	
// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['IdRol'])) {
    $idEliminar = $_GET['IdRol'];
    eliminarRoles($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'IdRol';
$nombreFilter = isset($_GET['Nombre']) ? mysqli_real_escape_string($conexion, $_GET['Nombre']) : '';
$idInvitadosFilter = isset($_GET['FKIDInvitados']) ? mysqli_real_escape_string($conexion, $_GET['FKIDInvitados']) : '';
$idUsuariosFilter = isset($_GET['FKIDUsuarios']) ? mysqli_real_escape_string($conexion, $_GET['FKIDUsuarios']) : '';
$idTrabajadoresFilter = isset($_GET['FKIDTrabajadores']) ? mysqli_real_escape_string($conexion, $_GET['FKIDTrabajadores']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE

$sql = "SELECT r.IdRol, r.Nombre, 
               COUNT(DISTINCT i.IdInvitado) AS CantidadInvitados,
               COUNT(DISTINCT u.IdUsuario) AS CantidadUsuarios,
               COUNT(DISTINCT t.IdTrabajador) AS CantidadTrabajadores
        FROM tblroles r
        LEFT JOIN tblinvitados i ON r.IdRol = i.FKIDRoles
        LEFT JOIN tblusuarios u ON r.IdRol = u.FKIDRoles
        LEFT JOIN tbltrabajadores t ON r.IdRol = t.FKIDRoles
        WHERE 1 = 1";  // Agregamos una condición siempre verdadera para comenzar la cláusula WHERE


// Asociar los parámetros en caso de que se hayan definido
$paramTypes = ""; // Variable para almacenar los tipos de parámetros
$params = array(); // Array para almacenar los valores de los parámetros

if (!empty($nombreFilter)) {
    $sql .= " AND r.Nombre = ?";
    $paramTypes .= "s";
    $params[] = $nombreFilter;
}

if (!empty($idInvitadosFilter)) {
    $sql .= " AND i.FKIDInvitados = ?";
    $paramTypes .= "s";
    $params[] = $idInvitadosFilter;
}

if (!empty($idUsuariosFilter)) {
    $sql .= " AND u.FKIDUsuarios = ?";
    $paramTypes .= "s";
    $params[] = $idUsuariosFilter;
}

if (!empty($idTrabajadoresFilter)) {
    $sql .= " AND t.FKIDTrabajadores = ?";
    $paramTypes .= "s";
    $params[] = $idTrabajadoresFilter;
}

if (!empty($idRolFilter)) {
    $sql .= " AND r.IdRol = ?";
    $paramTypes .= "s";
    $params[] = $idRolFilter;
}

$sql .= " GROUP BY r.IdRol";

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'IdRol':
        $sql .= " ORDER BY r.IdRol";
        break;
    case 'Nombre':
        $sql .= " ORDER BY r.Nombre";
        break;
    default:
        $sql .= " ORDER BY CantidadUsuarios";
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
        $sql = "SELECT IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores FROM tblroles WHERE Nombre LIKE ? OR FKIDInvitados LIKE ? OR FKIDUsuarios LIKE ? OR FKIDTrabajadores LIKE ?";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ssss"; // Tipos de parámetros (cambiar según corresponda)
        $stmt->bind_param($paramTypes, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

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
                    <th><a href="Roles.php?orderBy=IdRol" class="titabla">ID</a></th>
                    <th><a href="Roles.php?orderBy=Nombre" class="titabla">Nombre</a></th>
                    <th><a href="Roles.php?orderBy=CantidadInvitados" class="titabla">Invitados</a></th>
                    <th><a href="Roles.php?orderBy=CantidadUsuarios" class="titabla">Usuarios</a></th>           
                    <th><a href="Roles.php?orderBy=CantidadTrabajadores" class="titabla">Trabajadores</a></th>
                    <th><a href=""class="titabla">Editar Rol</a></th>
                    <th><a href=""class="titabla">Eliminar Rol</a></th>	
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['IdRol']."</td>";
                        echo "<td class='celda'>".$fila['Nombre']."</td>";
                        echo "<td class='celda'>" . $fila['CantidadInvitados'] . "</td>";
                        echo "<td class='celda'>" . $fila['CantidadUsuarios'] . "</td>";
                        echo "<td class='celda'>" . $fila['CantidadTrabajadores'] . "</td>";
                        echo "<td><button class='button'><a href='Editar.php?IdRol=".$fila['IdRol']."''>Editar</a></button></td>";
                        echo "<td>
                        <form method='POST' action='Eliminar.php'>
                          <input type='hidden' name='IdRol' value='".$fila['IdRol']."'>
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
    <button class="button"><a href="/FrontEnd/html/Roles/Registrarse.html" class="boton">Agregar nuevo Rol</a></button>
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