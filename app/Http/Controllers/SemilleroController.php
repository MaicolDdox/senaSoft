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
            'titulo' => 'required|string|max:255|unique:semilleros,titulo',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        // Guardar la imagen en storage/app/public/semilleros
        $path = $request->file('imagen')->store('semilleros', 'public');

        // Crear semillero
        Semillero::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $path, // guardamos la ruta relativa
        ]);

        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero creado correctamente.');
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
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $data = $request->only(['titulo', 'descripcion']);

        // Si se subió una nueva imagen
        if ($request->hasFile('imagen')) {
            // Borrar imagen anterior si existe
            if ($semillero->imagen && \Storage::disk('public')->exists($semillero->imagen)) {
                \Storage::disk('public')->delete($semillero->imagen);
            }

            // Guardar nueva
            $path = $request->file('imagen')->store('semilleros', 'public');
            $data['imagen'] = $path;
        }

        $semillero->update($data);

        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero actualizado correctamente.');
    }


    public function destroy(Semillero $semillero)
    {
        // Borrar imagen asociada si existe
        if ($semillero->imagen && \Storage::disk('public')->exists($semillero->imagen)) {
            \Storage::disk('public')->delete($semillero->imagen);
        }

        $semillero->delete();

        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero eliminado correctamente.');
    }
}
