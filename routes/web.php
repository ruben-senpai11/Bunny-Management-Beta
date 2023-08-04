<?php

use App\Http\Controllers\BunnyController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

    Route::get('/create-bunny', [BunnyController::class, 'render'])->name("create-bunny");
    Route::post('/create-bunny', [BunnyController::class, 'saveBabyBunny'])->name("create-bunny");
    Route::get('/get-list-bunny', [BunnyController::class, 'getBunnyData'])->name("get-list-bunny");
    Route::get('/get-bunnies-id', [BunnyController::class, 'getBunnyId'])->name("get-bunnies-id");
 });


Route::get('/test', function () {
    return view('auth.register1');
});

