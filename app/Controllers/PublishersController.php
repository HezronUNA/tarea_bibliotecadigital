<?php

namespace App\Controllers;

use Database\Database;

class PublishersController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        $publishers = $this->db->query("
            SELECT * FROM publishers ORDER BY name
        ");

        // Para cada editorial, obtener sus libros
        foreach ($publishers as &$publisher) {
            $publisher['books'] = $this->db->query("
                SELECT id as book_id, title FROM books WHERE publisher_id = ? ORDER BY title
            ", [$publisher['id']]);
        }

        return view('publishers.index', ['publishers' => $publishers]);
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store()
    {
        $data = $_POST;
        
        $id = $this->db->insert(
            "INSERT INTO publishers (name, country, founded, genre) VALUES (?, ?, ?, ?)",
            [$data['name'], $data['country'], $data['founded'], $data['genre']]
        );

        header('Location: /publishers');
        exit;
    }

    public function edit($id)
    {
        $publisher = $this->db->queryOne("SELECT * FROM publishers WHERE id = ?", [$id]);
        
        if (!$publisher) {
            return view('404');
        }

        return view('publishers.edit', ['publisher' => $publisher]);
    }

    public function update($id)
    {
        $data = $_POST;
        
        $this->db->update(
            "UPDATE publishers SET name = ?, country = ?, founded = ?, genre = ? WHERE id = ?",
            [$data['name'], $data['country'], $data['founded'], $data['genre'], $id]
        );

        header('Location: /publishers');
        exit;
    }
}
?>

