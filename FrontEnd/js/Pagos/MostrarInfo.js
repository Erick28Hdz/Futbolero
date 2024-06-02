  // Obtener la información de la sesión
  var idUsuario = "<?php echo $_SESSION['idUsuario']; ?>";
  var rolMembresia = "<?php echo $_SESSION['plan']; ?>";
  var fechaInicio = new Date("<?php echo $_SESSION['fechaInicio']; ?>");
  var fechaFin = new Date("<?php echo $_SESSION['fechaFin']; ?>");

  // Calcular la fecha de finalización de la membresía (un mes después de la fecha de inicio)
  fechaFin.setMonth(fechaFin.getMonth() + 1);

  // Formatear las fechas
  var formatoFecha = { year: 'numeric', month: 'long', day: 'numeric' };
  var fechaInicioFormateada = fechaInicio.toLocaleDateString('es-ES', formatoFecha);
  var fechaFinFormateada = fechaFin.toLocaleDateString('es-ES', formatoFecha);

  // Mostrar el mensaje personalizado de bienvenida
  var mensaje = "¡Bienvenido! Eres miembro con ID: " + idUsuario + ". Tu membresía es de tipo: " + rolMembresia + ". Fecha de inicio: " + fechaInicioFormateada + ". Fecha de finalización: " + fechaFinFormateada + ".";
  alert(mensaje);
