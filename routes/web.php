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


// Only authenticated user will be able to view posts

//Route::group(['middleware' => 'auth'], function () {
//   Route::resource('/posts', 'App\Http\Controllers\PostController');
//});

Auth::routes();
Route::get('/home', function(){
    return redirect('/posts');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');




Route::get('/delete-blank-post', [App\Http\Controllers\PostController::class, 'deleteBlank']);
Route::get('/posts-archive', [App\Http\Controllers\PostController::class, 'archive']);
Route::get('/posts/{id}/restore', [App\Http\Controllers\PostController::class, 'restore']);
Route::resource('/posts', App\Http\Controllers\PostController::class);
Route::resource('/comments', App\Http\Controllers\CommentController::class);




