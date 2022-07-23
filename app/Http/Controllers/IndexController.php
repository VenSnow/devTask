<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a index page of site with genres and movies.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $movies = Movie::with('genres')->where('is_published', '=', '1')->latest()->paginate(15);
        return view('index.index', compact('movies'));
    }

    public function indexByGenre(Genre $genre)
    {
        $movies = $genre->movies()->where('is_published', '=', '1')->paginate(15);
        return view('index.index', compact('movies', 'genre'));
    }

    public function show(Movie $movie)
    {
        return view('index.show', compact('movie'));
    }
}
