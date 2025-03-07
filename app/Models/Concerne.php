<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerne extends Model
{
    use HasFactory;

    protected $primaryKey = ['Id_de', 'Id_c'];

    public $incrementing = false;

    protected $fillable = [
        'Id_de', 'Id_c', 'Debut_sauv', 'Fin_sauv'
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'Id_de');
    }

    public function camera()
    {
        return $this->belongsTo(Camera::class, 'Id_c');
    }
}
