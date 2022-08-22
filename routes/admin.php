<?php
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('admin');

    Route::get('/profile', function () {
        return view('profile');
    })->name('admin.profile');

    Route::get('/settings', function () {
        return view('profile');
    })->name('admin.settings');

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('admin.users');
});
