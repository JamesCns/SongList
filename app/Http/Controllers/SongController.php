<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;


class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $songs = Song::all();

        return view('songs', compact('songs'));
    }

    public function showUpdateForm ($id)
    {
        $song = Song::find($id);
        return view('update-song-form', compact('song'));
    }

    public function updateSongRecord (Request $request)
    {
        $validate = $request->validate([
            'song_title' => ['required', 'string', 'max:50'], 
            'artist' => ['required', 'string', 'max:50'],
            'genre' => ['required', 'string', 'max:50'],
            'composer' => ['required', 'string', 'max:50'],
            'year_released' => ['required', 'string', 'max:4'],
        ]);

        $id = $request->id;
        $song = Song::find($id);

        $result = $song->update([
            'song_title' => $request->song_title, 
            'artist' => $request->artist,
            'genre' => $request->genre,
            'composer' => $request->composer,
            'year_released' => $request->year_released
        ]);

        if ($result == false) {
            $request->session()->flash('error', 'Unable to update the song.');
        } else {
            $request->session()->flash('message', 'Successfully updated the record');
        }
        
        return redirect('/songs');
    }

    public function addSongForm()
    {
        return view('/new-song-entry');
    }

    public function saveNewEntry (Request $request)
    {
        $validate = $request->validate([
            'song_title' => ['required', 'string', 'max:50'], 
            'artist' => ['required', 'string', 'max:50'],
            'genre' => ['required', 'string', 'max:50'],
            'composer' => ['required', 'string', 'max:50'],
            'year_released' => ['required', 'string', 'max:4'],
        ]);

        $song_title = $request->song_title;
        $artist = $request->artist;
        $genre = $request->genre;
        $composer = $request->composer;
        $year_releared = $request->year_released;

        $song = Song::create([
            'song_title' => $song_title, 
            'artist' => $artist,
            'genre' => $genre,
            'composer' => $composer,
            'year_released' => $year_released
        ]);

        if (!is_null($song)){
            $request->session()->flash('message', 'Successfully added a new song.');
        }
        else {
            $request->session()->flash('message', 'Failed to add a song');
        }

        return redirect('/songs');
    }

    public function deleteSong (Request $request, $id)
    {
        $song = Song::find($id);

        if (!is_null($song)) {
            $song->delete();
            $request->session()->flash('message', 'Record Successfully deleted.');
        } else {
            $request->session()->flash('error', 'Failed to delete song record.');
        }

        return redirect('/songs');
    }
}
