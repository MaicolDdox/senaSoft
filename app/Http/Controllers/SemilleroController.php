<?php

namespace App\Http\Controllers;

use App\Models\Semillero;
use Illuminate\Http\Request;

class SemilleroController extends Controller
{
    public function index()
    {
        $semilleros = Semillero::paginate(10); // Puedes ajustar el número de elementos por página
    return view('container.semilleros.index', compact('semilleros'));
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
