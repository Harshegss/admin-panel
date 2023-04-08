<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Heading;
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
    $home = Heading::where('page', 'home')->get()->toArray();
    $home = array_filter(array_merge(array(0), $home));
    return view('welcome', compact('home'));
});
Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/dashboard/sign-in', [AdminController::class, 'login']);
Route::post('login_check', [AdminController::class, 'login_check']);
Route::get('/dashboard/logout', [AdminController::class, 'logout']);

Route::post('flight-update/{flighttype}/{flightkey}', [AdminController::class, 'flight_update']);
