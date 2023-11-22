@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des pompiers</h3>

        <div class="mt-4">
            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                {{session()->get("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

           @if(session()->has("message"))
           <div class="alert alert-danger alert-dismissible fade show" role="alert"">
               {{session()->get("message")}}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
          @endif
          <div  class="d-flex justify-content-between">
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.pompier.create')}}" class="btn btn-success mb-4">Ajouter un pompier</a>
            </div>

          </div>
            <table class="table table-striped table-hover table-bordered"">
                <thead>
                  <tr>
                    <th scope="col">No index</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($pompiers as $pompier)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$pompier->nom}}</td>
                        <td>{{$pompier->prenom}}</td>
                        <td>{{$pompier->adresse}}</td>
                        <td>
                            <a href="{{route('admin.pompier.edit', ['pompier'=>$pompier->id])}}" class="btn btn-info">Éditer</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer ce pompier?')){document.getElementById('form-{{$pompier->id}}').submit()}">Supprimer</a>


                            <form id="form-{{$pompier->id}}" action="{{route('admin.pompier.delete', ['pompier'=>$pompier->id])}}" method="POST">
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
              {{$pompiers->links()}}
        </div>
    </div>


</div>
@endsection
