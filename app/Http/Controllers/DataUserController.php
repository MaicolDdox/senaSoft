<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    // Mostrar formulario con los datos del usuario logueado
    public function edit()
    {
        $dataUser = auth()->user()->dataUser; // puede ser null si no existe
        return view('container.account.index', compact('dataUser'));
    }

    // Guardar o actualizar
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'tipo_documento'     => 'required',
            'numero_documento'   => 'required',
            'genero'             => 'required|string|max:50',
            'rh'                 => 'required|string|max:5',
            'eps'                => 'required|string|max:255',
            'telefono'           => 'required|string|max:20',
            'tipo_programa'      => 'required|in:tecnico,tecnologo,complementaria',
            'programa_formacion' => 'required|string|max:255',
            'ficha_programa'     => 'required|string|max:255',
            'apoyos'             => 'nullable|string|max:255',
            'formato_registro'   => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('formato_registro')) {
            $validated['formato_registro'] = $request
                ->file('formato_registro')
                ->store('data_users', 'public');
        }

        // crea o actualiza en una sola llamada
        $request->user()->dataUser()
            ->updateOrCreate([], $validated);

        return redirect()->back()->with('success', 'Datos guardados correctamente.');
    }
}
