<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
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


Route::get('cars', [CarController::class, 'index'])->name('cars.index')->middleware('auth');

Route::get('map/{id}/', function ($id) {
    return view('map', ['space' => \App\Models\Space::find($id)]);
})->middleware('auth')->name('map');

//Cars
//Route::get('/cars', 'CarController@index')->name('cars.index');
//Route::post('/cars', 'CarController@create')->name('cars.create');
//Route::get('/cars/{id}', 'CarController@show')->name('cars.show');
//Route::put('/cars/{id}', 'CarController@update')->name('cars.update');
//Route::delete('/cars/{id}', 'CarController@destroy')->name('cars.destroy');

//Spaces
Route::get('spaces', [SpaceController::class, 'index'])->name('spaces.index');
Route::post('spaces', [SpaceController::class, 'create'])->name('spaces.create');
Route::get('spaces/{id}', [SpaceController::class, 'show'])->name('spaces.show');
Route::put('spaces/{id}', [SpaceController::class, 'update'])->name('spaces.update');
Route::delete('spaces/{id}', [SpaceController::class, 'destroy'])->name('spaces.destroy');

Route::post('cars/registerMove/{id}',[CarController::class, 'registerMove'])->middleware('auth');

Route::get('cars/registerPark/{id}', [CarController::class, 'registerPark'])->middleware('auth');
Route::post('cars/registerPark/{id}', [CarController::class, 'confirmPark'])->middleware('auth');

//Users

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Role Auth

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function() {
    Route::get('/cars', [AdminController::class, 'getCars'])->name('admin.cars');
    Route::get('/spaces', [AdminController::class, 'getSpaces'])->name('admin.spaces');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users');
});

      





