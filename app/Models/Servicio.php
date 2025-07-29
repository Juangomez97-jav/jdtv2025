<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable=['nombre','precio','empresa_id','material_id','pago_id'];

    public function empresa()
    {
       return $this->belongsTo(Empresa::class); //un servicio pertenece a una empresa
    }

    public function material()
    {
        return $this->hasMany(Material::class); //una Servicio tiene muchos materiales
    }

    public function pago()
    {
        return $this->belongsTo(Pagos::class);//un pago tiene muchos servicios
    }
}
