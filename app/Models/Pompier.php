<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disponibilite;
use App\Models\Competence;
use App\Models\Certification;

class Pompier extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom','adresse', 'competences', 'certifications'];

    public function disponibilites()
    {
        return $this->belongsToMany(Disponibilite::class, 'pompier_disponibilite');
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'pompier_competence');
    }

    public function certifications()
    {
        return $this->belongsToMany(Certification::class, 'pompier_certification');
    }
}
