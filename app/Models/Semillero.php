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
        'imagen'
    ];

    // Un semillero tiene muchos proyectos
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected static function booted()
{
    static::created(function ($semillero) {
        Event::create([
            'titulo' => "Semillero: {$semillero->titulo}",
            'descripcion' => "Descripccion: {$semillero->descripcion}",
            'fecha_inicio' => $semillero->created_at->format('Y-m-d'),
        ]);
    });

    static::deleted(function ($semillero) {
        // Borrar eventos que tengan proyectos de este semillero
        foreach ($semillero->projects as $project) {
            $project->events()->each(function ($event) {
                $event->delete();
            });
        }

        // Si quieres que el semillero mismo también tenga un evento propio
        Event::where('titulo', "Semillero: {$semillero->titulo}")->delete();
    });
}

}
