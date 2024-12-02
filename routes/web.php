<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/ajouter', [ArticleController::class, 'ajouterarticle'])->name('ajouter');
Route::post('/home', [ArticleController::class, 'store'])->name('store');
Route::get('/home',  [ArticleController::class, 'home11'])->name('home');
//editer
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
//supprimer
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
//show
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
//comment
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('acceuil', [ArticleController::class, 'acceuile']);


Route::get('/affichercategories', [CategoryController::class, 'afficher'])->name('afficher');
Route::post('/affichercategories', [CategoryController::class, 'store'])->name('categorie.store');
Route::get('/categorie/{id}/edit', [CategoryController::class, 'edit'])->name('categorie.edit');
Route::put('/categorie/{id}', [CategoryController::class, 'update'])->name('categorie.update');
Route::get('/categorie/{id}', [CategoryController::class, 'destroy'])->name('categorie.destroy');


Route::get('/home', [ArticleController::class, 'userarticle'])->name('user.article');












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
