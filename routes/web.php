<?php

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('newUser', [App\Http\Controllers\HomeController::class, 'newUser'])->name('newUser');

Route::post('createUser',[App\Http\Controllers\HomeController::class, 'createUser'])->name('createUser');

Route::get('edituser/{id}', [App\Http\Controllers\HomeController::class, 'edituser'])->name('edituser');

Route::post('updateuser/{id}', [App\Http\Controllers\HomeController::class, 'updateuser'])->name('updateuser');

Route::get('deleteuser/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->name('deleteuser');

Route::delete('deleteAll', [App\Http\Controllers\HomeController::class, 'deleteAll'])->name('deleteAll');

