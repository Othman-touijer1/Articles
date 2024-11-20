<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
//$article->categories()->sync($request->categories);


class ArticleController extends Controller
{ 
    public function acceuile(){
        $categories = Category::all();

        $articles = Article::with('user', 'categories')->latest()->get();
        return view('Accueil',compact('articles', 'categories'));
    }
    public function home11()
    {
        $categories = Category::all();
        $articles = Article::with('user', 'categories')->latest()->get();
        return view('home', compact('articles', 'categories'));
    }

    public function ajouterarticle()
    {
        $categories = Category::all();
        return view('articles.ajouter', compact('categories'));
    }

    public function store(StoreArticleRequest $request)
{
    $article = new Article();
    $article->fill($request->only(['title', 'excerpt', 'content']));
    $article->user()->associate(auth()->user());
    $article->published_at = $request->datetime;  // Use the date from the form

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Store the image in the public directory
        $imagePath = $request->file('image')->store('public/images');
        $article->image = basename($imagePath);  // Store only the file name
    }

    $article->save();

    if ($request->has('categories')) {
        $article->categories()->sync($request->categories);
    }

    return redirect('/home');
}
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.editer', compact('article', 'categories'));
    }
    public function update(UpdateArticleRequest $request, $id)
{
    $article = Article::findOrFail($id);
    $article->fill($request->only(['title', 'excerpt', 'content']));
    $article->published_at = $request->datetime;

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $imagePath = $request->file('image')->store('public/images');
        $article->image = basename($imagePath);
    }

    $article->save();

    if ($request->has('categories')) {
        $article->categories()->sync($request->categories);
    }

    return redirect('/home');
}
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/home');
    }
    public function show($id)
    {
        $article = Article::with('user', 'categories')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    
    
}


// Afficher tous les articles
// public function index()
// {
//     $articles = Article::with('user', 'categories')->latest()->get();
//     return view('articles.index', compact('articles'));
// }

// // Afficher le formulaire de création d'article
// public function create()
// {
//     $categories = Category::all();
//     return view('articles.create', compact('categories'));
// }

// // Enregistrer un nouvel article
// public function store(Request $request)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'excerpt' => 'required|string',
//         'content' => 'required',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
//         'categories' => 'array',
//     ]);

//     // Sauvegarder l'article
//     $article = new Article();
//     $article->fill($request->only(['title', 'excerpt', 'content', 'published_at']));
//     $article->user_id = auth()->id();

//     // Gestion de l'image
//     if ($request->hasFile('image')) {
//         $imagePath = $request->file('image')->store('public/images');
//         $article->image = basename($imagePath);
//     }

//     $article->save();

//     // Associer les catégories
//     if ($request->has('categories')) {
//         $article->categories()->sync($request->categories);
//     }

//     return redirect()->route('articles.index');
// }

// // Modifier un article existant
// public function edit(Article $article)
// {
//     $categories = Category::all();
//     return view('articles.edit', compact('article', 'categories'));
// }

// // Mettre à jour un article
// public function update(Request $request, Article $article)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'excerpt' => 'required|string',
//         'content' => 'required',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
//         'categories' => 'array',
//     ]);

//     $article->fill($request->only(['title', 'excerpt', 'content', 'published_at']));

//     // Gestion de l'image
//     if ($request->hasFile('image')) {
//         $imagePath = $request->file('image')->store('public/images');
//         $article->image = basename($imagePath);
//     }

//     $article->save();

//     // Associer les catégories
//     if ($request->has('categories')) {
//         $article->categories()->sync($request->categories);
//     }

//     return redirect()->route('articles.index');
// }

// // Supprimer un article
// public function destroy(Article $article)
// {
//     $article->delete();
//     return redirect()->route('articles.index');
// }