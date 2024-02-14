<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = ['prenom', 'nom', 'cp', 'ville','telephone','email',
        'naissance','formation','domaine', 'source', 'observation', 'cv','metier_id'];


    /**
     * Un Professionnel ne possède qu'un seul métier (belongTo)
     * La méthode métier (singulier) permet de rechercher le métier du professionnel
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metier(){

        return $this->belongsTo(Metier::class);
    }

    /**
     * Un professionnel (modele) possède plusieurs (belongsToMany) competences (Modele competence)
     * récupération de toutes les compétences de tel ou tel professionnel
     *
     * ->withTimestamps() pour prendre en considération ces rubriques au sein de la table pivot
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function competences(){

        return $this->belongsToMany(Competence::class)->withTimestamps();

    }
}
