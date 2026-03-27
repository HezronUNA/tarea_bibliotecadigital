<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Autores</h2>

<div class="grid">
    <?php foreach ($authors as $author): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($author['author']); ?></h3>
            <p><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($author['nationality']); ?></p>
            <p><strong>Año Nacimiento:</strong> <?php echo htmlspecialchars($author['birth_year']); ?></p>
            <p><strong>Campos:</strong> <?php echo htmlspecialchars($author['fields']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
