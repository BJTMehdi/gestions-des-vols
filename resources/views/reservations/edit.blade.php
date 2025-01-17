@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Réservation</h1>
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Vol</label>
            <select name="vol_id" class="form-control" required>
                @foreach ($vols as $vol)
                    <option value="{{ $vol->id }}" {{ $reservation->vol_id == $vol->id ? 'selected' : '' }}>
                        {{ $vol->ville_depart }} → {{ $vol->ville_arrivee }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Passager</label>
            <select name="passager_id" class="form-control" required>
                @foreach ($passagers as $passager)
                    <option value="{{ $passager->id }}" {{ $reservation->passager_id == $passager->id ? 'selected' : '' }}>
                        {{ $passager->nom }} {{ $passager->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Numéro de Siège</label>
            <input type="text" name="num_siege" class="form-control" value="{{ $reservation->num_siege }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
