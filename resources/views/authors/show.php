<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/authors">Autores</a>
    <span>/</span>
    <span><?php echo htmlspecialchars($author['name']); ?></span>
</div>

<h2><?php echo htmlspecialchars($author['name']); ?></h2>

<div class="section">
    <h3>Información</h3>
    <ul>
        <li><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($author['nationality'] ?? 'N/A'); ?></li>
        <li><strong>Año Nacimiento:</strong> <?php echo htmlspecialchars($author['birth'] ?? 'N/A'); ?></li>
        <li><strong>Campos:</strong> <?php echo htmlspecialchars($author['fields'] ?? 'N/A'); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Libros</h3>
    <?php if (!empty($author['books'])): ?>
        <ul>
            <?php foreach ($author['books'] as $book): ?>
                <li><a href="/books/<?php echo $book['book_id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay libros registrados para este autor.</p>
    <?php endif; ?>
</div>

<p style="margin-top: 20px;">
    <a href="/authors/<?php echo $author['id']; ?>/edit" class="button button-primary">✏️ Editar</a>
    <a href="/authors" class="button">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>

