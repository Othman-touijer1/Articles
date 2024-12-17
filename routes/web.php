<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailSettingController;



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

Route::get('/acceuil', [ArticleController::class, 'acceuile'])->name('acceuille.page');


Route::get('/affichercategories', [CategoryController::class, 'afficher'])->name('afficher');
Route::post('/affichercategories', [CategoryController::class, 'store'])->name('categorie.store');
Route::get('/categorie/{id}/edit', [CategoryController::class, 'edit'])->name('categorie.edit');
Route::put('/categorie/{id}', [CategoryController::class, 'update'])->name('categorie.update');
Route::get('/categorie/{id}', [CategoryController::class, 'destroy'])->name('categorie.destroy');


Route::get('/home', [ArticleController::class, 'userarticle'])->name('user.article');
Route::post('/article/{id}/confirm', [ArticleController::class, 'confirm'])->name('article.confirm');

Route::middleware(['admin'])->group(function () {
    
    Route::get('/adminpage',  [ArticleController::class, 'admin'])->name('adminpage');
    Route::get('/affichercategories', [CategoryController::class, 'afficher'])->name('afficher');
    Route::post('/affichercategories', [CategoryController::class, 'store'])->name('categorie.store');
    Route::get('/categorie/{id}/edit', [CategoryController::class, 'edit'])->name('categorie.edit');
    Route::put('/categorie/{id}', [CategoryController::class, 'update'])->name('categorie.update');
    Route::get('/categorie/{id}', [CategoryController::class, 'destroy'])->name('categorie.destroy');
    
    // Route::get('/settings',[SettingController::class, 'index']);
    // Afficher les paramètres
    // Route::get('/settings/email', [EmailSettingController::class, 'edit']);

    // Sauvegarder les paramètres
    // Route::post('/settings/email', [EmailSettingController::class, 'update']);

});

Route::get('/settings/email', [EmailSettingController::class, 'index'])->name('email.settings.index');
Route::post('/settings/email', [EmailSettingController::class, 'store']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
