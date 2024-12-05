<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPermission
{
    public function handle(Request $request, Closure $next, $action)
    {
        $user = auth()->user(); // Récupérer l'utilisateur authentifié
        if ($user->id == 10) {  
            return $next($request);
        }
        if ($action == 'add' && $user->id != 1) {
            abort(403, 'Vous n\'avez pas la permission d\'ajouter un article.');
        }

        if ($action == 'edit' && $user->id != 2) {
            abort(403, 'Vous n\'avez pas la permission de modifier cet article.');
        }

        if ($action == 'delete' && $user->id != 3) {
            abort(403, 'Vous n\'avez pas la permission de supprimer cet article.');
        }

        return $next($request);
    }
}
