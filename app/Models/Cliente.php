<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['identificacion','nombres','apellidos','telefono','direccion','correo','empresa_id','servicio_id','cliente_estado_id','pago_id'];

    public function empresa()
    {
       return $this->belongsTo(Empresa::class); //un Cliente pertenece a una empresa
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class); //un Cliente tiene muchos servicios
    }

    public function cliente_estado()
    {
        return $this->belongsTo(Cliente_estado::class); //un Cliente tiene un estado
    }

    public function pago()
{
    return $this->belongsTo(Pagos::class);
}
}
