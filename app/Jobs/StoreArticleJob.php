<?php
namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreArticleJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $articleData;

    public function __construct(array $articleData)
    {
        $this->articleData = $articleData;
    }

    public function handle()
    {
        $article = Article::create($this->articleData);
        $youtubeDelay = now()->addMinutes(1);
        UpdateArticleYoutubeUrlJob::dispatch($article->id, $article->title)
            ->delay($youtubeDelay);
    }
}
