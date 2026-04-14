<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/books">Libros</a>
    <span>/</span>
    <span>Nuevo Libro</span>
</div>

<h2>Crear Nuevo Libro</h2>

<form method="POST" action="/books" class="form-container">
    <div class="row">
        <div class="twelve columns">
            <label for="title">Título <span class="required">*</span></label>
            <input class="u-full-width" type="text" id="title" name="title" placeholder="Ingrese el título del libro" required>
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="copyright">Año de Publicación</label>
            <input class="u-full-width" type="number" id="copyright" name="copyright" placeholder="2023">
        </div>
        <div class="six columns">
            <label for="edition">Edición</label>
            <input class="u-full-width" type="text" id="edition" name="edition" placeholder="Primera, Segunda, etc.">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="pages">Páginas</label>
            <input class="u-full-width" type="number" id="pages" name="pages" placeholder="300">
        </div>
        <div class="six columns">
            <label for="language">Idioma</label>
            <input class="u-full-width" type="text" id="language" name="language" placeholder="Español, Inglés">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="author_id">Autor <span class="required">*</span></label>
            <select class="u-full-width" id="author_id" name="author_id" required>
                <option value="">-- Seleccionar Autor --</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['id']; ?>"><?php echo htmlspecialchars($author['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="six columns">
            <label for="publisher_id">Editorial <span class="required">*</span></label>
            <select class="u-full-width" id="publisher_id" name="publisher_id" required>
                <option value="">-- Seleccionar Editorial --</option>
                <?php foreach ($publishers as $publisher): ?>
                    <option value="<?php echo $publisher['id']; ?>"><?php echo htmlspecialchars($publisher['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row button-group">
        <button class="button-primary" type="submit">✓ Guardar Libro</button>
        <a href="/books" class="button">✕ Cancelar</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
