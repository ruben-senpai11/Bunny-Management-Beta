<?php

use App\Http\Controllers\BunnyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\GestationController;
use App\Http\Controllers\MatingController;
use App\Http\Controllers\PalpationController;
use App\Http\Controllers\PlanificationController;
use App\Http\Controllers\Planifications;
use App\Http\Controllers\ReproductionController;
use App\Models\Gestation;
use App\Models\Palpation;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
 });

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard');
    })->name("home");

    Route::get('/list-bunny', [App\Http\Controllers\BunnyController::class, 'index'])->name("list-bunny");
    
    Route::get('/bunny-data/{id}', [App\Http\Controllers\BunnyController::class, 'showBunnyDataById'])->name("get-bunny-data");
    
    //edit bunny information
    Route::post('/edit-bunny', [BunnyController::class, 'editBunnyData'])->name("edit-bunny");

    Route::post('/delete-bunny-ajax', [BunnyController::class, 'deleteBunnyByIdWithAjax'])->name("delete-bunny-ajax");
    Route::post('/delete-bunny-data', [BunnyController::class, 'deleteBunnyById'])->name("delete-bunny");
    
    Route::get('/create-bunny', [BunnyController::class, 'render'])->name("create-bunny");
    Route::post('/create-bunny', [BunnyController::class, 'saveBabyBunny'])->name("create-bunny");
    Route::get('/get-list-bunny', [BunnyController::class, 'getBunnyData'])->name("get-list-bunny");
    Route::get('/get-bunnies-id', [BunnyController::class, 'getBunnyId'])->name("get-bunnies-id");

    Route::get('/planifications', [PlanificationController::class, 'render'])->name('planifications');
    Route::get('/get-planifications', [BunnyController::class, 'getBunnyId'])->name("get-planifications");

    Route::get('/matings', [MatingController::class, 'render'])->name('matings');
    Route::post('/matings', [MatingController::class, 'saveMating'])->name('matings');
    Route::get('/get-matings', [MatingController::class, 'getMatingData'])->name('get-matings');
    Route::post('/delete-mating-ajax', [MatingController::class, 'deleteMatingByIdWithAjax'])->name("delete-mating-ajax");

    Route::get('/palpations', [PalpationController::class, 'render'])->name('palpations');
    Route::post('/palpations', [PalpationController::class, 'savePalpation'])->name('palpations');
    Route::get('/get-mated-id', [PalpationController::class, 'getMatingId'])->name('get-mated-id');
    Route::get('/get-palpations', [PalpationController::class, 'getPalpationData'])->name('get-palpations');
    Route::post('/delete-palpation-ajax', [PalpationController::class, 'deletePalpationByIdWithAjax'])->name("delete-palpation-ajax");

    Route::get('/gestations', [GestationController::class, 'render'])->name('gestations');
    Route::post('/gestations', [GestationController::class, 'saveGestation'])->name('gestations');
    
    Route::get('/get-gestations', [GestationController::class, 'getGestationData'])->name('get-gestations');
    Route::post('/delete-gestation-ajax', [GestationController::class, 'deleteGestationByIdWithAjax'])->name("delete-gestation-ajax");
    Route::get('/get-gestateds', [GestationController::class, 'getGestatedData'])->name('get-gestateds');

    //Farmer Informations
    Route::get('/FarmerProfile', [FarmerController::class,'index'])->name('Farmer.profile');
    Route::post('/edit-user-info', [FarmerController::class, 'editBunnyData'])->name("edit-bunny");

});