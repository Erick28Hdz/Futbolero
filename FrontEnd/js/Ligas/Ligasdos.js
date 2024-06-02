// Definir un módulo para el dropdown de ligas
const LigasDropdown = (function() {
    // Función para cargar las ligas desde el archivo JSON
    function cargarLigas() {
        fetch('/FrontEnd/Json/Ligas.json')
        .then(response => response.json())
        .then(data => {
            construirMenu(data, 'MenuLigas');
        })
        .catch(error => console.error('Error al cargar el JSON de ligas:', error));
    }
  
    // Función para construir el menú desplegable de ligas
    function construirMenu(ligas, menuId) {
        const dropdownMenu = document.getElementById(menuId);
        // Limpiar el contenido del menú desplegable
        dropdownMenu.innerHTML = '';
        // Iterar sobre los datos de las ligas
        ligas.forEach(liga => {
            const listItem = document.createElement('li');
            const link = document.createElement('a');
            link.classList.add('dropdown-item');
            link.href = '#';
            link.textContent = liga.Nombre;
            // Agregar evento de clic para actualizar el nombre de la liga seleccionada
            link.addEventListener('click', () => {
                actualizarNombreLiga(liga.Nombre);
                actualizarEscudoLiga(liga.URL_imagen);
            });
            listItem.appendChild(link);
            dropdownMenu.appendChild(listItem);
        });
    }

    // Función para actualizar el nombre de la liga seleccionada
    function actualizarNombreLiga(nombre) {
        const nombreLigaElement = document.getElementById('NombreLigas'); // Asegúrate de tener este elemento en tu HTML
        nombreLigaElement.textContent = nombre; // O cualquier lógica de actualización
    }

    // Función para actualizar el escudo de la liga seleccionada
    function actualizarEscudoLiga(urlImagen) {
        const escudoLigaElement = document.getElementById('EscudoLigas'); // Asegúrate de tener este elemento en tu HTML
        escudoLigaElement.src = urlImagen; // O cualquier lógica de actualización
    }

    // Retornar las funciones y variables públicas del módulo
    return {
        cargarLigas: cargarLigas
    };
})();

// Llamar a la función para cargar las ligas cuando la página se carga
window.addEventListener('load', () => {
    NacionalidadesDropdown.cargarNacionalidades();
    LigasDropdown.cargarLigas();
});
