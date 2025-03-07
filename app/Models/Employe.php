<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_emp';

    protected $fillable = [
        'PPR', 'Nom_emp', 'Prenom_emp', 'Id_aff'
    ];

    // public function entite_affectation()
    // {
    //     return $this->belongsTo(EntiteAffectation::class, 'Id_aff');
    // }
    public function entiteAffectation()
    {
        return $this->belongsTo(EntiteAffectation::class, 'Id_aff', 'Id_aff');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class, 'Id_emp');
    }
}
