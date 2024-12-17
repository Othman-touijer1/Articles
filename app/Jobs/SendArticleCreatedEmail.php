<?php
namespace App\Jobs;

use App\Models\Article;
use App\Mail\ArticleCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendArticleCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article;

    // Le constructeur pour recevoir l'article
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    // La méthode handle où l'email est envoyé
    public function handle()
    {
        try {
            // Envoi de l'email
            Mail::to('amin1@exemple.com')->send(new ArticleCreated($this->article));
        } catch (\Exception $e) {
            // Log de l'erreur en cas de problème
            \Log::error("Failed to send article created email: " . $e->getMessage());
        }
    }
}
?>
<!-- 
    public function handle()
    {
        try {
            // Liste des emails des administrateurs
            $admins = ['admin1@example.com', 'admin2@example.com', 'admin3@example.com'];

            // Envoi de l'email à tous les administrateurs
            Mail::to($admins)->send(new ArticleCreated($this->article));
        } catch (\Exception $e) {
            // Log de l'erreur en cas de problème
            \Log::error("Failed to send article created email: " . $e->getMessage());
        }
    }
 -->