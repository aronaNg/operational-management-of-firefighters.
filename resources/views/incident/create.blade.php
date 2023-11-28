@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau incident</h3>

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
            <form method="POST" action="{{route('admin.incidentprim.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville :</label>
                    <input type="text" class="form-control" id="ville" name="ville" required>

                    <label for="typeIncident" class="form-label">Liste des typeIncidents :</label>
                    <select class="form-control" name="id_type_incident">
                        @foreach ($typeIncidents as $typeIncident)
                        <option value="{{$typeIncident->id}}">{{$typeIncident->intitule}}</option>
                        @endforeach
                    </select>
              </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('admin.incidentprim')}}" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    </div>

</div>
@endsection
