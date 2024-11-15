<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function afficher()
    {
        $categories = Category::all();
        return view('categories.affiche', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create($request->all());
        
        return redirect()->route('categorie.store')->with('success', 'Category created successfully.');
    }  
    public function edit($id)
    {
        // Récupérer la catégorie par son ID, ou une erreur 404 si elle n'existe pas
        $category = Category::findOrFail($id);

        // Retourner la vue avec la catégorie à modifier
        return view('categories.editer', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('afficher')->with('success', 'Catégorie mise à jour avec succès');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('afficher')->with('success', 'Catégorie supprimée avec succès');
    }







    

}