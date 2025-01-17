<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Vol;
use App\Models\Passager;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('vol', 'passager')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $vols = Vol::all();
        $passagers = Passager::all();
        return view('reservations.create', compact('vols', 'passagers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vol_id' => 'required|exists:vols,id',
            'passager_id' => 'required|exists:passagers,id',
            'num_siege' => 'required|string|max:5',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation ajoutée avec succès.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $vols = Vol::all();
        $passagers = Passager::all();
        return view('reservations.edit', compact('reservation', 'vols', 'passagers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vol_id' => 'required|exists:vols,id',
            'passager_id' => 'required|exists:passagers,id',
            'num_siege' => 'required|string|max:5',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
