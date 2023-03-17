<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\AboutController;
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
    return view('layouts.layout');
});

// пример, с группировкой роутов
Route::group(['namespace' => 'App\Http\Controllers\Post'],function () {
    Route::get('/posts', 'IndexController')->name('post.index');
});

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');        // страница создания поста
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');               // экшен записи в бд
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');           // показ 1 поста
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');      // страница редактирования
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');     // экшен редактирования
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/firstorcreate', [PostController::class, 'firstOrCreate']);


Route::get('/about', [AboutController::class, 'index'])->name('about.index');               // роут на страницу About
