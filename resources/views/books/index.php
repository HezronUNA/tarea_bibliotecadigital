<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Libros</h2>

<div class="grid">
    <?php foreach ($books as $book): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($book['title']); ?></h3>
            <p><strong>Edición:</strong> <?php echo htmlspecialchars($book['edition']); ?></p>
            <p><strong>Año:</strong> <?php echo htmlspecialchars($book['copyright']); ?></p>
            <p><strong>Páginas:</strong> <?php echo htmlspecialchars($book['pages']); ?></p>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>Editorial:</strong> <?php echo htmlspecialchars($book['publisher']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
