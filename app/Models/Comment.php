<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'article_id', 'user_id'];

    // Définir la relation avec l'article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Définir la relation avec l'utilisateur (si vous avez un modèle User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
