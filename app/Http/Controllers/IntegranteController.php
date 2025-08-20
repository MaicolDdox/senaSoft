<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IntegranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('container.integrantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('container.integrantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $integrante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $integrante)
    {
        return view('container.integrantes.edit', compact('integrante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $integrante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $integrante)
    {
        //
    }
}
