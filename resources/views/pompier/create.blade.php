@extends("layouts.app")

@section("content")
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau pompier</h3>

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
            <form method="POST" action="{{route('admin.pompier.store')}}">
                @csrf
                <div class="mb-3">
                  <label for="nom" class="form-label">Nom du pompier</label>
                  <input type="text" class="form-control" id="nom" name="nom">

                  <label for="prenom" class="form-label">Prénom du pompier</label>
                  <input type="text" class="form-control" id="prenom" name="prenom">

                  <label for="adresse" class="form-label">Adresse du pompier</label>
                  <input type="text" class="form-control" id="adresse" name="adresse">
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('admin.pompier')}}" class="btn btn-danger">Annuler</a>

              </form>
        </div>
</div>

@endsection
