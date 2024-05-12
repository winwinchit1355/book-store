<?php

namespace App\Repositories\Interfaces;

Interface BookRepositoryInterface {
    public function all();
    public function find($id);
    public function store($data);
    public function update($data, $book);
    public function softDelete($book);
}