<?php

namespace App\Http\Controllers;

use App\Models\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    public function index()
    {
        // Chercher le premier paramètre d'email
        $settings = EmailSetting::first();

        // Retourner la vue avec les paramètres existants
        return view('home.settings', compact('settings'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email_delay' => 'required|integer|min:1',
            'email_content' => 'nullable|string',
        ]);

        // Si les paramètres existent déjà, on met à jour, sinon on crée
        $settings = EmailSetting::first() ?? new EmailSetting();
        $settings->email_delay = $request->input('email_delay');
        $settings->email_content = $request->input('email_content');
        $settings->save();

        // Retourner avec un message de succès
        return redirect()->route('email.settings.index')->with('success', 'Les paramètres ont été mis à jour.');
    }
}

