<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Libros</h2>

<div class="grid">
    <?php foreach ($books as $book): ?>
        <div class="card">
            <h3><a href="/books/<?php echo $book['id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></h3>
            <p><strong>Edición:</strong> <?php echo htmlspecialchars($book['edition']); ?></p>
            <p><strong>Año:</strong> <?php echo htmlspecialchars($book['copyright']); ?></p>
            <p><strong>Páginas:</strong> <?php echo htmlspecialchars($book['pages']); ?></p>
            <p><strong>Autor:</strong> <a href="/authors/<?php echo $book['author_id']; ?>"><?php echo htmlspecialchars($book['author']); ?></a></p>
            <p><strong>Editorial:</strong> <a href="/publishers/<?php echo $book['publisher_id']; ?>"><?php echo htmlspecialchars($book['publisher']); ?></a></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
