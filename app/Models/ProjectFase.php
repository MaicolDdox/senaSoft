<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFase extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Una fase pertenece a un proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
