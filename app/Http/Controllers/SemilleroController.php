<?php

namespace App\Http\Controllers;

use App\Models\Semillero;
use Illuminate\Http\Request;

class SemilleroController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $q = trim($request->input('q', ''));

        $semilleros = Semillero::when($q, function ($query) use ($q) {
            $query->where('titulo', 'like', "%{$q}%")
                ->orWhere('descripcion', 'like', "%{$q}%");
        })
            ->latest('created_at')
            ->paginate(10)
            ->appends(['q' => $q]);

        return view('container.semilleros.index', compact('semilleros', 'q'));
    }


    public function create()
    {
        return view('container.semilleros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Semillero::create($request->all());

        return redirect()->route('semilleros.index')->with('success', 'Semillero creado correctamente.');
    }

    public function show(Semillero $semillero)
    {
        return view('container.semilleros.show', compact('semillero'));
    }

    public function edit(Semillero $semillero)
    {
        return view('container.semilleros.edit', compact('semillero'));
    }

    public function update(Request $request, Semillero $semillero)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $semillero->update($request->all());

        return redirect()->route('semilleros.index')->with('success', 'Semillero actualizado correctamente.');
    }

    public function destroy(Semillero $semillero)
    {
        $semillero->delete();
        return redirect()->route('semilleros.index')->with('success', 'Semillero eliminado correctamente.');
    }
}
