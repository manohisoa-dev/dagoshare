@extends('admin.layouts.app')

@section('page-heading')
<h2>Qualites</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Qualites</a>
    </li>
    <li>
        <a href="{{ route('admin.qualite.index') }}">Listes</a>
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
                <h5>Détail Qualite : {{$qualite->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$qualite->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$qualite->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$qualite->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$qualite->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection