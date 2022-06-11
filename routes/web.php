<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/songs', [SongController::class, 'index']);
Route::get('/update-song-form/{id}', [SongController::class, 'showUpdateForm']);
Route::post('/save-changes', [SongController::class, 'updateSongRecord']);
Route::get('/new-song-entry', [SongController::class, 'addSongForm']);
Route::post('/save-new-entry', [SongController::class, 'saveNewEntry']);
Route::get('/delete-song/{id}', [SongController::class, 'deleteSong']);

