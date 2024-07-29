<?php 
require __DIR__ . '../vendor/autoload.php';
header('Content-Type: application/json; charset=utf-8');

$email = $_POST['email'] ?? null;

if (!$email) {
    echo json_encode(['status' => 'error', 'message' => 'Falta el correo electrónico.']);
    return;
}

$resend = Resend::client('re_FHHGotN5_8SwkbhLE9c7seKGCx3rCr7kE');

// URL del logo
$logoUrl = "https://tg-logistic.com/img/tg-full-logo.svg";

// Contenido HTML del correo con estilos en línea y logo
$htmlContent = '
<!DOCTYPE html>
<html>
<head>
    <title>Correo Electrónico de Interesado</title>
</head>
<body>
    <div style="background-color: #f4f4f4; padding: 20px; font-family: Arial, sans-serif; line-height: 1.5;">
        <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 40px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: left;">
            <img src="' . $logoUrl . '" alt="Logo TG Group" style="max-width: 150px; height: auto; margin-bottom: 20px;">
            <h2 style="color: #333333; font-size: 24px;">Nueva Lead de cliente interesado</h2>
            <p style="color: #555555; font-size: 18px;">Gracias por suscribirte. Estarás recibiendo noticias y actualizaciones nuestras.</p>
        </div>
    </div>
</body>
</html>';

try {
    $result = $resend->sendEmail([
        'from' => 'TG Group <info@tg-logistic.com>',
        'to' => [$email],
        'subject' => 'Nueva Lead',
        'html' => $htmlContent,
    ]);

    echo json_encode(['status' => 'success', 'message' => 'Correo enviado con éxito.']);

} catch (\Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    return; 
}
?>
