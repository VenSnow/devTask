@extends('layouts.app')

@section('title')
    @if(isset($genre))
        {{ $genre->title }}
    @else
        {{ __('index.title') }}
    @endif
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
                                    <li class="list-group-item @if(isset($genre)) @if($genre->id == $secondGenre->id) text-bg-primary @endif @endif">
                                        <a href="{{ route('movies.by.genre', $secondGenre) }}" class="text-decoration-none @if(isset($genre)) @if($genre->id == $secondGenre->id) text-white @endif @endif">
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
                        {{ __('index.movies') }}
                    </h2>
                    <div class="row">
                        @foreach($movies as $movie)
                            <div class="col-sm-6 col-md-3 my-2">
                                <div class="card" style="height: 25rem">
                                    <img src="{{ $movie->poster }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->title }}</h5>
                                        <p class="card-text">
                                            {{ __('movie.movie_card_genres') }}
                                            @foreach($movie->genres as $secondGenre)
                                                <a href="{{ route('movies.by.genre', $secondGenre) }}">
                                                    {{ $secondGenre->title }}
                                                </a> @if(!$loop->last),@endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('movie.show', $movie) }}" class="btn btn-success text-white">{{ __('movie.movie_card_show') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                {{ $movies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
