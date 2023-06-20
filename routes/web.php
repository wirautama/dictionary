<?php

use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

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
    return view('search-form');
});

Route::post('/search', [WordController::class, 'search'])->name('word.search');
Route::post('/save-search', [WordController::class, 'saveSearch'])->name('word.saveSearch');
Route::get('/search-history', [WordController::class, 'searchHistory'])->name('word.searchHistory');
Route::get('/search-history/detail/{id}', [WordController::class, 'detailHistory'])->name('word.detailHistory');
Route::get('/search-history/delete/{id}', [WordController::class, 'deleteHistory'])->name('word.deleteHistory');
