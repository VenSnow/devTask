@extends('layouts.app')

@section('title')
    {{ __('genre.genre_create_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>{{ __('genre.genre_crud_page_title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('crud.genre.store') }}" method="POST">
                @csrf
                @include('genre.form')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

