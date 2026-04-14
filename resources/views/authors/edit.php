<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/authors">Autores</a>
    <span>/</span>
    <span>Editar</span>
</div>

<h2>Editar Autor</h2>

<form method="POST" action="/authors/<?php echo $author['id']; ?>" class="form-container">
    <input type="hidden" name="_method" value="PUT">
    
    <div class="row">
        <div class="six columns">
            <label for="name">Nombre <span class="required">*</span></label>
            <input class="u-full-width" type="text" id="name" name="name" value="<?php echo htmlspecialchars($author['name']); ?>" required>
        </div>
        <div class="six columns">
            <label for="nationality">Nacionalidad</label>
            <input class="u-full-width" type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($author['nationality'] ?? ''); ?>" placeholder="e.g., España, México">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="birth">Año de Nacimiento</label>
            <input class="u-full-width" type="number" id="birth" name="birth" value="<?php echo htmlspecialchars($author['birth'] ?? ''); ?>" placeholder="1950">
        </div>
        <div class="six columns">
            <label for="fields">Campos/Géneros</label>
            <input class="u-full-width" type="text" id="fields" name="fields" value="<?php echo htmlspecialchars($author['fields'] ?? ''); ?>" placeholder="e.g., Fantasía, Ciencia Ficción">
        </div>
    </div>

    <div class="row button-group">
        <button class="button-primary" type="submit">✓ Guardar Cambios</button>
        <a href="/authors" class="button">✕ Cancelar</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
