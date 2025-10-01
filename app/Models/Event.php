<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'project_id',
    ];

    // Un evento puede estar asociado a un proyecto
    //public function project()
    //{
    //    return $this->belongsTo(Project::class);
    //}
}
