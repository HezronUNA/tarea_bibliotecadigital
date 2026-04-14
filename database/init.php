<?php

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

use Database\Database;

$db = Database::getInstance();

$db->exec("
    CREATE TABLE IF NOT EXISTS authors (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        nationality TEXT,
        birth INTEGER,
        fields TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
");

// Crear tabla de editoriales
$db->exec("
    CREATE TABLE IF NOT EXISTS publishers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        country TEXT,
        founded INTEGER,
        genre TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
");

// Crear tabla de libros
$db->exec("
    CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        copyright INTEGER,
        edition TEXT,
        pages INTEGER,
        language TEXT,
        author_id INTEGER NOT NULL,
        publisher_id INTEGER NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
        FOREIGN KEY (publisher_id) REFERENCES publishers(id) ON DELETE CASCADE
    )
");

// Insertar datos de ejemplo (autor)
$db->insert(
    "INSERT INTO authors (id, name, nationality, birth, fields) VALUES (?, ?, ?, ?, ?)",
    [1, 'Abraham Silberschatz', 'Israeli / American', 1952, 'Database Systems, Operating Systems']
);

$db->insert(
    "INSERT INTO authors (id, name, nationality, birth, fields) VALUES (?, ?, ?, ?, ?)",
    [2, 'Andrew S. Tanenbaum', 'Dutch / American', 1944, 'Distributed computing, Operating Systems']
);

$db->insert(
    "INSERT INTO publishers (id, name, country, founded, genre) VALUES (?, ?, ?, ?, ?)",
    [1, 'John Wiley & Sons', 'United States', 1807, 'Academic']
);

$db->insert(
    "INSERT INTO publishers (id, name, country, founded, genre) VALUES (?, ?, ?, ?, ?)",
    [2, 'Pearson Education', 'United Kingdom', 1844, 'Education']
);

$db->insert(
    "INSERT INTO books (id, title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [1, 'Operating System Concepts', 2012, '9th', 976, 'ENGLISH', 1, 1]
);

$db->insert(
    "INSERT INTO books (id, title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [2, 'Database System Concepts', 2010, '6th', 1376, 'ENGLISH', 1, 1]
);

$db->insert(
    "INSERT INTO books (id, title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [3, 'Computer Networks', 2010, '5th', 960, 'ENGLISH', 2, 2]
);

$db->insert(
    "INSERT INTO books (id, title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [4, 'Modern Operating Systems', 2014, '4th', 1136, 'ENGLISH', 2, 2]
);

echo "✅ ¡Base de datos SQLite creada exitosamente!";

