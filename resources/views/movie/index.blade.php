@extends('layouts.app')

@section('title')
    {{ __('movie.index_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>Movies CRUD Page</h1>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{ route('crud.movie.create') }}" class="btn btn-success">
                {{ __('movie.movie_actions_create') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Title</th>
                    <th scope="col">Is Published</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <th>{{ $movie->id }}</th>
                        <th>
                            <img src="{{ asset($movie->poster) }}" style="width: 150px; height: 150px">
                        </th>
                        <td>{{ $movie->title }}</td>
                        <td>
                            @if($movie->is_published == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>{{ $movie->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="col-6 my-1">
                                <a href="{{ route('crud.movie.edit', $movie) }}" class="btn btn-primary">{{ __('movie.movie_actions_edit') }}</a>
                            </div>
                            <div class="col-6 my-1">
                                <form action="{{ route('crud.movie.change.status', $movie) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary">@if($movie->is_published == 1){{ __('movie.movie_actions_change_status_unpublish') }}@else{{ __('movie.movie_actions_change_status_publish') }}@endif</button>
                                </form>
                            </div>
                            <div class="col-6 my-1">
                                <form action="{{ route('crud.movie.destroy', $movie) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('movie.movie_actions_delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $movies->links() }}
        </div>
    </div>
@endsection

