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

    //show the page where all bunnies a displayed
    Route::get('/list-bunny', [App\Http\Controllers\BunnyController::class, 'index'])->name("list-bunny");
    
    //show a bunny informations by his id
    Route::get('/bunny-data/{id}', [App\Http\Controllers\BunnyController::class, 'showBunnyDataById'])->name("get-bunny-data");
    
    //edit bunny information

    //delete a bunny by his id
    Route::post('/delete-bunny-ajax', [BunnyController::class, 'deleteBunnyByIdWithAjax'])->name("delete-bunny-ajax");
    Route::post('/delete-bunny-data', [BunnyController::class, 'deleteBunnyById'])->name("delete-bunny");
    
    Route::get('/create-bunny', [BunnyController::class, 'render'])->name("create-bunny");
    Route::post('/create-bunny', [BunnyController::class, 'saveBabyBunny'])->name("create-bunny");
    Route::get('/get-list-bunny', [BunnyController::class, 'getBunnyData'])->name("get-list-bunny");
    Route::get('/get-bunnies-id', [BunnyController::class, 'getBunnyId'])->name("get-bunnies-id");
 });


Route::get('/test', function () {
    return view('pages.bunny-profile');
});

