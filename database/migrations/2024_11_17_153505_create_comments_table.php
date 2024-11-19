<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment'); // Le contenu du commentaire
            $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Lien avec l'article
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien avec l'utilisateur (si vous utilisez l'authentification)
            $table->timestamps(); // Pour les dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
