@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

@section('app')
    <div class="py-5">
        <div class="row">
            <div class="col-2">
                <div class="row my-2">
                    <h2>
                        {{ __('index.genres') }}
                    </h2>
                    <div class="row">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($genres as $secondGenre)
                                    <li class="list-group-item">
                                        <a href="{{ route('movies.by.genre', $secondGenre) }}" class="text-decoration-none">
                                            {{ $secondGenre->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row my-2">
                    <h2>
                        {{ $movie->title }}
                    </h2>
                    <div class="row">
                        <div class="col my-2">
                            <div class="card">
                                <img src="{{ $movie->poster }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie->title }}</h5>
                                    <p class="card-text">
                                        {{ __('movie.movie_card_genres') }}
                                        @foreach($movie->genres as $genre)
                                            <a href="{{ route('movies.by.genre', $genre) }}">
                                                {{ $genre->title }}
                                            </a> @if(!$loop->last),@endif
                                        @endforeach
                                    </p>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('movie.show', $movie) }}" class="btn btn-success text-white">{{ __('movie.movie_card_show') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
