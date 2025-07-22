<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        return view('turnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
            'dias_descanso' => 'required|string|max:100',
        ]);

        Turno::create($request->all());
        return redirect()->route('turnos.index')->with('success', 'Turno creado correctamente.');
    }

    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
            'dias_descanso' => 'required|string|max:100',
        ]);

        $turno->update($request->all());
        return redirect()->route('turnos.index')->with('success', 'Turno actualizado correctamente.');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index')->with('success', 'Turno eliminado correctamente.');
    }
}
