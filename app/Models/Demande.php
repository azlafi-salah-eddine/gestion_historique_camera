<?php
namespace App\Models;

use App\Models\Employe;
use App\Models\Concerne;
use App\Models\Userr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_de';

    protected $fillable = [
        'Objet',
        'Reff',
        'Sauvegarder',
        'But',
        'Date_operation',
        'id_u',
        'Id_emp'
    ];

    public function userr()
    {
        return $this->belongsTo(Userr::class, 'id_u');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'Id_emp');
    }

    public function concernes()
    {
        return $this->hasMany(Concerne::class, 'Id_de');
    }

    public function cameras()
    {
        return $this->belongsToMany(Camera::class, 'concernes', 'Id_de', 'Id_c');
    }

    public function getNomCameras()
    {
        return $this->cameras->pluck('Nom_c')->implode(', ');
    }

    public function getDebutEnregistrements()
    {
        return $this->concernes->pluck('Debut_sauv')->implode(', ');
    }

    public function getFinEnregistrements()
    {
        return $this->concernes->pluck('Fin_sauv')->implode(', ');
    }
}
