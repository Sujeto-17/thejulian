<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'correo',
        'categoria_id',
        'status'
    ];

    // Definición de la relación con Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}