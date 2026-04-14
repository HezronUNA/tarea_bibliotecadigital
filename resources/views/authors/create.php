<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/authors">Autores</a>
    <span>/</span>
    <span>Nuevo Autor</span>
</div>

<h2>Crear Nuevo Autor</h2>

<form method="POST" action="/authors" class="form-container">
    <div class="row">
        <div class="six columns">
            <label for="name">Nombre <span class="required">*</span></label>
            <input class="u-full-width" type="text" id="name" name="name" required>
        </div>
        <div class="six columns">
            <label for="nationality">Nacionalidad</label>
            <input class="u-full-width" type="text" id="nationality" name="nationality" placeholder="e.g., España, México">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="birth">Año de Nacimiento</label>
            <input class="u-full-width" type="number" id="birth" name="birth" placeholder="1950">
        </div>
        <div class="six columns">
            <label for="fields">Campos/Géneros</label>
            <input class="u-full-width" type="text" id="fields" name="fields" placeholder="e.g., Fantasía, Ciencia Ficción">
        </div>
    </div>

    <div class="row button-group">
        <button class="button-primary" type="submit">✓ Guardar Autor</button>
        <a href="/authors" class="button">✕ Cancelar</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
