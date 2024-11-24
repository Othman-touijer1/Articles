<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Spatie\Permission\Models\Role; // IMPORTER LA CLASSE Role
use Spatie\Permission\Models\Permission; // IMPORTER LA CLASSE Permission
use App\Models\User;

class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     // Application de la logique de rôle et de permission sur les actions du contrôleur
    //     $this->middleware('Role:user_1')->only('ajouterarticle');
    //     $this->middleware('Role:user_2')->only('edit');
    //     $this->middleware('Role:user_3')->only('destroy');
    // }
    public function __construct()
    {
        // Applique un middleware pour vérifier les permissions basées sur l'ID de l'utilisateur
        $this->middleware('checkPermission:add')->only('ajouterarticle');
        $this->middleware('checkPermission:edit')->only('edit', 'update');
        $this->middleware('checkPermission:delete')->only('destroy');
    }

    public function acceuile()
    {
        $categories = Category::all();
        $articles = Article::with('user', 'categories')->latest()->get();
        return view('Accueil', compact('articles', 'categories'));
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
    // Vérification si l'utilisateur a la permission "create articles"
    // On peut utiliser la méthode can() de Laravel qui prend en compte les rôles et permissions
    if (!auth()->user()->can('create articles')) {
        abort(403, 'Vous n\'avez pas la permission de créer un article');
    }

    // Créer l'article
    $article = new Article();
    $article->fill($request->only(['title', 'excerpt', 'content']));
    $article->user()->associate(auth()->user());
    $article->published_at = $request->datetime;

    // Traitement de l'image si présente
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $imagePath = $request->file('image')->store('public/images');
        $article->image = basename($imagePath);
    }

    // Sauvegarder l'article
    $article->save();

    // Associer les catégories si présentes
    // if ($request->has('categories')) {
    //     $article->categories()->sync($request->categories);
    // }

    return redirect('/home');
}


    public function edit($id)
    {
        $article = Article::findOrFail($id);

        // Vérifier que l'utilisateur a la permission de modifier l'article
        if (!auth()->user()->can('edit articles')) {
            abort(403, 'Vous n\'avez pas la permission de modifier cet article');
        }

        $categories = Category::all();
        return view('articles.editer', compact('article', 'categories'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        // Vérifier que l'utilisateur a la permission de modifier l'article
        if (!auth()->user()->can('edit articles')) {
            abort(403, 'Vous n\'avez pas la permission de modifier cet article');
        }

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

        // Vérifier que l'utilisateur a la permission de supprimer l'article
        if (!auth()->user()->can('delete articles')) {
            abort(403, 'Vous n\'avez pas la permission de supprimer cet article');
        }

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