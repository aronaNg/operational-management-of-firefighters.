@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">C'est la page users</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connectés !
                    <a href="{{route('admin.pompier')}}" class="btn btn-info">Voir les pompiers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
