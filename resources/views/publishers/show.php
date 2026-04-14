<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/publishers">Editoriales</a>
    <span>/</span>
    <span><?php echo htmlspecialchars($publisher['name']); ?></span>
</div>

<h2><?php echo htmlspecialchars($publisher['name']); ?></h2>

<div class="section">
    <h3>Información</h3>
    <ul>
        <li><strong>País:</strong> <?php echo htmlspecialchars($publisher['country'] ?? 'N/A'); ?></li>
        <li><strong>Fundación:</strong> <?php echo htmlspecialchars($publisher['founded'] ?? 'N/A'); ?></li>
        <li><strong>Género:</strong> <?php echo htmlspecialchars($publisher['genre'] ?? 'N/A'); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Libros</h3>
    <?php if (!empty($publisher['books'])): ?>
        <ul>
            <?php foreach ($publisher['books'] as $book): ?>
                <li><a href="/books/<?php echo $book['book_id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay libros registrados para esta editorial.</p>
    <?php endif; ?>
</div>

<p style="margin-top: 20px;">
    <a href="/publishers/<?php echo $publisher['id']; ?>/edit" class="button button-primary">✏️ Editar</a>
    <a href="/publishers" class="button">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
