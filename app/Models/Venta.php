<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'producto_id',
        'cantidad',
        'precio',
        'total',
        'metodoPago_id'
    ];

    // Definición de la relación con Empleados
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    // Definición de la relación con Productos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    // Definición de la relación con Productos
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodoPago_id');
    }
}