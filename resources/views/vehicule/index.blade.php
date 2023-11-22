@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des véhicules</h3>

        <div class="mt-4">
            {{--alert pour la création de vehicule--}}
            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                {{session()->get("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

          {{--alert pour la cloture de ticket--}}
          @if(session()->has("error"))
          <div class="alert alert-danger alert-dismissible fade show" role="alert"">
              {{session()->get("error")}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         @endif

            <div class="d-flex justify-content-start">
                <a href="{{route('admin.vehicule.create')}}" class="btn btn-success mb-4">Créer un véhicule</a>
            </div>
            @foreach($vehicules as $vehicule)
                <div class="card mb-4">
                    <div class="card-header"><strong>Immatriculation</strong> : {{ $vehicule->immatriculation }}</div>
                    <div class="card-body">
                        <p>Disponible : {{ $vehicule->disponible }}</p>
                        <p>Date achat : {{ $vehicule->date_achat }}</p>
                        <p>Type véhicule : {{ $vehicule->id_type_vehicule }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</div>
@endsection
