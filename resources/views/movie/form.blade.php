<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input
        type="text"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        value="@if(isset($movie))@if($movie->title && !old('title')){{ $movie->title }}@endif @else{{ old('title') }}@endif"
        required>
    @error('title')
    <div id="validationServer05Feedback" class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
@if(isset($movie))
<div class="mb-1">
    <p>Old Image</p>
    <img src="{{ asset($movie->poster) }}" class="img-thumbnail mx-auto" style="height: 300px; width: 250px">
</div>
@endif
<div class="mb-3">
    <label for="poster" class="form-label">Poster</label>
    <input class="form-control" type="file" name="poster" id="poster">
</div>
<div class="mb-3">
    <label for="genresSelect" class="form-label">Select genres</label>
    <select class="form-select" size="5" name="genres[]" multiple aria-label="multiple select example" id="genresSelect">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}"
                    @if(isset($movie))
                        @foreach($movie->genres as $movieGenre)
                            @if($genre->id == $movieGenre->id)
                                selected
                            @endif
                        @endforeach
                    @endif>
                {{ $genre->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3 form-check form-switch">
    <label for="is_published" class="form-check-label">Is Published</label>
    <input
        type="checkbox"
        role="switch"
        name="is_published"
        class="form-check-input"
        id="is_published"
        value="1"
        @if(isset($movie))
            @if($movie->is_published)
                checked
            @endif
        @endif
        >
</div>
