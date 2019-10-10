@extends('admin.layouts.app')

@section('page-heading')
<h2>Aides</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Aides</a>
    </li>
    <li>
        <a href="{{ route('admin.aide.index') }}">Listes</a>
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
                <h5>Détail Aide : {{$aide->titre}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$aide->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Titre</h4>
                        <h5>{{$aide->titre}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$aide->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$aide->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$aide->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection