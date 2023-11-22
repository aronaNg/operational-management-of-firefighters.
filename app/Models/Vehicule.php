<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeVehicule;
class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [ 'immatriculation', 'disponible','date_achat','id_type_vehicule'];

     public function typeVehicule(){
        return $this->belongsTo(TypeVehicule::class, 'id_type_vehicule');
    }
}
