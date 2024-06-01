<?php

require_once ('../Bibliotecas/vendor/autoload.php');

$stripe = new \Stripe\StripeClient('sk_test_51OiStnHpeVSKeqxKNLv9bk0rGVRta1Tx5xXSUOpoT1bfxiRMcgSTl7iug6wSGiqQ8Ddfwd1buXNqYzsPd7ckbIrl00zpCmEENM');

function calculateOrderAmount(array $items): int {
    // Precios en centavos
    $basicPrice = 0;
    $starPrice = 1000; // $10 en dólares
    $premiumPrice = 2000; // $20 en dólares
    
    $totalAmount = 0;
    
    // Calcular el monto total del pedido
    foreach ($items as $item) {
        switch ($item) {
            case 'basico':
                $totalAmount += $basicPrice;
                break;
            case 'estrella':
                $totalAmount += $starPrice;
                break;
            case 'premium':
                $totalAmount += $premiumPrice;
                break;
            default:
                // Manejar caso no válido, si es necesario
                break;
        }
    }
    
    return $totalAmount;
}

header('Content-Type: application/json');

try {
    // Recuperar JSON del cuerpo de la solicitud POST
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Crear un PaymentIntent con el monto y la moneda
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'usd', // Cambiar a dólares
        // En la última versión de la API, especificar el parámetro `automatic_payment_methods` es opcional porque Stripe habilita su funcionalidad de forma predeterminada.
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>