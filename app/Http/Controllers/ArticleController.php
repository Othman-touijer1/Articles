<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{ 
    public function home11()
    {
        return view('home'); 
    }    
    public function ajouterarticle()
    {
        return view('ajouter');
    }

}
