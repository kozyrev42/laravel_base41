<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
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

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');


Route::get('/create', [PostController::class, 'create']);

Route::get('/update', [PostController::class, 'update']);

Route::get('/delete', [PostController::class, 'delete']);

Route::get('/firstorcreate', [PostController::class, 'firstOrCreate']);
