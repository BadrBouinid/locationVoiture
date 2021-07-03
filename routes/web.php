<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\UsersController;
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


Route::get('/',[CarController::class,'index'])->name('index');
Route::get('/cars/index',[CarController::class,'index'])->name('cars.index');
Route::get('/cars/show/{id}',[CarController::class,'show'])->name('cars.show');
Route::post('/add/car',[CarController::class,'store'])->name('cars.store');
Route::get('/edit/{id}/car',[CarController::class,'edit'])->name('cars.edit');
Route::post('/cars/update/{id}',[CarController::class,'update'])->name('cars.update');
Route::post('/cars/supprimer/{id}',[CarController::class,'destroy'])->name('cars.destroy');
Route::get('/commands/{id}/create',[CommandController::class,'create'])->name('commands.create');
Route::post('/commands/store',[CommandController::class,'store'])->name('commands.store');
Route::delete('/commands/{commandId}/{carId}/supprimer',[CommandController::class,'destroy'])->name('commands.destroy');
Route::get('/users/register', [App\Http\Controllers\UsersController::class, 'register'])->name('users.register');

Route::get('/users/login', [UsersController::class, 'login'])->name('users.login');
Route::get('/users/{id}/profile', [UsersController::class, 'show'])->name('users.profile');
Route::post('/auth',[UsersController::class,'auth'])->name('users.auth');
Route::post('/store',[UsersController::class,'store'])->name('users.store');
Route::post('/logout',[UsersController::class,'logout'])->name('users.logout');
Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
