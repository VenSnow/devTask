<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('index')) active @endif" href="{{ route('index') }}">{{ __('navbar.index_page') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('crud.genre.index')) active @endif" href="{{ route('crud.genre.index') }}">{{ __('navbar.genres_page') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('crud.movie.index')) active @endif" href="{{ route('crud.movie.index') }}">{{ __('navbar.movies_page') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
