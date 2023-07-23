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

Route::get('/', function () {
    return view('pages.dashboard');
})->name("home");


Route::get('/list-bunny', function () {
    return view('pages.bunny-list');
})->name("list-bunny");

// Route::get('/create-bunnys

//Route::any('/create-bunny', BunnyController::class);


Route::get('/create-bunny', [BunnyController::class, 'render']);
Route::post('/create-bunny', [BunnyController::class, 'saveBabyBunny']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');