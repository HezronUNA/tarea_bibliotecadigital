<?php

namespace App\Controllers;

class AuthorsController
{
    private $authors = [
        [
            'id' => 1,
            'author' => 'Abraham Silberschatz',
            'nationality' => 'Israeli / American',
            'birth_year' => 1952,
            'fields' => 'Database Systems, Operating Systems',
            'books' => [
                ['book_id' => 1, 'title' => 'Operating System Concepts'],
                ['book_id' => 2, 'title' => 'Database System Concepts'],
            ]
        ],
        [
            'id' => 2,
            'author' => 'Andrew S. Tanenbaum',
            'nationality' => 'Dutch / American',
            'birth_year' => 1944,
            'fields' => 'Distributed computing, Operating Systems',
            'books' => [
                ['book_id' => 3, 'title' => 'Computer Networks'],
                ['book_id' => 4, 'title' => 'Modern Operating Systems'],
            ]
        ],
    ];

    public function index()
    {
        $authors = $this->authors;
        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = collect($this->authors)->firstWhere('id', (int)$id);
        
        if (!$author) {
            return view('404');
        }

        return view('authors.show', ['author' => $author]);
    }
}
