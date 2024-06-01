<?php 
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$stmt = null; // Declarar la variable $stmt
include '../Plataforma/conexion.php';

// Función para eliminar un usuario por su ID
function eliminarUsuario($idInvitado, $conexion) {
    // Utilizar una declaración preparada para evitar problemas de seguridad
    $sql = "DELETE FROM tblinvitados WHERE 	
    idInvitado = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idInvitado);
    $stmt->execute();
}

// Verificar si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['idInvitado'])) {
    $idEliminar = $_GET['idInvitado'];
    eliminarUsuario($idEliminar, $conexion);
}

// Variables para ordenar y filtrar Parte del filtrado de la tabla.
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'idInvitado';
$generoFilter = isset($_GET['Género']) ? mysqli_real_escape_string($conexion, $_GET['Género']) : '';
$paisFilter = isset($_GET['País']) ? mysqli_real_escape_string($conexion, $_GET['País']) : '';
$ciudadFilter = isset($_GET['Ciudad']) ? mysqli_real_escape_string($conexion, $_GET['Ciudad']) : '';
$edadFilter = isset($_GET['Edad']) ? mysqli_real_escape_string($conexion, $_GET['Edad']) : '';
$rolFilter = isset($_GET['FKIDRoles']) ? mysqli_real_escape_string($conexion, $_GET['FKIDRoles']) : '';


// Consulta SQL con cláusulas ORDER BY y WHERE
$sql = "SELECT idInvitado, `País`, Ciudad, Género, Edad, FKIDRoles FROM tblinvitados WHERE 1=1";


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

if (!empty($edadFilter)) {
    $sql .= " AND Edad = ?";
    $paramTypes .= "s";
    $params[] = $edadFilter;
}

if (!empty($rolFilter)) {
    $sql .= " AND FKIDRoles = ?";
    $paramTypes .= "s";
    $params[] = $rolFilter;
}

// Agregar cláusula ORDER BY según el campo seleccionado
switch ($orderBy) {
    case 'idInvitado':
        $sql .= " ORDER BY idInvitado";
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
    case 'Edad':
        $sql .= " ORDER BY Edad";
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
        $sql = "SELECT idInvitado, País, Ciudad, Género, Edad, FKIDRoles FROM tblinvitados WHERE 
        (idInvitado LIKE ? OR País LIKE ? OR Ciudad LIKE ? OR Género LIKE ? OR Edad LIKE ? OR FKIDRoles LIKE ?)";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        // Asignar los valores y tipos de los parámetros
        $searchTerm = "%$searchTerm%"; // Agregar comodines para coincidencia parcial
        $paramTypes = "ssssss"; // Tipos de parámetros (cambiar según corresponda)
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
    <title>Control de invitados</title>
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
    <h3>Lista de Invitados</h3>
    <div class="container">
        <div class="table-container">
            <!-- Tabla de Usuarios -->
            <table>
            <h4>Tabla de Invitados</h4>
                <tr class="titabla">
                    <th><a href="Invitados.php?orderBy=idInvitado" class="titabla">ID</a></th>
                    <th><a href="Invitados.php?orderBy=País"class="titabla">País</a></th>
                    <th><a href="Invitados.php?orderBy=Ciudad"class="titabla">Ciudad</a></th>
                    <th><a href="Invitados.php?orderBy=Género"class="titabla">Género</a></th>
                    <th><a href="Invitados.php?orderBy=Edad"class="titabla">Edad</a></th>          
                    <th><a href="Invitados.php?orderBy=FKIDRoles"class="titabla">FKIDRoles</a></th>
                    <th><a href=""class="titabla">Editar Invitado</a></th>
                    <th><a href=""class="titabla">Eliminar Invitado</a></th>
                </tr>	
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='celda'>".$fila['idInvitado']."</td>";
                        echo "<td class='celda'>".$fila['País']."</td>";
                        echo "<td class='celda'>".$fila['Ciudad']."</td>";
                        echo "<td class='celda'>".$fila['Género']."</td>";
                        echo "<td class='celda'>".$fila['Edad']."</td>";
                        echo "<td class='celda'>".$fila['FKIDRoles']."</td>";
                        echo "<td><button class='button'><a href='Editar.php?idInvitado=".$fila['idInvitado']."'class='editar'>Editar</a></button></td>";
                        echo "<td>
                                <form method='POST' action='Eliminar.php'>
                                <input type='hidden' name='idInvitado' value='".$fila['idInvitado']."'>
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
            <form method="POST" action="Invitados.php" class="form">
                <label for="search">
                <input class="input" type="text" name="search" id="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"><span>Buscar Invitado:</span></label>
                <button type="submit" class="button">Buscar</button>
            </form>
            <!-- Formulario de filtrado -->
            <form method="GET" action="Invitados.php" class="form">
                   <label for="Género">
                    <select class="input" name="Género" id="Género">
                        <option value="">Todos</option>
                        <option value="Masculino"<?php if ($generoFilter === 'Masculino') echo ' selected'; ?>>Masculino</option>
                        <option value="Femenino"<?php if ($generoFilter === 'Femenino') echo ' selected'; ?>>Femenino</option>
                        <option value="Otro"<?php if ($generoFilter === 'Otro') echo ' selected'; ?>>Otro</option>
                    </select>
                    <span>Filtrar por género:</span>
                    </label>
                    <label for="País"><input class="input" type="text" name="País" id="País" value="<?php echo $paisFilter; ?>"><span>Filtrar por país:</span></label>                  
                    <label for="ciudad"><input class="input" type="text" name="Ciudad" id="Ciudad" value="<?php echo $ciudadFilter; ?>"><span>Filtrar por ciudad:</span></label>            
                    <label for="Edad"><input class="input" type="number" name="Edad" id="Edad" value="<?php echo $edadFilter; ?>"><span>Filtrar por Edad:</span></label>  
                <button type="submit" class="button">Filtrar</button>
            </form>
        </div>
    </div>
<div class="botones">
<button class="button"><a href="/FrontEnd/html/Invitados/Registrarse.html" class="boton">Agregar Invitado</a></button>
    <form method="POST" action="Exportar.php">
    <button type="submit" class="button">Hacer copia de seguridad</button>></form>
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