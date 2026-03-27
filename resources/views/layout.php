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
                <a href="/" class="button button-primary">Inicio</a>
                <a href="/books" class="button">Libros</a>
                <a href="/authors" class="button">Autores</a>
                <a href="/publishers" class="button">Editoriales</a>
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
