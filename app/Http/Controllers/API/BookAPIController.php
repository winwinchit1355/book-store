<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookAPIController extends Controller
{
    use ResponseFormat;

    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository=$bookRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookRepository->all();

        return  $this->apiSuccessResponse($books,'Successfully',200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
