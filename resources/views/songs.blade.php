@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <table class="table" id="songs-table" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Song Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Composer</th>
                    <th>Year Released</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $song)
                    <tr>
                        <td>{{ $song->getID() }}</td>
                        <td>{{ $song->getSongTitle() }}</td>
                        <td>{{ $song->getArtist() }}</td>
                        <td>{{ $song->getGenre() }}</td>
                        <td>{{ $song->getComposer() }}</td>
                        <td>{{ $song->getYearReleased() }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/update-song-form/{{ $song->getID() }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" onclick="return confirmDelete()" href="/delete-song/{{ $song->getID() }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a class="btn btn-primary" href="/new-song-entry" role="button">Add Song</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    var answer = confirm("Are you sure you want to delete this song record?");
    if (answer == true){
        return true;
    }
    return false; 
}

// $(document).ready(function () {
//     $('#friends-table').DataTable();
// });
 </script>

@endsection