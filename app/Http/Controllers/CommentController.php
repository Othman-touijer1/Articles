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
       
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);
        Comment::create([
            'comment' => $request->comment,
            'article_id' => $articleId,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('articles.show', $articleId)->with('success', 'Commentaire ajouté avec succès!');
    }
}
