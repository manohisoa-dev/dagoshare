@extends('admin.layouts.app')

@section('page-heading')
<h2>Fichier Liens</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fichier Liens</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier-lien.index') }}">Listes</a>
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
                <h5>Détail Fichier Lien : {{$fichierLien->fichier_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$fichierLien->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Fichier Id</h4>
                        <h5>{{$fichierLien->fichier_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Qualite Id</h4>
                        <h5>{{$fichierLien->qualite_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Lien</h4>
                        <h5>{{$fichierLien->lien}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Hebergeur</h4>
                        <h5>{{$fichierLien->hebergeur}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Langue Id</h4>
                        <h5>{{$fichierLien->langue_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Extension</h4>
                        <h5>{{$fichierLien->extension}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Taille</h4>
                        <h5>{{$fichierLien->taille}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$fichierLien->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$fichierLien->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection