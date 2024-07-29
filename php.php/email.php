<?php 
require __DIR__ . '../vendor/autoload.php';
header('Content-Type: application/json; charset=utf-8');

$name         = $_POST['name'] ?? null;
$email        = $_POST['email'] ?? null;
$phone        = $_POST['phone'] ?? null;
$leadSource   = $_POST['leadSource'] ?? null;

if(!$name || !$email || !$phone || !$leadSource){
  echo json_encode(array('status' => 'error', 'message' => 'Missing params.', 'test'));
  return;
}

$resend = Resend::client('re_FHHGotN5_8SwkbhLE9c7seKGCx3rCr7kE');

try {
    $result = $resend->emails->send([
        'from' => 'TG Logistic <info@tg-logistic.com>',
        'to' => ['info@tg-logistic.com'],
        'subject' => 'Nueva Lead',
        'html' => '<strong>Nombre</strong><p>'.$name.'</p><br><strong>Email</strong><p>'.$email.'</p><br><strong>Teléfono</strong><p>'.$phone.'</p><br><strong>Dónde nos conocio?</strong><p>'.$leadSource.'</p><br>',
    ]);

    echo json_encode(array('status' => 'success', 'message' => 'Sent.'));

} catch (\Exception $e) {
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    return; 
}
?>


<!-- api key -->
<!-- re_R6em3QcM_CAwWUCFsssAFkcKTm9c4Sr3H -->
