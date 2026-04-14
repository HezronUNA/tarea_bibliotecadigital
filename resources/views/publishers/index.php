<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Editoriales</h2>

<div style="margin-bottom: 20px;">
    <a href="/publishers/create" class="button button-primary">+ Agregar Nueva Editorial</a>
</div>

<div class="grid">
    <?php foreach ($publishers as $publisher): ?>
        <div class="card card-clickable" onclick="location.href='/publishers/<?php echo $publisher['id']; ?>/edit'" style="cursor: pointer;">
            <h3><?php echo htmlspecialchars($publisher['name']); ?></h3>
            <p><strong>País:</strong> <?php echo htmlspecialchars($publisher['country'] ?? 'N/A'); ?></p>
            <p><strong>Fundación:</strong> <?php echo htmlspecialchars($publisher['founded'] ?? 'N/A'); ?></p>
            <p><strong>Género:</strong> <?php echo htmlspecialchars($publisher['genre'] ?? 'N/A'); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
