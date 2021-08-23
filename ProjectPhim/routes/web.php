<?php

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
use Illuminate\Support\Facades\Route;
// middleware : ở trung gian trc khi vào controller để check
Route::get('/','phimController@index')->name('trangchu.index');
Route::prefix('admin')->group(function () {
    Route::get('/view-category','CategoryController@index')->name('admin.index');
    Route::post('/create-category','CategoryController@store')->name('create.category');
    Route::post('/delete-category/{id}','CategoryController@destroy')->name('delete.category');
    Route::get('/get-category/{id}','CategoryController@getcate')->name('getcate.category');
    Route::post('/update-category/{id}','CategoryController@update')->name('update.category');
    Route::get('/view-film','FilmController@index')->name('view.listfilm');
    Route::get('/view-create-film','FilmController@create')->name('view-film.create');
    Route::post('/create-film','FilmController@store')->name('film.create');
    Route::post('/Delete-film/{id}','FilmController@destroy')->name('film.delete');
    Route::get('/view-update-film/{id}','FilmController@edit')->name('film.viewedit');
    Route::post('/update-film/{id}','FilmController@update')->name('film.update');
});
