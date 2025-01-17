@extends('layouts.app')

@section('title', 'Liste des Vols')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Vols</h1>
        <a href="{{ route('vols.create') }}" class="btn btn-primary">Ajouter un Vol</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Ville de Départ</th>
                <th>Ville d'Arrivée</th>
                <th>Pilote</th>
                <th>Avion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vols as $vol)
            <tr>
                <td>{{ $vol->id }}</td>
                <td>{{ $vol->date }}</td>
                <td>{{ $vol->ville_depart }}</td>
                <td>{{ $vol->ville_arrivee }}</td>
                <td>{{ $vol->pilote }}</td>
                <td>{{ $vol->avion }}</td>
                <td>
                    <a href="{{ route('vols.edit', $vol->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('vols.destroy', $vol->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce vol ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Aucun vol trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
