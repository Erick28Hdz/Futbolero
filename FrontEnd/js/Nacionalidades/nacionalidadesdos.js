// Definir un módulo para el dropdown de nacionalidades
const NacionalidadesDropdown = (function() {
    // Función para cargar las nacionalidades desde el archivo JSON
    function cargarNacionalidades() {
        fetch('/FrontEnd/Json/Nacionalidades.json')
        .then(response => response.json())
        .then(data => {
            construirMenu(data, 'MenuSelNac');
        })
        .catch(error => console.error('Error al cargar el JSON de nacionalidades:', error));
    }
  
    // Función para construir el menú desplegable de nacionalidades
    function construirMenu(nacionalidades, menuId) {
        const dropdownMenu = document.getElementById(menuId);
        // Limpiar el contenido del menú desplegable
        dropdownMenu.innerHTML = '';
        // Iterar sobre los datos de las nacionalidades
        nacionalidades.forEach(nacionalidad => {
            const listItem = document.createElement('li');
            const link = document.createElement('a');
            link.classList.add('dropdown-item');
            link.href = '#';
            link.textContent = nacionalidad.Nombre;
            // Agregar evento de clic para actualizar el nombre del país seleccionado
            link.addEventListener('click', () => {
                actualizarNombrePais(nacionalidad.Nombre);
                actualizarBanderaPais(nacionalidad.URL_bandera);
            });
            listItem.appendChild(link);
            dropdownMenu.appendChild(listItem);
        });
    }
    // Retornar las funciones y variables públicas del módulo
    return {
        cargarNacionalidades: cargarNacionalidades
    };
})();

// Llamar a la función para cargar las nacionalidades cuando la página se carga
window.onload = function() {
    NacionalidadesDropdown.cargarNacionalidades();
};