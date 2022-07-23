<?php


namespace App\Http\View\Composers;


use App\Models\Genre;
use Illuminate\View\View;

class GenreComposer
{
    public function compose(View $view)
    {
        $view->with('genres', Genre::latest()->get());
    }
}
