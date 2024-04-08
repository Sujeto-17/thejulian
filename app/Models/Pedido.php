<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'producto_id',
        'descripcion',
        'cantidad',
        'precio',
        'total',
        'metodoPago_id',
        'factura',
        'status_id'
    ];

    // Definición de la relación con Clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

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

    // Definición de la relación con Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}