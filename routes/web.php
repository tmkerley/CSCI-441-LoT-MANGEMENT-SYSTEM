<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\CarController;
use Yajra\DataTables\Facades\DataTables;

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
    return redirect('cars');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/map/{id}/', function ($id) {
    return view('map', ['space' => \App\Models\Space::find($id)]);
})->name('map');

Route::post('spaces/updateSpace/{id}',[SpaceController::class, 'updateSpace']);

Route::post('cars/registerMove/{id}',[CarController::class, 'registerMove']);
Route::post('cars/registerPark/{id}', [CarController::class, 'registerPark']);
Route::post('cars/registerPark/confirmPark/{id}', [CarController::class, 'confirmPark']);