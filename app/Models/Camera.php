<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_c';

    protected $fillable = [
        'Nom_c', 'Site', 'Etage', 'Description'
    ];

    public function concernes()
    {
        return $this->hasMany(Concerne::class, 'Id_c');
    }
}
