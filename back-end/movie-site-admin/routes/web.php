<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovieController;

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

Route::get('/',function(){
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/',function(){
        return view('admin.dashboard');
    })->name('dashboard');


    // Admins Management
    Route::prefix('admin')->group(function () {
    // Admins Management
    Route::get('/management',[AdminController::class,'showManagement'])->name('admin#management');
    Route::get('/delete/{id}',[AdminController::class,'deleteData'])->name('admin#deleteData');
    Route::get('/edit/{id}',[AdminController::class,'editPage'])->name('admin#editPage');
    Route::post('/insert',[AdminController::class,'insertData'])->name('admin#insertData');
    Route::post('/update/{id}',[AdminController::class,'updateData'])->name('admin#update');

    });


    // Movies Management
    Route::prefix('movie')->group(function () {
        Route::get('/management',[MovieController::class,'showManagement'])->name('movie#management');
        Route::get('/list',[MovieController::class,'showList'])->name('movie#list');
        Route::get('/delete/{id}',[MovieController::class,'deleteData'])->name('movie#delete');
        Route::post('/search',[MovieController::class,'searchData'])->name('movie#search');
        Route::post('/insert',[MovieController::class,'insertData'])->name('movie#insertData');
    });
});

