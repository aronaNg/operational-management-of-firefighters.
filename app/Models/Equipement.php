<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEquipement;
class Equipement extends Model
{
    use HasFactory;
    protected $fillable = [ 'nom', 'disponible','date_achat','id_type_equipement'];

     public function typeEquipement(){
        return $this->belongsTo(TypeEquipement::class, 'id_type_equipement');
    }
}
