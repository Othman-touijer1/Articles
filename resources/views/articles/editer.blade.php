<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>
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
            background-color: #2a3d47;
            color: #333;
            display: flex;
            justify-content: center; /* Centrer horizontalement */
            align-items: center;     /* Centrer verticalement */
            height: 100vh;           /* Prendre toute la hauteur de la fenêtre */
            margin: 0;
            padding: 10px;
        }

        /* Conteneur du formulaire */
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h1 {
            font-size: 1.8rem;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Champs de saisie */
        .form-control {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #e0e7ff;
            background-color: #f9fafb;
            font-size: 0.95rem;
            color: #333;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
        }

        .form-control:focus {
            border-color: #5c6bc0;
            box-shadow: 0 0 10px rgba(92, 107, 192, 0.4);
            outline: none;
            transform: scale(1.02);
        }

        .form-control[type="file"] {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Zone de texte */
        .form-control[type="textarea"] {
            resize: vertical;
            min-height: 150px;
        }

        /* Labels */
        label {
            font-size: 1rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
            display: block;
            text-transform: capitalize;
        }

        /* Boutons */
        button {
            padding: 12px 18px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        /* Bouton retour */
        .back-button {
            background-color: #f44336;
            margin-right: 12px;
        }

        /* Effet au survol des boutons */
        button:hover {
            background-color: #3f51b5;
            transform: translateY(-3px);
        }

        /* Effet au clic sur le bouton */
        button:active {
            transform: translateY(1px);
        }

        /* Affichage de l'image */
        .form-group img {
            margin-top: 10px;
            max-width: 200px;
        }

        /* Message d'erreur */
        .error {
            color: #f44336;
            font-size: 0.85rem;
            margin-top: 4px;
        }

        /* Responsivité mobile */
        @media (max-width: 768px) {
            body {
                padding: 8px;
            }

            .container {
                width: 100%;
                padding: 20px;
            }

            h1 {
                font-size: 1.6rem;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Modifier l'article</h1>

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="form-group">
                <label for="excerpt">Extrait</label>
                <textarea name="excerpt" class="form-control" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="datetime">Date de publication</label>
                <input type="datetime-local" name="datetime" class="form-control" value="{{ old('datetime', \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i')) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                @if($article->image)
                    <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="categories">Catégories</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            @if($article->categories->contains($category->id)) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Mettre à jour l'article</button>
            </div>
        </form>
    </div>

</body>
</html>
