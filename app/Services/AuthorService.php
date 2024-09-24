<?php
namespace App\Services;

use App\Models\Author;

class AuthorService
{
    public function getAllAuthors()
    {
        return Author::all();
    }

    public function createAuthor($data)
    {
        return Author::create($data);
    }

    public function getAuthorById(string $id)
    {
        return Author::findOrFail($id);
    }

    public function updateAuthor(string $id, $data)
    {
        $author = Author::findOrFail($id);
        $author->update($data);
        return $author;
    }

    public function deleteAuthor(int $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
    }
}
