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
        return Book::orderByDesc('created_timetick')->get();
    }

    public function find($id)
    {
        return $this->all()->find($id);
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $book = Book::create($data);
            if (!empty($data['path']) ) {
                $file=$data['path'];
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $imagePath = Book::IMAGE_PATH.'/'.$fileName;

                $file->move(public_path(Book::IMAGE_PATH), $fileName);
                $book->path = $imagePath;
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
            $book->update($data);

            if(!empty($data['file']))
            {
                $path=public_path(\App\Helpers\common::getImageSrc($book->path));;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file=$data['file'];
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $imagePath = Book::IMAGE_PATH.'/'.$fileName;

                $file->move(public_path(Book::IMAGE_PATH), $fileName);

                $book->path = $imagePath;
                $book->save();
            }
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

    public function forceDelete($book)
    {
        $book->forceDelete();
    }

}
