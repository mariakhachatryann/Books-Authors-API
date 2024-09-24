<?php
namespace App\Services;

use App\Models\Book;

class BookService
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function createBook($data)
    {
        $book = new Book();
        $book->fill($data);
        $book->save();
        $book->authors()->attach($data['author_id']);
        return $book;
    }

    public function getBookById(string $id)
    {
        return Book::findOrFail($id);
    }

    public function updateBook(string $id, $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        $book->authors()->sync($data['author_id']);
        return $book;
    }

    public function deleteBook(int $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}
