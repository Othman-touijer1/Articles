<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partager un Article</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style global */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #5A6DFF, #2AC6FF); /* Dégradé subtil */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            margin: 0;
            padding: 10px;
            flex-direction: column; /* Permet de centrer le titre et le formulaire verticalement */
        }

        /* Titre en haut de la page */
        header {
            width: 100%;
            text-align: center;
            margin-bottom: 30px; /* Espacement entre le titre et le formulaire */
        }

        header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2a3d47;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Formulaire */
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 900px; /* Augmenter la largeur du formulaire */
            display: flex;
            flex-direction: column;
            gap: 12px;
            opacity: 0; /* Initialement invisible */
            animation: fadeIn 1s forwards 1s; /* Animation d'apparition après 1 seconde */
        }

        /* Animation de fondu */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Disposition des champs en 2 colonnes */
        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* Espace entre les deux colonnes */
        }

        /* Conteneur des champs */
        .form-column {
            flex: 1;
        }

        /* Champs de saisie */
        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #e0e7ff;
            font-size: 0.9rem;
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
            min-height: 150px;
        }

        /* Champ de fichier */
        .form-container input[type="file"] {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            font-size: 0.9rem;
            padding: 10px;
            border-radius: 8px;
        }

        /* Boutons */
        .form-container button {
            padding: 10px 18px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s ease;
            margin-top: 16px;
        }

        /* Bouton retour */
        .form-container .back-button {
            background-color: #f44336;
            margin-right: 12px;
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
            font-size: 1rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
            text-transform: capitalize;
        }

        /* Messages d'erreur */
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

            .form-container {
                width: 100%;
                padding: 12px;
            }

            .form-container button {
                width: 100%;
            }

            .form-row {
                flex-direction: column;
            }

            .form-column {
                flex: none;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Titre en haut de la page -->
    <header>
        <h1>Ajouter un Article</h1>
    </header>

    <div class="form-container">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Première ligne de champs -->
            <div class="form-row">
                <div class="form-column">
                    <div>
                        <label for="title">Titre de l'article</label>
                        <input type="text" id="title" name="title" required placeholder="Entrez le titre de l'article" aria-required="true" aria-describedby="titleHelp">
                        <small id="titleHelp">Assurez-vous d'un titre clair et concis.</small>
                    </div>

                    <div>
                        <label for="author">Auteur</label>
                        <input type="text" id="author" name="author" required placeholder="Entrez votre nom" aria-required="true" value="{{ Auth::user()->name }}">
                    </div>

                    <div>
                        <label for="excerpt">Extrait</label>
                        <textarea id="excerpt" name="excerpt" required placeholder="Entrez un extrait de votre article" aria-required="true"></textarea>
                    </div>
                </div>

                <!-- Deuxième colonne -->
                <div class="form-column">
                    <div>
                        <label for="content">Contenu de l'article</label>
                        <textarea id="content" name="content" required placeholder="Rédigez le contenu complet de votre article" aria-required="true"></textarea>
                    </div>

                    <div>
                        <label for="category">Catégorie de l'article</label>
                        <select id="category" name="category" required aria-required="true">
                            <option value="" disabled selected>Sélectionnez une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="image">Image de l'article</label>
                        <input type="file" id="image" name="image" accept="image/*" aria-label="Choisir une image pour l'article">
                    </div>
                </div>
            </div>

            <div>
                <label for="datetime">Date et Heure de publication</label>
                <input type="datetime-local" id="datetime" name="datetime" required>
            </div>
            <!-- <label for="email_delay">Délai avant envoi de l'email (en minutes)</label>
            <input type="number" name="email_delay" id="email_delay" min="1" value="1" required> -->

            <div style="display: flex; justify-content: space-between;">
                <a href="/home">
                    <button type="button" class="back-button" onclick="window.history.back();">Retour</button>
                </a>
                <button type="submit">Publier l'Article</button>
            </div>
        </form>
    </div>

</body>
</html>
