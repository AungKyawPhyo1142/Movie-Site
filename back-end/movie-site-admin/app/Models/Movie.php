<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'gdrive_link',
        'mdrive_link',
        'rating',
        'genre',
        'rated',
        'description',
        'created_at',
        'updated_at'

    ];
}
