<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaDeEquipo extends Model
{
    use HasFactory;
    protected $table =  'entradadeequipos';

    protected $fillable = [
        'tipodedocumento',
        'descripcionequipo',
        'consecutivo',
        'nit',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'serial',
        'modelo',
        'idcliente',
        'idtecnico',
        'idmarca',
        'idtipodeequipo',
        'fechadereporte',
        'reporte',
        'observaciones',
        'rutafirma',
        'anticipo',
        'estado',
        'estado01',
        'estado02',
        'estado03',
        'usuario_created',
        'usuario_updated',
    ];
}
