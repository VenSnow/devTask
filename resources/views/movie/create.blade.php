@extends('layouts.app')

@section('title')
    {{ __('movie.movie_create_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('movie.movie_actions_create') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('movie.form')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

