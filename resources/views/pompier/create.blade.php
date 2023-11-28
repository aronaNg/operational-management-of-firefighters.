<!-- resources/views/pompiers/create.blade.php -->

@extends('layouts.user')

@section('content')
    <div class="container">
        <h2>Ajouter un Pompier</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pompier.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="certifications">Certifications:</label>
                <select name="certifications[]" id="certifications" class="form-control" multiple>
                    @foreach ($certifications as $certification)
                        <option value="{{ $certification->id }}">{{ $certification->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="disponibilites">Disponibilités:</label>
                <select name="disponibilites[]" id="disponibilites" class="form-control" multiple>
                    @foreach ($disponibilites as $disponibilite)
                        <option value="{{ $disponibilite->id }}">{{ $disponibilite->jour_semaine }} - {{ $disponibilite->horaire_debut }} à {{ $disponibilite->horaire_fin }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="competences">Compétences:</label>
                <select name="competences[]" id="competences" class="form-control" multiple>
                    @foreach ($competences as $competence)
                        <option value="{{ $competence->id }}">{{ $competence->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Pompier</button>
        </form>
    </div>
@endsection
