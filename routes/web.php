<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;

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
});

//Routes


//Admin Routes
// Route::view('/admin/dashboard','/admin/plantilla/layout');
// Route::view('/admin/artists/create','/admin/artists/create');
// Route::view('/admin/artists','/admin/artists/list');
// Route::view('/admin/categories/create','/admin/categories/create');
// Route::view('/admin/categories','/admin/categories/list');
// Route::view('/admin/events/create','/admin/events/create');
// Route::view('/admin/events','/admin/events/list');
// Route::view('/admin/places/create','/admin/places/create');
// Route::view('/admin/places','/admin/places/list');
// Route::view('/admin/promotions/create','/admin/promotions/create');
// Route::view('/admin/promotions','/admin/promotions/list');
// Route::view('/admin/purchases/create','/admin/purchases/create');
// Route::view('/admin/purchases','/admin/purchases/list');
// Route::view('/admin/reviews/create','/admin/reviews/create');
// Route::view('/admin/reviews','/admin/reviews/list');
// Route::view('/admin/seats/create','/admin/seats/create');
// Route::view('/admin/seats','/admin/seats/list');
// Route::view('/admin/tickets/create','/admin/tickets/create');
// Route::view('/admin/tickets','/admin/tickets/list');
// Route::view('/admin/users/create','/admin/users/create');
// Route::view('/admin/users','/admin/users/list');
// Route::view('/login','/login/index');

Route::get('/categories',[categoriesController::class ,'index']);
Route::get('/categories/create',[categoriesController::class , 'create']);
Route::post('/categories',[categoriesController::class,'store']);
Route::get('/categories/editar/{id}',[categoriesController::class,'edit']);
Route::put('/categories/{id}',[categoriesController::class,'update']);
Route::get('/categories/mostrar/{id}',[categoriesController::class,'show']);
Route::delete('/categories/{id}',[categoriesController::class,'destroy']);

// Route::get('/artist',[artistController::class ,'index']);
// Route::get('/artist/create',[artistController::class , 'crear']);
// Route::post('/artist',[artistController::class,'guardar']);
// Route::get('/artist/editar/{id}',[artistController::class,'editar']);
// Route::put('/artist/{id}',[artistController::class,'actualizar']);
// Route::get('/artist/mostrar/{id}',[artistController::class,'mostrar']);
// Route::delete('/artist/{id}',[artistController::class,'borrar']);
