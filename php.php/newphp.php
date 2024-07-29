<?php 
require __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json; charset=utf-8');

$name         = $_POST['name'] ?? null;
$email        = $_POST['email'] ?? null;
$phone        = $_POST['phone'] ?? null;
$leadSource   = $_POST['leadSource'] ?? null;

if(!$name || !$email || !$phone || !$leadSource){
  echo json_encode(array('status' => 'error', 'message' => 'Missing params.', 'test'));
  return;
}

$resend = Resend::client('re_5fSigvEr_DtbgnhPb4Scvr6nca64Xdsiy');

try {
    $result = $resend->emails->send([
        'from' => 'Agenciadores <info@agenciadores.com>',
        'to' => ['info@agenciadores.com'],
        'subject' => 'Nueva Lead',
        'html' => '<strong>Nombre</strong><p>'.$name.'</p><br><strong>Email</strong><p>'.$email.'</p><br><strong>Teléfono</strong><p>'.$phone.'</p><br><strong>Dónde nos conocio?</strong><p>'.$leadSource.'</p><br>',
    ]);

    echo json_encode(array('status' => 'success', 'message' => 'Sent.'));

} catch (\Exception $e) {
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    return; 
}
?><!-- api key -->
<!-- re_GjGcnRed_2we6AG2bXfCrLe9R4CxFgS2c -->



<?php

require __DIR__ . '/../vendor/autoload.php';
use Resend\Client;

$email = $_POST['email'] ?? null;

if (!$email) {
    echo json_encode(['status' => 'error', 'message' => 'Falta el correo electrónico.']);
    return;
}

// Inicializar Resend
$resend = new Client('re_GjGcnRed_2we6AG2bXfCrLe9R4CxFgS2c');

try {
    // Enviar correo electrónico
    $result = $resend->emails->send([
        'from' => 'TG Group <comex@tg-logistic.com>',
        'to' => [$email],
        'subject' => 'Nueva Lead',
        'html' => '<p>Contenido del correo</p>',
    ]);

    echo json_encode(['status' => 'success', 'message' => 'Correo enviado con éxito.']);
} catch (\Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    return;
}

?>


<!-- NUEVA API KEY
re_6pLgpv6i_NFTyiAvkUNExNiLJvhYsCBA8 -->