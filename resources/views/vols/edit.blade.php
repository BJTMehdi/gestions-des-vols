@extends('layouts.app')

@section('title', 'Modifier un Vol')

@section('content')
<div class="container">
    <h1>Modifier un Vol</h1>

    <form action="{{ route('vols.update', $vol->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $vol->date }}" required>
        </div>

        <div class="mb-3">
            <label for="ville_depart" class="form-label">Ville de Départ</label>
            <input type="text" id="ville_depart" name="ville_depart" class="form-control" value="{{ $vol->ville_depart }}" required>
        </div>

        <div class="mb-3">
            <label for="ville_arrivee" class="form-label">Ville d'Arrivée</label>
            <input type="text" id="ville_arrivee" name="ville_arrivee" class="form-control" value="{{ $vol->ville_arrivee }}" required>
        </div>

        <div class="mb-3">
            <label for="pilote" class="form-label">Pilote</label>
            <input type="text" id="pilote" name="pilote" class="form-control" value="{{ $vol->pilote }}" required>
        </div>

        <div class="mb-3">
            <label for="avion" class="form-label">Avion</label>
            <input type="text" id="avion" name="avion" class="form-control" value="{{ $vol->avion }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('vols.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
