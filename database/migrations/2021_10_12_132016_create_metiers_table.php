<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('metiers', function (Blueprint $table) {
            $table->id()->comment('Identifiant d\'un métier');
            $table->string('libelle', 120)->comment('Nom du métier');
            $table->string('slug', 120)->unique()->comment('slug-du-metier');
            $table->text('description')->comment('court descriptif du metier');
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
        Schema::dropIfExists('metiers');
    }
}
