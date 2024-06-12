<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/user' , [UserController::class,'index']);
Route::get('/providers' , [ProviderController::class,'index']);

Route::post('/services' , [ServiceController::class,'store']);
Route::get('/service/{id}' , [ServiceController::class,'show']);

//Route::get('/admin' , [AdminController::class,'index']);

