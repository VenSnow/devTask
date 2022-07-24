@extends('layouts.app')

@section('title')
    {{ __('movie.movie_edit_title') }} - {{ $movie->title }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('movie.movie_crud_page_title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.movie.update', $movie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('movie.form')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

