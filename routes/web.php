<?php

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
Route::middleware(['auth'])->group(function () {
    // Route accessible à tous les membres (utilisateurs et administrateurs)
    Route::get('/testuser', function () {
        $role = auth()->user()->role->name;
        return "Bonjour $role !";
    })->name('testuser');


    
    // // Routes accessibles uniquement aux administrateurs

    // Route::middleware(['role:admin'])->group(function () {
    //     Route::get('/testadmin', function () {
    //         $role = auth()->user()->role->name;
    //         return "Wow un $role !";
    //     })->name('testadmin');
    // });
});
