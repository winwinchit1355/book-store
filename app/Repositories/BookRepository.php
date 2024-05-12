<?php

namespace App\Repositories;

use File;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function all() : Collection
    {
        return Book::with(['publisher','content_owner'])->orderByDesc('idx')->get();
    }

    public function find($id)
    {
        return $this->all()->find($id);
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $maxId = Book::max('idx');
            $data['book_uniq_idx'] = 'BOK' . str_pad($maxId+1, 4, '0', STR_PAD_LEFT);;
            $book = Book::create($data);
            if(!empty($data['cover_photo']))
            {
                $imagePath = Book::makeImage($data['cover_photo'], Book::IMAGE_PATH);
                $book->cover_photo= $imagePath;
                $book->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$e->getMessage()]));
        }
        return $book;
    }

    public function update($data, $book)
    {
        try {
            DB::beginTransaction();
            if(!empty($data['cover_photo'])) {
                $cover_photo = $data['cover_photo'];
                unset($data['cover_photo']);
            }
            $book->update($data);
            if(!empty($cover_photo))
            {
                $book->deleteImage($book->cover_photo); // delete old image;
                $imagePath = Book::makeImage($cover_photo, Book::IMAGE_PATH);
                $book->cover_photo= $imagePath;
            }
            $book->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$e->getMessage()]));
        }
        return $book;
    }

    public function softDelete($book)
    {
        $book->delete();
    }

}
