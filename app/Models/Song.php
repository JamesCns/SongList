<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'song_title',
        'artist',
        'genre',
        'composer',
        'year_released',
    ];

    public function getID (){
        return $this->id;
    }

    public function getSongTitle (){
        return $this->song_title;
    }

    public function getArtist (){
        return $this->artist;
    }

    public function getGenre (){
        return $this->genre;
    }

    public function getComposer (){
        return $this->composer;
    }

    public function getYearReleased (){
        return $this->year_released;
    }

    public function setSongTitle ($value){
        $this->song_title = $value;
        return $this->save();
    }

    public function setArtist ($value){
        $this->artist = $value;
        return $this->save();
    }

    public function setGenre ($value){
        $this->genre = $value;
        return $this->save();
    }

    public function setComposer ($value){
        $this->composer = $value;
        return $this->save();
    }

    public function setYearReleased ($value){
        $this->year_released = $value;
        return $this->save();
    }
}
