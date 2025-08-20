<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectIntegranteController extends Controller
{
    public function index(Project $project)
    {
        $integrantes = $project->integrantes;
        return view('projects.integrantes.index', compact('project','integrantes'));
    }

    public function create(Project $project)
    {
        $usuarios = User::role('aprendiz_asociado')->get();
        return view('projects.integrantes.create', compact('project','usuarios'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project->integrantes()->attach($request->user_id, ['rol'=>'integrante']);

        return redirect()->route('projects.integrantes.index',$project)->with('success', 'Integrante asignado al proyecto.');
    }

    public function destroy(Project $project, User $user)
    {
        $project->integrantes()->detach($user->id);
        return redirect()->route('projects.integrantes.index',$project)->with('success', 'Integrante eliminado del proyecto.');
    }
}
