<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    Route::get('/management',[AdminController::class,'showManagement'])->name('admin#management');
    Route::get('admin/delete/{id}',[AdminController::class,'deleteData'])->name('admin#deleteData');
    Route::get('admin/edit/{id}',[AdminController::class,'editPage'])->name('admin#editPage');

    Route::post('/admin/insert',[AdminController::class,'insertData'])->name('admin#insertData');
    Route::post('/admin/update/{id}',[AdminController::class,'updateData'])->name('admin#update');
});

