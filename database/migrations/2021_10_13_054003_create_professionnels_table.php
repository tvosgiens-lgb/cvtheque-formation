<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('professionnels', function (Blueprint $table) {
            $table->id()->comment('Identifiant du professionnel');
            $table->string('prenom',25)->comment('Prénom du professionnel');
            $table->string('nom',40)->comment('Nom du professionnel');
            $table->string('cp',5)->comment('Code postal lieu d\'habitation');
            $table->string('ville',38)->comment('Lieu d\'habitation');
            $table->string('telephone',14)->comment('Téléphone fixe ou mobile');
            $table->string('email',255)->unique()->comment('Adresse email du professionnel');
            $table->date('naissance')->comment('Date de naissance du professionnel');
            $table->boolean('formation')->default(0)->comment('Activité de formation déjà effectuée : oui - non');
            $table->set('domaine', ['S', 'R', 'D'])->comment('Domaine d\'activité : Système, réseau et/ou développement');
            $table->string('source', 255)->nullable()->comment('Source profil (Réseau, organisme partenaire, annonce ,...');
            $table->text('observation')->nullable()->comment('Commentaires /observations');
            $table->timestamps();
            $table->unsignedBigInteger('metier_id');
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('professionnels');
    }
}
