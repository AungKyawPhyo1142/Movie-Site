<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*---------------------------- Movies API ----------------------------*/
Route::prefix('movies')->group(function () {
    Route::get('all',[MovieController::class,'getAllMovies']);
    Route::get('posters/all',[MovieController::class,'getAllMoviePosters']);
    Route::post('detail',[MovieController::class,'getDetailMovie']);
    Route::post('search',[MovieController::class,'searchMovie']);

});
