<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function store(Request $request)
    {
        Cita::create($request->all());

        return redirect()->back()->with('success', 'Cita guardada correctamente');
    }
    public function index()
    {
        $citas = Cita::all();
        return view('citas', compact('citas'));
    }
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->back()->with('success', 'Cita eliminada correctamente');
    }
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('editar_cita', compact('cita'));
    }
    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $cita->update($request->all());

        return redirect('/citas')->with('success', 'Cita actualizada correctamente');
    }
}
