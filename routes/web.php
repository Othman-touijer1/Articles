<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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



Route::get('/ajouter', [ArticleController::class, 'ajouterarticle'])->name('ajouter');
Route::get('/home',  [ArticleController::class, 'home11'])->name('home');



Route::get('/affichercategories', [CategoryController::class, 'afficher'])->name('afficher');
Route::post('/affichercategories', [CategoryController::class, 'store'])->name('categorie.store');
Route::get('/categorie/{id}/edit', [CategoryController::class, 'edit'])->name('categorie.edit');
Route::put('/categorie/{id}', [CategoryController::class, 'update'])->name('categorie.update');
Route::get('/categorie/{id}', [CategoryController::class, 'destroy'])->name('categorie.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
