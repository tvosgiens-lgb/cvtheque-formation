<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('competences', function (Blueprint $table) {
            // Par défaut la rubrique id() est une méthode pour la création
            // d'une rubrique nomméee id de type bigint de 20, UNSIGNED, NOT NULL, AI et = à FK
            $table->id()
                ->comment('Identifiant d\'une compétence');

            $table->string('intitule', 120)
                ->comment('Nom de la compétence');

            $table->text('description')
                ->comment('Court descriptif d\'une competence');

            // timestamps() est une méthode pour la création de 2 rubriques
            // created_at et updated_at de type timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
}
