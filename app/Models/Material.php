<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable=['nombre','cantidad','precio','servicio_id'];

    public function servicios()
    {
        return $this->belongsTo(Servicio::class); //un material pertenece a un servicio 
    }
}
