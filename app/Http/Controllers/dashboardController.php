<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\ProjectFase;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Proyectos por fase
        $proyectosPorFase = ProjectFase::select('nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->pluck('total', 'nombre');
        // 2. Proyectos creados por mes (últimos 6 meses)
        $proyectosPorMes = Project::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        // 3. Usuarios por rol
        $usuariosPorRol = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name as role', DB::raw('count(model_has_roles.model_id) as total'))
            ->groupBy('roles.name')
            ->pluck('total', 'role');

        // 4. Eventos por mes (últimos 6 meses)
        $eventosPorMes = Event::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return view('layouts.dashboard', compact(
            'proyectosPorFase',
            'proyectosPorMes',
            'usuariosPorRol',
            'eventosPorMes'
        ));
    }
}
