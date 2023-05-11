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

Route::get('/cars/show', [CarController::class, 'show_all_cars_page'])->name('show_all_cars_page');


Route::middleware('auth')->group(function () {

    // GET Routes

    // Cars:
    Route::get('/cars/new/step_1', [CarController::class, 'show_new_license_plate_page'])->name('show_new_license_plate_page');
    Route::get('/cars/new/step_2/new/{license_plate}', [CarController::class, 'show_new_car_form'])->name('multistep_form_step_2');
    Route::get('/cars/show/details/{car_id}', [CarController::class, 'car_details'])->name('car_details');
    Route::get('/cars/show/personal', [CarController::class, 'show_personal_cars'])->name('show_personal_cars');


    // POST Routes

    // Cars: 
    
    Route::post('/cars/new/post/process', [CarController::class, 'process_new_car'])->name('process_new_car');
    Route::post('/cars/new/post/license-plate', [CarController::class, 'submit_license_plate'])->name('submit_license_plate');

    Route::delete('/cars/{car_id}/destroy', [CarController::class, 'destroy'])->name('car.destroy');
});

require __DIR__ . '/auth.php';
