<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listItemController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [listItemController::class, 'index']);
Route::post('/saveItem', [listItemController::class, 'saveItem']);
Route::post('/complete', [listItemController::class, 'complete']);
