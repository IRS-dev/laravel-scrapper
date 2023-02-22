<?php

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

Route::get('/dashboard/movies/export_excel', 'App\Http\Controllers\MoviesController@export_excel');
Route::get('/dashboard/movies/import', 'App\Http\Controllers\MoviesController@import');

Route::group(['prefix' => 'dashboard'], function() {
    Route::resource('/websites', 'App\Http\Controllers\WebsitesController');
    Route::resource('/categories', 'App\Http\Controllers\CategoriesController');
    Route::resource('/links', 'App\Http\Controllers\LinksController');
    Route::resource('/item-schema', 'App\Http\Controllers\ItemSchemaController');
    Route::resource('/movies', 'App\Http\Controllers\MoviesController');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
