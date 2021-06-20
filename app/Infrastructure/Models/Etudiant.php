<?php

namespace App\Infrastructure\Models;

use App\Infrastructure\Models\User;
use App\Infrastructure\Models\Personne;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'personne_id', 'school', 'level',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function personne() {
        return $this->belongsTo(Personne::class);
    }
}
