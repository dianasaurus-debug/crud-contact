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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'getAbout'])->name('about');
Route::delete('/messages/delete/{id}', 'App\Http\Controllers\MessagesController@destroyMessage')->name('destroy-message');
Route::get('/profile/edit/{id}', 'App\Http\Controllers\ProfileController@edit')->name('edit-profile');
Route::patch('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('update-profile');
Route::get('/contact', 'App\Http\Controllers\MessagesController@create');
Route::post('/contact/submit', 'App\Http\Controllers\MessagesController@submit')->name('submit-contact');
Route::get('/messages', 'App\Http\Controllers\MessagesController@getMessages');
Route::get('/messages/export', 'App\Http\Controllers\MessagesController@export')->name('export-pdf');



