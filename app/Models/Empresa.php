<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable=['nombre','sede','descripcion'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class); //una empresa tiene muchos servicios
    }
}
