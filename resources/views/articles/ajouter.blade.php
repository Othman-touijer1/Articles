<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partager un Article</title>
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
            background-color: #2a3d47;;
            color: #333;
            display: flex;
            justify-content: center; /* Centrer horizontalement */
            align-items: center;     /* Centrer verticalement */
            height: 120vh;           /* Prendre toute la hauteur de la fenêtre */
            margin: 0;
            padding: 10px;           /* Réduire le padding global */
        }

        /* Formulaire */
        .form-container {
            background-color: #fff;
            border-radius: 8px;      /* Réduire le rayon des bords */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;           /* Réduire le padding du formulaire */
            width: 100%;
            max-width: 500px;        /* Réduire la largeur du formulaire */
            display: flex;
            flex-direction: column;
            gap: 12px;               /* Espacement entre les éléments */
        }

        /* Champs de saisie */
        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px;           /* Réduire le padding interne */
            border-radius: 8px;      /* Réduire le rayon des bords */
            border: 2px solid #e0e7ff;
            font-size: 0.9rem;       /* Réduire la taille de la police */
            color: #333;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            margin-top: 6px;
        }

        /* Animation de focus sur les champs de saisie */
        .form-container input:focus,
        .form-container textarea:focus,
        .form-container select:focus {
            border-color: #5c6bc0;
            box-shadow: 0 0 10px rgba(92, 107, 192, 0.4);
            outline: none;
            transform: scale(1.02);
        }

        /* Zone de texte */
        .form-container textarea {
            resize: vertical;
            min-height: 150px;       /* Réduire la hauteur minimum */
        }

        /* Champ de fichier */
        .form-container input[type="file"] {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            font-size: 0.9rem;        /* Réduire la taille de la police */
            padding: 10px;            /* Réduire le padding */
            border-radius: 8px;      /* Réduire le rayon des bords */
        }

        /* Boutons */
        .form-container button {
            padding: 10px 18px;      /* Réduire les espacements du bouton */
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 25px;     /* Réduire le rayon des bords */
            font-size: 0.95rem;       /* Réduire la taille de la police */
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s ease;
            margin-top: 16px;         /* Réduire l'espacement entre les boutons */
        }

        /* Bouton retour */
        .form-container .back-button {
            background-color: #f44336;
            margin-right: 12px;       /* Réduire l'espacement entre les boutons */
        }

        /* Effet au survol des boutons */
        .form-container button:hover {
            background-color: #3f51b5;
            transform: translateY(-3px);
        }

        /* Effet au clic sur le bouton */
        .form-container button:active {
            transform: translateY(1px);
        }

        /* Labels */
        .form-container label {
            font-size: 1rem;          /* Réduire la taille des labels */
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;       /* Réduire l'espacement sous le label */
            text-transform: capitalize;
        }

        /* Messages d'erreur */
        .error {
            color: #f44336;
            font-size: 0.85rem;       /* Réduire la taille du texte d'erreur */
            margin-top: 4px;
        }

        /* Responsivité mobile */
        @media (max-width: 768px) {
            body {
                padding: 8px;         /* Réduire le padding sur mobile */
            }

            .form-container {
                width: 100%;
                padding: 12px;        /* Réduire le padding du formulaire */
            }

            header h1 {
                font-size: 1.6rem;     /* Réduire la taille des titres */
            }

            .form-container button {
                width: 100%;           /* Rendre les boutons responsives */
            }
        }
    </style>
</head>

<body>

    <!-- Formulaire de partage d'article -->
    <div class="form-container">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Titre -->
            <div>
                <label for="title">Titre de l'article</label>
                <input type="text" id="title" name="title" required placeholder="Entrez le titre de l'article" aria-required="true" aria-describedby="titleHelp">
                <small id="titleHelp">Assurez-vous d'un titre clair et concis.</small>
            </div>

            <!-- Auteur -->
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" required placeholder="Entrez votre nom" aria-required="true" value="{{ Auth::user()->name }}">
            </div>

            <!-- Extrait -->
            <div>
                <label for="excerpt">Extrait</label>
                <textarea id="excerpt" name="excerpt" required placeholder="Entrez un extrait de votre article" aria-required="true"></textarea>
            </div>

            <!-- Contenu -->
            <div>
                <label for="content">Contenu de l'article</label>
                <textarea id="content" name="content" required placeholder="Rédigez le contenu complet de votre article" aria-required="true"></textarea>
            </div>

            <!-- Catégorie -->
            <div>
                <label for="category">Catégorie de l'article</label>
                <select id="category" name="category" required aria-required="true">
                    <option value="" disabled selected>Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
               
            </div>

            <!-- Image -->
            <div>
                <label for="image">Image de l'article</label>
                <input type="file" id="image" name="image" accept="image/*" aria-label="Choisir une image pour l'article">
            </div>

            <!-- Date et Heure -->
            <div>
                <label for="datetime">Date et Heure de publication</label>
                <input type="datetime-local" id="datetime" name="datetime" required>
            </div>

            <!-- Boutons -->
            <div style="display: flex; justify-content: space-between;">
                <!-- Bouton retour -->
                <a href="/home">
                    <button type="button" class="back-button" onclick="window.history.back();">Retour</button>
                </a>
                <!-- Bouton publier -->
                <button type="submit">Publier l'Article</button>
            </div>
        </form>
    </div>

</body>
</html>
