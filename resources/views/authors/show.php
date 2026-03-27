<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/authors">Autores</a>
    <span>/</span>
    <span><?php echo htmlspecialchars($author['author']); ?></span>
</div>

<div class="breadcrumb">
    <a href="/">Inicio</a> / <a href="/authors">Autores</a> / <?php echo htmlspecialchars($author['author']); ?>
</div>

<h2><?php echo htmlspecialchars($author['author']); ?></h2>

<div class="section">
    <h3>Información</h3>
    <ul>
        <li><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($author['nationality']); ?></li>
        <li><strong>Año Nacimiento:</strong> <?php echo htmlspecialchars($author['birth_year']); ?></li>
        <li><strong>Campos:</strong> <?php echo htmlspecialchars($author['fields']); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Libros</h3>
    <ul>
        <?php foreach ($author['books'] as $book): ?>
            <li><a href="/books/<?php echo $book['book_id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<p style="margin-top: 20px;">
    <a href="/authors" class="button button-primary">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
?>
