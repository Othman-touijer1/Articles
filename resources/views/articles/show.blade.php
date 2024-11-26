<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Ajouter FontAwesome -->
    <style>
        /* Réinitialisation des marges et des paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style global */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            width: 100%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

        .article-image img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .article-excerpt, .article-content, .article-categories {
            margin-top: 20px;
        }

        .article-excerpt h3, .article-content h3, .article-categories h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .article-categories ul {
            list-style-type: none;
            padding: 0;
        }

        .article-categories ul li {
            background-color: #e0e7ff;
            padding: 5px 10px;
            margin: 5px 0;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #5c6bc0;
        }

        /* Boutons */
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            font-size: 14px;
            text-align: center;
            border-radius: 20px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 20px;
            margin-right: 10px;
            border: 1px solid transparent;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-like {
            background-color: #42b72a; /* Vert de Facebook */
        }

        .btn-dislike {
            background-color: #f44336; /* Rouge de Facebook */
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }

        .btn:focus {
            outline: none;
        }

        /* Section Commentaire */
        .comment-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .comment-section h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 15px;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .comment-section button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Affichage du titre de l'article -->
    <h1>{{ $article->title }}</h1>

    <!-- Affichage de la date de publication -->
    <p><strong>Date de publication :</strong> {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y, H:i') }}</p>

    <!-- Affichage de l'image de l'article (si disponible) -->
    @if($article->image)
        <div class="article-image">
            <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="img-fluid">
        </div>
    @else
        <div class="article-image">
            <img src="https://via.placeholder.com/800x400" alt="Image par défaut" class="img-fluid">
        </div>
    @endif

    <!-- Affichage du contenu complet de l'article -->
    <div class="article-content mt-3">
        <h3>Contenu :</h3>
        <p>{{ $article->content }}</p>
    </div>

    <!-- Affichage des catégories de l'article -->
    <!-- @if($article->categories->count() > 0) -->
        <div class="article-categories mt-3">
            <h3>Catégories :</h3>
            <ul>
                @foreach($article->categories as $category)
                <td>{{ $category->name }}</td>
                @endforeach
            </ul>
        </div>
    <!-- @else
        <p>Aucune catégorie associée à cet article.</p>
    @endif -->

    <!-- Boutons d'action : Retour, Like, Dislike -->
    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Retour à la liste</a>
        
        
    
    </div>

    <!-- Section des commentaires -->
    <div class="comment-section">
        <h3>Commentaires</h3>

        <!-- Affichage des commentaires -->
        @foreach($article->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}</strong> a dit :</p>
                <p>{{ $comment->comment }}</p>
                <hr>
            </div>
        @endforeach

        <!-- Formulaire pour ajouter un commentaire -->
        <h3>Ajouter un commentaire</h3>
        <form action="{{ route('comments.store', $article->id) }}" method="POST">
            @csrf
            <textarea name="comment" rows="4" placeholder="Écrivez votre commentaire ici..." required></textarea>
            <button type="submit">Publier le commentaire</button>
        </form>
    </div>
</div>

<!-- Script pour gérer les clics sur les boutons "Like" et "Dislike" -->
<script>
    // Compteurs de clics
    let likeCount = 0;
    let dislikeCount = 0;

    // Récupérer les éléments du bouton et du compteur
    const likeBtn = document.getElementById('like-btn');
    const dislikeBtn = document.getElementById('dislike-btn');
    const likeCountElement = document.getElementById('like-count');
    const dislikeCountElement = document.getElementById('dislike-count');

    // Gestion des clics sur le bouton "J'aime"
    likeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        // Si "Je n'aime pas" est sélectionné, réinitialiser son compteur
        if (dislikeCount > 0) {
            dislikeCount = 0;
            dislikeCountElement.textContent = dislikeCount;
        }
        likeCount++;
        likeCountElement.textContent = likeCount;
    });

    // Gestion des clics sur le bouton "Je n'aime pas"
    dislikeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        // Si "J'aime" est sélectionné, réinitialiser son compteur
        if (likeCount > 0) {
            likeCount = 0;
            likeCountElement.textContent = likeCount;
        }
        dislikeCount++;
        dislikeCountElement.textContent = dislikeCount;
    });
</script>

</body>
</html>
