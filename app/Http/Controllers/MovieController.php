<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $movieService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = Movie::latest()->paginate(15);
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();
        $movie = Movie::create(array_merge($data, ['poster' => $this->movieService->savePosterOrSetDefault($request)]));
        $movie->genres()->attach($request->genres);
        return redirect()->route('crud.movie.index')->with('success', __('movie.movie_success_create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();
        $movie->update(array_merge($data, ['poster' => $this->movieService->savePosterOrSetDefault($request, $movie)]));
        $movie->genres()->attach($request->genres);
        return redirect()->route('crud.movie.index')->with('success', __('movie.movie_success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        $this->movieService->deleteMovieWithPoster($movie);
        return redirect()->route('crud.movie.index')->with('success', __('movie.movie_success_delete'));
    }

    public function changeStatusOfPublication(Movie $movie)
    {
        $this->movieService->changeStatus($movie);
        return redirect()->route('crud.movie.index')->with('success', __('movie.movie_success_changed_status'));
    }
}
