@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Passager</h1>
    <form action="{{ route('passagers.update', $passager->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $passager->nom }}" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $passager->prenom }}" required>
        </div>
        <div class="form-group">
            <label>CIN</label>
            <input type="text" name="cin" class="form-control" value="{{ $passager->cin }}" required>
        </div>
        <div class="form-group">
            <label>Date de Naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ $passager->date_naissance }}" required>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if ($passager->photo)
                <img src="{{ asset('storage/' . $passager->photo) }}" alt="Photo" width="50">
            @endif
        </div>
        <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
