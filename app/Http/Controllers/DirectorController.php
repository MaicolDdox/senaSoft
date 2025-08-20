<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directores = User::role('director_grupo')->get();
        return view('container.director.index', compact('directores'));
    }

    public function create()
    {
        return view('container.director.create');
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

        $user->assignRole('director_grupo');

        return redirect()->route('directores.index')->with('success', 'Director creado correctamente.');
    }

    public function edit(User $directore)
    {
        return view('container.director.edit', compact('directore'));
    }

    public function update(Request $request, User $directore)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $directore->id,
        ]);

        $directore->update($request->only('name', 'email'));

        return redirect()->route('directores.index')->with('success', 'Director actualizado correctamente.');
    }

    public function destroy(User $directore)
    {
        $directore->delete();
        return redirect()->route('directores.index')->with('success', 'Director eliminado correctamente.');
    }
}
