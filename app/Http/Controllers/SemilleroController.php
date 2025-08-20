<?php

namespace App\Http\Controllers;

use App\Models\Semillero;
use Illuminate\Http\Request;

class SemilleroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('container.semilleros.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('container.semilleros.create');
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
    public function show(Semillero $semillero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semillero $semillero)
    {
        return view('container.semilleros.edit', compact('semillero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semillero $semillero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semillero $semillero)
    {
        //
    }
}
