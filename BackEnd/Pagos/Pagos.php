<?php
require '../Plataforma/conexion.php';
// Incluir la biblioteca de Stripe
require_once('../Bibliotecas/vendor/autoload.php'); // Ruta a tu archivo autoload de Stripe

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el valor del plan
    if (isset($_POST['plan'])) {
        // Obtener el valor del plan seleccionado
        $planSeleccionado = $_POST['plan'];
        // Obtener el precio del plan
        $precioPlan = $_POST['price'];

         // Actualizar el rol del usuario en la base de datos según el plan seleccionado
         if (isset($conexion)) {
            $nuevoRol = obtenerNuevoRol($planSeleccionado); // Obtener el nuevo rol
            $sql = "UPDATE tblusuarios SET FKIDRoles = ? WHERE IdUsuario = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ii", $nuevoRol, $_SESSION['idUsuario']);
            $stmt->execute();
        }

        // Redirige al usuario a la página de pagos con los detalles del plan
        header("Location: /FrontEnd/html/Pagos/pagos.html?plan=$planSeleccionado&price=$precioPlan");
        exit(); // Asegura que el script se detenga después de redirigir al usuario
    } else {
        echo "No se ha seleccionado ningún plan";
        // Puedes mostrar un mensaje de error o redirigir a una página de error específica aquí
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Si el método de solicitud es GET, verificamos si se enviaron los parámetros del plan y precio
    if (isset($_GET['plan']) && isset($_GET['price'])) {
        // Obtener el valor del plan seleccionado
        $planSeleccionado = $_GET['plan'];
        // Obtener el precio del plan
        $precioPlan = $_GET['price'];

        echo "El usuario seleccionó el plan: " . $planSeleccionado;
        echo "El precio del plan es: $" . $precioPlan;

        // Aquí puedes agregar el código para procesar el pago con los detalles del plan
        try {
            // Configurar tu clave secreta de Stripe
            \Stripe\Stripe::setApiKey('sk_test_51OiStnHpeVSKeqxKNLv9bk0rGVRta1Tx5xXSUOpoT1bfxiRMcgSTl7iug6wSGiqQ8Ddfwd1buXNqYzsPd7ckbIrl00zpCmEENM');

            // Obtener el token de pago enviado desde el cliente
            $token = $_GET['stripeToken'];

            // Crear un cargo en Stripe
            $charge = \Stripe\Charge::create([
                'amount' => intval(floatval($precioPlan) * 100), // El monto se especifica en centavos
                'currency' => 'usd', // Cambia a la moneda que estés utilizando
                'description' => 'Pago de membresía - ' . $planSeleccionado, // Descripción opcional del cargo
                'source' => $token, // Token de pago generado por Stripe
            ]);

            // Mostrar el precio y la membresía seleccionada en pantalla
            echo "¡El pago se ha realizado con éxito!";
            echo "Precio: $" . $precioPlan;
            echo "Membresía seleccionada: " . $planSeleccionado;

            // Redirigir al usuario a la página de pago exitoso después de mostrar el mensaje
            header("Location: /ruta/a/tu/pagoexitoso.php?plan=$planSeleccionado&price=$precioPlan");
            exit();
        } catch (Exception $e) {
            // Si ocurre algún error durante el proceso de pago, puedes mostrar un mensaje de error al usuario
            echo "Hubo un error al procesar el pago: " . $e->getMessage();
        }
    } else {
        echo "No se han proporcionado los parámetros del plan y precio";
        // Puedes mostrar un mensaje de error o redirigir a una página de error específica aquí
    }
}

// Función para obtener el nuevo rol según el plan seleccionado
function obtenerNuevoRol($planSeleccionado)
{
    // Implementa tu lógica para asignar un nuevo rol según el plan seleccionado
    // Por ejemplo:
    switch ($planSeleccionado) {
        case 'Básico':
            return 2; // ID del rol para el plan básico
        case 'Estrella':
            return 3; // ID del rol para el plan estrella
        case 'Premium':
            return 4; // ID del rol para el plan premium
        default:
            return 2; // Por defecto, asignar el rol básico
    }
}
?>
