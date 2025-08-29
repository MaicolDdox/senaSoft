<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index()
    {
        $aprendices = User::role('aprendiz_asociado')->paginate(10);
        return view('container.integrantes.index', compact('aprendices'));
    }

    public function create()
    {
        return view('container.integrantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('aprendiz_asociado');

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz creado correctamente.');
    }

    public function edit($id)
    {
        $aprendiz = User::findOrFail($id);
    return view('container.integrantes.edit', compact('aprendiz'));
    }

    public function update(Request $request, $id)
    {
        $aprendiz = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $aprendiz->id,
        ]);

        $aprendiz->update($request->only('name', 'email'));

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        $aprendiz = User::findOrFail($id);
    $aprendiz->delete();
    return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}
