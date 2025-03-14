<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'estado',
        'usuario_created',
        'usuario_updated',
    ];
}

