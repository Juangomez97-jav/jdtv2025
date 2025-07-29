<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $fillable=['monto','mes','pagado','cliente_id','servicio_id'];

    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class); //un pago pertenece a un cliente
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class); //un pago tiene muchos servicios
    }
}
