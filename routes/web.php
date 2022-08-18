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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('profile');

// Users
Route::get('/users', function () {
    return view('users.index');
})->middleware(['auth'])->name('users');

Route::get('/user/create', function () {
    return view('users.form', ['id' => null]);
})->middleware(['auth'])->name('user_create');

Route::get('/user/{id}/edit', function ($id) {
    return view('users.form', ['id' => $id]);
})->middleware(['auth'])->name('user_edit');

Route::get('/user/{id}', function ($id) {
    return view('users.single', ['id' => $id]);
})->middleware(['auth'])->name('user_view');



// Route::get('/users', Users::class)->middleware(['auth'])->name('users');
// Route::get('/user/create', Users::class)->middleware(['auth'])->name('user_create');
// Route::get('/user/{id}/edit', Users::class)->middleware(['auth'])->name('user_edit');
// Route::get('/user/{id}', Users::class)->middleware(['auth'])->name('user_view');

require __DIR__.'/auth.php';
