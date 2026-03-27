<?php
$content = ob_get_clean();
ob_start();
?>

<h2>Editoriales</h2>

<div class="grid">
    <?php foreach ($publishers as $publisher): ?>
        <div class="card">
            <h3><a href="/publishers/<?php echo $publisher['id']; ?>"><?php echo htmlspecialchars($publisher['publisher']); ?></a></h3>
            <p><strong>País:</strong> <?php echo htmlspecialchars($publisher['country']); ?></p>
            <p><strong>Fundación:</strong> <?php echo htmlspecialchars($publisher['founded']); ?></p>
            <p><strong>Género:</strong> <?php echo htmlspecialchars($publisher['genre']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
