<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'semillero_id',
        'director_id',
        'nombre',
        'descripcion',
        'fase_actual',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Un proyecto pertenece a un semillero
    public function semillero()
    {
        return $this->belongsTo(Semillero::class);
    }

    // Un proyecto tiene un director (usuario)
    public function director()
    {
        return $this->belongsTo(User::class, 'director_id');
    }

    // Un proyecto tiene muchas fases
    public function fases()
    {
        return $this->hasMany(ProjectFase::class);
    }

    // Relación N:M con usuarios (integrantes y director)
    public function integrantes()
    {
        return $this->belongsToMany(User::class, 'project_user')
                    ->withPivot('rol')
                    ->withTimestamps();
    }

    // Un proyecto puede tener eventos
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
