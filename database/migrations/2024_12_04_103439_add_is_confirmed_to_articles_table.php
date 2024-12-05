<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Ajouter une colonne is_confirmed (de type booléen ou entier)
            $table->boolean('is_confirmed')->default(false);
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Supprimer la colonne si on annule la migration
            $table->dropColumn('is_confirmed');
        });
    }

};
