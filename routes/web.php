<?php

use App\Http\Controllers\CoordController;
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
});

Route::get('/map', function () {
    return view('app');
});

Route::post('/getCoord', [CoordController::class, 'getCoordinates']);
Route::post('/addCoord', [CoordController::class, 'store']);
