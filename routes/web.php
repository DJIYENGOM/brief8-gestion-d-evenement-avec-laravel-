<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\EvenementController;
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
    // Route accessible à tous les membres (utilisateurs et administrateurs)
    Route::get('/testuser', function () {
        $role = auth()->user()->role->name;
        return "Bonjour $role !";
    })->name('testuser');

});


 Route::middleware(['auth','role:association'])->group(function () {
        Route::get('/accueil', [AssociationController::class, 'index']);
        Route::get('/ajout', [EvenementController::class, 'ajout']);
        Route::post('/AjoutEven', [EvenementController::class, 'create']);
        Route::get('/liste', [EvenementController::class, 'ListeEven']);

    Route::delete('supprimer/{id}', [EvenementController::class,'destroy'])->name('delete');
    Route::get('modifier/{id}', [EvenementController::class,'edit'])->name('edit');
    Route::post('modifier/{id}', [EvenementController::class,'update'])->name('modifier');




});

