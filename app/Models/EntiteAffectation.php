<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntiteAffectation extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_aff';

    protected $fillable = [
        'Nom'
    ];

    public function employes()
    {
        return $this->hasMany(Employe::class, 'Id_aff');
    }
}
