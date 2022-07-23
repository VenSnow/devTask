@extends('layouts.app')

@section('title')
    {{ __('genre.genre_edit_title') }} - {{ $genre->title }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('genre.genre_crud_page_title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.genre.update', $genre) }}" method="POST">
                @csrf
                @method('PATCH')
                @include('genre.form')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

