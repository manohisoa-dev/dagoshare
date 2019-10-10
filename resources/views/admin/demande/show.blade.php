@extends('admin.layouts.app')

@section('page-heading')
<h2>Demandes</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Demandes</a>
    </li>
    <li>
        <a href="{{ route('admin.demande.index') }}">Listes</a>
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
                <h5>Détail Demande : {{$demande->user_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$demande->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Utilisateur</h4>
                        <h5>{{$demande->user_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Compte Facebook</h4>
                        <h5>{{$demande->compte_facebook}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$demande->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Statut</h4>
                        <h5>{{$demande->statut}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Personnel</h4>
                        <h5>{{$demande->personnel_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$demande->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$demande->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection