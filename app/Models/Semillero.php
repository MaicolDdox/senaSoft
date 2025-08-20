<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillero extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
    ];

    // Un semillero tiene muchos proyectos
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
