@extends('layouts.app')

@section('title', 'Ajouter un Passager')

@section('content')
<div class="container">
    <h1>Ajouter un Passager</h1>

    <form action="{{ route('passagers.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
        </div>

        <div class="mb-3">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" id="cin" name="cin" class="form-control" value="{{ old('cin') }}" required>
        </div>

        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('passagers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
