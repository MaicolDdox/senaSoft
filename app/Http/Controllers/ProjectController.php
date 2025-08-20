<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Semillero;
use App\Models\ProjectFase;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['semillero','director'])->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $semilleros = Semillero::all();
        return view('projects.create', compact('semilleros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semillero_id' => 'required|exists:semilleros,id',
            'director_id' => 'required|exists:users,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $project = Project::create($request->all());

        // Registrar la fase inicial
        ProjectFase::create([
            'project_id' => $project->id,
            'nombre' => 'propuesta',
            'fecha_inicio' => now(),
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function show(Project $project)
    {
        $project->load(['fases','integrantes','semillero','director']);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $semilleros = Semillero::all();
        return view('projects.edit', compact('project','semilleros'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }

    // Avanzar fase (solo Director)
    public function advance(Request $request, Project $project)
    {
        $fases = ['propuesta','analisis','diseño','desarrollo','prueba','implantacion'];

        $faseActualIndex = array_search($project->fase_actual, $fases);

        if ($faseActualIndex === false || $faseActualIndex === count($fases) - 1) {
            return redirect()->back()->with('error', 'El proyecto ya está en la última fase.');
        }

        // cerrar fase actual
        $faseActual = $project->fases()->where('nombre',$project->fase_actual)->latest()->first();
        if ($faseActual && !$faseActual->fecha_fin) {
            $faseActual->update(['fecha_fin' => now()]);
        }

        // avanzar a la siguiente
        $nuevaFase = $fases[$faseActualIndex + 1];
        $project->update(['fase_actual' => $nuevaFase]);

        $project->fases()->create([
            'nombre' => $nuevaFase,
            'fecha_inicio' => now(),
        ]);

        return redirect()->route('projects.show',$project)->with('success', 'Proyecto avanzado a la fase: '.$nuevaFase);
    }

    // Reporte
    public function report()
    {
        $projects = Project::with(['fases','semillero'])->get();
        return view('projects.report', compact('projects'));
    }
}
