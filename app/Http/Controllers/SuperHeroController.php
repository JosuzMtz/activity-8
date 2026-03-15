<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SuperHeroController extends Controller
{

    protected function validationRules()
    {
        return[
            'real_name' => 'required|string|max:100',
            'hero_name' => 'required|string|max:100',
            'photo_url' => 'nullable|url|max:500',
            'additional_info' => 'nullable|string'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate($this->validationRules());
        Superhero::create($request->all());
        return redirect()->route('superheroes.index')->with('success', 'superhéroe creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Superhero $superhero)
    {
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Superhero $superhero)
    {
        return view('superheroes.edit', compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Superhero $superhero)
    {
        //
        $request->validate($this->validationRules());
        $superhero->update($request->all());

        return redirect()->route('superheroes.show', $superhero)->with('success', 'superhéroe editado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Superhero $superhero)
    {
        //
        $superhero->delete();

        return redirect()->route('superheroes.index')
        ->with('success', 'superhéroe eliminado exitosamente');
    }
}