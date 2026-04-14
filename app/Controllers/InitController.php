<?php

namespace App\Controllers;

use Database\Database;

class InitController
{
    public function init()
    {
        $db = Database::getInstance();

        // Verificar si las tablas ya existen
        $result = $db->query(
            "SELECT name FROM sqlite_master WHERE type='table' AND name='authors'"
        );

        if (!empty($result)) {
            return view('init.success', [
                'message' => '✅ Base de datos ya está inicializada'
            ]);
        }

        // Crear tabla de autores
        $db->exec("
            CREATE TABLE authors (
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
            CREATE TABLE publishers (
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
            CREATE TABLE books (
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

        // Insertar autores
        $db->insert(
            "INSERT INTO authors (name, nationality, birth, fields) VALUES (?, ?, ?, ?)",
            ['Abraham Silberschatz', 'Israeli / American', 1952, 'Database Systems, Operating Systems']
        );

        $db->insert(
            "INSERT INTO authors (name, nationality, birth, fields) VALUES (?, ?, ?, ?)",
            ['Andrew S. Tanenbaum', 'Dutch / American', 1944, 'Distributed computing, Operating Systems']
        );

        // Insertar editoriales
        $db->insert(
            "INSERT INTO publishers (name, country, founded, genre) VALUES (?, ?, ?, ?)",
            ['John Wiley & Sons', 'United States', 1807, 'Academic']
        );

        $db->insert(
            "INSERT INTO publishers (name, country, founded, genre) VALUES (?, ?, ?, ?)",
            ['Pearson Education', 'United Kingdom', 1844, 'Education']
        );

        // Insertar libros
        $db->insert(
            "INSERT INTO books (title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?)",
            ['Operating System Concepts', 2012, '9th', 976, 'ENGLISH', 1, 1]
        );

        $db->insert(
            "INSERT INTO books (title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?)",
            ['Database System Concepts', 2010, '6th', 1376, 'ENGLISH', 1, 1]
        );

        $db->insert(
            "INSERT INTO books (title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?)",
            ['Computer Networks', 2010, '5th', 960, 'ENGLISH', 2, 2]
        );

        $db->insert(
            "INSERT INTO books (title, copyright, edition, pages, language, author_id, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?)",
            ['Modern Operating Systems', 2014, '4th', 1136, 'ENGLISH', 2, 2]
        );

        return view('init.success', [
            'message' => '✅ ¡Base de datos SQLite creada exitosamente con los datos iniciales!'
        ]);
    }
}
?>
