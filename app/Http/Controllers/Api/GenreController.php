<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Genre::latest()->paginate(10);
    }

    public function movieIndexByGenre($id)
    {
        $genre = Genre::findOrFail($id);
        return $genre->movies()->where('is_published', '=', '1')->paginate(15);
    }
}
