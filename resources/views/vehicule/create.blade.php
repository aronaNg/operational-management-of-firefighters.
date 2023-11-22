@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau véhicule</h3>

    <div class="mt-4">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{route('admin.vehicule.store')}}">
            @csrf
            <div class="mb-3">
                <label for="immatriculation" class="form-label">Immatriculation :</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation" required>

                <label for="disponible" class="form-label">Disponible :</label>
                <input type="text" class="form-control" id="disponible" name="disponible" required>

                <label for="typeVehicule" class="form-label">Liste des typeVehicules :</label>
                <select class="form-control" name="id_type_vehicule">
                    @foreach ($typeVehicules as $typeVehicule)
                    <option value="{{$typeVehicule->id}}">{{$typeVehicule->intitule}}</option>
                    @endforeach
                </select>
          </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{route('admin.vehicule')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>

@endsection
