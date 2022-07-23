@extends('layouts.app')

@section('title')
    {{ __('genre.index_title') }}
@endsection

@section('app')
    <div class="row">
        <div class="col">
            <h1>Genres CRUD Page</h1>
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
            <a href="{{ route('crud.genre.create') }}" class="btn btn-success">
                {{ __('genre.genre_actions_create') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('genre.genre_title') }}</th>
                    <th scope="col">{{ __('genre.genre_created_at') }}</th>
                    <th scope="col">{{ __('genre.genre_actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <th>{{ $genre->id }}</th>
                        <td>{{ $genre->title }}</td>
                        <td>{{ $genre->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="col-6 my-1">
                                <a href="{{ route('crud.genre.edit', $genre) }}" class="btn btn-primary">{{ __('genre.genre_actions_edit') }}</a>
                            </div>
                            <div class="col-6 my-1">
                                <form action="{{ route('crud.genre.destroy', $genre) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('genre.genre_actions_delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $genres->links() }}
        </div>
    </div>
@endsection

