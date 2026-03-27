<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 960px;
        }
        header {
            background-color: #fff;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid #e1e1e1;
        }
        header h1 {
            margin-bottom: 0;
        }
        nav {
            margin-top: 15px;
        }
        nav a {
            margin-right: 10px;
        }
        .content {
            background-color: #fff;
            padding: 30px;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #e1e1e1;
            padding: 20px;
            border-radius: 4px;
        }
        .card h3 {
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 10px;
        }
        .card p {
            margin-bottom: 8px;
            font-size: 14px;
        }
        .section {
            background-color: #fafafa;
            padding: 15px;
            margin: 15px 0;
            border-left: 3px solid #33c3dd;
            border-radius: 4px;
        }
        .section h3 {
            margin-top: 0;
        }
        .section ul {
            margin-bottom: 0;
        }
        .breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
            color: #999;
        }
        .breadcrumb a {
            color: #0087be;
        }
        footer {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 12px;
        }
    </style>
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
