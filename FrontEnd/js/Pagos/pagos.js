// Función para obtener el valor del parámetro de consulta de la URL
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    console.log('URL:', url); // Imprime la URL para verificar si es correcta
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Obtiene el valor del parámetro 'plan' de la URL
var planSeleccionado = getParameterByName('plan');
console.log('Plan seleccionado:', planSeleccionado); // Imprime el valor del plan seleccionado
// Muestra el plan seleccionado en el elemento HTML correspondiente
// Obtiene el valor del parámetro 'price' de la URL
var precioPlan = getParameterByName('price');
console.log('Precio del plan:', precioPlan); // Imprime el valor del precio del plan

document.getElementById('planSeleccionado').innerText = planSeleccionado;
document.getElementById('precioPlan').innerText = precioPlan;

//---------------- Otra sección de código ---------------------//

// Este es el código JavaScript para manejar la integración con Stripe

// Configurar tu clave pública de Stripe
var stripe = Stripe('pk_test_51OiStnHpeVSKeqxKAVRFS3VvexYUUeOVdqNPEm67Vv90NSvedhQQRarVGjI9eZnurGOtUmFFTMs07EuXNYJZItq1009sDxJfcx');

// Crear un elemento de formulario de pago
var elements = stripe.elements();

// Personalizar el estilo de los elementos del formulario
var style = {
  base: {
    fontFamily: 'Arial, sans-serif',
    fontSize: '20px',
    color: '#e0bb20',
    lineHeight: '50px',
    letterSpacing: '-0.0',
    padding: '16px',
  },
};

// Crear un objeto de elementos de Stripe
var card = elements.create('card', { style: style });



// Montar el elemento del formulario de tarjeta en el elemento con el ID 'card-element'
card.mount('#card-element');

// Manejar la validación del formulario en la submisión
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  
  // Deshabilitar el botón de pago para evitar múltiples clics
  document.getElementById('submit-button').disabled = true;

  // Obtiene el valor del parámetro 'plan' de la URL
    var planSeleccionado = getParameterByName('plan');
    console.log('Plan seleccionado:', planSeleccionado);

    // Obtiene el valor del parámetro 'price' de la URL
    var precioPlan = getParameterByName('price');
    console.log('Precio del plan:', precioPlan);

    // Actualiza los valores de los campos ocultos en el formulario con los valores obtenidos
    document.getElementById('plan').value = planSeleccionado;
    document.getElementById('precioPlan').value = precioPlan;

  // Procesar el pago con Stripe
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Mostrar mensaje de error al usuario
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

      // Habilitar el botón de pago
      document.getElementById('submit-button').disabled = false;

      // Redirigir a la página de pago rechazado
      // Aquí verificamos si el error es por un número de tarjeta inválido
      if (result.error.code === 'invalid_number') {
        window.location.href = '/FrontEnd/html/Pagos/Negado.html';
      }
    } else {
      // Adjuntar el token de pago al formulario y enviarlo al servidor
      var tokenInput = document.createElement('input');
      tokenInput.setAttribute('type', 'hidden');
      tokenInput.setAttribute('name', 'stripeToken');
      tokenInput.setAttribute('value', result.token.id);
      form.appendChild(tokenInput);
      
      // Enviar el formulario al servidor para procesar el pago
      form.submit();

      // Redirigir al usuario después de procesar el pago con éxito
      window.location.href = '/FrontEnd/html/Pagos/Aceptado.html';
    }
  });
}); 