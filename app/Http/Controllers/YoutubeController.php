<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    // Recherche d'une vidéo YouTube par mot-clé
    public function searchYoutubeVideo($keyword)
{
    $apiKey = 'AIzaSyClzVq0BSpCRKsbr9UncakwLoHK9zU7o-s';
    $url = "https://www.googleapis.com/youtube/v3/search";
    
    $params = [
        'part' => 'snippet',
        'sport' => $keyword,
        'maxResults' => 1,
        'type' => 'video',
        'key' => $apiKey
    ];

    // Envoi de la requête HTTP
    $response = Http::get($url, $params);

    // Vérification du succès de la requête
    if ($response->successful()) {
        $data = $response->json();
        // Log des données retournées par l'API YouTube
        \Log::info('Données YouTube : ' . json_encode($data));

        if (!empty($data['items'])) {
            $videoId = $data['items'][0]['id']['videoId'];
            return "https://www.youtube.com/watch?v=" . $videoId;
        } else {
            \Log::error('Aucune vidéo trouvée pour le titre : ' . $keyword);
        }
    } else {
        \Log::error('Erreur de l\'API YouTube : ' . $response->body());
    }

    return null; // Retourner null si l'API échoue ou aucune vidéo n'est trouvée
}

}
