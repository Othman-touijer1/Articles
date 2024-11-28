<?php
namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;  
    public function create(User $user)
    {
        return $user->id === 10; 
    }
    public function update(User $user, Article $article)
    {
        return $user->id === 10 || $user->id === 11; 
    }
    public function delete(User $user, Article $article)
    {
        return $user->id === 10 || $user->id === 12; 
    }
}
