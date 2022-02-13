<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users/logout', [AuthController::class, 'logout']);
    Route::get('users/login_userdata', [AuthController::class, 'login_userdata']); 
});

Route::resource('users',AuthController::class);
Route::resource('movie',MovieController::class);

Route::post('users/login', [AuthController::class, 'loginuser']);
Route::post('movie/keywords', [MovieController::class, 'searchMovie']);