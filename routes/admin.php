<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('admin');

    // Route::get('/profile', function () {
    //     return view('profile');
    // })->name('admin.profile');

    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::post('/profile/create',[ProfileController::class, 'createProfile'])->name('createProfile');


    Route::get('/settings', function () {
        return view('profile');
    })->name('admin.settings');


});
