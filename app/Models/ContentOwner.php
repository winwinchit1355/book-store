<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOwner extends Model
{
    use HasFactory;
    protected $table = 'content_owner';
    protected $fillable = [
        'name',
    ];
}
