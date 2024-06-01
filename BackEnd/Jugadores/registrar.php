<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $dorsal = $_POST['dorsal'] ?? '';
    $posicion = $_POST['posicion'] ?? '';
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $estatura = $_POST['estatura'] ?? '';
    $pieHabil = $_POST['pie_habil'] ?? '';
    $precioMercado = $_POST['precio_mercado'] ?? '';
    $partidosJugados = $_POST['partidos_jugados'] ?? '';
    $tiempoJugado = $_POST['tiempo_jugado'] ?? '';
    $goles = $_POST['goles'] ?? '';
    $asistencias = $_POST['asistencias'] ?? '';
    $atajadas = $_POST['atajadas'] ?? '';
    $tarjetasAmarillas = $_POST['tarjetas_amarillas'] ?? '';
    $doblesAmarillas = $_POST['dobles_amarillas'] ?? '';
    $rojasDirectas = $_POST['rojas_directas'] ?? '';
    $fkTemporada = $_POST['fk_temporada'] ?? '';
    $fkIDLigas = $_POST['fk_id_ligas'] ?? '';
    $fkIDClubes = $_POST['fk_id_clubes'] ?? '';
    $fkIDNacionalidades = $_POST['fk_id_nacionalidades'] ?? '';
    $fkIDSeleccionNacional = $_POST['fk_id_seleccion_nacional'] ?? '';
    $fkIDPatrocinadores = $_POST['fk_id_patrocinadores'] ?? '';
    $fkIDPartidos = $_POST['fk_id_partidos'] ?? '';

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO tblplantillas (Dorsal, Posicion, Nombres, Apellidos, FechaNacimiento, Edad, Estatura, PieHabil, PrecioMercado, PartidosJugados, TiempoJugado, Goles, Asistencias, Atajadas, TarjetasAmarillas, DoblesAmarillas, RojasDirectas, FKTemporada, FKIDLigas, FKIDClubes, FKIDNacionalidades, FKIDSeleccionNacional, FKIDPatrocinadores, FKIDPartidos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("issssisssiidiiiiiiiiiiii", $dorsal, $posicion, $nombres, $apellidos, $fechaNacimiento, $edad, $estatura, $pieHabil, $precioMercado, $partidosJugados, $tiempoJugado, $goles, $asistencias, $atajadas, $tarjetasAmarillas, $doblesAmarillas, $rojasDirectas, $fkTemporada, $fkIDLigas, $fkIDClubes, $fkIDNacionalidades, $fkIDSeleccionNacional, $fkIDPatrocinadores, $fkIDPartidos);

    if ($stmt->execute()) {
        // Registro exitoso
        echo "El jugador se registró correctamente.";
        exit(); // Terminar el script después de mostrar el mensaje
    } else {
        // Error en el registro
        echo "Error al registrar el jugador: " . $stmt->error;
        exit(); // Terminar el script después de mostrar el mensaje
    }
}

?>