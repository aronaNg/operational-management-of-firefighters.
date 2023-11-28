@extends("layouts.user")

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
          <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Disponibilités</th>
                    <th>Compétences</th>
                    <th>Certifications</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pompiers as $pompier)
                    <tr>
                        <td>{{ $pompier->nom }}</td>
                        <td>{{ $pompier->prenom }}</td>
                        <td>{{ $pompier->adresse }}</td>
                        <td>
                            @foreach($pompier->disponibilites as $disponibilite)
                                {{ $disponibilite->jour_semaine }} - {{ $disponibilite->horaire_debut }} à {{ $disponibilite->horaire_fin }}<br>
                            @endforeach
                        </td>
                        <td>
                            @if ($pompier->competences)
                                @foreach($pompier->competences as $competence)
                                    {{ $competence->nom }}<br>
                                @endforeach
                            @else
                                Aucune compétence
                            @endif
                        </td>
                        <td>
                            @if ($pompier->certifications)
                                @foreach($pompier->certifications as $certification)
                                    {{ $certification->nom }}<br>
                                @endforeach
                            @else
                                Aucune certification
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('admin.pompier.edit', $pompier) }}" class="btn btn-primary">Éditer</a>
                            <form action="{{ route('admin.pompier.delete', $pompier) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pompier?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucun pompier trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
       </div>
    </div>


</div>
@endsection
