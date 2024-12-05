<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Created</title>
</head>
<body>
    <h1>Un nouvel article a été créé</h1>
    <p><strong>Titre :</strong> {{ $article->title }}</p>
    <p><strong>Extrait :</strong> {{ $article->excerpt }}</p>
    <p><strong>Contenu :</strong> {{ $article->content }}</p>
</body>
</html>
