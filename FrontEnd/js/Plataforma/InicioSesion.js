document.addEventListener("DOMContentLoaded", function () {
    const terminosCheckbox = document.getElementById("terminosCheckbox");
    const form = document.querySelector(".form");
  
    form.addEventListener("submit", function (event) {
      if (!terminosCheckbox.checked) {
        alert("Para iniciar sesión, debes aceptar los términos y condiciones.");
        event.preventDefault(); // Evita que el formulario se envíe
      }
    });
  });