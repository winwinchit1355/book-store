<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\ContentOwner;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
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
        return view('admin.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        $content_owners = ContentOwner::all();
        return view('admin.books.create',compact('publishers','content_owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $this->bookRepository->store($request->all());

        return redirect()->route('books.index')->with('success', 'Book Create Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        $content_owners = ContentOwner::all();
        return view('admin.books.edit',compact('publishers','content_owners','book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->bookRepository->update($request->all(),$book);

        return redirect()->route('books.index')->with('success', 'Book Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->deleteImage($book->cover_photo);
        $this->bookRepository->softDelete($book);

        return redirect()->back()->with('success', 'Book Delete Successfully!');
    }
}
