<?php

namespace App\Controllers;

use Database\Database;

class BooksController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        $books = $this->db->query("
            SELECT 
                b.id,
                b.title,
                b.edition,
                b.copyright,
                b.language,
                b.pages,
                a.id as author_id,
                a.name as author,
                p.id as publisher_id,
                p.name as publisher
            FROM books b
            JOIN authors a ON b.author_id = a.id
            JOIN publishers p ON b.publisher_id = p.id
            ORDER BY b.title
        ");

        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        $authors = $this->db->query("SELECT id, name FROM authors ORDER BY name");
        $publishers = $this->db->query("SELECT id, name FROM publishers ORDER BY name");
        
        return view('books.create', ['authors' => $authors, 'publishers' => $publishers]);
    }

    public function store()
    {
        $data = $_POST;
        
        $id = $this->db->insert(
            "INSERT INTO books (title, copyright, edition, pages, language, author_id, publisher_id) 
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$data['title'], $data['copyright'], $data['edition'], $data['pages'], $data['language'], $data['author_id'], $data['publisher_id']]
        );

        header('Location: /books');
        exit;
    }

    public function edit($id)
    {
        $book = $this->db->queryOne("SELECT * FROM books WHERE id = ?", [$id]);
        
        if (!$book) {
            return view('404');
        }

        $authors = $this->db->query("SELECT id, name FROM authors ORDER BY name");
        $publishers = $this->db->query("SELECT id, name FROM publishers ORDER BY name");
        
        return view('books.edit', ['book' => $book, 'authors' => $authors, 'publishers' => $publishers]);
    }

    public function update($id)
    {
        $data = $_POST;
        
        $this->db->update(
            "UPDATE books SET title = ?, copyright = ?, edition = ?, pages = ?, language = ?, author_id = ?, publisher_id = ? WHERE id = ?",
            [$data['title'], $data['copyright'], $data['edition'], $data['pages'], $data['language'], $data['author_id'], $data['publisher_id'], $id]
        );

        header('Location: /books');
        exit;
    }
}

