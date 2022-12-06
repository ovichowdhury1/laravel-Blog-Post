<?php

use App\Http\Controllers\backend\BlogController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/add-post', [BlogController::class, 'create'])->name('post.create');

Route::post('/store-post',[BlogController::class,'store'])->name('post.store');

Route::get('/All-Post',[BlogController::class,'index'])->name('post.all');

Route::get('/Edit-Post/{id}',[BlogController::class,'edit'])->name('post.edit');


Route::put('/update-Post/{id}',[BlogController::class,'update'])->name('post.update');

Route::delete('/delete-Post/{id}',[BlogController::class,'destroy'])->name('post.delete');
