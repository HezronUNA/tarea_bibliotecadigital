<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/publishers">Editoriales</a>
    <span>/</span>
    <span>Nueva Editorial</span>
</div>

<h2>Crear Nueva Editorial</h2>

<form method="POST" action="/publishers" class="form-container">
    <div class="row">
        <div class="twelve columns">
            <label for="name">Nombre <span class="required">*</span></label>
            <input class="u-full-width" type="text" id="name" name="name" placeholder="Nombre de la editorial" required>
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="country">País</label>
            <input class="u-full-width" type="text" id="country" name="country" placeholder="e.g., España, México">
        </div>
        <div class="six columns">
            <label for="founded">Año Fundación</label>
            <input class="u-full-width" type="number" id="founded" name="founded" placeholder="1950">
        </div>
    </div>

    <div class="row">
        <div class="twelve columns">
            <label for="genre">Géneros Principales</label>
            <input class="u-full-width" type="text" id="genre" name="genre" placeholder="Ficción, No-ficción, Técnico">
        </div>
    </div>

    <div class="row button-group">
        <button class="button-primary" type="submit">✓ Guardar Editorial</button>
        <a href="/publishers" class="button">✕ Cancelar</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
