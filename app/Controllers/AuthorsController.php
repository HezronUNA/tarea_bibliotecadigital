<?php

namespace App\Controllers;

use Database\Database;

class AuthorsController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        $authors = $this->db->query("
            SELECT * FROM authors ORDER BY name
        ");

        // Para cada autor, obtener sus libros
        foreach ($authors as &$author) {
            $author['books'] = $this->db->query("
                SELECT id as book_id, title FROM books WHERE author_id = ? ORDER BY title
            ", [$author['id']]);
        }

        return view('authors.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store()
    {
        $data = $_POST;
        
        $id = $this->db->insert(
            "INSERT INTO authors (name, nationality, birth, fields) VALUES (?, ?, ?, ?)",
            [$data['name'], $data['nationality'], $data['birth'], $data['fields']]
        );

        header('Location: /authors');
        exit;
    }

    public function edit($id)
    {
        $author = $this->db->queryOne("SELECT * FROM authors WHERE id = ?", [$id]);
        
        if (!$author) {
            return view('404');
        }

        return view('authors.edit', ['author' => $author]);
    }

    public function update($id)
    {
        $data = $_POST;
        
        $this->db->update(
            "UPDATE authors SET name = ?, nationality = ?, birth = ?, fields = ? WHERE id = ?",
            [$data['name'], $data['nationality'], $data['birth'], $data['fields'], $id]
        );

        header('Location: /authors');
        exit;
    }
}

