<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/addpizza/{idpizza}/{idsize}', [OrderController::class, 'addPizza']);
Route::get('/addtop/{idtop}', [OrderController::class, 'addTopping']);
Route::get('/deletepizza/{idpizza}', [OrderController::class, 'removePizza']);
Route::get('/deletetopp/{idtopping}', [OrderController::class, 'removeTopping']);
Route::get('/cart', [OrderController::class, 'orderDetails']);
Route::get('/cart/finalize',[OrderController::class, 'finalizeOrder']);
//Route::get('/clearOrder',[OrderController::class, 'clearOrder']);

//cart

require __DIR__.'/auth.php';
