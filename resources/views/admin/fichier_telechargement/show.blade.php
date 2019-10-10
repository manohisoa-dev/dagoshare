@extends('admin.layouts.app')

@section('page-heading')
<h2>Fichier Telechargements</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fichier Telechargements</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier-telechargement.index') }}">Listes</a>
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
                <h5>Détail Fichier Telechargement : {{$fichierTelechargement->fichier_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$fichierTelechargement->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Fichier Id</h4>
                        <h5>{{$fichierTelechargement->fichier_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Utilisateur</h4>
                        <h5>{{$fichierTelechargement->user_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Ip</h4>
                        <h5>{{$fichierTelechargement->ip}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$fichierTelechargement->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$fichierTelechargement->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection