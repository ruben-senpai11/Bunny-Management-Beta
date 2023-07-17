<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth/google', [App\Http\Controllers\SocialiteController::class, 'redirect']);

Route::get('/auth/google/callback', [App\Http\Controllers\SocialiteController::class, 'callback']);

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
 });

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard');
    })->name("home");

    Route::get('/list-bunny', function () {
        return view('pages.bunny-list');
    })->name("list-bunny");

    Route::get('/create-bunny', function () {
        return view('pages.bunny-create');
    })->name("create-bunny");
 });


Route::get('/test', function () {
    return view('auth.register1');
});

