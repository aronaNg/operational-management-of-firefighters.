@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Édition d'un pompier</h3>

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
            <form method="POST" action="{{route('admin.pompier.update', ['pompier'=>$pompier->id])}}">
                @csrf

                <input type="hidden" name="_method" value="put"/>

                <div class="mb-3">
                  <label for="nom" class="form-label">Nom du pompier</label>
                  <input type="text" class="form-control" id="nom" name="nom" value="{{$pompier->nom}}">

                  <label for="prenom" class="form-label">Prénom du pompier</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" value="{{$pompier->prenom}}">

                  <label for="adresse" class="form-label">Nom du type vehicule</label>
                  <input type="text" class="form-control" id="adresse" name="adresse" value="{{$pompier->adresse}}">
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('admin.pompier')}}" class="btn btn-danger">Annuler</a>

              </form>
        </div>
</div>

@endsection
