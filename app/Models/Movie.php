<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_published',
        'poster',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
}
