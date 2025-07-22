<?php
session_start();
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['csrf_token'] === $_SESSION['csrf']) {
        echo "<h2>✅ Contraseña cambiada correctamente</h2>";
    } else {
        echo "<h2>❌ Ataque CSRF detectado</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Formulario seguro con token CSRF</h2>
    <form method="POST">
        Nueva contraseña: <input type="password" name="password"><br>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input type="submit" value="Cambiar">
    </form>
</body>
</html>
