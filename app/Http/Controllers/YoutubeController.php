<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    // Recherche d'une vidéo YouTube par mot-clé
    public function searchYoutubeVideo($keyword)
    {
        // Remplacez "YOUR_YOUTUBE_API_KEY" par votre clé API
        $apiKey = 'AIzaSyClzVq0BSpCRKsbr9UncakwLoHK9zU7o-s';
        
        // URL de l'API YouTube pour rechercher des vidéos
        $url = "https://www.googleapis.com/youtube/v3/search";
        
        // Paramètres de la requête
        $params = [
            'part' => 'snippet',
            'Laravel ' => $keyword, // Mot-clé de recherche
            'maxResults' => 1, // Nombre maximum de résultats
            'key' => $apiKey,  // Votre clé API YouTube
        ];

        // Effectuer la requête HTTP GET à l'API YouTube
        $response = Http::get($url, $params);

        // Vérifier si la réponse est réussie
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['items'][0]['id']['videoId'])) {
                $videoId = $data['items'][0]['id']['videoId'];
                // Retourner l'URL de la vidéo YouTube
                return "https://www.youtube.com/watch?v=" . $videoId;
            }
        }

        // Si aucune vidéo n'est trouvée ou en cas d'erreur
        return 'Aucune vidéo trouvée ou erreur API.';
    }
}
