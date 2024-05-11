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

//Controlador de productos
Route::get('/categories',[categoriesController::class,'index'])->name('categories.index');



Route::middleware('auth:sanctum')->group(function () 
{
    Route::post('/auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/auth/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/categories',[categoriesController::class,'store'])->name('categories.store');
    Route::get('/categories/{id}',[categoriesController::class,'show'])->name('categories.show');
    Route::put('/categories/{id}',[categoriesController::class,'update'])->name('categories.update');
    Route::delete('/categories/{id}',[categoriesController::class,'destroy'])->name('categories.destroy');
});
