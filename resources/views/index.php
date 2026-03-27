<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Bienvenido</h2>
<p>Selecciona una sección para explorar:</p>

<div style="margin-top: 30px;">
    <p><a href="/books" class="button button-primary">Ver Libros</a></p>
    <p><a href="/authors" class="button button-primary">Ver Autores</a></p>
    <p><a href="/publishers" class="button button-primary">Ver Editoriales</a></p>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>
