<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a> / <a href="/books">Libros</a> / <?php echo htmlspecialchars($book['title']); ?>
</div>

<h2><?php echo htmlspecialchars($book['title']); ?></h2>

<div class="section">
    <h3>Detalles</h3>
    <ul>
        <li><strong>Edición:</strong> <?php echo htmlspecialchars($book['edition']); ?></li>
        <li><strong>Año:</strong> <?php echo htmlspecialchars($book['copyright']); ?></li>
        <li><strong>Páginas:</strong> <?php echo htmlspecialchars($book['pages']); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Autor</h3>
    <p><a href="/authors/<?php echo $book['author_id']; ?>"><?php echo htmlspecialchars($book['author']); ?></a></p>
</div>

<div class="section">
    <h3>Editorial</h3>
    <p><a href="/publishers/<?php echo $book['publisher_id']; ?>"><?php echo htmlspecialchars($book['publisher']); ?></a></p>
</div>

<p style="margin-top: 20px;">
    <a href="/books" class="button button-primary">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
?>
