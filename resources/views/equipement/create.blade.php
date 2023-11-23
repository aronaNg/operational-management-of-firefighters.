@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouvel équipement</h3>

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
            <form method="POST" action="{{route('admin.equipementprim.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>

                    <label for="disponible" class="form-label">Disponible :</label>
                    <input type="checkbox" id="disponible" name="disponible" checked> <br>


                    <label for="typeEquipement" class="form-label">Liste des typeEquipements :</label>
                    <select class="form-control" name="id_type_equipement">
                        @foreach ($typeEquipements as $typeEquipement)
                        <option value="{{$typeEquipement->id}}">{{$typeEquipement->intitule}}</option>
                        @endforeach
                    </select>
              </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('admin.equipementprim')}}" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    </div>

</div>
@endsection
