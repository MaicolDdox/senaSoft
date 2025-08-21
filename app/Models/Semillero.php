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

    protected static function booted()
{
    static::created(function ($semillero) {
        Event::create([
            'titulo' => "Semillero: {$semillero->name}",
            'descripcion' => "Creación del semillero",
            'fecha_inicio' => $semillero->created_at->format('Y-m-d'),
        ]);
    });
}

}
