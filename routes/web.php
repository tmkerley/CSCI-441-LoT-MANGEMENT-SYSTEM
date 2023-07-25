<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {return redirect('/login');})->middleware('RDfromRoot');

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('map/{id}/', function ($id) {
    return view('map', ['space' => \App\Models\Space::find($id)]);
})->middleware('auth')->name('map');

//Cars
//Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('cars', [CarController::class, 'index'])->name('cars.index')->middleware('auth');
Route::post('/cars', [CarController::class, 'create'])->name('cars.create');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::post('cars/registerMove/{id}',[CarController::class, 'registerMove'])->name('cars.registerMove')->middleware('auth');

Route::get('cars/registerPark/{id}', [CarController::class, 'registerPark'])->middleware('auth');
Route::post('cars/registerPark/{id}', [CarController::class, 'confirmPark'])->middleware('auth');

//Spaces
Route::get('spaces', [SpaceController::class, 'index'])->name('spaces.index');
Route::post('spaces', [SpaceController::class, 'create'])->name('spaces.create');
Route::get('spaces/{id}', [SpaceController::class, 'show'])->name('spaces.show');
Route::put('spaces/{id}', [SpaceController::class, 'update'])->name('spaces.update');
Route::delete('spaces/{id}', [SpaceController::class, 'destroy'])->name('spaces.destroy');



//Users

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Role Auth

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function() {

    Route::get('map/{id}/', function ($id) {
    return view('map', ['space' => \App\Models\Space::find($id)]);
    })->middleware('auth')->name('map');

    Route::post('cars/registerMove/{id}',[AdminController::class, 'registerMove'])->name('cars.registerMove')->middleware('auth');
    Route::get('cars/registerPark/{id}', [AdminController::class, 'registerPark'])->middleware('auth');
    Route::post('cars/registerPark/{id}', [AdminController::class, 'confirmPark'])->middleware('auth');

    Route::get('/cars', [AdminController::class, 'getCars'])->name('admin.cars')->middleware('auth');
    Route::get('/spaces', [AdminController::class, 'getSpaces'])->name('admin.spaces')->middleware('auth');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users')->middleware('auth');

    //edit
    Route::get('/edit/car/{id}', [AdminController::class, 'editCar'])->name('admin.edit.cars')->middleware('auth');
    Route::get('/edit/space/{id}', [AdminController::class, 'editSpace'])->name('admin.edit.space')->middleware('auth');
    Route::get('/edit/user/{id}', [AdminController::class, 'editUser'])->name('admin.edit.user')->middleware('auth');
});

      





