<?php
$content = ob_get_clean();
ob_start();
?>

<div class="breadcrumb">
    <a href="/">Inicio</a>
    <span>/</span>
    <a href="/books">Libros</a>
    <span>/</span>
    <span><?php echo htmlspecialchars($book['title']); ?></span>
</div>

<h2><?php echo htmlspecialchars($book['title']); ?></h2>

<div class="section">
    <h3>Detalles del Libro</h3>
    <ul>
        <li><strong>Edición:</strong> <?php echo htmlspecialchars($book['edition'] ?? 'N/A'); ?></li>
        <li><strong>Año:</strong> <?php echo htmlspecialchars($book['copyright'] ?? 'N/A'); ?></li>
        <li><strong>Páginas:</strong> <?php echo htmlspecialchars($book['pages'] ?? 'N/A'); ?></li>
        <li><strong>Idioma:</strong> <?php echo htmlspecialchars($book['language'] ?? 'N/A'); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Autor</h3>
    <p>
        <strong><a href="/authors/<?php echo $book['author_id']; ?>"><?php echo htmlspecialchars($book['author']); ?></a></strong>
    </p>
    <ul>
        <li><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($book['nationality'] ?? 'N/A'); ?></li>
        <li><strong>Año Nacimiento:</strong> <?php echo htmlspecialchars($book['birth'] ?? 'N/A'); ?></li>
        <li><strong>Campos:</strong> <?php echo htmlspecialchars($book['fields'] ?? 'N/A'); ?></li>
    </ul>
</div>

<div class="section">
    <h3>Editorial</h3>
    <p>
        <strong><a href="/publishers/<?php echo $book['publisher_id']; ?>"><?php echo htmlspecialchars($book['publisher']); ?></a></strong>
    </p>
    <ul>
        <li><strong>País:</strong> <?php echo htmlspecialchars($book['country'] ?? 'N/A'); ?></li>
        <li><strong>Fundación:</strong> <?php echo htmlspecialchars($book['founded'] ?? 'N/A'); ?></li>
        <li><strong>Género:</strong> <?php echo htmlspecialchars($book['genre'] ?? 'N/A'); ?></li>
    </ul>
</div>

<p style="margin-top: 20px;">
    <a href="/books/<?php echo $book['id']; ?>/edit" class="button button-primary">✏️ Editar</a>
    <a href="/books" class="button">Volver</a>
</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
