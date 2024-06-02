// Cargar el JSON de las nacionalidades
fetch('/FrontEnd/Json/Nacionalidades.json')
.then(response => response.json())
.then(data => {
  // Llamar a la función para construir el menú desplegable
  construirMenu(data);
})
.catch(error => console.error('Error al cargar el JSON:', error));

// Función para construir el menú desplegable
function construirMenu(selnal) {
const dropdownMenu = document.getElementById('MenuSelNac');
// Limpiar el contenido del menú desplegable
dropdownMenu.innerHTML = '';
// Iterar sobre los datos de los clubes
selnal.forEach(selna => {
  const listItem = document.createElement('li');
  const link = document.createElement('a');
  link.classList.add('dropdown-item');
  link.href = '#';
  link.textContent = selna.Nombre;
  // Agregar evento de clic para actualizar el nombre del club seleccionado
  link.addEventListener('click', () => {
    actualizarNombreClub(selna.Nombre);
    actualizarEscudoClub(selna.URL_imagen);
  });
  listItem.appendChild(link);
  dropdownMenu.appendChild(listItem);
});
}

// Función para actualizar el nombre del club seleccionado
function actualizarNombreClub(nombre) {
const nombreClubElement = document.getElementById('NombreSelNac');
nombreClubElement.querySelector('h3').textContent = nombre;
}

// Función para actualizar el escudo del club seleccionado
function actualizarEscudoClub(urlImagen) {
const escudoClubElement = document.getElementById('EscudoSelNac');
const escudoClubBackElement = document.getElementById('EscudoSelNacBack');
// Actualizar la fuente de las imágenes con la URL del JSON
escudoClubElement.src = urlImagen;
escudoClubBackElement.src = urlImagen;
}