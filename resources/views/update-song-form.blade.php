@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Update A Song</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-changes" method="POST">
                <input type="hidden" name="id" value="{{ $song->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Song Title</label>
                    <input type="text" class="form-control" name="song_title" value="{{ $song->getSongTitle() }}">
                </div>
                <div class="form-group">
                    <label>Artist</label>
                    <input type="text" class="form-control" name="artist" value="{{ $song->getArtist() }}">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" class="form-control" name="genre" value="{{ $song->getGenre() }}">
                </div>
                <div class="form-group">
                    <label>Composer</label>
                    <input type="text" class="form-control" name="composer" value="{{ $song->getComposer() }}">
                </div>
                <div class="form-group">
                    <label>Year Released</label>
                    <input type="string" class="form-control" name="year_released" value="{{ $song->getYearReleased() }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection