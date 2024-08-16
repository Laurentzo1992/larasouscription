<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\AuthController;
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




Route::get('/', [AuthController::class, 'index'])->name('auth.index');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/login', [AuthController::class, 'doLogin']);

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');





Route::get('/list_souscription', [SouscriptionController::class, 'index'])->name('souscription.index');

Route::get('/souscription/create', [SouscriptionController::class, 'create'])->name('souscription.create');

Route::post('/souscription', [SouscriptionController::class, 'store'])->name('souscription.store');

Route::get('/espace_souscription', [SouscriptionController::class, 'show'])->name('souscription.show');




