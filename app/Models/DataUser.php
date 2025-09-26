<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'numero_documento',
        'genero',
        'rh',
        'eps',
        'telefono',
        'tipo_programa',
        'programa_formacion',
        'ficha_programa',
        'apoyos',
        'formato_registro',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
