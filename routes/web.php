<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'PostController@index')->name('index');

    Route::group(['prefix' => '{user}'], function () {
    Route::get('/edit','PostController@edit')->name('user.edit');
    Route::patch('/update','Postcontroller@update')->name('user.update');
    Route::get('/delete','PostController@delete')->name('user.delete');
    Route::delete('destroy','PostController@destroy')->name('user.destroy');
    });
});




require __DIR__.'/auth.php';
