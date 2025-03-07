<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Userr extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    protected $primaryKey = 'Id_u';

    protected $fillable = [
        'PPR',
        'Nom_u',
        'Prenom_u',
        'role',
        'username',
        'password',
    ];

    // Relations avec d'autres modèles
    public function demandes()
    {
        return $this->hasMany(Demande::class, 'id_u');
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'Id_u');
    }

    public function cameras()
    {
        return $this->hasMany(Camera::class, 'Id_u');
    }

    public function entite_affectations()
    {
        return $this->hasMany(EntiteAffectation::class, 'Id_u');
    }
}
