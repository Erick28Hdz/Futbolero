function mostrarContenido(num) {
    // Ocultar todos los contenidos
    var contenidos = document.getElementsByClassName("contenido");
    for (var i = 0; i < contenidos.length; i++) {
      contenidos[i].style.display = "none";
    }
    
    // Mostrar solo el contenido correspondiente al número
    var contenido = document.getElementById("contenido" + num);
    contenido.style.display = "block";
  }