function getParamFromUrl(param) {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  return urlParams.get(param);
}

function mostrarContenidoPorParametro() {
  const contenidoId = getParamFromUrl("contenido");
  if (contenidoId) {
    mostrarContenido(contenidoId);
  }
}

function mostrarContenido(num) {
  var contenidos = document.getElementsByClassName("contenido");
  for (var i = 0; i < contenidos.length; i++) {
    contenidos[i].style.display = "none";
  }

  var contenido = document.getElementById("contenido" + num);
  if (contenido) {
    contenido.style.display = "block";
  }
}

function cambiarColorDeFondo() {
  document.getElementById('confirmColor').addEventListener('click', function() {
    var favColor = document.getElementById('favcolor').value;
    document.body.style.backgroundColor = favColor;
  });
}

// Llama a las funciones al cargar la página
document.addEventListener("DOMContentLoaded", function() {
  mostrarContenidoPorParametro();
  cambiarColorDeFondo(); // Asegúrate de que este elemento exista en tu HTML
});