@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des équipements</h3>

        <div class="mt-4">
            {{--alert pour la création de equipement--}}
            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                {{session()->get("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

          @if(session()->has("error"))
          <div class="alert alert-danger alert-dismissible fade show" role="alert"">
              {{session()->get("error")}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         @endif

            <div class="d-flex justify-content-start">
                <a href="{{route('admin.equipementprim.create')}}" class="btn btn-success mb-4">Créer un équipement</a>
            </div>
            @foreach($equipements as $equipement)
                <div class="card mb-4">
                    <div class="card-header"><strong>Immatriculation</strong> : {{ $equipement->nom }}</div>
                    <div class="card-body">
                        <p>Disponible : {{ $equipement->disponible ? 'Oui' : 'Non' }}</p>
                        <p>Date achat: {{ \Carbon\Carbon::parse($equipement->date_achat)->format('d-m-Y') }}</p>

                        <p>Type équipement : {{ $equipement->typeEquipement->intitule }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</div>
@endsection
