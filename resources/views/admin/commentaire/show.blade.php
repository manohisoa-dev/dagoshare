@extends('admin.layouts.app')

@section('page-heading')
<h2>Commentaires</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Commentaires</a>
    </li>
    <li>
        <a href="{{ route('admin.commentaire.index') }}">Listes</a>
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
                <h5>Détail Commentaire : {{$commentaire->fichier_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$commentaire->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Fichier Id</h4>
                        <h5>{{$commentaire->fichier_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Utilisateur</h4>
                        <h5>{{$commentaire->user_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Message</h4>
                        <h5>{{$commentaire->message}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Note</h4>
                        <h5>{{$commentaire->note}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Point Globale</h4>
                        <h5>{{$commentaire->point_globale}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$commentaire->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$commentaire->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection