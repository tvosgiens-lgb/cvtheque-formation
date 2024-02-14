<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    // HAsFactory est un Trait. Les traits permettent à plusieurs classes
    // d’utiliser une même méthode. (problématique d'héritage multiple)
    // Factories (Usines / Fabriques). Pour Laravel, cela permet de peupler
    // les tables de données générées automatiquement. Création de jeux d'essai.
    use HasFactory;

    // Tous les modèles Eloquent sont protégés par défaut contre les vulnérabilités
    // d'affectation en masse (Envoi d'un tableau au modèle en une seule fois).
    // Il est possible de définir les rubriques acceptant cette assignation

    /**
     * Propriétés acceptant l'assignation.
     *
     * @var string[]
     */
    protected $fillable = [
        'intitule',
        'description',
    ];


    /**
     * Une compétence (modele) est partagée par plusieurs (belongsToMany) professionnels
     * (Modele professionnel)
     * récupération de tous les professionnels qui ont telle ou telle compétence
     *
     * ->withTimestamps() pour prendre en considération ces rubriques au sein de la table pivot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function professionnels(){

        return $this->belongsToMany(Professionnel::class)->withTimestamps();
    }


}
