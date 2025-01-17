<?php


namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::all();
        return view('vols.index', compact('vols'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'ville_depart' => 'required|string',
            'ville_arrivee' => 'required|string',
            'pilote' => 'required|string',
            'avion' => 'required|string',
        ]);

        Vol::create($request->all());
        return redirect()->route('vols.index')->with('success', 'Vol ajouté avec succès.');
    }
    public function create()
    {
        return view('vols.create');
    }

    public function edit($id)
    {
        $vol = Vol::findOrFail($id);
        return view('vols.edit', compact('vol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'ville_depart' => 'required|string',
            'ville_arrivee' => 'required|string',
            'pilote' => 'required|string',
            'avion' => 'required|string',
        ]);

        $vol = Vol::findOrFail($id);
        $vol->update($request->all());
        return redirect()->route('vols.index')->with('success', 'Vol modifié avec succès.');
    }

    public function destroy($id)
    {
        $vol = Vol::findOrFail($id);
        $vol->delete();
        return redirect()->route('vols.index')->with('success', 'Vol supprimé avec succès.');
    }
}
