<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('professionnels', function (Blueprint $table) {
            $table->string('cv')->nullable()->after('observation')->comment('Chemin vers le CV, fichier pdf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('professionnels', function (Blueprint $table) {
            $table->dropColumn('cv');
        });
    }
}
