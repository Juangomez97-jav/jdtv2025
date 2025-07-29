<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_estado extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class); //un cliente_estado tiene muchos clientes
    }
}
