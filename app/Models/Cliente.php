<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfc',
        'razonSocial',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'regimenFiscal_id',
        'calle',
        'codigoPostal',
        'colonia',
        'nExterior',
        'nInterior',
        'localidad',
        'municipio',
        'entidadFederativa_id',
        'factura',
    ];

    // Definición de la relación con RegimenFiscal
    public function regimenFiscal()
    {
        return $this->belongsTo(RegimenFiscal::class, 'regimenFiscal_id');
    }


    // Definición de la relación con EntidadFederativa
    public function entidadFederativa()
    {
        return $this->belongsTo(EntidadFederativa::class, 'entidadFederativa_id');
    }
}
