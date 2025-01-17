@extends('layouts.app')

@section('title', 'Liste des Passagers')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Passagers</h1>
        <a href="{{ route('passagers.create') }}" class="btn btn-primary">Ajouter un Passager</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Date de Naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($passagers as $passager)
            <tr>
                <td>{{ $passager->id }}</td>
                <td>{{ $passager->nom }}</td>
                <td>{{ $passager->prenom }}</td>
                <td>{{ $passager->cin }}</td>
                <td>{{ $passager->date_naissance }}</td>
                <td>
                    <a href="{{ route('passagers.edit', $passager->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('passagers.destroy', $passager->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce passager ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Aucun passager trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
