<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passager;

class PassagerController extends Controller
{
    public function index()
    {
        $passagers = Passager::all();
        return view('passagers.index', compact('passagers'));
    }

    public function create()
    {
        return view('passagers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:10|unique:passagers',
            'date_naissance' => 'required|date',
        ]);

        Passager::create($request->all());
        return redirect()->route('passagers.index')->with('success', 'Passager ajouté avec succès.');
    }

    public function edit($id)
    {
        $passager = Passager::findOrFail($id);
        return view('passagers.edit', compact('passager'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:10|unique:passagers,cin,' . $id,
            'date_naissance' => 'required|date',
        ]);

        $passager = Passager::findOrFail($id);
        $passager->update($request->all());
        return redirect()->route('passagers.index')->with('success', 'Passager mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $passager = Passager::findOrFail($id);
        $passager->delete();
        return redirect()->route('passagers.index')->with('success', 'Passager supprimé avec succès.');
    }
}
