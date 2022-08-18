<?php

use App\Http\Livewire\Users\Form;
use App\Http\Livewire\Users\Index;
use App\Http\Livewire\Users\Single;
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
Route::get('/users', Index::class)->middleware(['auth'])->name('users');
Route::get('/user/create', Form::class)->middleware(['auth'])->name('user_create');
Route::get('/user/{id}/edit', Form::class)->middleware(['auth'])->name('user_edit');
Route::get('/user/{id}', Single::class)->middleware(['auth'])->name('user_view');

require __DIR__.'/auth.php';
