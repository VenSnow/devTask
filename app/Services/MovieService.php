<?php


namespace App\Services;


use App\Models\Movie;
use Illuminate\Http\Request;

class MovieService
{
    private $defaultPath = 'uploads/posters/default.jpg';
    public function savePosterOrSetDefault(Request $request, $movie = null): string
    {
        $defaultPath = $this->defaultPath;
        if ($request->file('poster')) {
            if ($movie) {
                if ($movie->poster && $movie->poster != $this->$defaultPath) {
                    unlink($movie->poster);
                }
            }
            $poster = $request->file('poster');
            $destinationPath = 'uploads/posters/movies/' . $request->title;
            $posterName = date('YmdHis') . rand(1, 13) . "." . $poster->getClientOriginalExtension();
            $poster->move($destinationPath, $posterName);
            return "$destinationPath/$posterName";
        }
        return $defaultPath;
    }

    public function deleteMovieWithPoster(Movie $movie): void
    {
        $defaultPath = $this->defaultPath;
        if ($movie->poster && $movie->poster != $defaultPath) {
            try {
                unlink($movie->poster);
            } catch (\Exception) {

            }

        }
        $movie->delete();
    }

    public function changeStatus(Movie $movie): void
    {
        if ($movie->is_published == 1) {
            $movie->is_published = 0;
            $movie->save();
        } else {
            $movie->is_published = 1;
            $movie->save();
        }
    }
}
