<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Autores</h2>

<div style="margin-bottom: 20px;">
    <a href="/authors/create" class="button button-primary">+ Agregar Nuevo Autor</a>
</div>

<div class="grid">
    <?php foreach ($authors as $author): ?>
        <div class="card card-clickable" onclick="location.href='/authors/<?php echo $author['id']; ?>/edit'" style="cursor: pointer;">
            <h3><?php echo htmlspecialchars($author['name']); ?></h3>
            <p><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($author['nationality'] ?? 'N/A'); ?></p>
            <p><strong>Año Nacimiento:</strong> <?php echo htmlspecialchars($author['birth'] ?? 'N/A'); ?></p>
            <p><strong>Campos:</strong> <?php echo htmlspecialchars($author['fields'] ?? 'N/A'); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
