<?php
require '../Bibliotecas/vendor/autoload.php';

// La biblioteca debe estar configurada con la clave secreta de tu cuenta.
// Asegúrate de que la clave se mantenga fuera de cualquier sistema de control de versiones que estés utilizando.
$stripe = new \Stripe\StripeClient('sk_test_51OiStnHpeVSKeqxKNLv9bk0rGVRta1Tx5xXSUOpoT1bfxiRMcgSTl7iug6wSGiqQ8Ddfwd1buXNqYzsPd7ckbIrl00zpCmEENM');

// Este es el secreto de tu webhook de Stripe CLI para probar tu endpoint localmente.
$endpoint_secret = 'whsec_3cca1e4302ad90bb4ce43a493b73115a94903241cf2834667c8b6e594921e04e';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Carga inválida
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Firma inválida
  http_response_code(400);
  exit();
}

// Manejar el evento
switch ($event->type) {
  case 'payment_intent.succeeded':
    $paymentIntent = $event->data->object;
  // ... manejar otros tipos de evento  clave secreta de webhook whsec_3cca1e4302ad90bb4ce43a493b73115a94903241cf2834667c8b6e594921e04e
    $paymentIntent->charges->data->billing_details->email;
  default:
    echo 'Recibido tipo de evento desconocido ' . $event->type;
}

http_response_code(200);