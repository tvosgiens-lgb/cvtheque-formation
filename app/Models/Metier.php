<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    /**
     * Propriétés acceptant l'assignation.
     *
     * @var string[]
     */
    protected $fillable = [
        'libelle',
        'slug',
        'description',
    ];

    /**
     * Un Métier est associé à plusieurs professionnels (hasMany)
     * la méthode est écrite au pluriel !
     * Cette méthode récupère les professionnels d'un métier
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professionnels(){

        return $this->hasMany(Professionnel::class);
    }
}
