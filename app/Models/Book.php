<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category',
        'publication_year',
        'shelf_status',
    ];

    protected $casts = [
        'publication_year' => 'integer',
    ];
}