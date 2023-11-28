@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des incidents</h3>

        <div class="mt-4">
            {{--alert pour la création de vehicule--}}
            @if(session()->has("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get("success") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get("error") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.incidentprim.create') }}" class="btn btn-success mb-4">Ajouter un incident</a>
            </div>

            <table class="table table-striped table-hover table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>Ville</th>
                        <th>Date et heure</th>
                        <th>Type Incident</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidents as $incident)
                        <tr>
                            <td>{{ $incident->ville }}</td>
                            <td>{{ $incident->date_heure }}</td>
                            <td>{{ $incident->typeIncident->intitule }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
