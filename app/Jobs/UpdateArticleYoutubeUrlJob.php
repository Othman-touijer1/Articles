<?php

namespace App\Jobs;

use App\Models\Article;
use App\Http\Controllers\YoutubeController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateArticleYoutubeUrlJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $articleId;
    protected $searchKeyword;

    public function __construct($articleId, $searchKeyword)
    {
        $this->articleId = $articleId;
        $this->searchKeyword = $searchKeyword;
    }

    public function handle(YoutubeController $youtubeController)
    {
        $article = Article::find($this->articleId);
        
        if (!$article) {
            return;
        }

        $youtubeUrl = $youtubeController->searchYoutubeVideo($this->searchKeyword);
        
        if ($youtubeUrl) {
            $article->youtube_url = $youtubeUrl;
            $article->save();
        }
    }
}