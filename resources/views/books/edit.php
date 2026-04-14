<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/books">Libros</a>
    <span>/</span>
    <span>Editar</span>
</div>

<h2>Editar Libro</h2>

<form method="POST" action="/books/<?php echo $book['id']; ?>" class="form-container">
    <input type="hidden" name="_method" value="PUT">
    
    <div class="row">
        <div class="twelve columns">
            <label for="title">Título <span class="required">*</span></label>
            <input class="u-full-width" type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="copyright">Año de Publicación</label>
            <input class="u-full-width" type="number" id="copyright" name="copyright" value="<?php echo htmlspecialchars($book['copyright'] ?? ''); ?>" placeholder="2023">
        </div>
        <div class="six columns">
            <label for="edition">Edición</label>
            <input class="u-full-width" type="text" id="edition" name="edition" value="<?php echo htmlspecialchars($book['edition'] ?? ''); ?>" placeholder="Primera, Segunda, etc.">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="pages">Páginas</label>
            <input class="u-full-width" type="number" id="pages" name="pages" value="<?php echo htmlspecialchars($book['pages'] ?? ''); ?>" placeholder="300">
        </div>
        <div class="six columns">
            <label for="language">Idioma</label>
            <input class="u-full-width" type="text" id="language" name="language" value="<?php echo htmlspecialchars($book['language'] ?? ''); ?>" placeholder="Español, Inglés">
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="author_id">Autor <span class="required">*</span></label>
            <select class="u-full-width" id="author_id" name="author_id" required>
                <option value="">-- Seleccionar Autor --</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['id']; ?>" <?php echo ($author['id'] == $book['author_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($author['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="six columns">
            <label for="publisher_id">Editorial <span class="required">*</span></label>
            <select class="u-full-width" id="publisher_id" name="publisher_id" required>
                <option value="">-- Seleccionar Editorial --</option>
                <?php foreach ($publishers as $publisher): ?>
                    <option value="<?php echo $publisher['id']; ?>" <?php echo ($publisher['id'] == $book['publisher_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($publisher['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row button-group">
        <button class="button-primary" type="submit">✓ Guardar Cambios</button>
        <a href="/books" class="button">✕ Cancelar</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
