  // Cargar el JSON de los clubes
  fetch('/FrontEnd/Json/Jugadores.json')
    .then(response => response.json())
    .then(data => {
      // Llamar a la función para construir el menú desplegable
      construirMenu(data);
    })
    .catch(error => console.error('Error al cargar el JSON:', error));

  // Función para construir el menú desplegable
  function construirMenu(jugadores) {
    const dropdownMenu = document.getElementById('MenuJugadores');
    // Limpiar el contenido del menú desplegable
    dropdownMenu.innerHTML = '';
    // Iterar sobre los datos de los clubes
    jugadores.forEach(jugador => {
      const listItem = document.createElement('li');
      const link = document.createElement('a');
      link.classList.add('dropdown-item');
      link.href = '#';
      link.textContent = jugador.Nombre;
      // Agregar evento de clic para actualizar el nombre del club seleccionado
      link.addEventListener('click', () => {
        actualizarNombreJugador(jugador.Nombre);
        actualizarEscudoJugador(jugador.URL_imagen);
      });
      listItem.appendChild(link);
      dropdownMenu.appendChild(listItem);
    });
  }

  // Función para actualizar el nombre del club seleccionado
  function actualizarNombreJugador(nombre) {
    const nombreJugadorElement = document.getElementById('NombreJugador');
    nombreJugadorElement.querySelector('h3').textContent = nombre;
  }

  // Función para actualizar el escudo del club seleccionado
  function actualizarEscudoJugador(urlImagen) {
    const escudoJugadorElement = document.getElementById('EscudoJugador');
    const escudoJugadorBackElement = document.getElementById('EscudoJugadorBack');
    // Actualizar la fuente de las imágenes con la URL del JSON
    escudoJugadorElement.src = urlImagen;
    escudoJugadorBackElement.src = urlImagen;
  }