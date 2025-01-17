@extends('layouts.app')

@section('title', 'Ajouter une Réservation')

@section('content')
<div class="container">
    <h1>Ajouter une Réservation</h1>

    <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="vol_id" class="form-label">Vol</label>
            <select id="vol_id" name="vol_id" class="form-select" required>
                <option value="" disabled selected>-- Sélectionner un Vol--</option>
                @foreach ($vols as $vol)
                <option value="{{ $vol->id }}">{{ $vol->ville_depart }} → {{ $vol->ville_arrivee }} ({{ $vol->date }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="passager_id" class="form-label">Passager</label>
            <select id="passager_id" name="passager_id" class="form-select" required>
                <option value="" disabled selected>-- Sélectionner un Passager--</option>
                @foreach ($passagers as $passager)
                <option value="{{ $passager->id }}">{{ $passager->nom }} {{ $passager->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="num_siege" class="form-label">Numéro de Siège </label>
            <input type="text" id="num_siege" name="num_siege" class="form-control" value="{{ old('num_siege') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
