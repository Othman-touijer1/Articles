<?php

namespace App\Http\Controllers;

use App\Models\Comment; // Importer le modèle Comment
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        // Valider les données du commentaire
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Créer le commentaire
        Comment::create([
            'comment' => $request->comment,
            'article_id' => $articleId,
            'user_id' => Auth::id(), // Assurez-vous que l'utilisateur est authentifié
        ]);

        return redirect()->route('articles.show', $articleId)->with('success', 'Commentaire ajouté avec succès!');
    }
}
