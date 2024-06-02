// Definir un módulo para el dropdown de ligas
const ClubesDropdown = (function() {
    // Función para cargar las ligas desde el archivo JSON
    function cargarClubes() {
        fetch('/FrontEnd/Json/Clubes.json')
        .then(response => response.json())
        .then(data => {
            construirMenu(data, 'MenuClubes');
        })
        .catch(error => console.error('Error al cargar el JSON de ligas:', error));
    }
  
    // Función para construir el menú desplegable de ligas
    function construirMenu(clubes, menuId) {
        const dropdownMenu = document.getElementById(menuId);
        // Limpiar el contenido del menú desplegable
        dropdownMenu.innerHTML = '';
        // Iterar sobre los datos de los clubes
        clubes.forEach(club => {
            const listItem = document.createElement('li');
            const link = document.createElement('a');
            link.classList.add('dropdown-item');
            link.href = '#';
            link.textContent = club.Nombre;
            // Agregar evento de clic para actualizar el nombre de la liga seleccionada
            link.addEventListener('click', () => {
                actualizarNombreClub(club.Nombre);
                actualizarEscudoClub(club.URL_imagen);
            });
            listItem.appendChild(link);
            dropdownMenu.appendChild(listItem);
        });
    }

    // Función para actualizar el nombre de la liga seleccionada
    function actualizarNombreclub(nombre) {
        const nombreClubElement = document.getElementById('NombreClubes'); // Asegúrate de tener este elemento en tu HTML
        nombreClubElement.textContent = nombre; // O cualquier lógica de actualización
    }

    // Función para actualizar el escudo de la liga seleccionada
    function actualizarEscudoLiga(urlImagen) {
        const escudoClubElement = document.getElementById('EscudoClubes'); // Asegúrate de tener este elemento en tu HTML
        escudoClubElement.src = urlImagen; // O cualquier lógica de actualización
    }

    // Retornar las funciones y variables públicas del módulo
    return {
        cargarClubes: cargarClubes
    };
})();

// Llamar a la función para cargar las ligas cuando la página se carga
window.addEventListener('load', () => {
    NacionalidadesDropdown.cargarNacionalidades();
    LigasDropdown.cargarLigas();
    ClubesDropdown.cargarClubes();
});
