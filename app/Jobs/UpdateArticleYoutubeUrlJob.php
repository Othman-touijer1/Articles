<?php

namespace App\Jobs;

use App\Models\Article;
use App\Http\Controllers\YoutubeController;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateArticleYoutubeUrlJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $articleId;
    protected $youtubeController;
    protected $title;

    public function __construct( YoutubeController $youtubeController)   //$articleId,   $title
    { 
        // $this->articleId = $articleId;
        $this->youtubeController = $youtubeController;
        // $this->title = $title;
    }

    public function handle()
    {
        // Rechercher la vidéo YouTube basée sur le titre
        $youtubeUrl = $this->youtubeController->searchYoutubeVideo($keyword);

        // Mettre à jour l'URL YouTube de l'article
        $article = Article::find($this->articleId);
        if ($article) {
            $article->youtube_url = $youtubeUrl;
            $article->save();
        }
    }
}
