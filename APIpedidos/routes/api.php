<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\artistController;
use App\Http\Controllers\placesController;
use App\Http\Controllers\eventsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\promotionsController;
use App\Http\Controllers\purchasesController;
use App\Http\Controllers\reviewsController;
use App\Http\Controllers\ticketsController;
use App\Http\Controllers\seatsController;
use App\Http\Controllers\loginController;

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

//Controlador de Categorias
Route::get('/categories',[categoriesController::class,'index'])->name('categories.index');
Route::post('/categories',[CategoriesController::class,'store'])->middleware('auth:sanctum')->name('categories.store');
Route::get('/categories/{id}',[CategoriesController::class,'show'])->middleware('auth:sanctum')->name('categories.show');
Route::put('/categories/{id}',[CategoriesController::class,'update'])->middleware('auth:sanctum')->name('categories.update');
Route::delete('/categories/{id}',[CategoriesController::class,'destroy'])->middleware('auth:sanctum')->name('categories.destroy');


//Autenticatcion
Route::post('/inicia-sesion',[loginController::class,'login'])->name('inicia-sesion');
Route::post('/validar-registro',[loginController::class,'registro'])->name('validar-registro');
Route::get('/logout',[loginController::class,'logout'])->name('logout');
