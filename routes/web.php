<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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
    return view('welcome');
});

Route::get('/route/find', [DataController::class,'find']);

Route::get('/route/find/criteria/{criteria}/{value}', [DataController::class,'findByCriteria']);
Route::get('/route/find/limit/{offset}/{limit}', [DataController::class,'findWithLimit']);
Route::get('/route/find/pagination/{pagination}', [DataController::class,'findWithPagination']);

