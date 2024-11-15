<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Réinitialisation des marges et paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styles généraux */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 100%;
    max-width: 500px;
}

h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Style du formulaire */
.form-modification {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"], 
textarea, 
select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"]:focus, 
textarea:focus, 
select:focus {
    border-color: #4caf50;
    outline: none;
}

textarea {
    resize: vertical;
}

button.btn-submit {
    padding: 12px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #4caf50;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button.btn-submit:hover {
    background-color: #45a049;
}

</style>
<!-- <body>
    <div class="container">
        <h1>Modifier une catégorie</h1>
        <form action="{{ route('categorie.edit', $category->id) }}" method="GET">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="categorie_nom">Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="Entrez le nom de la catégorie" required>

            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn-submit">Sauvegarder les modifications</button>
        </form>
    </div>
</body> -->
<body>
    <div class="container">
        <h1>Modifier une catégorie</h1>
    
        <form action="{{ route('categorie.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="categorie_nom">Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="Entrez le nom de la catégorie" required>
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn-submit">Sauvegarder les modifications</button>
        </form>
    </div>
</body>

</html>
