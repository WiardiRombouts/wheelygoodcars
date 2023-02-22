<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
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
})->name('home');

Route::middleware('auth')->group(function () {
    
    // GET Routes

    // Cars:
    Route::get('/cars/show', [CarController::class, 'show_all_cars_page'])->name('show_all_cars_page');
    Route::get('/cars/offer/post', [CarController::class, 'show_post_offer_page'])->name('show_post_offer_page');
    Route::get('/cars/offer/post/new/{license_plate}', [CarController::class, 'show_new_offer_page'])->name('show_new_offer_page');


    // POST Routes

    // Cars: 
    
    Route::post('/cars/offer/post/process', [CarController::class, 'process_new_offer'])->name('process_new_offer');
    Route::post('/cars/offer/post/license-plate', [CarController::class, 'submit_license_plate'])->name('submit_license_plate');

});

require __DIR__.'/auth.php';
