<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site des Articles Partagés</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Réinitialisation de certaines propriétés par défaut */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Définition du fond de la page avec un dégradé */
        body {
            height: 100vh; /* 100% de la hauteur de la fenêtre */
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            background: linear-gradient(135deg, #6e7bff, #00d2ff); /* Dégradé moderne */
            font-family: 'Poppins', sans-serif; /* Police moderne */
            color: #fff;
            flex-direction: column; /* Permet de mettre les éléments verticalement */
            text-align: center;
            overflow: hidden;
        }

        /* Style du conteneur principal */
        .content {
            width: 100%;
            max-width: 900px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9); /* Fond blanc semi-transparent pour lisibilité */
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px); /* Ajout de flou pour l'effet glassmorphism */
        }

        /* Titre principal */
        .big-title {
            font-size: 3rem; /* Taille du titre plus réduite */
            color: #007BFF; /* Couleur bleu du titre */
            font-weight: 700;
            margin-bottom: 20px;
            animation: slideIn 1s ease-out;
        }

        /* Animation du titre */
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Description du site */
        .description {
            font-size: 1.1rem;
            color: #444;
            line-height: 1.8;
            margin-bottom: 30px;
            animation: fadeIn 2s ease-in-out;
        }

        /* Animation de la description */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Section d'article */
        .article {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .article h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }

        .article p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        /* Style des boutons sous le titre */
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 8px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        /* Pour les écrans plus petits */
        @media (max-width: 768px) {
            .big-title {
                font-size: 2.5rem; /* Taille plus petite pour les petits écrans */
            }

            .content {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Titre principal -->
        <h1 class="big-title">Découvrez les articles partagés par notre communauté !</h1>
        
        <!-- Description du site -->
        <p class="description">
            Partagez vos articles, découvrez les publications des autres et échangez des idées avec notre communauté. Que vous soyez passionné par un sujet ou que vous souhaitiez simplement partager vos découvertes, ce site est fait pour vous !
        </p>

        <!-- Boutons sous le titre -->
        <div class="buttons">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn">S'inscrire</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
