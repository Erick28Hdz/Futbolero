<?php
require 'conexion.php';

// Actualizar las contraseñas de la tabla tbltrabajadores
try {
    $sql_trabajadores = "SELECT IdTrabajador, Contraseña FROM tbltrabajadores";
    $result_trabajadores = $conexion->query($sql_trabajadores);

    if ($result_trabajadores->num_rows > 0) {
        while ($row = $result_trabajadores->fetch_assoc()) {
            $idTrabajador = $row['IdTrabajador'];
            $contraseña = $row['Contraseña'];
            $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

            $sql_update = "UPDATE tbltrabajadores SET Contraseña = ? WHERE IdTrabajador = ?";
            $stmt_update = $conexion->prepare($sql_update);
            $stmt_update->bind_param("si", $contraseña_hash, $idTrabajador);
            $stmt_update->execute();
        }
        echo "Contraseñas de tbltrabajadores actualizadas correctamente.<br>";
    } else {
        echo "No se encontraron trabajadores.<br>";
    }
} catch (Exception $e) {
    echo "Error al actualizar contraseñas de tbltrabajadores: " . $e->getMessage();
}

// Actualizar las contraseñas de la tabla tblusuarios
try {
    $sql_usuarios = "SELECT IdUsuario, Contraseña FROM tblusuarios";
    $result_usuarios = $conexion->query($sql_usuarios);

    if ($result_usuarios->num_rows > 0) {
        while ($row = $result_usuarios->fetch_assoc()) {
            $idUsuario = $row['IdUsuario'];
            $contraseña = $row['Contraseña'];
            $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

            $sql_update = "UPDATE tblusuarios SET Contraseña = ? WHERE IdUsuario = ?";
            $stmt_update = $conexion->prepare($sql_update);
            $stmt_update->bind_param("si", $contraseña_hash, $idUsuario);
            $stmt_update->execute();
        }
        echo "Contraseñas de tblusuarios actualizadas correctamente.<br>";
    } else {
        echo "No se encontraron usuarios.<br>";
    }
} catch (Exception $e) {
    echo "Error al actualizar contraseñas de tblusuarios: " . $e->getMessage();
}
?>