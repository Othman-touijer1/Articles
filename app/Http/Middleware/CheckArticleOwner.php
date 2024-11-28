<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckArticleOwner
{
    public function handle($request, Closure $next)
{
    $article = Article::findOrFail($request->route('article'));

    if ($article->user_id !== Auth::id()) {
        // Si l'utilisateur n'est pas le propriétaire de l'article, il est redirigé ou une erreur est générée
        return redirect()->route('articles.index')->with('error', 'Unauthorized access!');
    }

    return $next($request);
}
}
