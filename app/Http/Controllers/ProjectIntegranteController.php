<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectIntegranteController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        $q = trim($request->input('q', ''));

        $query = Project::with(['integrantes', 'director', 'semillero']);

        if ($user->hasRole('aprendiz_asociado')) {
            $query->whereHas('integrantes', function ($sub) use ($user) {
                $sub->where('user_id', $user->id);
            });
        } elseif ($user->hasRole('director_grupo')) {
            $query->where('director_id', $user->id);
        }

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('nombre', 'like', "%{$q}%")
                    ->orWhereHas('director', fn($d) => $d->where('name', 'like', "%{$q}%"))
                    ->orWhereHas('semillero', fn($s) => $s->where('titulo', 'like', "%{$q}%"))
                    ->orWhereHas('integrantes', fn($i) => $i->where('name', 'like', "%{$q}%"));
            });
        }

        $projects = $query->latest('created_at')
            ->paginate(5)
            ->appends(['q' => $q]);

        return view('container.project_integrantes.index', compact('projects', 'q'));
    }




    public function create()
    {
        // Traemos los proyectos y los aprendices
        $projects = Project::all();

        // Solo usuarios con rol "aprendiz_asociado"
        $aprendices = User::role('aprendiz_asociado')->get();

        return view('container.project_integrantes.create', compact('projects', 'aprendices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'integrantes'  => 'required|array',
            'integrantes.*' => 'exists:users,id',
        ]);

        $project = Project::findOrFail($request->project_id);

        // buscamos el rol aprendiz_asociado
        $rolAprendiz = \Spatie\Permission\Models\Role::where('name', 'aprendiz_asociado')->first();

        if (!$rolAprendiz) {
            return back()->withErrors(['rol' => 'El rol aprendiz_asociado no existe.']);
        }

        // Recorremos los aprendices seleccionados
        foreach ($request->integrantes as $integranteId) {
            // Verificamos si el aprendiz ya está en otro proyecto
            $proyectoExistente = \DB::table('project_user')
                ->where('user_id', $integranteId)
                ->where('project_id', '!=', $project->id)
                ->first();

            if ($proyectoExistente) {
                $aprendiz = \App\Models\User::find($integranteId);
                return back()->withInput()
                    ->withErrors([
                        'integrantes' => "El aprendiz {$aprendiz->name} ya está asociado a otro proyecto."
                    ]);
            }

            // Asociamos el aprendiz al proyecto
            $project->integrantes()->syncWithoutDetaching([
                $integranteId => ['rol' => $rolAprendiz->id]
            ]);
        }

        return redirect()->route('project_integrantes.index', $project->id)
            ->with('success', 'Integrantes asociados correctamente al proyecto.');
    }

    public function destroy($projectId, $aprendizId)
    {
        $project = Project::findOrFail($projectId);
        // Remueve la relación del aprendiz con el proyecto
        $project->integrantes()->detach($aprendizId);

        return redirect()->back()->with('success', 'Aprendiz eliminado del proyecto correctamente.');
    }
}
