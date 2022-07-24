<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::latest()->where('is_published', '=', '1')->paginate(15);
    }

    public function show($id)
    {
        return Movie::findOrFail($id);
    }

}
