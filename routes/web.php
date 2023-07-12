<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;

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
    return redirect('/cars');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/cars', function () {
    return view('cars', ['cars' => \App\Models\Car::all(),'spaces' => \App\Models\Space::all()]);
    });

Route::get('/map/{id}/', function ($id) {
    return view('map', ['space' => \App\Models\Space::find($id)]);
})->name('map');

Route::post('spaces/updateSpace/{id}',[SpaceController::class, 'updateSpace']);