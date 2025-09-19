<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'nombre_original',
        'ruta',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
