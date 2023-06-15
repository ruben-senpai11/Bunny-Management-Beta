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

Route::get('/', function () {
    return view('pages.dashboard');
})->name("home");


Route::get('/list-animals', function () {
    return view('pages.list-animals');
})->name("list-animals");

Route::get('/animals-create', function () {
    return view('pages.animals-create');
})->name("animals-create");