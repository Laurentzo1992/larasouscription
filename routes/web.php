<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\SouscriptionController;
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


Route::get('/', [SouscriptionController::class, 'index'])->name('souscription.index');

Route::get('connexion', [SouscriptionController::class, 'connexion'])->name('souscription.connexion');

Route::get('/souscription/create', [SouscriptionController::class, 'create'])->name('souscription.create');

Route::post('/souscription', [SouscriptionController::class, 'store'])->name('souscription.store');





