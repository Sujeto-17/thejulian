<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombreSucursal',
        'calle',
        'codigoPostal',
        'colonia',
        'municipio',
        'localidad',
        'entidadFederativa_id',
        'referencias'
    ];

    // Definición de la relación con EntidadFederativa
    public function entidadFederativa()
    {
        return $this->belongsTo(EntidadFederativa::class, 'entidadFederativa_id');
    }
}
