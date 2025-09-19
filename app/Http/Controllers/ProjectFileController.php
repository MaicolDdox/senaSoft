<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    // Subir archivo
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:zip,rar,7z,tar,gz',
        ]);

        $file = $request->file('archivo');
        $path = $file->store('projects_files', 'public');

        $project->files()->create([
            'nombre_original' => $file->getClientOriginalName(),
            'ruta' => $path,
        ]);

        return back()->with('success', 'Archivo agregado correctamente.');
    }

    // Descargar (opcional: forzar descarga)
    public function download(ProjectFile $file)
    {
        return Storage::disk('public')->download($file->ruta, $file->nombre_original);
    }

    // Eliminar archivo
    public function destroy(ProjectFile $file)
    {
        if (Storage::disk('public')->exists($file->ruta)) {
            Storage::disk('public')->delete($file->ruta);
        }
        $file->delete();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }
}

