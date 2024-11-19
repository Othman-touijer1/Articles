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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Le titre de l'article
            $table->text('excerpt'); // L'extrait de l'article
            $table->text('content'); // Le contenu complet de l'article
            $table->string('image')->nullable(); // Chemin de l'image associée
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Auteur de l'article (relation avec users)
            $table->timestamp('published_at')->nullable(); // Heure de publication
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
