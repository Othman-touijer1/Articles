<?php
namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreArticleJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $articleData;
    
    public function __construct($articleData)
    {
        $this->articleData = $articleData;
    }

    public function handle()
    {
        // Créer l'article avec les données de base
        $article = Article::create($this->articleData);
        // Sauvegarder l'article dans la base de données
        $article->save();
    }
}
