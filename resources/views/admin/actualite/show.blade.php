@extends('admin.layouts.app')

@section('page-heading')
<h2>Actualites</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Actualites</a>
    </li>
    <li>
        <a href="{{ route('admin.actualite.index') }}">Listes</a>
    </li>
    <li class="active">
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Actualite : {{$actualite->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$actualite->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$actualite->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$actualite->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Nouveau</h4>
                        <h5>{{$actualite->nouveau}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$actualite->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$actualite->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection