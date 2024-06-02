  // Cargar el JSON de los clubes
  fetch('/FrontEnd/Json/Clubes.json')
    .then(response => response.json())
    .then(data => {
      // Llamar a la función para construir el menú desplegable
      construirMenu(data);
    })
    .catch(error => console.error('Error al cargar el JSON:', error));

  // Función para construir el menú desplegable
  function construirMenu(clubes) {
    const dropdownMenu = document.getElementById('MenuClubes');
    // Limpiar el contenido del menú desplegable
    dropdownMenu.innerHTML = '';
    // Iterar sobre los datos de los clubes
    clubes.forEach(club => {
      const listItem = document.createElement('li');
      const link = document.createElement('a');
      link.classList.add('dropdown-item');
      link.href = '#';
      link.textContent = club.Nombre;
      // Agregar evento de clic para actualizar el nombre del club seleccionado
      link.addEventListener('click', () => {
        actualizarNombreClub(club.Nombre);
        actualizarEscudoClub(club.URL_imagen);
      });
      listItem.appendChild(link);
      dropdownMenu.appendChild(listItem);
    });
  }

  // Función para actualizar el nombre del club seleccionado
  function actualizarNombreClub(nombre) {
    const nombreClubElement = document.getElementById('NombreClub');
    nombreClubElement.querySelector('h3').textContent = nombre;
  }

  // Función para actualizar el escudo del club seleccionado
  function actualizarEscudoClub(urlImagen) {
    const escudoClubElement = document.getElementById('EscudoClub');
    const escudoClubBackElement = document.getElementById('EscudoClubBack');
    // Actualizar la fuente de las imágenes con la URL del JSON
    escudoClubElement.src = urlImagen;
    escudoClubBackElement.src = urlImagen;
  }