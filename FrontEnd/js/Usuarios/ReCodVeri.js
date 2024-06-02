// Evento de clic para el botón "Reenviar Código"
document.getElementById("resendCode").addEventListener("click", function() {
    // Obtener el valor del campo de entrada de correo electrónico
    var correo = document.getElementById("correo").value;

    // Verificar si se proporcionó un correo electrónico
    if (correo.trim() === "") {
        alert("Por favor, ingresa tu dirección de correo electrónico.");
        return;
    }

    // Enviar una solicitud AJAX al servidor para reenviar el código
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/BackEnd/Usuarios/ReenviarCodigo.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mostrar la respuesta del servidor
            alert(xhr.responseText);
        }
    };
    xhr.send("Correo=" + correo);
});