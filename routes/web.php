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


Route::get('/', function () {
    return view('index');
});
*/
Auth::routes();

Route::get('/','FrontController@home')->name('home');
Route::get('/blog','FrontController@blog')->name('blog');
Route::get('/contacto','FrontController@contact')->name('contact');
/*
Route::get('/posts','PostController@index')->name('posts');
Route::post('/posts','PostController@store')->name('posts.store');
Route::get('/posts/create','PostController@create')->name('posts.create');
Route::get('/posts/{id}/edit','PostController@edit')->name('posts.edit');
Route::put('/posts/{id}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');
*/

Route::resource('/posts', 'PostController', ['names' => [
    'index'=>'posts',
    'create'=>'posts.create',
    'store'=>'posts.store',
    'edit'=>'posts.edit',
    'update'=>'posts.update',
    'destroy'=>'posts.destroy'

]]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
