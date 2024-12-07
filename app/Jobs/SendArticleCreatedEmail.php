<?php

namespace App\Jobs;

use App\Mail\ArticleCreated;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailables\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail as MailFacade;

class SendArticleCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article;

    
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    
    public function handle()
    {
        
        MailFacade::to('amin@gmail.com')->send(new ArticleCreated($this->article));
    }
}

