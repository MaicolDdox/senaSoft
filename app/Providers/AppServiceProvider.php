<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Event;
use App\Observers\EventObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Project;
use App\Models\ProjectFase;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::observe(EventObserver::class);
        Paginator::useTailwind();

         View::composer('layouts.dashboard', function ($view) {
        $proyectosPorFase = ProjectFase::select('nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->pluck('total', 'nombre');

        $proyectosPorMes = Project::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        $usuariosPorRol = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name as role', DB::raw('count(model_has_roles.model_id) as total'))
            ->groupBy('roles.name')
            ->pluck('total', 'role');

        $eventosPorMes = Event::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        $view->with(compact('proyectosPorFase', 'proyectosPorMes', 'usuariosPorRol', 'eventosPorMes'));
    });
    }


}
