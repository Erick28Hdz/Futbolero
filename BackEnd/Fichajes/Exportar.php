<!-- Código PHP para mostrar los fichajes -->
<?php
// Consulta SQL para obtener todos los fichajes
$sql = "SELECT idFichaje, tipo_fichaje, club_anterior, club_actual, costo_fichaje FROM tblfichajes";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    // Mostrar los fichajes en una tabla
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Tipo de Fichaje</th>
            <th>Club Anterior</th>
            <th>Club Actual</th>
            <th>Costo de Fichaje</th>
            <th>Acciones</th>
          </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idFichaje'] . "</td>";
        echo "<td>" . $fila['tipo_fichaje'] . "</td>";
        echo "<td>" . $fila['club_anterior'] . "</td>";
        echo "<td>" . $fila['club_actual'] . "</td>";
        echo "<td>" . $fila['costo_fichaje'] . "</td>";
        // Agregar enlaces o botones para editar y eliminar
        echo "<td>
                <a href='editar_fichaje.php?idFichaje=" . $fila['idFichaje'] . "'>Editar</a>
                <a href='eliminar_fichaje.php?idFichaje=" . $fila['idFichaje'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este fichaje?\")'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron fichajes.";
}
?>
