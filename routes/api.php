<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Categories
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);

// Menus
Route::resource('/menus', \App\Http\Controllers\MenuController::class);
Route::get('/menus/search/{name}', [\App\Http\Controllers\MenuController::class, 'search']);

// Menu Items
Route::resource('/menu-items', \App\Http\Controllers\MenuItemController::class);

// Tables
Route::resource('/tables', \App\Http\Controllers\TableController::class);

// Registration, auth, logout
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/users/authenticate', [\App\Http\Controllers\UserController::class, 'authenticate'])->name('login');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
