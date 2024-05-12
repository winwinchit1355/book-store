<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory ,ImageTrait;
    public $timestamps = false;
    const IMAGE_PATH = 'uploads/books/';
    protected $table = 'tbl_book';
    protected $primaryKey = "idx";
    protected $fillable = [
        'co_id',
        'publisher_id',
        'book_uniq_idx',
        'bookname',
        'cover_photo',
        'price',
    ];
    protected $dates = [
        'created_timetick',
    ];
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }
    public function content_owner()
    {
        return $this->belongsTo(ContentOwner::class,'co_id');
    }
}
