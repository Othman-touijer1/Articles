<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Réinitialisation des marges et des paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style global */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            color: #444;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 30px;
        }

        .container {
            background-color: #fff;
            width: 100%;
            max-width: 900px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 25px;
            overflow: hidden;
        }

        h1 {
            font-size: 2.4rem;
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
            line-height: 1.2;
        }

        p {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
        }

        .article-image img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .article-content, .article-categories {
            margin-top: 25px;
        }

        .article-excerpt h3, .article-content h3, .article-categories h3 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .article-categories ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .article-categories ul li {
            background-color: #E1F5FE;
            padding: 8px 15px;
            margin: 8px 8px 8px 0;
            border-radius: 30px;
            font-size: 0.95rem;
            color: #039BE5;
            font-weight: 500;
        }

        /* Boutons */
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 14px;
            text-align: center;
            border-radius: 25px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 25px;
        }

        .btn-secondary {
            background-color: #607d8b;
        }

        .btn-like {
            background-color: #388e3c;
        }

        .btn-dislike {
            background-color: #f44336;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.85;
        }

        /* Section Commentaire */
        .comment-section {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid #eee;
        }

        .comment-section h3 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .comment-section textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 1rem;
            resize: vertical;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .comment-section textarea:focus {
            border-color: #388e3c;
            outline: none;
        }

        .comment-section button {
            background-color: #388e3c;
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-section button:hover {
            background-color: #2c6e2e;
        }

        .comment {
            margin-bottom: 20px;
        }

        .comment p {
            font-size: 1rem;
            color: #444;
            margin-bottom: 5px;
        }

        .comment strong {
            font-weight: 600;
            color: #388e3c;
        }

        .comment-section hr {
            border: 1px solid #f0f0f0;
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
    @if($article->categories->count() > 0)
        <div class="article-categories mt-3">
            <h3>Catégories :</h3>
            <ul>
                @foreach($article->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <p>Aucune catégorie associée à cet article.</p>
    @endif

    <!-- Section des commentaires -->
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

        <!-- Ajout du bouton "Retour à la liste" à droite -->
        
    </div>

</div>

<!-- Script pour gérer les clics sur les boutons "Like" et "Dislike" -->
<script>
    let likeCount = 0;
    let dislikeCount = 0;

    const likeBtn = document.getElementById('like-btn');
    const dislikeBtn = document.getElementById('dislike-btn');
    const likeCountElement = document.getElementById('like-count');
    const dislikeCountElement = document.getElementById('dislike-count');

    likeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        if (dislikeCount > 0) {
            dislikeCount = 0;
            dislikeCountElement.textContent = dislikeCount;
        }
        likeCount++;
        likeCountElement.textContent = likeCount;
    });

    dislikeBtn.addEventListener('click', function(event) {
        event.preventDefault();
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
