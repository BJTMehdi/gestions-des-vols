@extends('layouts.app')

@section('title', 'Liste des Réservations')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Réservations</h1>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">Ajouter une Réservation</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Vol</th>
                <th>Passager</th>
                <th>Numéro de Siège</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->vol->ville_depart }} → {{ $reservation->vol->ville_arrivee }}</td>
                <td>{{ $reservation->passager->nom }} {{ $reservation->passager->prenom }}</td>
                <td>{{ $reservation->num_siege }}</td>
                <td>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette réservation ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Aucune réservation trouvée</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
