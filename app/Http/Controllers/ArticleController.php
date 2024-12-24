<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\ArticleCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SendArticleCreatedEmail;
use App\Models\EmailSetting;
use App\Jobs\StoreArticleJob;


class ArticleController extends Controller 
{
    // public function __construct()
    // {
    //     // Application de la logique de rôle et de permission sur les actions du contrôleur
    //     $this->middleware('Role:user_1')->only('ajouterarticle', 'store');
    //     $this->middleware('Role:user_2')->only('edit', 'update');
    //     $this->middleware('Role:user_3')->only('destroy');
    // }
    // public function __construct()
    // {
       
    //     $this->middleware('checkPermission:add')->only('ajouterarticle');
    //     $this->middleware('checkPermission:edit')->only('edit', 'update');
    //     $this->middleware('checkPermission:delete')->only('destroy');
    // }
    // public function __construct()
    // {
    //     $this->middleware('can:add-article')->only('ajouterarticle', 'store'); // Only user 1 can add articles
    //     $this->middleware('can:edit-article')->only('edit', 'update'); // User 1 and 2 can edit
    //     $this->middleware('can:delete-article')->only('destroy'); // User 1 and 3 can delete
    // }

     public function admin(){
        $categories = Category::all();
        $articles = Article::with('user', 'categories')->latest()->get();
        return view('home.adminpage', compact('articles', 'categories'));
     }
    public function home11()
    {
        $categories = Category::all();
        $articles = Article::with('user', 'categories')->latest()->get();
        return view('home.home', compact('articles', 'categories'));
    }

    public function ajouterarticle()
    {
        // $this->authorize('create', Article::class); // This will use the ArticlePolicy
        $categories = Category::all();
        return view('articles.ajouter', compact('categories'));
    }
    public function store(Request $request)
{
    // Récupérer les données de l'article à partir du formulaire
    $articleData = $request->only(['title', 'excerpt', 'content']);
    $articleData['user_id'] = auth()->user()->id;
    $articleData['published_at'] = $request->datetime;
    $articleData['is_new'] = true;

    // Utiliser le titre de l'article comme mot-clé pour rechercher une vidéo YouTube
    $youtubeController = new YoutubeController();
    $youtubeUrl = $youtubeController->searchYoutubeVideo($request->input('title')); // Recherche YouTube basée sur le titre de l'article

    // Ajouter l'URL YouTube si elle est trouvée
    if ($youtubeUrl) {
        $articleData['youtube_url'] = $youtubeUrl;
    } else {
        $articleData['youtube_url'] = null;  // Si aucune vidéo n'est trouvée, mettre la colonne youtube_url à null
    }

    // Si l'image existe, on la traite
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $imagePath = $request->file('image')->store('public/images');
        $articleData['image'] = basename($imagePath);
    }

    // Ajouter le job pour enregistrer l'article avec un délai de 2 minutes
    $delay = now()->addMinutes(2);
    StoreArticleJob::dispatch($articleData, $youtubeUrl)->delay($delay);

    // Récupérer les paramètres pour l'envoi de l'email après un certain délai
    $settings = EmailSetting::first();
    $emailDelay = $settings ? $settings->email_delay : 1;
    $emailDelayTime = now()->addMinutes($emailDelay);

    // Envoyer l'email après le délai
    SendArticleCreatedEmail::dispatch($articleData)->delay($emailDelayTime);

    // Redirection après le traitement
    return redirect('/home');
}


    public function edit($id)
    {
        $article = Article::findOrFail($id);

        
        // if (!auth()->user()->can('edit articles')) {
        //     abort(403, 'Vous n\'avez pas la permission de modifier cet article');
        // }

        $categories = Category::all();
        return view('articles.editer', compact('article', 'categories'));
    }
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        // $this->authorize('update', $article); 
        // if (!auth()->user()->can('edit articles')) {
        //     abort(403, 'Vous n\'avez pas la permission de modifier cet article');
        // }
    
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
        // $this->authorize('delete', $article);
        
    //     // if (!auth()->user()->can('delete articles')) {
    //     //     abort(403, 'Vous n\'avez pas la permission de supprimer cet article');
    //     // }

        $article->delete();
        return redirect('/home');
    }
    public function show($id)
    {
        $article = Article::with('user', 'categories')->findOrFail($id);
        return view('articles.show', compact('article'));
    }


    public function userarticle()
    {
        if (Auth::check()) {
            $articles = Auth::user()->articles;
            return view('home.home', compact('articles'));
        } else {
            return redirect()->route('login');
        }
    }
    public function confirm($id)
    {
        // Trouver l'article par son ID
        $article = Article::findOrFail($id);
        
        // Mettre à jour l'article pour le marquer comme confirmé
        $article->is_confirmed = true;
        $article->save();
        
        // Rediriger vers une autre page avec un message de confirmation
        return redirect('/acceuil')->with('success', 'Article confirmé avec succès !');
    }
    public function acceuile()
    {
        $categories = Category::all();
        $articles = Article::with('user', 'categories')->latest()->get();
        $articles = Article::where('is_confirmed', true)->get();
        return view('home.Accueil', compact('articles', 'categories'));
    }
}
