<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pompier;

class Disponibilite extends Model
{
    protected $fillable = ['horaire_debut', 'horaire_fin', 'jour_semaine'];

    public function pompiers()
    {
        return $this->belongsToMany(Pompier::class, 'pompier_disponibilite');
    }
}
