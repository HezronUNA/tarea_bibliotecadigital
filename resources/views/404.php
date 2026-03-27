<?php
$content = ob_get_clean();
ob_start();
?>

<div style="text-align: center; padding: 50px 0;">
    <h2>404</h2>
    <p>Página no encontrada.</p>
    <p><a href="/" class="button button-primary">Volver a Inicio</a></p>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>
