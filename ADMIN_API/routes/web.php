<?php

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;


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
Route::view('/cover','/cover/index');
Route::view('/product','/product/index');

Route::get('/categorias',[categoriesController::class, 'index'])->name('categorias.index');
Route::get('/categorias/crear',[categoriesController::class,'create'])->name('categorias.create');
Route::post('/categorias',[categoriesController::class,'store'])->name('categorias.store');
Route::get('/categorias/editar/{id}',[categoriesController::class,'edit'])->name('categorias.edit');
Route::put('/categorias/{id}',[categoriesController::class,'update'])->name('categorias.update');
Route::get('/categorias/mostrar/{id}',[categoriesController::class,'show'])->name('categorias.show');
Route::delete('/categorias/{id}',[categoriesController::class,'destroy'])->name('categorias.destroy');


Route::get('/productos',[eventsController::class, 'index'])->name('productos.index');
Route::get('/productos/crear',[eventsController::class,'create'])->name('productos.create');
Route::post('/productos',[eventsController::class,'store'])->name('productos.store');
Route::get('/productos/{id}/edit',[eventsController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}',[eventsController::class,'update'])->name('productos.update');
Route::get('/productos/{id}',[eventsController::class, 'show'])->name('productos.show');
Route::delete('/productos/{id}',[eventsController::class,'destroy'])->name('productos.destroy');

Route::get('login', [UserAuthController::class, 'login'])->name('user.login');
Route::get('out', [UserAuthController::class, 'out'])->name('user.out')->middleware('sesion');
Route::post('auth', [UserAuthController::class, 'auth'])->name('user.auth');
Route::post('register', [UserAuthController::class, 'register'])->name('user.register');

Route::resource('posts', PostController::class)->middleware('sesion');

// Route::get('/', function () {
//     return view('/welcome');
// });

// //Routes

// Route::view('/index','/admin/plantilla/index')->name('index');
// Route::view('/help','/admin/help/help')->name('help');

// Route::get('/categories',[categoriesController::class ,'index'])->middleware('auth')->name('productos.index');
// Route::get('/categories/create',[categoriesController::class , 'create'])->middleware('auth');
// Route::post('/categories',[categoriesController::class,'store'])->middleware('auth');
// Route::get('/categories/editar/{id}',[categoriesController::class,'edit'])->middleware('auth');
// Route::put('/categories/{id}',[categoriesController::class,'update'])->middleware('auth');
// Route::get('/categories/mostrar/{id}',[categoriesController::class,'show'])->middleware('auth');
// Route::delete('/categories/{id}',[categoriesController::class,'destroy'])->middleware('auth');

// Route::get('/artist',[artistController::class ,'index'])->middleware('auth');
// Route::get('/artist/create',[artistController::class , 'create'])->middleware('auth');
// Route::post('/artist',[artistController::class,'store'])->middleware('auth');
// Route::get('/artist/editar/{id}',[artistController::class,'edit'])->middleware('auth');
// Route::put('/artist/{id}',[artistController::class,'update'])->middleware('auth');
// Route::get('/artist/mostrar/{id}',[artistController::class,'show'])->middleware('auth');
// Route::delete('/artist/{id}',[artistController::class,'destroy'])->middleware('auth');

// Route::get('/places',[placesController::class ,'index'])->middleware('auth');
// Route::get('/places/create',[placesController::class , 'create'])->middleware('auth');
// Route::post('/places',[placesController::class,'store'])->middleware('auth');
// Route::get('/places/editar/{id}',[placesController::class,'edit'])->middleware('auth');
// Route::put('/places/{id}',[placesController::class,'update'])->middleware('auth');
// Route::get('/places/mostrar/{id}',[placesController::class,'show'])->middleware('auth');
// Route::delete('/places/{id}',[placesController::class,'destroy'])->middleware('auth');

// Route::get('/events',[eventsController::class ,'index'])->middleware('auth');
// Route::get('/events/create',[eventsController::class , 'create'])->middleware('auth');
// Route::post('/events',[eventsController::class,'store'])->middleware('auth');
// Route::get('/events/editar/{id}',[eventsController::class,'edit'])->middleware('auth');
// Route::put('/events/{id}',[eventsController::class,'update'])->middleware('auth');
// Route::get('/events/mostrar/{id}',[eventsController::class,'show'])->middleware('auth');
// Route::delete('/events/{id}',[eventsController::class,'destroy'])->middleware('auth');

// Route::get('/users',[usersController::class ,'index'])->middleware('auth');
// // Route::get('/users/create',[usersController::class , 'create'])->middleware('auth');
// Route::post('/users',[usersController::class,'store'])->middleware('auth');
// Route::get('/users/editar/{id}',[usersController::class,'edit'])->middleware('auth');
// Route::put('/users/{id}',[usersController::class,'update'])->middleware('auth');
// Route::get('/users/mostrar/{id}',[usersController::class,'show'])->middleware('auth');
// Route::delete('/users/{id}',[usersController::class,'destroy'])->middleware('auth');

// Route::get('/promotions',[promotionsController::class ,'index'])->middleware('auth');
// Route::get('/promotions/create',[promotionsController::class , 'create'])->middleware('auth');
// Route::post('/promotions',[promotionsController::class,'store'])->middleware('auth');
// Route::get('/promotions/editar/{id}',[promotionsController::class,'edit'])->middleware('auth');
// Route::put('/promotions/{id}',[promotionsController::class,'update'])->middleware('auth');
// Route::get('/promotions/mostrar/{id}',[promotionsController::class,'show'])->middleware('auth');
// Route::delete('/promotions/{id}',[promotionsController::class,'destroy'])->middleware('auth');

// Route::get('/purchases',[purchasesController::class ,'index'])->middleware('auth');
// Route::get('/purchases/create',[purchasesController::class , 'create'])->middleware('auth');
// Route::post('/purchases',[purchasesController::class,'store'])->middleware('auth');
// Route::get('/purchases/editar/{id}',[purchasesController::class,'edit'])->middleware('auth');
// Route::put('/purchases/{id}',[purchasesController::class,'update'])->middleware('auth');
// Route::get('/purchases/mostrar/{id}',[purchasesController::class,'show'])->middleware('auth');
// Route::delete('/purchases/{id}',[purchasesController::class,'destroy'])->middleware('auth');

// Route::get('/reviews',[reviewsController::class ,'index'])->middleware('auth');
// Route::get('/reviews/create',[reviewsController::class , 'create'])->middleware('auth');
// Route::post('/reviews',[reviewsController::class,'store'])->middleware('auth');
// Route::get('/reviews/editar/{id}',[reviewsController::class,'edit'])->middleware('auth');
// Route::put('/reviews/{id}',[reviewsController::class,'update'])->middleware('auth');
// Route::get('/reviews/mostrar/{id}',[reviewsController::class,'show'])->middleware('auth');
// Route::delete('/reviews/{id}',[reviewsController::class,'destroy'])->middleware('auth');

// Route::get('/tickets',[ticketsController::class ,'index'])->middleware('auth');
// Route::get('/tickets/create',[ticketsController::class , 'create'])->middleware('auth');
// Route::post('/tickets',[ticketsController::class,'store'])->middleware('auth');
// Route::get('/tickets/editar/{id}',[ticketsController::class,'edit'])->middleware('auth');
// Route::put('/tickets/{id}',[ticketsController::class,'update'])->middleware('auth');
// Route::get('/tickets/mostrar/{id}',[ticketsController::class,'show'])->middleware('auth');
// Route::delete('/tickets/{id}',[ticketsController::class,'destroy'])->middleware('auth');

// Route::get('/seats',[seatsController::class ,'index'])->middleware('auth');
// Route::get('/seats/create',[seatsController::class , 'create'])->middleware('auth');
// Route::post('/seats',[seatsController::class,'store'])->middleware('auth');
// Route::get('/seats/editar/{id}',[seatsController::class,'edit'])->middleware('auth');
// Route::put('/seats/{id}',[seatsController::class,'update'])->middleware('auth');
// Route::get('/seats/mostrar/{id}',[seatsController::class,'show'])->middleware('auth');
// Route::delete('/seats/{id}',[seatsController::class,'destroy'])->middleware('auth');

// Route::view('/login', "/login/index")->name('login');
// Route::view('/registro', '/admin/users/create')->name('registro');
// Route::view('/privada', "secret")->name('privada');

// Route::post('/inicia-sesion',[loginController::class,'login'])->name('inicia-sesion');
// Route::post('/validar-registro',[loginController::class,'registro'])->name('validar-registro');
// Route::get('/logout',[loginController::class,'logout'])->name('logout');
