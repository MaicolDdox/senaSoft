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
        $projects = Project::with(['semillero', 'director'])->paginate(10);
        return view('container.projects.index', compact('projects'));
    }

    public function create()
    {
        $semilleros = \App\Models\Semillero::all();
        return view('container.projects.create', compact('semilleros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'semillero_id' => 'required|exists:semilleros,id',
            'fecha_fin' => 'nullable|date|after:today',
        ]);

        Project::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'semillero_id' => $request->semillero_id,
            'director_id' => auth()->id(),
            'fase_actual' => 'propuesta', // siempre inicia en propuesta
            'fecha_inicio' => now(), // se asigna automáticamente
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyecto creado correctamente.');
    }


    public function show(Project $project)
    {
        $project->load(['fases', 'integrantes', 'semillero', 'director']);
        return view('container.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $semilleros = Semillero::all();
        return view('container.projects.edit', compact('project', 'semilleros'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_fin' => 'nullable|date|after_or_equal:' . $project->fecha_inicio,
        ]);

        $project->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }

    public function advance(Request $request, Project $project)
    {
        $request->validate([
            'fecha_fin' => 'required|date|after_or_equal:' . $project->fecha_inicio,
        ]);

        $fases = ['propuesta', 'analisis', 'diseño', 'desarrollo', 'prueba', 'implantacion'];
        $faseActualIndex = array_search($project->fase_actual, $fases);

        if ($faseActualIndex === false) {
            return redirect()->back()->with('error', 'Fase actual inválida.');
        }

        // Obtener la fase actual registrada en historial
        $faseActual = $project->fases()->where('nombre', $project->fase_actual)->latest()->first();

        // ✅ Siempre cerrar la fase actual con la fecha enviada
        if ($faseActual && !$faseActual->fecha_fin) {
            $faseActual->update(['fecha_fin' => $request->fecha_fin]);
        }

        // Si la fase actual NO es la última -> avanzar
        if ($faseActualIndex < count($fases) - 1) {
            $nuevaFase = $fases[$faseActualIndex + 1];

            // actualizar en el proyecto
            $project->update(['fase_actual' => $nuevaFase]);

            // crear nuevo registro en historial
            $project->fases()->create([
                'nombre'       => $nuevaFase,
                'fecha_inicio' => now(), // inicia en el momento del avance
            ]);

            return redirect()->route('projects.show', $project)
                ->with('success', 'Proyecto avanzado a la fase: ' . $nuevaFase);
        }

        // ✅ Si ya está en la última fase, solo se cierra (sin crear nueva)
        // Opcional: también puedes cerrar el proyecto
        $project->update([
            'fecha_fin' => $request->fecha_fin // guarda la fecha de cierre del proyecto
        ]);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Proyecto finalizado en la fase: ' . $project->fase_actual);
    }



    // Reporte
    public function report()
    {
        $projects = Project::with(['fases', 'semillero'])->get();
        return view('projects.report', compact('projects'));
    }
}
