<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categories' => 'array',
            'datetime' => 'required|date', // Ajoute une validation pour la date
        ]);

        // Sauvegarder l'article
        $article = new Article();
        $article->fill($request->only(['title', 'excerpt', 'content']));
        $article->user_id = auth()->id();
        $article->published_at = $request->datetime;  // Utilisation de la date du formulaire

        // Gestion de l'image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Stocker l'image dans le répertoire public
            $imagePath = $request->file('image')->store('public/images');
            // Sauvegarder le nom de l'image dans la base de données
            $article->image = basename($imagePath);  // Ne garde que le nom du fichier
        }

        $article->save();

        // Associer les catégories
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'categories' => 'array',
            'datetime' => 'required|date',
        ]);

        // Trouver l'article à modifier
        $article = Article::findOrFail($id);
        $article->fill($request->only(['title', 'excerpt', 'content']));
        $article->published_at = $request->datetime;

        // Gestion de l'image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('public/images');
            $article->image = basename($imagePath);
        }

        $article->save();

        // Associer les catégories
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