<?php
namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->bookService->getAllBooks());
    }

    public function store(Request $request): JsonResponse
    {
        $book = $this->bookService->createBook($request->all());
        return response()->json($book, 201);
    }

    public function show(string $id): JsonResponse
    {
        $book = $this->bookService->getBookById($id);
        return response()->json($book);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $book = $this->bookService->updateBook($id, $request->all());
        return response()->json($book);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->bookService->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully'], 204);
    }
}
