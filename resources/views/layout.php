<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Biblioteca Digital</h1>
            <nav>
                <?php
                $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $current_path = rtrim($current_path, '/') ?: '/';
                
                $nav_links = [
                    '/' => 'Inicio',
                    '/books' => 'Libros',
                    '/authors' => 'Autores',
                    '/publishers' => 'Editoriales'
                ];
                
                foreach ($nav_links as $path => $label):
                    $is_active = ($current_path === $path) ? 'active' : '';
                ?>
                    <a href="<?php echo $path; ?>" class="button <?php echo $is_active; ?>">
                        <?php echo $label; ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </header>

        <div class="content">
            <?php echo $content ?? ''; ?>
        </div>

        <footer>
            <p>&copy; 2024 Biblioteca Digital</p>
        </footer>
    </div>
</body>
</html>
