<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


class BookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/books",
     *     summary="Get list of books",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Book"))
     *     )
     * )
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * @OA\Post(
     *     path="/api/books",
     *     summary="Create a new book",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Book created",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     )
     * )
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/books/{id}",
     *     summary="Get a specific book",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     )
     * )
     */
    public function show(string $id)
    {
        return Book::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/books/{id}",
     *     summary="Update a specific book",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateBookRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book updated",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     )
     * )
     */
    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->validated());
        return response()->json($book);
    }

    /**
     * @OA\Delete(
     *     path="/api/books/{id}",
     *     summary="Delete a specific book",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="No content"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     )
     * )
     */
    public function destroy(string $id): void
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }

    /**
     * @OA\Get(
     *     path="/api/books/search",
     *     summary="Search books by title",
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Book"))
     *     )
     * )
     */
    public function search(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:1',
        ]);

        $title = $request->query('title');
        $books = Book::where('title', 'like', '%' . $title . '%')->get();

        if ($books->isEmpty()) {
            return response()->json(['message' => 'No books found'], 404);
        }

        return response()->json($books);
    }
}

