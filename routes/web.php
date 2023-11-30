<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Routes pour les membres (utilisateurs et administrateurs)
Route::middleware(['auth','role:user'])->group(function () {

    Route::get('/liste/even', [EvenementController::class, 'ListeEvenClient']);
    Route::get('/voirplus/{id}', [EvenementController::class, 'Detail']);
    Route::post('/reservation/ajout/{id}', [ReservationController::class, 'CreerReservation']);


});


 Route::middleware(['auth','role:association'])->group(function () {
        Route::get('/accueil', [AssociationController::class, 'index']);
        Route::get('/ajout', [EvenementController::class, 'ajout']);
        Route::post('/AjoutEven', [EvenementController::class, 'create']);
        Route::get('/liste', [EvenementController::class, 'ListeEven']);

    Route::delete('supprimer/{id}', [EvenementController::class,'destroy'])->name('delete');
    Route::get('modifier/{id}', [EvenementController::class,'edit'])->name('edit');
    Route::post('modifier/{id}', [EvenementController::class,'update'])->name('modifier');

    Route::get('/liste/{id}', [ReservationController::class, 'ListeReservation']);


    Route::get('refuser/{id}', [ReservationController::class,'updateReservation'])->name('refuser');

});

