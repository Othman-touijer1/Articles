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

    protected $articleData;

    // Le constructeur pour recevoir l'article
    public function __construct($articleData)
    {
        $this->articleData = $articleData;
    }

    
    public function handle()
    {
    
            // Liste des emails des administrateurs
            $admins = ['amin1@example.com', 'othman2@example.com', 'abdelghafour3@example.com'];

            // Envoi de l'email à chaque administrateur individuellement
            try {
            foreach ($admins as $admin) {
                \Log::info("Sending email to: $admin");  // Log pour chaque email envoyé
                Mail::to($admin)->send(new ArticleCreated($this->article));
            }
        } catch (\Exception $e) {
            // Log de l'erreur en cas de problème
            \Log::error("Failed to send article created email: " . $e->getMessage());
        }
    }
}
?>
