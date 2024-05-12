<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publisher';
    protected $primaryKey = "idx";
    protected $fillable = [
        'name',
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
