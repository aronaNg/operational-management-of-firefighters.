<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeIncident;


class Incident extends Model
{
    use HasFactory;

    protected $fillable = [ 'ville','date_heure','id_type_incident'];

     public function typeIncident(){
        return $this->belongsTo(TypeIncident::class, 'id_type_incident');
    }
}
