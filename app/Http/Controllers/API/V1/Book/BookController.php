<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookPostPutRequest;
use App\Models\Book;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $books = Book::with('topic', 'restrict')->orderBy('id', 'desc')->get();

            return response([
                'message' => 'Libros obtenidos correctamente',
                'success' => true,
                'books' => $books
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->errorResponse([
                'error' => $th->getMessage(),
                'code'=> Response::HTTP_BAD_REQUEST,
            ]);
        }
    }


    public function store(BookPostPutRequest $request)
    {
        try {
            $validated = $request->validated();

            $book = Book::create($validated);


            return response([
                'message' => 'El libro se guardo correctamente',
                'success' => true,
                'book' => Book::with('topic', 'restrict')->find($book->id)
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->errorResponse([
                'error' => $th->getMessage(),
                'code'=> Response::HTTP_BAD_REQUEST,
            ]);
        }
    }


    public function update(BookPostPutRequest $request, Book $book)
    {
        try {
            $validated = $request->validated();

            $book->fill($validated);

            if ($book->isClean()) return $this->errorResponse([
                'message' => 'Nada por actualizar',
                'code'=> Response::HTTP_FORBIDDEN,
            ]);

            $book->save();

            return response([
                'message' => 'Libro actualizado correctamente',
                'success' => true,
                'book' => Book::with('topic', 'restrict')->find($book->id)
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->errorResponse([
                'error' => $th->getMessage(),
                'code'=> Response::HTTP_BAD_REQUEST,
            ]);
        }
    }

    public function delete($id)
    {
        try{
            Book::findOrFail($id)->delete();
            return response([
                'message' => 'Libro eliminado correctamente',
                'success' => true,
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return $this->errorResponse([
                'error' => $th->getMessage(),
                'code'=> Response::HTTP_BAD_REQUEST,
            ]);
        }
    }
}
