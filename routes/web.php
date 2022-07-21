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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

######################
// all Data
Route::get("/allfiles" , 'FileController@index')->name("file.index");
// to create
Route::get("/file-create" ,'FileController@create')->name("file.create");
// to store Date
Route::post("/file-store" ,'FileController@store')->name("file.store");
// to edit
Route::get("/file-edit/{id}" ,'FileController@edit')->name("file.edit");
// to update Date
Route::post("/file-edit/{id}" ,'FileController@update')->name("file.update");
// Delete
Route::get("/file-delete/{id}",'FileController@destroy')->name("file.destroy");
// to show
Route::get("/file-show/{id}" ,'FileController@show')->name("file.show");
//Download
Route::get("/file-download/{id}",'FileController@download')->name("file.download");
