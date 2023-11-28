@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Listes des types d'incidents</h3>

        <div class="mt-4">
            {{--alert pour la création de type--}}
            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                {{session()->get("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

          {{--alert pour la suppression de type--}}
           @if(session()->has("message"))
           <div class="alert alert-danger alert-dismissible fade show" role="alert"">
               {{session()->get("message")}}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
          @endif
          <div  class="d-flex justify-content-between">
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.incident.create')}}" class="btn btn-success mb-4">Créer un type d'incident</a>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{route('admin.incidentprim')}}" class="btn btn-success mb-4">Voir les incidents</a>
            </div>
          </div>
            <table class="table table-striped table-hover table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">No index</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($typeIncidents as $typeIncident)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$typeIncident->intitule}}</td>
                        <td>
                            <a href="{{route('admin.incident.edit', ['typeIncident'=>$typeIncident->id])}}" class="btn btn-info">Éditer</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer ce typeIncident?')){document.getElementById('form-{{$typeIncident->id}}').submit()}">Supprimer</a>


                            <form id="form-{{$typeIncident->id}}" action="{{route('admin.incident.delete', ['typeIncident'=>$typeIncident->id])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete"/>
                            </form>
                        </td>
                      </tr>
                    @empty
                    <p>Oups! C'est épuisé.</p>
                    @endforelse

                </tbody>
              </table>
              {{$typeIncidents->links()}}
        </div>
    </div>


</div>
@endsection
