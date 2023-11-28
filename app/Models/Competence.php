<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pompier;

class Competence extends Model
{
    protected $fillable = ['nom'];

    // Relation avec les pompiers
    public function pompiers()
    {
        return $this->belongsToMany(Pompier::class);
    }
}
