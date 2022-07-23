<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input
        type="text"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        value="@if(isset($genre))@if($genre->title && !old('title')){{ $genre->title }}@endif @else{{ old('title') }}@endif"
        required>
    @error('title')
        <div id="validationServer05Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


