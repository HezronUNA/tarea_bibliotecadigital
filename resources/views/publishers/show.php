<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/publishers">Editoriales</a>
    <span>/</span>
    <span><?php echo htmlspecialchars($publisher['publisher']); ?></span>
</div>

<div class="breadcrumb">
    <a href="/">Inicio</a> / <a href="/publishers">Editoriales</a> / <?php echo htmlspecialchars($publisher['publisher']); ?>
</div>

<h2><?php echo htmlspecialchars($publisher['publisher']); ?></h2>

<div class="section">
    <h3>Información</h3>
    <ul>
        <li><strong>País:</strong> <?php echo htmlspecialchars($publisher['country']); ?></li>
        <li><strong>Fundación:</strong> <?php echo htmlspecialchars($publisher['founded']); ?></li>
        <li><strong>Género:</strong> <?php echo htmlspecialchars($publisher['genre']); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Libros</h3>
    <ul>
        <?php foreach ($publisher['books'] as $book): ?>
            <li><a href="/books/<?php echo $book['book_id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<p style="margin-top: 20px;">
    <a href="/publishers" class="button button-primary">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
?>
