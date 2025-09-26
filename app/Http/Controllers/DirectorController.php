<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        $liderSemilleros = User::role('lider_semilleros')
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            })
            ->latest('created_at')
            ->paginate(10)
            ->appends(['q' => $q]);

        return view('container.director.index', compact('liderSemilleros', 'q'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$directore->id,
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        // Si enviaron password, la encriptamos y la añadimos
        if (! empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

         $directore->update($data);

        return redirect()->route('directores.index')->with('success', 'Director actualizado correctamente.');
    }

    public function destroy(User $directore)
    {
        $directore->delete();

        return redirect()->route('directores.index')->with('success', 'Director eliminado correctamente.');
    }
}
