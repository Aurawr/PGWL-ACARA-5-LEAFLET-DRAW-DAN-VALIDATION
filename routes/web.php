<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolylinesController;
use App\Http\Controllers\PolygonsController;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/map', [PagesController::class, 'map'])->name('map');

Route::get('/table', [PagesController::class, 'table'])->name('table');

//Point
Route::post('/store-points', [PointsController::class, 'store'])->name('points.store');
//Route hapus data point
Route::delete('/delete-points/{id}', [PointsController::class, 'destroy'])->name('points.delete');


//Polylines
Route::post('/store-polylines', [PolylinesController::class, 'store'])->name('polylines.store');
Route::delete('/delete-polylines/{id}', [PolylinesController::class, 'destroy'])->name('polylines.delete');

//Polygons
Route::post('/store-polygons', [PolygonsController::class, 'store'])->name('polygons.store');
Route::delete('/delete-polygons/{id}', [PolygonsController::class, 'destroy'])->name('polygons.delete');


Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard');


require __DIR__.'/settings.php';
