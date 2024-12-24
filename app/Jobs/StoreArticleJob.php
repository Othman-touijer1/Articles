<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreArticleJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $articleData;
    protected $youtubeUrl;

    public function __construct($articleData, $youtubeUrl)
    {
        $this->articleData = $articleData;
        $this->youtubeUrl = $youtubeUrl;
    }

    public function handle()
    {
        // Créer l'article
        $article = new Article();
        $article->fill($this->articleData);
        $article->save();

        $article->youtube_url = $this->youtubeUrl;
        $article->save();
    }
}
