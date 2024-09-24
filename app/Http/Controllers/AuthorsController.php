<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(): JsonResponse
    {
        $authors = $this->authorService->getAllAuthors();
        return response()->json($authors);
    }

    public function store(Request $request): JsonResponse
    {
        $author = $this->authorService->createAuthor($request->all());
        return response()->json($author, 201);
    }

    public function show(string $id): JsonResponse
    {
        $author = $this->authorService->getAuthorById($id);
        return response()->json($author);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $author = $this->authorService->updateAuthor($id, $request->all());
        return response()->json($author);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->authorService->deleteAuthor($id);
        return response()->json(['message' => 'Author deleted successfully'], 204);
    }
}
