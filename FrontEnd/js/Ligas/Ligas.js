// Cargar el JSON de las ligas
fetch('/FrontEnd/Json/Ligas.json')
.then(response => response.json())
.then(data => {
  // Llamar a la función para construir el menú desplegable
  construirMenu(data, 'MenuLigas');
})
.catch(error => console.error('Error al cargar el JSON:', error));

// Función para construir el menú desplegable
function construirMenu(ligas) {
const dropdownMenu = document.getElementById('MenuLigas');
// Limpiar el contenido del menú desplegable
dropdownMenu.innerHTML = '';
// Iterar sobre los datos de los clubes
ligas.forEach(liga => {
  const listItem = document.createElement('li');
  const link = document.createElement('a');
  link.classList.add('dropdown-item');
  link.href = '#';
  link.textContent = liga.Nombre;
  // Agregar evento de clic para actualizar el nombre del club seleccionado
  link.addEventListener('click', () => {
    actualizarNombreClub(liga.Nombre);
    actualizarEscudoClub(liga.URL_imagen);
  });
  listItem.appendChild(link);
  dropdownMenu.appendChild(listItem);
});
}

// Función para actualizar el nombre del club seleccionado
function actualizarNombreClub(nombre) {
const nombreClubElement = document.getElementById('NombreLigas');
nombreClubElement.querySelector('h3').textContent = nombre;
}

// Función para actualizar el escudo del club seleccionado
function actualizarEscudoClub(urlImagen) {
const escudoClubElement = document.getElementById('EscudoLigas');
const escudoClubBackElement = document.getElementById('EscudoLigasBack');
// Actualizar la fuente de las imágenes con la URL del JSON
escudoClubElement.src = urlImagen;
escudoClubBackElement.src = urlImagen;
}