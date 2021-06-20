<?php

namespace App\Infrastructure\Models;

use App\Infrastructure\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'age', 'birthdate',
    ];

    public function etudiants() {
        return $this->hasMany(Etudiant::class);
    }
}
