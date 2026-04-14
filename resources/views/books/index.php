<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Libros</h2>

<div style="margin-bottom: 20px;">
    <a href="/books/create" class="button button-primary">+ Agregar Nuevo Libro</a>
</div>

<div class="grid">
    <?php foreach ($books as $book): ?>
        <div class="card card-clickable" onclick="location.href='/books/<?php echo $book['id']; ?>/edit'" style="cursor: pointer;">
            <h3><?php echo htmlspecialchars($book['title']); ?></h3>
            <p><strong>Edición:</strong> <?php echo htmlspecialchars($book['edition'] ?? 'N/A'); ?></p>
            <p><strong>Año:</strong> <?php echo htmlspecialchars($book['copyright'] ?? 'N/A'); ?></p>
            <p><strong>Páginas:</strong> <?php echo htmlspecialchars($book['pages'] ?? 'N/A'); ?></p>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>Editorial:</strong> <?php echo htmlspecialchars($book['publisher']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
